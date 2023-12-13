@extends('layouts.dashboard.dashboardMaster')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header"><h4>Navbar</h4></div>
                <div class="card-body">
                    <form action="{{ route('navbar.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input  class="form-control" name="name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Link</label>
                            <input type="text" class="form-control" name="links">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Banner Status</label>
                            <select name="status" class="form-control">
                                <option value="active">Active</option>
                                <option value="deactive">Deactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Add Navbar</button>
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