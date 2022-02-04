<x-admin-layout>
    <!-- Edit Blog page start -->
    <section class="full-width flex-wrap admin-body-width navigation-header">
        <article class="full-width">
            <div class="columns customers-details-heading">
                <div class="page_header d-flex  align-item-center mb-3">
                    <a href="{{ url('/admin/faq-category') }}">
                        <button class="secondary icon-arrow-left mr-2">
                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true">
                                <path d="M17 9H5.414l3.293-3.293a.999.999 0 1 0-1.414-1.414l-5 5a.999.999 0 0 0 0 1.414l5 5a.997.997 0 0 0 1.414 0 .999.999 0 0 0 0-1.414L5.414 11H17a1 1 0 1 0 0-2z"></path>
                            </svg>
                        </button>
                    </a>
                    <h4 class="mb-0 fw-5">Edit Category</h4>
                </div>
                
            </div>
        </article>
    </section>
    <form method="post" action="{{ route('update_FaqCategory_detail')}}">
    @csrf
    <input type="hidden" name="id" value="{{ @$edit_cat->id }}">
    <section class="full-width flex-wrap bd_none admin-body-width">
        <article class="full-width">
            <div class="columns two-thirds">
                <div class="card">
                    <h3 class="fs-16 fw-6">Category details</h3>
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
                        <input type="text" name="category" value="{{ @$edit_cat->category }}">
                    </div>
                </div>
            </div>
        </article>
    </section>
    <section class="full-width flex-wrap admin-body-width">
        <div class="page-bottom-btn">
            <a class="warning delete_blogpost" data-id="{{$edit_cat->id}}" data-toggle="modal" data-target="#delete-category-post">Delete Category</a>
            <button class="save_button">Update</button>
        </div>
    </section>
    </form>
    <div  id="delete-category-post"  class="customer-modal-main" style="z-index: 999999;">

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
                         <?php $deleteurl = $edit_cat->id?>
                        <button class="button secondary" data-dismiss="modal" data-dismiss="modal">Cancel</button>
                        <button class="button"><a  href="{{URL::to('/admin/faq-category/delete-category/'.$deleteurl)}}" style="color:#fff">Yes, Delete</a></button>
                     </div>
                  </div>
               </div>
            </div>
         </div>
 
 
<style type="text/css">
li#update_bgimage{ height: 278px;}
button.save_button{color:#fff!important;}
</style>
<!-- Edit Blog page end -->
</x-admin-layout>