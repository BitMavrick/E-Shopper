<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="user-profile">
        <div class="user-image">
            <img src="{{ Auth::user()->avatar}}">
        </div>
        <div class="user-name">
            {{ Auth::user()->name}}
        </div>
        <div class="user-designation">
            Admin
        </div>
    </div>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.home') }}">
                <i class="icon-box menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#users" aria-expanded="false" aria-controls="auth">
                <i class="icon-head menu-icon"></i>
                <span class="menu-title">Users Activity</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="users">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.users') }}"> Users </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.sellers') }}"> Sellers
                        </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.admins') }}"> Admins
                        </a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.requests') }}"> Requests
                        </a></li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#products" aria-expanded="false" aria-controls="auth">
                <i class="icon-command menu-icon"></i>
                <span class="menu-title">Products Activity</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="products">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('products.index') }}"> Products </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('categories.index') }}"> Categories </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('shops.index') }}"> Shops </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="icon-disc menu-icon"></i>
                <span class="menu-title">UI Elements</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pages/forms/basic_elements.html">
                <i class="icon-file menu-icon"></i>
                <span class="menu-title">Form elements</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pages/charts/chartjs.html">
                <i class="icon-pie-graph menu-icon"></i>
                <span class="menu-title">Charts</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="pages/icons/feather-icons.html">
                <i class="icon-help menu-icon"></i>
                <span class="menu-title">Icons</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="docs/documentation.html">
                <i class="icon-book menu-icon"></i>
                <span class="menu-title">Documentation</span>
            </a>
        </li>
    </ul>
</nav>