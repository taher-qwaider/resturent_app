@extends('cms.parent')

@section('title', 'Edit Reservation')

@section('styles')
    <link href="{{ asset('cms/vendor/clockpicker/css/bootstrap-clockpicker.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('cms/vendor/pickadate/themes/default.css') }}">
    <link rel="stylesheet" href="{{ asset('cms/vendor/pickadate/themes/default.date.css') }}">
    <link href="{{ asset('cms/vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}" rel="stylesheet">

@endsection

@section('main-content')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Hi, welcome back!</h4>
                    <span class="ml-1">Element</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Form</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Element</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-xl-6 col-xxl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Reservation</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form id="create_form">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" class="form-control input-rounded" value="{{ $reservation->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" class="form-control input-rounded" value="{{ $reservation->email }}l">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="number" id="phone" class="form-control input-rounded" value="{{ $reservation->phone }}">
                                </div>
                                <div class="col-xl-3 col-xxl-6 col-md-6">
                                    <label>Date</label>
                                    <input type="date" class="form-control" value="{{ $reservation->date }}" id="mdate">
                                </div>
                                <div class="col-md-6 col-xl-3 col-xxl-6 mt-4 mt-lg-0">
                                    <label>time</label>
                                    <div class="input-group">
                                        <input class="form-control" id="single-input" value="{{ $reservation->time }}">

                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <label for="message">Message</label>
                                    <textarea id="message" class="form-control">{{ $reservation->message }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="num_of_people">Number of People</label>
                                    <input type="number" id="num_of_people" class="form-control input-rounded" value="{{ $reservation->num_of_people }}">
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-primary" onclick="performStore({{ $reservation->id }})" >Save</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('scripts')

    <script src="{{ asset('cms/vendor/clockpicker/js/bootstrap-clockpicker.min.js') }}"></script>
    <script src="{{ asset('cms/vendor/pickadate/picker.js') }}"></script>
    <script src="{{ asset('cms/vendor/pickadate/picker.time.js') }}"></script>
    <script src="{{ asset('cms/vendor/pickadate/picker.date.js') }}"></script>
    <script src="{{ asset('cms/js/plugins-init/clock-picker-init.js') }}"></script>
    <script src="{{ asset('cms/js/plugins-init/pickadate-init.js') }}"></script>

    <script src="{{ asset('js/crud.js') }}"></script>
    <script>
        function performStore(id) {
            let data = {
                name:document.getElementById('name').value,
                email:document.getElementById('email').value,
                phone:document.getElementById('phone').value,
                date:document.getElementById('mdate').value,
                time:document.getElementById('single-input').value,
                message:document.getElementById('message').value,
                num_of_people:document.getElementById('num_of_people').value,
            }

            update('/panel/cms/reservations/'+id, data);
        }
    </script>
@endsection
