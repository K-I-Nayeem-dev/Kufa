@extends('layouts.dashboard.dashboardMaster')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">Banner</div>
                    <div class="card-body">
                        <table class="table table-dark table-striped">
                            <tr>
                                <th>Banner Photo</th>
                                <th>Banner Descriptions</th>
                                <th>Banner Social Links</th>
                                <th>Banner Status</th>
                                <th>Actions</th>
                            </tr>
                            @foreach ($banners as $banner)
                                <tr>
                                    <td><img width="100" height="150" src="{{ asset('uploads/website_components_photos/banner_photos') }}/{{ $banner->banner_photo }}" alt=""></td>
                                    <td>{{ Str::limit($banner->banner_descriptions, 50) }}</td>
                                    <td>{{ $banner->banner_social_links }}</td>
                                    <td>{{ $banner->banner_status}}</td>
                                    <td class="d-flex">
                                        <a class="btn mr-2 btn-primary btn-sm" href="{{ route('bannerEdit', $banner->id) }}">Edit</a>
                                        <a class="btn btn-danger btn-sm" href="{{ route('banner.destroy', $banner->id) }}">Delete</a>
                                        {{-- <a class="btn btn-danger btn-sm" href="{{ route('about_delete') }}">Delete</a> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('sweetAlert')
    @if (session('banner_remove'))
    <script>
        Swal.fire(
        'Banner Remove',
        'Successfully!',
        'success'
        )
    </script>
    @endif
@endsection