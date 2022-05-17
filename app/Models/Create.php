<?php



namespace app\Http\Livewire\Customer;



use App\Models\Country;

use App\Models\CustomerAddress;

use App\Models\CustomerDetail;

use App\Models\Tag;

use App\Models\User;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;

use Livewire\Component;



class Create extends Component

{

    public $customer, $customer_detail, $customer_address, $customer_billing_address, $billing_address, $countries, $customer_address_phone_code, $billing_address_phone_code, $customer_phone_code, $tags, $selected_tags;



    protected $rules = [

        'customer_first_name' => ['required', 'string', 'max:255'],

        'customer_last_name' => ['required', 'string', 'max:255'],

        'customer_email' => ['required'],

        'customer_mobile_number' => ['required'],

        'customer_detail.agreed_to_receive_marketing_mails' => [],

        'customer_detail.collect_tax' => [],

        'customer_detail.note' => [],

        'customer_detail.tags' => [],

        'customer_address_company' => ['required', 'string', 'max:255'],

        'customer_address_address' => ['required', 'string', 'max:255'],

        'customer_address_apartment' => ['required', 'string', 'max:255'],

        'customer_address_city' => ['required', 'string', 'max:255'],

        'customer_address_country' => ['required'],

        'customer_address_postal_code' => ['required'],

        'customer_billing_address_address' => [],

        'customer_billing_address_apartment' => [],

        'customer_billing_address_city' => [],

        'customer_billing_address_country' => [],

        'customer_billing_address_postal_code' => [],

    ];



    public function mount()

    {

        $this->countries = Country::all();

        $this->tags = Tag::all(['label']);

    }



    public function render()

    {

        return view('livewire.customer.create');

    }



    public function storeCustomer(Request $request)

    {     

        // $validator = Validator::make($request->all(),$this->rules);

        // if ($validator->fails())

        // {

        //     $messages = $validator->messages();

           

        //     // The given data did not pass validation

        // }

       $request->validate($this->rules);



        $pw = \Illuminate\Support\Str::random(8);

        $customer_arr = [

            'first_name' => $request['customer_first_name'],

            'last_name' => $request['customer_last_name'],

            'mobile_number' => $request['customer_mobile_number'],

            'email' => $request['customer_email'],

            'password' => Hash::make($pw),

            'status' => 'invited'

        ];



        /*add customer*/

        $user = User::create($customer_arr);



        if ($user) {



            $user->assignRole('customer');



            /*add customer detail*/

            $customer_detail_arr = [

                'user_id' => $user->id,

                'note' => $request['customer_detail_note']

            ];



            if ($request['customer_detail_agreed_to_receive_marketing_mails']) {

                $customer_detail_arr['agreed_to_receive_marketing_mails'] = 'yes';

            } else {

                $customer_detail_arr['agreed_to_receive_marketing_mails']= 'no';

            }



            if ($request['customer_detail_collect_tax']) {

                $customer_detail_arr['collect_tax'] = 'yes';

            } else {

                $customer_detail_arr['collect_tax'] = 'no';

            }





            if (!empty($request['customer_detail_tags'])) {

                $tags = strtolower($request['customer_detail_tags']).',';

                $tags_arr = explode(" ", $tags);

                $customer_detail_arr['tags'] = implode(',', $tags_arr);

                $create_tag = [];

                foreach ($tags_arr as $tag) {

                    $tag = trim($tag);

                    $exist = Tag::where('label', $tag)->first();



                    if (empty($exist)) {

                        $create_tag[] = ['label'=>$tag];

                    }

                }

                Tag::insert($create_tag);

            }



            CustomerDetail::create($customer_detail_arr);



            $address_arr = [];

            /*add customer address*/

            $customer_address_arr = [

                'company' => $request['customer_address_company'],

                'address' => $request['customer_address_address'],

                'apartment' => $request['customer_address_apartment'],

                'city' => $request['customer_address_city'],

                'country' => $request['customer_address_country'],

                'postal_code' => $request['customer_address_postal_code'],

                'user_id' => $user->id,

                'address_type' => 'shipping_address',

            ];



            if ($request['billing_address']) {

                $customer_address_arr['is_billing_address'] = 'no';

                $address_arr[] = $customer_address_arr;



                $customer_billing_address_arr = [

                    'company' => $request['customer_address_company'],

                    'address' => $request['customer_billing_address_address'],

                    'apartment' => $request['customer_billing_address_apartment'],

                    'city' => $request['customer_billing_address_city'],

                    'country' => $request['customer_billing_address_country'],

                    'postal_code' => $request['customer_billing_address_postal_code'],

                    'user_id' => $user->id,

                    'address_type' => 'billing_address',

                    'is_billing_address' => 'yes'

                ];

                $address_arr[] = $customer_billing_address_arr;



            } else {

                $customer_address_arr['is_billing_address'] = 'yes';

                $address_arr[] = $customer_address_arr;

            }



            CustomerAddress::insert($address_arr);



            $user['pw'] = $pw;

            /*$this->sendLoginDetail($user);*/



            session()->flash('message', 'Customer created.');

            return redirect(route('customers'));



        }

        session()->flash('message', 'Try Again.');





    }

}

