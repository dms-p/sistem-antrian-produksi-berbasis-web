<a href="index3.html" class="brand-link">
    <!--img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8"-->
    <span class="brand-text font-weight-light">{{config('app.name')}}</span>
</a>
<div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <h5 class="text-white text-center">{{Auth::user()->name}}</h5>
        </div>
    </div>
    @if (Auth::user()->role_id==2)
        @include('includes.nav_production')
    @else
        @include('includes.nav_admin')
    @endif
</div>