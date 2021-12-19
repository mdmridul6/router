@extends('backend.layouts.layout')
@section('content')
    <div id="kt_content_container" class="container-fluid">
        <div class="card  card-shadow-sm">
            <div class="card-header">
                <div class="card-title">
                    Seller Packages
                </div>
                <div class="card-toolbar">
                    <button  class="btn btn-sm btn-secondary" >
                        Set Package
                    </button>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="text-center">
                    <tr>
                        <th>Serial</th>
                        <th>Name</th>
                        <th>Ip Address</th>

                    </tr>
                    </thead>
                    <tbody>



                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')



@endsection
