<?php



namespace App\Http\Livewire\Customer;



use App\Exports\CustomersExport;

use App\Imports\CustomersImport;

use App\Models\Country;

use App\Models\Filter;

use App\Models\User;

use App\Models\order_item;

use App\Models\Orders;

use Carbon\Carbon;

use Carbon\Language;

use Illuminate\Http\Request;

use Illuminate\Pagination\Paginator;

use Illuminate\Support\Facades\Auth;

use Livewire\Component;

use Livewire\WithFileUploads;

use Livewire\WithPagination;

use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Pagination\LengthAwarePaginator;




class ListCustomers extends Component

{

    use WithFileUploads, WithPagination;



    public $customers, $email_status, $tagged_with, $account_status, $amount_spent, $number_of_orders, $filter_customers,

        $date_of_order, $date_added_as_customer, $abandoned_checkout, $customer_language, $location, $countries, $save_filter,

        $filter_tabs, $active_tab, $sort_by, $export, $export_as, $selected_file, $orderget, $order_item;

    public $filter = [], $languages = [];

     public $perPage = 10;
     
     public $exact_orders, $more_than_orders, $less_than_orders;
     
     public $exact_amount, $more_than_amount, $less_than_amount;

    

    // protected $paginationTheme = 'bootstrap';



    public function mount()

    {

        $this->active_tab = 'All';

        $this->export = 'Current Page';

        $this->export_as = 'Csv';

        

        $this->getFilters();

        $this->getCustomers();

        $this->getCountries();

        $this->getLanguages();

    }



    public function render()

    {

        $filter_clone = $this->filter;

        $this->getCustomers();

        if ($filter_clone != $this->filter) {

           $this->resetPage();

        }

                

        $items = $this->customers->forPage($this->page, $this->perPage);

        $paginator = new LengthAwarePaginator($items, $this->customers->count(), $this->perPage, $this->page);




        // $offset = max(0, ($this->page - 1) * $this->perPage);

        // $items = $this->customers->slice($offset, $this->perPage + 1);

        // $paginator  = new Paginator($items, $this->perPage, $this->page);
        
      //  $paginator  = User::query()->paginate($this->perPage);

        return view('livewire.customer.list-customers', ['users'=> $paginator]);

    }



    public function getCustomers()

    {

        $this->filter = [];

        $this->order_item = order_item::with('order_product')->with('media_product')->orderBy('id', 'DESC')->get();
        
        $this->orderget = Orders::get(); 

        $this->customers = User::with(['detail', 'address' => function ($q) {

            return $q->where('address_type', 'shipping_address');



        }])->withCount('orders')->when($this->email_status, function ($query, $email_status) {



            $this->filter[0] = $email_status;





            if ($email_status == 'Subscribed') {

                $query->whereHas('detail', function ($q) {

                    return $q->where('agreed_to_receive_marketing_mails', 'yes');

                });

            } elseif ($email_status == 'Not subscribed') {

                $query->whereHas('detail', function ($q) {

                    return $q->where('agreed_to_receive_marketing_mails', 'no');

                });

            }

            



        })->when($this->tagged_with, function ($query, $tagged_with) {

            $tagged_with = trim($tagged_with);

            $query->whereHas('detail', function ($q) use ($tagged_with) {

                return $q->where('tags', 'LIKE', '%' . $tagged_with . '%');

            });



            $this->filter[1] = $tagged_with;





        })->when($this->account_status, function ($query, $account_status) {



            $this->filter[2] = $account_status;



            if ($account_status == 'Disabled account') {

                $query->whereNull('email_verified_at');

            } else {

                if ($account_status == 'Active account') $query->where('email_verified_at','!=', '');

                if ($account_status == 'Disabled account') $query->whereNull('email_verified_at');

               /* if ($account_status == 'Invited to create account') $query->where('status', 'invited');

                if ($account_status == 'Declined account invitation') $query->where('status', 'declined');*/

            }

        })->when($this->customer_language, function ($query, $customer_language) {



            $this->filter[3] = 'Shops in ' . $customer_language;

         

        })->when($this->more_than_amount, function ($query, $more_than_amount) {

            $this->filter[4] = 'More than '. $more_than_amount. ' amount';

        })->when($this->less_than_amount, function ($query, $less_than_amount) {

            $this->filter[12] = 'Less than '. $less_than_amount. ' amount';

        })->when($this->exact_amount, function ($query, $exact_amount) {

            $this->filter[13] = 'Exact '. $exact_amount. ' amount';
            
        })
        
        ->when($this->more_than_orders, function ($query, $more_than_orders) {

            $this->filter[5] = 'More than '. $more_than_orders. ' orders';

        })->when($this->less_than_orders, function ($query, $less_than_orders) {

            $this->filter[10] = 'Less than '. $less_than_orders. ' orders';

        })->when($this->exact_orders, function ($query, $exact_orders) {

            $this->filter[11] = 'Exact '. $exact_orders. ' orders';

        })->when($this->date_of_order, function ($query, $date_of_order) {



            $this->filter[6] = 'Ordered in last  ' . $date_of_order;

            $days = explode(' ', $date_of_order); 

            if ($days[1] == "month") {

                $query->whereHas('orders', function ($q) use ($days) {

                    return $q->whereDate('created_at', '>', Carbon::now()->subMonths($days[0])->toDateString());

                });

            }

            if ($days[1] == "days") {

                $query->whereHas('orders', function ($q) use ($days){

                    $q->whereDate('created_at', '>', Carbon::now()->subMonths($days[0])->toDateString());

                });

            }

        })->when($this->date_added_as_customer, function ($query, $date_added_as_customer) {



            $this->filter[7] = 'Customer added in last ' . $date_added_as_customer;

            $days = explode(' ', $date_added_as_customer);

            if ($days[1] == "month") {

                $query->whereDate('created_at', '>', Carbon::now()->subMonths($days[0])->toDateString());

            }

            if ($days[1] == "days") {

                $query->whereDate('created_at', '>', Carbon::now()->subDays($days[0])->toDateString());

            }

           

        })->when($this->abandoned_checkout, function ($query, $abandoned_checkout) {



            $this->filter[8] = 'Abandoned checkout in last  ' . $abandoned_checkout;

          

        })->when($this->location, function ($query, $location) {



            $this->filter[9] = 'From ' . $location;

            $query->whereHas('address', function ($q) use ($location) {

                return $q->where('country', $location)->where('address_type', 'shipping_address');

            });

           

        })->when($this->filter_customers, function ($query, $filter_customers) {



            $query->where('first_name', 'LIKE', '%' . $filter_customers . '%')->orWhere('last_name', 'LIKE', '%' . $filter_customers . '%')->orWhere('mobile_number', 'LIKE', '%' . $filter_customers . '%')->orWhere('email', 'LIKE', '%' . $filter_customers . '%')

                ->orWhereHas('address', function ($q) use ($filter_customers) {

                    return $q->where('address_type', 'shipping_address')->where(function ($qu) use ($filter_customers) {

                        $qu->where('country', 'LIKE', '%' . $filter_customers . '%')->orWhere('city', 'LIKE', '%' . $filter_customers . '%');

                    });

                });

               

        })->when($this->sort_by, function ($query, $sort_by) {



            if ($sort_by == 'UPDATED_AT+desc') {

                return $query->orderBy('updated_at', 'desc');



            } elseif ($sort_by == 'UPDATED_AT+asc') {

                return $query->orderBy('updated_at', 'asc');



            } elseif ($sort_by == 'CREATED_AT+desc') {

                return $query->orderBy('created_at', 'desc');



            } elseif ($sort_by == 'CREATED_AT+asc') {

                return $query->orderBy('created_at', 'asc');



            }

            

        })/*->role('customer')*/->orderBy('updated_at', 'desc')->get();



    }



    public function getCountries()

    {

        $this->countries = Country::all();

    }



    public function getLanguages()

    {

        $this->languages = Language::all();

    }



   



    public function saveFilter($mode)

    {

        if ($mode == 'create') {

            Filter::create([

                'user_id' => Auth::user()->id,

                'name' => $this->save_filter,

                'data' => json_encode($this->filter)

            ]);

            $this->active_tab = $this->save_filter;

        } else {

            $filter = Filter::where('user_id', Auth::user()->id)->where('name', $this->active_tab)->first();

            $filter->update(['name' => $this->save_filter]);

            $this->active_tab = $this->save_filter;

        }



        $this->getFilters();

    }



    public function getFilters()

    {

        $this->filter_tabs = Filter::where('user_id', Auth::user()->id)->get();

    }



    public function cancelFilter()

    {

        $this->save_filter = null;

    }



    public function removeFilter($key)

    {

        switch ($key) {

            case 0:

                $this->email_status = null; break;

            case 1:

                $this->tagged_with = null; break;

            case 2:

                $this->account_status = null; break;

            case 3:

                $this->customer_language = null; break;

            case 4:

                $this->amount_spent = null;
                $this->more_than_amount = null;
                $this->less_than_amount = null;
                $this->exact_amount = null;
                break;

            case 5:

                $this->number_of_orders = null;
                $this->more_than_orders = null;
                $this->less_than_orderss = null;
                $this->exact_orders = null;  break;

            case 6:

                $this->date_of_order = null; break;

            case 7:

                $this->date_added_as_customer = null; break;

            case 8:

                $this->abandoned_checkout = null; break;

            case 9:

                $this->location = null; break;

        }



        unset($this->filter[$key]);

    }



    public function activeTab($tab)

    {

        $this->active_tab = $tab['name'];

        $tab['data'] = json_decode($tab['data'], true);

        $this->removeAllFilters();

        foreach ($tab['data'] as $key => $value) {

            switch ($key) {

                case 0:

                    if (isset($tab['data'][0])) $this->email_status = $tab['data'][0];

                case 1:

                    if (isset($tab['data'][1])) $this->tagged_with = $tab['data'][1];

                case 2:

                    if (isset($tab['data'][2])) $this->account_status = $tab['data'][2];

                case 3:

                    if (isset($tab['data'][3])) $this->customer_language = $tab['data'][3];

                case 4:

                    if (isset($tab['data'][4])) $this->amount_spent = $tab['data'][4]; $this->more_than_amount = $tab['data'][4];

                case 5:

                    if (isset($tab['data'][5])) $this->number_of_orders = $tab['data'][5]; $this->more_than_orders = $tab['data'][5];

                case 6:

                    if (isset($tab['data'][6])) $this->date_of_order = $tab['data'][6];

                case 7:

                    if (isset($tab['data'][7])) $this->date_added_as_customer = $tab['data'][7];

                case 8:

                    if (isset($tab['data'][8])) $this->abandoned_checkout = $tab['data'][8];

                case 9:

                    if (isset($tab['data'][9])) $this->location = $tab['data'][9];

                case 10:

                    if (isset($tab['data'][10])) $this->less_than_orders = $tab['data'][10];

                case 11:

                    if (isset($tab['data'][11])) $this->exact_orders = $tab['data'][11];

                case 12:

                    if (isset($tab['data'][12])) $this->less_than_amount = $tab['data'][12];

                case 13:

                    if (isset($tab['data'][13])) $this->exact_amount = $tab['data'][13];

            }

        }

        $this->save_filter = $tab['name'];





    }



    public function removeTab()

    {

        Filter::where('name', $this->save_filter)->where('user_id', Auth::user()->id)->delete();

        $this->removeAllFilters();

        $this->cancelFilter();

        $this->getFilters();

    }



    public function removeAllFilters()

    {

        $this->filter = [];

        $this->email_status = null;

        $this->tagged_with = null;

        $this->account_status = null;

        $this->customer_language = null;

        $this->amount_spent = null;

        $this->more_than_amount = null;
        
        $this->less_than_amount = null;
        
        $this->exact_amount = null;
        
        $this->more_than_orders = null;
        
        $this->less_than_orders = null;
        
        $this->exact_orders = null;

        $this->date_of_order = null;

        $this->date_added_as_customer = null;

        $this->abandoned_checkout = null;

        $this->location = null;

    }



    public function importCustomers(Request $request) {

        $request->validate([

            'file' => 'required'

        ]);

        Excel::import(new CustomersImport, request()->file('file'));

        return back()->with('success', 'Updated Records successfully.');

    }



    public function exportCustomers() {

        return Excel::download(new CustomersExport($this->export, $this->perPage, $this->page, $this->customers->pluck('id')), 'customers.xlsx');

    }



}

