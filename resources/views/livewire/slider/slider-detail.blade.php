<div>
<x-admin-layout>
    <style>
        #custom-sliderbtn{
            background: linear-gradient(180deg, #6371c7, #5563c1);
            color: #fff;
        }
    </style>
    <div wire:key="alert">

     @if (session()->has('message'))

     <div class="alert alert-success">

        {{ session('message') }}

     </div>

     @endif

    </div>
    <section class="full-width admin-body-width flex-wrap admin-full-width inventory-heading">
        <article class="full-width">
            <div class="columns customers-details-heading">
                <div class="page_header d-flex  align-item-center">
                    <a href="{{ route('slider-list') }}">
                        <button class="secondary icon-arrow-left mr-2">
                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M17 9H5.414l3.293-3.293a.999.999 0 1 0-1.414-1.414l-5 5a.999.999 0 0 0 0 1.414l5 5a.997.997 0 0 0 1.414 0 .999.999 0 0 0 0-1.414L5.414 11H17a1 1 0 1 0 0-2z"></path></svg>
                        </button>
                    </a>
                    <h4 class="mb-0 fw-5">Create Slider</h4>
                </div>
            </div>
        </article>
    </section>
<form action="{{ route('collections-store-create') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <section class="full-width admin-body-width flex-wrap admin-full-width bd_none add-transfers-sec">
        <article class="full-width">
            <div class="columns two-thirds">
                <div class="card">
                    <label>Title</label>
                    <input type="text" name="title" wire:model="slider.title" placeholder="Enter Title">
                    <label>Button Text</label>
                    <input type="text" name="buttne_text" wire:model="slider.buttne_text" placeholder="Enter Button Text">
                    <label>Button Link</label>
                    <input type="text" name="button_link" wire:model="slider.button_link" placeholder="Enter Button Link">
                    <label>Select page</label>
                    <select name="customer_phone_code" wire:model="slider.page_id" class="country-drop" id="customer_phone_code" >
                        <option value=""><i class="fa fa-globe"></i></option>
                        @foreach($pageget as $row)
                            <option value="{{$row->id}}">{{$row->title}}
                            </option>
                        @endforeach
                    </select>
                    <div class="product-des-customize">
                        <label>Description (optional)</label>
                        <div class="product-des-customize-inner">

                            <div class="product-dec-textbox">

                                 <textarea wire:model="slider.description" class="form-control required" name="descripation" id="descripation"></textarea>

                                 @error('description') <span class="text-danger">{{ $message }}</span>@enderror

                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="columns one-third right-details" wire:ignore>  
                <div class="card pd-20 tag-card card-grey-bg collection-upload-image">
                    <div class="header-title">
                        <h3 class="fs-16  fw-6 mb-0">Slider image</h3>
                    </div>

                    <div class="single-upload-img" wire:ignore>
                        <input type='file' id="readUrl" wire:model="slider_image" accept=".png, .jpg, .jpeg">
                        <label for="et_pb_contact_brand_file_request_0" class="et_pb_contact_form_label custome-file-upload">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 0c5.514 0 10 4.486 10 10s-4.486 10-10 10S0 15.514 0 10 4.486 0 10 0zm1 8.414l1.293 1.293a1 1 0 101.414-1.414l-3-3a.998.998 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 8.414V14a1 1 0 102 0V8.414z" fill="#5C5F62"></path></svg>
                            <p class="secondary">Add image</p>
                            <span class="fs-12">or drop an image to upload</span>
                        </label>

                         @if(!empty($slider->slider_image))
                        <img id="uploadedImage" src="{{ asset('storage/'.$slider->slider_image) }}" alt="Uploaded Image" accept="image/png, image/jpeg">
                        @else
                        <img id="uploadedImage" src="{{ asset('storage/'.$slider->slider_image) }}" alt="Uploaded Image" accept="image/png, image/jpeg" style="display:none;">
                        @endif
                        
                    </div>
                    


               <!--      <div class="avatar-upload">
                        <div class="avatar-edit">
                            <input type='file' id="logoUpload" wire:model="slider_image" accept=".png, .jpg, .jpeg" />
                            <img src="{{ asset('assets/images/upload-icon.svg') }}">
                            <button class="secondary">Add logo</button>
                            <label for="logoUpload">or drop files to upload</label>
                        </div>
                        @if(!empty($slider->slider_image))
                        <div class="avatar-preview"> 
                             <img id="uploadedImage" src="{{ asset('storage/'.$slider->slider_image) }}" alt="Uploaded Image" accept="image/png, image/jpeg">
                        </div>
                        @else
                        <div class="avatar-preview">
                            <div id="uploadedImage" style="background-image: url(); display: block;">
                            </div>
                        </div>
                        @endif
                    </div> -->
                </div>
            </div>
        </article>
    </section>
    <section class="full-width flex-wrap admin-body-width create-collection-footer" wire:ignore>
        <div class="page-bottom-btn">
             <button class="button green-btn" id="custom-sliderbtn" wire:ignore wire:click.prevent="update()">Save</button>
        </div>
    </section>
    
    <!--Edit products modal-->
    <div id="collection-edit-product-modal" class="customer-modal-main">
        <div class="customer-modal-inner">
            <input type="hidden" wire:model="customer.id" value="">
            <div class="customer-modal">
                <div class="modal-header">
                    <h2>Edit products</h2>
                    <span onclick="document.getElementById('collection-edit-product-modal').style.display='none'" class="modal-close-btn">
                        <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                            <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>
                        </svg>
                    </span>
                </div>
                <div class="modal-footer">
                    <a class="button secondary" onclick="document.getElementById('collection-edit-product-modal').style.display='none'">Cancel</a>
                    <a class="button green-btn" onclick="document.getElementById('collection-edit-product-modal').style.display='none'">Done</a>
                </div>
            </div>
        </div>
    </div>
    
    
</form>
    <script>
        $(document).ready(function(){
          $("#search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            console.log(value);
            console.log('hello');
            $(".manage-carriers-list").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
        document.getElementById('readUrl').addEventListener('change', function(){
          if (this.files[0] ) {
            var picture = new FileReader();
            picture.readAsDataURL(this.files[0]);
            picture.addEventListener('load', function(event) {
              document.getElementById('uploadedImage').setAttribute('src', event.target.result);
              document.getElementById('uploadedImage').style.display = 'block';
            });
          }
        });
    </script>
    <script>
        $(".edit-website-seo-btn").click(function() {     
            $('.search-engine-listing-card .card-middle').toggle();
        });
    </script>
   
</x-admin-layout>
</div>