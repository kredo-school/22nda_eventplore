<?php

namespace App\Models;

use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventImage extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['event_id', 'image'];

    public function event(){
        return $this->belongsTo(Event::class);
    }

   


}
