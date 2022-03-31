<?php

namespace App\Http\Livewire\OnlineStore;

use Livewire\Component;

use App\Models\Blog;

use Livewire\WithPagination;

use App\Models\Payment;

use Illuminate\Pagination\LengthAwarePaginator;

class Articles extends Component
{

	use WithPagination;

    public $filter_blog;

    public $selecteblog = [];

    public $selectall = false;
  
    public $bulkDisabled = true;

    public $perPage = 10;

    public function render()
    {	

    	$this->bulkDisabled = count($this->selecteblog) < 1;
		$articles = Blog::get();
		$post_count = Blog::get()->count();
        return view('livewire.online-store.articles',  ['articles' => $this->blogpaginate]);
    }

    public function deleteselected(){
        $articles = Blog::query()
                  ->whereIn('id', $this->selecteblog)
                  ->delete();
        $this->selecteblog = [];
        $this->selectall = false;
    }

     public function getblogpaginateProperty(){
        $blog = Blog::when($this->filter_blog, function ($query, $filter_blog) {

            $query->Where('title', 'LIKE', '%' . $filter_blog . '%');

            })->get();
        $items = $blog->forPage($this->page, $this->perPage);
        return new LengthAwarePaginator($items, $blog->count(), $this->perPage, $this->page);
    }

    public function updatedSelectAll($value){

        if($value){
            $this->selecteblog = $this->blogpaginate->pluck('id')->toArray();
        
        }else{
            $this->selecteblog = [];
        }
    }

    public function updatedSelecteblog(){
         $this->selectall = false;
    }

    public function isSelecteblog($order_id){
        return in_array($order_id, $this->selecteblog);
    }
}
