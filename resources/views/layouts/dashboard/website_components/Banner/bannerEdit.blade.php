@extends('layouts.dashboard.dashboardMaster')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header"><h4>Banner Edit</h4></div>
                    <div class="card-body">
                        <form action="{{ route('banner_update', $banner->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <img src="{{ asset('uploads/website_components_photos/banner_photos/') }}/{{ $banner->banner_photo }}">
                                <label class="form-label">Banner Photo</label>
                                <input type="file" class="form-control mt-3" name="banner_photo">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Banner Descriptions</label>
                                <textarea  class="form-control" name="banner_descriptions" id="" cols="30" rows="3">{{ $banner->banner_descriptions }}</textarea>
                            </div>
                            {{-- <div class="mb-3">
                                <label class="form-label">Banner Social Links</label>
                                <input type="text" class="form-control" name="banner_social_links">
                            </div> --}}
                            <div class="mb-3">
                                <label class="form-label">Banner Status</label>
                                <select name="banner_status" class="form-control">
                                    @if($banner->banner_status == 'active')
                                        <option value="active" selected>Active</option>
                                        <option value="deactive">Deactive</option>
                                    @else
                                        <option value="active" >Active</option>
                                        <option value="deactive" selected>Deactive</option>
                                    @endif
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Update Banner</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('sweetAlert')
    @if (session('banner_update'))
    <script>
        Swal.fire(
        'Banner Update Successfully',
        'Successfully!',
        'success'
        )
    </script>
    @endif
@endsection