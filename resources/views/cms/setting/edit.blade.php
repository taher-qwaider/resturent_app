@extends('cms.parent')

@section('title', 'Edit Setting')

@section('styles')

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
                        <h4 class="card-title">Edit Setting</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form id="create_form">
                                <div class="form-group">
                                    <label for="subject">Subject</label>
                                    <input type="text" id="subject" class="form-control input-rounded" value="{{ $setting->subject }}">
                                </div>
                                <div class="form-group">
                                    <label for="key">key</label>
                                    <input type="text" id="key" class="form-control input-rounded" value="{{ $setting->key }}">
                                </div>
                                <div class="form-group">
                                    <label for="value">Value</label>
                                    <input type="text" id="value" class="form-control input-rounded" value="{{ $setting->value }}">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-primary" onclick="performStore({{ $setting->id }})" >Save</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/crud.js') }}"></script>
    <script>
        function performStore(id) {
            let data={
                key:document.getElementById('key').value,
                value:document.getElementById('value').value,
                subject:document.getElementById('subject').value,
            };
            update('/panel/cms/settings/'+id, data);
        }
    </script>
@endsection
