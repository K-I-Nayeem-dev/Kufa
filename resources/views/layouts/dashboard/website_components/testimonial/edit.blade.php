@extends('layouts.dashboard.dashboardMaster')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header"><h4>Testimonial Edit</h4></div>
                <div class="card-body">
                    <form action="{{ route('testimonial.update', $testi->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input  class="form-control" name="name" value="{{ $testi->name }}"></input>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Designation</label>
                            <input type="text" class="form-control" name="designation" value="{{ $testi->designation }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Qoute</label>
                            <textarea type="text" class="form-control" name="qoute" cols="30" rows="4">{{ $testi->qoute }}</textarea>
                        </div>
                        <div class="row d-flex justify-content-between">
                            <div class="col-lg-9">
                                <label class="form-label">Testimoni Photo</label>
                                <input type="file" class="form-control" name="testimoni_photo">
                            </div>
                            <div class="col-lg-3">
                                <img class="rounded" width="100" height="100" src="{{ asset('uploads/website_components_photos/testimonial_photos') }}/{{ $testi->testimoni_photo }}" alt="">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Testimonial Status</label>
                            <select name="status" class="form-control">
                                @if($testi->status == 'active')
                                    <option value="active" selected>Active</option>
                                    <option value="deactive">Deactive</option>
                                @else
                                    <option value="active" >Active</option>
                                    <option value="deactive" selected>Deactive</option>
                                @endauth
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Update Testimonial</button>
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
    @if (session('add_testimonial_update'))
    <script>
        Swal.fire(
        'Testimonoal Update Successfully',
        'Successfully!',
        'success'
        )
    </script>
    @endif
@endsection