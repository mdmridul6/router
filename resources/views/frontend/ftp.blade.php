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


    @foreach ($ftps as $ftp)
    <h1 class="text-center m-4 ">{{$ftp->name}}</h1>
    <div class="row">
        @foreach ($ftp->ftp as $ftpSite)

        <div class="col-md-2 col-sm-10">
            <div class="our-team wow fadeInUp">
                <div class="pic">
                    <a href="{{$ftpSite->url}}" target="_blank">
                        <img src="{{asset('backend/assets/media/icons/duotune/communication/com001.svg')}}" alt="" />
                    </a>
                </div>
                <div class="team-content">
                    <a href="{{$ftpSite->url}}" target="_blank" class="post">{{$ftpSite->title}}</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endforeach
</div>





@endsection
