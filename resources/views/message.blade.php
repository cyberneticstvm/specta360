<script>
    @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}"
        switch(type){
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
                break;
            case 'info':
                toastr.info("{{ Session::get('message') }}");
                break;
            default:
                toastr.info("{{ Session::get('message') }}");
        }   
    @endif
</script>