<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="user-profile">
        <div class="user-image">
            <img src="{{ Auth::user()->avatar}}">
        </div>
        <div class="user-name">
            {{ Auth::user()->name}}
        </div>
        <div class="user-designation">
            Seller Panel
        </div>
    </div>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('seller.home') }}">
                <i class="icon-box menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#products" aria-expanded="false" aria-controls="auth">
                <i class="icon-command menu-icon"></i>
                <span class="menu-title">Products Activity</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="products">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('seller.product') }}"> Products </a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('seller.shop') }}"> Shops </a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>