@extends('layouts.dashboard.dashboardMaster')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-11">
                <h3>Contact Mails</h3>
                <table class="table table-dark table-striped">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Actions</th>
                    </tr>
                    @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->message }}</td>
                            <td class="d-flex justify-content-center">
                                <a class="btn btn-primary btn-sm mr-2" href="{{ route('contact.details', $contact->id) }}">Details</a>
                                <a class="btn btn-danger btn-sm" href="{{ route('contact.remove', $contact->id) }}">Remove</a>
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
    @if (session('contact_remove'))
    <script>
        Swal.fire(
        'Contact Remove',
        'Successfully!',
        'success'
        )
    </script>
    @endif
@endsection