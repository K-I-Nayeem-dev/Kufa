@extends('layouts.dashboard.dashboardMaster')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-10">
                <h3>Recent</h3>
                <table class="table table-dark table-striped">
                    <tr>
                        <th class="text-center">Image</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    @foreach ($brands as $brand)
                        <tr class="text-center">
                            <td><img class="rounded" width="150" height="150" src="{{ asset('uploads/website_components_photos/brands_photos') }}/{{ $brand->brand_img }}" alt=""></td>
                            <td>{{ $brand->status }}</td>
                            <td>
                                <a class="btn btn-danger btn-sm" href="{{ route('brand.destroy', $brand->id) }}">Delete</a>
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
    @if (session('brand_remove'))
    <script>
        Swal.fire(
        'Brand Imgage Remove',
        'Successfully!',
        'success'
        )
    </script>
    @endif
@endsection