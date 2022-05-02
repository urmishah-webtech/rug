<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductVariant;
use App\Models\ProductMedia;
use App\Models\Product;
use App\Models\Collection;

class CollectionController extends Controller
{ 
    public function getCollection()
    {
        $CollectionItem = Collection::get();
        $data = array();
        $i = 0;
        $image_path= env('IMAGE_PATH');

        foreach ($CollectionItem as $key => $row) {
            
            $data[$i]['id'] = $row->id;
            $data[$i]['title'] = $row->title;
            $data[$i]['descripation'] = $row->description;
            $data[$i]['image'] = $image_path . $row->image;
            $i++;
        }

        return response()->json(['message' => 'success', 'collectionitem' => $data, 'success' => true, ]);
    }
        
}