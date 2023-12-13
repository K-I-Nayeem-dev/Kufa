@extends('layouts.dashboard.dashboardMaster')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header"><h4>Navbar</h4></div>
                <div class="card-body">
                    <form action="{{ route('navbar.update', $navbar->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input  class="form-control" name="name" value="{{ $navbar->name }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Link</label>
                            <input type="text" class="form-control" name="links" value="{{ $navbar->links }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Facts Status</label>
                            <select name="status" class="form-control">
                                @if($navbar->status == 'active')
                                    <option value="active" selected>Active</option>
                                    <option value="deactive">Deactive</option>
                                @else
                                    <option value="active" >Active</option>
                                    <option value="deactive" selected>Deactive</option>
                                @endauth
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Edit Navbar</button>
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