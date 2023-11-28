@extends('layouts.dashboard.dashboardMaster')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-10">
                <h3>Recent</h3>
                <table class="table table-dark table-striped">
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    @foreach ($recents as $recent)
                        <tr>
                            <td>{{ $recent->title }}</td>
                            <td>{{ $recent->description }}</td>
                            <td><img width="100" height="150" src="{{ asset('uploads/website_components_photos/recent_photos') }}/{{ $recent->recent_photo }}" alt=""></td>
                            <td>{{ $recent->status }}</td>
                            <td class="d-flex justify-content-center">
                                <a class="btn btn-primary btn-sm mr-2" href="{{ route('recent.edit', $recent->id) }}">Edit</a>
                                <a class="btn btn-danger btn-sm" href="{{ route('recent.destroy', $recent->id) }}">Delete</a>
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
    @if (session('recent_remove'))
    <script>
        Swal.fire(
        'Recent Remove',
        'Successfully!',
        'success'
        )
    </script>
    @endif
@endsection