<?php

namespace App\Models;

use App\Models\EventImage;
use App\Models\EventCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory,SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function eventOwner()
    {
        return $this->belongsTo(EventOwner::class);
    }

    public function eventCategories(){
        return $this->hasMany(EventCategory::class);
    }

    public function eventImages(){
        return $this->hasMany(EventImage::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}

