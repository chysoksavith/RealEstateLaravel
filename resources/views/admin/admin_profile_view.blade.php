@extends('admin.admin_dashboard')
@section('admin')
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <div class="main-wrapper">
        <!-- partial -->
        <div class="page-content">
            <div class="row profile-body">
                <!-- left wrapper start -->
                <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
                    <div class="card rounded">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <div>
                                    <img class="wd-100 rounded-circle"
                                        src="{{ !empty($profileData->photo) ? url('uploade/admin_images/' . $profileData->photo) : url('uploade/login.png') }}"
                                        alt="profile">
                                    <span class="h4 ms-3 text-white">{{ $profileData->name }}</span>
                                </div>

                            </div>
                            <div class="mt-3">
                                <label class="tx-11 fw-bolder mb-0 text-uppercase">User Name: </label>
                                <p class="text-muted">{{ $profileData->username }}</p>
                            </div>
                            <div class="mt-3">
                                <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                                <p class="text-muted">{{ $profileData->email }}</p>
                            </div>
                            <div class="mt-3">
                                <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
                                <p class="text-muted">{{ $profileData->phone }}</p>
                            </div>
                            <div class="mt-3">
                                <label class="tx-11 fw-bolder mb-0 text-uppercase">Address:</label>
                                <p class="text-muted">{{ $profileData->address }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- middle wrapper start -->
                <div class="col-md-8 col-xl-8 middle-wrapper">
                    <div class="row">
                        <div class="card">
                            <div class="card-body">

                                <h6 class="card-title">Update Admin Profile</h6>

                                <form class="forms-sample" method="POST" action="{{route('admin.profile.store')}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputUsername1" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="exampleInputUsername1"
                                            autocomplete="off" value="{{ $profileData->name }}" name="name">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputUsername1" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="exampleInputUsername1"
                                            autocomplete="off" value="{{ $profileData->username }}" name="username">
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                            value="{{ $profileData->email }}" name="email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputUsername1" class="form-label">Phone</label>
                                        <input type="number" class="form-control" id="exampleInputUsername1"
                                            autocomplete="off" value="{{ $profileData->phone }}" name="phone">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputUsername1" class="form-label">Address</label>
                                        <input type="text" class="form-control" id="exampleInputUsername1"
                                            autocomplete="off" value="{{ $profileData->address }}" name="address">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputUsername1" class="form-label">Photo</label>
                                        <input type="file" name="photo" class="form-control" id="image"
                                            value="{{ $profileData->username }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputUsername1" class="form-label"></label>
                                        <img id="showImage" class="wd-100 rounded-circle"
                                            src="{{ !empty($profileData->photo) ? url('uploade/admin_images/' . $profileData->photo) : url('uploade/login.png') }}"
                                            alt="profile">
                                    </div>
                                    <button type="submit" class="btn btn-primary me-2">Save Changer</button>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#image').change(function(e) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#showImage').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files[0]); // Fix typo here
                });
            });
        </script>

    @endsection
