@extends('layouts.dashboard.dashboardMaster')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-10">
                <h3>Recent</h3>
                <table class="table table-dark table-striped">
                    <tr>
                        <th>Id</th>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Links</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                    @foreach ($navbars as $navbar)
                        <tr>
                            <td>{{ $navbar->id }}</td>
                            <td>{{ $navbar->user_id }}</td>
                            <td>{{ $navbar->name }}</td>
                            <td>{{ $navbar->links }}</td>
                            <td>{{ $navbar->status }}</td>
                            <td>{{ date('d F Y', strtotime($navbar->created_at)) }}</td>
                            <td class="d-flex justify-content-center">
                                <a class="btn btn-primary btn-sm mr-2" href="{{ route('navbar.edit', $navbar->id) }}">Edit</a>
                                <form action="{{ route('navbar.destroy' , $navbar->id) }}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
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