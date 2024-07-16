<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    private $category;
    public function __construct(Category $category, Event $event)
    {
        $this->category = $category;
        $this->event = $event;
    }
    
    public function create()
    {
        $categories = Category::all();
        return view('event-owners.events.register', compact('categories'));
    }
}
