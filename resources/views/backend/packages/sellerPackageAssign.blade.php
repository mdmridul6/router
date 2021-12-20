@extends('backend.layouts.layout')
@section('content')
    <div id="kt_content_container" class="container-fluid">
        <div class="card  card-shadow-sm">
            <div class="card-header">
                <div class="card-title">
                    Seller Packages Assign
                </div>
            </div>
            <div class="card-body">
                <form action="">
                    <div class="col-12 col-sm-12 col-ml-12 col-lg-12 col-xl-12">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-ml-6 col-lg-6 col-xl-6">
                                <label for="seller">Select Seller</label>
                                <select name="seller" id="seller" class="form-select">
                                    @foreach($data['seller'] as $seller)
                                        <option value="{{$seller->id}}">{{$seller->userName}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-sm-12 col-ml-6 col-lg-6 col-xl-6">
                                <div class="row">
                                    <label class="docs-page-title" for="">Select Packages</label>
                                    @foreach($data['package'] as $package)
                                        <div class="form-check form-check-custom form-check-solid my-2">
                                            <input class="form-check-input" type="checkbox" value="{{$package->id}}" id="{{$package->id}}"/>
                                            <label class="form-check-label" for="{{$package->id}}">
                                                {{$package->name}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
