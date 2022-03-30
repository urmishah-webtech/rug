<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Product;
use App\Models\User;
use App\Models\Orders;
use Illuminate\Support\Facades\Auth;


class Dashboard extends Component
{
    public $product, $User, $order;

    public function mount()
    {
        $this->product = Product::count();
        $this->User = User::count();
        $this->order = Orders::where('transactionid','!=','0' )->count();
        // if(!Auth::check()) {
        //     return view('livewire.admin.login');
        // } 
        // if (Auth::check() && !Auth::user()->hasRole('admin')) {
        //     return redirect('/');
        // } 
    }
    public function render()
    {
        return view('livewire.admin.dashboard');
    }
    public function checkLogin()
    {
    	if(!Auth::check()) {
    		return view('livewire.admin.login');
    	} elseif (!Auth::user()->hasRole('admin')) {
    		return redirect('/');
    	} else {
    		$this->render();
    	}
        
    }
}
