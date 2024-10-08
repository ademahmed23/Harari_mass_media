<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Poll
 *
 * @property int $id
 * @property int $lang
 * @property string $question
 * @property string $option1
 * @property string $option2
 * @property string $option3
 * @property string $option4
 * @property string $option5
 * @property string $option6
 * @property string $option7
 * @property string $option8
 * @property string $option9
 * @property string $option10
 * @property int $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $vote_permission
 * @property-read Language $language
 *
 * @method static Builder|Poll newModelQuery()
 * @method static Builder|Poll newQuery()
 * @method static Builder|Poll query()
 * @method static Builder|Poll whereCreatedAt($value)
 * @method static Builder|Poll whereId($value)
 * @method static Builder|Poll whereLangId($value)
 * @method static Builder|Poll whereOption1($value)
 * @method static Builder|Poll whereOption10($value)
 * @method static Builder|Poll whereOption2($value)
 * @method static Builder|Poll whereOption3($value)
 * @method static Builder|Poll whereOption4($value)
 * @method static Builder|Poll whereOption5($value)
 * @method static Builder|Poll whereOption6($value)
 * @method static Builder|Poll whereOption7($value)
 * @method static Builder|Poll whereOption8($value)
 * @method static Builder|Poll whereOption9($value)
 * @method static Builder|Poll whereQuestion($value)
 * @method static Builder|Poll whereStatus($value)
 * @method static Builder|Poll whereUpdatedAt($value)
 * @method static Builder|Poll whereVotePermission($value)
 * @mixin Eloquent
 */
class Poll extends Model
{
    use HasFactory;

    protected $table = 'polls';

    protected $fillable = [
        'language', 'question', 'option1', 'option2', 'option3', 'option4', 'option5', 'option6', 'option7', 'option8',
        'option9', 'option10', 'status', 'vote_permission',
    ];

    protected $casts = [
        'language' => 'string',
        'question' => 'string',
        'option1' => 'string',
        'option2' => 'string',
        'option3' => 'string',
        'option4' => 'string',
        'option5' => 'string',
        'option6' => 'string',
        'option7' => 'string',
        'option8' => 'string',
        'option9' => 'string',
        'option10' => 'string',
        'status' => 'integer',
        'vote_permission' => 'integer',
    ];

    /**
     * @return BelongsTo
     */
    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class, 'lang');
    }

    /**
     * @var string[]
     */
    public static $rules = [
        // 'lang_id' => 'required',
        'question' => 'required|max:181',
        'option1' => 'required|max:181',
        'option2' => 'required|max:181',
        'option3' => 'max:181',
        'option4' => 'max:181',
        'option5' => 'max:181',
        'option6' => 'max:181',
        'option7' => 'max:181',
        'option8' => 'max:181',
        'option9' => 'max:181',
        'option10' => 'max:181',
    ];
}
