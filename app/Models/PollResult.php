<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\PollResult
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $ip_address
 * @property int $poll_id
 * @property string $answer
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @method static Builder|PollResult newModelQuery()
 * @method static Builder|PollResult newQuery()
 * @method static Builder|PollResult query()
 * @method static Builder|PollResult whereAnswer($value)
 * @method static Builder|PollResult whereCreatedAt($value)
 * @method static Builder|PollResult whereId($value)
 * @method static Builder|PollResult whereIpAddress($value)
 * @method static Builder|PollResult wherePollId($value)
 * @method static Builder|PollResult whereUpdatedAt($value)
 * @method static Builder|PollResult whereUserId($value)
 * @mixin Eloquent
 */
class PollResult extends Model
{
    use HasFactory;

    protected $table = 'poll_result';

    protected $fillable = [
        'user_id',
        'poll_id',
        'answer',
        'ip_address',
    ];

    protected $casts = [
        'user_id' => 'integer',
        'poll_id' => 'integer',
        'answer' => 'string',
        'ip_address' => 'string',
    ];

    /**
     * @return BelongsTo
     */
    public function poll(): BelongsTo
    {
        return $this->belongsTo(Poll::class, 'poll_id');
    }
}
