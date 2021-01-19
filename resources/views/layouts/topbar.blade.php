<div class="topbar-main">
    <div class="container-fluid">

        <!-- Logo container-->
        <div class="logo">
            <!-- Text Logo -->
            <!--<a href="index.html" class="logo">-->
            <!--Annex-->
            <!--</a>-->
            <!-- Image Logo -->
            <a href="index.html" class="logo">
                <img src="assets/images/logo-sm.png" alt="" height="22" class="logo-small">
                <img src="assets/images/logo.png" alt="" height="16" class="logo-large">
            </a>

        </div>
        <!-- End Logo container-->


        <div class="menu-extras topbar-custom">

            <ul class="list-inline float-right mb-0">



                <!-- notification-->
                <li class="list-inline-item dropdown notification-list">
                    <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
                       aria-haspopup="false" aria-expanded="false">
                        <i class="mdi mdi-bell-outline noti-icon"></i>
                        <span class="badge badge-success noti-icon-badge">21</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg">
                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5>Notification (3)</h5>
                        </div>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                            <p class="notify-details"><b>Your order is placed</b><small class="text-muted">Dummy text of the printing and typesetting industry.</small></p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-warning"><i class="mdi mdi-message"></i></div>
                            <p class="notify-details"><b>New Message received</b><small class="text-muted">You have 87 unread messages</small></p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-info"><i class="mdi mdi-martini"></i></div>
                            <p class="notify-details"><b>Your item is shipped</b><small class="text-muted">It is a long established fact that a reader will</small></p>
                        </a>

                        <!-- All-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            View All
                        </a>

                    </div>
                </li>
                <!-- User-->
                <li class="list-inline-item dropdown notification-list">
                    <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                       aria-haspopup="false" aria-expanded="false">
                        <img src="assets/images/users/avatar-1.jpg" alt="user" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <small>
                                @if(!empty(auth()->user()->name))
                                    {{ auth()->user()->name }}
                                @endif
                            </small>
                        </div>
                        <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile</a>
                        <a class="dropdown-item" href="#"><i class="mdi mdi-wallet m-r-5 text-muted"></i> My Wallet</a>
                        <a class="dropdown-item" href="#"><span class="badge badge-success float-right">5</span><i class="mdi mdi-settings m-r-5 text-muted"></i> Settings</a>
                        <a class="dropdown-item" href="#"><i class="mdi mdi-lock-open-outline m-r-5 text-muted"></i> Lock screen</a>
                        <div class="dropdown-divider"></div>
                        <form id="logout-form" action="{{route('logout')}}" method="POST">
                            @csrf
                            <button type="submit"  class="dropdown-item text-danger"  >  <i class="fa fa-window-close text-danger"></i> </i> Cerrar Sesión</a>
                        </form>

                    </div>
                </li>
                <li class="menu-item list-inline-item">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle nav-link">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </li>

            </ul>
        </div>
        <!-- end menu-extras -->

        <div class="clearfix"></div>

    </div> <!-- end container -->
</div>
