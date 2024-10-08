<?php

namespace App\Models;

use App\Scopes\LanguageScope;
use App\Scopes\PostDraftScope;
use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use App\Models\Language;

/**
 * App\Models\RssFeed
 *
 * @property int $id
 * @property string $feed_name
 * @property string $feed_url
 * @property int $no_post
 * @property int $language
 * @property int $category_id
 * @property int $subcategory_id
 * @property int|null $user_id
 * @property int $auto_update
 * @property int $show_btn
 * @property int $post_draft
 * @property string|null $show_btn_text
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Category $category
 * @property-read Language $language
 * @property-read User|null $user
 *
 * @method static Builder|RssFeed newModelQuery()
 * @method static Builder|RssFeed newQuery()
 * @method static Builder|RssFeed query()
 * @method static Builder|RssFeed whereAutoUpdate($value)
 * @method static Builder|RssFeed whereCategoryId($value)
 * @method static Builder|RssFeed whereCreatedAt($value)
 * @method static Builder|RssFeed whereFeedName($value)
 * @method static Builder|RssFeed whereFeedUrl($value)
 * @method static Builder|RssFeed whereId($value)
 * @method static Builder|RssFeed whereLanguageId($value)
 * @method static Builder|RssFeed whereNoPost($value)
 * @method static Builder|RssFeed wherePostDraft($value)
 * @method static Builder|RssFeed whereShowBtn($value)
 * @method static Builder|RssFeed whereShowBtnText($value)
 * @method static Builder|RssFeed whereSubcategoryId($value)
 * @method static Builder|RssFeed whereUpdatedAt($value)
 * @method static Builder|RssFeed whereUserId($value)
 * @mixin Eloquent
 */
class RssFeed extends Model
{
    use HasFactory;

    protected $table = 'rss_feeds';

    protected $fillable = [
        'feed_name',
        'feed_url',
        'no_post',
        'language',
        'category',
        'images',
        'auto_update',
        'generate_keywords',
        'show_btn',
        'post_draft',
        'show_btn_text',
        'user_id',
        'tags',
        'scheduled_delete_post_time',
    ];

    protected $casts = [
        'feed_name' => 'string',
        'feed_url' => 'string',
        'no_post' => 'integer',
        'language' => 'string',
        'category' => 'string',
        // 'subcategory_id' => 'integer',
        // 'user_id' => 'integer',
        'auto_update' => 'boolean',
        'show_btn' => 'boolean',
        'post_draft' => 'boolean',
        'show_btn_text' => 'string',
    ];

    const ORIGINAL = 0;

    const MySERVER = 1;

    const IMAGE_SOURCES = [
        self::ORIGINAL => 'Original',
        self::MySERVER => 'My Server',

    ];

    const YES = 1;

    const NO = 0;

    public static $rules = [
        'feed_name' => 'required',
        'feed_url' => 'required|unique:rss_feeds,feed_url',
        'no_post' => 'required',
        
    ];

    const AUTO_UPDATE = [
        self::YES => 'Yes',
        self::NO => 'No',
    ];

    const GENERATE_KEYWORD = [
        self::YES => 'Yes',
        self::NO => 'No',
    ];

    const SHOW_BTN = [
        self::YES => 'Yes',
        self::NO => 'No',
    ];

    const  ADD_POSTS = [
        self::YES => 'Yes',
        self::NO => 'No',
    ];

    public function language()
    {
        return $this->belongsTo(Language::class, 'language');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'rss_id', 'id')->withoutGlobalScope(LanguageScope::class)->withoutGlobalScope(PostDraftScope::class);
    }
}
