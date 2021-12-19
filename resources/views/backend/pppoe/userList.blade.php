@extends('backend.layouts.layout')
@section('css')
@endsection
@section('content')
    <div id="kt_content_container" class="container">
        <div class="card  card-shadow-sm">
            <div class="card-header">
                <div class="card-title">
                    PPPoE Users
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="text-center">
                    <tr>
                        <th>#</th>
                        <th>User Name</th>
                        <th>Password</th>
                        <th>Service</th>
                        <th> User Entry Date</th>
                        <th>User Active Date</th>
                        <th>Next Expired Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $item)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->username  }}</td>
                            <td>{{ $item->password  }}</td>
                            <td>{{ $item->service  }}</td>
                            <td>{{ date('d-M-Y',strtotime($item->active_date))   }}</td>
                            <td>{{ date('d-M-Y',strtotime($item->package_active_date))  }}</td>
                            <td>{{ date('d-M-Y',strtotime($item->package_expire_date))  }}</td>
                            <td class="d-flex justify-content-around">
                                <a class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1" href="#"data-bs-toggle="tooltip" data-bs-placement="top" title="Show"><span class="svg-icon svg-icon-3"><i class="fas fa-eye"></i></span></a>
                                <a class="btn btn-icon btn-bg-light btn-active-color-info btn-sm me-1" href="#"data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="svg-icon svg-icon-3"><i class="fas fa-edit"></i></span></a>
                                <a class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm me-1" href="#"data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><span class="svg-icon svg-icon-3"><i class="fas fa-trash"></i></span></a>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

