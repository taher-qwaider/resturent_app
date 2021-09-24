@extends('cms.parent')

@section('title', 'index User Permissions')

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
                        <h4 class="card-title">User Permissions</h4>
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
                                    @foreach($roles as $role)
                                        <tr>
                                            <td style="color: black;">{{ $role->id }}</td>
                                            <td style="color: black;">{{ $role->name }}</td>
                                            <td style="color: black;">{{ $role->guard_name }}</td>
                                            <td>
                                                <input type="checkbox" value="{{ $role->id }}" onclick="updatePermission({{ $role->id }})" @if($role->active) checked @endif>
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
                        {{ $roles->links() }}
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
            axios.post('/panel/cms/user/'+ {!! $user->id !!}+'/roles', {
                role_id:id,
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
