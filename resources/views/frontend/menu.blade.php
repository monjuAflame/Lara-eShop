 <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @foreach($categories as $key => $c)
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ strtoupper($c->category_name) }} <span class="caret"></span>
                            </a>
                            @if($c->products->count()!=0)
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                               
                               @foreach($c->products as $key => $p)
                               <?php ++$i; ?>
                                <a class="dropdown-item" href="#">
                                    <i class="fa fa-toggle-right"></i>
                                    {{ strtoupper($p->product_name) }} 
                                </a>
                                <?php echo $i < $c->products->count() ? '<div class="dropdown-divider"></div>' : null; ?>
                                @endforeach
                                
                            </div>
                            @endif
                        </li>
                        @endforeach

                        <li class="nav-item">
                            <form action="#" class="form-inline">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-search"></i>
                                        </span>
                                    </div>
                                </div>
                            </form>
                        </li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                       
                            <li class="nav-itam">
                                <a href="{{ route('cart.read') }}" class="nav-link">
                                    <i class="fa fa-shopping-cart"></i>Cart
                                    <span class="badge badge-primary">{{ Cart::count() }}</span>
                                </a>
                            </li>
                        @if(!auth()->guard('customer')->check())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('customer.login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                           <li class="nav-item">
                                <a class="nav-link" href="{{ route('customer.home') }}">
                                    <i class="fa fa-admins"></i>Account
                                </a>
                            </li>
                        @endif


                           
                     
                            <!-- <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Customer <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="#" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li> -->
                    </ul>
                </div>
            </div>
        </nav>