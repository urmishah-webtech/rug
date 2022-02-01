<?php

namespace App\Http\Livewire\OnlineStore;

use Livewire\Component;
use App\Models\Blog;
 
class Articles extends Component
{
    public function render()
    {
		$articles = Blog::get();
		$post_count = Blog::get()->count();
        return view('livewire.online-store.articles',compact('articles','post_count'));
    }
}
