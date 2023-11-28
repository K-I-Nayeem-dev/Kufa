@extends('layouts.dashboard.dashboardMaster')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header"><h4>Recent Best Work Edit</h4></div>
                <div class="card-body">
                    <form action="{{ route('recent.update', $recent->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input  class="form-control" name="title" value="{{ $recent->title }}"></input>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <input type="text" class="form-control" name="description" value="{{ $recent->description }}">
                        </div>
                        <div class="row d-flex justify-content-center align-items-center">
                            <div class="col-lg-6">
                                <label class="form-label">Banner Photo</label>
                                <input type="file" class="form-control" name="recent_photo">
                            </div>
                            <div class="col-lg-6 text-center">
                                <img width="200" height="250" src="{{ asset('uploads/website_components_photos/recent_photos') }}/{{ $recent->recent_photo }}" alt="">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">About Status</label>
                            <select name="status" class="form-control">
                                @if($recent->status == 'active')
                                    <option value="active" selected>Active</option>
                                    <option value="deactive">Deactive</option>
                                @else
                                    <option value="active" >Active</option>
                                    <option value="deactive" selected>Deactive</option>
                                @endauth
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Edit Recent</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('sweetAlert')
    @if (session('add_recent'))
    <script>
        Swal.fire(
        'Update About Description & Image Successfully',
        'Successfully!',
        'success'
        )
    </script>
    @endif
@endsection