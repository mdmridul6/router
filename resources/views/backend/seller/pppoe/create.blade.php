@extends('backend.admin.layouts.layout')
@section('content')
<div id="kt_content_container" class="container-fluid">
    <div class="card  card-shadow-sm">
        <div class="card-header">
            <div class="card-title">
                PPPoE User Add
            </div>
        </div>
        <div class="card-body">

            <form action="{{route('seller.pppoe.create')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12 col-sm-12 col-md- col-lg-6 col-xl-6 mt-2">
                        <div class="card card-shadow">
                            <div class="card-header p-1">
                                <div class="card-title">
                                    Genarel Info
                                </div>
                            </div>
                            <div class="card-body p-1">
                                <div class="my-2">
                                    <label for="username">User Name <span class="text-danger">*</span></label>
                                    <input type="text" name="username" id="username" class="form-control"
                                        placeholder="User Name">
                                    <span class="text-danger d-none" id="warning">User already exist</span>
                                </div>

                                <div class="my-2">
                                    <label for="username">Password <span class="text-danger">*</span></label>
                                    <input type="text" name="password" id="password" class="form-control"
                                        placeholder="Password">
                                </div>

                                <div class="my-2">
                                    <label for="packages">Package <span class="text-danger">*</span></label>
                                    <select name="packages" id="packages" class="form-control">
                                        <option value="" disabled selected> Select Packages</option>
                                        @foreach ($data['packages']->package as $package)
                                        <option value="{{$package->name}}">{{$package->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 col-md- col-lg-6 col-xl-6 mt-2">
                        <div class="card card-shadow">
                            <div class="card-header">
                                <div class="card-title">
                                    Personal Info
                                </div>
                            </div>
                            <div class="card-body p-1">
                                <div class="my-2">
                                    <label for="username">User Name <span class="text-danger">*</span></label>
                                    <input type="text" name="fullName" id="fullName" class="form-control"
                                        placeholder="">
                                </div>
                                <div class="my-2">
                                    <label for="username">Phone Number <span class="text-danger">*</span></label>
                                    <input type="text" name="phone" id="phoneNumber" class="form-control"
                                        placeholder="">
                                </div>
                                <div class="my-2">
                                    <label for="username">Mobile Number</label>
                                    <input type="text" name="mobile" class="form-control" placeholder="">
                                </div>
                                <div class="my-2">
                                    <label for="username">Full Address</label>
                                    <input type="text" name="address" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-success btn-block w-25 mt-2" id="savebtn">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $('#username').focus(function () {
        $('#warning').removeClass( "text-danger" ).addClass( "text-danger d-none" );
        $('#packages').prop('disabled',false);
    });

    $('#username').focusout(function(){
        var name=$(this).val();
        axios.post("{{route('admin.pppoe.DbPPPoeCheck')}}", {
        name: name,
        })
        .then(function (response) {

        if(response.data == "true"){
            $('#warning').removeClass( "text-danger d-none" ).addClass( "text-danger" );
            $('#packages').prop('disabled',true);
        }
        })
        .catch(function (error) {
        console.log(error);
        });
    })
</script>
@endsection