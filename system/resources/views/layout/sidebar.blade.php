<div class="sidebar">
    <div class="scrollbar-inner sidebar-wrapper">
        <div class="user">
            <div class="photo">
                <img src="{{ url('public') }}/{{ Auth::guard('admin')->user()->foto }}">
            </div>
            <div class="info">
                <a class="#">
                    <span>
                        {{ Auth::guard('admin')->user()->nama }}
                        <span class="user-level">Administrator</span>
                    </span>
                </a>
                <div class="clearfix"></div>
            </div>
        </div>
        <ul class="nav">
            <li class="nav-item {{ (request()->is('admin/dashboard*')) ? 'active' : '' }}">
                <a href="{{ url('admin/dashboard') }}">
                    <i class="la la-dashboard"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item {{ (request()->is('admin/pemilik*')) ? 'active' : '' }}">
                <a href="{{ url('admin/pemilik') }}">
                    <i class="la la-user"></i>
                    <p>Pemilik</p>
                </a>
            </li>
            <li class="nav-item {{ (request()->is('admin/lahan*')) ? 'active' : '' }}">
                <a href="{{ url('admin/lahan') }}">
                    <i class="la la-map"></i>
                    <p>Lahan</p>
                </a>
            </li>
            <li class="nav-item {{ (request()->is('admin/persentase/*')) ? 'active' : '' }}">
                <a href="{{ url('admin/persentase') }}">
                    <i class="la la-map"></i>
                    <p>Persentase Lahan</p>
                </a>
            </li>
            
        </ul>
    </div>
</div>