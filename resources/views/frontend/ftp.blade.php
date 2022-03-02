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
                    <li><a href="{{route('home')}}#home">Home</a></li>
                    <li><a href="{{route('home')}}#about_us">About</a></li>
                    <li><a href="{{route('home')}}#team">Team</a></li>
                    <li><a href="{{route('home')}}#price">pricing</a></li>
                    <li><a href="{{route('home')}}#contact">Contacts</a></li>
                    <li><a href="{{route('home.ftp')}}">FTP</a></li>
                    <li><a href="{{route('login')}}">Login</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <!--- END CONTAINER -->
</div>
<!-- END NAVBAR -->
<div class="container" style="margin-top:120px">

    <h1 class="text-center mb-4 ">IPTV</h1>
    <div class="row">
        <div class="col-md-2 col-sm-10">
            <div class="our-team wow fadeInUp">
                <div class="pic">
                    <a href="http://ctgbox.com/" target="_blank">
                        <img src="{{asset('backend/assets/media/icons/duotune/communication/com001.svg')}}" alt="" />
                    </a>
                </div>
                <div class="team-content">
                    <a href="http://ctgbox.com/" target="_blank" class="post">CTGBox</a>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-10">
            <div class="our-team wow fadeInUp">
                <div class="pic">
                    <a href="http://172.17.50.112/" target="_blank">
                        <img src="{{asset('backend/assets/media/icons/duotune/communication/com001.svg')}}" alt="" />
                    </a>
                </div>
                <div class="team-content">
                    <a href="http://172.17.50.112/" target="_blank" class="post">DhakaMovies TV</a>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-10">
            <div class="our-team wow fadeInUp">
                <div class="pic">
                    <a href="http://gundapanda.com/" target="_blank">
                        <img src="{{asset('backend/assets/media/icons/duotune/communication/com001.svg')}}" alt="" />
                    </a>
                </div>
                <div class="team-content">
                    <a href="http://gundapanda.com/" target="_blank" class="post">GundaPanda</a>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-10">
            <div class="our-team wow fadeInUp">
                <div class="pic">
                    <a href="http://www.plusbox.tv/" target="_blank">
                        <img src="{{asset('backend/assets/media/icons/duotune/communication/com001.svg')}}" alt="" />
                    </a>
                </div>
                <div class="team-content">
                    <a href="http://www.plusbox.tv/" target="_blank" class="post">PlusBox</a>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-10">
            <div class="our-team wow fadeInUp">
                <div class="pic">
                    <a href="http://amrbd.com/" target="_blank">
                        <img src="{{asset('backend/assets/media/icons/duotune/communication/com001.svg')}}" alt="" />
                    </a>
                </div>
                <div class="team-content">
                    <a href="http://amrbd.com/" target="_blank" class="post">AMR BD</a>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-10">
            <div class="our-team wow fadeInUp">
                <div class="pic">
                    <a href="http://galleryclub.net/" target="_blank">
                        <img src="{{asset('backend/assets/media/icons/duotune/communication/com001.svg')}}" alt="" />
                    </a>
                </div>
                <div class="team-content">
                    <a href="http://galleryclub.net/" target="_blank" class="post">Gallery Club</a>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-10">
            <div class="our-team wow fadeInUp">
                <div class="pic">
                    <a href="http://bdiptv.stream/live-tv.html" target="_blank">
                        <img src="{{asset('backend/assets/media/icons/duotune/communication/com001.svg')}}" alt="" />
                    </a>
                </div>
                <div class="team-content">
                    <a href="http://bdiptv.stream/live-tv.html" target="_blank" class="post">BDiP TV</a>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-10">
            <div class="our-team wow fadeInUp">
                <div class="pic">
                    <a href="http://tv2.ebox.live/" target="_blank">
                        <img src="{{asset('backend/assets/media/icons/duotune/communication/com001.svg')}}" alt="" />
                    </a>
                </div>
                <div class="team-content">
                    <a href="http://tv2.ebox.live/" target="_blank" class="post">EBOX TV 1</a>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-10">
            <div class="our-team wow fadeInUp">
                <div class="pic">
                    <a href="https://www.bioscopelive.com/en/featured-tv" target="_blank">
                        <img src="{{asset('backend/assets/media/icons/duotune/communication/com001.svg')}}" alt="" />
                    </a>
                </div>
                <div class="team-content">
                    <a href="https://www.bioscopelive.com/en/featured-tv" target="_blank" class="post">BioscopeLive</a>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-10">
            <div class="our-team wow fadeInUp">
                <div class="pic">
                    <a href="http://10.16.100.244/livetv.php" target="_blank">
                        <img src="{{asset('backend/assets/media/icons/duotune/communication/com001.svg')}}" alt="" />
                    </a>
                </div>
                <div class="team-content">
                    <a href="http://10.16.100.244/livetv.php" target="_blank" class="post">ICC TV</a>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-10">
            <div class="our-team wow fadeInUp">
                <div class="pic">
                    <a href="http://tv.ebox.live/" target="_blank">
                        <img src="{{asset('backend/assets/media/icons/duotune/communication/com001.svg')}}" alt="" />
                    </a>
                </div>
                <div class="team-content">
                    <a href="http://tv.ebox.live/" target="_blank" class="post">EBOX TV 2</a>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-10">
            <div class="our-team wow fadeInUp">
                <div class="pic">
                    <a href="http://bdiptv.net/" target="_blank">
                        <img src="{{asset('backend/assets/media/icons/duotune/communication/com001.svg')}}" alt="" />
                    </a>
                </div>
                <div class="team-content">
                    <a href="http://bdiptv.net/" target="_blank" class="post">BDIP TV</a>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-10">
            <div class="our-team wow fadeInUp">
                <div class="pic">
                    <a href="http://bciptv.net/" target="_blank">
                        <img src="{{asset('backend/assets/media/icons/duotune/communication/com001.svg')}}" alt="" />
                    </a>
                </div>
                <div class="team-content">
                    <a href="http://bciptv.net/" target="_blank" class="post">BDCIP TV</a>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-10">
            <div class="our-team wow fadeInUp">
                <div class="pic">
                    <a href="http://172.16.50.22/" target="_blank">
                        <img src="{{asset('backend/assets/media/icons/duotune/communication/com001.svg')}}" alt="" />
                    </a>
                </div>
                <div class="team-content">
                    <a href="http://172.16.50.22/" target="_blank" class="post">DhakaFlix</a>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-10">
            <div class="our-team wow fadeInUp">
                <div class="pic">
                    <a href="http://dds.oncast.me/" target="_blank">
                        <img src="{{asset('backend/assets/media/icons/duotune/communication/com001.svg')}}" alt="" />
                    </a>
                </div>
                <div class="team-content">
                    <a href="http://dds.oncast.me/" target="_blank" class="post">ONCast</a>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection
