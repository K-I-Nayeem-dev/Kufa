@extends('layouts.dashboard.dashboardMaster')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="card" style="background-color: black; color: white">
                    <div class="card-header font-weight-bold">Admin Information</div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered" style="color: white">
                            <tr>
                                <th>Name</th>
                                <td>{{ auth()->user()->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ auth()->user()->email }}</td>
                            </tr>
                            <tr>
                                <th>Created At</th>
                                <td>{{ auth()->user()->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Updated At</th>
                                <td>{{ auth()->user()->updated_at }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection