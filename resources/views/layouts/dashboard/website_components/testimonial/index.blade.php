@extends('layouts.dashboard.dashboardMaster')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-10">
                <h3>Recent</h3>
                <table class="table table-dark table-striped">
                    <tr>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Qoute</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    @foreach ($testimoni as $testi)
                        <tr>
                            <td>{{ $testi->name }}</td>
                            <td>{{ $testi->designation }}</td>
                            <td>{{ $testi->qoute }}</td>
                            <td><img class="rounded" width="100" height="100" src="{{ asset('uploads/website_components_photos/testimonial_photos') }}/{{ $testi->testimoni_photo }}" alt=""></td>
                            <td>{{ $testi->status }}</td>
                            <td class="d-flex justify-content-center align-items-center">
                                <a class="btn btn-primary btn-sm" href="{{ route('testimonial.edit', $testi->id) }}">Edit</a>
                                <a class="btn btn-danger btn-sm" href="{{ route('testimonial.destroy', $testi->id) }}">Delete</a>
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
    @if (session('testimonial_remove'))
    <script>
        Swal.fire(
        'Testimonial Remove',
        'Successfully!',
        'success'
        )
    </script>
    @endif
@endsection