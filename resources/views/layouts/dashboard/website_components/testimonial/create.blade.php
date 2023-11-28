@extends('layouts.dashboard.dashboardMaster')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header"><h4>Testimonial Add</h4></div>
                <div class="card-body">
                    <form action="{{ route('testimonial.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input  class="form-control" name="name"></input>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Designation</label>
                            <input type="text" class="form-control" name="designation">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Qoute</label>
                            <textarea type="text" class="form-control" name="qoute" cols="30" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Testimoni Photo</label>
                            <input type="file" class="form-control" name="testimoni_photo">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Testimonial Status</label>
                            <select name="status" class="form-control">
                                <option value="active">Active</option>
                                <option value="deactive">Deactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Add Testimonial</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('sweetAlert')
    @if (session('add_testimonial'))
    <script>
        Swal.fire(
        'Testimonoal Add Successfully',
        'Successfully!',
        'success'
        )
    </script>
    @endif
@endsection