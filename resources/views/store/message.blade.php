<script>
    const toast1 = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });
</script>
@if(session()->has('success'))
<script>
toast1.fire({
    icon: 'success',
    title: "{{ session()->get('success') }}",
    color: 'green'
})
</script>
@endif
@if(session()->has('error'))
<script>
toast1.fire({
    icon: 'error',
    title: "{{ session()->get('error') }}",
    color: 'red'
})
</script>
@endif