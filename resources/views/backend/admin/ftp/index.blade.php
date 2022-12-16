@extends('backend.admin.layouts.layout')

@section('content')
    <!--begin::Container-->
    <div id="kt_content_container" class="container-fluid">
        <div class="card card-shadow">
            <div class="card-header">
                <div class="card-title">
                    FTP List
                </div>
                <div class="card-toolbar">
                    <a href="{{ route('admin.cms.ftp.create') }}" class="btn btn-secondary btn-sm">Add FTP</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['ftp'] as $ftp)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $ftp->title }}</td>
                                <td>{{ $ftp->category->name }}</td>
                                <td>
                                    <label class="switch">
                                        <input type="checkbox" @if ($ftp->status) checked @endif
                                            name="link" id="link" data-id="{{ $ftp->id }}">
                                        <span class="slider round"></span>
                                    </label>
                                </td>
                                <td class="d-flex justify-content-around">

                                    <a class="btn btn-info btn-sm"
                                        href="{{ route('admin.cms.ftp.edit', ['ftp' => $ftp->id]) }}"><i
                                            class="fas fa-edit"></i></a>
                                    <form action="{{ route('admin.cms.ftp.destroy', ['ftp' => $ftp->id]) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
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
    <script>
        $('#link').change(function(event) {

            let state = $(this).is(":checked");
            let id = $(this).data('id');

            axios.post("{{ route('admin.cms.ftp.statusChange') }}", {
                    state: state,
                    id: id
                })
                .then(function(response) {
                    const {
                        data
                    } = response;
                    if (data) {
                        toastr.success("Ftp Activate")
                    } else {
                        toastr.error("Ftp Dectivate")
                    }
                })
                .catch(function(error) {
                    console.log(error);
                });

        })
    </script>
@endsection
