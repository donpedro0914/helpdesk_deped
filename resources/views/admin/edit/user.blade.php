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
                            <li class="breadcrumb-item">User</li>
                            <li class="breadcrumb-item active">{{ $user->name }}</li>
                        </ol>
	                    <h4 class="page-title">{{ $user->name }}</h4>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card-box">
                                <form action="{{ route('admin.user.update', ['id'=>$user->id]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-12 col-xs-12">
                                            <h5>Basic Information</h5>
                                            <hr>
                                        </div>
                                        <div class="form-group col-md-12 col-xs-12">
                                            <label>Full Name</label>
                                            <input type="text" name="name" class="form-control" value="{{ $user->name }}"/>
                                        </div>
                                        <div class="form-group col-md-12 col-xs-12">
                                            <label>E-mail Address</label>
                                            <input type="text" name="email" class="form-control" value="{{ $user->email }}"/>
                                        </div>
                                        <div class="form-group col-md-12 col-xs-12">
                                            <label>Role</label>
                                            @php
                                            $role = array(
                                                'Teacher/Staff' => 'Teacher/Staff',
                                                'Supervisor/Manager' => 'Supervisor/Manager',
                                                'HelpDesk Agent' => 'HelpDesk Agent'
                                            );
                                            @endphp
                                            {{ Form::select('role', $role, $user->role, array('class' => 'form-control')) }}
                                        </div>
                                        <div class="form-group col-md-12 col-xs-12">
                                            <label>Status</label>
                                            @php
                                                $opt = array(
                                                    '0' => 'Suspend',
                                                    '1' => 'Active'
                                                );
                                            @endphp
                                            {{ Form::select('status', $opt, $user->status, array('class' => 'form-control')) }}
                                        </div>
                                        <div class="form-group col-md-12 col-xs-12">
                                            <h5>Account Information</h5>
                                            <hr>
                                        </div>
                                        <div class="form-group col-md-6 col-xs-12">
                                            <label>Username</label>
                                            <input type="text" class="form-control" value="{{ $user->username }}" readonly />
                                        </div>
                                        <div class="form-group col-md-6 col-xs-12">
                                            <label>Password</label>
                                            <input type="password" class="form-control" name="password" />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 col-xs-12">
                                        <div class="clearfix text-right mt-3">
                                            <button type="submit" id="menuFormBtn" class="btn btn-success">
                                                Update User
                                            </button>
                                        </div>
                                    </div>
                                </form>
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