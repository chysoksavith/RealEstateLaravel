@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <div class="main-wrapper">
        <!-- partial -->
        <div class="page-content">
            <div class="row profile-body">
                <!-- left wrapper start -->
                <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
                    <div class="card rounded">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <div class="prod">
                                    <img class="imagePro"
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

                                <h6 class="card-title">Change Password</h6>
                                <form class="forms-sample" method="POST" action="{{ route('admin.update.password') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="exampleInputUsername1" class="form-label">Old Password</label>
                                        <input type="password" class="form-control @error('old_password') is-invalid @enderror" id="old_password" autocomplete="off" name="old_password">
                                        @error('old_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputUsername1" class="form-label">New Password</label>
                                        <input type="password" class="form-control @error('new_password') is-invalid @enderror" id="new_password" autocomplete="off" name="new_password">
                                        @error('new_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputUsername1" class="form-label">Confirm New Password</label>
                                        <input type="password" class="form-control" id="new_password_confirmation" autocomplete="off" name="new_password_confirmation">
                                    </div>
                                    <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    @endsection
