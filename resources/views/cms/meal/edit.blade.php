@extends('cms.parent')

@section('title', 'Edit Meal')

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
                        <h4 class="card-title">Edit Meal</h4>
                        <div>
                            <button class="btn btn-primary" type="button" onclick="updateStatus({{ $meal->id }})">Add to Spacial</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form id="create_form">
                                <div class="form-group">
                                    <label>Select Category (select one):</label>
                                    <select class="form-control" id="category">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @foreach(config('app.available_locales') as $local)
                                    <div class="form-group">
                                        <label for="name_{{ $local }}">Name ({{ $local }})</label>
                                        <input type="text" id="name_{{ $local }}" class="form-control input-rounded" value="{{ $meal->translate($local)->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="desc_{{ $local }}">Description ({{ $local }})</label>
                                        <input type="text" id="desc_{{ $local }}" class="form-control input-rounded" value="{{ $meal->translate($local)->desc }}">
                                    </div>
                                @endforeach
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" id="price" class="form-control input-rounded" value="{{ $meal->price }}">
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
                formData.append('name_{{ $local }}', document.getElementById('name_'+'{{ $local }}').value);
                formData.append('desc_{{ $local }}', document.getElementById('desc_'+'{{ $local }}').value);
            @endforeach
            formData.append('price', document.getElementById('price').value);
            formData.append('category', document.getElementById('category').value);
            formData.append('image', document.getElementById('image').files[0]);

            update('/panel/cms/meals/'+{{ $meal->id }}+'/update', formData);
        }
        function updateStatus(id){
            store('/panel/cms/meals/'+id+'/updateStatus', {});
        }
    </script>
@endsection
