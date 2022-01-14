@extends('backend.admin.layouts.layout')
@section('content')
<div id="kt_content_container" class="container-fluid">
    <div class="card  card-shadow-sm">
        <div class="card-header">
            <div class="card-title">
                PPPoE User Add
            </div>
        </div>
        <div class="card-body">
            <form action="#">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    <label for="username">User Name</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="User Name">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
