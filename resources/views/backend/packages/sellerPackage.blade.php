@extends('backend.layouts.layout')
@section('content')
    <div id="kt_content_container" class="container-fluid">
        <div class="card  card-shadow-sm">
            <div class="card-header">
                <div class="card-title">
                    Seller Packages
                </div>
                <div class="card-toolbar">
                    <a href="{{route('admin.package.sellerPackageDedicate')}}" class="btn btn-sm btn-secondary" >
                        Set Package
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="text-center">
                    <tr>
                        <th>Serial</th>
                        <th>Name</th>
                        <th>Packages</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data  as $details)
                        <tr class="text-center">
                            <td>{{$loop->iteration}}</td>
                            <td>{{$details->userName}}</td>
                            <td>
                                @foreach($details->package as $packages)

                                    <span class="badge badge-primary">{{$packages->name}}</span>
                                    <span class="badge badge-danger">{{$packages->pivot->amount}}</span>&emsp;
                                @endforeach
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')



@endsection
