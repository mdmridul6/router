@extends('backend.seller.layouts.layout')
@section('content')
<div id="kt_content_container" class="container-fluid">
    <div class="card  card-shadow-sm">
        <div class="card-header">
            <div class="card-title">
                Suspend Users
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="dataTable">
                <thead class="text-center">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Service</th>
                        <th>Profile</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['pppoe'] as $item)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item['username'] }}</td>
                        <td>{{ $item['service'] }}</td>
                        <td>{{ $item['profile'] }}</td>

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
            axios.post("{{route('admin.pppoe.import')}}")
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
