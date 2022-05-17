<?php



namespace app\Http\Livewire\Customer;



use Livewire\Component;

use App\Models\Country;

use App\Models\CustomerDetail;

use App\Models\CustomerAddress;

use App\Models\Tag;

use App\Models\User;

use Illuminate\Http\Request;

use Illuminate\Support\Str;



class Detail extends Component

{

    public $uuid, $customer, $countries, $tags, $customerData, $address_id, $collect_tax, $agreed_to_receive_marketing_mails, $customerAddress;



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

        $this->customer = User::with(['detail','address'=>function($query) {

            $query->where('address_type','shipping_address');

        }])->where('uuid',$this->uuid)->first()->toArray();

        $this->customerData = $this->customer;

        $this->countries = Country::all();

        $this->tags = Tag::all(['label']);

        

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



    public function render()

    {

        return view('livewire.customer.detail');

    }



    public function store()

    {



        $data = $this->customerAddress;

        $data['user_id'] = $this->customerData['id'];

         CustomerAddress::create($data);



        session()->flash('message', 'Address Created Successfully.');



        $this->resetInputFields();



        //check

        $this->emit('userStore'); // Close model to using to jquery



    }



    public function EditAddress($id)

    {

        $this->customerAddress = CustomerAddress::where('id',$id)->first()->toArray();

        $this->address_id = $id;

        

    }





    public function delete()

    {

        CustomerAddress::find($this->address_id)->delete();

    }



    public function update($flag, $params = null)

    {

        if($flag == 'customer-note')

        {



            CustomerDetail::where('user_id', $this->customerData['id'])->update([

                    'note' => $this->customerData['detail']['note']

                ]);

        

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

                $tags = trim(strtolower($params));

                $tags_arr = explode(" ", $tags);

                $tags_str  = implode(',', $tags_arr);





                CustomerDetail::where('user_id', $this->customerData['id'])->update(['tags'  => $tags_str]);



                $create_tag = [];

                foreach ($tags_arr as $tag) {

                    $tag = trim($tag);

                    $exist = Tag::where('label', $tag)->first();



                    if (empty($exist)) {

                        $create_tag[] = ['label'=>$tag];

                    }

                }

                Tag::insert($create_tag);



                session()->flash('message', 'Users Updated Successfully.');

                // $this->customer = $this->customerData;

            

            }



        }

                $this->initial();





    }



    public function resetInputFields() {

         $this->customerData = $this->customer;

    }

}

