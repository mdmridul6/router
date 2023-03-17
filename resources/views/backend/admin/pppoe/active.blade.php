@extends('backend.admin.layouts.layout')


@section('content')
    <div id="kt_content_container" class="container-fluid">

        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    PPPOE Active List
                </div>
            </div>
            <div class="card-body">
                <form action="#" id="checkform">
                    @csrf
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-10 col-lg-10">
                                <label for="name" class="d-none"></label>
                                <input type="text" class="form-control form-control-lg" name="name" id="name">
                            </div>
                            <div class="col-12 col-sm-12 col-md-2 col-lg-2">
                                <button class="btn btn-block btn-primary">Check</button>
                            </div>

                        </div>
                    </div>
                </form>
                <div class="result">

                    <table class="table table-bordrred" id="dataTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Service</th>
                                <th>Address</th>
                                <th>MAC Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data['allPPPoe'] as $allPPPoeE)
                                @foreach ($data['pppoeActive'] as $pppoeActive)
                                    @if ($allPPPoeE->username == $pppoeActive['name'])
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $pppoeActive['name'] ?? '' }}</td>
                                            <td>{{ $pppoeActive['service'] ?? '' }}</td>
                                            <td>{{ $pppoeActive['address'] ?? '' }}</td>
                                            <td>{{ $pppoeActive['caller-id'] ?? '' }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection



@section('js')
    <script src="{{ asset('backend/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>

    <script>
        $('#checkform').submit(function(e) {
            e.preventDefault();
            let name = $('#name').val();

            axios.post("{{ route('admin.pppoe.ActiveList') }}", {
                name: name,
            }).then(function(response) {
                let jsondata = response.data;
                Swal.fire(
                    jsondata.status,
                    '',
                    jsondata.icon
                )


            }).catch(function(error) {
                console.log(error);
            });
        })
    </script>
@endsection
