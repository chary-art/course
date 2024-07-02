
@extends('admin.layouts.app')

@section('content')
    Hello this is AdminDashboard

    <div class="row">
        <div class="col-lg-12 col-md-12 col-12">
            <div class="border-bottom pb-3 mb-3 d-lg-flex justify-content-between align-items-center">
                <div class="mb-3 mb-lg-0">
                    <h1 class="mb-0 h2 fw-bold">{{__('messages.Dashboard')}}</h1>
                </div>
                <div class="d-flex">
                    <div class="input-group me-3">
{{--                        <input class="form-control flatpickr" type="text" placeholder="Select Date"--}}
{{--                               aria-describedby="basic-addon2">--}}

                        <span class="input-group-text" id="basic-addon2"><i
                                class="fe fe-calendar"></i></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--    @include('admin.layouts.partials.card')--}}
@endsection
