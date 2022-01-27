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

            <form action="{{route('admin.pppoe.create')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-2">
                        <label for="username">User Name</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="User Name">
                        <span class="text-danger d-none" id="warning">User already exist</span>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-2">
                        <label for="username">Password</label>
                        <input type="text" name="password" id="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-2">
                        <label for="packages">Package</label>
                        <select name="packages" id="packages" class="form-control">
                            <option value="" disabled selected> Select Packages</option>
                            @foreach ($data['packages'] as $package)
                            @if($package->name !== 'default' and $package->name !== 'default-encryption')
                            <option value="{{$package->name}}">{{$package->name}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-2">
                        <label for="packages">Seller</label>
                        <select name="seller" id="seller" class="form-control">
                            <option value="0" selected> Select seller</option>
                            @foreach ($data['seller'] as $seller)

                            <option value="{{$seller->id}}">{{$seller->userName}}</option>

                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 mt-2">
                        <label for="seller">

                        </label>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-success btn-block w-25 mt-2" id="savebtn">Save</button>
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
