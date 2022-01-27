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
                <p>{{(isset($data->name) ? $data->name : "")}}</p>
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
                    <li><a href="#contact">FTP</a></li>
                    <li><a href="{{route('login')}}">Login</a></li>
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
                <div class="item active">
                    <div class="single-slide-item"
                        style="background-image: url({{asset('frontend/images/slider/1.jpg')}}); background-size: cover;">
                        <div class="single-slide-item-table">
                            <div class="single-slide-item-tablecell">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="slider_heading">
                                                <h1 class="alt-font title-large font-weight-800 text-white text-uppercase animated fadeInUp"
                                                    style="animation-delay: 500ms">Need to grow up your
                                                    <span>business</span>
                                                </h1>
                                                <p class="text-white margin-50px-bottom animated fadeInDown"
                                                    style="animation-delay: 1000ms">We are a new design studio based
                                                    in USA. We have over 5 years experience,<br /> About designing
                                                    websites and mobile apps.</p>

                                                <div class="single_slide_item_button">
                                                    <a href="#" class="btn btn-default slider_btn animated fadeInUp"
                                                        style="animation-delay: 1400ms">Read More</a>
                                                    <a href="#" class="btn btn-default slider_btn animated fadeInUp"
                                                        style="animation-delay: 1400ms">Our Business</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item"
                    style="background-image: url({{asset('frontend/images/slider/2.jpg')}}); background-size: cover;">
                    <div class="single-slide-item slide-2">
                        <div class="single-slide-item-table">
                            <div class="single-slide-item-tablecell">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="slider_heading">
                                                <h1 class="alt-font title-large font-weight-800 text-extra-dark-gray text-uppercase animated fadeInUp"
                                                    style="animation-delay: 500ms">We to Design and
                                                    <span>Devolopment</span>
                                                </h1>
                                                <p class="text-extra-dark-gray margin-50px-bottom animated fadeInUp"
                                                    style="animation-delay: 1000ms">We are a new design studio based
                                                    in USA. We have over 5 years experience,<br /> About designing
                                                    websites and mobile apps.</p>

                                                <div class="single_slide_item_button">
                                                    <a href="#" class="btn btn-default slider_btn animated fadeInUp"
                                                        style="animation-delay: 1400ms">Read More</a>
                                                    <a href="#" class="btn btn-default slider_btn animated fadeInUp"
                                                        style="animation-delay: 1400ms">Our Business</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item"
                    style="background-image: url({{asset('frontend/images/slider/3.jpg')}}); max-height: 100%; background-size: cover;">
                    <div class="single-slide-item slide-3">
                        <div class="single-slide-item-table">
                            <div class="single-slide-item-tablecell">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="slider_heading">
                                                <h1 class="alt-font title-large font-weight-800 text-white text-uppercase animated zoomIn"
                                                    style="animation-delay: 500ms">We Have a Creative
                                                    <span>Team</span>
                                                </h1>
                                                <p class="text-white margin-50px-bottom animated zoomIn"
                                                    style="animation-delay: 1000ms">We are a new design studio based
                                                    in USA. We have over 5 years experience,<br /> About designing
                                                    websites and mobile apps.</p>

                                                <div class="single_slide_item_button">
                                                    <a href="#" class="btn btn-default slider_btn animated zoomIn"
                                                        style="animation-delay: 1400ms">Read More</a>
                                                    <a href="#" class="btn btn-default slider_btn animated zoomIn"
                                                        style="animation-delay: 1400ms">Our Business</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
                    <h3>{{(isset($data->title) ? $data->title : "")}}</h3>
                    <p>{{(isset($data->description) ? $data->description : "")}}</p>



                    {{-- <div class="about_button">
                        <a href="#" class="btn btn-sm main_btn">Read More</a>
                    </div> --}}
                </div>
            </div> <!-- END COL -->
            <div class="col-md-6 col-sm-6 col-xs-12 wow fadeInRight text-center">
                <div class="about_slider owl-carousel">
                    <div class="about_image">
                        <img src="{{asset('frontend/images/about/1.jpg')}}"
                            alt="{{asset('frontend/images/about/1.jpg')}}" />
                    </div>
                    <div class="about_slider">
                        <img src="{{asset('frontend/images/about/2.jpg')}}"
                            alt="{{asset('frontend/images/about/2.jpg')}}" />
                    </div>
                    <div class="about_slider">
                        <img src="{{asset('frontend/images/about/3.jpg')}}"
                            alt="{{asset('frontend/images/about/3.jpg')}}" />
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
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam <br /> ultrices sapien vel quam
                luctus pulvinar.</p>
        </div> <!-- END HEADING -->

        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="our-team wow fadeInUp">
                    <div class="pic">
                        <img src="{{asset('frontend/images/team/1.jpg')}}" alt="" />
                        <ul class="social">
                            <li><a href="#" class="fa fa-facebook"></a></li>
                            <li><a href="#" class="fa fa-google-plus"></a></li>
                            <li><a href="#" class="fa fa-instagram"></a></li>
                            <li><a href="#" class="fa fa-linkedin"></a></li>
                        </ul>
                    </div>
                    <div class="team-content">
                        <h3 class="title">Solvina D Naliz</h3>
                        <span class="post">Web Developer</span>
                    </div>
                </div> <!-- END OUR-TEAM -->
            </div> <!-- END COL -->

            <div class="col-md-3 col-sm-6">
                <div class="our-team wow fadeInUp">
                    <div class="pic">
                        <img src="{{asset('frontend/images/team/2.jpg')}}" alt="" />
                        <ul class="social">
                            <li><a href="#" class="fa fa-facebook"></a></li>
                            <li><a href="#" class="fa fa-google-plus"></a></li>
                            <li><a href="#" class="fa fa-instagram"></a></li>
                            <li><a href="#" class="fa fa-linkedin"></a></li>
                        </ul>
                    </div>
                    <div class="team-content">
                        <h3 class="title">Jerry D.Silva</h3>
                        <span class="post">Ui Designer</span>
                    </div>
                </div> <!-- END OUR-TEAM -->
            </div> <!-- END COL -->

            <div class="col-md-3 col-sm-6">
                <div class="our-team wow fadeInUp">
                    <div class="pic">
                        <img src="{{asset('frontend/images/team/3.jpg')}}" alt="" />
                        <ul class="social">
                            <li><a href="#" class="fa fa-facebook"></a></li>
                            <li><a href="#" class="fa fa-google-plus"></a></li>
                            <li><a href="#" class="fa fa-instagram"></a></li>
                            <li><a href="#" class="fa fa-linkedin"></a></li>
                        </ul>
                    </div>
                    <div class="team-content">
                        <h3 class="title">David Walillams</h3>
                        <span class="post">Sr Consultant</span>
                    </div>
                </div> <!-- END OUR-TEAM -->
            </div> <!-- END COL -->

            <div class="col-md-3 col-sm-6">
                <div class="our-team wow fadeInUp">
                    <div class="pic">
                        <img src="{{asset('frontend/images/team/4.jpg')}}" alt="" />
                        <ul class="social">
                            <li><a href="#" class="fa fa-facebook"></a></li>
                            <li><a href="#" class="fa fa-google-plus"></a></li>
                            <li><a href="#" class="fa fa-instagram"></a></li>
                            <li><a href="#" class="fa fa-linkedin"></a></li>
                        </ul>
                    </div>
                    <div class="team-content">
                        <h3 class="title">Michel Z. Jones</h3>
                        <span class="post">Web Developer</span>
                    </div>
                </div> <!-- END OUR-TEAM -->
            </div> <!-- END COL -->
        </div> <!-- END ROW -->
    </div>
</section>
<!-- END TEAM -->

<!-- START PRICING TABLE -->
<section id="price" class="section_padding">
    <div class="container">
        <div class="section_heading wow zoomIn text-center">
            <h2>our <span>pricing</span></h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam <br /> ultrices sapien vel quam
                luctus pulvinar.</p>
        </div> <!-- END HEADING -->

        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s"
                data-wow-offset="0">
                <div class="pricingTable">
                    <div class="pricingTable-header">
                        <div class="heading">
                            <h3>STANDARD</h3>
                            <span class="subtitle">Lorem ipsum dolor</span>
                        </div>
                        <span class="price-value"><i class="fa fa-usd"></i><span>10</span><span
                                class="mo">/year</span></span>
                    </div> <!-- END PRICING HEADER -->

                    <div class="pricingContent">
                        <ul>
                            <li>50GB Disk Space</li>
                            <li>50 Email Accounts</li>
                            <li>50GB Monthly Bandwidth</li>
                            <li>50 Domains</li>
                            <li>Unlimited Subdomains</li>
                        </ul>
                    </div> <!-- END PRICING CONTENT -->

                    <div class="pricingTable-sign-up">
                        <a href="#" class="btn btn-default main_btn">sign up</a>
                    </div> <!-- END BUTTON BOX-->
                </div> <!-- END PRICING TABLE -->
            </div> <!-- END COL -->

            <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s"
                data-wow-offset="0">
                <div class="pricingTable">
                    <div class="pricingTable-header">
                        <div class="heading">
                            <h3>BUSINESS</h3>
                            <span class="subtitle">Lorem ipsum dolor</span>
                        </div>
                        <span class="price-value"><i class="fa fa-usd"></i><span>20</span><span
                                class="mo">/year</span></span>
                    </div> <!-- END PRICING HEADER -->

                    <div class="pricingContent">
                        <ul>
                            <li>50GB Disk Space</li>
                            <li>50 Email Accounts</li>
                            <li>50GB Monthly Bandwidth</li>
                            <li>50 Domains</li>
                            <li>Unlimited Subdomains</li>
                        </ul>
                    </div> <!-- END PRICING CONTENT -->

                    <div class="pricingTable-sign-up">
                        <a href="#" class="btn btn-default main_btn">sign up</a>
                    </div> <!-- END BUTTON BOX-->
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s"
                data-wow-offset="0">
                <div class="pricingTable">
                    <div class="pricingTable-header">
                        <div class="heading">
                            <h3>PREMIUM</h3>
                            <span class="subtitle">Lorem ipsum dolor</span>
                        </div>
                        <span class="price-value"><i class="fa fa-usd"></i><span>30</span><span
                                class="mo">/year</span></span>
                    </div> <!-- END PRICING HEADER -->

                    <div class="pricingContent">
                        <ul>
                            <li>50GB Disk Space</li>
                            <li>50 Email Accounts</li>
                            <li>50GB Monthly Bandwidth</li>
                            <li>50 Domains</li>
                            <li>Unlimited Subdomains</li>
                        </ul>
                    </div> <!-- END PRICING CONTENT -->

                    <div class="pricingTable-sign-up">
                        <a href="#" class="btn btn-default main_btn">sign up</a>
                    </div> <!-- END BUTTON BOX-->
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.7s"
                data-wow-offset="0">
                <div class="pricingTable">
                    <div class="pricingTable-header">
                        <div class="heading">
                            <h3>EXTRA</h3>
                            <span class="subtitle">Lorem ipsum dolor</span>
                        </div>
                        <span class="price-value"><i class="fa fa-usd"></i><span>40</span><span
                                class="mo">/year</span></span>
                    </div> <!-- END PRICING HEADER -->

                    <div class="pricingContent">
                        <ul>
                            <li>50GB Disk Space</li>
                            <li>50 Email Accounts</li>
                            <li>50GB Monthly Bandwidth</li>
                            <li>50 Domains</li>
                            <li>Unlimited Subdomains</li>
                        </ul>
                    </div> <!-- END PRICING CONTENT -->

                    <div class="pricingTable-sign-up">
                        <a href="#" class="btn btn-default main_btn">sign up</a>
                    </div> <!-- END BUTTON BOX-->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END PRICING TABLE -->


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
                        <p>{{(isset($data->address) ? $data->address : "")}}</p>
                    </div>
                    <div class="single_contact">
                        <i class="fa fa-envelope"></i>
                        <h5>Email</h5>
                        <p>{{(isset($data->email) ? $data->email : "")}}</p>
                    </div>
                    <div class="single_contact">
                        <i class="fa fa-phone"></i>
                        <h5>Phone</h5>
                        <p>+88 {{(isset($data->phone) ? $data->phone : "")}}</p>
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
                                    <textarea rows="8" name="message" class="form-control" id="description"
                                        placeholder="Your Message Here ..." required="required"></textarea>
                                </div>
                                <div class="form-group col-sm-12">
                                    <div class="actions">
                                        <button type="submit" value="Send Your Message" name="submit" id="submitButton"
                                            class="btn btn-default main_btn"
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
            <p>Copyright © 2019 Belaltheme All Rights Reserved</p>
        </div>
    </div>
</div>
<!-- END FOOTER -->

@endsection
