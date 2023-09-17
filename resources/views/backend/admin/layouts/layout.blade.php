<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{config('app.title')}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta charset="utf-8"/>
    <link rel="shortcut icon" href="{{asset('backend/assets/media/logos/favicon.ico')}}"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    @include('backend.admin.layouts.includes.style')

</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body"
      class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed"
      style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
<!--begin::Main-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="page d-flex flex-row flex-column-fluid">
        <!--begin::Aside-->
        <div id="kt_aside" class="aside aside-light aside-hoverable" data-kt-drawer="true"
             data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}"
             data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}"
             data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
            <!--begin::Brand-->
            <div class="aside-logo flex-column-auto" id="kt_aside_logo">

                <!--begin::Logo-->

                <a href="{{route('admin.home')}}" class="fs-2 fw-bolder">
                    @if(setting('use_logo') && setting('logo'))
                        <img class="h-75px logo" src="{{asset(setting('logo'))}}" alt="{{asset(setting('logo'))}}">
                    @elseif (setting('name') !== null )
                        <h2 class="fs-2 text-gray ">{{setting('name')}}</h2>
                    @else
                        <h2 class="fs-2 text-gray ">{{config('app.title')}}</h2>
                    @endisset
                </a>
                <!--end::Logo-->
                <!--begin::Aside toggler-->
                <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle"
                     data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
                     data-kt-toggle-name="aside-minimize">
                    <!--begin::Svg Icon | path: icons/duotone/Navigation/Angle-double-left.svg-->
                    <span class="svg-icon svg-icon-1 rotate-180">
                            <i class="fas fa-angle-double-left"></i>
                        </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Aside toggler-->
            </div>
            <!--end::Brand-->
            @include('backend.admin.layouts.includes.sidebar')

        </div>
        <!--end::Aside-->
        <!--begin::Wrapper-->
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

            @include('backend.admin.layouts.includes.navbar')
            <!--begin::Content-->

            <!--begin::Post-->
            <div class="post d-flex flex-column-fluid" id="kt_post">
                @yield('content')

            </div>
            <!--end::Post-->
            @include('backend.admin.layouts.includes.footer')
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::Root-->


<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
    <!--begin::Svg Icon | path: icons/duotone/Navigation/Up-2.svg-->
    <span class="svg-icon">
            <i class="fas fa-arrow-up"></i>
        </span>
    <!--end::Svg Icon-->
</div>
<!--end::Scrolltop-->
<!--end::Main-->
@include('backend.admin.layouts.includes.script')
</body>
<!--end::Body-->

</html>
