@extends('frontend.layouts.layout')

@section('content')

    <!-- START PRELOADER -->
    <div class="preloader">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>
    <!-- END PRELOADER -->

    <!-- START NAVBAR -->
    <div class="navbar navbar-default navbar-fixed-top menu-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="index.html" class="navbar-brand">
                    <p>{{ isset($data->name) ? $data->name : '' }}</p>
                </a>
            </div>
            <div class="navbar-collapse collapse">
                <nav>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ route('home') }}#home">Home</a></li>
                        <li><a href="{{ route('home') }}#about_us">About</a></li>
                        <li><a href="{{ route('home') }}#team">Team</a></li>
                        <li><a href="{{ route('home') }}#price">pricing</a></li>
                        <li><a href="{{ route('home') }}#contact">Contacts</a></li>
                        <li><a href="{{ route('home.packages') }}">Packages</a></li>
                        <li><a href="{{ route('home.ftp') }}">FTP</a></li>
                        <li><a href="{{ route('login') }}">Login</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <!--- END CONTAINER -->
    </div>
    <!-- END NAVBAR -->
    <div class="container" style="margin-top:120px">


        @if (isset($data['package']) && $data['package']->count() > 0)
            <!-- START PRICING TABLE -->
            <section id="price" class="section_padding">
                <div class="container">
                    <div class="section_heading wow zoomIn text-center">
                        <h2>our <span>pricing</span></h2>

                    </div> <!-- END HEADING -->

                    <div class="row">
                        @foreach ($data['package'] as $package)
                            <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s"
                                data-wow-delay="0.1s" data-wow-offset="0">
                                <div class="pricingTable">
                                    <div class="pricingTable-header">
                                        <div class="heading">
                                            <h3>{{ $package->name }}</h3>
                                            <span class="subtitle">{{ $package->sort_desc }}</span>
                                        </div>
                                        <span class="price-value"><span>৳{{ $package->price }}</span><span
                                                class="mo">/month</span></span>
                                    </div> <!-- END PRICING HEADER -->

                                    <div class="pricingContent">
                                        <ul>
                                            @for ($i = 0; $i < count($package->benifit); $i++)
                                                <li class="text-capitalize">{{ $package->benifit[$i] }}</li>
                                            @endfor

                                        </ul>
                                    </div> <!-- END PRICING CONTENT -->

                                </div> <!-- END PRICING TABLE -->
                            </div> <!-- END COL -->
                        @endforeach
                    </div>
                </div>
            </section>
            <!-- END PRICING TABLE -->
        @endif

    </div>





@endsection
