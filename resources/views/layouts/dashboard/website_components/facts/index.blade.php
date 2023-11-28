@extends('layouts.dashboard.dashboardMaster')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-lg-10">
            <h3>Recent</h3>
            <table class="table table-dark table-striped">
                <tr>
                    <th>Title</th>
                    <th>Number</th>
                    <th>Icon</th>
                    <th>Status</th>
                    <th>Created Date</th>
                    <th>Created Month</th>
                    <th>Created Year</th>
                    <th>Actions</th>
                </tr>
                @foreach ($fonts as $font)
                    <tr>
                        <td>{{ $font->title }}</td>
                        <td>{{ $font->number }}</td>
                        <td style="font-size: 45px"><i class="{{ $font->icon }}"></i></td>
                        <td>{{ $font->status }}</td>
                        <td>{{ $font->created_at->format('d') }}</td>
                        <td>{{ $font->created_at->format('M') }}</td>
                        <td>{{ $font->created_at->format('Y') }}</td>
                        <td class="d-flex">
                            <a class="btn mr-2 btn-primary btn-sm" href="{{ route('facts.edit', $font->id) }}">Edit</a>
                            <a class="btn btn-danger btn-sm" href="{{ route('facts.destroy', $font->id) }}">Delete</a>
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
    @if (session('fact_remove'))
    <script>
        Swal.fire(
        'Facts Remove',
        'Successfully!',
        'success'
        )
    </script>
    @endif
@endsection