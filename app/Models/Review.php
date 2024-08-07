<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'event_id',
        'star',
        'comment',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    //削除されていないイベントを取得
    public function scopeForActiveEvents($query)
    {
        return $query->whereHas('event', function ($query) {
            $query->whereNull('deleted_at');
        });
    }
}
