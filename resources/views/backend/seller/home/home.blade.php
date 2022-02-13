@extends('backend.seller.layouts.layout')
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
                    <h3 class="card-title fw-bolder text-light fs-5 mb-3 d-block">&nbsp;</h3>
                    <div class="py-1">
                        <span class="text-light fs-2 fw-bolder me-2">{{$data['identity'][0]['name']}}</span>
                    </div>
                </div>
                <!--end:: Body-->
            </div>
            <!--end: Statistics Widget 6-->
        </div>

        {{-- <div class="col-md-4">
            <!--begin: Statistics Widget 6-->
            <div class="card bg-danger card-xl-stretch mb-xl-8">
                <!--begin::Body-->
                <div class="card-body my-3">
                    <i class="fas fa-microchip text-light fa-3x"></i>
                    <h3 class="card-title fw-bolder text-light fs-5 mb-3 d-block">CPU Used</h3>
                    <div class="py-1">
                        <span class="text-light fs-1 fw-bolder me-2" id="cpu"></span>
                    </div>
                    <div class="progress h-7px bg-light bg-opacity-50 mt-7">
                        <div class="progress-bar bg-light" id="cpuProgressbar" role="progressbar" style="width: 15%"
                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <!--end:: Body-->
            </div>
            <!--end: Statistics Widget 6-->
        </div> --}}
        {{-- <div class="col-md-4">
            <!--begin: Statistics Widget 6-->
            <div class="card bg-info card-xl-stretch mb-xl-8">
                <!--begin::Body-->
                <div class="card-body my-3">
                    <i class="fas fa-hdd text-light fa-3x"></i>
                    <h3 class="card-title fw-bolder text-light fs-5 mb-3 d-block">RAM Used</h3>
                    <div class="py-1">
                        <span class="text-light fs-1 fw-bolder me-2" id="ram"></span>
                    </div>

                    <div class="progress h-7px bg-light bg-opacity-50 mt-7">
                        <div class="progress-bar bg-light" id="ramProgressbar" role="progressbar" style="width: 15%"
                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <!--end:: Body-->
            </div>
            <!--end: Statistics Widget 6-->
        </div> --}}
        <div class="col-md-4">
            <!--begin: Statistics Widget 6-->
            <div class="card bg-warning card-xl-stretch mb-xl-8">
                <!--begin::Body-->
                <div class="card-body my-3">
                    <i class="fas fa-users text-light fa-3x"></i>
                    <h3 class="card-title fw-bolder text-light fs-5 mb-3 d-block">Total User</h3>
                    <div class="py-1">
                        <span class="text-light fs-1 fw-bolder me-2" id="ram">{{$data['total_user']}}</span>
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
        <div class="col-md-4">
            <!--begin: Statistics Widget 6-->
            <div class="card bg-primary card-xl-stretch mb-xl-8">
                <!--begin::Body-->
                <div class="card-body my-3">
                    <i class="fas fa-user-check text-light fa-3x"></i>

                    <h3 class="card-title fw-bolder text-light fs-5 mb-3 d-block">Total Active User</h3>
                    <div class="py-1">
                        <span class="text-light fs-1 fw-bolder me-2">{{$data['total_active_user']}}</span>
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

    {{-- <div class="row">

        <div class="col-md-8">
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

        <div class="col-md-4">
            <div class="col-md-12">
                <div class="card bg-primary card-xl-stretch mb-xl-8">
                    <div class="card-body my-3">
                        <h1 class="card-title fw-bolder text-light fs-2 mb-3 d-block">TX</h1>
                        <div class=" py-1">
                            <span class="text-light fs-1 fw-bolder me-2" id="tx"></span>
                        </div>
                    </div>

                </div>
                <div class="col-md-12">
                    <div class="card bg-dark card-xl-stretch mb-xl-8">
                        <div class="card-body my-3">
                            <h1 class="card-title fw-bolder text-light fs-2 mb-3 d-block">RX</h1>
                            <div class="py-1">
                                <span class="text-light fs-1 fw-bolder me-2" id="rx"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div> --}}
    <!--end::Content-->
</div>
<!--end::Container-->

<!--end::Content-->
@endsection

@section('js')
{{-- <script>
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


</script> --}}
@endsection
