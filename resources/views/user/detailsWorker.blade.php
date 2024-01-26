{{-- <link rel="stylesheet" href="{{ asset('assetsDashboard/dist/css/adminlte.min.css')}}"> --}}


@extends('layouts.userPagesLayout')

@section('content')




    <!-- Add more details as needed -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <!-- Main content -->
        <section class="content" style="margin: 50px">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div style="border-radius: 18px" class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid" style="border-radius: 50%;width:100px"
                                        src="{{ asset('images/' . $worker->image) }}" alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">
                                    <p>{{ $worker->firstName }} {{ $worker->lastName }}</p>
                                </h3>

                                <p class="text-muted text-center">{{ $worker->status }}</p>

                                <b>Price: </b> <a style="float: right"><small>JD</small>{{ $worker->price }}/hr</a>
                                <hr>
                                <b>Completed tasks: </b> <a style="float: right">543</a>

                                <hr>
                                <b>Ritng: </b> <a style="float: right">
                                    <div style="display: inline" class="rating-container">
                                        @for ($i = 1; $i <= round($averageRating); $i++)
                                            <label class="fa fa-star" title="{{ $i }} stars"
                                                style="color: #c59b08;"></label>
                                        @endfor
                                    </div>
                                </a>



                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div style="border-radius: 18px" class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#activity"
                                            data-toggle="tab">Informitions</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Reviews &
                                            Comments</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Booking</a>
                                    </li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">

                                        <!-- /.card-header -->
                                        <div class="card-body">

                                            <strong><i class="fas  fa-briefcase mr-1"></i> Profession</strong>

                                            <p class="text-muted">{{ $worker->category->name }}</p>
                                            <hr>
                                            <strong><i class="fas fa-address-card mr-1"></i> About Me</strong>

                                            <p class="text-muted">
                                                {{ $worker->aboutMe }}
                                            </p>

                                            <hr>

                                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                                            <p class="text-muted">{{ $worker->city }}</p>

                                            <hr>

                                            <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                                            <p class="text-muted">
                                            <p class="text-muted">
                                                {{ $worker->skillsExperience }}
                                            </p>
                                            </p>

                                            <hr>

                                            <strong><i class="far fa-image mr-1"></i> Some of my tasks</strong>
                                            <div id="slider-container" class="slider">
                                                @if (!empty($worker->work_image))
                                                    @foreach (json_decode($worker->work_image) as $image)
                                                        <div class="slide">
                                                            <img src="{{ asset('images/' . $image) }}" alt="Work Image">

                                                        </div>
                                                    @endforeach

                                                    <div onclick="prev()" class="control-prev-btn">
                                                        <i class="fas fa-arrow-left"></i>
                                                    </div>
                                                    <div onclick="next()" class="control-next-btn">
                                                        <i class="fas fa-arrow-right"></i>
                                                    </div>
                                            </div>


                                            <div class="overlay"></div>
                                        @else
                                            <p>No work images available.</p>
                                            @endif
                                            <!-- /.card-body -->
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="timeline">
                                        <!-- The timeline -->
                                        <div class="active tab-pane" id="activity">
                                            <!-- Post -->
                                            <div class="post">

                                                <form id="commentForm" action="{{ route('tasks.storeComment') }}"
                                                    method="post">
                                                    @csrf
                                                    <input type="hidden" name="worker_id" value="{{ $worker->id }}">

                                                    <div class="col">
                                                        <div class="rate comment-rating">
                                                            <input type="radio" id="star5" class="rate"
                                                                name="rating" value="5" />
                                                            <label for="star5" title="5 stars">5 stars</label>
                                                            <input type="radio" id="star4" class="rate"
                                                                name="rating" value="4" />
                                                            <label for="star4" title="4 stars">4 stars</label>
                                                            <input type="radio" id="star3" class="rate"
                                                                name="rating" value="3" />
                                                            <label for="star3" title="3 stars">3 stars</label>
                                                            <input type="radio" id="star2" class="rate"
                                                                name="rating" value="2" />
                                                            <label for="star2" title="2 stars">2 stars</label>
                                                            <input type="radio" id="star1" class="rate"
                                                                name="rating" value="1" />
                                                            <label for="star1" title="1 star">1 star</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <textarea name="comment" id="commentInput" class="form-control form-control-sm" placeholder="Add your comment"
                                                            required></textarea>
                                                    </div>
                                                    <button
                                                        style="font-size: 15px; width: 150px; float: right; margin-bottom: 10px"
                                                        type="button" onclick="submitComment()">Add Comment</button>
                                                </form>
                                                <div style="margin-top: 80px">
                                                    <hr>
                                                    @foreach ($worker->comments()->where('approved', true)->get() as $item)
                                                        <div class="user-block">
                                                            <img style="width: 30px; border-radius: 50%"
                                                                src="{{ asset('images/user.png') }}" alt="user image">
                                                            <span class="username">
                                                                <p style="display:inline">
                                                                    {{ optional($item->user)->name }}</p>
                                                            </span>

                                                            <span style="font-size: 13px" class="description">Shared
                                                                publicly -
                                                                {{ \Carbon\Carbon::parse($item->created_at)->format('l, M j') }}</span>
                                                        </div>
                                                        <div class="rated comment-rating">
                                                            @for ($i = 1; $i <= $item->rating; $i++)
                                                                <label class="star-rating-complete"
                                                                    title="{{ $i }} stars">{{ $i }}
                                                                    stars</label>
                                                            @endfor
                                                        </div>
                                                        <!-- /.user-block -->
                                                        <div class="col">
                                                            <p style="margin-top: 60;">{{ $item->body }}</p>
                                                        </div>
                                                        <hr>
                                                    @endforeach
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->

                                    <div class="tab-pane" id="settings">

                                        @if (session('error'))
                                            <script>
                                                Swal.fire({
                                                    title: "Oops...",
                                                    text: "{{ session('error') }}",
                                                    icon: "error",
                                                    timer: 5000, // Adjust the timer as needed
                                                    showConfirmButton: false
                                                });
                                            </script>
                                        @endif


                                        <form class="form-horizontal" action="{{ route('tasks.store') }}" method="post"
                                            onsubmit="return validateForm()">
                                            @csrf

                                            <label for="date">Date:</label>
                                            @php
                                                $minDate = now()->format('Y-m-d');
                                                $maxDate = now()
                                                    ->addDays(29)
                                                    ->format('Y-m-d');
                                            @endphp
                                            <div class="form-group">
                                                <input style="margin-bottom: 15px" type="date" name="date"
                                                    class="form-control" id="datePicker" value="{{ old('date') }}"
                                                    min="{{ $minDate }}" max="{{ $maxDate }}" required><br>
                                            </div>
                                            <input type="hidden" name="selectedDate" id="selectedDate"
                                                value="{{ old('selectedDate') ?? now()->format('Y-m-d') }}">

                                            <label for="startTime">Start Time:</label>
                                            <div class="form-group">
                                                <select name="start_time" class="form-control" id="startTimeSelect"
                                                    required>
                                                    @foreach ($startTimes as $value => $label)
                                                        <option value="{{ $value }}">{{ $label }}</option>
                                                    @endforeach
                                                </select><br>
                                            </div>

                                            <label for="end_time">Choose End Time:</label>
                                            <div class="form-group">
                                                <select class="form-control" name="end_time" id="end_time" required>
                                                    <option value="2">2 hours</option><br>
                                                    <option value="3">3 hours</option>
                                                    <option value="4">4 hours</option>
                                                    <option value="full_day">Full Day</option>
                                                </select>
                                            </div>
                                            <input type="hidden" name="worker_id" value="{{ $worker->id }}">
                                            <div class="form-group">
                                                <button style="margin-left:-3px;margin-top:80px"
                                                    type="submit">Booking</button>
                                            </div>
                                        </form>



                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection


<script>
    function submitComment() {
        // Your form submission logic using AJAX
        $.ajax({
            type: 'POST',
            url: "{{ route('tasks.storeComment') }}",
            data: $('#commentForm').serialize(),
            success: function(data) {
                // Assuming your server returns a success indicator in the response
                if (data.success) {
                    // Set a session variable or use local storage to mark that the user has commented
                    @php
                        session(['commented' => true]);
                    @endphp

                    // Show success message using SweetAlert
                    Swal.fire({
                        title: "Commented successfully",
                        icon: "success",
                        timer: 5000, // Adjust the timer as needed
                        showConfirmButton: false
                    });

                    // Clear the comment input
                    document.getElementById("commentInput").value = "";

                    // You can also update the message container if needed
                    document.getElementById("commentMessageContainer").innerHTML =
                        "<p>Your comment has been successfully added.</p>";
                } else {
                    // Show error message using SweetAlert
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Your comment has been added and will appear soon",
                        showConfirmButton: false,
                        timer: 5000,

                    });
                }
            },
            error: function(error) {
                console.error('Error:', error);
                // Handle the error if needed
            }
        });
    }
</script>


<script src="{{ asset('assetsDashboard/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assetsDashboard/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assetsDashboard/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('assetsDashboard/dist/js/demo.js') }}"></script>

<script>
    function prev() {
        document.getElementById('slider-container').scrollLeft -= 270;
    }

    function next() {
        document.getElementById('slider-container').scrollLeft += 270;
    }


    $(".slide img").on("click", function() {
        $(this).toggleClass('zoomed');
        $(".overlay").toggleClass('active');
    })
</script>
