@extends('backend.layouts.layout')
@section('content')
    <div id="kt_content_container" class="container-fluid">
        <div class="card  card-shadow-sm">
            <div class="card-header">
                <div class="card-title">
                    Router Packages
                </div>
                <div class="card-toolbar">
                    <button  class="btn btn-sm btn-secondary" id="import" >
                        Import Package
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
                    @foreach($packages as $package)
                        <tr class="text-center">
                        <td>{{$loop->iteration}}</td>
                        <td>{{$package['name']}}</td>
                        <td>{{$package['local-address']}}</td>
                        </tr>

                    @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')

    <script>
        $('#import').click(function (){
            axios.post("{{route('admin.package.create')}}")
                .then(function (response) {
                    let jsondata=response.data;
                    Swal.fire(
                        jsondata.status,
                        jsondata.data,
                        jsondata.icon
                    );
                })
                .catch(function (error) {
                    console.log(error);
                });
        })
    </script>

@endsection
