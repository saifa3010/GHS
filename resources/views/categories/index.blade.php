@extends('layouts.adminLayout')

@section('title', 'Categories')

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

<div class="col-12">
    <div class="card">
        <div class="card-header">
            <form action="{{ route('categories.create') }}">
                <button style="margin:-5px;" class="btn btn-primary">Add categories, dear admin</button>
            </form>
        </div>

        <div class="card-body">


            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Service</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td><img src="/images/{{ $item->image }}" width="100px"></td>
                            <td>{{ $item->service->name }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                <form style="display: inline" id="delete-form-{{ $item->id }}" action="{{ route('categories.destroy', $item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <i  class="fas fa-trash-alt fa-lg text-danger cursor-pointer mr-2" onclick="confirmDelete('{{ $item->id }}')" title="Delete"></i>
                                </form>



                                                            <!-- Edit Icon -->
                                <a href="{{ route('categories.edit', $item->id) }}" title="Edit">
                                    <i class="fas fa-edit fa-lg  text-primary mr-2"></i>
                                </a>

                                <!-- Show Icon -->
                                <a href="{{ route('categories.show', $item->id) }}" title="Show">
                                    <i class="fas fa-info-circle fa-lg  text-info"></i>
                                </a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Actions</th>
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


