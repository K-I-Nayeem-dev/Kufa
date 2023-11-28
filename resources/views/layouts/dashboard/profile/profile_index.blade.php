@extends('layouts.dashboard.dashboardMaster')

@section('content')

            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">App</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Profile</a></li>
					</ol>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="profile card card-body px-3 pt-3 pb-0">
                            <div class="profile-head">
                                <div class="photo-content">
                                    <div class="cover-photo"></div>
                                </div>
                                <div class="profile-info">
									<div class="profile-photo">
                                        @if (Auth::user()->profile_photo)
                                            <img src="{{ asset('uploads/profile_photos') }}/{{ Auth::user()->profile_photo }}" class="img-fluid rounded-circle" alt="">
                                        @else
                                            <img src="{{ asset('dashboard_assests') }}/images/profile/profile.png" class="img-fluid rounded-circle" alt="">
                                        @endif
									</div>
									<div class="profile-details">
										<div class="profile-name px-3 pt-2">
											<h4 class="text-primary mb-0">{{ Auth::user()->name }}</h4>
											<p>UX / UI Designer</p>
										</div>
										<div class="profile-email px-2 pt-2">
											<h4 class="text-muted mb-0">{{ Auth::user()->email }}</h4>
											<p>Email</p>
										</div>
										<div class="dropdown ml-auto">
											<a href="#" class="btn btn-primary light sharp" data-toggle="dropdown" aria-expanded="true"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></a>
											<ul class="dropdown-menu dropdown-menu-right">
												<li class="dropdown-item"><i class="fa fa-user-circle text-primary mr-2"></i> View profile</li>
												<li class="dropdown-item"><i class="fa fa-users text-primary mr-2"></i> Add to close friends</li>
												<li class="dropdown-item"><i class="fa fa-plus text-primary mr-2"></i> Add to group</li>
												<li class="dropdown-item"><i class="fa fa-ban text-primary mr-2"></i> Block</li>
											</ul>
										</div>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header"><h4>Name Change</h4></div>
                            <div class="card-body">
                                <form action="{{ route('nameChanged') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <input style="color: black" type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" >
                                    </div>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <button type="submit" class="btn btn-primary btn-sm">Update Name</button>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header"><h4>Profile Photo Upload</h4></div>
                            <div class="card-body">
                                <form action="{{ route('profilePhotoUpload') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                        <div class="mb-3">
                                            <input type="file" class="form-control" name="profile_photo">
                                        </div>
                                    <button type="submit" class="btn btn-primary btn-sm">Update profile Photo</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header"><h4>Email Changed</h4></div>
                            <div class="card-body">
                                <form action="{{ route('emailupload') }}" method="POST">
                                    @csrf
                                        <div class="mb-3">
                                            <input style="color: black" type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">
                                        </div>
                                    <button type="submit" class="btn btn-primary btn-sm">Update Email</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header"><h4>Password Changed</h4></div>
                            <div class="card-body">
                                    <form action="{{ route('passwordChanged') }}" method="POST">
                                        @csrf
                                            <div class="mb-3">
                                                <label>Current Password</label>
                                                <input style="color: black" type="password" class="form-control" name="current_password">
                                            </div>
                                            @error('old_password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                            <div class="mb-3">
                                                <label>New Password</label>
                                                <input style="color: black" type="password" class="form-control" name="password">
                                            </div>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            
                                            <div class="mb-3">
                                                <label >Confirm Password</label>
                                                <input style="color: black" type="password" class="form-control" name="password_confirmation">
                                            </div>
                                        <button type="submit" class="btn btn-primary btn-sm">Change Password</button>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


@endsection

@section('sweetAlert')

    @if (session('name_updated'))
        <script>
            Swal.fire(
            'Name Update Successfully',
            'Successfully!',
            'success'
            )
        </script>
    @endif

    @if (session('email_updated'))
        <script>
            Swal.fire(
            'Email Update Successfully',
            'Successfully!',
            'success'
            )
        </script>
    @endif

    @if (session('photo_updated'))
        <script>
            Swal.fire(
            'Photo Update Successfully',
            'Successfully!',
            'success'
            )
        </script>
    @endif

    @if (session('password_updated'))
        <script>
            Swal.fire(
            'Password Update',
            'Successfully!',
            'success'
            )
        </script>
    @endif

    @if (session('password_updated_failed'))
        <script>
            Swal.fire(
            'password update Failed',
            'Error!',
            'error'
            )
        </script>
    @endif
    @if (session('password_match_failed'))
        <script>
            Swal.fire(
            "password Don't Matched",
            'Error!',
            'error'
            )
        </script>
    @endif

@endsection