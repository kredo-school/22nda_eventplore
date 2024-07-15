<?php

namespace App\Models;

use App\Models\EventCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    public function eventCategories(){
        return $this->hasMany(EventCategory::class);
    }
}
