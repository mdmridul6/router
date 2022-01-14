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

<script src="{{asset('backend/assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('backend/assets/js/scripts.bundle.js')}}"></script>
<script type="text/javascript">
    $(".carousel").carousel({
      interval: 4000,
    });


</script>
