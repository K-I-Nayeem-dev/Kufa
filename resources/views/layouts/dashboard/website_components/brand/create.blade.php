@extends('layouts.dashboard.dashboardMaster')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header"><h4>Brands Add</h4></div>
                <div class="card-body">
                    <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Brand Photo</label>
                            <input type="file" class="form-control" name="brand_img">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Brand Status</label>
                            <select name="status" class="form-control">
                                <option value="active">Active</option>
                                <option value="deactive">Deactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Add Brands</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('sweetAlert')
    @if (session('add_brands'))
    <script>
        Swal.fire(
        'Brands Add Successfully',
        'Successfully!',
        'success'
        )
    </script>
    @endif
@endsection