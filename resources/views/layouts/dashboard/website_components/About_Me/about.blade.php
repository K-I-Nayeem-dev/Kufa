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
                    <form action="{{ route('about_education') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label  class="form-label">About Educations Years</label>
                            <br>
                            <div class="row">
                                @for ($year = 2000; $year <= Carbon::now()->year; $year++)
                                    <div class="col-lg-2">
                                        <input  type="radio" name="about_education"  value="{{ $year }}"> {{ $year }}
                                    </div>
                                @endfor
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">About Educations Title</label>
                            <input class="form-control" name="about_education_title"></input>
                        </div>

                        <div class="mb-3">
                            <label for="customRange1" class="form-label">About Educations progress Bar</label>
                            <div>
                                <input type="range"  name="about_education_progress_bar" class="form-range w-100" id="customRange1">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">About Status</label>
                            <select name="about_status" class="form-control">
                                <option value="active">Active</option>
                                <option value="deactive">Deactive</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary btn-sm">Add About</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">About Image & Description</div>
                <div class="card-body">
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
            </div>
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
@endsection