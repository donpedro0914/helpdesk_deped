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
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Infinity</a></li>
                            <li class="breadcrumb-item active">Users</li>
                        </ol>
	                    <h4 class="page-title">Users</h4>
                    </div>
                    <div class="row">
                        <div class="col-xl-3">
                            <div class="card border border-primary">
                                <div class="card-body text-primary">
                                    <h4 class="header-title float-left">No. of Users Online</h4>
                                    <h1 class="float-right">0</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="card border border-danger">
                                <div class="card-body text-danger">
                                    <h4 class="header-title float-left">No. of Suspended Users</h4>
                                    <h1 class="float-right">0</h1>
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
                                                    @if(($user->position == 'Installer Operative') || ($user->position == 'Installer Manager'))
                                                    <td>{{ $user->name }} - {{ $user->installer_name }}</td>
                                                    @else
                                                    <td>{{ $user->name }}</td>
                                                    @endif
                                                    <td>{{ $user->position }}</td>
                                                    <td>
                                                        @if($user->status = '1')
                                                            <span class="badge badge-success">Active</span>
                                                        @else
                                                            <span class="badge badge-danger">Suspended</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('admin.user.edit', ['id'=>$user->user_id]) }}" class="btn btn-xs btn-default btn-edit"><i class="mdi mdi-pencil"></i></a>
                                                        <a data-module="user" id="{{ $user->user_id }}" data-name="{{ $user->name }}" class="btn btn-xs btn-default btn-delete"><i class="text-danger mdi mdi-close-circle"></i></a>
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


    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#storeLogoPreview').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

    $(document).ready(function() {

        $('#storeLogo').change(function() {
            readURL(this);
        });

        $('.table').DataTable({
            keys: true
        });

        $('#employeePosition').on('change', function () {
            var position = $('#employeePosition').val();
            if (position == 'Installer Manager') {
                $('#installer_operative').show();
                $('#installer_operative_io').hide();
                $('#installer_surveyor_io').hide();
                $('#installer_operatives').attr('name', 'installer_operatives[]');
                $('#installer_name').show();
                $('#installer_name_fld').attr('name', 'installer_name');
            } else if(position == 'Installer Operative') {
                $('#installer_name').show();
                $('#installer_name_fld').attr('name', 'installer_name');
                $('#installer_operative').hide();
                $('#installer_operatives').removeAttr('name');
            } else if(position == 'Installer Admin') {
                $('#installer_operative_io').show();
                $('#installer_surveyor_io').show();
                $('#installer_operative').hide();
                $('#installer_operatives_io').attr('name', 'installer_operatives_io[]');
                $('#installer_name').show();
                $('#installer_name_fld').attr('name', 'installer_name');
            } else if (position == 'Surveyor') {
                $('#installer_operative_io').hide();
                $('#installer_surveyor_io').hide();
                $('#installer_operative').hide();
                $('#installer_name').show();
                $('#installer_name_fld').attr('name', 'installer_name');
            } else {
                $('#installer_operative_io').hide();
                $('#installer_surveyor_io').hide();
                $('#installer_operative').hide();
                $('#installer_name').hide();
            }
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