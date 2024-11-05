@extends('layouts.app')
@section('content')
    @include('global.topnav')
	@include('global.sidemenu')
    <div id="wrapper">
        <div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">HelpDesk</a></li>
                            <li class="breadcrumb-item active">Users</li>
                        </ol>
	                    <h4 class="page-title">Users</h4>
                    </div>
                    <div class="row">
                        <div class="col-xl-3">
                            <div class="card border border-primary">
                                <div class="card-body text-primary">
                                    <h4 class="header-title float-left">No. of Active Users</h4>
                                    <h1 class="float-right">{{ $usersActiveCount }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="card border border-danger">
                                <div class="card-body text-danger">
                                    <h4 class="header-title float-left">No. of Inactive Users</h4>
                                    <h1 class="float-right">{{ $usersInactiveCount }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card-box">
                                <div class="button-list mb-3">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUser">Add User</button>
                                    @include('modal.user')
                                </div>
                                <div class="table-responsive" data-pattern="priority-columns" style="overflow:hidden">
                                    <div class="sticky-table-header">
                                        <table class="table table-bordered dataTable no-footer table-striped">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($users as $user)
                                                <tr class="text-center">
                                                    <td>{{ $user->name }}</td>
                                                    <td>{{ $user->role }}</td>
                                                    <td>
                                                        @if($user->status == '1')
                                                            <span class="badge badge-success">Active</span>
                                                        @else
                                                            <span class="badge badge-danger">Inactive</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('user.edit', ['id'=>$user->id]) }}" class="btn btn-xs btn-default btn-edit"><i class="mdi mdi-pencil"></i></a>
                                                        <a data-module="user" id="{{ $user->id }}" data-name="{{ $user->name }}" class="btn btn-xs btn-default btn-delete"><i class="text-danger mdi mdi-close-circle"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script type="text/javascript">

    $(document).ready(function() {

        $('.table').DataTable({
            keys: true
        });

        var success = "{!! session('success') !!}";
        var error = "{!! session('error') !!}";

        if(success) {
            swal({
                position: 'middle-center',
                type: 'success',
                title: success,
                showConfirmButton: false,
                timer: 1000
            })
        }

        if(error) {
            swal({
                position: 'middle-center',
                type: 'error',
                title: error,
                showConfirmButton: false,
                timer: 1000
            })  
        }

    });
</script>
@endpush