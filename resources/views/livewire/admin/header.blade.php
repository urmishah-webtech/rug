<div class="admin_panel_header">
    <div class="header_site_name">
        <div class="hidden_desktop">
            <div class="open_side_menu mr-2 fs-20"><i class="fas fa-bars"></i></div>
        </div>
        <a href="{{ route('admin-dashboard') }}" class="site_title">Rug</a>
    </div>
    <div class="header_site_search hidden_mobile">
        <form name="panel_search" id="panel_search" method="post">
            <button type="submit"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M8 12a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm9.707 4.293l-4.82-4.82A5.968 5.968 0 0 0 14 8 6 6 0 0 0 2 8a6 6 0 0 0 6 6 5.968 5.968 0 0 0 3.473-1.113l4.82 4.82a.997.997 0 0 0 1.414 0 .999.999 0 0 0 0-1.414z"></path></svg></button>
            <input type="text" name="search_from_panel" id="search_from_panel" placeholder="Search">
        </form>
    </div>
    <div class="header_user_name">


        <a class="header_user_profile" onclick="myFunction()">
            <img src="{{ URL::asset('/assets/logo-blue-small._CB485919770_.svg')}}" width="30%">
            <h4>Rug</h4>
        </a>
        <div style="display: none" id="myDIV">
            <ul style="list-style-type:none;">
                <li><a href="#"><svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M10 15c-1.631 0-3.064-.792-3.978-2 .914-1.208 2.347-2 3.978-2 1.631 0 3.064.792 3.978 2-.914 1.208-2.347 2-3.978 2zm0-10c1.104 0 2 .897 2 2s-.896 2-2 2-2-.897-2-2 .896-2 2-2zm0-3c-4.411 0-8 3.589-8 8s3.589 8 8 8 8-3.589 8-8-3.589-8-8-8z"></path></svg> Manage Account</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <input type="hidden" name="role" value="admin" />

                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            <svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M10 19a8 8 0 1 0 0-16 8 8 0 0 0 0 16zM9.293 8.707a1 1 0 0 1 1.414-1.414l3 3a1 1 0 0 1 0 1.414l-3 3a1 1 0 0 1-1.414-1.414L10.586 12H7a1 1 0 1 1 0-2h3.586L9.293 8.707z"></path></svg> Log Out
                        </a>
                    </form>
                </li>
                
            </ul>
        </div>
    </div>
</div>
<style>
    .dropdown-divider {
        height: 0;
        margin: .5rem 0;
        overflow: hidden;
        border-top: 1px solid #e9ecef;
    }
</style>
<script type="text/javascript">

    function myFunction() {
        var x = document.getElementById("myDIV");
        if (x.style.display === "none") {
            x.style.display = "inline-block";
        } else {
            x.style.display = "none";
        }
    }
   
</script>
