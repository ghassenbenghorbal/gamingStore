<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@php
            if(Route::is('admin_panel'))
                echo "Admin Dashboard";
            else if(Route::is('admin.categories'))
                echo "Categories";
            else if(Route::is('admin.users'))
                echo "Users";
            else if(Route::is('admin.orderManagement'))
                echo "Orders";
            else if(Route::is('admin.settings'))
                echo "Settings";
            else if(Route::is('admin.products'))
                echo "Products";
            else if(Route::is('admin.deposits'))
                echo "Deposits";
            else if(Route::is('admin.keys'))
                echo "Keys";
            else
                echo "Admin Dashboard";
    @endphp</title>
    <!-- plugins:css -->

    <link rel="stylesheet" href="{{asset('vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.addons.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- endinject -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <style>
        .form-control{
            border-color: rgb(131, 131, 131);
        }




    </style>
    <script src="https://kit.fontawesome.com/cfee24ab20.js" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
                <a class="navbar-brand brand-logo" href="{{route('admin.dashboard')}}">
                    <div style="color: #007bff;">GKeys</div>
                </a>
                <a class="navbar-brand brand-logo-mini" href="{{route('admin.dashboard')}}">
                    <div style="color: #007bff;">GKeys</div>
                </a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center">
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item dropdown d-none d-xl-inline-block">
                        <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                            <span class="profile-text">{{session()->get('admin')->name}}</span>
                            <img class="img-xs rounded-circle" src="{{asset('storage/uploads/face1.jpg')}}" alt="Profile image">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                            <br>
                            <br>
                            <a class="dropdown-item" href="{{route('admin.settings')}}">
                                Settings
                            </a>
                            <a class="dropdown-item" href="{{route('admin.logout')}}">
                                Sign Out
                            </a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas position-fixed" id="sidebar">
                <ul class="nav">
                    <li class="nav-item nav-profile">
                        <div class="nav-link">
                            <div class="user-wrapper">
                                <div class="profile-image">
                                    <img src="{{asset('storage/uploads/face1.jpg')}}" alt="profile image">
                                </div>
                                <div class="text-wrapper">
                                    <p class="profile-name">{{session()->get('admin')->name}}</p>
                                    <div>
                                        <small class="designation text-muted">Admin</small>
                                        <span class="status-indicator online"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item {{Route::is('admin.dashboard') ? 'active' : ''}}">
                        <a class="nav-link" href="{{route('admin.dashboard')}}">
                            <i class="menu-icon mdi mdi-television"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item {{Route::is('admin.users') ? 'active' : ''}}">
                        <a class="nav-link" href="{{route('admin.users')}}">
                            <i class="menu-icon fas fa-users"></i>
                            <span class="menu-title">Users</span>
                        </a>
                    </li>
                    <li class="nav-item {{Route::is('admin.deposits') ? 'active' : ''}}">
                        <a class="nav-link" href="{{route('admin.deposits')}}">
                            <i class="menu-icon mdi mdi-bank"></i>
                            <span class="menu-title">Received Deposits</span>
                        </a>
                    </li>
                    <li class="nav-item {{Route::is('admin.userdeposits') ? 'active' : ''}}">
                        <a class="nav-link" href="{{route('admin.userdeposits')}}">
                            <i class="menu-icon fas fa-money-check-alt"></i>
                            <span class="menu-title">User Deposits</span>
                        </a>
                    </li>
                    <li class="nav-item {{Route::is('admin.products') ? 'active' : ''}}">
                        <a class="nav-link" href="{{route('admin.products')}}">
                            <i class="menu-icon mdi mdi-cart-outline"></i>
                            <span class="menu-title">Products</span>
                        </a>
                    </li>
                    <li class="nav-item {{Route::is('admin.categories') ? 'active' : ''}}">
                        <a class="nav-link" href="{{route('admin.categories')}}">
                            <i class="menu-icon mdi mdi-view-grid"></i>
                            <span class="menu-title">Categories</span>
                        </a>
                    </li>
                    <li class="nav-item {{Route::is('admin.keys') ? 'active' : ''}}">
                        <a class="nav-link" href="{{route('admin.keys')}}">
                            <i class="menu-icon mdi mdi-key"></i>
                            <span class="menu-title">Keys</span>
                        </a>
                    </li>
                    <li class="nav-item {{Route::is('admin.orderManagement') ? 'active' : ''}}">
                        <a class="nav-link" href="{{route('admin.orderManagement')}}">
                            <i class="menu-icon mdi mdi-content-paste"></i>
                            <span class="menu-title">Order Management</span>
                        </a>
                    </li>
                </li>
                <li class="nav-item {{Route::is('comp') ? 'active' : ''}}">
                    <a class="nav-link" href="{{route('comp')}}">
                        <i class="menu-icon mdi mdi-trophy-variant"></i>
                        <span class="menu-title">Competitions</span>
                    </a>
                </li>
                <li class="nav-item {{Route::is('mettreajour') ? 'active' : ''}}">
                    <a class="nav-link" href="{{route('mettreajour')}}">
                        <i class="menu-icon mdi mdi-trophy-award"></i>
                        <span class="menu-title">Update Winner</span>
                    </a>
                </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel" style="margin-left:250px">
                @yield('content')
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <footer class="footer">

                </footer>
                <!-- partial -->
            </div>


            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{asset('vendors/js/vendor.bundle.addons.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{asset('js/off-canvas.js')}}"></script>
    <script src="{{asset('js/misc.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->

    <script src="{{asset('js/dashboard.js')}}"></script>
    <script src="{{asset('js/chart.js')}}"></script>

    <!--    Jquery Validation-->
    <script src="{{asset('js/lib/jquery.js')}}"></script>
    <script src="{{asset('js/dist/jquery.validate.js')}}"></script>
    <!-- End custom js for this page-->


</body>

</html>
