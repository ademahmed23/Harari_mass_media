<?php

namespace App\Repositories;

use App\Models\Post;
use App\Models\PostArticle;
use App\Models\RssFeed;
use App\Models\User;
use App\Scopes\LanguageScope;
use App\Scopes\PostDraftScope;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;
use Vedmant\FeedReader\Facades\FeedReader;

/**
 * Class UserRepository
 */
class RssFeedRepository extends BaseRepository
{
    public $fieldSearchable = [
        'first_name',
        'last_name',
        'email',
        'contact',
        'dob',
        'gender',
        'status',
        'password',

    ];

    /**
     * {@inheritDoc}
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * {@inheritDoc}
     */
    public function model()
    {
        return User::class;
    }

    /**
     * @param  array  $userInput
     * @return bool
     */
    public function store($input)
    {

        try {
            $input['post_draft'] = ($input['post_draft'] == true) ? 0 : 1;
            $key = 'value';
            $output = array_map(function ($item) use ($key) {
                return $item->$key;
            }, json_decode($input['tags']));

            $input['tags'] = implode(',', $output);
            
                $rssFeed = RssFeed::create($input);
                $rssFeed->update([
                    // 'user_id' => getLogInUserId(),
                ]);
            $feed = FeedReader::read($input['feed_url']);
            $postNo = 1;
            foreach ($feed->get_items() as $postData) {
                if ($postNo > $input['no_post']) {
                    break;
                }
                $data = [];
                $data['title'] = $postData->get_title();
                $data['article_content'] = $postData->get_content();
                $data['link'] = $postData->get_link();
                $data['enclosure'] = $postData->get_enclosure()->link;
                $data['source'] = $postData->get_source();
                $data['slug'] = Str::slug($data['title']);
                $post = Post::create([
                    'title' => $data['title'],
                    'slug' => $data['slug'],
                    'description' => $data['title'],
                    'keywords' => $data['title'],
                    'visibility' => $input['post_draft'], // if post is draft visibility off
                    'post_types' => Post::ARTICLE_TYPE_ACTIVE,
                    'lang_id' => $input['language_id'],
                    'category_id' => $input['category_id'],
                    'sub_category_id' => $input['subcategory_id'],
                    'status' => $input['post_draft'],
                    'created_by' => getLogInUserId(),
                    'rss_link' => $data['link'],
                    'is_rss' => true,
                    'rss_id' => $rssFeed->id,
                    'scheduled_post_delete' => isset($input['scheduled_delete_post_time']) ? 1 : 0,
                    'scheduled_delete_post_time' => $input['scheduled_delete_post_time'] ?? null,
                    'tags' => $input['tags'],
                ]);

                $articleInputArray = Arr::only($data, ['article_content']);
                $article = new PostArticle($articleInputArray);
                $post->postArticle()->save($article);
                try {
                    if(isset($data['enclosure']) && !empty($data['enclosure'])) {
                        $post->addMediaFromUrl($data['enclosure'])->toMediaCollection(Post::IMAGE_POST,
                            config('app.media_disc'));
                    }
                } catch (\Exception $e) {
                    Log::error($e->getMessage());
                }

                $postNo++;
            }
        } catch (\Exception $e) {
            DB::rollBack();

            throw new UnprocessableEntityHttpException($e->getMessage());
        }
    }

    public function manuallyUpdate($rssFeed)
    {
        $rssFeed['post_draft'] = ($rssFeed['post_draft'] == true) ? 0 : 1;
        $rss = RssFeed::whereId($rssFeed['id'])->first();
        $feed = FeedReader::read($rssFeed['feed_url']);
        $postNo = 1;

        foreach ($feed->get_items() as $postData) {
            if ($postNo > $rss->no_post) {
                break;
            }
            $data = [];
            $data['title'] = $postData->get_title();
            $data['description'] = $postData->get_content();
            $data['link'] = $postData->get_link();
            $data['enclosure'] = $postData->get_enclosure()->link;
            $data['source'] = $postData->get_source();
            $data['slug'] = Str::slug($data['title']);
            $post = Post::withoutGlobalScope(LanguageScope::class)->withoutGlobalScope(PostDraftScope::class)->whereSlug($data['slug'])->first();
            if (! empty($post)) {
                $post->update([
                    'title' => $data['title'],
                    'slug' => $data['slug'],
                    'description' => isset($data['description']) ? $data['description'] : $data['title'],
                    'keywords' => $data['title'],
                    'rss_link' => $data['link'],
                    'lang_id' => $rss->language_id,
                    'category_id' => $rss->category_id,
                    'sub_category_id' => $rss->subcategory_id,
                    'status' => $rss->post_draft,
                    'scheduled_post_delete' => isset($rss->scheduled_delete_post_time) ? 1 : 0,
                    'scheduled_delete_post_time' => $rss->scheduled_delete_post_time ?? null,
                    'tags' => $rss->tags,
                ]);
            } else {
                $post = Post::create([
                    'title' => $data['title'],
                    'slug' => $data['slug'],
                    'description' => isset($data['description']) ? $data['description'] : $data['title'],
                    'keywords' => $data['title'],
                    'visibility' => Post::VISIBILITY_ACTIVE,
                    'post_types' => Post::ARTICLE_TYPE_ACTIVE,
                    'lang_id' => $rss->language_id,
                    'category_id' => $rss->category_id,
                    'sub_category_id' => $rss->subcategory_id,
                    'status' => $rss->post_draft,
                    'created_by' => $rss->user_id,
                    'rss_link' => $data['link'],
                    'is_rss' => true,
                    'scheduled_post_delete' => isset($rss->scheduled_delete_post_time) ? 1 : 0,
                    'scheduled_delete_post_time' => $rss->scheduled_delete_post_time ?? null,
                    'tags' => $rss->tags,
                    'rss_id' => $rss->id,
                ]);
                try {
                $post->addMediaFromUrl($data['enclosure'])->toMediaCollection(Post::IMAGE_POST,
                    config('app.media_disc'));
                } catch (\Exception $e) {
                    Log::error($e->getMessage());
                }
            }
            $postNo++;
        }
    }

    public function update($input, $rssFeed)
    {
        $input['post_draft'] = ($input['post_draft'] == true) ? 0 : 1;
        $rss = RssFeed::whereId($rssFeed->id)->firstorFail();
        $key = 'value';
        $output = array_map(function ($item) use ($key) {
            return $item->$key;
        }, json_decode($input['tags']));

        $input['tags'] = implode(',', $output);

        $rss->update($input);
    }
}
