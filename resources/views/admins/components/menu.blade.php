<div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <img src="assets/images/logo.svg" alt="" srcset="">
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            <li class='sidebar-title'>Menu</li>
            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i data-feather="briefcase" width="20"></i>
                    <span>Tài khoản</span>
                </a>
                <ul class="submenu ">
                    <li>
                        <a href="{{route('user.index')}}">Tài khoản</a>
                    </li>
                    <li>
                        <a href="{{route('roles.index')}}">Role</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i data-feather="briefcase" width="20"></i>
                    <span>Bài báo</span>
                </a>
                <ul class="submenu ">
                    <li>
                        <a href="{{route('get.indexPost')}}">Bài báo</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
