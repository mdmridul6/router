@extends('backend.admin.layouts.layout')
@section('content')
    <div id="kt_content_container" class="container-fluid">
        <div class="card  card-shadow-sm">
            <div class="card-header">
                <div class="card-title">
                    Seller Packages Assign
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('admin.package.sellerPackageDedicate')}}" method="post">
                    @csrf
                    <div class="col-12 col-sm-12 col-ml-12 col-lg-12 col-xl-12">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-ml-6 col-lg-6 col-xl-6">
                                <label for="sellerId">Select Seller</label>
                                <select name="seller" id="sellerId" class="form-select">
                                    @foreach($data['seller'] as $seller)
                                        <option value="{{$seller->id}}">{{$seller->userName}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-sm-12 col-ml-6 col-lg-6 col-xl-6">
                                <div class="row">

                                    <label class="docs-page-title" for="">Select Packages</label>
                                    @foreach($data['package'] as $package)
                                        @if($package->name !== 'default' and $package->name !== 'default-encryption')
                                        <div class="col-12 col-sm-12 col-ml-6 col-lg-6 col-xl-6 my-3">
                                            <div class="form-check form-check-custom form-check-solid my-2">
                                                <input class="form-check-input" type="checkbox" name="packages[]" value="{{$package->id}}" id="activeInput_{{$package->id}}" onclick="activeInput({{$package->id}});"/>
                                                <label class="form-check-label" for="activeInput_{{$package->id}}">
                                                    {{$package->name}}
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-ml-6 col-lg-6 col-xl-6">
                                            <label for="amountInput{{$package->id}}"></label>
                                            <input type="text" id="amountInput{{$package->id}}" name="amounts[]" class="form-control form-control-sm" disabled>
                                        </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-success w-50">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>


        function activeInput(id) {
            document.getElementById('activeInput_'+id).onchange = function() {
                document.getElementById('amountInput'+id).disabled = !this.checked;
            };
        }
    </script>
@endsection
