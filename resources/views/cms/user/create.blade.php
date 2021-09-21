@extends('cms.parent')

@section('title', 'create Chef')

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
                        <h4 class="card-title">Create Chef</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form id="create_form">

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" class="form-control input-rounded" placeholder="Enter Name">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" class="form-control input-rounded" placeholder="Enter Email">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <label for="image">Image</label>
                                        <input type="file" id="image" class="custom-file-input">
                                        <label class="custom-file-label">Choose Profile Image</label>
                                    </div>
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
            formData.append('email', document.getElementById('email').value);
            formData.append('image', document.getElementById('image').files[0]);

            store('/panel/cms/users', formData);
        }
    </script>
@endsection
