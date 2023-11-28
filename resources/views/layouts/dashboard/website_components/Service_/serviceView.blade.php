@extends('layouts.dashboard.dashboardMaster')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-12">
            <table class="table table-dark table-striped">
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Icon</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                @foreach ($services as $service)
                    <tr>
                        <td>{{ $service->title }}</td>
                        <td>{{ $service->description }}</td>
                        <td style="font-size: 45px"><i class="{{ $service->icon }}"></i></td>
                        <td>{{ $service->status }}</td>
                        <td class="d-flex justify-content-center">
                            <a class="btn btn-primary btn-sm mr-2" href="{{ route('servicesEdit', $service->id) }}">Edit</a>
                            <a class="btn btn-danger btn-sm" href="{{ route('services.destroy', $service->id) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection

@section('sweetAlert')
    @if (session('add_icon'))
    <script>
        Swal.fire(
        'icon Added Successfully',
        'Successfully!',
        'success'
        )
    </script>
    @endif
    @if (session('serive_remove'))
    <script>
        Swal.fire(
        'Service Remove',
        'Successfully!',
        'success'
        )
    </script>
    @endif
@endsection