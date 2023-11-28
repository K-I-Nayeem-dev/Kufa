@extends('layouts.dashboard.dashboardMaster')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header"><h4>Recent Best Work Add</h4></div>
                <div class="card-body">
                    <form action="{{ route('recent.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input  class="form-control" name="title"></input>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <input type="text" class="form-control" name="description">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Banner Photo</label>
                            <input type="file" class="form-control" name="recent_photo">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Banner Status</label>
                            <select name="status" class="form-control">
                                <option value="active">Active</option>
                                <option value="deactive">Deactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Add Recent</button>
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
        'Best Work Upload',
        'Successfully!',
        'success'
        )
    </script>
    @endif
@endsection