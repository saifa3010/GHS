@extends('layouts.adminLayout')

@section("content")

@section('title',"Task")



<div class="col-12">
    <div class="card">

        <div class="card-body">
            <div style="width: 200px" class="mb-3">
                <label for="statusFilter">Filter by Status:</label>
                <select id="statusFilter" class="form-control custom-select">
                    <option value="">All</option>
                    <option value="Pending">Pending</option>
                    <option value="Accepted">Accepted</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Completed">Completed</option>
                </select>
            </div>

            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Worker</th>
                        <th>Date</th>
                        <th>Start time</th>
                        <th>End time</th>
                        <th>Total price</th>
                        <th>Status</th>


                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                    <tr>
                        <td>{{ $task->user->name }}</td>
                        <td>{{ $task->worker->firstName }} {{ $task->worker->lastName }}</td>
                        <td>{{ $task->date }}</td>
                        <td>{{ \Carbon\Carbon::parse($task->time)->format('g:i A') }}</td>
                        <td>{{ \Carbon\Carbon::parse($task->end_time)->format('g:i A') }}</td>
                        <td>{{ $task->date }}</td>
                        <td>
                            <form method="post" action="{{ route('tasks.updateStatus', ['id' => $task->id]) }}">
                                @csrf
                                @method('patch')
                                <select class="status-select form-control custom-select" name="status"  onchange="this.form.submit()">
                                    <option value="Pending" {{ $task->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="Accepted" {{ $task->status == 'Accepted' ? 'selected' : '' }}>Accepted</option>
                                    <option value="In Progress" {{ $task->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                    <option value="Completed" {{ $task->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                                </select>
                            </form>
                        </td>

                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>User Name</th>
                        <th>Worker</th>
                        <th>Date</th>
                        <th>Start time</th>
                        <th>End time</th>
                        <th>Total price</th>
                        <th>Status</th>

                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Initial display
        filterStatus();

        // Listen for changes in the status select element
        $('#statusFilter').change(function () {
            filterStatus();
        });

        function filterStatus() {
            // Get the selected status
            var selectedStatus = $('#statusFilter').val().toLowerCase();

            // Show/hide rows based on the selected status
            $('tbody tr').each(function () {
                var taskStatus = $(this).find('td:last select').val().toLowerCase();
                if (selectedStatus === '' || selectedStatus === 'all' || selectedStatus === taskStatus) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }
    });
</script>

@endsection
