@extends('cms.parent')

@section('title', 'index Role Permissions')

@section('styles')
{{--    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">--}}
{{--    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">--}}
@endsection

@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Role Permissions</h4>
                    </div>
                    <div class="card-body">
                        <div>
                            <table class="table table-bordered" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Guard Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($permissions as $permission)
                                        <tr>
                                            <td style="color: black;">{{ $permission->id }}</td>
                                            <td style="color: black;">{{ $permission->name }}</td>
                                            <td style="color: black;">{{ $permission->guard_name }}</td>
                                            <td>
                                                <input type="checkbox" value="{{ $permission->id }}" onclick="updatePermission({{ $permission->id }})" @if($permission->active) checked @endif>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Guard Name</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        {{ $permissions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script src="{{ asset('js/crud.js') }}"></script>

    <script>
        function updatePermission(id){
            axios.post('/panel/cms/role/'+ {!! $role->id !!}+'/permissions', {
                permission_id:id,
                // active:document.getElementById
            })
                .then(function (response) {
                    // handle success
                    console.log(response.data);
                    showToaster(response.data.message, true);
                })
                .catch(function (error) {
                    // handle error
                    console.log(error.response.data);
                    showToaster(error.response.data.message, false);
                })
        }

</script>
@endsection
