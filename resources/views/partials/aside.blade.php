<div class="sidebar app-aside" id="sidebar">
    <div class="sidebar-container perfect-scrollbar">
        <nav>
            <div class="search-form"><a class="s-open" href="#"><i class="ti-search"></i></a>
                <form class="navbar-form" role="search"><a class="s-remove" href="#" target=".navbar-form"><i class="ti-close"></i></a>
                    <div class="form-group"><input type="text" class="form-control" placeholder="Search..."> <button class="btn search-button" type="submit"><i class="ti-search"></i></button></div>
                </form>
            </div>
            <div class="navbar-title"><span>Control Navigation</span></div>
            <ul class="main-navigation-menu">
                <li>
                    <a href="index.html">
                        <div class="item-content">
                            <div class="item-media"><i class="ti-home"></i></div>
                            <div class="item-inner"><span class="title">Dashboard</span></div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <div class="item-content">
                            <div class="item-media"><i class="ti-lock"></i></div>
                            <div class="item-inner"><span class="title">Orders </span><i class="icon-arrow"></i></div>
                        </div>
                    </a>
                    <ul class="sub-menu">
                    <li><a href="{{route('orders.qcreate',true)}}"><span class="title">Add</span></a></li>
                        <li><a href="{{route('orders.index')}}"><span class="title">List</span></a></li>
                        
                    </ul>
                </li>

                <li>
                        <a href="javascript:void(0)">
                            <div class="item-content">
                                <div class="item-media"><i class="ti-unlock"></i></div>
                                <div class="item-inner"><span class="title">Quotes </span><i class="icon-arrow"></i></div>
                            </div>
                        </a>
                        <ul class="sub-menu">
                        <li><a href="{{route('quotes.create')}}"><span class="title">Add</span></a></li>
                            <li><a href="{{route('quotes.index')}}"><span class="title">List</span></a></li>
                            
                        </ul>
                    </li>

                <li>
                        <a href="javascript:void(0)">
                            <div class="item-content">
                                <div class="item-media"><i class="ti-money"></i></div>
                                <div class="item-inner"><span class="title">Wallet </span><i class="icon-arrow"></i></div>
                            </div>
                        </a>
                        <ul class="sub-menu">
                        <li><a href="{{route('wallets.create')}}"><span class="title">Add Money</span></a></li>
                        @can('super',\App\Product::class)
                            <li><a href="{{route ('wallets.index')}}"><span class="title">Wallets</span></a></li>
                            @endcan
                            <li><a href="{{route ('wallets.franchise',auth()->id())}}"><span class="title">My Wallet</span></a></li>
                            </ul>
                    </li>
                                
                    <li>
                        <a href="javascript:void(0)">
                            <div class="item-content">
                                <div class="item-media"><i class="ti-user"></i></div>
                                <div class="item-inner"><span class="title">Clients </span><i class="icon-arrow"></i></div>
                            </div>
                        </a>
                        <ul class="sub-menu">
                        <li><a href="{{route('clients.create')}}"><span class="title">Add</span></a></li>
                            <li><a href="{{route('clients.index')}}"><span class="title">List</span></a></li>
                            </ul>
                    </li>
             
             
             
          
            </ul>
            @can('admin',\App\Product::class)
            <div class="navbar-title"><div class="item-media"><i class="ti-settings"></i><span>Settings</span></div></div>
            <ul class="folders">
                    <li>
                            <a href="javascript:void(0)">
                                <div class="item-content">
                                    <div class="item-media"><i class="ti-package"></i></div>
                                    <div class="item-inner"><span class="title">Products </span><i class="icon-arrow"></i></div>
                                </div>
                            </a>
                            <ul class="sub-menu">
                                @can('super',\App\Product::class)
                                <li><a href="{{route('products.create')}}"><span class="title">Add</span></a></li>
                                @endcan
                                <li><a href="{{route('products.index')}}"><span class="title">List</span></a></li>
                            </ul>
                        </li>  
                        
                        <li>
                                <a href="javascript:void(0)">
                                    <div class="item-content">
                                        <div class="item-media"><i class="ti-key"></i></div>
                                        <div class="item-inner"><span class="title">Users 'N' Roles </span><i class="icon-arrow"></i></div>
                                    </div>
                                </a>
                                 <ul class="sub-menu">
                                        @can('super',\App\User::class)
                                    <li><a href="{{route('register')}}"><span class="title">Add User</span></a></li>
                                    @endcan
                                    <li><a href="{{route('users.index')}}"><span class="title">List Users</span></a></li>
                                    @can('super',\App\Role::class)
                                    <li><a href="{{route('roles.create')}}"><span class="title">Add Role</span></a></li>
                                    @endcan
                                    <li><a href="{{route('roles.index')}}"><span class="title">List Roles</span></a></li>
                                </ul>
                            </li>       

                <li>
                    <a href="javascript:void(0)">
                        <div class="item-content">
                            <div class="item-media"><i class="ti-write"></i></div>
                            <div class="item-inner"><span class="title">Papers</span></div>
                        </div>
                    </a>
                    <ul class="sub-menu">
                            @can('super',\App\Paper::class)
                    <li><a href="{{route('papers.create')}}"><span class="title">Add</span></a></li>
                    <li><a href="{{route('paper-prices.create')}}"><span class="title">Add Price</span></a></li>
                    @endcan
                        <li><a href="{{route('papers.index')}}"><span class="title">List</span></a></li>
                       
                       
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <div class="item-content">
                            <div class="item-media"><i class="ti-more-alt"></i></div>
                            <div class="item-inner"><span class="title">Treatments</span></div>
                        </div>
                    </a>
                    <ul class="sub-menu">
                            @can('super',\App\Treatment::class)
                            <li><a href="{{route('treatments.create')}}"><span class="title">Add</span></a></li>
                            <li><a href="{{route('treatment-prices.create')}}"><span class="title">Add Price</span></a></li>
                            @endcan
                            <li><a href="{{route('treatments.index')}}"><span class="title">List</span></a></li>
                               
                                
                            </ul>
                </li>
                <li>
                        <a href="javascript:void(0)">
                            <div class="item-content">
                                <div class="item-media"><i class="ti-layout-grid3"></i></div>
                                <div class="item-inner"><span class="title">Categories</span></div>
                            </div>
                        </a>
                        <ul class="sub-menu">
                                @can('super',\App\Category::class)
                                <li><a href="{{route('category.create')}}"><span class="title">Add</span></a></li>
                                @endcan
                                    <li><a href="{{route('category.index')}}"><span class="title">List</span></a></li>
                                    @can('super',\App\Category::class)
                                    <li><a href="{{route('catmargins.create')}}"><span class="title">Add Margin</span></a></li>
                                    <li><a href="{{route('catmargins.index')}}"><span class="title">List Margins</span></a></li>
                                    @endcan
                                </ul>
                    </li>

                <li>
                        <a href="javascript:void(0)">
                            <div class="item-content">
                                <div class="item-media"><i class="ti-list"></i></div>
                                <div class="item-inner"><span class="title">Quantities</span></div>
                            </div>
                        </a>
                        <ul class="sub-menu">
                                @can('super',\App\Quantity::class)
                                <li><a href="{{route('quantity.create')}}"><span class="title">Add</span></a></li>
                                @endcan
                                    <li><a href="{{route('quantity.index')}}"><span class="title">List</span></a></li>
                                </ul>
                    </li>
                    <li>
                            <a href="javascript:void(0)">
                                <div class="item-content">
                                    <div class="item-media"><i class="ti-ruler"></i></div>
                                    <div class="item-inner"><span class="title">Sizes</span></div>
                                </div>
                            </a>
                            <ul class="sub-menu">
                                    @can('super',\App\Size::class)
                                    <li><a href="{{route('sizes.create')}}"><span class="title">Add</span></a></li>
                                    @endcan
                                        <li><a href="{{route('sizes.index')}}"><span class="title">List</span></a></li>
                                    </ul>
                        </li>
                        <li>
                                <a href="javascript:void(0)">
                                    <div class="item-content">
                                        <div class="item-media"><i class="ti-ink-pen"></i></div>
                                        <div class="item-inner"><span class="title">GSM</span></div>
                                    </div>
                                </a>
                                <ul class="sub-menu">
                                        @can('super',\App\Gsm::class)
                                        <li><a href="{{route('gsm.create')}}"><span class="title">Add</span></a></li>
                                        @endcan
                                            <li><a href="{{route('gsm.index')}}"><span class="title">List</span></a></li>
                                        </ul>
                            </li>
            </ul>
            @endcan
        </nav>
    </div>
</div>