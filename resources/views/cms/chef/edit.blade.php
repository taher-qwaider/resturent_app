@extends('cms.parent')

@section('title', 'Edit Chef')

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
                        <h4 class="card-title">Edit Chef</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form id="create_form">

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" class="form-control input-rounded" value="{{ $chef->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="degree">Degree</label>
                                    <input type="text" id="degree" class="form-control input-rounded" value="{{ $chef->degree }}">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="custom-file">
                                        <label for="image">Image</label>
                                        <input type="file" id="image" class="custom-file-input">
                                        <label class="custom-file-label">Choose Image</label>
                                    </div>
                                </div>
                                <div class="repeater">
                                    <div data-repeater-list="group">
                                        @foreach($chef->socials as $social)
                                            <div data-repeater-item class="col mt-2 mt-sm-0">

                                                <label name="name" value="A">Name</label>
                                                <input type="text" name="name" value="{{ $social->name }}"/>

                                                <label name="url" value="A">URL</label>
                                                <input type="text" name="url" value="{{ $social->url }}"/>

                                                <input data-repeater-delete type="button" class="btn btn-danger" value="Delete"/>
                                            </div>
                                        @endforeach
                                    </div>
                                    <input data-repeater-create type="button" class="btn btn-success" value="Add"/>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-primary" onclick="performStore({{ $chef->id }})" >Save</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/src/jquery.input.js') }}"></script>
    <script src="{{ asset('js/src/jquery.repeater.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.repeater').repeater({
                initEmpty: false,
                defaultValues: {
                    // 'text-input': ''
                },
                show: function () {
                    $(this).slideDown();
                },
                hide: function (deleteElement) {
                    $(this).slideUp(deleteElement);
                },
                ready: function (setIndexes) {
                    // $dragAndDrop.on('drop', setIndexes);
                },
                isFirstItemUndeletable: false
            })
        });
    </script>
    <script src="{{ asset('js/crud.js') }}"></script>
    <script>
        function performStore(id) {
            var formData = new FormData();

            formData.append('name', document.getElementById('name').value);
            formData.append('degree', document.getElementById('degree').value);
            formData.append('image', document.getElementById('image').files[0]);
            let values =$('.repeater').repeaterVal().group;
            for (var i=0; i<values.length; i++){
                formData.append('socials['+i+'][name]', $('.repeater').repeaterVal().group[i].name);
                formData.append('socials['+i+'][url]', $('.repeater').repeaterVal().group[i].url);
            }

            store('/panel/cms/chefs/'+id+'/update', formData);
        }
    </script>
@endsection
