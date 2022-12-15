@extends('layouts.app')

@section('content')
<button id='btnTest'>Test</button>
<script>
    $("#btnTest").on("click", function() {
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Your work has been saved',
        showConfirmButton: false,
        timer: 1500
        })
    });
</script>


@endsection
