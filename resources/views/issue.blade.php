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
                            <li class="breadcrumb-item active">Issue Type</li>
                        </ol>
	                    <h4 class="page-title">Issue Type</h4>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card-box">
                                <div class="button-list mb-3">
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addIssue">Add Issue Type</button>
                                    @include('modal.issue')
                                </div>
                                <div class="table-responsive" data-pattern="priority-columns" style="overflow:hidden">
                                    <div class="sticky-table-header">
                                        <table class="table table-bordered dataTable no-footer table-striped">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Name</th>
                                                    <th># of Tickets</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($issues as $issue)
                                                <tr class="text-center">
                                                    <td>{{ $issue->type }}</td>
                                                    <td></td>
                                                    <td>
                                                        @if($issue->status == '1')
                                                            <span class="badge badge-success">Active</span>
                                                        @else
                                                            <span class="badge badge-danger">Inactive</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('issue.edit', ['id'=>$issue->id]) }}" class="btn btn-xs btn-default btn-edit"><i class="mdi mdi-pencil"></i></a>
                                                        <a data-module="user" id="{{ $issue->id }}" data-name="{{ $issue->type }}" class="btn btn-xs btn-default btn-delete"><i class="text-danger mdi mdi-close-circle"></i></a>
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