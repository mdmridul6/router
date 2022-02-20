<!--begin::Header-->
<div id="kt_header" style="" class="header align-items-stretch">
    <!--begin::Container-->
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <!--begin::Aside mobile toggle-->
        <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
            <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px"
                id="kt_aside_mobile_toggle">
                <!--begin::Svg Icon | path: icons/duotone/Text/Menu.svg-->
                <span class="svg-icon svg-icon-2x mt-1">
                    <img src="{{asset('backend/assets/media/icons/duotone/Text/Menu.svg')}}" alt="">
                </span>
                <!--end::Svg Icon-->
            </div>
        </div>
        <!--end::Aside mobile toggle-->
        <!--begin::Mobile logo-->
        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
            <a href="#" class="d-lg-none">
                <img alt="Logo" src="{{asset('backend/assets/media/logos/logo-3.svg')}}" class="h-30px" />
            </a>
        </div>
        <!--end::Mobile logo-->
        <!--begin::Wrapper-->
        <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
            <!--begin::Navbar-->
            <div class="d-flex align-items-stretch" id="kt_header_nav">

            </div>
            <!--end::Navbar-->
            <!--begin::Topbar-->
            <div class="d-flex align-items-stretch flex-shrink-0">
                <div class="d-flex align-items-center ms-1 ms-lg-3">
                    <!--begin::Menu- wrapper-->
                    <div class="btn btn-icon btn-active-light-primary position-relative w-30px h-30px w-md-40px h-md-40px"
                        data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end"
                        data-kt-menu-flip="bottom">
                        <!--begin::Svg Icon | path: icons/duotone/Code/Compiling.svg-->
                        <span class="svg-icon svg-icon-1">
                            <img src="{{asset('backend/assets/media/icons/duotone/Code/Compiling.svg')}}" alt="">
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--begin::Menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column w-350px w-lg-375px" data-kt-menu="true">
                        <!--begin::Heading-->
                        <div class="d-flex flex-column bgi-no-repeat rounded-top">
                            <!--begin::Title-->
                            <h3 class=" text-dark fw-bold px-9 mt-10 mb-6">Notifications
                                <span class="badge badge-primary fs-8">{{auth()->user()->notifications->count()}}</span>
                            </h3>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->
                        <!--begin::Tab content-->
                        <div class="tab-content">
                            <!--begin::Tab panel-->
                            <div class="tab-pane fade show active" id="kt_topbar_notifications_1" role="tabpanel">
                                <!--begin::Items-->
                                <div class="scroll-y mh-325px my-5 px-8">

                                    @forelse (auth()->user()->notifications as $notifications)

                                    <!--begin::Item-->
                                    <div class="d-flex flex-stack py-4">
                                        <!--begin::Section-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-35px me-4">
                                                <span class="symbol-label bg-light-primary">
                                                    <!--begin::Svg Icon | path: icons/duotone/Clothes/Crown.svg-->
                                                    <span class="svg-icon svg-icon-2 svg-icon-primary">
                                                        <img src="{{asset('backend/assets/media/icons/duotone/Clothes/Crown.svg')}}"
                                                            alt="">
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </span>
                                            </div>
                                            <!--end::Symbol-->
                                            <!--begin::Title-->
                                            <div class="mb-0 me-2">
                                                <a href="#" class="fs-7 text-gray-400 ">Deacivate</a>
                                                <div class="text-gray-700 fs-6 text-hover-primary fw-bolder">
                                                    {{$notifications->data['message']}}
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Section-->
                                        <!--begin::Label-->
                                        <span
                                            class="badge badge-light fs-8">{{$notifications->created_at->diffForHumans()}}</span>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Item-->
                                    @empty
                                    <!--begin::Label-->
                                    <div class="d-flex justify-content-center">

                                        <span class="badge badge-danger fs-8">No Notification</span>
                                    </div>
                                    <!--end::Label-->
                                    @endforelse

                                </div>
                                <!--end::Items-->
                                <!--begin::View more-->
                                <div class="py-3 text-center border-top">
                                    <a href="pages/profile/activity.html"
                                        class="btn btn-color-gray-600 btn-active-color-primary">View
                                        All
                                        <!--begin::Svg Icon | path: icons/duotone/Navigation/Right-2.svg-->
                                        <span class="svg-icon svg-icon-5">
                                            <img src="{{asset('backend/assets/media/icons/duotone/Navigation/Right-2.svg')}}"
                                                alt="">
                                        </span>
                                        <!--end::Svg Icon-->
                                    </a>
                                </div>
                                <!--end::View more-->
                            </div>
                            <!--end::Tab panel-->
                        </div>
                        <!--end::Tab content-->
                    </div>
                    <!--end::Menu-->
                    <!--end::Menu wrapper-->
                </div>
                <!--begin::Toolbar wrapper-->
                <div class="d-flex align-items-stretch flex-shrink-0">
                    <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                        <!--begin::Menu wrapper-->
                        <div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click"
                            data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
                            <img src="{{asset('backend/assets/media/avatars/blank.png' ) }}" alt="" />
                        </div>
                        <!--begin::Menu-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-300px"
                            data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <div class="menu-content d-flex align-items-center px-3">
                                    <!--begin::Avatar-->
                                    <div class="symbol symbol-50px me-5">
                                        <img alt="Logo" src="{{asset('backend/assets/media/avatars/blank.png') }}" />
                                    </div>
                                    <!--end::Avatar-->
                                    <!--begin::Username-->
                                    <div class="d-flex flex-column">
                                        <div class="fw-bolder d-flex align-items-center fs-5 text-capitalize">
                                            {{auth()->user()->name}}
                                            <span
                                                class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">{{auth()->user()->role}}</span>
                                        </div>
                                        <a href="#"
                                            class="fw-bold text-muted text-hover-primary fs-7">{{auth()->user()->email}}</a>
                                    </div>
                                    <!--end::Username-->
                                </div>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu separator-->
                            <div class="separator my-2"></div>
                            <!--end::Menu separator-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-5">
                                <a href="../../demo1/dist/account/overview.html" class="menu-link px-5">My
                                    Profile</a>
                            </div>
                            <!--end::Menu item-->


                            <!--begin::Menu item-->
                            <div class="menu-item px-5 my-1">
                                <a href="{{route('admin.setting.index')}}" class="menu-link px-5">Settings</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            <div class="menu-item px-5">
                                <a href="{{route('logout')}}" class="menu-link px-5">Sign Out</a>
                            </div>
                            <!--end::Menu item-->

                        </div>
                        <!--end::Menu-->
                        <!--end::Menu wrapper-->
                    </div>
                    <!--end::User -->
                    <!--end::Heaeder menu toggle-->
                </div>
                <!--end::Toolbar wrapper-->
            </div>
            <!--end::Topbar-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Container-->
</div>
<!--end::Header-->
