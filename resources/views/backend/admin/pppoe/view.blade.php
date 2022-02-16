@extends('backend.admin.layouts.layout')
@section('content')

<!--begin::Container-->
<div id="kt_content_container" class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                PPPoE User Details
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <!--begin::List Widget 7-->
                    <div class="card card-xl-stretch bg-light-info">
                        <!--begin::Body-->
                        <div class="card-body pt-3">

                            <!--begin::Item-->
                            <div class="d-flex align-items-sm-center mb-7">
                                <!--begin::Title-->
                                <div class="d-flex flex-row-fluid flex-wrap align-items-center">
                                    <div class="flex-grow-1 me-2">
                                        <p class="text-gray-800 fw-bolder text-hover-primary fs-6">Id</p>
                                    </div>
                                    <p class="text-gray-800 fw-bolder text-hover-primary fs-6">
                                        {{$data['pppoeData']->id}}</p>
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-sm-center mb-7">
                                <!--begin::Title-->
                                <div class="d-flex flex-row-fluid flex-wrap align-items-center">
                                    <div class="flex-grow-1 me-2">
                                        <p class="text-gray-800 fw-bolder text-hover-primary fs-6">User Name</p>
                                    </div>
                                    <p class="text-gray-800 fw-bolder text-hover-primary fs-6">
                                        {{$data['pppoeData']->username}}
                                    </p>
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-sm-center mb-7">
                                <!--begin::Title-->
                                <div class="d-flex flex-row-fluid flex-wrap align-items-center">
                                    <div class="flex-grow-1 me-2">
                                        <p class="text-gray-800 fw-bolder text-hover-primary fs-6">Password</p>
                                    </div>
                                    <p class="text-gray-800 fw-bolder text-hover-primary fs-6">
                                        {{$data['pppoeData']->password}}
                                    </p>
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-sm-center mb-7">
                                <!--begin::Title-->
                                <div class="d-flex flex-row-fluid flex-wrap align-items-center">
                                    <div class="flex-grow-1 me-2">
                                        <p class="text-gray-800 fw-bolder text-hover-primary fs-6">Service</p>
                                    </div>
                                    <p class="text-gray-800 fw-bolder text-hover-primary fs-6">
                                        {{$data['pppoeData']->service}}
                                    </p>
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-sm-center mb-7">
                                <!--begin::Title-->
                                <div class="d-flex flex-row-fluid flex-wrap align-items-center">
                                    <div class="flex-grow-1 me-2">
                                        <p class="text-gray-800 fw-bolder text-hover-primary fs-6">Profile</p>
                                    </div>
                                    <p class="text-gray-800 fw-bolder text-hover-primary fs-6">
                                        {{$data['pppoeData']->profile}}
                                    </p>
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Item-->

                            @if ($data['pppoeData']->status)

                            <!--begin::Item-->
                            <div class="d-flex align-items-sm-center mb-7">
                                <!--begin::Title-->
                                <div class="d-flex flex-row-fluid flex-wrap align-items-center">
                                    <div class="flex-grow-1 me-2">
                                        <p class="text-gray-800 fw-bolder text-hover-primary fs-6">Remote Address</p>
                                    </div>
                                    <p class="text-gray-800 fw-bolder text-hover-primary fs-6">
                                        {{$data['remoteLink']}}
                                    </p>
                                </div>
                                <!--end::Title-->
                            </div>
                            @endif
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-sm-center mb-7">
                                <!--begin::Title-->
                                <div class="d-flex flex-row-fluid flex-wrap align-items-center">
                                    <div class="flex-grow-1 me-2">
                                        <p class="text-gray-800 fw-bolder text-hover-primary fs-6">Active Date</p>
                                    </div>
                                    <p class="text-gray-800 fw-bolder text-hover-primary fs-6">
                                        {{($data['pppoeData']->active_date != null)
                                        ? $data['pppoeData']->active_date->isoFormat('D-MMM-YYYY') : ""}}</p>
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-sm-center mb-7">
                                <!--begin::Title-->
                                <div class="d-flex flex-row-fluid flex-wrap align-items-center">
                                    <div class="flex-grow-1 me-2">
                                        <p class="text-gray-800 fw-bolder text-hover-primary fs-6">Package Active Date
                                        </p>
                                    </div>
                                    <p class="text-gray-800 fw-bolder text-hover-primary fs-6">
                                        {{($data['pppoeData']->package_active_date != null ) ?
                                        $data['pppoeData']->package_active_date->isoFormat('D-MMM-YYYY') : ""}}</p>
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-sm-center mb-7">
                                <!--begin::Title-->
                                <div class="d-flex flex-row-fluid flex-wrap align-items-center">
                                    <div class="flex-grow-1 me-2">
                                        <p class="text-gray-800 fw-bolder text-hover-primary fs-6">Package Expire Date
                                        </p>
                                    </div>
                                    <p class="text-gray-800 fw-bolder text-hover-primary fs-6">
                                        {{($data['pppoeData']->package_expire_date !=
                                        null) ? $data['pppoeData']->package_expire_date->isoFormat('D-MMM-YYYY') : ""}}
                                    </p>
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-sm-center mb-7">
                                <!--begin::Title-->
                                <div class="d-flex flex-row-fluid flex-wrap align-items-center">
                                    <div class="flex-grow-1 me-2">
                                        <p class="text-gray-800 fw-bolder text-hover-primary fs-6">Status</p>
                                    </div>
                                    <p class="text-gray-800 fw-bolder text-hover-primary fs-6">
                                        {{($data['pppoeData']->status ?
                                        "Active" : "Deactive" )}}</p>
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <div class="d-flex align-items-sm-center mb-7">
                                <!--begin::Title-->
                                <div class="d-flex flex-row-fluid flex-wrap align-items-center">
                                    <div class="flex-grow-1 me-2">
                                        <p class="text-gray-800 fw-bolder text-hover-primary fs-6">Seller Name</p>
                                    </div>
                                    <p class="text-gray-800 fw-bolder text-hover-primary fs-6">
                                        {{isset($data['pppoeData']->seller->userName) ?
                                        $data['pppoeData']->seller->userName : "No
                                        Seller"}}
                                    </p>
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Item-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::List Widget 7-->

                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    @if ($data['pppoeData']->status)
                    <div class="card bg-light-info">
                        <div class="card-header">
                            <h3 class="card-title text-info">Morniter Traffic</h3>
                            <div class="card-toolbar">
                                <a href="http://{{$data['remoteLink']}}" target="_blank"
                                    class="btn btn-secondary">Remote
                                    Link</a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="d-flex align-items-sm-center mb-7">
                                <!--begin::Title-->
                                <div class="d-flex flex-row-fluid flex-wrap align-items-center">
                                    <div class="flex-grow-1 me-2">
                                        <p class="text-gray-800 fw-bolder text-hover-primary fs-6">TX</p>
                                    </div>
                                    <p class="text-gray-800 fw-bolder text-hover-primary fs-6" id="tx"></p>
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Item-->
                            <div class="d-flex align-items-sm-center mb-7">
                                <!--begin::Title-->
                                <div class="d-flex flex-row-fluid flex-wrap align-items-center">
                                    <div class="flex-grow-1 me-2">
                                        <p class="text-gray-800 fw-bolder text-hover-primary fs-6">RX</p>
                                    </div>
                                    <p class="text-gray-800 fw-bolder text-hover-primary fs-6" id="rx"></p>
                                </div>
                                <!--end::Title-->
                            </div>
                            <!--end::Item-->
                            <div class="col-md-12">
                                <div class="chart">
                                    <div id="container-fluid"></div>
                                </div>
                                <input type="hidden" name="" id="interface"
                                    value="<pppoe-{{$data['pppoeData']->username}}>">
                            </div>
                        </div>
                    </div>
                    @else
                    <h3 class="text-danger text-center">Active The User First</h3>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
    @endsection

    @if ($data['pppoeData']->status)

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
            var TX = formatBytes(parseInt(midata[0].data));
            var RX = formatBytes(parseInt(midata[1].data));

            $('#tx').html(TX);
            $('#rx').html(RX);
            var x = (new Date()).getTime();
            shift = chart.series[0].data.length > 20;
            chart.series[0].addPoint([x, parseInt(midata[0].data)], true, shift);
            chart.series[1].addPoint([x, parseInt(midata[1].data)], true, shift);
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


    function formatBytes(bytes, decimals = 2) {
    if (bytes === 0) return '0 Bytes';

    const k = 1000;
    const dm = decimals < 0 ? 0 : decimals; const sizes=['Bytes', 'KB' , 'MB' , 'GB' , 'TB' , 'PB' , 'EB' , 'ZB' , 'YB' ];
        const i=Math.floor(Math.log(bytes) / Math.log(k)); return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' +
        sizes[i]; }

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
        scrollablePlotArea: {
        minWidth: 600,
        scrollPositionX: 1
        },
          events: {
            load: function() {
              setInterval(function() {
                requestDatta(document.getElementById("interface").value);
              }, 1000);
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
        plotOptions: {
            line: {
                dataLabels: {
                enabled: true
            },
                enableMouseTracking: false
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
    @endsection
    @endif
