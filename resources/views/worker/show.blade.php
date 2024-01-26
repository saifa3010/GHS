
@extends('layouts.workerLayout')

@section('title', 'Workers')

@section('content')

@if ($message = Session::get('success'))
    <script>
        Swal.fire({
            position: "center",
            icon: "success",
            title: "Data has been saved successfully",
            showConfirmButton: false,
            timer: 2500
        }).then(() => {
            // This code will run after the alert has been closed
            // You can add any additional actions you want here
            console.log('SweetAlert closed');
        });
</script>
@elseif ($message = Session::get('deleted'))
<script>
    Swal.fire({
        position: "center",
        icon: "success",
        title: "Deleted successfully",
        showConfirmButton: false,
        timer: 2500
      }).then(() => {
            // This code will run after the alert has been closed
            // You can add any additional actions you want here
            console.log('SweetAlert closed');
        });;
    </script>
@endif

<p><strong>Name:</strong> {{ $worker->firstName }}</p>



<script>
    function confirmDelete(serviceId) {
        Swal.fire({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Trigger the form submission when confirmed
                document.getElementById('delete-form-' + serviceId).submit();
            }
        });
    }
</script>



@endsection
