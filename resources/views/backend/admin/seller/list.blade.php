@extends('backend.admin.layouts.layout')
@section('content')
<div id="kt_content_container" class="container-fluid">
    <div class="card  card-shadow-sm">
        <div class="card-header">
            <div class="card-title">
                Seller Users
            </div>
            <div class="card-toolbar">
                <a href="{{route('admin.seller.create')}}" class="btn btn-sm btn-secondary">
                    Add Seller
                </a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="text-center">
                    <tr>
                        <th>Image</th>
                        <th>User Name</th>
                        <th>Full Name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Total User</th>
                        <th>Suspend User</th>
                        <th>Total Balance</th>
                        <th>Available Balance</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($data['sellers'] as $seller)
                    <tr class="text-center">

                        <td>
                            <div class="symbol symbol-50px symbol-circle">
                                <div class="symbol-label"
                                    style='background: url("{{(isset($seller->image)) ? asset($seller->image) : asset("backend/assets/media/avatars/blank.png") }}");background-size:contain;'>
                                </div>
                            </div>
                        </td>

                        </td>
                        <td>{{$seller->userName}}</td>
                        <td>{{$seller->fullName}}</td>
                        <td>{{$seller->phone}}</td>
                        <td>{{$seller->email}}</td>

                        <td>{{$seller->balance }}</td>
                        <td>{{$seller->balance }}</td>
                        <td>{{$seller->balance }}</td>
                        <td>{{$seller->balance }}</td>
                        <td>
                            <div class="d-flex justify-content-evenly align-items-center">

                                <a href="{{route('admin.seller.show',$seller->id)}}"
                                    class="btn btn-icon btn-light-youtube me-5"><i class="fa fa-ban"></i></a>
                                <a href="{{route('admin.seller.edit',$seller->id)}}"
                                    class="btn btn-icon btn-light-twitter me-5"><i class="fa fa-edit"></i></a>
                                <form action="{{route('admin.seller.destroy',$seller->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-icon btn-light-youtube me-5"><i
                                            class="fa fa-trash-alt"></i></button>
                                </form>


                            </div>

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
