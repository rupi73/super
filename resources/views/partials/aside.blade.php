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
                            <div class="item-media"><i class="ti-settings"></i></div>
                            <div class="item-inner"><span class="title">Orders </span><i class="icon-arrow"></i></div>
                        </div>
                    </a>
                    <ul class="sub-menu">
                    <li><a href="{{route('orders.create')}}"><span class="title">Add</span></a></li>
                        <li><a href="{{route('orders.index')}}"><span class="title">List</span></a></li>
                    </ul>
                </li>
                                
              
             
             
             
          
            </ul>
            <div class="navbar-title"><span>Settings</span></div>
            <ul class="folders">
                    <li>
                            <a href="javascript:void(0)">
                                <div class="item-content">
                                    <div class="item-media"><span class="fa-stack"><i class="fa fa-square fa-stack-2x"></i> <i class="fa fa-folder-open-o fa-stack-1x fa-inverse"></i></span></div>
                                    <div class="item-inner"><span class="title">Products </span><i class="icon-arrow"></i></div>
                                </div>
                            </a>
                            <ul class="sub-menu">
                                <li><a href="{{route('products.create')}}"><span class="title">Add</span></a></li>
                                <li><a href="{{route('products.index')}}"><span class="title">List</span></a></li>
                            </ul>
                        </li>  
                        
                        <li>
                                <a href="javascript:void(0)">
                                    <div class="item-content">
                                        <div class="item-media"><span class="fa-stack"><i class="fa fa-square fa-stack-2x"></i> <i class="fa fa-folder-open-o fa-stack-1x fa-inverse"></i></span></div>
                                        <div class="item-inner"><span class="title">Users 'N' Roles </span><i class="icon-arrow"></i></div>
                                    </div>
                                </a>
                                <ul class="sub-menu">
                                    <li><a href="{{route('register')}}"><span class="title">Add User</span></a></li>
                                    <li><a href="{{route('users.index')}}"><span class="title">List Users</span></a></li>
                                    <li><a href="{{route('roles.create')}}"><span class="title">Add Role</span></a></li>
                                    <li><a href="{{route('roles.index')}}"><span class="title">List Roles</span></a></li>
                                </ul>
                            </li>       

                <li>
                    <a href="javascript:void(0)">
                        <div class="item-content">
                            <div class="item-media"><span class="fa-stack"><i class="fa fa-square fa-stack-2x"></i> <i class="fa fa-terminal fa-stack-1x fa-inverse"></i></span></div>
                            <div class="item-inner"><span class="title">Papers</span></div>
                        </div>
                    </a>
                    <ul class="sub-menu">
                    <li><a href="{{route('papers.create')}}"><span class="title">Add</span></a></li>
                        <li><a href="{{route('papers.index')}}"><span class="title">List</span></a></li>
                        <li><a href="{{route('paper-prices.create')}}"><span class="title">Add Price</span></a></li>
                       
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <div class="item-content">
                            <div class="item-media"><span class="fa-stack"><i class="fa fa-square fa-stack-2x"></i> <i class="fa fa-folder-open-o fa-stack-1x fa-inverse"></i></span></div>
                            <div class="item-inner"><span class="title">Treatments</span></div>
                        </div>
                    </a>
                    <ul class="sub-menu">
                            <li><a href="{{route('treatments.create')}}"><span class="title">Add</span></a></li>
                                <li><a href="{{route('treatments.index')}}"><span class="title">List</span></a></li>
                                <li><a href="{{route('treatment-prices.create')}}"><span class="title">Add Price</span></a></li>
                                
                            </ul>
                </li>
                <li>
                        <a href="javascript:void(0)">
                            <div class="item-content">
                                <div class="item-media"><span class="fa-stack"><i class="fa fa-square fa-stack-2x"></i> <i class="fa fa-folder-open-o fa-stack-1x fa-inverse"></i></span></div>
                                <div class="item-inner"><span class="title">Categories</span></div>
                            </div>
                        </a>
                        <ul class="sub-menu">
                                <li><a href="{{route('category.create')}}"><span class="title">Add</span></a></li>
                                    <li><a href="{{route('category.index')}}"><span class="title">List</span></a></li>
                                </ul>
                    </li>

                <li>
                        <a href="javascript:void(0)">
                            <div class="item-content">
                                <div class="item-media"><span class="fa-stack"><i class="fa fa-square fa-stack-2x"></i> <i class="fa fa-folder-open-o fa-stack-1x fa-inverse"></i></span></div>
                                <div class="item-inner"><span class="title">Quantities</span></div>
                            </div>
                        </a>
                        <ul class="sub-menu">
                                <li><a href="{{route('quantity.create')}}"><span class="title">Add</span></a></li>
                                    <li><a href="{{route('quantity.index')}}"><span class="title">List</span></a></li>
                                </ul>
                    </li>
                    <li>
                            <a href="javascript:void(0)">
                                <div class="item-content">
                                    <div class="item-media"><span class="fa-stack"><i class="fa fa-square fa-stack-2x"></i> <i class="fa fa-folder-open-o fa-stack-1x fa-inverse"></i></span></div>
                                    <div class="item-inner"><span class="title">Sizes</span></div>
                                </div>
                            </a>
                            <ul class="sub-menu">
                                    <li><a href="{{route('sizes.create')}}"><span class="title">Add</span></a></li>
                                        <li><a href="{{route('sizes.index')}}"><span class="title">List</span></a></li>
                                    </ul>
                        </li>
                        <li>
                                <a href="javascript:void(0)">
                                    <div class="item-content">
                                        <div class="item-media"><span class="fa-stack"><i class="fa fa-square fa-stack-2x"></i> <i class="fa fa-folder-open-o fa-stack-1x fa-inverse"></i></span></div>
                                        <div class="item-inner"><span class="title">GSM</span></div>
                                    </div>
                                </a>
                                <ul class="sub-menu">
                                        <li><a href="{{route('gsm.create')}}"><span class="title">Add</span></a></li>
                                            <li><a href="{{route('gsm.index')}}"><span class="title">List</span></a></li>
                                        </ul>
                            </li>
            </ul>
        </nav>
    </div>
</div>