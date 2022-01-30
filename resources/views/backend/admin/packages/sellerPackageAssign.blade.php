@extends('backend.admin.layouts.layout')
@section('content')
<div id="kt_content_container" class="container-fluid">
    <div class="card  card-shadow-sm">
        <div class="card-header d-flex justify-content-between">
            <div class="card-toolbar">
                <a href="{{route('admin.package.sellerPackage')}}" class="btn btn-secondary btn-sm"><i
                        class="fas fa-arrow-left"></i></a>
            </div>
            <div class="card-title text-left">
                Seller Packages Assign
            </div>
            <div class="">
                &nbsp;
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('admin.package.sellerPackageDedicate')}}" method="post" id="sellerPackageAssignForm">
                @csrf
                <input type="hidden" name="seller" id="sellerID" value="{{$data['sellerId']->id}}">
                <div class="col-12 col-sm-12 col-ml-8 col-lg-8 col-xl-8">
                    <div class="row">
                        <label class="docs-page-title" for="">Select Packages</label>
                        @foreach($data['package'] as $package)
                        @if($package->name !== 'default' and $package->name !== 'default-encryption')

                        <div class="col-12 col-sm-12 col-ml-6 col-lg-6 col-xl-6 my-3">
                            <div class="form-check form-check-custom form-check-solid my-2">
                                <input class="form-check-input" type="checkbox" name="packages[]"
                                    value="{{$package->id}}" id="activeInput_{{$package->id}}"
                                    onclick="activeInput({{$package->id}});" />
                                <label class="form-check-label" for="activeInput_{{$package->id}}">
                                    {{$package->name}}
                                </label>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-ml-6 col-lg-6 col-xl-6">
                            <label for="amountInput{{$package->id}}"></label>
                            <input type="text" id="amountInput{{$package->id}}" name="amounts[]"
                                class="form-control form-control-sm" disabled>
                        </div>

                        @endif
                        @endforeach
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <button class="btn btn-success w-50">Save</button>
                </div>


            </form>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    function activeInput(id) {
            document.getElementById('activeInput_'+id).onchange = function() {
                document.getElementById('amountInput'+id).disabled = !this.checked;
            };
        }

        var userid=document.getElementById('sellerID').value;
        $(function() {
            console.log(userid);
            axios.get("{{route('admin.package.sellerPackageById')}}", {
                params: {
                    id:userid
                }
            })
            .then(function (response) {
                $('input[type="checkbox"]').prop('checked',false);
                var jsonData=response.data.package;
                for (let i = 0; i < jsonData.length; i++) {
                    const element = jsonData[i];
                    console.log(element.pivot);
                    $('#activeInput_'+element.pivot.packages_id).prop('checked',true);
                    $('#amountInput'+element.pivot.packages_id).prop('disabled',false).val(element.pivot.amount);

                }
            })
            .catch(function (error) {
            console.log(error);
            })
            .then(function () {
            // always executed
            });
        });
        $('#sellerPackageAssignForm').submit(function(e){
            e.preventDefault();
            var packages=$('input:checked').map(function(){
      return $(this).val();
    }).get();
            var amount=$('input[name="amounts[]"]').map(function(){
      return $(this).val();
    }).get();

    var amountArrayWithOutNull=$.grep(amount,function(n){ return n == null || n });

    console.log(amountArrayWithOutNull);
    console.log(packages);
            axios.post("{{route('admin.package.sellerPackageDedicate')}}",{

                    packages:packages,
                    amounts:amountArrayWithOutNull,
                    seller:userid

            }).then(function(response){
                console.log();
                if (response.data.status == "success") {

                    toastr.options =
                    {
                        "closeButton" : true,
                        "progressBar" : true
                    }
                    toastr.success(response.data.message);
                }

            }).catch(function(error){
                console.log(error);
            }).then(function(){
                // always executed
            });
        });
</script>
@endsection
