<?php

namespace App\Http\Livewire\Product;

use Livewire\Component;

use App\Models\Collection;

use App\Models\ProductMedia;

use App\Models\CollectionProduct;

use App\Models\Product;

use Illuminate\Http\Request;

use Livewire\WithFileUploads;

use Livewire\WithPagination;

use Illuminate\Pagination\Paginator;

class Collectionsdetail extends Component
{
    use WithPagination;
    use WithFileUploads;
    
    public $collection,$uuid,$online_store,$point_of_sale,$condition_match,$productpaginator,$filter_customers, $variationValue, $collection_product,$collectionimage, $selected_product, $selectedproducts = [];

    public $perPage = 10;

    public $search = '';

    public $updateMode = true;

    protected $listeners = ['update'];

    public function mount($id) {

        $this->uuid = $id;

        $this->collection = Collection::where('uuid',$this->uuid)->first();

        $this->selected_product = CollectionProduct::with('collection_product')->where('collection_id',$this->collection['id'])->get();



        $this->productpaginator = Product::All();
        //$this->product = Product::paginate(6);

        if($this->collection['online_store'] == 'true') {

            $this->collection['online_store'] = true;

        } else {

            $this->collection['online_store'] = false;

        }

         if($this->collection['point_of_sale'] == 'true') {

            $this->collection['point_of_sale'] = true;

        } else {

            $this->collection['point_of_sale'] = false;

        }

         if($this->collection['condition_match'] == '0') {

            $this->collection['condition_match'] = true;

        } else {

            $this->collection['condition_match'] = false;

        }

    }

    public function render()
    {   

        $perPage = 5;

        $offset = max(0, ($this->page - 1) * $perPage);

        $items = $this->productpaginator->slice($offset, $perPage + 1);

        $paginator  = new Paginator($items, $perPage, $this->page);
    
        return view('livewire.product.collectionsdetail', [
            'product' => $paginator
        ]);
    }

    public function search(Request $request)
    {
        if($request->ajax())
        {
            $output="";
            $this->products = Product::where('title', 'LIKE', '%' . $this->filter_customers . '%')->get();
            if($products)
            {
            foreach ($products as $key => $product) {
            $output.=
            '<label class="collection-edit-pd-list"><input type="checkbox"  wire.model="permission.'.$product->title.'" name="permission[]" wire:ignore.self>
            <img src="https://cdn.shopify.com/s/files/1/0275/7722/1235/products/night_3daf8a9e-9370-45a8-a7af-be759cea1504_200x200.jpg?v=1630051535">
            <div class="manage-carriers-title">
                <p class="mb-0 black-color">'.$product->title.'</p>
                <p class="mb-0"><span class="tag blue">Draft</span></p>
            </div>
            </label>';
         
            }
            return Response($output);
               }
        }
    }

    protected $rules = [

        'collection.title' => [],
        'collection.description' => [],
        'collection.seo_title' => [],
        'collection.seo_description' => [],
        'collection.seo_url' => [],
        'collection.condition_match' => [],
        'collection.online_store' => [],
        'collection.point_of_sale' => [],
        'collection.featured' => [],
        //'productpaginator.*' => '',

    ];


    public function store()
    {
           
      
        foreach ($this->selectedproducts as $key => $value) {
            $variationValue = Product::query()->findOrFail($value);
        
                if ($variationValue) {
        
                    CollectionProduct::create([

                       'collection_id' => $this->collection['id'],
                       'product_id' => $variationValue['id'],
                       'product_name' => $variationValue['title']

                    ]); 
                } 
        }

        $this->updateMode = false;
       // foreach ($this->permission as $key => $value) {

            /*PostTag::create([
                'tag_id' => $value,
                'post_id' => $post->post_id,
            ]);*/
        //}
               

    }

    public function update($flag, $params = null)

    {


        if($flag == 'online-store-change')

        {

            if ($this->collection['online_store'] == 'false') {

                $online_store_update = 'true';

            } 

            else {

                $online_store_update = 'false';

            }

            if ($this->collection['point_of_sale'] == 'false') {

                $point_of_sale_update = 'true';

            } 

            else {

                $point_of_sale_update = 'false';

            }

                Collection::where('id', $this->collection['id'])->update([

                    'online_store' =>  $online_store_update,
                    'point_of_sale' =>  $point_of_sale_update

                ]);



            session()->flash('message', 'Users Updated Successfully.');

        }

        if($flag == 'main-change')

        {

            if ($this->collection['condition_match'] == '0') {

                $condition_match_update = '1';

            } 

            else {

                $condition_match_update = '0';

            }

            if ($this->collection['featured'] == '1') {

                $featured_cate = '1';

            } 

            else {

                $featured_cate = '0';

            }


            if($this->collectionimage){
                $photo = $this->collectionimage;
                $path_url = $photo->storePublicly('collection','public');
            }else{
                $path_url = $this->collection['image'];          
            }

            Collection::where('id', $this->collection['id'])->update(

                [

                    'title'            => $this->collection['title'],

                    'description'      => $this->collection['description'],
                   
                    'image'            => $path_url,

                    'condition_match'  => $condition_match_update,

                    'seo_title'        => $this->collection['seo_title'],

                    'seo_description'  => $this->collection['seo_description'],

                    'seo_url'          => $this->collection['seo_url'],

                    'status'           => $this->collection['status'],

                    'featured'         => $featured_cate,

                ]

            );

            session()->flash('message', 'Collection Updated Successfully.');
        }

         $this->collection = Collection::where('uuid',$this->uuid)->first();
    }

    public function destroy($id)
    {
        if ($id) {
            $record = CollectionProduct::where('id', $id);
            $record->delete();
        }
    }

    
}
