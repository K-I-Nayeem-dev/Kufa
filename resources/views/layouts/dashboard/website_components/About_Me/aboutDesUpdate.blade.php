@php
    use Carbon\Carbon;
@endphp
@extends('layouts.dashboard.dashboardMaster')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <form action="{{ route('about_des_updated', $aboutDes->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="d-flex justify-content-center flex-column">
                        <div class="text-center">
                            <img src="{{ asset('uploads/website_components_photos/about_img') }}/{{ $aboutDes->about_img }}" alt="">
                        </div>
                        <div class="mb-3 w-100">
                            <label class="form-label">About Image</label>
                            <input type="file" class="form-control" name="about_img"></input>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">About Description</label>
                        <textarea class="form-control" name="about_education_description" cols="30" rows="4">{{ $aboutDes->about_education_description }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">About Status</label>
                        <select name="about_des_status" class="form-control">
                            @if($aboutDes->about_des_status == 'active')
                                <option value="active" selected>Active</option>
                                <option value="deactive">Deactive</option>
                            @else
                                <option value="active" >Active</option>
                                <option value="deactive" selected>Deactive</option>
                            @endauth
                        </select>
                    </div>


                    <button type="submit" class="btn btn-primary btn-sm">Add About Description</button>

                </form>
            </div>
        </div>
    </div>
@endsection

@section('sweetAlert')
    @if (session('add_about'))
    <script>
        Swal.fire(
        'About Added Successfully',
        'Successfully!',
        'success'
        )
    </script>
    @endif
    @if (session('add_update'))
    <script>
        Swal.fire(
        'About Update Successfully',
        'Successfully!',
        'success'
        )
    </script>
    @endif
@endsection