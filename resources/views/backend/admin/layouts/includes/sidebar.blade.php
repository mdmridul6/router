<!--begin::Aside menu-->
<div class="aside-menu flex-column-fluid">
    <!--begin::Aside Menu-->
    <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
        data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
        data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu"
        data-kt-scroll-offset="0">
        <!--begin::Menu-->
        <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
            id="#kt_aside_menu" data-kt-menu="true">
            <div class="menu-item">
                <div class="menu-content pb-2">
                    <span class="menu-section text-muted text-uppercase fs-8 ls-1">Dashboard</span>
                </div>
            </div>
            <div class="menu-item">
                <a class="menu-link" href="{{route('admin.home')}}">
                    <span class="menu-icon">
                        <span class="svg-icon svg-icon-2">
                            <i class="fas fa-home"></i>
                        </span>
                    </span>
                    <span class="menu-title">Home</span>
                </a>
            </div>

            <div class="menu-item">
                <div class="menu-content pt-8 pb-2">
                    <span class="menu-section text-muted text-uppercase fs-8 ls-1">Account</span>
                </div>
            </div>

            <div data-kt-menu-trigger="click"
                class="menu-item menu-accordion @if (Route::is('admin.balence.*')) hover show @endif">
                <span class="menu-link">
                    <span class="menu-icon">

                        <span class="svg-icon svg-icon-2">
                            <i class="fas fa-user"></i>
                        </span>

                    </span>
                    <span class="menu-title">Seller Balence</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion menu-active-bg @if (Route::is('admin.balence.*')) show @endif">
                    <div class="menu-item">
                        <a class="menu-link" href="{{route('admin.balence.add')}}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Seller balance</span>
                        </a>
                    </div>
                </div>

            </div>

            <div class="menu-item">
                <div class="menu-content pt-8 pb-2">
                    <span class="menu-section text-muted text-uppercase fs-8 ls-1">Packages</span>
                </div>
            </div>
            <div data-kt-menu-trigger="click"
                class="menu-item menu-accordion @if (Route::is('admin.package.*')) hover show @endif">
                <span class="menu-link">
                    <span class="menu-icon">

                        <span class="svg-icon svg-icon-2">
                            <i class="fas fa-user"></i>
                        </span>

                    </span>
                    <span class="menu-title">Packages</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion menu-active-bg @if (Route::is('admin.package.*')) show @endif">
                    <div class="menu-item">
                        <a class="menu-link" href="{{route('admin.package.index')}}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Router Packages</span>
                        </a>
                    </div>
                </div>
                <div class="menu-sub menu-sub-accordion menu-active-bg">
                    <div class="menu-item">
                        <a class="menu-link" href="{{route('admin.package.sellerPackage')}}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Seller Packages</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="menu-item">
                <div class="menu-content pt-8 pb-2">
                    <span class="menu-section text-muted text-uppercase fs-8 ls-1">Users</span>
                </div>
            </div>
            <div data-kt-menu-trigger="click"
                class="menu-item menu-accordion @if (Route::is('admin.seller.*')) hover show @endif">
                <span class="menu-link">
                    <span class="menu-icon">

                        <span class="svg-icon svg-icon-2">
                            <i class="fas fa-user"></i>
                        </span>

                    </span>
                    <span class="menu-title">Seller</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion menu-active-bg @if (Route::is('admin.seller.*')) show @endif">
                    <div class="menu-item">
                        <a class="menu-link" href="{{route('admin.seller.index')}}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">All Seller</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link" href="{{route('admin.seller.pppoeAssign')}}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Seller PPPoE Assign</span>
                        </a>
                    </div>

                </div>
            </div>
            <div data-kt-menu-trigger="click"
                class="menu-item menu-accordion @if (Route::is('admin.pppoe.*')) hover show @endif">
                <span class="menu-link">
                    <span class="menu-icon">

                        <span class="svg-icon svg-icon-2">
                            <i class="fas fa-user"></i>
                        </span>

                    </span>
                    <span class="menu-title">PPPoE</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion menu-active-bg @if (Route::is('admin.pppoe.*')) show @endif">
                    <div class="menu-item">
                        <a class="menu-link" href="{{route('admin.pppoe.index')}}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Mikrotik PPPoE Users</span>
                        </a>
                    </div>
                </div>
                <div class="menu-sub menu-sub-accordion menu-active-bg">
                    <div class="menu-item">
                        <a class="menu-link" href="{{route('admin.pppoe.routerUser')}}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">PPPoE All Users</span>
                        </a>
                    </div>
                </div>
                <div class="menu-sub menu-sub-accordion menu-active-bg">
                    <div class="menu-item">
                        <a class="menu-link" href="{{route('admin.pppoe.ActiveList')}}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">PPPoE Active Check</span>
                        </a>
                    </div>
                </div>
                <div class="menu-sub menu-sub-accordion menu-active-bg">
                    <div class="menu-item">
                        <a class="menu-link" href="{{route('admin.pppoe.suspendUser')}}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">PPPoE Suspend Users</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="menu-item">
                <div class="menu-content pt-8 pb-2">
                    <span class="menu-section text-muted text-uppercase fs-8 ls-1">CMS</span>
                </div>
            </div>

            <div data-kt-menu-trigger="click"
                class="menu-item menu-accordion @if (Route::is('admin.cms.*') || Route::is('admin.ftp.*')) hover show @endif">
                <span class="menu-link">
                    <span class="menu-icon">

                        <span class="svg-icon svg-icon-2">
                            <i class="fa fa-cog"></i>
                        </span>

                    </span>
                    <span class="menu-title">Home Page</span>
                    <span class="menu-arrow"></span>
                </span>
                <div class="menu-sub menu-sub-accordion menu-active-bg @if (Route::is('admin.cms.*')) show @endif">
                    <div class="menu-item">
                        <a class="menu-link" href="{{route('admin.cms.home.page.index')}}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Home Page Content</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link" href="{{route('admin.cms.slider.index')}}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Sliders</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link" href="{{route('admin.cms.team.index')}}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Teams</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link" href="{{route('admin.cms.ftp.category.index')}}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">FTP Category</span>
                        </a>
                    </div>
                    <div class="menu-item">
                        <a class="menu-link" href="{{route('admin.cms.ftp.index')}}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">FTP Site</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
        <!--end::Menu-->
    </div>
    <!--end::Aside Menu-->
</div>
<!--end::Aside menu-->
