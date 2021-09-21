@extends('cms.parent')

@section('title', 'create Permission')

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
                        <h4 class="card-title">Create Permission</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form id="create_form">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" class="form-control input-rounded" placeholder="Enter Name">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-primary" onclick="performStore()" >Save</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/crud.js') }}"></script>
    <script>
        function performStore() {
            var formData = new FormData();

            formData.append('name', document.getElementById('name').value);

            store('/panel/cms/permissions', formData);
        }
    </script>
@endsection
