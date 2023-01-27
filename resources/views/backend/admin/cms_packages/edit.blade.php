@extends('backend.admin.layouts.layout')
@section('content')
    <!--begin::Container-->
    <div id="kt_content_container" class="container-fluid">
        <div class="card card-shadow">
            <div class="card-header">
                <div class="card-title">
                    Packages Upadte
                </div>
            </div>
            <div class="card-body">
                <form class="row g-3"
                    action="{{ route('admin.cms.cms-package.update', ['cms_package' => $cms_package->id]) }}" method="POST">
                    @method('PUT')
                    @csrf

                    <div class="row">

                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group mt-2">
                                <label for="name" class="form-lavel">Package Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Package Name"
                                    required value="{{ old('name') ?? $cms_package->name }}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group mt-2">
                                <label for="name" class="form-lavel">Sort Desc</label>
                                <input type="text" name="sort_desc" class="form-control"
                                    placeholder="Package sort description" required
                                    value="{{ old('sort_desc') ?? $cms_package->sort_desc }}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group mt-2">
                                <label for="price" class="form-lavel">Pckage price</label>
                                <input type="text" name="price" class="form-control" placeholder="Package price"
                                    required value="{{ old('price') ?? $cms_package->price }}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group mt-2">
                                <label for="name" class="form-lavel">Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="" class="d-none">Select Status</option>
                                    <option @if ($cms_package->status) selected @endif value="1">Enabled
                                    </option>
                                    <option @if (!$cms_package->status) selected @endif value="0">Disabled
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group mt-2">
                                <label for="name" class="form-lavel">Show in home</label>
                                <select name="show_in_home" id="show_in_home" class="form-control">
                                    <option value="" class="d-none">Select Option</option>
                                    <option value="0" @if (!$cms_package->show_in_home) selected @endif>Disabled
                                    </option>
                                    <option value="1" @if ($cms_package->show_in_home) selected @endif>Enabled
                                    </option>
                                </select>

                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                            <div class="form-group mt-2">
                                <label for="name" class="form-lavel">Fecility</label>
                                <div class="facelitys">
                                    @for ($i = 0; $i < count($cms_package->benifit); $i++)
                                        @if ($i == 0)
                                            <div class="input-group mb-3 row_0">
                                                <input type="text" class="form-control" placeholder="Fecility"
                                                    aria-label="Fecility" aria-describedby="button-addon2" name="fecility[]"
                                                    required value="{{ $cms_package->benifit[$i] }}" />
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" onclick="appenRow()" type="button"
                                                        id="button-addon2"><i class="fas fa-plus-circle"></i></button>
                                                </div>
                                            </div>
                                        @else
                                            <div class="input-group mb-3 row_{{ $i }}">
                                                <input type="text" class="form-control" placeholder="Fecility"
                                                    aria-label="Fecility" aria-describedby="button-addon2" name="fecility[]"
                                                    required value="{{ $cms_package->benifit[$i] }}" />
                                                <div class="input-group-append">
                                                    <button class="btn btn-danger" onclick="removeRow({{ $i }})"
                                                        type="button" id="button-addon2"><i
                                                            class="fas fa-minus-circle"></i></button>
                                                </div>
                                            </div>
                                        @endif
                                    @endfor



                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center"></div>
                    <button type="submit" class="btn btn-bg-success hover-scale w-25 btn-color-white">Save</button>


                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        let i = "{{ count($cms_package->benifit) - 1 }}";

        function appenRow() {
            if (i < 5) {
                i++;

                let html = "";
                html += '<div class="input-group mb-3 row_' + i + '">';
                html += '<input type="text" name="fecility[]" class="form-control" placeholder="Fecility"';
                html += 'aria-label="" aria-describedby="button-addon2" required>';
                html += '<div class="input-group-append">';
                html += '<button class="btn btn-danger" onclick="removeRow(' + i + ')" type="button"';
                html += 'id="button-addon2"><i class="fas fa-minus-circle"></i></button>';
                html += '</div>';
                html += '</div>';


                $('.facelitys').append(html);
            } else {
                toastr.error("Can't use more then five facility");
            }
            console.log(i);
        }

        function removeRow(rowId) {

            $('.row_' + rowId).remove();
            i = i - 1;
            console.log(i);


        }
    </script>
@endsection
