@php
    use Carbon\Carbon;
@endphp
@extends('layouts.dashboard.dashboardMaster')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header"><h4>Add About Me</h4></div>
                <div class="card-body">
                    <form action="{{ route('about_update', $about->id) }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label  class="form-label">About Educations Years</label>
                            <br>
                            <div class="row">
                                @for ($year = 2000; $year <= Carbon::now()->year; $year++)
                                    <div class="col-lg-2">
                                        <input  type="radio" name="about_education" {{ $about->about_education == $year ? 'checked' : ''}}  value="{{ $year }}"> {{ $year }}
                                    </div>
                                @endfor
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">About Educations Title</label>
                            <input class="form-control" name="about_education_title" value="{{ $about->about_education_title }}"></input>
                        </div>

                        <div class="mb-3">
                            <label for="customRange1" class="form-label">About Educations progress Bar</label>
                            <div>
                                <input type="range" value="{{ $about->about_education_progress_bar }}"  name="about_education_progress_bar" class="form-range w-100" id="customRange1">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">About Status</label>
                            <select name="about_status" class="form-control">
                                @if($about->about_status == 'active')
                                    <option value="active" selected>Active</option>
                                    <option value="deactive">Deactive</option>
                                @else
                                    <option value="active" >Active</option>
                                    <option value="deactive" selected>Deactive</option>
                                @endauth
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm">Update About</button>
                        <a class="btn btn-primary btn-sm" href="{{ route('about_edit') }}">Back To About</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
            <form action="{{ route('about_education_description') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">About Image</label>
                    <input type="file" class="form-control" name="about_img"></input>
                </div>

                <div class="mb-3">
                    <label class="form-label">About Description</label>
                    <textarea class="form-control" name="about_education_description" cols="30" rows="4"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">About Des & Img Status</label>
                    <select name="about_des_status" class="form-control">
                        <option value="active">Active</option>
                        <option value="deactive">Deactive</option>
                    </select>
                </div>


                <button type="submit" class="btn btn-primary btn-sm">Add About Description</button>

            </form>
        </div>
    </div> --}}
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