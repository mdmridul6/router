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
                    <p>{{ isset($data['about']->name) ? $data['about']->name : '' }}</p>
                </a>
            </div>
            <div class="navbar-collapse collapse">
                <nav>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#home">Home</a></li>
                        <li><a href="#about_us">About</a></li>
                        <li><a href="#team">Team</a></li>
                        <li><a href="#price">pricing</a></li>
                        <li><a href="#contact">Contacts</a></li>
                        <li><a href="{{ route('home.ftp') }}">FTP</a></li>
                        <li><a href="{{ route('login') }}">Login</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <!--- END CONTAINER -->
    </div>
    <!-- END NAVBAR -->

    <!-- START HOME -->
    <section id="home" class="welcome-area">
        <div class="welcome-slider-area">
            <div id="welcome-slide-carousel" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    @forelse ($data['slider'] as $slider)
                        <div class="item @if ($loop->first) active @endif">
                            <div class="single-slide-item"
                                style="background-image: url({{ isset($slider->images) ? asset($slider->images) : '' }}); background-size: cover;">
                                <div class="single-slide-item-table">
                                    <div class="single-slide-item-tablecell">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="slider_heading">
                                                        <h1 class="alt-font title-large font-weight-800 text-white text-uppercase animated fadeInUp"
                                                            style="animation-delay: 500ms">
                                                            <span>{{ $slider->title }}</span>
                                                        </h1>
                                                        <p class="text-white margin-50px-bottom animated fadeInDown"
                                                            style="animation-delay: 1000ms">{{ $slider->content }}</p>

                                                        {{-- <div class="single_slide_item_button">
                                                    <a href="#" class="btn btn-default slider_btn animated fadeInUp"
                                                        style="animation-delay: 1400ms">Read More</a>
                                                    <a href="#" class="btn btn-default slider_btn animated fadeInUp"
                                                        style="animation-delay: 1400ms">Our Business</a>
                                                </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="item active">
                            <div class="single-slide-item"
                                style="background-image: url({{ asset('frontend/images/testi-bg.jpg') }}); background-size: cover;">
                                <div class="single-slide-item-table">
                                    <div class="single-slide-item-tablecell">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="slider_heading">
                                                        <h1 class="alt-font title-large font-weight-800 text-white text-uppercase animated fadeInUp"
                                                            style="animation-delay: 500ms">
                                                            <span>Lorem ipsum dolor sit.</span>
                                                        </h1>
                                                        <p class="text-white margin-50px-bottom animated fadeInDown"
                                                            style="animation-delay: 1000ms">Lorem ipsum dolor sit amet
                                                            consectetur adipisicing elit.</p>

                                                        {{-- <div class="single_slide_item_button">
                                                    <a href="#" class="btn btn-default slider_btn animated fadeInUp"
                                                        style="animation-delay: 1400ms">Read More</a>
                                                    <a href="#" class="btn btn-default slider_btn animated fadeInUp"
                                                        style="animation-delay: 1400ms">Our Business</a>
                                                </div> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforelse

                </div>
                <!-- Controls -->
                <a class="left carousel-control" href="#welcome-slide-carousel" role="button" data-slide="prev">
                    <i class="fa fa-angle-left" aria-hidden="true"></i>
                </a>
                <a class="right carousel-control" href="#welcome-slide-carousel" role="button" data-slide="next">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </section>
    <!-- END  HOME DESIGN -->

    <!-- START FEATURES -->

    <!-- END CONTAINER -->
    </section>
    <!-- END FEATURES -->

    <!-- START ABOUT US -->
    <section id="about_us" class="gray_bg section_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInLeft">
                    <div class="about_content">
                        <span>About Consultary</span>
                        <h3>{{ isset($data['about']->title) ? $data['about']->title : 'No About Us Title' }}</h3>
                        <p>{{ isset($data['about']->description) ? $data['about']->description : 'No About Us content' }}
                        </p>



                        {{-- <div class="about_button">
                        <a href="#" class="btn btn-sm main_btn">Read More</a>
                    </div> --}}
                    </div>
                </div> <!-- END COL -->
                <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInRight text-center">
                    <div class="about_slider owl-carousel">
                        <div class="about_image">
                            <img src="{{ asset('frontend/images/about/2.jpg') }}"
                                alt="{{ asset('frontend/images/about/2.jpg') }}" />
                        </div>
                    </div>
                </div> <!-- END COL -->
            </div>
            <!--- END ROW -->
        </div>
        <!--- END CONTAINER -->
    </section>
    <!-- END ABOUT US -->




    <!-- START COUNTERUP -->
    <section id="counterup">
        <div class="container">
            <div class="row text-center">
                <div class="col-sm-6 col-md-3">
                    <div class="single_counter wow fadeInLeft">
                        <i class="fa fa ti-world"></i>
                        <span class="counter">800</span>
                        <h4>Global Location</h4>
                    </div>
                </div> <!-- END COL -->
                <div class="col-sm-6 col-md-3">
                    <div class="single_counter wow fadeInLeft">
                        <i class="fa fa ti-user"></i>
                        <span class="counter">660</span>
                        <h4>Happy Customer</h4>
                    </div>
                </div> <!-- END COL -->
                <div class="col-sm-6 col-md-3">
                    <div class="single_counter wow fadeInRight">
                        <i class="fa fa ti-thumb-up"></i>
                        <span class="counter">450</span>
                        <h4>Project Done</h4>
                    </div>
                </div> <!-- END COL -->
                <div class="col-sm-6 col-md-3">
                    <div class="single_counter wow fadeInRight">
                        <i class="fa fa ti-stats-up"></i>
                        <span class="counter">300</span>
                        <h4>Consulting</h4>
                    </div>
                </div> <!-- END COL -->
            </div>
            <!--- END ROW -->
        </div>
        <!--- END CONTAINER -->
    </section>
    <!-- END COUNTERUP -->

    <!-- START TEAM -->
    <section id="team" class="gray_bg section_padding">
        <div class="container">
            <div class="section_heading wow zoomIn text-center">
                <h2>our <span>team</span></h2>
                {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam <br /> ultrices sapien vel quam
                luctus pulvinar.</p> --}}
            </div> <!-- END HEADING -->

            <div class="row our-team-row">
                @forelse ($data['team'] as $team)
                    <div class="col-md-3 col-sm-6 ">
                        <div class="our-team wow fadeInUp">
                            <div class="pic">
                                <img src="{{ asset($team->image) }}" alt="" style="height:265px;width:100%;" />
                                <ul class="social">
                                    @if (isset($team->facebook))
                                        <li><a href="{{ $team->facebook }}" target="_blank" class="fa fa-facebook"></a>
                                        </li>
                                    @endif
                                    @if (isset($team->instagram))
                                        <li><a href="{{ $team->instagram }}" target="_blank"
                                                class="fa fa-instagram"></a></li>
                                    @endif
                                    @if (isset($team->linkedin))
                                        <li><a href="{{ $team->linkedin }}" target="_blank" class="fa fa-linkedin"></a>
                                        </li>
                                    @endif

                                </ul>
                            </div>
                            <div class="team-content">
                                <h3 class="title">{{ $team->name }}</h3>
                                <span class="post">{{ $team->designation }}</span>
                            </div>
                        </div> <!-- END OUR-TEAM -->
                    </div> <!-- END COL -->
                @empty

                    <h3 class="text-center text-active-danger">No Team Member Added</h3>
                @endforelse







            </div>
            <!-- END ROW -->
        </div>
    </section>
    <!-- END TEAM -->


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
                                    <span class="price-value">৳<span>{{ $package->price }}</span><span
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


    <!-- START CONTACT -->
    <section id="contact" class="section_padding">
        <div class="container">
            <div class="section_heading wow zoomIn text-center">
                <h2>contact <span>us</span></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam <br /> ultrices sapien vel quam
                    luctus pulvinar.</p>
            </div> <!-- END HEADING -->

            <div class="row">
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="contact_details wow fadeInLeft">
                        <div class="single_contact">
                            <i class="fa fa-map-marker"></i>
                            <h5>Address</h5>
                            <p>{{ isset($data['about']->address) ? $data['about']->address : '' }}</p>
                        </div>
                        <div class="single_contact">
                            <i class="fa fa-envelope"></i>
                            <h5>Email</h5>
                            <p>{{ isset($data['about']->email) ? $data['about']->email : '' }}</p>
                        </div>
                        <div class="single_contact">
                            <i class="fa fa-phone"></i>
                            <h5>Phone</h5>
                            <p>+88 {{ isset($data['about']->phone) ? $data['about']->phone : '' }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-9 col-sm-8 col-xs-12">
                    <div class="contact wow fadeInRight">
                        <form id="contact-form" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="input_padding text-center">
                                    <div class="form-group col-sm-6">
                                        <input type="text" name="name" class="form-control" id="first-name"
                                            placeholder="Name *" required="required">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <input type="email" name="email" class="form-control" id="email"
                                            placeholder="Email *" required="required">
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <input type="text" name="subject" class="form-control" id="subject"
                                            placeholder="Subject *" required="required">
                                    </div>
                                    <div class="form-group col-sm-12 mab-none">
                                        <textarea rows="8" name="message" class="form-control" id="description" placeholder="Your Message Here ..."
                                            required="required"></textarea>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <div class="actions">
                                            <button type="submit" value="Send Your Message" name="submit"
                                                id="submitButton" class="btn btn-default main_btn"
                                                title="Click here to submit your message!">Send Your Message</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- END COL -->
            </div>
        </div>
    </section>
    <!-- END CONTACT -->

    <!-- START FOOTER -->
    <div class="copyright">
        <div class="copyright wow zoomIn text-center">
            <div class="copy_text">
                <p>Copyright © 2019 Minju Online All Rights Reserved</p>
            </div>
        </div>
    </div>
    <!-- END FOOTER -->
@endsection
