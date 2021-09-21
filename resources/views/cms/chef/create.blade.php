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
                                    <label for="degree">Degree</label>
                                    <input type="text" id="degree" class="form-control input-rounded" placeholder="Enter Degree">
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
                                        <div data-repeater-item class="col mt-2 mt-sm-0">
                                            <label name="name" value="A">Name</label>
                                            <input type="text" name="name" value="A"/>
                                            <label name="url" value="A">URL</label>
                                            <input type="text" name="url" value="A"/>
                                            <input data-repeater-delete type="button" class="btn btn-danger" value="Delete"/>
                                        </div>
                                        <div data-repeater-item class="col mt-2 mt-sm-0">
                                            <input type="text" name="text-input" value="B"/>
                                            <input type="text" name="text-input" value="B"/>
                                            <input data-repeater-delete type="button" class="btn btn-danger" value="Delete"/>
                                        </div>
                                    </div>
                                    <input data-repeater-create type="button" class="btn btn-success" value="Add"/>
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
    <script src="{{ asset('js/src/jquery.input.js') }}"></script>
    <script src="{{ asset('js/src/jquery.repeater.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.repeater').repeater({
                // (Optional)
                // start with an empty list of repeaters. Set your first (and only)
                // "data-repeater-item" with style="display:none;" and pass the
                // following configuration flag
                initEmpty: true,
                // (Optional)
                // "defaultValues" sets the values of added items.  The keys of
                // defaultValues refer to the value of the input's name attribute.
                // If a default value is not specified for an input, then it will
                // have its value cleared.
                defaultValues: {
                    'text-input': ''
                },
                // (Optional)
                // "show" is called just after an item is added.  The item is hidden
                // at this point.  If a show callback is not given the item will
                // have $(this).show() called on it.
                show: function () {
                    $(this).slideDown();
                },
                // (Optional)
                // "hide" is called when a user clicks on a data-repeater-delete
                // element.  The item is still visible.  "hide" is passed a function
                // as its first argument which will properly remove the item.
                // "hide" allows for a confirmation step, to send a delete request
                // to the server, etc.  If a hide callback is not given the item
                // will be deleted.
                hide: function (deleteElement) {
                    // if(confirm('Are you sure you want to delete this element?')) {
                        $(this).slideUp(deleteElement);
                    // }
                },
                // (Optional)
                // You can use this if you need to manually re-index the list
                // for example if you are using a drag and drop library to reorder
                // list items.
                ready: function (setIndexes) {
                    // $dragAndDrop.on('drop', setIndexes);
                },
                // (Optional)
                // Removes the delete button from the first list item,
                // defaults to false.
                isFirstItemUndeletable: true
            })
        });
    </script>
    <script src="{{ asset('js/crud.js') }}"></script>
    <script>
        function performStore() {
            var formData = new FormData();

            formData.append('name', document.getElementById('name').value);
            formData.append('degree', document.getElementById('degree').value);
            formData.append('image', document.getElementById('image').files[0]);
            let values =$('.repeater').repeaterVal().group;
            for (var i=0; i<values.length; i++){
                formData.append('socials['+i+'][name]', $('.repeater').repeaterVal().group[i].name);
                formData.append('socials['+i+'][url]', $('.repeater').repeaterVal().group[i].url);
            }

            store('/panel/cms/chefs', formData);
        }
    </script>
@endsection
