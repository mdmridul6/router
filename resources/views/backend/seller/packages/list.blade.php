@extends('backend.seller.layouts.layout')
@section('content')
<div id="kt_content_container" class="container-fluid">
    <div class="card  card-shadow-sm">
        <div class="card-header">
            <div class="card-title">
                My Packages
            </div>

        </div>
        <div class="card-body">
            <table class="table table-bordered" id="dataTable">
                <thead class="text-center">
                    <tr>
                        <th>Serial</th>
                        <th>Name</th>
                        <th>Price</th>

                    </tr>
                </thead>
                <tbody>


                    @foreach ($data['packages']->package as $package)
                    <tr class="text-center">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$package->name}}</td>
                        <td>{{$package->pivot->amount}} TK</td>
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
