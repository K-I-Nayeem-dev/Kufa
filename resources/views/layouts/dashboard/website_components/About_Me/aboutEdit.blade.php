@extends('layouts.dashboard.dashboardMaster')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-10">
                <h3>About</h3>
                <table class="table table-dark table-striped">
                    <tr>
                        <th>About Education Title</th>
                        <th>About Education</th>
                        <th>About Education Progress Bar</th>
                        <th>About Status</th>
                        <th>Actions</th>
                    </tr>
                    @foreach ($abouts as $about)
                        <tr>
                            <td>{{ $about->about_education_title }}</td>
                            <td>{{ $about->about_education }}</td>
                            <td>{{ $about->about_education_progress_bar }}</td>
                            <td>{{ $about->about_status }}</td>
                            <td class="d-flex justify-content-center">
                                <a class="btn btn-primary btn-sm mr-2" href="{{ route('about_edited', $about->id) }}">Edit</a>
                                <a class="btn btn-danger btn-sm" href="{{ route('about.destroy', $about->id) }}">Delete</a>
                                {{-- <a class="btn btn-danger btn-sm" href="{{ route('about_delete') }}">Delete</a> --}}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-lg-10">
                <h4>About Description</h4>
                <table class="table table-dark table-striped">
                    <tr>
                        <th>About Education Description</th>
                        <th>About Image</th>
                        <th>About Des Status</th>
                        <th>Actions</th>
                    </tr>
                    @foreach ($aboutDesImg as $abouts)
                        <tr>
                            <td>{{ $abouts->about_education_description }}</td>
                            <td>{{ $abouts->about_img }}</td>
                            <td>{{ $abouts->about_des_status }}</td>
                            <td class="d-flex justify-content-center">
                                <a class="btn btn-primary btn-sm mr-2" href="{{ route('about_des_update', $abouts->id) }}">Edit</a>
                                <a class="btn btn-danger btn-sm" href="{{ route('about.des.destroy', $abouts->id) }}">Delete</a>
                                {{-- <a class="btn btn-danger btn-sm" href="{{ route('about_delete') }}">Delete</a> --}}
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection


@section('sweetAlert')
    @if (session('about_remove'))
    <script>
        Swal.fire(
        'About Remove',
        'Successfully!',
        'success'
        )
    </script>
    @endif
    @if (session('about_dec_remove'))
    <script>
        Swal.fire(
        'About Des & Img Remove',
        'Successfully!',
        'success'
        )
    </script>
    @endif
@endsection