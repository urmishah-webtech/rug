
<div class="panel_sidebar">
    <div class="admin_bar">
        <ul>
            <li ><a href="{{ route('admin-dashboard') }}"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M18 7.261V17.5c0 .841-.672 1.5-1.5 1.5h-2c-.828 0-1.5-.659-1.5-1.5V13H7v4.477C7 18.318 6.328 19 5.5 19h-2c-.828 0-1.5-.682-1.5-1.523V7.261a1.5 1.5 0 0 1 .615-1.21l6.59-4.82a1.481 1.481 0 0 1 1.59 0l6.59 4.82A1.5 1.5 0 0 1 18 7.26z"></path></svg>Home</a></li>
            <li class="<?php if(request()->route()->getName() === 'order-list' || request()->route()->getName() === 'draft-orders' || request()->route()->getName() === 'checkout-list') echo "active"; ?>">
                <a href="{{ route('order-list') }}"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false"  aria-hidden="true"><path d="M11 1a1 1 0 1 0-2 0v7.586L7.707 7.293a1 1 0 0 0-1.414 1.414l3 3a1 1 0 0 0 1.414 0l3-3a1 1 0 0 0-1.414-1.414L11 8.586V1z"></path><path d="M3 14V3h4V1H2.5A1.5 1.5 0 0 0 1 2.5v15A1.5 1.5 0 0 0 2.5 19h15a1.5 1.5 0 0 0 1.5-1.5v-15A1.5 1.5 0 0 0 17.5 1H13v2h4v11h-3.5c-.775 0-1.388.662-1.926 1.244l-.11.12A1.994 1.994 0 0 1 10 16a1.994 1.994 0 0 1-1.463-.637l-.111-.12C7.888 14.664 7.275 14 6.5 14H3z"></path></svg> Orders</a>
                <!-- <ul class="sub_items">
                    <li class="{{ request()->route()->getName() === 'order-list' ?  'active' : '' }}"><a href="{{ route('order-list') }}">All Orders</a></li>
                    <li class="{{ request()->route()->getName() === 'draft-orders' ?  'active' : '' }}"><a href="{{ route('draft-orders') }}">Drafts</a></li>
                    <li class="{{ request()->route()->getName() === 'checkout-list' ?  'active' : '' }}"><a href="{{ route('checkout-list') }}">Abandoned checkouts</a></li>
                </ul> -->
            </li>
          <?php /*   <li class="have_sub_item <?php if(request()->route()->getName() === 'products' || request()->route()->getName() === 'inventory' || request()->route()->getName() === 'transfers' || request()->route()->getName() === 'collections' || request()->route()->getName() === 'gift-cards') echo "active"; ?>">
                <a class="nav-dropdown"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M10.293 1.293A1 1 0 0 1 11 1h7a1 1 0 0 1 1 1v7a1 1 0 0 1-.293.707l-9 9a1 1 0 0 1-1.414 0l-7-7a1 1 0 0 1 0-1.414l9-9zM15.5 6a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z"></path></svg> Products</a>
                <ul class="sub_items">
                    <li class="{{ request()->route()->getName() === 'products' ?  'active' : '' }}"><a href="{{ route('products') }}">All Products</a></li>
                    <li class="{{ request()->route()->getName() === 'inventory' ?  'active' : '' }}"><a href="{{ route('inventory') }}">Inventory</a></li>
                    <li class="{{ request()->route()->getName() === 'transfers' ?  'active' : '' }}"><a href="{{ route('transfers') }}">Transfers</a></li>
                    <li class="{{ request()->route()->getName() === 'collections' ?  'active' : '' }}"><a href="{{ route('collections') }}">Collections</a></li>
                    <li class="{{ request()->route()->getName() === 'gift-cards' ?  'active' : '' }}"><a href="{{ route('gift-cards') }}">Gift Cards</a></li>
                </ul>
            </li> 
            */?>
            <li class="{{ request()->route()->getName() === 'products' ?  'active' : '' }}">
                <a href="{{ route('products') }}"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M14.363 5.22a4.22 4.22 0 1 1-8.439 0 4.22 4.22 0 0 1 8.439 0zM2.67 14.469c1.385-1.09 4.141-2.853 7.474-2.853 3.332 0 6.089 1.764 7.474 2.853.618.486.81 1.308.567 2.056l-.333 1.02A2.11 2.11 0 0 1 15.846 19H4.441a2.11 2.11 0 0 1-2.005-1.455l-.333-1.02c-.245-.748-.052-1.57.567-2.056z"></path></svg> Products</a>
            </li>

            <li class="{{ request()->route()->getName() === 'collections' ?  'active' : '' }}">
                <a href="{{ route('collections') }}"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M14.363 5.22a4.22 4.22 0 1 1-8.439 0 4.22 4.22 0 0 1 8.439 0zM2.67 14.469c1.385-1.09 4.141-2.853 7.474-2.853 3.332 0 6.089 1.764 7.474 2.853.618.486.81 1.308.567 2.056l-.333 1.02A2.11 2.11 0 0 1 15.846 19H4.441a2.11 2.11 0 0 1-2.005-1.455l-.333-1.02c-.245-.748-.052-1.57.567-2.056z"></path></svg> Collections </a>
            </li>

            <li class="{{ request()->route()->getName() === 'customers' ?  'active' : '' }}">
                <a href="{{ route('customers') }}"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M14.363 5.22a4.22 4.22 0 1 1-8.439 0 4.22 4.22 0 0 1 8.439 0zM2.67 14.469c1.385-1.09 4.141-2.853 7.474-2.853 3.332 0 6.089 1.764 7.474 2.853.618.486.81 1.308.567 2.056l-.333 1.02A2.11 2.11 0 0 1 15.846 19H4.441a2.11 2.11 0 0 1-2.005-1.455l-.333-1.02c-.245-.748-.052-1.57.567-2.056z"></path></svg> Customers</a>
            </li>
             
            <li class="{{ request()->route()->getName() === 'discounts' ?  'active' : '' }}">
                <a href="{{ route('slider-list') }}"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M15.5 3A1.5 1.5 0 0 0 14 4.5v12a1.5 1.5 0 0 0 1.5 1.5h1a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 16.5 3h-1zM8 8.5A1.5 1.5 0 0 1 9.5 7h1A1.5 1.5 0 0 1 12 8.5v8a1.5 1.5 0 0 1-1.5 1.5h-1A1.5 1.5 0 0 1 8 16.5v-8zm-6 4A1.5 1.5 0 0 1 3.5 11h1A1.5 1.5 0 0 1 6 12.5v4A1.5 1.5 0 0 1 4.5 18h-1A1.5 1.5 0 0 1 2 16.5v-4z"></path></svg> Slider </a>
            </li>
            <li class="{{ request()->route()->getName() === 'articles' ?  'active' : '' }}">
                <a href="{{ route('articles') }}"><svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M1.791 2.253l-.597 3.583A1 1 0 002.18 7h.893a1.5 1.5 0 001.342-.83L5 5l.585 1.17A1.5 1.5 0 006.927 7h1.146a1.5 1.5 0 001.342-.83L10 5l.585 1.17a1.5 1.5 0 001.342.83h1.146a1.5 1.5 0 001.342-.83L15 5l.585 1.17a1.5 1.5 0 001.342.83h.893a1 1 0 00.986-1.164l-.597-3.583A1.5 1.5 0 0016.729 1H3.271a1.5 1.5 0 00-1.48 1.253z" fill="#5C5F62"/><path d="M18 9H2v8.5A1.5 1.5 0 003.5 19H7v-7h6v7h3.5a1.5 1.5 0 001.5-1.5V9z" fill="#5C5F62"/></svg> Blogs </a>
            </li>
            <li class="have_sub_item <?php if(request()->route()->getName() === 'faq' || request()->route()->getName() === 'faq-category') echo "active"; ?>">
                <a class="nav-dropdown"><i class="fas fa-question " style="margin-right: 26px;"></i>  Faq</a>
                <ul class="sub_items">
                    <li class="{{ request()->route()->getName() === 'faq' ?  'active' : '' }}"><a href="{{ route('faq') }}">All Faq</a></li>
                    <li class="{{ request()->route()->getName() === 'faq-category' ?  'active' : '' }}"><a href="{{ route('faq-category') }}">Faq category</a></li> 
                </ul>
            </li>
            <li class="{{ request()->route()->getName() === 'pages-list' ?  'active' : '' }}">
                <a href="{{ route('pages-list') }}"><i class="fas fa-solid fa-paste" style="margin-right: 26px;"></i>  Pages </a>
            </li>
            <li class="{{ request()->route()->getName() === 'menus' ?  'active' : '' }}">
                <a href="{{ route('menus') }}"><i class="fas fa-solid fa-bars" style="margin-right: 26px;"></i>  Navigation </a>
            </li>
            <li class="{{ request()->route()->getName() === 'preferences' ?  'active' : '' }}">
                <a href="{{ route('preferences') }}"><i class="fas fa-solid fa-asterisk" style="margin-right: 26px;"></i>  Preferences </a>
            </li>
            <li class="setting-link">
                <a href="{{ route('settings') }}"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path fill-rule="evenodd" d="M9.027 0a1 1 0 0 0-.99.859l-.37 2.598A6.993 6.993 0 0 0 5.742 4.57l-2.437-.98a1 1 0 0 0-1.239.428L.934 5.981a1 1 0 0 0 .248 1.287l2.066 1.621a7.06 7.06 0 0 0 0 2.222l-2.066 1.621a1 1 0 0 0-.248 1.287l1.132 1.962a1 1 0 0 0 1.239.428l2.438-.979a6.995 6.995 0 0 0 1.923 1.113l.372 2.598a1 1 0 0 0 .99.859h2.265a1 1 0 0 0 .99-.859l.371-2.598a6.995 6.995 0 0 0 1.924-1.112l2.438.978a1 1 0 0 0 1.238-.428l1.133-1.962a1 1 0 0 0-.249-1.287l-2.065-1.621a7.063 7.063 0 0 0 0-2.222l2.065-1.621a1 1 0 0 0 .249-1.287l-1.133-1.962a1 1 0 0 0-1.239-.428l-2.437.979a6.994 6.994 0 0 0-1.924-1.113L12.283.86a1 1 0 0 0-.99-.859H9.027zm1.133 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path></svg> Settings</a>
            </li>

            <!--<li class="{{ request()->route()->getName() === 'slider' ?  'active' : '' }}">
                <a href="{{ route('discount-list') }}"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path fill-rule="evenodd" d="M11.566.66a2.189 2.189 0 0 0-3.132 0l-.962.985a2.189 2.189 0 0 1-1.592.66l-1.377-.017a2.189 2.189 0 0 0-2.215 2.215l.016 1.377a2.189 2.189 0 0 1-.66 1.592l-.984.962a2.189 2.189 0 0 0 0 3.132l.985.962c.428.418.667.994.66 1.592l-.017 1.377a2.189 2.189 0 0 0 2.215 2.215l1.377-.016a2.189 2.189 0 0 1 1.592.66l.962.984c.859.88 2.273.88 3.132 0l.962-.985a2.189 2.189 0 0 1 1.592-.66l1.377.017a2.189 2.189 0 0 0 2.215-2.215l-.016-1.377a2.189 2.189 0 0 1 .66-1.592l.984-.962c.88-.859.88-2.273 0-3.132l-.985-.962a2.189 2.189 0 0 1-.66-1.592l.017-1.377a2.189 2.189 0 0 0-2.215-2.215l-1.377.016a2.189 2.189 0 0 1-1.592-.66L11.566.66zM7 8.5a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zm6 6a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3zm.778-8.278a1.1 1.1 0 0 1 0 1.556l-6 6a1.1 1.1 0 1 1-1.556-1.556l6-6a1.1 1.1 0 0 1 1.556 0z"></path></svg> Discounts</a>-->
            </li>
            <!-- <li class="{{ request()->route()->getName() === 'role' ?  'active' : '' }}">
                <a href="{{ route('role') }}"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M14.363 5.22a4.22 4.22 0 1 1-8.439 0 4.22 4.22 0 0 1 8.439 0zM2.67 14.469c1.385-1.09 4.141-2.853 7.474-2.853 3.332 0 6.089 1.764 7.474 2.853.618.486.81 1.308.567 2.056l-.333 1.02A2.11 2.11 0 0 1 15.846 19H4.441a2.11 2.11 0 0 1-2.005-1.455l-.333-1.02c-.245-.748-.052-1.57.567-2.056z"></path></svg> role</a>
            </li>
            <li class="{{ request()->route()->getName() === 'role-permission' ?  'active' : '' }}">
                <a href="{{ route('role-permission') }}"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M14.363 5.22a4.22 4.22 0 1 1-8.439 0 4.22 4.22 0 0 1 8.439 0zM2.67 14.469c1.385-1.09 4.141-2.853 7.474-2.853 3.332 0 6.089 1.764 7.474 2.853.618.486.81 1.308.567 2.056l-.333 1.02A2.11 2.11 0 0 1 15.846 19H4.441a2.11 2.11 0 0 1-2.005-1.455l-.333-1.02c-.245-.748-.052-1.57.567-2.056z"></path></svg> Role Permission</a>
            </li> -->
             
        </ul>
        
    </div>
</div>



