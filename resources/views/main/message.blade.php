<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
@if (!empty(session('error')))
<div class="alert alert-danger" role="alert">
    {{ session('error') }}
</div>
@endif
@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success!',
        text: `{!! session('success') !!}`,
        timer: 3000, // 2 seconds
        // showConfirmButton: false,
    });
</script>
@endif
@if (!empty(session('warning')))
<div class="alert alert-warning" role="alert">
    {{ session('warning') }}
</div>
@endif

@if (!empty(session('info')))
<div class="alert alert-info" role="alert">
    {{ session('info') }}
</div>
@endif

@if (!empty(session('light')))
<div class="alert alert-light" role="alert">
    {{ session('light') }}
</div>
@endif

@if (session('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif


@if (!empty(session('secondary')))
<div class="alert alert-secondary" role="alert">
    {{ session('secondary') }}
</div>
@endif

@if (!empty(session('primary')))
<div class="alert alert-primary" role="alert">
    {{ session('primary') }}
</div>
@endif

@if (!empty(session('payment-error')))
<div class="alert alert-danger" role="alert">
    {{ session('payment-error') }}
</div>
@endif