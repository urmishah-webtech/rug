<?php

$currentUrl = url()->current();

?>

<meta name="viewport" content="width=device-width,initial-scale=1.0">

<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<link href="{{asset('vendor/harimayco-menu/style.css')}}" rel="stylesheet">


<div wire:key="alert">

     @if (session()->has('message'))

     <div class="alert alert-success">

        {{ session('message') }}

     </div>

     @endif

  </div>
      
<div id="hwpwrap">

     <section class="full-width flex-wrap admin-body-width">

        <article class="full-width">

            <div class="columns seven">

                <div class="page_header d-flex  align-item-center mb-3">

                    <a href="{{route('menu-list')}}"><button class="secondary icon-arrow-left mr-2"></button></a>

                    @if(request()->has('menu')  && !empty(request()->input("menu")))<h4 class="mb-0 fw-5">@if(isset($indmenu)){{$indmenu->name}}@endif</h4>@else<h4 class="mb-0 fw-5">Add Menu</h4>@endif

                </div>

            </div>

        </article>

    </section>


    <section class="full-width flex-wrap admin-body-width wpmwnu-details-sec">

    <div class="custom-wp-admin wp-admin wp-core-ui js   menu-max-depth-0 nav-menus-php auto-fold admin-bar">

        <div id="wpwrap">

            <div id="wpcontent">

                <div id="wpbody">

                    <div id="wpbody-content">



                        <div class="wrap">



                            {{-- <div class="manage-menus">

                                 <form method="get" action="{{ $currentUrl }}">

                                     <label for="menu" class="selected-menu">Select the menu you want to edit:</label>



                                     {!! Menu::select('menu', $menulist) !!}



                                     <span class="submit-btn">

                                         <input type="submit" class="button-secondary" value="Choose">

                                     </span>

                                     <span class="add-new-menu-action"> or <a

                                             href="{{ $currentUrl }}?action=edit&menu=0">Create new menu</a>. </span>

                                 </form>

                             </div>--}}

                            <article class="full-width">
                            <div id="nav-menus-frame" class="columns one-third right-details">



                                @if(request()->has('menu')  && !empty(request()->input("menu")))

                                    <div id="menu-settings-column" class="metabox-holder">



                                        <div class="clear"></div>



                                        <form id="nav-menu-meta" action="" class="nav-menu-meta card card-pd-0 navbar-left-card" method="post"

                                              enctype="multipart/form-data">

                                            <div id="side-sortables" class="accordion-container">

                                                <ul class="outer-border">

                                                    <li class="control-section accordion-section  open add-page"

                                                        id="add-page">

                                                        <h3 class="accordion-section-title hndle" tabindex="0"> Custom

                                                            Link <span class="screen-reader-text">Press return or enter to expand</span>

                                                        </h3>

                                                        <div class="accordion-section-content ">

                                                            <div class="inside">

                                                                <div class="customlinkdiv" id="customlinkdiv">
                                                                    <p id="menu-item-url-wrap">
                                                                        <label class="howto" for="custom-menu-item-url">
                                                                            <span>URL</span>&nbsp;&nbsp;&nbsp;
                                                                            <input id="custom-menu-item-url" name="url"type="text"class="menu-item-textbox "placeholder="url">
                                                                        </label>
                                                                    </p>
                                                                    <p id="menu-item-name-wrap">
                                                                        <label class="howto" for="custom-menu-item-name">
                                                                            <span>Label</span>&nbsp;
                                                                            <input id="custom-menu-item-name"name="label" type="text"class="regular-text menu-item-textbox input-with-default-title"title="Label menu">
                                                                        </label>
                                                                    </p>
                                                                    <p id="menu-item-image-wrap">
                                                                        <label class="howto"for="custom-menu-item-image">
                                                                            <span>Upload Photo</span>
                                                                        </label>
                                                                        <input type="file" name="image_path"id="custom-menu-item-image"class="form-control">
                                                                    </p>
                                                                    @if(!empty($roles))
                                                                        <p id="menu-item-role_id-wrap">
                                                                            <label class="howto"
                                                                                   for="custom-menu-item-name"> <span>Role</span>&nbsp;
                                                                                <select id="custom-menu-item-role"name="role">
                                                                                    <option value="0">Select Role </option>
                                                                                    @foreach($roles as $role)
                                                                                    <option value="{{ $role->$role_pk }}">{{ ucfirst($role->$role_title_field) }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </label>
                                                                        </p>
                                                                    @endif
                                                                    <p class="button-controls">
                                                                        <a href="#" onclick="addcustommenu()"class="button-secondary submit-add-to-menu right secondary">Add menu item</a>
                                                                        <span class="spinner" id="spincustomu"></span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>

                                            </div>

                                        </form>

                                    </div>

                                @endif

                                <div id="menu-settings-column" class="metabox-holder">

                                    <div class="clear"></div>

                                    <form id="nav-menu-meta" action="" class="nav-menu-meta card card-pd-0 navbar-left-card" method="post" enctype="multipart/form-data">

                                        <div id="side-sortables" class="accordion-container">

                                            <ul class="outer-border">

                                                <li class="control-section accordion-section add-page"

                                                    id="add-page">

                                                    <h3 class="accordion-section-title hndle" tabindex="0"> Page<span class="screen-reader-text">Press return or enter to expand</span>

                                                    </h3>

                                                    <div class="accordion-section-content ">
                                                        <div class="inside">
                                                            <ul id="posttype-page-tabs" class="posttype-tabs add-menu-item-tabs">
                                                                <li class="tabs" id="tab1">
                                                                    <a class="nav-tab-link" data-type="tabs-panel-posttype-page-most-recent">Most Recent</a>
                                                                </li>
                                                                <li id="tab2">
                                                                    <a class="nav-tab-link" data-type="page-all">View All</a>
                                                                </li>
                                                                <li id="tab3">
                                                                    <a class="nav-tab-link" data-type="tabs-panel-posttype-page-search">Search</a>
                                                                </li>
                                                            </ul>
                                                            <div class="tabs-cont-main">
                                                                <div class="tabs-cont tabs" data-tab="tab1">
                                                                    <div class="posttype-page-most-recent">
                                                                        @foreach($this->pageslimit as $row)
                                                                        <label>
                                                                        <input  name="page_id[]" type="checkbox" class="menu-item-textbox" value="{{$row->id}}">{{$row->title}}</label>
                                                                        @endforeach
                                                                        <label>
                                                                        <input type="hidden" id="idmenus" value="@if(isset($indmenu)){{$indmenu->id}}@endif"/></label>
                                                                    </div>
                                                                    <p class="button-controls">
                                                                        <a href="javascript:;" class="button-secondary right secondary addMainmenu">Add menu item</a>
                                                                        <span class="spinner" id="spinMainmenu"></span>
                                                                    </p>
                                                                </div>
                                                                <div class="tabs-cont" data-tab="tab2">
                                                                    <div class="posttype-page-most-recent">
                                                                        @foreach($this->pages as $row)
                                                                        <label>
                                                                        <input  name="page_id[]" type="checkbox" class="menu-item-textbox" value="{{$row->id}}">{{$row->title}}</label>
                                                                        @endforeach
                                                                        <label>
                                                                        <input type="hidden" id="idmenus" value="@if(isset($indmenu)){{$indmenu->id}}@endif"/></label>
                                                                    </div>
                                                                    <p class="button-controls">
                                                                        <a href="javascript:;" class="button-secondary right secondary addMainmenu">Add menu item</a>
                                                                        <span class="spinner" id="spinMainmenu"></span>
                                                                    </p>
                                                                </div>
                                                                <div class="tabs-cont" data-tab="tab3">
                                                                    <div class="posttype-page-most-recent">
                                                                        <ul class="pagechecklist-most-recent">
                                                                            <li>
                                                                                <input type="text" id="search-page">
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="posttype-page-most-recent" id="page-item" style="display: none;">
                                                                        @foreach($this->pages as $row)
                                                                        <div class="page-item" >
                                                                        <label>
                                                                        <input  name="page_id[]" type="checkbox" class="menu-item-textbox" value="{{$row->id}}">{{$row->title}}</label>
                                                                        </div>
                                                                        @endforeach
                                                                        <label>
                                                                        <input type="hidden" id="idmenus" value="@if(isset($indmenu)){{$indmenu->id}}@endif"/></label>
                                                                    </div>
                                                                    <p class="button-controls">
                                                                        <a href="javascript:;" class="button-secondary right secondary addMainmenu">Add menu item</a>
                                                                        <span class="spinner" id="spinMainmenu"></span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </li>



                                            </ul>

                                        </div>

                                    </form>

                                </div>

                                <div id="menu-settings-column" class="metabox-holder">

                                    <div class="clear"></div>

                                    <form id="nav-menu-meta" action="" class="nav-menu-meta card card-pd-0 navbar-left-card" method="post" enctype="multipart/form-data">

                                        <div id="side-sortables" class="accordion-container">

                                            <ul class="outer-border">

                                                <li class="control-section accordion-section add-page" id="add-page">
                                                    <h3 class="accordion-section-title hndle" tabindex="0"> Product<span class="screen-reader-text">Press return or enter to expand</span> </h3>
                                                    <div class="accordion-section-content ">
                                                        <div class="inside">
                                                            <ul id="posttype-page-tabs" class="posttype-tabs add-menu-item-tabs">
                                                                <li class="tabs" id="tab4">
                                                                    <a class="nav-tab-link" data-type="tabs-panel-posttype-page-most-recent">Most Recent</a>
                                                                </li>
                                                                <li id="tab5">
                                                                    <a class="nav-tab-link" data-type="page-all">View All</a>
                                                                </li>
                                                                <li id="tab6">
                                                                    <a class="nav-tab-link" data-type="tabs-panel-posttype-page-search">Search</a>
                                                                </li>
                                                            </ul>
                                                            <div class="tabs-cont-main">
                                                                <div class="tabs-cont tabs" data-tab="tab4"> 
                                                                    <div class="posttype-page-most-recent">
                                                                        @foreach($this->productlimit as $row)
                                                                        <label><input  name="product_id[]" type="checkbox" class="menu-item-textbox" value="{{$row->id}}">{{$row->title}}</label>
                                                                        <label><input type="hidden" name="productlink[]" value="{{$row->seo_utl}}"></label>
                                                                        @endforeach
                                                                        <label><input type="hidden" id="idmenus" value="@if(isset($indmenu)){{$indmenu->id}}@endif"/></label>
                                                                    </div>
                                                                    <p class="button-controls">
                                                                        <a href="javascript:;" class="button-secondary right secondary addProductmenu">Add menu item</a>
                                                                        <span class="spinner" id="spinproduct"></span>
                                                                    </p>
                                                                </div>
                                                                <div class="tabs-cont" data-tab="tab5">
                                                                    <div class="posttype-page-most-recent">
                                                                        @foreach($this->Product as $row)
                                                                        <label><input name="product_id[]" type="checkbox" class="menu-item-textbox" value="{{$row->id}}">{{$row->title}}</label>
                                                                        <label><input type="hidden" name="productlink[]" value="{{$row->seo_utl}}"></label>
                                                                        @endforeach
                                                                        <label><input type="hidden" id="idmenus" value="@if(isset($indmenu)){{$indmenu->id}}@endif"/></label>
                                                                    </div>
                                                                    <p class="button-controls">
                                                                        <a href="javascript:;" class="button-secondary right secondary addProductmenu">Add menu item</a>
                                                                        <span class="spinner" id="spinproduct"></span>
                                                                    </p>
                                                                </div>
                                                                <div class="tabs-cont" data-tab="tab6">
                                                                    <div class="posttype-page-most-recent">
                                                                        <ul class="pagechecklist-most-recent">
                                                                            <li>
                                                                                <input type="text" id="search-product">
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="posttype-page-most-recent"  id="product-item" style="display: none;">
                                                                        @foreach($this->Product as $row)
                                                                        <div class="product-item">
                                                                        <label><input  name="product_id[]" type="checkbox" class="menu-item-textbox" value="{{$row->id}}">{{$row->title}}</label>
                                                                        <label><input type="hidden" name="productlink[]" value="{{$row->seo_utl}}"></label>
                                                                        </div>
                                                                        @endforeach
                                                                        <label><input type="hidden" id="idmenus" value="@if(isset($indmenu)){{$indmenu->id}}@endif"/></label>
                                                                    </div>
                                                                    <p class="button-controls">
                                                                        <a href="javascript:;" class="button-secondary right secondary addProductmenu">Add menu item</a>
                                                                        <span class="spinner" id="spinproduct"></span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>



                                            </ul>

                                        </div>

                                    </form>

                                </div>

                                <div id="menu-settings-column" class="metabox-holder">

                                    <div class="clear"></div>

                                    <form id="nav-menu-meta" action="" class="nav-menu-meta card card-pd-0 navbar-left-card" method="post" enctype="multipart/form-data">

                                        <div id="side-sortables" class="accordion-container">

                                            <ul class="outer-border">

                                                <li class="control-section accordion-section add-page"

                                                    id="add-page">

                                                    <h3 class="accordion-section-title hndle" tabindex="0"> Collection<span class="screen-reader-text">Press return or enter to expand</span>

                                                    </h3>

                                                    <div class="accordion-section-content ">
                                                        <div class="inside">
                                                            <ul id="posttype-page-tabs" class="posttype-tabs add-menu-item-tabs">
                                                                <li class="tabs" id="tab1">
                                                                    <a class="nav-tab-link" data-type="tabs-panel-posttype-page-most-recent">Most Recent</a>
                                                                </li>
                                                                <li id="tab2">
                                                                    <a class="nav-tab-link" data-type="page-all">View All</a>
                                                                </li>
                                                                <li id="tab3">
                                                                    <a class="nav-tab-link" data-type="tabs-panel-posttype-page-search">Search</a>
                                                                </li>
                                                            </ul>
                                                            <div class="tabs-cont-main">
                                                                <div class="tabs-cont tabs" data-tab="tab1">
                                                                    <div class="posttype-page-most-recent">
                                                                        @foreach($this->Collectionlimit as $row)
                                                                        <label>
                                                                        <input  name="collection_id[]" type="checkbox" class="menu-item-textbox" value="{{$row->id}}">{{$row->title}}</label>
                                                                        @endforeach
                                                                        <label>
                                                                        <input type="hidden" id="idmenus" value="@if(isset($indmenu)){{$indmenu->id}}@endif"/></label>
                                                                    </div>
                                                                    <p class="button-controls">
                                                                        <a href="javascript:;" class="button-secondary right secondary addCollectionmenu">Add menu item</a>
                                                                        <span class="spinner" id="spinMainmenu"></span>
                                                                    </p>
                                                                </div>
                                                                <div class="tabs-cont" data-tab="tab2">
                                                                    <div class="posttype-page-most-recent">
                                                                        @foreach($this->Collection as $row)
                                                                        <label>
                                                                        <input  name="collection_id[]" type="checkbox" class="menu-item-textbox" value="{{$row->id}}">{{$row->title}}</label>
                                                                        @endforeach
                                                                        <label>
                                                                        <input type="hidden" id="idmenus" value="@if(isset($indmenu)){{$indmenu->id}}@endif"/></label>
                                                                    </div>
                                                                    <p class="button-controls">
                                                                        <a href="javascript:;" class="button-secondary right secondary addCollectionmenu">Add menu item</a>
                                                                        <span class="spinner" id="spinMainmenu"></span>
                                                                    </p>
                                                                </div>
                                                                <div class="tabs-cont" data-tab="tab3">
                                                                    <div class="posttype-page-most-recent">
                                                                        <ul class="pagechecklist-most-recent">
                                                                            <li>
                                                                                <input type="text" id="search-collection">
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                    <div class="posttype-page-most-recent" id="collection-item" style="display: none;">
                                                                        @foreach($this->Collection as $row)
                                                                        <div class="collection-item" >
                                                                        <label>
                                                                        <input  name="collection_id[]" type="checkbox" class="menu-item-textbox" value="{{$row->id}}">{{$row->title}}</label>
                                                                        </div>
                                                                        @endforeach
                                                                        <label>
                                                                        <input type="hidden" id="idmenus" value="@if(isset($indmenu)){{$indmenu->id}}@endif"/></label>
                                                                    </div>
                                                                    <p class="button-controls">
                                                                        <a href="javascript:;" class="button-secondary right secondary addCollectionmenu">Add menu item</a>
                                                                        <span class="spinner" id="spinCollectionmenu"></span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </li>



                                            </ul>

                                        </div>

                                    </form>

                                </div>

                            </div>

                            <div class="columns two-thirds">
                                <div id="menu-management-liquid" class="card card-pd-0 navbar-right-card">

                                    <div id="menu-management">

                                        <form id="update-nav-menu" action="" method="post"

                                              enctype="multipart/form-data">

                                            <div class="menu-edit ">

                                                <div id="nav-menu-header">

                                                    <div class="major-publishing-actions">



                                                        <label class="menu-name-label howto open-label" for="menu-name">

                                                            <span>Title</span>



                                                            <input name="menu-name" id="menu-name" type="text"

                                                                   class="menu-name regular-text menu-item-textbox"

                                                                   title="Enter menu name"

                                                                   value="@if(isset($indmenu)){{$indmenu->name}}@endif">

                                                            <input type="hidden" id="idmenu"

                                                                   value="@if(isset($indmenu)){{$indmenu->id}}@endif"/>

                                                        </label>



                                                        @if(request()->has('action'))

                                                            <div class="publishing-action">

                                                                <a onclick="createnewmenu()" name="save_menu"

                                                                   id="save_menu_header"

                                                                   class="button button-primary menu-save green-btn">Create

                                                                    menu</a>

                                                            </div>

                                                        @elseif(request()->has("menu"))

                                                            <div class="publishing-action">

                                                                <a onclick="getmenus()" name="save_menu"

                                                                   id="save_menu_header"

                                                                   class="button button-primary menu-save">Save menu</a>

                                                                <span class="spinner" id="spincustomu2"></span>

                                                            </div>



                                                        @else

                                                            <div class="publishing-action">

                                                                <a onclick="createnewmenu()" name="save_menu"

                                                                   id="save_menu_header"

                                                                   class="button button-primary menu-save">Create

                                                                    menu</a>

                                                            </div>

                                                        @endif

                                                    </div>

                                                </div>

                                                <div id="post-body">

                                                    <div id="post-body-content">



                                                        @if(request()->has("menu"))

                                                            <h3 class="">Menu Structure</h3>

                                                            <div class="drag-instructions post-body-plain" style="">

                                                                <p class="mb-8">

                                                                    Place each item in the order you prefer. Click on

                                                                    the arrow to the right of the item to display more

                                                                    configuration options.

                                                                </p>

                                                            </div>



                                                        @else

                                                            <h3>Menu Creation</h3>

                                                            <div class="drag-instructions post-body-plain" style="">

                                                                <p>

                                                                    Please enter the name and select "Create menu"

                                                                    button

                                                                </p>

                                                            </div>

                                                        @endif



                                                        <ul class="menu ui-sortable" id="menu-to-edit">

                                                            @if(isset($menus))

                                                                <?php $menu_img = [];?>

                                                                @foreach($menus as $m)



                                                                        <li id="menu-item-{{$m->id}}"

                                                                            class="menu-item menu-item-depth-{{$m->depth}} menu-item-page menu-item-edit-inactive pending"

                                                                            style="display: list-item;">

                                                                            <dl class="menu-item-bar">

                                                                                <dt class="menu-item-handle">

                                                                                <span class="item-title"> <span

                                                                                        class="menu-item-title"> <span

                                                                                            id="menutitletemp_{{$m->id}}">{{$m->label}}</span> <span

                                                                                            style="color: transparent;">|{{$m->id}}|</span> </span> <span

                                                                                        class="is-submenu"

                                                                                        style="@if($m->depth==0)display: none;@endif">Subelement</span> </span>

                                                                                    <span class="item-controls"> <span

                                                                                            class="item-type">Link</span> <span

                                                                                            class="item-order hide-if-js"> <a

                                                                                                href="{{ $currentUrl }}?action=move-up-menu-item&menu-item={{$m->id}}&_wpnonce=8b3eb7ac44"

                                                                                                class="item-move-up"><abbr

                                                                                                    title="Move Up">↑</abbr></a> | <a

                                                                                                href="{{ $currentUrl }}?action=move-down-menu-item&menu-item={{$m->id}}&_wpnonce=8b3eb7ac44"

                                                                                                class="item-move-down"><abbr

                                                                                                    title="Move Down">↓</abbr></a> </span> <a

                                                                                            class="item-edit"

                                                                                            id="edit-{{$m->id}}"

                                                                                            title=" "

                                                                                            href="{{ $currentUrl }}?edit-menu-item={{$m->id}}#menu-item-settings-{{$m->id}}"> </a> </span>

                                                                                </dt>

                                                                            </dl>



                                                                            <div class="menu-item-settings"

                                                                                 id="menu-item-settings-{{$m->id}}">

                                                                                <input type="hidden"

                                                                                       class="edit-menu-item-id"

                                                                                       name="menuid_{{$m->id}}"

                                                                                       value="{{$m->id}}"/>

                                                                                <p class="description description-thin">

                                                                                    <label

                                                                                        for="edit-menu-item-title-{{$m->id}}">

                                                                                        Label

                                                                                        <br>

                                                                                        <input type="text"

                                                                                               id="idlabelmenu_{{$m->id}}"

                                                                                               class="widefat edit-menu-item-title"

                                                                                               name="idlabelmenu_{{$m->id}}"

                                                                                               value="{{$m->label}}">

                                                                                    </label>

                                                                                </p>



                                                                                <p class="field-css-classes description description-thin">

                                                                                    <label

                                                                                        for="edit-menu-item-classes-{{$m->id}}">

                                                                                        Class CSS (optional)

                                                                                        <br>

                                                                                        <input type="text"

                                                                                               id="clases_menu_{{$m->id}}"

                                                                                               class="widefat code edit-menu-item-classes"

                                                                                               name="clases_menu_{{$m->id}}"

                                                                                               value="{{$m->class}}">

                                                                                    </label>

                                                                                </p>



                                                                                <p class="field-css-url description description-wide">

                                                                                    <label

                                                                                        for="edit-menu-item-url-{{$m->id}}">

                                                                                        Url

                                                                                        <br>
                                                                                        @if($m->type_category != 2 || $m->type_category != 3)
                                                                                        <input type="text"

                                                                                           id="url_menu_{{$m->id}}"

                                                                                           class="widefat code edit-menu-item-url"

                                                                                           id="url_menu_{{$m->id}}"

                                                                                           value="{{$m->link}}">
                                                                                        @endif
                                                                                        @if($m->type_category == 2)
                                                                                        <a href="{{ url('/product').'/'.$m->link }}">{{ url('/collection').'/'.$m->link }}</a>
                                                                                        <input type="text"

                                                                                               id="url_menu_{{$m->id}}"

                                                                                               class="widefat code edit-menu-item-url"

                                                                                               id="url_menu_{{$m->id}}"

                                                                                               value="{{$m->link}}" readonly>
                                                                                        @endif
                                                                                        @if($m->type_category == 3)
                                                                                        <a href="{{ url('/collection').'/'.$m->link }}">{{ url('/collection').'/'.$m->link }}</a>
                                                                                        <input type="text"

                                                                                               id="url_menu_{{$m->id}}"

                                                                                               class="widefat code edit-menu-item-url"

                                                                                               id="url_menu_{{$m->id}}"

                                                                                               value="{{$m->link}}" readonly>
                                                                                        @endif

                                                                                    </label>

                                                                                </p>

                                                                                <p class="description ">

                                                                                    <label

                                                                                        for="edit-menu-item-image-{{$m->id}}">

                                                                                        Image

                                                                                        <br>

                                                                                        @if(!empty($m->image))

                                                                                            <img

                                                                                                src="{{asset('storage/uploads/'.$m->image)}}"

                                                                                                height="100px"

                                                                                                width="100px"/>

                                                                                        @endif

                                                                                    </label>

                                                                                </p>

                                                                                @if(!empty($roles))

                                                                                    <p class="field-css-role description description-wide">

                                                                                        <label

                                                                                            for="edit-menu-item-role-{{$m->id}}">

                                                                                            Role

                                                                                            <br>

                                                                                            <select

                                                                                                id="role_menu_{{$m->id}}"

                                                                                                class="widefat code edit-menu-item-role"

                                                                                                name="role_menu_[{{$m->id}}]">

                                                                                                <option value="0">Select

                                                                                                    Role

                                                                                                </option>

                                                                                                @foreach($roles as $role)

                                                                                                    <option

                                                                                                        @if($role->id == $m->role_id) selected

                                                                                                        @endif value="{{ $role->$role_pk }}">{{ ucwords($role->$role_title_field) }}</option>

                                                                                                @endforeach

                                                                                            </select>

                                                                                        </label>

                                                                                    </p>

                                                                                @endif



                                                                                <p class="field-move hide-if-no-js description description-wide">

                                                                                    <label> <span>Move</span> <a

                                                                                            href="{{ $currentUrl }}"

                                                                                            class="menus-move-up"

                                                                                            style="display: none;">Move

                                                                                            up</a> <a

                                                                                            href="{{ $currentUrl }}"

                                                                                            class="menus-move-down"

                                                                                            title="Mover uno abajo"

                                                                                            style="display: inline;">Move

                                                                                            Down</a> <a

                                                                                            href="{{ $currentUrl }}"

                                                                                            class="menus-move-left"

                                                                                            style="display: none;"></a>

                                                                                        <a

                                                                                            href="{{ $currentUrl }}"

                                                                                            class="menus-move-right"

                                                                                            style="display: none;"></a>

                                                                                        <a

                                                                                            href="{{ $currentUrl }}"

                                                                                            class="menus-move-top"

                                                                                            style="display: none;">Top</a>

                                                                                    </label>

                                                                                </p>



                                                                                <div

                                                                                    class="menu-item-actions description-wide submitbox">



                                                                                    <a class="item-delete submitdelete deletion"

                                                                                       id="delete-{{$m->id}}"

                                                                                       href="{{ $currentUrl }}?action=delete-menu-item&menu-item={{$m->id}}&_wpnonce=2844002501">Delete</a>

                                                                                    <span

                                                                                        class="meta-sep hide-if-no-js"> | </span>

                                                                                    <a class="item-cancel submitcancel hide-if-no-js button-secondary"

                                                                                       id="cancel-{{$m->id}}"

                                                                                       href="{{ $currentUrl }}?edit-menu-item={{$m->id}}&cancel=1424297719#menu-item-settings-{{$m->id}}">Cancel</a>

                                                                                    <span

                                                                                        class="meta-sep hide-if-no-js"> | </span>

                                                                                    <a onclick="getmenus()"

                                                                                       class="button button-primary updatemenu"

                                                                                       id="update-{{$m->id}}"

                                                                                       href="javascript:void(0)">Update

                                                                                        item</a>



                                                                                </div>



                                                                            </div>

                                                                            <ul class="menu-item-transport"></ul>

                                                                        </li>

                                                                @endforeach

                                                            @endif

                                                        </ul>

{{--                                                        <div class="menu-settings">--}}

{{--                                                            @if(isset($menu_img) && count($menu_img) > 0)--}}

{{--                                                                <p>Sidebar Images</p>--}}

{{--                                                                <ul class="menu ui-sortable" id="menu-to-edit">--}}



{{--                                                                    @foreach($menu_img as $m)--}}



{{--                                                                        <li id="menu-item-{{$m->id}}"--}}

{{--                                                                            class="menu-item menu-item-depth-{{$m->depth}} menu-item-page menu-item-edit-inactive pending"--}}

{{--                                                                            style="display: list-item;">--}}

{{--                                                                            <dl class="menu-item-bar">--}}

{{--                                                                                <dt class="menu-item-handle">--}}

{{--                                                                                <span class="item-title"> <span--}}

{{--                                                                                        class="menu-item-title"> <span--}}

{{--                                                                                            id="menutitletemp_{{$m->id}}">{{$m->label}}</span> <span--}}

{{--                                                                                            style="color: transparent;">|{{$m->id}}|</span> </span> <span--}}

{{--                                                                                        class="is-submenu"--}}

{{--                                                                                        style="@if($m->depth==0)display: none;@endif">Subelement</span> </span>--}}

{{--                                                                                    <span class="item-controls"> <span--}}

{{--                                                                                            class="item-type">Link</span> <span--}}

{{--                                                                                            class="item-order hide-if-js"> <a--}}

{{--                                                                                                href="{{ $currentUrl }}?action=move-up-menu-item&menu-item={{$m->id}}&_wpnonce=8b3eb7ac44"--}}

{{--                                                                                                class="item-move-up"><abbr--}}

{{--                                                                                                    title="Move Up">↑</abbr></a> | <a--}}

{{--                                                                                                href="{{ $currentUrl }}?action=move-down-menu-item&menu-item={{$m->id}}&_wpnonce=8b3eb7ac44"--}}

{{--                                                                                                class="item-move-down"><abbr--}}

{{--                                                                                                    title="Move Down">↓</abbr></a> </span> <a--}}

{{--                                                                                            class="item-edit"--}}

{{--                                                                                            id="edit-{{$m->id}}"--}}

{{--                                                                                            title=" "--}}

{{--                                                                                            href="{{ $currentUrl }}?edit-menu-item={{$m->id}}#menu-item-settings-{{$m->id}}"> </a> </span>--}}

{{--                                                                                </dt>--}}

{{--                                                                            </dl>--}}



{{--                                                                            <div class="menu-item-settings"--}}

{{--                                                                                 id="menu-item-settings-{{$m->id}}">--}}

{{--                                                                                <input type="hidden"--}}

{{--                                                                                       class="edit-menu-item-id"--}}

{{--                                                                                       name="menuid_{{$m->id}}"--}}

{{--                                                                                       value="{{$m->id}}"/>--}}

{{--                                                                                <p class="description description-thin">--}}

{{--                                                                                    <label--}}

{{--                                                                                        for="edit-menu-item-title-{{$m->id}}">--}}

{{--                                                                                        Label--}}

{{--                                                                                        <br>--}}

{{--                                                                                        <input type="text"--}}

{{--                                                                                               id="idlabelmenu_{{$m->id}}"--}}

{{--                                                                                               class="widefat edit-menu-item-title"--}}

{{--                                                                                               name="idlabelmenu_{{$m->id}}"--}}

{{--                                                                                               value="{{$m->label}}">--}}

{{--                                                                                    </label>--}}

{{--                                                                                </p>--}}



{{--                                                                                <p class="field-css-classes description description-thin">--}}

{{--                                                                                    <label--}}

{{--                                                                                        for="edit-menu-item-classes-{{$m->id}}">--}}

{{--                                                                                        Class CSS (optional)--}}

{{--                                                                                        <br>--}}

{{--                                                                                        <input type="text"--}}

{{--                                                                                               id="clases_menu_{{$m->id}}"--}}

{{--                                                                                               class="widefat code edit-menu-item-classes"--}}

{{--                                                                                               name="clases_menu_{{$m->id}}"--}}

{{--                                                                                               value="{{$m->class}}">--}}

{{--                                                                                    </label>--}}

{{--                                                                                </p>--}}



{{--                                                                                <p class="field-css-url description description-wide">--}}

{{--                                                                                    <label--}}

{{--                                                                                        for="edit-menu-item-url-{{$m->id}}">--}}

{{--                                                                                        Url--}}

{{--                                                                                        <br>--}}

{{--                                                                                        <input type="text"--}}

{{--                                                                                               id="url_menu_{{$m->id}}"--}}

{{--                                                                                               class="widefat code edit-menu-item-url"--}}

{{--                                                                                               id="url_menu_{{$m->id}}"--}}

{{--                                                                                               value="{{$m->link}}">--}}

{{--                                                                                    </label>--}}

{{--                                                                                </p>--}}

{{--                                                                                <p class="description ">--}}

{{--                                                                                    <label--}}

{{--                                                                                        for="edit-menu-item-image-{{$m->id}}">--}}

{{--                                                                                        Image--}}

{{--                                                                                        <br>--}}

{{--                                                                                        @if(!empty($m->image))--}}

{{--                                                                                            <img--}}

{{--                                                                                                src="{{asset('storage/uploads/'.$m->image)}}"--}}

{{--                                                                                                height="100px"--}}

{{--                                                                                                width="100px"/>--}}

{{--                                                                                        @endif--}}

{{--                                                                                    </label>--}}

{{--                                                                                </p>--}}

{{--                                                                                @if(!empty($roles))--}}

{{--                                                                                    <p class="field-css-role description description-wide">--}}

{{--                                                                                        <label--}}

{{--                                                                                            for="edit-menu-item-role-{{$m->id}}">--}}

{{--                                                                                            Role--}}

{{--                                                                                            <br>--}}

{{--                                                                                            <select--}}

{{--                                                                                                id="role_menu_{{$m->id}}"--}}

{{--                                                                                                class="widefat code edit-menu-item-role"--}}

{{--                                                                                                name="role_menu_[{{$m->id}}]">--}}

{{--                                                                                                <option value="0">Select--}}

{{--                                                                                                    Role--}}

{{--                                                                                                </option>--}}

{{--                                                                                                @foreach($roles as $role)--}}

{{--                                                                                                    <option--}}

{{--                                                                                                        @if($role->id == $m->role_id) selected--}}

{{--                                                                                                        @endif value="{{ $role->$role_pk }}">{{ ucwords($role->$role_title_field) }}</option>--}}

{{--                                                                                                @endforeach--}}

{{--                                                                                            </select>--}}

{{--                                                                                        </label>--}}

{{--                                                                                    </p>--}}

{{--                                                                                @endif--}}



{{--                                                                                <p class="field-move hide-if-no-js description description-wide">--}}

{{--                                                                                    <label> <span>Move</span> <a--}}

{{--                                                                                            href="{{ $currentUrl }}"--}}

{{--                                                                                            class="menus-move-up"--}}

{{--                                                                                            style="display: none;">Move--}}

{{--                                                                                            up</a> <a--}}

{{--                                                                                            href="{{ $currentUrl }}"--}}

{{--                                                                                            class="menus-move-down"--}}

{{--                                                                                            title="Mover uno abajo"--}}

{{--                                                                                            style="display: inline;">Move--}}

{{--                                                                                            Down</a> <a--}}

{{--                                                                                            href="{{ $currentUrl }}"--}}

{{--                                                                                            class="menus-move-left"--}}

{{--                                                                                            style="display: none;"></a>--}}

{{--                                                                                        <a--}}

{{--                                                                                            href="{{ $currentUrl }}"--}}

{{--                                                                                            class="menus-move-right"--}}

{{--                                                                                            style="display: none;"></a>--}}

{{--                                                                                        <a--}}

{{--                                                                                            href="{{ $currentUrl }}"--}}

{{--                                                                                            class="menus-move-top"--}}

{{--                                                                                            style="display: none;">Top</a>--}}

{{--                                                                                    </label>--}}

{{--                                                                                </p>--}}



{{--                                                                                <div--}}

{{--                                                                                    class="menu-item-actions description-wide submitbox">--}}



{{--                                                                                    <a class="item-delete submitdelete deletion"--}}

{{--                                                                                       id="delete-{{$m->id}}"--}}

{{--                                                                                       href="{{ $currentUrl }}?action=delete-menu-item&menu-item={{$m->id}}&_wpnonce=2844002501">Delete</a>--}}

{{--                                                                                    <span--}}

{{--                                                                                        class="meta-sep hide-if-no-js"> | </span>--}}

{{--                                                                                    <a class="item-cancel submitcancel hide-if-no-js button-secondary"--}}

{{--                                                                                       id="cancel-{{$m->id}}"--}}

{{--                                                                                       href="{{ $currentUrl }}?edit-menu-item={{$m->id}}&cancel=1424297719#menu-item-settings-{{$m->id}}">Cancel</a>--}}

{{--                                                                                    <span--}}

{{--                                                                                        class="meta-sep hide-if-no-js"> | </span>--}}

{{--                                                                                    <a onclick="getmenus()"--}}

{{--                                                                                       class="button button-primary updatemenu"--}}

{{--                                                                                       id="update-{{$m->id}}"--}}

{{--                                                                                       href="javascript:void(0)">Update--}}

{{--                                                                                        item</a>--}}



{{--                                                                                </div>--}}



{{--                                                                            </div>--}}

{{--                                                                            <ul class="menu-item-transport"></ul>--}}

{{--                                                                        </li>--}}

{{--                                                                    @endforeach--}}

{{--                                                                </ul>--}}

{{--                                                            @endif--}}



{{--                                                        </div>--}}

                                                    </div>

                                                </div>

                                                <div id="nav-menu-footer">

                                                    <div class="major-publishing-actions">



                                                        @if(request()->has('action'))

                                                            <div class="publishing-action">

                                                                <a onclick="createnewmenu()" name="save_menu"

                                                                   id="save_menu_header"

                                                                   class="button button-primary menu-save">Create

                                                                    menu</a>

                                                            </div>

                                                        @elseif(request()->has("menu"))

                                                            <span class="delete-action"> <a

                                                                    class="submitdelete deletion menu-delete"

                                                                    onclick="deletemenu()" href="javascript:void(9)">Delete menu</a> </span>

                                                            <div class="publishing-action">



                                                                <a onclick="getmenus()" name="save_menu"

                                                                   id="save_menu_header"

                                                                   class="button button-primary menu-save">Save menu</a>

                                                                <span class="spinner" id="spincustomu2"></span>

                                                            </div>



                                                        @else

                                                            <div class="publishing-action">

                                                                <a onclick="createnewmenu()" name="save_menu"

                                                                   id="save_menu_header"

                                                                   class="button button-primary menu-save">Create

                                                                    menu</a>

                                                            </div>

                                                        @endif

                                                    </div>

                                                </div>

                                            </div>

                                        </form>

                                    </div>

                                </div>
                            </div>

                        </article>
                            <!-- end section -->

                        </div>



                        <div class="clear"></div>

                    </div>



                    <div class="clear"></div>

                </div>

                <div class="clear"></div>

            </div>



            <div class="clear"></div>

        </div>

    </div>

</div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#search-product").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".product-item").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

$(document).ready(function(){
  $("#search-product").on("keyup", function() {
  var x = document.getElementById('search-product').value;
  var y = document.getElementById('product-item');
  if (x.length > 0) {
    y.style.display = 'block';
  } else {
    y.style.display = 'none';
  }
  });
});

$(document).ready(function(){
  $("#search-page").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".page-item").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

$(document).ready(function(){
  $("#search-page").on("keyup", function() {
  var x = document.getElementById('search-page').value;
  var y = document.getElementById('page-item');
  if (x.length > 0) {
    y.style.display = 'block';
  } else {
    y.style.display = 'none';
  }
  });
});

$(document).ready(function(){
  $("#search-collection").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".collection-item").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

$(document).ready(function(){
  $("#search-collection").on("keyup", function() {
  var x = document.getElementById('search-collection').value;
  var y = document.getElementById('collection-item');
  if (x.length > 0) {
    y.style.display = 'block';
  } else {
    y.style.display = 'none';
  }
  });
});

</script>
<script type="text/javascript">
    $(document).ready(function () {
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
       $('.addMainmenu').click(function(e) {

            $('#spinMainmenu').show();
           
            var pageid = $("input[name='page_id[]']:checked").map(function(){return $(this).val();}).get();
            var menuid =  $("#idmenus").val(); 
            console.log(name);

            $.ajax({
                url: "{{ route('add-main-menu') }}",
                type: 'get',
                data: {pageid:pageid,menuid:menuid},
                success: function (response) {
                    window.location.reload();
                },
                complete: function () {
                    $('#spinMainmenu').hide();
                }
            });
       });
    });    

</script>
<script type="text/javascript">
    $(document).ready(function () {
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
       $('.addProductmenu').click(function(e) {

            $('#spinproduct').show();
           
            var product_id = $("input[name='product_id[]']:checked").map(function(){return $(this).val();}).get();
 
            var menuid =  $("#idmenus").val(); 
            console.log(name);

            $.ajax({
                url: "{{ route('add-product-menu') }}",
                type: 'get',
                data: {product_id:product_id,menuid:menuid},
                success: function (response) {
                    window.location.reload();
                },
                complete: function () {
                    $('#spinproduct').hide();
                }
            });
       });
    });

      $(document).ready(function () {
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
       $('.addCollectionmenu').click(function(e) {

            $('#spinCollectionmenu').show();
           
            var collection_id = $("input[name='collection_id[]']:checked").map(function(){return $(this).val();}).get();
 
            var menuid =  $("#idmenus").val(); 
            console.log(name);

            $.ajax({
                url: "{{ route('add-collection-menu') }}",
                type: 'get',
                data: {collection_id:collection_id,menuid:menuid},
                success: function (response) {
                    window.location.reload();
                },
                complete: function () {
                    $('#spinCollectionmenu').hide();
                }
            });
       });
    });    


$(document).ready(function(){
    $('ul.add-menu-item-tabs li').click(function(){
        var $this = $(this);
        var $theTab = $(this).attr('id');
        console.log($theTab);
        if($this.hasClass('tabs')){
        // do nothing
        } else{
            $this.closest('#menu-settings-column').find('ul.add-menu-item-tabs li, .tabs-cont-main .tabs-cont').removeClass('tabs');
            $('.tabs-cont-main .tabs-cont[data-tab="'+$theTab+'"], ul.add-menu-item-tabs li[id="'+$theTab+'"]').addClass('tabs');
        }
    });
});
</script>