<?php

namespace App\Models;

use App\Models\Review;
use App\Models\EventImage;
use App\Models\Reservation;
use App\Models\EventCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory,SoftDeletes;

    public function eventCategories(){
        return $this->hasMany(EventCategory::class);
    }

    public function eventImages(){
        return $this->hasMany(EventImage::class);
    }

    public function reservations(){
        return $this->hasMany(Reservation::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function area(){
        return $this->belongsTo(Area::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($event) {
            // イベント削除時に予約も削除
            foreach ($event->reservations as $reservation) {
                $reservation->delete();
            }
        });
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'event_categories');
    }
    
    public function getFirstEventImage()
    {
        return $this->eventImages()->orderBy('id', 'asc')->first();
    }

    public function bookmarks(){
        return $this->hasMany(Bookmark::class);
    }

    public function isBookmarked(){
        return $this->bookmarks()->where('user_id', Auth::user()->id)->exists();
    }
}
