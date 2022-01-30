@extends('backend.admin.layouts.layout')
@section('content')
<div id="kt_content_container" class="container-fluid">
    <div class="card  card-shadow-sm">
        <div class="card-header">
            <div class="card-title">
                Seller Packages
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="text-center">
                    <tr>
                        <th>Serial</th>
                        <th>Name</th>
                        <th>Packages</th>
                        <th>Assign</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data['package'] as $details)
                    <tr class="text-center">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$details->userName}}</td>
                        <td>
                            @foreach($details->package as $packages)

                            <span class="badge badge-white">
                                <span class="badge badge-primary">{{$packages->name}}</span>
                                <span class="badge badge-danger">{{$packages->pivot->amount}}</span>&emsp;
                            </span>
                            @endforeach
                        </td>
                        <td>
                            <form action="{{route('admin.package.sellerPackageAssign',['id'=>$details->id])}}"
                                method="POST">
                                @csrf
                                <button type="submit" class="btn btn-icon btn-success me-5"><i
                                        class="far fa-play-circle fs-3"></i></button>
                            </form>

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
