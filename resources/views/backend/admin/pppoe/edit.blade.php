@extends('backend.admin.layouts.layout')
@section('content')
<div id="kt_content_container" class="container-fluid">
    <div class="card  card-shadow-sm">
        <div class="card-header">
            <div class="card-title">
                PPPoE User Edit
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('admin.pppoe.edit',$data['pppoeData']->id)}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12 col-sm-12 col-md- col-lg-6 col-xl-6 mt-2">
                        <div class="card card-shadow-sm">
                            <div class="card-header p-1">
                                <div class="card-title">
                                    Genarel Info
                                </div>
                            </div>
                            <div class="card-body p-1">
                                <div class="my-2">
                                    <label for="username">User Name <span class="text-danger">*</span></label>
                                    <input type="text" name="username" id="username" class="form-control"
                                        placeholder="User Name"
                                        value="{{ old('username') ? old('username') : $data['pppoeData']->username}}"
                                        required>
                                    <span class="text-danger d-none" id="warning">User already exist</span>
                                </div>

                                <div class="my-2">
                                    <label for="username">Password <span class="text-danger">*</span></label>
                                    <input type="text" name="password" id="password" class="form-control"
                                        placeholder="Password"
                                        value="{{old('password') ? old('password') : $data['pppoeData']->password}}"
                                        required>
                                </div>

                                <div class="my-0">
                                    <label class="form-label">Active After</label>
                                    <input class="form-control form-control-solid" name="active_after"
                                        placeholder="Active After" id="datePicker"
                                        value="{{old('active_after') ? old('active_after') : (isset($data['pppoeData']->active_after) ? $data['pppoeData']->active_after->isoFormat('YYYY-MM-D') : "")}}" />
                                </div>

                                <div class="my-2">
                                    <label for="packages">Package <span class="text-danger">*</span></label>
                                    <select name="packages" id="packages" class="form-control">
                                        <option value="" disabled selected> Select Packages</option>
                                        @foreach ($data['packages'] as $package)
                                        <option value="{{$package->name}}" @if ($package->name ==
                                            $data['pppoeData']->profile || $package->name == old('packages'))selected
                                            @endif>{{$package->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="my-2">
                                    <label for="seller">Selller</label>
                                    <select name="seller" id="seller" class="form-control">
                                        <option value=""> Select Seller</option>
                                        @foreach ($data['seller'] as $seller)
                                        <option value="{{$seller->id}}" @if ($seller->userName ==
                                            old('seller') || $seller->id == $data['pppoeData']->seller_id) selected
                                            @endif>{{$seller->userName}}
                                        </option>
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
                                    <label for="username">Full Name <span class="text-danger">*</span></label>
                                    <input type="text" name="fullName" id="fullName" class="form-control"
                                        value="{{old('fullName') ? old('fullName') : (isset($data['pppoeData']->pppoeUserDetails->name) ? $data['pppoeData']->pppoeUserDetails->name : "")}}"
                                        required>
                                </div>
                                <div class="my-2">
                                    <label for="username">Phone Number <span class="text-danger">*</span></label>
                                    <input type="text" name="phone" id="phoneNumber" class="form-control"
                                        value="{{old('phone') ? old('phone') : (isset($data['pppoeData']->pppoeUserDetails->phone) ? $data['pppoeData']->pppoeUserDetails->phone : "")}}"
                                        required>
                                </div>
                                <div class=" my-2">
                                    <label for="mobile">Mobile Number</label>
                                    <input type="text" name="mobile" class="form-control"
                                        value="{{old('mobile') ? old('mobile') : (isset($data['pppoeData']->pppoeUserDetails->mobile) ? $data['pppoeData']->pppoeUserDetails->mobile : "")}}">
                                </div>
                                <div class="my-2">
                                    <label for="username">Full Address <span class="text-danger">*</span></label>
                                    <input type="text" name="address" class="form-control"
                                        value="{{old('address') ? old('address') : (isset($data['pppoeData']->pppoeUserDetails->address) ? $data['pppoeData']->pppoeUserDetails->address : "")}}"
                                        required>
                                </div>
                                <div class="my-2">
                                    <label for="isFree">Free Connection</label>
                                    <select name="isFree" id="" class="form-control">
                                        <option @if (old('ifFree')=='false' || $data['pppoeData']->is_free == 'false')
                                            selected @endif value="false">No</option>
                                        <option @if (old('ifFree')=='true' || $data['pppoeData']->is_free == 'true')
                                            selected @endif value="true">Yes</option>
                                    </select>
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
    $('#username').focus(function() {
        $('#warning').removeClass("text-danger").addClass("text-danger d-none");
        $('#packages').prop('disabled', false);
    });

    $('#username').focusout(function() {
        var name = $(this).val();
        axios.post("{{route('admin.pppoe.DbPPPoeCheck')}}", {
                name: name,
            })
            .then(function(response) {

                if (response.data == "true") {
                    $('#warning').removeClass("text-danger d-none").addClass("text-danger");
                    $('#packages').prop('disabled', true);
                }
            })
            .catch(function(error) {
                console.log(error);
            });
    })
</script>
@endsection
