@extends('backend.admin.layouts.layout')
@section('content')

<!--begin::Container-->
<div id="kt_content_container" class="container-fluid">
    <!--begin::Row-->
    <div class="row">

        <div class="col-md-4">
            <!--begin: Statistics Widget 6-->
            <div class="card bg-success card-xl-stretch mb-xl-8">
                <!--begin::Body-->
                <div class="card-body my-3">
                    <i class="fas fa-user text-light fa-3x"></i>
                    <h1 class="card-title fw-bolder text-light fs-2 mb-3 d-block" id="identity">
                        {{$data['identity'][0]['name']}}</h5>
                        <div class="py-1">
                            <span class="text-light fs-1 fw-bolder me-2"></span>
                        </div>
                </div>
                <!--end:: Body-->
            </div>
            <!--end: Statistics Widget 6-->
        </div>

        <div class="col-md-4">
            <!--begin: Statistics Widget 6-->
            <div class="card bg-danger card-xl-stretch mb-xl-8">
                <!--begin::Body-->
                <div class="card-body my-3">
                    <i class="fas fa-microchip text-light fa-3x"></i>
                    <h3 class="card-title fw-bolder text-light fs-5 mb-3 d-block">CPU Used</h3>
                    <div class="py-1">
                        <span class="text-light fs-1 fw-bolder me-2" id="cpu"></span>
                    </div>
                    {{-- <div class="progress h-7px bg-light bg-opacity-50 mt-7">
                        <div class="progress-bar bg-light" id="cpuProgressbar" role="progressbar" style="width: 15%"
                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> --}}
                </div>
                <!--end:: Body-->
            </div>
            <!--end: Statistics Widget 6-->
        </div>
        <div class="col-md-4">
            <!--begin: Statistics Widget 6-->
            <div class="card bg-dark card-xl-stretch mb-xl-8">
                <!--begin::Body-->
                <div class="card-body my-3">
                    <i class="fas fa-hdd text-light fa-3x"></i>
                    <h3 class="card-title fw-bolder text-light fs-5 mb-3 d-block">RAM Used</h3>
                    <div class="py-1">
                        <span class="text-light fs-1 fw-bolder me-2" id="ram"></span>
                    </div>

                    {{-- <div class="progress h-7px bg-light bg-opacity-50 mt-7">
                        <div class="progress-bar bg-light" id="ramProgressbar" role="progressbar" style="width: 15%"
                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div> --}}
                </div>
                <!--end:: Body-->
            </div>
            <!--end: Statistics Widget 6-->
        </div>


    </div>
    <!-- เปิดส่วน กรอปตารางแสดงความเร็วอินเตอร์เน็ต  -->
    <div class="col-md-12">
        <div class="card bg-secondary">
            <div class="card-header">
                <h3 class="card-title text-dark">Morniter Traffic</h3>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <!-- เปิดส่วน ตารางกราฟ -->
            <div class="card-body">
                <div class="col-md-12">
                    <div class="chart">
                        <div id="container-fluid"></div>
                    </div>
                    <label for="interface" class="text-dark mt-2">Select Interface</label>
                    <select name="interface" id="interface" class="form-control">
                        @foreach ($data['interface'] as $interface)
                        <option value="{{$interface['name']}}">{{$interface['name']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div id="container1">
            </div><!-- /.box-body -->

            <!-- ปิดส่วน แสดงแถบไอคอน Appication -->


            <!-- ปิดส่วน แสดงแถบไอคอน Appication -->
        </div> <!-- /.box -->
    </div>

    <!--end::Row-->
</div>
<!--end::Container-->

<!--end::Content-->
@endsection

@section('js')
<script type="text/javascript" src="{{asset('backend/assets/js/highcharts/highcharts.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/assets/js/highcharts/highcharts-more.js')}}"></script>
<script type="text/javascript" src="{{asset('backend/assets/js/highcharts/modules/exporting.js')}}"></script>
<script>
    var chart;

    function requestDatta(interface) {
      $.ajax({
        url: "{{route('admin.interfaceData')}}",
        data:{
            interface:interface
        },
        datatype: "json",
        success: function(data) {
          var midata = data;
          if (midata.length > 0) {
            var TX = parseInt(midata[0].data);
            var RX = parseInt(midata[1].data);
            var x = (new Date()).getTime();
            shift = chart.series[0].data.length > 19;
            chart.series[0].addPoint([x, TX], true, shift);
            chart.series[1].addPoint([x, RX], true, shift);
            // document.getElementById("trafico").innerHTML = TX + " / " + RX;
          } else {
            // document.getElementById("trafico").innerHTML = "- / -";
          }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
          console.error("Status: " + textStatus + " request: " + XMLHttpRequest);
          console.error("Error: " + errorThrown);
        }
      });
    //   Make a request for a user with a given ID

    }

    $(document).ready(function() {
      Highcharts.setOptions({
        global: {
          useUTC: false
        }
      });


      chart = new Highcharts.Chart({
        chart: {
          renderTo: 'container-fluid',
          animation: Highcharts.svg,
          type: 'spline',
          events: {
            load: function() {
              setInterval(function() {
                requestDatta(document.getElementById("interface").value);
              }, 2000);
            }
          }
        },
        title: {
          text: 'Internet Speed Graph'
        },
        xAxis: {
          type: 'datetime',
          tickPixelInterval: 150,
          maxZoom: 20 * 1000
        },
        yAxis: {
          minPadding: 0.2,
          maxPadding: 0.2,
          title: {
            text: 'Mikrotik',
            margin: 5
          }
        },
        series: [{
          name: 'TX',
          data: []
        }, {
          name: 'RX',
          data: []
        }]
      });
});
</script>

<script>
    function popup(url, name, windowWidth, windowHeight) {
      myleft = (screen.width) ? (screen.width - windowWidth) / 2 : 100;
      mytop = (screen.height) ? (screen.height - windowHeight) / 2 : 100;
      properties = "width=" + windowWidth + ",height=" + windowHeight;
      properties += ",scrollbars=yes, top=" + mytop + ",left=" + myleft;
      window.open(url, name, properties);
    }
    $(function() {

      /**
       * Get the current time
       */
      function getNow() {
        var now = new Date();

        return {
          hours: now.getHours() + now.getMinutes() / 60,
          minutes: now.getMinutes() * 12 / 60 + now.getSeconds() * 12 / 3600,
          seconds: now.getSeconds() * 12 / 60
        };
      };

      /**
       * Pad numbers
       */
      function pad(number, length) {
        // Create an array of the remaining length +1 and join it with 0's
        return new Array((length || 2) + 1 - String(number).length).join(0) + number;
      }

      var now = getNow();
    });

    // Extend jQuery with some easing (copied from jQuery UI)
    $.extend($.easing, {
      easeOutElastic: function(x, t, b, c, d) {
        var s = 1.70158;
        var p = 0;
        var a = c;
        if (t == 0) return b;
        if ((t /= d) == 1) return b + c;
        if (!p) p = d * .3;
        if (a < Math.abs(c)) {
          a = c;
          var s = p / 4;
        } else var s = p / (2 * Math.PI) * Math.asin(c / a);
        return a * Math.pow(2, -10 * t) * Math.sin((t * d - s) * (2 * Math.PI) / p) + c + b;
      }
    });
</script>

<!--++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<!-- Script แสดงวันเวลา -->
<script type="text/javascript">
    function date_time(id) {
      date = new Date;
      year = date.getFullYear();
      month = date.getMonth();
      months = new Array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dev');
      d = date.getDate();
      day = date.getDay();
      days = new Array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');
      h = date.getHours();
      if (h < 10) {
        h = "0" + h;
      }
      m = date.getMinutes();
      if (m < 10) {
        m = "0" + m;
      }
      s = date.getSeconds();
      if (s < 10) {
        s = "0" + s;
      }
      result = '' + days[day] + ' ' + d + ' ' + months[month] + ' ' + year + ' ' + h + ':' + m + ':' + s;
      document.getElementById(id).innerHTML = result;
      setTimeout('date_time("' + id + '");', '1000');
      return true;
    }
</script>

<script TYPE="text/javascript">
    function popup(mylink, windowname) {
      if (!window.focus) return true;
      var href;
      if (typeof(mylink) == 'string') href = mylink;
      else href = mylink.href;
      window.open(href, windowname, 'width=400,height=200,scrollbars=yes');
      return false;
    }
</script>


<script>
    setInterval(() => {
        $.ajax({
        url: "{{route('routerinfo')}}",
        datatype: "json",
        success: function(data) {

            var monitoring=data.monitoring[0];
            // $('#cpuProgressbar').prop('aria-valuenow',monitoring['cpu-used'],true);
            // $('#cpuProgressbar').css('width',monitoring['cpu-used']+"%",true);
            $('#cpu').html(monitoring['cpu-used']+"%");


            // $('#ramProgressbar').prop('aria-valuenow',monitoring['free-memory'],true);
            // $('#ramProgressbar').css('width',monitoring['free-memory']+"%",true);
            $('#ram').html(((monitoring['free-memory'] / 1024).toFixed(2) )+" MB");
            // $('#ram').html(((monitoring['free-memory'] / 976.562).toFixed(2) )+" MB");


        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            console.error("Status: " + textStatus + " request: " + XMLHttpRequest);
            console.error("Error: " + errorThrown);
            }
        });
    }, 1000);


</script>
@endsection
