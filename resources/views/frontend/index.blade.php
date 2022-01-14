@extends('frontend.layoyts.layout')


<div id="fb-root"></div>
<!-- Your Chat Plugin code -->
<div class="fb-customerchat" attribution="setup_tool" page_id="105997604470420"></div>

<div class="icon">
    <ul>
        <li>
            <a href="https://www.facebook.com/minju.online">Like Us &emsp;<i class="fab fa-facebook-f fa-lg"></i></a>
        </li>
    </ul>
</div>

<section id="home">
    <div id="menus" class="fixed-top">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="true" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item mx-2 active">
                        <h5>
                            <a class="nav-link" href="#home">Home <span class="sr-only">(current)</span></a>
                        </h5>
                    </li>
                    <li class="nav-item mx-2">
                        <h5><a class="nav-link" href="./ftp.html">FTP</a></h5>
                    </li>
                    <li class="nav-item mx-2">
                        <h5><a class="nav-link" href="#packages">Packege</a></h5>
                    </li>
                    <li class="nav-item mx-2">
                        <h5><a class="nav-link" href="#Coverage">Coverage</a></h5>
                    </li>
                    <li class="nav-item mx-2">
                        <h5><a class="nav-link" href="#footer">About Us</a></h5>
                    </li>
                    <li class="nav-item mx-2">
                        <h5>
                            <a class="nav-link" href="https://bills.minjuonline.com/" terget="_blank">Login</a>
                        </h5>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('frontend/images/banner1.jpg')}}" class="d-block w-100"
                    alt="{{asset('frontend/images/banner1.jpg')}}">
            </div>
            <div class="carousel-item">
                <img src="{{asset('frontend/images/banner2.jpg')}}" class="d-block w-100"
                    alt="{{asset('frontend/images/banner2.jpg')}}">
            </div>
            <div class="carousel-item">
                <img src="{{asset('frontend/images/banner3.jpg')}}" class="d-block w-100"
                    alt="{{asset('frontend/images/banner3.jpg')}}">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>

<section id="packages">
    <div id="packege" class="text-center my-4">
        <span>Home Packages</span>
    </div>
    <div class="text-center">
        <p style="font-size: 18px">
            Packages and rates at Mawna Fptic are always very competitive and so
            they may change over time. Here is the present package list
        </p>
    </div>

    <div class="col-11 col-sm-11 col-md-8 col-lg-8 col-xl-8 mx-auto">
        <div class="container p-5">
            <div class="row">
                <div class="col-lg-4 col-md-12 mb-4">
                    <div class="card h-100 shadow-lg">
                        <div class="card-body">
                            <div class="text-center p-3">
                                <h5 class="card-title">Basic</h5>
                                <small>Individual</small>
                                <br><br>
                                <span class="h2">$8</span>/month
                                <br><br>
                            </div>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                card's content.</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                    <path
                                        d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                </svg> Cras justo odio</li>
                            <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                    <path
                                        d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                </svg> Dapibus ac facilisis in</li>
                            <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                    <path
                                        d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                </svg> Vestibulum at eros</li>
                        </ul>
                        <div class="card-body text-center">
                            <button class="btn btn-outline-primary btn-lg" style="border-radius:30px">Select</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 mb-4">
                    <div class="card h-100 shadow-lg">
                        <div class="card-body">
                            <div class="text-center p-3">
                                <h5 class="card-title">Standard</h5>
                                <small>Small Business</small>
                                <br><br>
                                <span class="h2">$20</span>/month
                                <br><br>
                            </div>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                card's content.</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                    <path
                                        d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                </svg> Cras justo odio</li>
                            <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                    <path
                                        d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                </svg> Dapibus ac facilisis in</li>
                            <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                    <path
                                        d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                </svg> Vestibulum at eros</li>
                        </ul>
                        <div class="card-body text-center">
                            <button class="btn btn-outline-primary btn-lg" style="border-radius:30px">Select</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 mb-4">
                    <div class="card h-100 shadow-lg">
                        <div class="card-body">
                            <div class="text-center p-3">
                                <h5 class="card-title">Premium</h5>
                                <small>Large Companies</small>
                                <br><br>
                                <span class="h2">$40</span>/month
                                <br><br>
                            </div>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                                card's content.</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                    <path
                                        d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                </svg> Cras justo odio</li>
                            <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                    <path
                                        d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                </svg> Dapibus ac facilisis in</li>
                            <li class="list-group-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                    <path
                                        d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z" />
                                </svg> Vestibulum at eros</li>
                        </ul>
                        <div class="card-body text-center">
                            <button class="btn btn-outline-primary btn-lg" style="border-radius:30px">Select</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-12 my-3">
        <div class="d-flex justify-content-center">
            <a href="./packege.html" class="btn btn-outline-primary btn-lg text-decoration-none">View
                All</a>
        </div>
    </div>
</section>

<section id="Coverage">
    <div id="packege" class="text-center my-4">
        <span>Our Coverage</span>
    </div>
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 p-0">
        <div class="container p-0">
            <iframe style="overflow: hidden; pointer-events: none"
                src="https://www.google.com/maps/d/embed?mid=1MlgVhYZopB18GEdTcYm8a7NoVW9XuuEo" width="100%"
                height="500vh" scrolling="false"></iframe>
        </div>
    </div>
</section>

<section id="footer">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <h5 class="font-weight-bold mt-5">Corporate Office</h5>
                    <br />
                    <p>Mawna (1740),Sreepur,Gazipur.</p>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <h5 class="font-weight-bold mt-5">
                        Download & Streaming Services
                    </h5>
                    <br />
                    <ul style="list-style: none; padding: 0px">
                        <li class="my-1">Live Tv</li>
                        <li class="my-1">Forum/Media Server</li>
                        <li class="my-1">Online Media Streaming</li>
                        <li class="my-1">Youtube,Facebook Peering</li>
                        <li class="my-1">Content Bandwith</li>
                    </ul>
                </div>
                <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                    <h5 class="font-weight-bold mt-5">Office Service</h5>
                    <br />
                    <ul style="list-style: none; padding: 0px">
                        <li class="my-1">Networking</li>
                        <li class="my-1">Software, Business Automation</li>
                        <li class="my-1">IP Camera, Remote Surveillance</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="copyright">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 py-md-2 py-lg-2 py-xl-3">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <p class="text-center text-light">
                            Copyright ©2020 All Right Recived
                        </p>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 text-light text-center">
                        Design and Developed By
                        <a id="profile" href="https://www.linkedin.com/in/md-mridul-biswash-770a721a5">Md Mridul</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



</body>

</html>
