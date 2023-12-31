<?php

namespace App\Models;

use App\Events\TodoCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin IdeHelperTodo
 */
class Todo extends Model
{
    use HasFactory;

    protected $dispatchesEvents = ['created' => TodoCreated::class];
    protected $fillable = ['content'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
