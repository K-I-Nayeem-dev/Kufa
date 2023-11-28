@extends('layouts.dashboard.dashboardMaster')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header"><h4>Banner Add</h4></div>
                    <div class="card-body">
                        <form action="{{ route('banner_upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Banner Photo</label>
                                <input type="file" class="form-control" name="banner_photo">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Banner Descriptions</label>
                                <textarea  class="form-control" name="banner_descriptions" id="" cols="30" rows="3"></textarea>
                            </div>
                            {{-- <div class="mb-3">
                                <label class="form-label">Banner Social Links</label>
                                <input type="text" class="form-control" name="banner_social_links">
                            </div> --}}
                            <div class="mb-3">
                                <label class="form-label">Banner Status</label>
                                <select name="banner_status" class="form-control">
                                    <option value="active">Active</option>
                                    <option value="deactive">Deactive</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Add Banner</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('sweetAlert')
    @if (session('banner_added'))
    <script>
        Swal.fire(
        'Banner Add',
        'Successfully!',
        'success'
        )
    </script>
    @endif
@endsection