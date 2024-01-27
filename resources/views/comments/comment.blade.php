@extends('layouts.adminLayout')

@section("content")

@section('title',"Comment")


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

<div class="col-12">
    <div class="card">

        <div class="card-body">


            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Worker</th>
                        <th>Comment</th>
                        <th>Approval Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comments as $comment)
                    <tr>
                        <td>{{ $comment->user->name }}</td>
                        <td>{{ $comment->worker->firstName }} {{ $comment->worker->lastName }}</td>
                        <td>{{ $comment->body }}</td>
                        <td>
                            <form action="{{ route('approve.comment', $comment->id) }}" method="post">
                                @csrf
                                <button class="btn btn-success" type="submit">Approve</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>User Name</th>
                        <th>Worker</th>
                        <th>Comment</th>
                        <th>Approval Option</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>



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
