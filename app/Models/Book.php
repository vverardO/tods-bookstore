<?php

namespace App\Models;

use App\Events\BookCreating;
use App\Scopes\FromAuthenticatedUserScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class Book extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'title',
        'description',
        'value',
        'status_id',
        'user_id',
    ];

    protected $casts = [
        'value' => 'float',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(BookStatus::class);
    }

    protected $dispatchesEvents = [
        'creating' => BookCreating::class,
    ];

    protected static function booted()
    {
        static::addGlobalScope(new FromAuthenticatedUserScope);
    }
}
