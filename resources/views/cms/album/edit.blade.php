@extends('cms.parent')

@section('title', 'create Album')

@section('styles')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.css">
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
                        <h4 class="card-title">Create Album</h4>
                    </div>
                    <div class="card-body">
                        <div class="basic-form">
                            <form id="create_form">
                                <div class="form-group">
                                    <label for="title">Title </label>
                                    <input type="text" id="title" class="form-control input-rounded" placeholder="Enter Title">
                                </div>
                                <div class="container">
                                    <div class="row" style="clear: both;margin-top: 18px;">
                                        <div class="col-12">
                                            <div class="dropzone" id="file-dropzone"></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer">
{{--                        <button type="button" class="btn btn-primary" onclick="performStore()" >Save</button>--}}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/min/dropzone.min.js"></script>
    <script>
        Dropzone.options.fileDropzone = {
            url: '{{ route('image.store') }}',
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            maxFilesize: 8,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            removedfile: function(file)
            {
                // var name = file.upload.filename;
                // console.log(file.id);
                $.ajax({
                    type: 'delete',
                    url: '{{ route('image.remove') }}',
                    data: { "_token": "{{ csrf_token() }}", id: file.id},
                    success: function (data){
                        console.log("File has been successfully removed!!");
                        showToaster(data.message, true);
                    },
                    error: function(e) {
                        console.log(e);
                    }});
                var fileRef;
                return (fileRef = file.previewElement) != null ?
                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
            },
            success: function (file, response) {
                showToaster(response.message, true);
            },
            init : function (){
                @if(isset($album->images))
                    @foreach($album->images as $image)
                        var file = {name: '{!! $image->id !!}', id:'{!! $image->id !!}'};
                        this.options.addedfile.call(this, file);
                        this.options.thumbnail.call(this, file, 'http://127.0.0.1:8000/storage/'+'{!! $image->path !!}');
                        this.emit("complete", file);
                    @endforeach
                @endIf
            }
        };
    </script>
    <script src="{{ asset('js/crud.js') }}"></script>
    <script>
        function performStore() {
            let data={
                @foreach(config('app.available_locales') as $local)
                    title_{{ $local }}:document.getElementById('title_'+'{{ $local }}').value,
                @endforeach
            };
            store('/panel/cms/categories', data);
        }
    </script>
@endsection
