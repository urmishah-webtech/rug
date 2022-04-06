<div>
<x-admin-layout>
    <style>
        .container {
            box-shadow: 0 0 0 1px rgb(63 63 68 / 5%), 0 1px 3px 0 rgb(63 63 68 / 15%);
            color: #1a1919;
            box-sizing: border-box;
            margin-bottom: 0;
            padding: 2rem;
            background-color: #ffffff;
            border-radius: 8px;
            margin-bottom: 16px;
        }
        
        .question {
            padding-bottom: 7px;
          font-weight: 600;
          
          position: relative;
          display: flex;
          align-items: center;
          cursor: pointer;
        }
        .answer .card{
            padding:0 !important;
        }
        
        .question::after {
            background-image: url(../../assets/images/arrow-down.png);
    content: "";
    position: absolute;
    display: block;
    background-size: 100%;
    width: 14px;
    height: 14px;
    right: 10px;
        }
        
        .question.active::after {
          transform: rotate(180deg);
        }
        
        .answercont {
          max-height: 0;
          overflow: hidden;
          transition: 0.3s;
        }
        
        .answer {
          
          line-height: 1.5rem;
        }
        
        .question.active + .answercont {
        }
        
        label {
            margin-top: 10px !important;
            margin-bottom: 10px !important;
        }
        
        @media screen and (max-width: 790px){
         
          .wrapper {
          width: 80%;
        }
        }
            </style>
    <div wire:key="alert">

         @if (session()->has('message'))

         <div class="alert alert-success">

            {{ session('message') }}

         </div>

         @endif

      </div>
    <section class="full-width flex-wrap admin-body-width create-page-header">
        <article class="full-width">
            <div class="columns customers-details-heading">
                <div class="page_header d-flex  align-item-center mb-3">
                    <a href="{{ route('pages-list') }}">
                        <button class="secondary icon-arrow-left mr-2">
                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                                <path d="M17 9H5.414l3.293-3.293a.999.999 0 1 0-1.414-1.414l-5 5a.999.999 0 0 0 0 1.414l5 5a.997.997 0 0 0 1.414 0 .999.999 0 0 0 0-1.414L5.414 11H17a1 1 0 1 0 0-2z"></path>
                            </svg>
                        </button> 
                    </a>
                    <h4 class="mb-0 fw-5">{{$page->title}}</h4>
                </div>
                <div class="product-header-btn">
                   <!--  <button class="button link" onclick="document.getElementById('duplicate-page').style.display='block'"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M7.5 2A1.5 1.5 0 0 0 6 3.5V13a1 1 0 0 0 1 1h9.5a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 16.5 2h-9zm-4 4H4v10h10v.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 16.5v-9A1.5 1.5 0 0 1 3.5 6z"></path></svg> Duplicate</button> -->
                   
                   <!--  <div class="pagination">
                        <span class="button-group">
                        <button class="secondary icon-prev"></button>
                        <button class="secondary icon-next"></button>
                        </span>
                    </div> -->
                </div>
            </div>
        </article>
    </section>
    <section class="full-width flex-wrap bd_none admin-body-width" wire:ignore>
        <article class="full-width">
            <div class="columns two-thirds">
              
                <div class="card">
                    <div class="row">
                        <label>Main Title</label>
                        <input type="text" name="title" wire:model="page.title">
                    </div>

                    <div class="row">
                        <label>Title</label>
                        <input type="text" name="title" wire:model="page.title1">
                    </div>
                    @if($page->id != 13)
                    <div wire:ignore class="form-group row">
                        <label>Content</label>
                        <div class="col-md-9">
                            <textarea wire:model="page.content" class="form-control required" name="description" id="description"></textarea>
                        </div>
                    </div>
                    @endif
                    @if($page->id == 14)
                    <div class="row field_style1 mb-2">
                        <label>Image</label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="image" wire:model="image" accept=".png, .jpg, .jpeg" />
                                <img src="{{ url('assets/images/upload-icon.svg') }}">
                                <button class="secondary">Add Image</button>
                                <label for="logoUpload">or drop files to upload</label>
                            </div>
                            @if(!empty($page->image3))
                            <div class="avatar-preview">  
                                <div id="logoPreview" style="background-image: url({{ url('storage/'.$page->image3) }}); display: block;">
                                </div>
                            </div>
                            @else
                            <div class="avatar-preview">
                                <div id="logoPreview" style="background-image: url();">
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endif

                    @if($page->id == 10 || $page->id == 15)
                    <div class="row field_style1 mb-2">
                        <label>Image</label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="image" wire:model="image" accept=".png, .jpg, .jpeg" />
                                <img src="{{ url('assets/images/upload-icon.svg') }}">
                                <button class="secondary">Add Image</button>
                                <label for="logoUpload">or drop files to upload</label>
                            </div>
                            @if(!empty($page->image))
                            <div class="avatar-preview">  
                                <div id="logoPreview" style="background-image: url('{{ url('storage/'.$page->image) }}'); display: block;">
                                </div>
                            </div>
                            @else
                            <div class="avatar-preview">
                                <div id="logoPreview" style="background-image: url();">
                                </div>
                            </div>
                            @endif
                        </div>
                        <label>Button Name</label>
                        <input type="text" name="button_name" wire:model="page.button_name">
                        <label>Button Link</label>
                        <input type="text" name="button_url" wire:model="page.button_url">
                    </div>
                    @endif
                </div>
                 <!-- Start GIFT CARD  -->

                 <div class="wrapper">

                @if($page->id == 15)
                <div class="container">
                    <div class="question">
                        Pick a Color
                    </div>
                    <div class="answercont">
                      <div class="answer">
                <div class="card">
                    <div class="row">
                        <label>Title</label>
                        <input type="text" name="title3" wire:model="page.title3">
                    </div>
                    <div wire:ignore class="form-group row">
                        <label>Content</label>
                        <div class="col-md-9">
                            <textarea wire:model="page.descripation3" class="form-control required" name="description1" id="description1"></textarea>
                        </div>
                    </div>
                    <div class="row field_style1 mb-2">
                        <label>Image</label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="image3" wire:model="image3" accept=".png, .jpg, .jpeg" />
                                <img src="{{ url('assets/images/upload-icon.svg') }}">
                                <button class="secondary">Add Image</button>
                                <label for="logoUpload">or drop files to upload</label>
                            </div>
                            @if(!empty($page->image3))
                            <div class="avatar-preview">  
                                <div id="logoPreview" style="background-image: url({{ url('storage/'.$page->image3) }}); display: block;">
                                </div>
                            </div>
                            @else
                            <div class="avatar-preview">
                                <div id="logoPreview" style="background-image: url();">
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                

            </div>
        </div>
      </div>
    
 
                @endif

            

                @if($page->id == 15)
                <div class="container">
                    <div class="question">
                        Knotted vs. Flat
                    </div>
                    <div class="answercont">
                      <div class="answer">
                <!-- Knotted vs. Flat -->
                <div class="card">
                    <div class="row">
                        <label>Title</label>
                        <input type="text" name="title" wire:model="page.title5">
                    </div>
                    <div wire:ignore class="form-group row">
                        <label>Content</label>
                        <div class="col-md-9">
                            <textarea wire:model="page.desctipation5" class="form-control required" name="desctipation5" id="desctipation5"></textarea>
                        </div>
                    </div>
                    <div class="row field_style1 mb-2">
                        <label>Image</label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="flat_image1" wire:model="flat_image1" accept=".png, .jpg, .jpeg" />
                                <img src="{{ url('assets/images/upload-icon.svg') }}">
                                <button class="secondary">Add Image</button>
                                <label for="logoUpload">or drop files to upload</label>
                            </div>
                            @if(!empty($page->flat_image1))
                            <div class="avatar-preview">  
                                <div id="logoPreview" style="background-image: url({{ url('storage/'.$page->flat_image1) }}); display: block;">
                                </div>
                            </div>
                            @else
                            <div class="avatar-preview">
                                <div id="logoPreview" style="background-image: url();">
                                </div>
                            </div>
                            @endif
                        </div>
                            <label>Button Name</label>
                            <input type="text" name="button_name2" wire:model="page.button_name2">
                            <label>Button Link</label>
                            <input type="text" name="button_link2" wire:model="page.button_link2">

                        <div class="avatar-upload">
                            <label>Image</label>
                            <div class="avatar-upload">
                                <div class="avatar-edit">
                                    <input type='file' id="flat_image2" wire:model="flat_image2" accept=".png, .jpg, .jpeg" />
                                    <img src="{{ url('assets/images/upload-icon.svg') }}">
                                    <button class="secondary">Add Image</button>
                                    <label for="logoUpload">or drop files to upload</label>
                                </div>
                                @if(!empty($page->flat_image2))
                                <div class="avatar-preview">  
                                    <div id="logoPreview" style="background-image: url({{ url('storage/'.$page->flat_image2) }}); display: block;">
                                    </div>
                                </div>
                                @else
                                <div class="avatar-preview">
                                    <div id="logoPreview" style="background-image: url();">
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                        <label>Button Name</label>
                        <input type="text" name="button_name5" wire:model="page.button_name5">
                        <label>Button Link</label>
                        <input type="text" name="button_link5" wire:model="page.button_link5">
                    </div>
                </div>

            </div>
        </div>
      </div>
                @endif

            

                @if($page->id == 15)
                <div class="container">
                    <div class="question">
                        10,000 Years of Tradition.
                    </div>
                    <div class="answercont">
                      <div class="answer">
                <!-- Collection -->
                <div class="card">
                    <div class="row">
                        <label>Title</label>
                        <input type="text" name="title6" wire:model="page.title6">
                    </div>
                    <div class="row field_style1 mb-2">
                        <label>Video Upload</label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="product_image1" wire:model="product_image1" accept=".png, .jpg, .jpeg" />
                                <img src="{{ url('assets/images/upload-icon.svg') }}">
                                <button class="secondary">Add Video</button>
                            </div>
                        </div>
                         @if(!empty($page->product_image1))
                            <div class="avatar-preview">  
                                <video width="320" height="240" controls>
                                  <source id="logoPreview"  src="{{ url('storage/'.$page->product_image1) }}" type="video/mp4">
                                Your browser does not support the video tag.
                                </video>
                            </div>
                            @else
                            <div class="avatar-preview">
                                <div id="logoPreview" style="background-image: url();">
                                </div>
                            </div>
                            @endif
                    </div>
                </div>

            </div>
        </div>
      </div>
                @endif

    </div>


                <!-- END GIFT CARD  -->
                
                <!-- Start Size Guide -->
                @if($page->id == 16)
                <div class="card">
                    <div class="row">
                        <label>Small Rugs</label>
                        <input type="text" name="title2" wire:model="page.title2">
                    </div>
                    <div class="row">
                        <label>Comman Sizes (ft):</label>
                        <input type="text" name="videolink" wire:model="page.video_link">
                    </div>
                    <div class="row field_style1 mb-2">
                        <label>Image 1</label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="image3" wire:model="image3" accept=".png, .jpg, .jpeg" />
                                <img src="{{ url('assets/images/upload-icon.svg') }}">
                                <button class="secondary">Add Image</button>
                                <label for="logoUpload">or drop files to upload</label>
                            </div>
                            @if(!empty($page->image3))
                            <div class="avatar-preview">  
                                <div id="logoPreview" style="background-image: url({{ url('storage/'.$page->image3) }}); display: block;">
                                </div>
                            </div>
                            @else
                            <div class="avatar-preview">
                                <div id="logoPreview" style="background-image: url();">
                                </div>
                            </div>
                            @endif
                        </div>
                        <label>image Name 1</label>
                        <input type="text" name="button_name3" wire:model="page.button_name3">
                    </div>
                    <div class="row field_style1 mb-2">
                        <label>Image 2</label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="product_image1" wire:model="product_image1" accept=".png, .jpg, .jpeg" />
                                <img src="{{ url('assets/images/upload-icon.svg') }}">
                                <button class="secondary">Add Image</button>
                                <label for="logoUpload">or drop files to upload</label>
                            </div>
                            @if(!empty($page->product_image1))
                            <div class="avatar-preview">  
                                <div id="logoPreview" style="background-image: url({{ url('storage/'.$page->product_image1) }}); display: block;">
                                </div>
                            </div>
                            @else
                            <div class="avatar-preview">
                                <div id="logoPreview" style="background-image: url();">
                                </div>
                            </div>
                            @endif
                        </div>
                        <label>image Name 2</label>
                        <input type="text" name="product_button_name1" wire:model="page.product_button_name1">
                    </div>

                    <div class="row field_style1 mb-2">
                        <label>Image 3</label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="product_image2" wire:model="product_image2" accept=".png, .jpg, .jpeg" />
                                <img src="{{ url('assets/images/upload-icon.svg') }}">
                                <button class="secondary">Add Image</button>
                                <label for="logoUpload">or drop files to upload</label>
                            </div>
                            @if(!empty($page->product_image2))
                            <div class="avatar-preview">  
                                <div id="logoPreview" style="background-image: url({{ url('storage/'.$page->product_image2) }}); display: block;">
                                </div>
                            </div>
                            @else
                            <div class="avatar-preview">
                                <div id="logoPreview" style="background-image: url();">
                                </div>
                            </div>
                            @endif
                        </div>
                        <label>image Name 3</label>
                        <input type="text" name="product_button_name1" wire:model="page.product_button_name2">
                    </div>
                </div>
                @endif

                @if($page->id == 16)
                <div class="card">
                    <div class="row">
                        <label>Medium Rugs</label>
                        <input type="text" name="title4" wire:model="page.title4">
                    </div>
                    <div class="row">
                        <label>Comman Sizes (ft):</label>
                        <input type="text" name="product_title1" wire:model="page.product_title3">
                    </div>
                    <div class="row field_style1 mb-2">
                        <label>Image 1</label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="product_image3" wire:model="product_image3" accept=".png, .jpg, .jpeg" />
                                <img src="{{ url('assets/images/upload-icon.svg') }}">
                                <button class="secondary">Add Image</button>
                                <label for="logoUpload">or drop files to upload</label>
                            </div>
                            @if(!empty($page->product_image3))
                            <div class="avatar-preview">  
                                <div id="logoPreview" style="background-image: url({{ url('storage/'.$page->product_image3) }}); display: block;">
                                </div>
                            </div>
                            @else
                            <div class="avatar-preview">
                                <div id="logoPreview" style="background-image: url();">
                                </div>
                            </div>
                            @endif
                        </div>
                        <label>Image Name 1</label>
                        <input type="text" name="product_button_name3" wire:model="page.product_button_name3">
                    </div>
                    <!-- product 4 -->
                    <div class="row field_style1 mb-2">
                        <label>Image 2</label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="product_image4" wire:model="product_image4" accept=".png, .jpg, .jpeg" />
                                <img src="{{ url('assets/images/upload-icon.svg') }}">
                                <button class="secondary">Add Image</button>
                                <label for="logoUpload">or drop files to upload</label>
                            </div>
                            @if(!empty($page->product_image4))
                            <div class="avatar-preview">  
                                <div id="logoPreview" style="background-image: url({{ url('storage/'.$page->product_image4) }}); display: block;">
                                </div>
                            </div>
                            @else
                            <div class="avatar-preview">
                                <div id="logoPreview" style="background-image: url();">
                                </div>
                            </div>
                            @endif
                        </div>
                        <label>Image Name 2</label>
                        <input type="text" name="product_button_name4" wire:model="page.product_button_name4">
                    </div>
                    <!-- product 5 -->
                    <div class="row field_style1 mb-2">
                        <label>Image 3</label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="product_image5" wire:model="product_image5" accept=".png, .jpg, .jpeg" />
                                <img src="{{ url('assets/images/upload-icon.svg') }}">
                                <button class="secondary">Add Image</button>
                                <label for="logoUpload">or drop files to upload</label>
                            </div>
                            @if(!empty($page->product_image5))
                            <div class="avatar-preview">  
                                <div id="logoPreview" style="background-image: url({{ url('storage/'.$page->product_image5) }}); display: block;">
                                </div>
                            </div>
                            @else
                            <div class="avatar-preview">
                                <div id="logoPreview" style="background-image: url();">
                                </div>
                            </div>
                            @endif
                        </div>
                        <label>Image Name 3</label>
                        <input type="text" name="product_button_name5" wire:model="page.product_button_name5">
                    </div>
                </div>
                @endif

                @if($page->id == 16)
                <div class="card">
                    <div class="row">
                        <label>Large Rugs</label>
                        <input type="text" name="title" wire:model="page.title5">
                    </div>
                     <div class="row">
                        <label>Comman Sizes (ft):</label>
                        <input type="text" name="title6" wire:model="page.title6">
                    </div>
                    <div class="row field_style1 mb-2">
                        <label>Image</label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="flat_image1" wire:model="flat_image1" accept=".png, .jpg, .jpeg" />
                                <img src="{{ url('assets/images/upload-icon.svg') }}">
                                <button class="secondary">Add Image</button>
                                <label for="logoUpload">or drop files to upload</label>
                            </div>
                            @if(!empty($page->flat_image1))
                            <div class="avatar-preview">  
                                <div id="logoPreview" style="background-image: url({{ url('storage/'.$page->flat_image1) }}); display: block;">
                                </div>
                            </div>
                            @else
                            <div class="avatar-preview">
                                <div id="logoPreview" style="background-image: url();">
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                    <label>Image name 1</label>
                    <input type="text" name="button_link5" wire:model="page.button_link5">
                    </div>

                    <div class="row field_style1 mb-2">
                        <label>Image</label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="flat_image2" wire:model="flat_image2" accept=".png, .jpg, .jpeg" />
                                <img src="{{ url('assets/images/upload-icon.svg') }}">
                                <button class="secondary">Add Image</button>
                                <label for="logoUpload">or drop files to upload</label>
                            </div>
                            @if(!empty($page->flat_image2))
                            <div class="avatar-preview">  
                                <div id="logoPreview" style="background-image: url({{ url('storage/'.$page->flat_image2) }}); display: block;">
                                </div>
                            </div>
                            @else
                            <div class="avatar-preview">
                                <div id="logoPreview" style="background-image: url();">
                                </div>
                            </div>
                            @endif
                        </div>                            
                    </div>
                    <div class="row">
                    <label>Image Name 2</label>
                    <input type="text" name="button_name5" wire:model="page.button_name5">
                    </div>
                    
                </div>
                @endif

                <!-- END Size Guide -->

                <!--  Footer Information -->
                @if($page->id == 17)
                <div class="card">
                    <div class="row">
                        <label>Company Email</label>
                        <input type="email" name="title" wire:model="page.title5">
                        <label>Contact Number</label>
                        <input type="number" name="button_name5" wire:model="page.button_name5">
                    </div>
                    <div class="row field_style1 mb-2">
                        <label>Image</label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="flat_image1" wire:model="flat_image1" accept=".png, .jpg, .jpeg" />
                                <img src="{{ url('assets/images/upload-icon.svg') }}">
                                <button class="secondary">Add Image</button>
                                <label for="logoUpload">or drop files to upload</label>
                            </div>
                            @if(!empty($page->flat_image1))
                            <div class="avatar-preview">  
                                <div id="logoPreview" style="background-image: url({{ url('storage/'.$page->flat_image1) }}); display: block;">
                                </div>
                            </div>
                            @else
                            <div class="avatar-preview">
                                <div id="logoPreview" style="background-image: url();">
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                @endif
                <!-- END Footer Information -->
                <div class="wrapper">
                    @if($page->id == 10)
                    <div class="container">
                        <div class="question">
                          Our Success
                        </div>
                        <div class="answercont">
                          <div class="answer">
                   
                    <div class="card">
                        <div class="row">
                            <label>Video Link</label>
                            <input type="text" name="videolink" wire:model="page.video_link">
                        </div>
                        <div class="row">
                            <label>Title</label>
                            <input type="text" name="title2" wire:model="page.title2">
                        </div>
                        <div wire:ignore class="form-group row">
                            <label>Content</label>
                            <div class="col-md-9">
                                <textarea wire:model="page.descripation2" class="form-control required" name="description2" id="description2"></textarea>
                            </div>
                        </div>
                        <div class="row field_style1 mb-2">
                            <label>Button Name</label>
                            <input type="text" name="button_name2" wire:model="page.button_name2">
                            <label>Button Link</label>
                            <input type="text" name="button_link2" wire:model="page.button_link2">
                        </div>
                    </div>
                    
                </div>
            </div>
          </div>
          @endif

                
          @if($page->id == 10)
          <div class="container">
            <div class="question">
              Meet Resolute
            </div>
            <div class="answercont">
              <div class="answer">
                
                <div class="card">
                    <div class="row">
                        <label>Title</label>
                        <input type="text" name="title3" wire:model="page.title3">
                    </div>
                    <div wire:ignore class="form-group row">
                        <label>Content</label>
                        <div class="col-md-9">
                            <textarea wire:model="page.descripation3" class="form-control required" name="description1" id="description1"></textarea>
                        </div>
                    </div>
                    <div class="row field_style1 mb-2">
                        <label>Image</label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="image3" wire:model="image3" accept=".png, .jpg, .jpeg" />
                                <img src="{{ url('assets/images/upload-icon.svg') }}">
                                <button class="secondary">Add Image</button>
                                <label for="logoUpload">or drop files to upload</label>
                            </div>
                            @if(!empty($page->image3))
                            <div class="avatar-preview">  
                                <div id="logoPreview" style="background-image: url({{ url('storage/'.$page->image3) }}); display: block;">
                                </div>
                            </div>
                            @else
                            <div class="avatar-preview">
                                <div id="logoPreview" style="background-image: url();">
                                </div>
                            </div>
                            @endif
                        </div>
                        <label>Button Name</label>
                        <input type="text" name="button_name3" wire:model="page.button_name3">
                        <label>Button Link</label>
                        <input type="text" name="button_link3" wire:model="page.button_link3">
                    </div>
                </div>
               
            </div>
        </div>
      </div>
      @endif


            

      @if($page->id == 10)
      <div class="container">
        <div class="question">
          Rugs Accordance
        </div>
        <div class="answercont">
          <div class="answer">
               
                <div class="card">
                    <!-- product 1 -->
                    <div class="row">
                        <label>Title</label>
                        <input type="text" name="title4" wire:model="page.title4">
                    </div>
                    <div class="row">
                        <label>Product Title 1</label>
                        <input type="text" name="product_title1" wire:model="page.product_title1">
                    </div>
                    <div class="row field_style1 mb-2">
                        <label>Image 1</label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="product_image1" wire:model="product_image1" accept=".png, .jpg, .jpeg" />
                                <img src="{{ url('assets/images/upload-icon.svg') }}">
                                <button class="secondary">Add Image</button>
                                <label for="logoUpload">or drop files to upload</label>
                            </div>
                            @if(!empty($page->product_image1))
                            <div class="avatar-preview">  
                                <div id="logoPreview" style="background-image: url({{ url('storage/'.$page->product_image1) }}); display: block;">
                                </div>
                            </div>
                            @else
                            <div class="avatar-preview">
                                <div id="logoPreview" style="background-image: url();">
                                </div>
                            </div>
                            @endif
                        </div>
                        <label>Button Name 1</label>
                        <input type="text" name="product_button_name1" wire:model="page.product_button_name1">
                        <label>Button Link 1</label>
                        <input type="text" name="product_button_link1" wire:model="page.product_button_link1">
                    </div>
                    <!-- product 2  -->
                    <div class="row">
                        <label>Product Title 2</label>
                        <input type="text" name="product_title2" wire:model="page.product_title2">
                    </div>
                    <div class="row field_style1 mb-2">
                        <label>Image 2</label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="product_image2" wire:model="product_image2" accept=".png, .jpg, .jpeg" />
                                <img src="{{ url('assets/images/upload-icon.svg') }}">
                                <button class="secondary">Add Image</button>
                                <label for="logoUpload">or drop files to upload</label>
                            </div>
                            @if(!empty($page->product_image2))
                            <div class="avatar-preview">  
                                <div id="logoPreview" style="background-image: url({{ url('storage/'.$page->product_image2) }}); display: block;">
                                </div>
                            </div>
                            @else
                            <div class="avatar-preview">
                                <div id="logoPreview" style="background-image: url();">
                                </div>
                            </div>
                            @endif
                        </div>
                        <label>Button Name 2</label>
                        <input type="text" name="product_button_name1" wire:model="page.product_button_name2">
                        <label>Button Link 2</label>
                        <input type="text" name="product_button_link1" wire:model="page.product_button_link2">
                    </div>
                    <!-- product 3 -->
                    <div class="row">
                        <label>Product Title 3</label>
                        <input type="text" name="product_title1" wire:model="page.product_title3">
                    </div>
                    <div class="row field_style1 mb-2">
                        <label>Image 3</label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="product_image3" wire:model="product_image3" accept=".png, .jpg, .jpeg" />
                                <img src="{{ url('assets/images/upload-icon.svg') }}">
                                <button class="secondary">Add Image</button>
                                <label for="logoUpload">or drop files to upload</label>
                            </div>
                            @if(!empty($page->product_image3))
                            <div class="avatar-preview">  
                                <div id="logoPreview" style="background-image: url({{ url('storage/'.$page->product_image3) }}); display: block;">
                                </div>
                            </div>
                            @else
                            <div class="avatar-preview">
                                <div id="logoPreview" style="background-image: url();">
                                </div>
                            </div>
                            @endif
                        </div>
                        <label>Button Name 3</label>
                        <input type="text" name="product_button_name1" wire:model="page.product_button_name3">
                        <label>Button Link 3</label>
                        <input type="text" name="product_button_link1" wire:model="page.product_button_link3">
                    </div>
                    <!-- product 4 -->
                    <div class="row">
                        <label>Product Title 4</label>
                        <input type="text" name="product_title1" wire:model="page.product_title4">
                    </div>
                    <div class="row field_style1 mb-2">
                        <label>Image </label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="product_image4" wire:model="product_image4" accept=".png, .jpg, .jpeg" />
                                <img src="{{ url('assets/images/upload-icon.svg') }}">
                                <button class="secondary">Add Image</button>
                                <label for="logoUpload">or drop files to upload</label>
                            </div>
                            @if(!empty($page->product_image4))
                            <div class="avatar-preview">  
                                <div id="logoPreview" style="background-image: url({{ url('storage/'.$page->product_image4) }}); display: block;">
                                </div>
                            </div>
                            @else
                            <div class="avatar-preview">
                                <div id="logoPreview" style="background-image: url();">
                                </div>
                            </div>
                            @endif
                        </div>
                        <label>Button Name 4</label>
                        <input type="text" name="product_button_name4" wire:model="page.product_button_name4">
                        <label>Button Link 4</label>
                        <input type="text" name="product_button_link4" wire:model="page.product_button_link4">
                    </div>
                    <!-- product 5 -->
                    <div class="row">
                        <label>Product Title 5</label>
                        <input type="text" name="product_title1" wire:model="page.product_title5">
                    </div>
                    <div class="row field_style1 mb-2">
                        <label>Image</label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="product_image5" wire:model="product_image5" accept=".png, .jpg, .jpeg" />
                                <img src="{{ url('assets/images/upload-icon.svg') }}">
                                <button class="secondary">Add Image</button>
                                <label for="logoUpload">or drop files to upload</label>
                            </div>
                            @if(!empty($page->product_image5))
                            <div class="avatar-preview">  
                                <div id="logoPreview" style="background-image: url({{ url('storage/'.$page->product_image5) }}); display: block;">
                                </div>
                            </div>
                            @else
                            <div class="avatar-preview">
                                <div id="logoPreview" style="background-image: url();">
                                </div>
                            </div>
                            @endif
                        </div>
                        <label>Button Name 5</label>
                        <input type="text" name="product_button_name5" wire:model="page.product_button_name5">
                        <label>Button Link 5</label>
                        <input type="text" name="product_button_link5" wire:model="page.product_button_link5">
                    </div>
                </div>
               
            </div>
        </div>
      </div>
      @endif

    
      @if($page->id == 10)
      <div class="container">
        <div class="question">
          Flat & Knotted
        </div>
        <div class="answercont">
          <div class="answer">
               
                <!-- Flat @ Knotted -->
                <div class="card">
                    <div class="row">
                        <label>Title</label>
                        <input type="text" name="title" wire:model="page.title5">
                    </div>
                    <div wire:ignore class="form-group row">
                        <label>Content</label>
                        <div class="col-md-9">
                            <textarea wire:model="page.desctipation5" class="form-control required" name="desctipation5" id="desctipation5"></textarea>
                        </div>
                    </div>
                    <div class="row field_style1 mb-2">
                        <label>Image 2</label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="flat_image1" wire:model="flat_image1" accept=".png, .jpg, .jpeg" />
                                <img src="{{ url('assets/images/upload-icon.svg') }}">
                                <button class="secondary">Add Image</button>
                                <label for="logoUpload">or drop files to upload</label>
                            </div>
                            @if(!empty($page->flat_image1))
                            <div class="avatar-preview">  
                                <div id="logoPreview" style="background-image: url({{ url('storage/'.$page->flat_image1) }}); display: block;">
                                </div>
                            </div>
                            @else
                            <div class="avatar-preview">
                                <div id="logoPreview" style="background-image: url();">
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="row field_style1 mb-2">
                            <label>Image 2</label>
                            <div class="avatar-upload">
                                <div class="avatar-edit">
                                    <input type='file' id="flat_image2" wire:model="flat_image2" accept=".png, .jpg, .jpeg" />
                                    <img src="{{ url('assets/images/upload-icon.svg') }}">
                                    <button class="secondary">Add Image</button>
                                    <label for="logoUpload">or drop files to upload</label>
                                </div>
                                @if(!empty($page->flat_image2))
                                <div class="avatar-preview">  
                                    <div id="logoPreview" style="background-image: url({{ url('storage/'.$page->flat_image2) }}); display: block;">
                                    </div>
                                </div>
                                @else
                                <div class="avatar-preview">
                                    <div id="logoPreview" style="background-image: url();">
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
             
                    <label>Button Name</label>
                    <input type="text" name="button_name5" wire:model="page.button_name5">
                    <label>Button Link</label>
                    <input type="text" name="button_link5" wire:model="page.button_link5">
                </div>
               
            </div>
        </div>
      </div>
      @endif


      @if($page->id == 10)
      <div class="container">
        <div class="question">
            Our Collection
        </div>
        <div class="answercont">
          <div class="answer">
                
                <!-- Collection -->
                <div class="card">
                    <div class="row">
                        <label>Title</label>
                        <input type="text" name="title6" wire:model="page.title6">
                    </div>
                    <div wire:ignore class="form-group row">
                        <label>Content</label>
                        <div class="col-md-9">
                            <textarea wire:model="page.descripation6" class="form-control required" name="descripation6" id="descripation6"></textarea>
                        </div>
                    </div>
                    <div class="row field_style1 mb-2">
                        <label>Button Name</label>
                        <input type="text" name="button_name6" wire:model="page.button_name6">
                        <label>Button Link</label>
                        <input type="text" name="button_link6" wire:model="page.button_link6">
                    </div>
                </div>
               

            </div>
        </div>
      </div>
      @endif
  




                <!-- Studio page  -->

                @if($page->id == 11)
                <div class="container">
                    <div class="question">
                        New Way To Shop
                    </div>
                    <div class="answercont">
                      <div class="answer">
                <div class="card">
                    <div class="row">
                        <label>Title</label>
                        <input type="text" name="title3" wire:model="page.title3">
                    </div>
                    <div wire:ignore class="form-group row">
                        <label>Content</label>
                        <div class="col-md-9">
                            <textarea wire:model="page.descripation3" class="form-control required" name="descripation3" id="descripation3"></textarea>
                        </div>
                    </div>
                    <div class="row field_style1 mb-2">
                        <label>Image</label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="image3" wire:model="image3" accept=".png, .jpg, .jpeg" />
                                <img src="{{ url('assets/images/upload-icon.svg') }}">
                                <button class="secondary">Add Image</button>
                                <label for="logoUpload">or drop files to upload</label>
                            </div>
                            @if(!empty($page->image3))
                            <div class="avatar-preview">  
                                <div id="logoPreview" style="background-image: url({{ url('storage/'.$page->image3) }}); display: block;">
                                </div>
                            </div>
                            @else
                            <div class="avatar-preview">
                                <div id="logoPreview" style="background-image: url();">
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
                @endif

                
                <!-- What To Expect -->
                @if($page->id == 11)
                <div class="container">
                    <div class="question">
                        What To Expect
                    </div>
                    <div class="answercont">
                      <div class="answer">
                <div class="card">
                    <!-- product 1 -->
                    <div class="row">
                        <label>Title</label>
                        <input type="text" name="title4" wire:model="page.title4">
                    </div>
                    <div class="row field_style1 mb-2">
                        <label>Image 1</label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="product_image1" wire:model="product_image1" accept=".png, .jpg, .jpeg" />
                                <img src="{{ url('assets/images/upload-icon.svg') }}">
                                <button class="secondary">Add Image</button>
                                <label for="logoUpload">or drop files to upload</label>
                            </div>
                            @if(!empty($page->product_image1))
                            <div class="avatar-preview">  
                                <div id="logoPreview" style="background-image: url({{ url('storage/'.$page->product_image1) }}); display: block;">
                                </div>
                            </div>
                            @else
                            <div class="avatar-preview">
                                <div id="logoPreview" style="background-image: url();">
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="row">
                            <label>Title 1</label>
                            <input type="text" name="product_title1" wire:model="page.product_title1">
                        </div>
                        <label>Descripation 1</label>
                        <textarea wire:model="page.product_button_name1" class="form-control required" name="product_button_name1" id="product_button_name1"></textarea>
                    </div>
                    <!-- product 2  -->
                    <div class="row field_style1 mb-2">
                        <label>Image 2</label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="product_image2" wire:model="product_image2" accept=".png, .jpg, .jpeg" />
                                <img src="{{ url('assets/images/upload-icon.svg') }}">
                                <button class="secondary">Add Image</button>
                                <label for="logoUpload">or drop files to upload</label>
                            </div>
                            @if(!empty($page->product_image2))
                            <div class="avatar-preview">  
                                <div id="logoPreview" style="background-image: url({{ url('storage/'.$page->product_image2) }}); display: block;">
                                </div>
                            </div>
                            @else
                            <div class="avatar-preview">
                                <div id="logoPreview" style="background-image: url();">
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="row">
                            <label>Title 2</label>
                            <input type="text" name="product_title1" wire:model="page.product_title2">
                        </div>
                        <label>Descripation 2</label>
                        <textarea wire:model="page.product_button_name2" class="form-control required" name="product_button_name2" id="product_button_name2"></textarea>
                    </div>
                    <!-- product 3 -->
                    <div class="row field_style1 mb-2">
                        <label>Image 3</label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="product_image3" wire:model="product_image3" accept=".png, .jpg, .jpeg" />
                                <img src="{{ url('assets/images/upload-icon.svg') }}">
                                <button class="secondary">Add Image</button>
                                <label for="logoUpload">or drop files to upload</label>
                            </div>
                            @if(!empty($page->product_image3))
                            <div class="avatar-preview">  
                                <div id="logoPreview" style="background-image: url({{ url('storage/'.$page->product_image3) }}); display: block;">
                                </div>
                            </div>
                            @else
                            <div class="avatar-preview">
                                <div id="logoPreview" style="background-image: url();">
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="row">
                            <label>Title 3</label>
                            <input type="text" name="product_title1" wire:model="page.product_title3">
                        </div>
                        <label>Descripation 3</label>
                        <textarea wire:model="page.product_button_name3" class="form-control required" name="product_button_name3" id="product_button_name3"></textarea>
                    </div>
                    <!-- product 4 -->
                    <div class="row field_style1 mb-2">
                        <label>Image </label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="product_image4" wire:model="product_image4" accept=".png, .jpg, .jpeg" />
                                <img src="{{ url('assets/images/upload-icon.svg') }}">
                                <button class="secondary">Add Image</button>
                                <label for="logoUpload">or drop files to upload</label>
                            </div>
                            @if(!empty($page->product_image4))
                            <div class="avatar-preview">  
                                <div id="logoPreview" style="background-image: url({{ url('storage/'.$page->product_image4) }}); display: block;">
                                </div>
                            </div>
                            @else
                            <div class="avatar-preview">
                                <div id="logoPreview" style="background-image: url();">
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="row">
                            <label>Title 4</label>
                            <input type="text" name="product_title1" wire:model="page.product_title4">
                        </div>
                        <label>Descripation</label>
                        <textarea wire:model="page.product_button_name4" class="form-control required" name="product_button_name4" id="product_button_name4"></textarea>
                    </div>
                </div>
            </div>
        </div>
      </div>
                @endif


                @if($page->id == 11)
                <!-- Our Team    -->
                <div class="container">
                    <div class="question">
                        Our Team
                    </div>
                    <div class="answercont">
                      <div class="answer">
                <div class="card">
                    <div class="row">
                        <label>Title</label>
                        <input type="text" name="title" wire:model="page.title5">
                    </div>
                    <div wire:ignore class="form-group row">
                        <label>Content</label>
                        <div class="col-md-9">
                            <textarea wire:model="page.desctipation5" class="form-control required" name="desctipation5" id="desctipation5"></textarea>
                        </div>
                    </div>
                    <div class="row field_style1 mb-2">
                        <label>Image</label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="flat_image1" wire:model="flat_image1" accept=".png, .jpg, .jpeg" />
                                <img src="{{ url('assets/images/upload-icon.svg') }}">
                                <button class="secondary">Add Image</button>
                                <label for="logoUpload">or drop files to upload</label>
                            </div>
                            @if(!empty($page->flat_image1))
                            <div class="avatar-preview">  
                                <div id="logoPreview" style="background-image: url({{ url('storage/'.$page->flat_image1) }}); display: block;">
                                </div>
                            </div>
                            @else
                            <div class="avatar-preview">
                                <div id="logoPreview" style="background-image: url();">
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
                @endif


                @if($page->id == 11)
                <!-- The Operation  -->
                <div class="container">
                    <div class="question">
                        The Operation
                    </div>
                    <div class="answercont">
                      <div class="answer">
                <div class="card">
                    <div class="row">
                        <label>Title</label>
                        <input type="text" name="title2" wire:model="page.title2">
                    </div>
                    <div wire:ignore class="form-group row">
                        <label>Content</label>
                        <div class="col-md-9">
                            <textarea wire:model="page.descripation2" class="form-control required" name="description2" id="description2"></textarea>
                        </div>
                    </div>
                    <div class="row field_style1 mb-2">
                        <label>Image</label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="flat_image2" wire:model="flat_image2" accept=".png, .jpg, .jpeg" />
                                <img src="{{ url('assets/images/upload-icon.svg') }}">
                                <button class="secondary">Add Image</button>
                                <label for="logoUpload">or drop files to upload</label>
                            </div>
                            @if(!empty($page->flat_image2))
                            <div class="avatar-preview">  
                                <div id="logoPreview" style="background-image: url({{ url('storage/'.$page->flat_image2) }}); display: block;">
                                </div>
                            </div>
                            @else
                            <div class="avatar-preview">
                                <div id="logoPreview" style="background-image: url();">
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
                @endif

                @if($page->id == 11)
                <!-- We want visitors  -->
                <div class="container">
                    <div class="question">
                        We want visitors
                    </div>
                    <div class="answercont">
                      <div class="answer">
                <div class="card">
                   <div class="row">
                        <label>Title</label>
                        <input type="text" name="product_title1" wire:model="page.product_title5">
                    </div>
                    <div class="row field_style1 mb-2">
                        <label>Image</label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="product_image5" wire:model="product_image5" accept=".png, .jpg, .jpeg" />
                                <img src="{{ url('assets/images/upload-icon.svg') }}">
                                <button class="secondary">Add Image</button>
                                <label for="logoUpload">or drop files to upload</label>
                            </div>
                            @if(!empty($page->product_image5))
                            <div class="avatar-preview">  
                                <div id="logoPreview" style="background-image: url({{ url('storage/'.$page->product_image5) }}); display: block;">
                                </div>
                            </div>
                            @else
                            <div class="avatar-preview">
                                <div id="logoPreview" style="background-image: url();">
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
                @endif



                @if($page->id == 11)
                <!-- Visit Us In NYC  -->
                <div class="container">
                    <div class="question">
                        Visit Us In NYC
                    </div>
                    <div class="answercont">
                      <div class="answer">
                <div class="card">
                     <div class="row">
                        <label>Title</label>
                        <input type="text" name="title6" wire:model="page.title6">
                    </div>
                    <div wire:ignore class="form-group row">
                        <label>Content</label>
                        <div class="col-md-9">
                            <textarea wire:model="page.descripation6" class="form-control required" name="descripation6" id="descripation6"></textarea>
                        </div>
                    </div>
                    <div class="row field_style1 mb-2">
                        <label>Image</label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="image" wire:model="image" accept=".png, .jpg, .jpeg" />
                                <img src="{{ url('assets/images/upload-icon.svg') }}">
                                <button class="secondary">Add Image</button>
                                <label for="logoUpload">or drop files to upload</label>
                            </div>
                            @if(!empty($page->image))
                            <div class="avatar-preview">  
                                <div id="logoPreview" style="background-image: url('{{ url('storage/'.$page->image) }}'); display: block;">
                                </div>
                            </div>
                            @else
                            <div class="avatar-preview">
                                <div id="logoPreview" style="background-image: url();">
                                </div>
                            </div>
                            @endif
                        </div>
                        <label>Button Name</label>
                        <input type="text" name="button_name" wire:model="page.button_name">
                        <label>Button Link</label>
                        <input type="text" name="button_url" wire:model="page.button_url">
                    </div>
                </div>

            </div>
        </div>
      </div>
                @endif



           



                 <!-- Apartment page  -->
                 <!-- It’s In The Details -->
                @if($page->id == 12)
                <div class="container">
                    <div class="question">
                        It’s In The Details
                    </div>
                    <div class="answercont">
                      <div class="answer">
                <div class="card">
                    <div class="row">
                        <label>Title</label>
                        <input type="text" name="title3" wire:model="page.title3">
                    </div>
                    <div wire:ignore class="form-group row">
                        <label>Content</label>
                        <div class="col-md-9">
                            <textarea wire:model="page.descripation3" class="form-control required" name="descripation3" id="descripation3"></textarea>
                        </div>
                    </div>
                    <div class="row field_style1 mb-2">
                        <label>Image</label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="image3" wire:model="image3" accept=".png, .jpg, .jpeg" />
                                <img src="{{ url('assets/images/upload-icon.svg') }}">
                                <button class="secondary">Add Image</button>
                                <label for="logoUpload">or drop files to upload</label>
                            </div>
                            @if(!empty($page->image3))
                            <div class="avatar-preview">  
                                <div id="logoPreview" style="background-image: url({{ url('storage/'.$page->image3) }}); display: block;">
                                </div>
                            </div>
                            @else
                            <div class="avatar-preview">
                                <div id="logoPreview" style="background-image: url();">
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
      </div>
                @endif

                <!-- A Leafy Tree  -->
                @if($page->id == 12)
                <div class="container">
                    <div class="question">
                        A Leafy Tree
                    </div>
                    <div class="answercont">
                      <div class="answer">
                <div class="card">
                    <div class="row">
                        <label>Title</label>
                        <input type="text" name="title2" wire:model="page.title2">
                    </div>
                    <div wire:ignore class="form-group row">
                        <label>Content</label>
                        <div class="col-md-9">
                            <textarea wire:model="page.descripation2" class="form-control required" name="description2" id="description2"></textarea>
                        </div>
                    </div>
                    <div class="row field_style1 mb-2">
                        <label>Image</label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="flat_image2" wire:model="flat_image2" accept=".png, .jpg, .jpeg" />
                                <img src="{{ url('assets/images/upload-icon.svg') }}">
                                <button class="secondary">Add Image</button>
                                <label for="logoUpload">or drop files to upload</label>
                            </div>
                            @if(!empty($page->flat_image2))
                            <div class="avatar-preview">  
                                <div id="logoPreview" style="background-image: url({{ url('storage/'.$page->flat_image2) }}); display: block;">
                                </div>
                            </div>
                            @else
                            <div class="avatar-preview">
                                <div id="logoPreview" style="background-image: url();">
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
      </div>
                @endif

                <!-- Simple Paragraph 1 -->
                @if($page->id == 12)
                <div class="container">
                    <div class="question">
                        Simple Paragraph
                    </div>
                    <div class="answercont">
                      <div class="answer">
                <div class="card">
                    <div class="row field_style1 mb-2">
                        <div class="row">
                            <label>Title </label>
                            <input type="text" name="product_title1" wire:model="page.product_title1">
                        </div>
                        <label>Descripation</label>
                        <textarea wire:model="page.product_button_name1" class="form-control required" name="product_button_name1" id="product_button_name1"></textarea>
                    </div>
                </div>

            </div>
        </div>
      </div>
                @endif

                 @if($page->id == 12)
                 <div class="container">
                    <div class="question">
                        What to expect
                    </div>
                    <div class="answercont">
                      <div class="answer">
                <!-- What to expect  -->
                <div class="card">
                   <div class="row">
                        <label>Title</label>
                        <input type="text" name="product_title5" wire:model="page.product_title5">
                    </div>
                    <label>Descripation</label>
                        <textarea wire:model="page.product_button_name5" class="form-control required" name="product_button_name5" id="product_button_name5"></textarea>

                    <div class="row field_style1 mb-2">
                        <label>Image</label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="product_image5" wire:model="product_image5" accept=".png, .jpg, .jpeg" />
                                <img src="{{ url('assets/images/upload-icon.svg') }}">
                                <button class="secondary">Add Image</button>
                                <label for="logoUpload">or drop files to upload</label>
                            </div>
                            @if(!empty($page->product_image5))
                            <div class="avatar-preview">  
                                <div id="logoPreview" style="background-image: url({{ url('storage/'.$page->product_image5) }}); display: block;">
                                </div>
                            </div>
                            @else
                            <div class="avatar-preview">
                                <div id="logoPreview" style="background-image: url();">
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
      </div>
                @endif

                @if($page->id == 12)
                <div class="container">
                    <div class="question">
                        Image
                    </div>
                    <div class="answercont">
                      <div class="answer">
                <div class="card">
                    <label>Image</label>
                    <div class="avatar-upload">
                        <div class="avatar-edit">
                            <input type='file' id="product_image1" wire:model="product_image1" accept=".png, .jpg, .jpeg" />
                            <img src="{{ url('assets/images/upload-icon.svg') }}">
                            <button class="secondary">Add Image</button>
                            <label for="logoUpload">or drop files to upload</label>
                        </div>
                        @if(!empty($page->product_image1))
                        <div class="avatar-preview">  
                            <div id="logoPreview" style="background-image: url({{ url('storage/'.$page->product_image1) }}); display: block;">
                            </div>
                        </div>
                        @else
                        <div class="avatar-preview">
                            <div id="logoPreview" style="background-image: url();">
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
      </div>
                @endif


                @if($page->id == 12)
                <div class="container">
                    <div class="question">
                        Visit Us In Marrakech
                    </div>
                    <div class="answercont">
                      <div class="answer">
                <!-- Visit Us In Marrakech  -->
                <div class="card">
                     <div class="row">
                        <label>Title</label>
                        <input type="text" name="title6" wire:model="page.title6">
                    </div>
                    <div wire:ignore class="form-group row">
                        <label>Content</label>
                        <div class="col-md-9">
                            <textarea wire:model="page.descripation6" class="form-control required" name="descripation6" id="descripation6"></textarea>
                        </div>
                    </div>
                    <div class="row field_style1 mb-2">
                        <label>Image</label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="image" wire:model="image" accept=".png, .jpg, .jpeg" />
                                <img src="{{ url('assets/images/upload-icon.svg') }}">
                                <button class="secondary">Add Image</button>
                                <label for="logoUpload">or drop files to upload</label>
                            </div>
                            @if(!empty($page->image))
                            <div class="avatar-preview">  
                                <div id="logoPreview" style="background-image: url('{{ url('storage/'.$page->image) }}'); display: block;">
                                </div>
                            </div>
                            @else
                            <div class="avatar-preview">
                                <div id="logoPreview" style="background-image: url();">
                                </div>
                            </div>
                            @endif
                        </div>
                        <label>Button Name</label>
                        <input type="text" name="button_name" wire:model="page.button_name">
                        <label>Button Link</label>
                        <input type="text" name="button_url" wire:model="page.button_url">
                    </div>
                </div>

            </div>
        </div>
      </div>
                @endif




            

                <!-- Process Page -->
                @if($page->id == 13)

                <div class="container">
                    <div class="question">
                        Number 1
                    </div>
                    <div class="answercont">
                      <div class="answer">

                <div class="card">
                    <!-- product 1 -->
                    <div class="row">
                        <label>Number</label>
                        <input type="text" name="product_title1" wire:model="page.product_title1">
                    </div>
                    <div class="row">
                        <label>Title 1</label>
                        <input type="text" name="product_button_name1" wire:model="page.product_button_name1">
                    </div>
                    <div class="row field_style1 mb-2">
                        <label>Image 1</label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="product_image1" wire:model="product_image1" accept=".png, .jpg, .jpeg" />
                                <img src="{{ url('assets/images/upload-icon.svg') }}">
                                <button class="secondary">Add Image</button>
                                <label for="logoUpload">or drop files to upload</label>
                            </div>
                            @if(!empty($page->product_image1))
                            <div class="avatar-preview">  
                                <div id="logoPreview" style="background-image: url({{ url('storage/'.$page->product_image1) }}); display: block;">
                                </div>
                            </div>
                            @else
                            <div class="avatar-preview">
                                <div id="logoPreview" style="background-image: url();">
                                </div>
                            </div>
                            @endif
                        </div>                        
                    </div>
                    
                </div>

            </div>
        </div>
      </div>

      <div class="container">
        <div class="question">
            Number 2
        </div>
        <div class="answercont">
          <div class="answer">
                <div class="card">
                    <!-- product 2  -->
                    <div class="row">
                        <label>Number 2</label>
                        <input type="text" name="product_title2" wire:model="page.product_title2">
                    </div>
                    <div class="row">
                        <label>Title 2</label>
                        <input type="text" name="product_button_name2" wire:model="page.product_button_name2">
                    </div>
                    <div class="row field_style1 mb-2">
                        <label>Image 2</label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="product_image2" wire:model="product_image2" accept=".png, .jpg, .jpeg" />
                                <img src="{{ url('assets/images/upload-icon.svg') }}">
                                <button class="secondary">Add Image</button>
                                <label for="logoUpload">or drop files to upload</label>
                            </div>
                            @if(!empty($page->product_image2))
                            <div class="avatar-preview">  
                                <div id="logoPreview" style="background-image: url({{ url('storage/'.$page->product_image2) }}); display: block;">
                                </div>
                            </div>
                            @else
                            <div class="avatar-preview">
                                <div id="logoPreview" style="background-image: url();">
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
      </div>


      <div class="container">
        <div class="question">
           Text 2
        </div>
        <div class="answercont">
          <div class="answer">
                <div class="card">
                    <label>Text 2</label>
                    <input type="text" name="product_button_link1" wire:model="page.product_button_link1">
                </div>

            </div>
        </div>
      </div>


      <div class="container">
        <div class="question">
            Number 3
        </div>
        <div class="answercont">
          <div class="answer">
                <div class="card">
                    <!-- product 3 -->
                    <div class="row">
                        <label>Number 3</label>
                        <input type="text" name="product_title1" wire:model="page.product_title3">
                    </div>
                    <div class="row">
                        <label>Title 3</label>
                        <input type="text" name="product_button_name3" wire:model="page.product_button_name3">
                    </div>
                    <div class="row field_style1 mb-2">
                        <label>Image 3</label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="product_image3" wire:model="product_image3" accept=".png, .jpg, .jpeg" />
                                <img src="{{ url('assets/images/upload-icon.svg') }}">
                                <button class="secondary">Add Image</button>
                                <label for="logoUpload">or drop files to upload</label>
                            </div>
                            @if(!empty($page->product_image3))
                            <div class="avatar-preview">  
                                <div id="logoPreview" style="background-image: url({{ url('storage/'.$page->product_image3) }}); display: block;">
                                </div>
                            </div>
                            @else
                            <div class="avatar-preview">
                                <div id="logoPreview" style="background-image: url();">
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    
                </div>

            </div>
        </div>
      </div>



      <div class="container">
        <div class="question">
            Number 4
        </div>
        <div class="answercont">
          <div class="answer">
                <div class="card">
                    <!-- product 4 -->
                    <div class="row">
                        <label>Number 4</label>
                        <input type="text" name="product_title1" wire:model="page.product_title4">
                    </div>
                    <div class="row">
                        <label>Title 4</label>
                        <input type="text" name="product_button_name4" wire:model="page.product_button_name4">
                    </div>
                    <div class="row field_style1 mb-2">
                        <label>Image </label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="product_image4" wire:model="product_image4" accept=".png, .jpg, .jpeg" />
                                <img src="{{ url('assets/images/upload-icon.svg') }}">
                                <button class="secondary">Add Image</button>
                                <label for="logoUpload">or drop files to upload</label>
                            </div>
                            @if(!empty($page->product_image4))
                            <div class="avatar-preview">  
                                <div id="logoPreview" style="background-image: url({{ url('storage/'.$page->product_image4) }}); display: block;">
                                </div>
                            </div>
                            @else
                            <div class="avatar-preview">
                                <div id="logoPreview" style="background-image: url();">
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
      </div>


      <div class="container">
        <div class="question">
            Text 3
        </div>
        <div class="answercont">
          <div class="answer">
                <div class="card">
                    <label>Text 3</label>
                    <input type="text" name="product_button_link2" wire:model="page.product_button_link2">
                </div>

            </div>
        </div>
      </div>


      <div class="container">
        <div class="question">
            Number 5
        </div>
        <div class="answercont">
          <div class="answer">
                <div class="card">
                    <!-- product 5 -->
                    <div class="row">
                        <label>Number 5</label>
                        <input type="text" name="product_title1" wire:model="page.product_title5">
                    </div>
                    <div class="row">
                        <label>Title 5</label>
                        <input type="text" name="product_button_name5" wire:model="page.product_button_name5">
                    </div>
                    <div class="row field_style1 mb-2">
                        <label>Image</label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="product_image5" wire:model="product_image5" accept=".png, .jpg, .jpeg" />
                                <img src="{{ url('assets/images/upload-icon.svg') }}">
                                <button class="secondary">Add Image</button>
                                <label for="logoUpload">or drop files to upload</label>
                            </div>
                            @if(!empty($page->product_image5))
                            <div class="avatar-preview">  
                                <div id="logoPreview" style="background-image: url({{ url('storage/'.$page->product_image5) }}); display: block;">
                                </div>
                            </div>
                            @else
                            <div class="avatar-preview">
                                <div id="logoPreview" style="background-image: url();">
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>


                    
                </div>

            </div>
        </div>
      </div>


      <div class="container">
        <div class="question">
            Number 6
        </div>
        <div class="answercont">
          <div class="answer">
                <div class="card">
                    <div class="row">
                        <label>Number 6</label>
                        <input type="text" name="title6" wire:model="page.title6">
                    </div>
                    <div class="row">
                        <label>Title 6</label>
                        <input type="text" name="button_name" wire:model="page.button_name">
                    </div>
                    <div class="row field_style1 mb-2">
                        <label>Image</label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="image" wire:model="image" accept=".png, .jpg, .jpeg" />
                                <img src="{{ url('assets/images/upload-icon.svg') }}">
                                <button class="secondary">Add Image</button>
                                <label for="logoUpload">or drop files to upload</label>
                            </div>
                            @if(!empty($page->image))
                            <div class="avatar-preview">  
                                <div id="logoPreview" style="background-image: url({{ url('storage/'.$page->image) }}); display: block;">
                                </div>
                            </div>
                            @else
                            <div class="avatar-preview">
                                <div id="logoPreview" style="background-image: url();">
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
      </div>

                @endif


            

                <!-- In the beginning-->

                @if($page->id == 14)
                <div class="container">
                    <div class="question">
                        In the beginning
                    </div>
                    <div class="answercont">
                      <div class="answer">
                <div class="card">
                    <div class="row">
                        <label>Title</label>
                        <input type="text" name="title3" wire:model="page.title3">
                    </div>
                    <div wire:ignore class="form-group row">
                        <label>Content</label>
                        <div class="col-md-9">
                            <textarea wire:model="page.descripation3" class="form-control required" name="description1" id="description1"></textarea>
                        </div>
                    </div>
                    <div class="row field_style1 mb-2">
                        <label>Image</label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="image3" wire:model="image3" accept=".png, .jpg, .jpeg" />
                                <img src="{{ url('assets/images/upload-icon.svg') }}">
                                <button class="secondary">Add Image</button>
                                <label for="logoUpload">or drop files to upload</label>
                            </div>
                            @if(!empty($page->image3))
                            <div class="avatar-preview">  
                                <div id="logoPreview" style="background-image: url({{ url('storage/'.$page->image3) }}); display: block;">
                                </div>
                            </div>
                            @else
                            <div class="avatar-preview">
                                <div id="logoPreview" style="background-image: url();">
                                </div>
                            </div>
                            @endif
                        </div>
                        <label>Button Name</label>
                        <input type="text" name="button_name3" wire:model="page.button_name3">
                        <label>Button Link</label>
                        <input type="text" name="button_link3" wire:model="page.button_link3">
                    </div>
                </div>

            </div>
        </div>
      </div>
                
                @endif

                @if($page->id == 14)
                <div class="container">
                    <div class="question">
                        Forever inspired
                    </div>
                    <div class="answercont">
                      <div class="answer">
                <div class="card">
                    <!-- In the beginning -->
                    <div class="row">
                        <label>Title </label>
                        <input type="text" name="product_title1" wire:model="page.product_title1">
                    </div>
                    <div wire:ignore class="form-group row">
                        <label>Content</label>
                        <div class="col-md-9">
                            <textarea wire:model="page.descripation2" class="form-control required" name="description2" id="description2"></textarea>
                        </div>
                    </div>
                    <div class="row field_style1 mb-2">
                        <label>Image</label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="product_image1" wire:model="product_image1" accept=".png, .jpg, .jpeg" />
                                <img src="{{ url('assets/images/upload-icon.svg') }}">
                                <button class="secondary">Add Image</button>
                                <label for="logoUpload">or drop files to upload</label>
                            </div>
                            @if(!empty($page->product_image1))
                            <div class="avatar-preview">  
                                <div id="logoPreview" style="background-image: url({{ url('storage/'.$page->product_image1) }}); display: block;">
                                </div>
                            </div>
                            @else
                            <div class="avatar-preview">
                                <div id="logoPreview" style="background-image: url();">
                                </div>
                            </div>
                            @endif
                        </div>
                        <label>Button Name 1</label>
                        <input type="text" name="product_button_name1" wire:model="page.product_button_name1">
                        <label>Button Link 1</label>
                        <input type="text" name="product_button_link1" wire:model="page.product_button_link1">
                    </div>
                </div>

            </div>
        </div>
      </div>
                @endif


                @if($page->id == 14)
                <div class="container">
                    <div class="question">
                        Dedication to design
                    </div>
                    <div class="answercont">
                      <div class="answer">
                <div class="card">
                    <!-- product 2  -->
                    <div class="row">
                        <label>Title</label>
                        <input type="text" name="product_title2" wire:model="page.product_title2">
                    </div>
                    <div wire:ignore class="form-group row">
                        <label>Content</label>
                        <div class="col-md-9">
                            <textarea wire:model="page.descripation6" class="form-control required" name="descripation6" id="descripation6"></textarea>
                        </div>
                    </div>
                    <div class="row field_style1 mb-2">
                        <label>Image</label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="product_image2" wire:model="product_image2" accept=".png, .jpg, .jpeg" />
                                <img src="{{ url('assets/images/upload-icon.svg') }}">
                                <button class="secondary">Add Image</button>
                                <label for="logoUpload">or drop files to upload</label>
                            </div>
                            @if(!empty($page->product_image2))
                            <div class="avatar-preview">  
                                <div id="logoPreview" style="background-image: url({{ url('storage/'.$page->product_image2) }}); display: block;">
                                </div>
                            </div>
                            @else
                            <div class="avatar-preview">
                                <div id="logoPreview" style="background-image: url();">
                                </div>
                            </div>
                            @endif
                        </div>
                        <label>Button Name 2</label>
                        <input type="text" name="product_button_name1" wire:model="page.product_button_name2">
                        <label>Button Link 2</label>
                        <input type="text" name="product_button_link1" wire:model="page.product_button_link2">
                    </div>
                </div>

            </div>
        </div>
      </div>
                @endif

                <!-- Supporting Community -->
                @if($page->id == 14)
                <div class="container">
                    <div class="question">
                        Supporting Community
                    </div>
                    <div class="answercont">
                      <div class="answer">
                <div class="card">
                    <div class="row">
                        <label>Title</label>
                        <input type="text" name="title" wire:model="page.title5">
                    </div>
                    <div wire:ignore class="form-group row">
                        <label>Content</label>
                        <div class="col-md-9">
                            <textarea wire:model="page.desctipation5" class="form-control required" name="desctipation5" id="desctipation5"></textarea>
                        </div>
                    </div>
                    <div class="row field_style1 mb-2">
                        <label>Image</label>
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="flat_image1" wire:model="flat_image1" accept=".png, .jpg, .jpeg" />
                                <img src="{{ url('assets/images/upload-icon.svg') }}">
                                <button class="secondary">Add Image</button>
                                <label for="logoUpload">or drop files to upload</label>
                            </div>
                            @if(!empty($page->flat_image1))
                            <div class="avatar-preview">  
                                <div id="logoPreview" style="background-image: url({{ url('storage/'.$page->flat_image1) }}); display: block;">
                                </div>
                            </div>
                            @else
                            <div class="avatar-preview">
                                <div id="logoPreview" style="background-image: url();">
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
      </div>
                @endif

            </div>


                <div class="card search-engine-listing-card">
                    <div class="card-header">
                        <div class="header-title">
                            <h4 class="fs-16 mb-0 fw-6">Search engine listing preview</h4>
                            <a class="link edit-website-seo-btn blue-color">Edit website SEO</a>
                        </div>
                        <div class="ccd-search-engine-listing">
                            <span class="mb-0 black-color">Add a description to see how this Page might appear in a search engine listing</span>
                        </div>
                    </div>
                    <div class="card-middle" style="display: none;">
                        <div class="row">
                            <label>Page title</label>
                            <input type="text" name="seo_title" wire:model="page.seo_title">
                            <p>0 of 70 characters used</p>
                        </div>
                        <div class="row">
                            <label>Description</label>
                            <textarea name="seo_descripation" wire:model="page.seo_description"></textarea>
                            <p>0 of 320 characters used</p>
                        </div>
                        <div class="row">
                            <label>URL and handle</label>
                            <div class="url-input">
                                <span>https://rug.webtech-evolution.com/</span>
                                <input type="hidden" name="urlpath" value="https://rug.webtech-evolution.com/">
                                <input type="text" name="seo_utl" wire:model="page.seo_url">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           <!--  <div class="columns one-third right-details">
                <div class="card">
                    <div class="p-3">
                        <h3 class="fs-16 fw-6 lh-normal">Visibility</h3>
                        <div class="row">
                            <label class="mb-8"><input type="radio" name="option1a" checked="checked">Visible <span>(as of 3/29/2017, 2:47 PM UTC)</span></label>
                            <label class="mb-8"><input type="radio" name="option1a">Hidden <span>(will become visible on 9/22/2021, 6:00 AM UTC)</span></label>
                        </div>
                        <a class="blue-color" href="#">Set visibility date</a>
                        <div class="row date-time-row">
                            <label>Visibility date</label>
                            <input type="date">
                            <input type="time">
                        </div>
                        <a class="blue-color" href="#">Clear date...</a>
                    </div>
                </div>
                <div class="card">
                    <div class="p-3">
                        <h3 class="fs-16 fw-6 lh-normal">Online store</h3>
                        <div class="row">
                            <label class="lbl-mb-4">Theme template</label>
                            <select>
                                <option value="">Default page</option>
                                <option value="auction_cust_bids">auction_cust_bids</option>
                                <option value="auction_products">auction_products</option>
                                <option value="config">config</option>
                                <option value="contact">contact</option>
                                <option value="feeds">feeds</option>
                                <option value="mp_askme_profile">mp_askme_profile</option>
                                <option value="mp_global_product">mp_global_product</option>
                                <option value="mp_seller_profile">mp_seller_profile</option>
                                <option value="private">private</option>
                                <option value="public">public</option>
                            </select>
                        </div>
                        <p class="mb-0">Assign a template from your current theme to define how the page is displayed.</p>
                    </div>
                </div>
            </div> -->
        </article>
    </section>
    <section class="full-width flex-wrap admin-body-width" wire:ignore.self>
        <div class="page-bottom-btn">
           <!--  <button class="warning">Delete page</button> -->
            <button wire:click="Updatepages()">Save</button>
        </div>
    </section>

    @livewireScripts 


<script>
     const editor = CKEDITOR.replace('description');
editor.on('change', function (event) {
        // console.log(event.editor.getData())
        @this.set('page.content', event.editor.getData());
    })
     
</script>

<div id="duplicate-page" class="customer-modal-main">
    <div class="customer-modal-inner">
        <div class="customer-modal">
            <div class="modal-header">
                <h2>Duplicate this page?</h2>
                <span onclick="document.getElementById('duplicate-page').style.display='none'" class="modal-close-btn">
                    <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                        <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>
                    </svg>
                </span>
            </div>
            <div class="modal-body ta-left">
                <div class="row">
                    <div class="form-field-list">
                        <label>Provide a name for your new page</label>
                        <input type="text" name="address" value="Copy of Seller Profile">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="button secondary">Cancel</button>
                <button class="button green-btn">Duplicate</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $( ".edit-website-seo-btn" ).click(function() {     
        $('.search-engine-listing-card .card-middle').toggle();
    });

    // accordion js
    let question = document.querySelectorAll(".question");
    
    question.forEach(question => {
      question.addEventListener("click", event => {
        const active = document.querySelector(".question.active");
        if(active && active !== question ) {
          active.classList.toggle("active");
          active.nextElementSibling.style.maxHeight = 0;
        }
        question.classList.toggle("active");
        const answer = question.nextElementSibling;
        if(question.classList.contains("active")){
          answer.style.maxHeight = answer.scrollHeight + "px";
        } else {
          answer.style.maxHeight = 0;
        }
      })
    })
</script>
</x-admin-layout>
</div>