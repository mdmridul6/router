@extends('backend.admin.layouts.layout')
@section('content')
<div id="kt_content_container" class="container-fluid">
    <div class="card  card-shadow-sm">
        <div class="card-header">
            <div class="card-title">
                Slider
            </div>
            <div class="card-toolbar">
                <a class="btn btn-secondary btn-sm" href="{{route('admin.cms.slider.create')}}">Add</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Images</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['sliders'] as $slider)
                    <tr>
                        <td>
                            {{$loop->iteration}}
                        </td>
                        <td>
                            <div class="symbol symbol-50px symbol-circle">
                                <div class="symbol-label"
                                    style='background: url("{{(isset($slider->images)) ? asset($slider->images) : asset("backend/assets/media/avatars/blank.png") }}");background-size:contain;'>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p>{{$slider->title}}</p>
                        </td>
                        <td>
                            <p>{{$slider->content}}</p>
                        </td>
                        <td class="d-flex justify-content-around">
                            <a href="{{route('admin.cms.slider.edit',$slider->id)}}" class="btn btn-info btn-sm"><i
                                    class="fas fa-edit"></i></a>
                            <form action="{{route('admin.cms.slider.destroy',$slider->id)}}" method="post">
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
