<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{asset('backend/assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('backend/assets/js/scripts.bundle.js')}}"></script>
<script src="{{asset('backend/assets/plugins/global/axios.min.js')}}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{asset('backend/assets/js/custom/widgets.js')}}"></script>
<script src="{{asset('backend/assets/js/custom/apps/chat/chat.js')}}"></script>
<script src="{{asset('backend/assets/js/custom/modals/create-app.js')}}"></script>
<script src="{{asset('backend/assets/js/custom/modals/upgrade-plan.js')}}"></script>
<script src="{{asset('backend/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script src="{{asset('backend/assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>




@yield('js')
<script>
    $(document).ready( function () {
    $('table').DataTable({
    "language": {
    "lengthMenu": "Show _MENU_",
    },
    "dom":
    "<'row'" + "<'col-sm-6 d-flex align-items-center justify-conten-start'l>"
        + "<'col-sm-6 d-flex align-items-center justify-content-end'f>" + ">" + "<'table-responsive'tr>" + "<'row'"
        + "<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'i>"
        + "<'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>" + ">" });
});
    @if(Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.success("{{ session('message') }}");
    @endif

        @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.error("{{ session('error') }}");
    @endif

@if ($errors->any())
    @foreach ($errors->all() as $error)

        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.error("{{ $error }}");
    @endforeach
@endif
</script>
<!--end::Page Custom Javascript-->
<!--end::Javascript-->
