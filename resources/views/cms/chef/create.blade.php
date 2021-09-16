@extends('cms.parent')

@section('title', 'create Meal')

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
                        <h4 class="card-title">Create Meal</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form id="create_form">
                                @foreach(config('app.available_locales') as $local)
                                    <div class="form-group">
                                        <label for="title_{{ $local }}">Title ({{ $local }})</label>
                                        <input type="text" id="title_{{ $local }}" class="form-control input-rounded" placeholder="Enter Title">
                                    </div>
                                    <div class="form-group">
                                        <label for="desc_{{ $local }}">Description ({{ $local }})</label>
                                        <textarea type="text" id="desc_{{ $local }}" class="form-control input-rounded" placeholder="Enter Description"></textarea>
                                    </div>
                                @endforeach
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" id="price" class="form-control input-rounded" placeholder="Enter Price">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <label for="image">Image</label>
                                        <input type="file" id="image" class="custom-file-input">
                                        <label class="custom-file-label">Choose Image</label>
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
            @foreach(config('app.available_locales') as $local)
                formData.append('title_{{ $local }}', document.getElementById('title_'+'{{ $local }}').value);
                formData.append('desc_{{ $local }}', document.getElementById('desc_'+'{{ $local }}').value);
            @endforeach
            formData.append('price', document.getElementById('price').value);
            formData.append('image', document.getElementById('image').files[0]);

            store('/panel/cms/events', formData);
        }
    </script>
@endsection
