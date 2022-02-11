@extends('backend.admin.layouts.layout')
@section('content')

<!--begin::Container-->
<div id="kt_content_container" class="container-fluid">
    <div class="card card-shadow">
        <div class="card-header">
            <div class="card-title">
                Setting
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('admin.setting.store')}}" method="POST">
                @csrf

                <div class="form-check form-switch form-check-custom form-check-solid d-flex justify-content-between">
                    <label class="form-check-label" for="flexSwitchDefault">
                        PPPoe User Delete
                    </label>
                    <input class="form-check-input" type="checkbox" name="pppoeDelete" value="1" id="flexSwitchDefault"
                        @if(isset($data['setting']->pppoe_delete) &&
                    $data['setting']->pppoe_delete)
                    checked="checked"
                    @endif />

                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
