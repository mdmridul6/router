@extends('backend.admin.layouts.layout')
@section('content')
<div id="kt_content_container" class="container-fluid">
    <div class="card  card-shadow-sm">
        <div class="card-header">
            <div class="card-title">
                Team
            </div>
            <div class="card-toolbar">
                <a class="btn btn-secondary btn-sm" href="{{route('admin.cms.team.create')}}">Add</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Images</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['teams'] as $team)
                    <tr>
                        <td>
                            {{$loop->iteration}}
                        </td>
                        <td>
                            <div class="symbol symbol-50px">
                                <div class="symbol-label"
                                    style='background: url("{{(isset($team->image)) ? asset($team->image) : asset("backend/assets/media/avatars/blank.png") }}");background-size:contain;'>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p>{{$team->name}}</p>
                        </td>
                        <td>
                            <p>{{$team->designation}}</p>
                        </td>
                        <td class="d-flex justify-content-around">
                            <a href="{{route('admin.cms.team.edit',$team->id)}}" class="btn btn-info btn-sm"><i
                                    class="fas fa-edit"></i></a>
                            <form action="{{route('admin.cms.team.destroy',$team->id)}}" method="post">
                                @csrf
                                @method('DELETE')
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
