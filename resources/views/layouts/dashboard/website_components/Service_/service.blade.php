@extends('layouts.dashboard.dashboardMaster')

@section('content')
    <style>
        #fonts{
            height: 350px;
            overflow-y: scroll;
            overflow-x: hidden;
            
        }
        #fonts::-webkit-scrollbar{ 
            width: 10px;
        }
        #fonts::-webkit-scrollbar-track {
            background-color: transparent;
        }
        #fonts::-webkit-scrollbar-thumb {
            box-shadow: inset 0 0 10px red;
            border-radius: 5px
        }
    </style>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header"><h4>Add Services</h4></div>
                    <div class="card-body">
                        <form action="{{ route('service_store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" name="service_title" >
                            </div>	
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="service_description" id="" cols="30" rows="4"></textarea>
                            </div>
                            <div class="mb-3">
                                <div class="row d-flex align-items-center  mb-3">
                                    <div class="col-lg-3 text-center">
                                        <label class="form-label">Select Font Icon</label>
                                    </div>
                                    <div class="col-lg-7">
                                        <input style="color: black" type="text" class="form-control" name="service_icon">
                                    </div>
                                    <div class="col-lg-2 set_icon text-center">
                                        <i style="font-size: 45px; color: black"></i>
                                    </div>
                                </div>
                                    <div id="fonts" class="row my-2">
                                        @foreach ($fonts as $font)
                                            <div class="col-lg-2 icons">
                                                <p class="btn btn-rounded btn-primary btn sm m-3"><i style="font-size: 25px" class="{{ $font }}"></i></p>
                                            </div>
                                            @endforeach
                                    </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Service Status</label>
                                <select name="service_status" class="form-control">
                                    <option value="active">Active</option>
                                    <option value="deactive">Deactive</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('Js/custom.js') }}"></script>
@endpush

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
@endsection

