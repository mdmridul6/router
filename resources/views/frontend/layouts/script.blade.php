<!-- Load Facebook SDK for JavaScript -->

<script>
    window.fbAsyncInit = function () {
      FB.init({
        xfbml: true,
        version: "v7.0",
      });
    };

    (function (d, s, id) {
      var js,
        fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s);
      js.id = id;
      js.src = "https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js";
      fjs.parentNode.insertBefore(js, fjs);
    })(document, "script", "facebook-jssdk");
</script>
<script src="{{asset('frontend/js/jquery-1.12.4.min.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('frontend/js/modernizr-2.8.3.min.js')}}"></script>
<script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.mixitup.js')}}"></script>
<script src="{{asset('frontend/js/lightbox.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('frontend/js/jquery.inview.min.js')}}"></script>
<script src="{{asset('frontend/js/waypoints.min.js')}}"></script>
<script src="{{asset('frontend/js/wow.min.js')}}"></script>
<script src="{{asset('frontend/js/scrolltopcontrol.js')}}"></script>
<script src="{{asset('frontend/js/SmoothScroll.js')}}"></script>
<script src="{{asset('frontend/js/form-contact.js')}}"></script>
<script src="{{asset('frontend/js/jquery.appear.js')}}"></script>
<script src="{{asset('frontend/js/main.js')}}"></script>
