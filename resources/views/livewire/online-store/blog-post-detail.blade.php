<x-admin-layout>
    <!-- Edit Blog page start -->
    <section class="full-width flex-wrap admin-body-width navigation-header">
        <article class="full-width">
            <div class="columns customers-details-heading">
                <div class="page_header d-flex  align-item-center mb-3">
                    <a href="{{ url('/admin/articles') }}">
                        <button class="secondary icon-arrow-left mr-2">
                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                                <path d="M17 9H5.414l3.293-3.293a.999.999 0 1 0-1.414-1.414l-5 5a.999.999 0 0 0 0 1.414l5 5a.997.997 0 0 0 1.414 0 .999.999 0 0 0 0-1.414L5.414 11H17a1 1 0 1 0 0-2z"></path>
                            </svg>
                        </button>
                    </a>
                    <h4 class="mb-0 fw-5">Edit Blog</h4>
                </div>
                <div class="product-header-btn">
                    <button class="button link"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M17.928 9.628C17.837 9.399 15.611 4 10 4S2.162 9.399 2.07 9.628a1.017 1.017 0 0 0 0 .744C2.163 10.601 4.389 16 10 16s7.837-5.399 7.928-5.628a1.017 1.017 0 0 0 0-.744zM10 14a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm0-6a2 2 0 1 0 .002 4.001A2 2 0 0 0 9.999 8z"></path></svg> View page</button>
                </div>
            </div>
        </article>
    </section>
    <form method="post" action="{{ route('update_blogpost_detail')}}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ @$edit_post->id }}">
    <section class="full-width flex-wrap bd_none admin-body-width">
        <article class="full-width">
            <div class="columns two-thirds">
                <div class="card">
                    <h3 class="fs-16 fw-6">Blog details</h3>
                    @if ($errors->any())
                    <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                        @if($errors->any())
                        {!! implode('', $errors->all('<div>:message</div>')) !!}
                        @endif
                    
                    </div>
                    @endif
                    <div class="row row-mb-0 ">
                        <label class="lbl-mb-4">Title</label>
                        <input type="text" name="title" value="{{ @$edit_post->title }}">

                        <div class="product-des-customize">
                            <label>Description</label>
                            <div class="product-des-customize-inner">
                                <div class="product-dec-textbox">
                                    <textarea class="form-control tinymce-editor" rows="5" placeholder="Please Enter descripation" name="description" id="descripation">{{ @$edit_post->description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="product-des-customize">
                        <label class="lbl-mb-4">Slug</label>
                        <input type="text" name="slug" value="{{ @$edit_post->slug }}" readonly>
                        </div>
                    </div>
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
                            <input type="text" name="seo_title"  value="{{ @$edit_post->seo_title }}">
                            <p>0 of 70 characters used</p>
                        </div>
                        <div class="row">
                            <label>Description</label>
                            <textarea name="seo_description" >{{ @$edit_post->seo_description }}</textarea>
                            <p>0 of 320 characters used</p>
                        </div>
                        <div class="row">
                            <label>URL and handle</label>
                            <div class="url-input">
                                <input type="text" name="seo_url" value="{{ @$edit_post->seo_url}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="columns one-third right-details">
            <div class="card">
                    <div class="p-3">
                        <h3 class="fs-16 fw-6 lh-normal">Featured @if($edit_post->image)Image  @else Video @endif</h3>
                         

                        <div id="blog_image_up" class="avatar-upload" @if($edit_post->image)style="display:block" @else style="display:none" @endif>
                            <div class="avatar-edit">
                                <input type='file' name="image" id="logoUpload" accept=".png, .jpg, .jpeg" />
                                <img src="{{ url('assets/images/upload-icon.svg') }}">
                                <button class="secondary">Add Files</button>
                                <label for="logoUpload">or drop files to upload</label>
                            </div>
                            <div class="avatar-preview">
                            @if($edit_post->image)                              
                                <div id="logoPreview" style="background-image: url('{{ url('storage/'.$edit_post->image) }}'); @if($edit_post->image) display:block @endif" ></div>
                                 @endif
                                </div>
                            </div>
                        
                        <div id="blog_video_up" class="avatar-upload" @if($edit_post->video)style="display:block" @else style="display:none" @endif>
                            <div class="avatar-edit">
                                <input type="file" id="logoUpload_video" name="video" accept=".mp4">
                                <img src="{{ url('assets/images/upload-icon.svg') }}">
                                <button class="secondary">Add Video</button>
                                <label for="logoUpload">or drop files to upload</label>
                            </div>
                            <div class="avatar-preview">
                                 @if($edit_post->video)   
                                <div  id="logoPreview_video" @if($edit_post->video)style="display:block" @endif><video autoplay muted loop ><source src="{{ url('storage/'.@$edit_post->video)}}" type="video/mp4"></source></video></div>
                                 @endif
                                </div>
                         </div>
                    </div>
                </div>
                 
            </div>
        </article>
    </section>
    <section class="full-width flex-wrap admin-body-width">
        <div class="page-bottom-btn">
            <a class="warning delete_blogpost" data-id="{{$edit_post->id}}" data-toggle="modal" data-target="#delete-blog-post">Delete blog</a>
            <button class="save_button">Update</button>
        </div>
    </section>
    </form>
    <div  id="delete-blog-post"  class="customer-modal-main" style="z-index: 999999;">

            <div class="customer-modal-inner">

               <div class="customer-modal">

                  <div class="modal-header">

                     <h2>Delete</h2>

                     <span data-dismiss="modal" class="modal-close-btn">

                        <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">

                           <path d="m11.414 10 6.293-6.293a1 1 0 1 0-1.414-1.414L10 8.586 3.707 2.293a1 1 0 0 0-1.414 1.414L8.586 10l-6.293 6.293a1 1 0 1 0 1.414 1.414L10 11.414l6.293 6.293A.998.998 0 0 0 18 17a.999.999 0 0 0-.293-.707L11.414 10z"></path>

                        </svg>

                     </span>

                  </div>

                  <div class="modal-body">

                     <div class="row">

                        <div class="form-field-list">

                              <label>Are you sure you want to delete?</label>

                        </div>

                     </div>

                  </div>

                  <div class="modal-footer">
                     <div class="button-col">
                         <?php $deleteurl = $edit_post->id?>
                        <button class="button secondary" data-dismiss="modal" data-dismiss="modal">Cancel</button>
                        <button class="button"><a  href="{{URL::to('/admin/blogs/delete-post/'.$deleteurl)}}" style="color:#fff">Yes, Delete</a></button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
 
<script type="text/javascript">
    $( ".edit-website-seo-btn" ).click(function() {     
        $('.search-engine-listing-card .card-middle').toggle();
    });

    $('.tinymce-editor').each(function () {
                CKEDITOR.replace($(this).prop('id'));
    });
      
     
        $(document).on("change","#userType",function(e){
            var usertype=$(this).val();
            if(usertype==2){
                $('#blog_video_up').show();
                $("#blog_image_up").hide();           
            } if(usertype==0){
                $('#blog_video_up').hide();
                $("#blog_image_up").show();
            }
        });
</script>
<style type="text/css">
li#update_bgimage{ height: 278px;}
button.save_button{color:#fff!important;}
</style>
<!-- Edit Blog page end -->
</x-admin-layout>