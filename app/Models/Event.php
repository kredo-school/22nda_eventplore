<?php

namespace App\Models;

use App\Models\EventImage;
use App\Models\EventCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    public function eventCategories(){
        return $this->hasMany(EventCategory::class);
    }

    public function eventImages(){
        return $this->hasMany(EventImage::class);
    }
}
