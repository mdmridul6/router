@extends('backend.admin.layouts.layout')
@section('content')
<div id="kt_content_container" class="container-fluid">
    <div class="card  card-shadow-sm">
        <div class="card-header">
            <div class="card-title">
                Seller PPPoE Assign
            </div>
        </div>
        <div class="card-body">

            <form action="{{route('admin.seller.pppoeAssign')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <label for="sellerId">Seller</label>
                        <select name="seller" id="sellerId" class="form-control" required>
                            <option value="0" disabled selected>Select Seller</option>

                            @foreach ($data['seller'] as $seller)
                            <option value="{{$seller->id}}">{{$seller->fullName}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                        <div class="overflow-auto" style="height: 80vh">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>User Name</th>
                                        <th>Service</th>
                                        <th>Profile</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['pppoeUsers'] as $pppoeUsers)
                                    <tr>
                                        <td class="d-flex justify-content-center">
                                            <div class="form-check form-check-lg form-check-custom form-check-solid">
                                                <input class="form-check-input widget-9-check" name="pppoeID[]"
                                                    type="checkbox" value="{{$pppoeUsers->id}}">
                                            </div>
                                        </td>
                                        <td>{{$pppoeUsers->username}}</td>
                                        <td>{{$pppoeUsers->service}}</td>
                                        <td>{{$pppoeUsers->profile}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>




                <div class="d-flex justify-content-center mt-4">
                    <button class="btn btn-success btn-block w-25">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('js')

@endsection
