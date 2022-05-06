<?php

namespace App\Http\Livewire\Customer;







use Livewire\Component;

use App\Models\Country;

use App\Models\CustomerDetail;

use App\Models\tax;

use App\Models\CustomerAddress;

use App\Models\CustomerComment;

use App\Models\Orders;

use Illuminate\Support\Facades\Validator;

use App\Models\order_item;

use App\Models\Tag;

use Livewire\WithFileUploads;

use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Support\Str;

class Details extends Component
{

    use WithFileUploads;

    public $uuid, $customer, $countries, $tags, $Taxes, $customerData, $first_name, $last_name ,$address_id, $collect_tax, $agreed_to_receive_marketing_mails, $customerAddress = [], $customerBillingAddress = [], $address,$address_type,$shipping_address_type,$order,$order_item,$edit_billing_address,$messagetext,$commentget,$ordercomment,$OrderItemstock, $social_img;

    protected $listeners = ['update'];
     protected $rules = [

        'customerData.detail.collect_tax' => [],

        'customerData.detail.email_marketing_status' => [],

        'customerData.first_name'=> [],

        'customerData.last_name'=> [],

        'customerData.email'=> [],

        'customerData.mobile_number'=> [],

        'customerData.detail.note' => [],

        'customerData.detail.agreed_to_receive_marketing_mails' => [],

        'customerData.detail.tags' => [],

    ];



  



    



    public function mount($id) {



        $this->uuid = $id;



        $this->initial();



    }







    public function initial()
    {

        $this->customer = User::with(['detail','address'])->where('uuid',$this->uuid)->first()->toArray();
       
        $this->commentget = CustomerComment::where('user_id',$this->customer['id'])->orderBy('id', 'DESC')->get()->groupBy(function($data) {
            return $data->updated_at->format('Y-m-d');
        })->toArray();
     
 
        $this->order = orders::where('user_id',$this->customer['id'])->orderBy('id', 'DESC')->first();
        
        $this->ordercomment = orders::where('user_id',$this->customer['id'])->orderBy('id', 'DESC')->get();

        $this->order_item = order_item::with('order_product')->with('media_product')->where('user_id',$this->customer['id'])->orderBy('id', 'DESC')->first();
        
        if($this->order){
        $this->OrderItemstock = order_item::where('order_id',$this->order['id'])->get();
        }

        $this->Taxes = tax::where('id',1)->first();

        $this->customerData = $this->customer;

        $this->countries = Country::all();

        if($this->customerData['detail']) {

            if(isset($this->customerData['detail']['tags'])) {

                        $this->tags = Tag::whereNotIn('label', explode(',',$this->customerData['detail']['tags']))->get();
            }

        if($this->customerData['detail']['collect_tax'] == 'yes') {

            $this->customerData['detail']['collect_tax'] = true;

        } else {

            $this->customerData['detail']['collect_tax'] = false;

        }

        if($this->customerData['detail']['agreed_to_receive_marketing_mails'] == 'yes') {

            $this->customerData['detail']['agreed_to_receive_marketing_mails'] = true;

        } else {

            $this->customerData['detail']['agreed_to_receive_marketing_mails'] = false;
        }

    }

    }

    public function render()
    {

       
        return view('livewire.customer.details');

    }







    public function store()

    {

        $data = $this->customerBillingAddress;



        if(empty($this->customerBillingAddress->country)) {



            $data['country'] = $this->countries[0]->name;



        }

        if($this->address_type == true){
            CustomerAddress::where('user_id', $this->customerData['id'])->update(['is_billing_address' => 'no' ]);
            $is_billing_address = 'yes';
        }else{
            $is_billing_address = 'no';
        }

        $data['user_id'] = $this->customerData['id'];



        $data['address_type'] = 'billing_address';



        $data['is_billing_address'] = $is_billing_address;



        CustomerAddress::create($data);



        $this->resetInputFields();





        session()->flash('message', 'Address Created Successfully.');







        $this->initial();



    }


    public function storeshippping()

    {
        $data = $this->customerBillingAddress;

        if(empty($this->customerBillingAddress->country)) {

            $data['country'] = $this->countries[0]->name;
        }

        if($this->shipping_address_type == true){
            CustomerAddress::where('user_id', $this->customerData['id'])->update(['is_billing_address' => 'no' ]);

            $is_billing_address = 'yes';
        }else{
            $is_billing_address = 'no';
        }

        $data['user_id'] = $this->customerData['id'];



        $data['address_type'] = 'shipping_address';



        $data['is_billing_address'] = $is_billing_address;



        CustomerAddress::create($data);



        $this->resetInputFields();





        session()->flash('message', 'Address Created Successfully.');







        $this->initial();



    }







    public function EditAddress($id)
    {
        $this->customerAddress = CustomerAddress::where('id',$id)->first()->toArray();

        $this->address = $this->customerAddress;

        $this->address_id = $id;

    }

    public function EditShippingAddress($id)
    {
        $this->customerAddress = CustomerAddress::where('id',$id)->first()->toArray();

        $this->address = $this->customerAddress;

        $this->address_id = $id;

    }

    public function customercommentpost()
    {

        date_default_timezone_set("Europe/Amsterdam");

        if($this->social_img){

            $photo = $this->social_img;
            $path_url = $photo->storePublicly('commentgeImage','public');
            
            $image = $path_url;
        }
        else{
            $image = '';
        }

        if($this->messagetext)
        {
          $messagevalue  = $this->messagetext;
        }else{

          $messagevalue = '';
        }

        $Comment_arr = [

            'user_id' => $this->customerData['id'],
            
            'message' => $messagevalue,
            
            'image' => $image,
        ];


        CustomerComment::create($Comment_arr);

        $this->messagetext = '';
        $this->social_img = '';

        $this->initial();

        session()->flash('message', 'Post Created.');

    }
    

    public function delete()
    {
        CustomerAddress::find($this->address_id)->delete();

        $this->initial();
    }

    public function update($flag, $params = null)

    {

        if($flag == 'customer-note')
        {

            $checknote = CustomerDetail::where('user_id',$this->customerData['id'])->first();

            if($checknote){

                 CustomerDetail::where('user_id', $this->customerData['id'])->update([



                    'note' => $this->customerData['detail']['note']



                ]);

            }else{

                $customer_detail_arr = [



                    'user_id' => $this->customerData['id'],

                    

                    'collect_tax' => 'no',

                    

                    'agreed_to_receive_marketing_mails' => 'no',



                    'note' => $this->customerData['detail']['note']



                ];



                CustomerDetail::create($customer_detail_arr);

            }

           



            session()->flash('message', 'Users Updated Successfully.');



            // $this->customer = $this->customerData;



        }

        if($flag == 'Address-change')
        {

            if ($this->address_id) {



                $user = CustomerAddress::find($this->address_id);

                $user->update($this->customerAddress);


                session()->flash('message', 'Address Updated Successfully.');

                // $this->customer = $this->customerData;

            }

        }

        if($flag == 'Address-change-billing')
        {

            if ($this->address_id) {

                if($this->edit_billing_address == true){

                    CustomerAddress::where('user_id', $this->customerData['id'])->update(['is_billing_address' => 'no' ]);

                    $is_billing_address = 'yes';

                    $user = CustomerAddress::find($this->address_id);

                    $user->update(['is_billing_address' => 'yes' ]);

                }else{
                    $is_billing_address = 'no';
                    CustomerAddress::where('user_id', $this->customerData['id'])->update(['is_billing_address' => 'no' ]);
                }



                $user = CustomerAddress::find($this->address_id);

                $user->update($this->customerAddress);


                session()->flash('message', 'Address Updated Successfully.');

                // $this->customer = $this->customerData;

            }

        }


        if($flag == 'email-change')

        {

            User::where('id', $this->customerData['id'])->update(

                [

                    'first_name'    => $this->customerData['first_name'],

                    'last_name'     => $this->customerData['last_name'],

                    'email'         => $this->customerData['email'],

                    'mobile_number' => $this->customerData['mobile_number']

                ]
            );

            session()->flash('message', 'Users Updated Successfully.');

            // $this->customer = $this->customerData;
        }

        if($flag == 'collect_tax')
        {

            if ($this->customerData['detail']['collect_tax'] == 'no') {

                $tax = 'yes';
            } 
            else {

                $tax = 'no';

            }

                CustomerDetail::where('user_id', $this->customerData['id'])->update([

                    'collect_tax' =>  $tax

                ]);


            // $this->customer = $this->customerData;

            session()->flash('message', 'Users Updated Successfully.');

        }

        if($flag == 'email_marketing_status')

        {



            if ($this->customerData['detail']['agreed_to_receive_marketing_mails'] == 'no') {



                $marketing_status = 'yes';



            } else {



                $marketing_status = 'no';



            }



                CustomerDetail::where('user_id', $this->customerData['id'])->update([



                    'agreed_to_receive_marketing_mails' => $marketing_status



                ]);



        



            session()->flash('message', 'Email Marketing Status Updated Successfully.');



            // $this->customer = $this->customerData;



        }







        if($flag == 'tags-change')



        {



            if (!empty($params)) {

                CustomerDetail::where('user_id', $this->customerData['id'])->update(['tags'  => $params]);

                session()->flash('message', 'Users Updated Successfully.');
            }
        }
        if($flag == 'tag-change')
        {
            if (!empty($params)) {

                $params = ucfirst(trim($params));

                $customer_tags = explode(',', $this->customerData['detail']['tags']);

                if(!in_array($params, $customer_tags)) 
                {
                    $tags = empty($this->customerData['detail']['tags']) ? $params : $this->customerData['detail']['tags'].','.$params;

                    CustomerDetail::where('user_id', $this->customerData['id'])->update(['tags'  => $tags]);

                    $exist = Tag::where('label',  $params)->first();

                    if (empty($exist)) {
                        Tag::insert(['label'=>$params]);
                    }
                }

                session()->flash('message', 'Users Updated Successfully.');
            }
        }
        if($flag == 'remove-tag')
        {
            if (!empty($params)) {

                $customer_tags = explode(',', $this->customerData['detail']['tags']);

                if (($key = array_search($params, $customer_tags)) !== false) {

                    unset($customer_tags[$key]);
                }
                $customer_tags = implode(',', $customer_tags);

                CustomerDetail::where('user_id', $this->customerData['id'])->update(['tags'  => $customer_tags]);

                session()->flash('message', 'Users Updated Successfully.');
            }
        }

        $this->initial();
    }



    public function deletecustomer(){

        $this->initial();

            

        $deleteuser = User::find($this->customer['id'])->delete();

        if($deleteuser)

        {
            CustomerAddress::where('user_id',$this->customer['id'])->delete();

            CustomerDetail::where('user_id',$this->customer['id'])->delete();

            return redirect(route('customers'));

        }

        

    }



    public function resetInputFields() {



         $this->customerAddress = $this->address;



    }



}



 