<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\MenuItem;

class NavigationController extends Controller
{
    public function getAllNavigation() 
	{
		$menu = Menu::get();
		$data=array();
		  $i=0;
		  foreach($menu as $menus)
		  {
			$data[$i]['id']=$menus->id;
			$data[$i]['name']=$menus->name;
			$i++;
		  }
		return response($data, 200);
	}
	public function getNavigationList($id)
	{	 
		if (Menu::where('id', $id)->exists())
		{
			 
			$menu_list = MenuItem::join('admin_menus as m2', 'm2.id', '=', 'admin_menu_items.menu')
			->where('admin_menu_items.menu', $id)->where('admin_menu_items.parent',0)->get(['admin_menu_items.*', 'm2.name']); 
			  // dd($menu_list);
			$data=array();
			$image_path= url('/storage/uploads');
			$link= url('');
			foreach($menu_list as $key => $value)
			{
				$data['id']=$value['id'];
				$data['menu_title']=$value['name'];
				$data['multipleid']=$value['multipleid'];
				$data['type_category']=$value['type_category'];
				$data['label']=$value['label'];
				$data['image']=$image_path .'/'. $value['image'];
				$data['link']=$link.'/pages/'.$value['link'];
				$data['parent']=$value['parent'];
				$data['sort']=$value['sort'];
				$data['class']=$value['class'];
				$data['menu']=$value['menu'];
				$data['depth']=$value['depth'];
				$blog_result[$key] = $data;   
				
			}
			return response($blog_result, 200);
		}
		else
		{
			return response()->json(["message" => "Menu not found"], 404);
		}
    }
	public function getNavigationList_Submenu($id)
	{	  
		if (MenuItem::where('parent', $id)->exists())
		{
			 
			$menu_list = MenuItem::join('admin_menus as m2', 'm2.id', '=', 'admin_menu_items.menu')
			->where('admin_menu_items.parent',$id)->get(['admin_menu_items.*', 'm2.name']); 
			  
			$data=array();
			$image_path= url('/storage/uploads');
			$link= url('');
			foreach($menu_list as $key => $value)
			{
				$data['id']=$value['id'];
				$data['menu_title']=$value['name'];
				$data['multipleid']=$value['multipleid'];
				$data['type_category']=$value['type_category'];
				$data['label']=$value['label'];
				$data['image']=$image_path .'/'. $value['image'];
				$data['link']=$link.'/pages/'.$value['link'];
				$data['parent']=$value['parent'];
				$data['sort']=$value['sort'];
				$data['class']=$value['class'];
				$data['menu']=$value['menu'];
				$data['depth']=$value['depth'];
				$blog_result[$key] = $data;   
				
			}
			return response($blog_result, 200);
		}
		else
		{
			return response()->json(["message" => "Sub Menu not found"], 404);
		}
    }
}
