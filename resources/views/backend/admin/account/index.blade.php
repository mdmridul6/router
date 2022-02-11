@extends('backend.admin.layouts.layout')
@section('content')

<!--begin::Container-->
<div id="kt_content_container" class="container-fluid">
    <div class="card card-shadow">
        <div class="card-header">
            <div class="card-title">
                Seller Add Balance
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('admin.balence.add')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <label for="seller">Select Seller</label>
                        <select name="seller" id="" class="form-control">
                            <option value="" selected disabled>Select Seller</option>
                            @foreach ($data['seller'] as $seller)
                            <option value="{{$seller->id}}">{{$seller->userName}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <label for="balence">Balence</label>
                        <input type="number" name="balence" id="" class="form-control">
                    </div>
                </div>
        </div>
        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-success">Save</button>
        </div>
        </form>
    </div>
</div>
</div>
@endsection
