<div>
    <x-admin-layout>
        <style type="text/css">
            .bootstrap-tagsinput .tag {
                margin-right: 2px;
                color: #d64949;
            }
            .custom-addmorebtn {
                background: transparent !important;
                box-shadow: none;
                border: 1px solid #007ace !important;
                color: #007ace !important;
                padding: 7px 15px;
                border-radius: 3px;
                display: inline-block;
                font-weight: 600;
                margin: 0;
                line-height: 20px;
                display: flex;
                align-items: center;
                justify-content: space-between;
                float: right;
                outline: none !important;
                box-shadow: none !important;
            }
            .custom-deletebtn {
                color: #fff;
                background: #dc3545;
                border-color: #dc3545;
                box-shadow: none !important;
                outline: none !important;
            }
            #tab_logic{
                padding-top:30px;
                padding-bottom:60px;
            }

            body { 
                font-family: 'Ubuntu', sans-serif;
                font-weight: bold;
            }
            .select2-container {
              min-width: 400px;
            }

            .select2-results__option {
              padding-right: 20px;
              vertical-align: middle;
            }
            .select2-results__option:before {
              content: "";
              display: inline-block;
              position: relative;
              height: 20px;
              width: 20px;
              border: 2px solid #e9e9e9;
              border-radius: 4px;
              background-color: #fff;
              margin-right: 20px;
              vertical-align: middle;
            }
            .select2-results__option[aria-selected=true]:before {
              font-family:fontAwesome;
              content: "\f00c";
              color: #fff;
              background-color: #f77750;
              border: 0;
              display: inline-block;
              padding-left: 3px;
            }
            .select2-container--default .select2-results__option[aria-selected=true] {
                background-color: #fff;
            }
            .select2-container--default .select2-results__option--highlighted[aria-selected] {
                background-color: #eaeaeb;
                color: #272727;
            }
            .select2-container--default .select2-selection--multiple {
                margin-bottom: 10px;
            }
            .select2-container--default.select2-container--open.select2-container--below .select2-selection--multiple {
                border-radius: 4px;
            }
            .select2-container--default.select2-container--focus .select2-selection--multiple {
                border-color: #f77750;
                border-width: 2px;
            }
            .select2-container--default .select2-selection--multiple {
                border-width: 2px;
            }
            .select2-container--open .select2-dropdown--below {
                
                border-radius: 6px;
                box-shadow: 0 0 10px rgba(0,0,0,0.5);

            }
            .select2-selection .select2-selection--multiple:after {
                content: 'hhghgh';
            }
            /* select with icons badges single*/
            .select-icon .select2-selection__placeholder .badge {
                display: none;
            }
            .select-icon .placeholder {
                display: none;
            }
                .select-icon .select2-results__option:before,
                .select-icon .select2-results__option[aria-selected=true]:before {
                    display: none !important;
                    /* content: "" !important; */
                }
                .select-icon  .select2-search--dropdown {
                    display: none;
                }

                .select2-container {min-width: 100%;}
                .select2-container .select2-selection--multiple {min-height: 40px;
                    border: solid #c9cccf 1px !important; }

                .map-icon{
                    width: 20px;
                    border: 1px solid #ccc;
                    padding: 11px;
                    border-radius: 5px;
                }

                table.border-every-row tr {
                    border-bottom: 1px solid #e1e3e5;
                }
                table.border-every-row tr td {padding: 20px 0;}
                .product-table-item-data{ padding: 0 15px !important; }
                .product-table-item-data p{ padding-top: 5px !important; padding-bottom: 5px;  }
                .customer-modal-main .customer-modal-inner {
                    margin-top: 30px;
                }
        </style>
        <div wire:key="alert">
             @if (session()->has('message'))
             <div class="alert alert-success">
                {{ session('message') }}
             </div>
             @endif
          </div>
        @php $symbol = CurrencySymbol(); @endphp

        <section class="full-width mt-4 flex-wrap admin-body-width add-customer-head-sec product-details-header">
            <article class="full-width">
                <div class="columns customers-details-heading">
                    <div class="page_header d-flex  align-item-center mb-3">
                        <a href="{{ route('products') }}">
                            <button class="secondary icon-arrow-left mr-2">
                                <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M17 9H5.414l3.293-3.293a.999.999 0 1 0-1.414-1.414l-5 5a.999.999 0 0 0 0 1.414l5 5a.997.997 0 0 0 1.414 0 .999.999 0 0 0 0-1.414L5.414 11H17a1 1 0 1 0 0-2z"></path></svg>
                            </button>
                        </a>
                        <h4 class="mb-0 fw-5">Shipping and delivery</h4>
                    </div>
                </div>
            </article>
            
            <section  class="full-width flex-wrap admin-body-width customers-details-sec product-details-sec">
                 <article class="full-width">
                    <div class="columns">
                        <div class="card">                
                            <div id="tab_logic" class="after-add-more">
                               <div class="col-md-2">
                                   <button class="btn text-white btn-info btn-sm custom-addmorebtn" data-toggle="modal" data-target="#add-shipping-modal">Add Shipping Zone</button>
                               </div>
                            </div>
                            <table class="one-bg  border-every-row fs-14 fw-3 table-padding-side0 tc-black01 comman-th product-listing" id="myTable">
                                <tbody id="product-name">
                                    <?php foreach ($shipping_zones as $key => $getzone): ?> 
                                        <tr>
                                            <td>
                                                <div class="map-icon"><span class="Polaris-Icon_yj27d Polaris-Icon--colorBase_nqlaq Polaris-Icon--applyColor_2y25n"><span class="Polaris-VisuallyHidden_yrtt5"></span><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path fill-rule="evenodd" d="M18 8c0-4.42-3.58-8-8-8S2 3.58 2 8c0 .15 0 .29.01.44.13 3.55 1.99 7.62 7.13 11.29.51.36 1.21.36 1.72 0 5.14-3.67 7-7.74 7.13-11.29.01-.15.01-.29.01-.44zm-5.879 2.121a2.996 2.996 0 0 0 0-4.242 2.996 2.996 0 0 0-4.242 0 2.996 2.996 0 0 0 0 4.242 2.996 2.996 0 0 0 4.242 0z"></path></svg></span></div>
                                            </td>
                                            <td class="product-table-item px-5 product-table-item-data">
                                                <a href="" class="fs-14 fw-6 mb-0 black-color">{{$getzone['name']}}</a>
                                                <p class="mb-0 text-grey">{{$getzone['description']}}</p>
                                            </td>
                                            <td class="product-table-item" width="140px">
                                               <a class="button green-btn mr-0" onclick="zoneEdit({{$getzone['id']}})">Edit</a>
                                               <a class="button custom-deletebtn" wire:click.prevent="deleteZone({{$getzone['id']}})">Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                            <div class="more-feilds"></div>
                        </div>
                    </div>
                </article>
            </section>

        </section>

        <!--Edit location modal-->
    
        <div id="add-shipping-modal" class="customer-modal-main" wire:ignore.self>
            <div class="customer-modal-inner">
                <div class="customer-modal">
                    <div class="modal-header">
                        <h2>Add Shipping Zone</h2>
                        <span data-dismiss="modal" class="modal-close-btn">
                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                                <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>
                            </svg>
                        </span>
                    </div>
        
                    <div class="modal-body card">
                        <div class="shipping-details-wrap text-left">
                            <div class="form-group mb-2">
                               <label >Title</label>
                               <input type="text" wire:model="zone.name" wire:ignore>
                            </div>

                            <div class="form-group mb-2">
                               <label >Description</label>
                               <div class="col-md-9">
                                   <textarea  rows="8" wire:model="zone.description" class="form-control required"  wire:ignore></textarea>
                               </div>
                            </div>

                            <div class="d-flex">
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                       <label >Start</label>
                                       <div class="col-md-9">
                                            <input type="number" min="0" wire:model="zone.start" wire:ignore>
                                       </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                       <label >End</label>
                                       <div class="col-md-9">
                                            <input type="number" min="0" wire:model="zone.end" wire:ignore>
                                       </div>
                                    </div>
                                </div>
                            </div>

                           <div class="form-group mb-2">
                               <label>Price</label>
                               <input type="number" min="0" wire:model="zone.price" wire:ignore>
                            </div>

                            <div class="form-group mb-2" wire:ignore>
                                <label class="pb-1">Select Countries</label>
                                <select name="countries" id="countries" class="form-control js-select2" multiple="multiple">
                                    <?php foreach ($countries_list as $key => $value): ?>
                                        <option value="{{$value->code}}" data-badge="{{$value->code}}">{{$value->name}}</option>
                                    <?php endforeach ?>
                                </select>
                                <input type="checkbox" id="checkbox" >Select All
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="button secondary" data-dismiss="modal">Cancel</a>
                        <a class="button green-btn" wire:click.prevent="addShipping()">Save</a>
                    </div>
                </div>
            </div>
        </div>

        <div id="edit-shipping-modal" class="customer-modal-main" wire:ignore.self>
            <div class="customer-modal-inner">
                <div class="customer-modal">
                    <div class="modal-header">
                        <h2>Edit Shipping Zone</h2>

                        <span data-dismiss="modal" class="modal-close-btn">
                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                                <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>
                            </svg>
                        </span>
                    </div>
        
                    <div class="modal-body card">
                        <div class="shipping-details-wrap text-left">
                            <div class="form-group mb-2" >
                               <label >Title</label>
                               <input type="text" wire:model="update_zone_data.name" wire:ignore>
                            </div>

                            <div class="form-group mb-2">
                               <label >Description</label>
                               <div class="col-md-9">
                                   <textarea rows="8" wire:model="update_zone_data.description" class="form-control required"  wire:ignore></textarea>
                               </div>
                            </div>

                            <div class="d-flex">
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                       <label >Start</label>
                                       <div class="col-md-9">
                                            <input type="number" min="0" wire:model="update_zone_data.start" wire:ignore>
                                       </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                       <label >End</label>
                                       <div class="col-md-9">
                                            <input type="number" min="0" wire:model="update_zone_data.end" wire:ignore>
                                       </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-2">
                               <label>Price</label>
                               <input type="number" min="0" wire:model="update_zone_data.price" wire:ignore>
                            </div>

                            <div class="form-group mb-2">
                                <label class="pb-1">Select Countries</label>
                                <select name="countriess" id="countriess" class="form-control js-select2" multiple="multiple">
                                    <?php foreach ($countries_list as $key => $value): ?>
                                        <option value="{{$value->code}}" data-badge="{{$value->code}}" <?php echo (in_array($value->code,$seleced_countries)) ? 'selected':''; ?>>{{$value->name}}</option>
                                    <?php endforeach ?>
                                </select>
                                <input type="checkbox" id="checkbox1" >Select All
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="button secondary" data-dismiss="modal">Cancel</a>
                        <a class="button green-btn" onclick="updateZone()">Save</a>
                    </div>
                </div>
            </div>
        </div>

    </x-admin-layout>
        
    </div>

    <script type="text/javascript">
        $("#checkbox").click(function(){
            console.log('ok')
            if($("#checkbox").is(':checked') ){
                $('#countries').select2('destroy').find('option').prop('selected', 'selected').end().select2();
            }else{
                $('#countries').select2('destroy').find('option').prop('selected', false).end().select2();
            }
        });

        $("#checkbox1").click(function(){
            console.log('ok')
            if($("#checkbox1").is(':checked') ){
                $('#countriess').select2('destroy').find('option').prop('selected', 'selected').end().select2();
            }else{
                $('#countriess').select2('destroy').find('option').prop('selected', false).end().select2();
            }
        });
    </script>
    @livewireScripts
     <script>

       

        $(document).on('keypress', 'input,textarea', function(event) {
            //event.preventDefault();
            /* Act on the event */
            setTimeout(function() {
                $('#countriess').select2();
            }, 1000);
        });

        $(document).ready(function () {
            $('#countries').select2();
            $('#countries').on('change', function (e) {
                var data = $(this).select2("val");
                @this.set('zone.countries', data);
            });
        });

        function zoneEdit(id) {
            @this.edit(id)
            setTimeout(function() {
                $('#countriess').select2();
                $('#edit-shipping-modal').modal('show');
            }, 500);
        }

        function updateZone() {
            setTimeout(function() {
                var data = $('#countriess').select2("val");
                @this.set('update_zone_data.countries', data);
                @this.updateShipping();
            }, 500);
        }

    </script>

    
    
    
    
    
    
    
    
    
    
    