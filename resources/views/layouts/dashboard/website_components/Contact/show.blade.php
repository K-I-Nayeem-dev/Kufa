@extends('layouts.dashboard.dashboardMaster')

@section('content')
    <div class="container d-flex justify-content-center">
        <div class="row mt-5">
            <div class="card">
                <div class="card-header">
                    Email Form 
                    '{{ $contact->name }}'
                </div>
                <div class="card-body">
                    <h4 class="mb-3">Email :  {{ $contact->email }}</h4>
                    <h4>Message :  {{ $contact->message }}</h4>
                    <a href="{{ route('contact') }}" class="btn btn-success btn-sm mt-4">Back to Emails</a>
                </div>
            </div>
        </div>
    </div>
@endsection