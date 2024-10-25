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
                            <li class="breadcrumb-item active">Tickets</li>
                        </ol>
	                    <h4 class="page-title">Tickets</h4>
                    </div>
                    <div class="row">
                        <div class="col-xl-3">
                            <div class="card border border-primary">
                                <div class="card-body text-primary">
                                    <h4 class="header-title float-left">No. of Active Tickets</h4>
                                    <h1 class="float-right">{{ $openTicketCount }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="card border border-danger">
                                <div class="card-body text-danger">
                                    <h4 class="header-title float-left">No. of Resolved Tickets</h4>
                                    <h1 class="float-right">0</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card-box">
                                <div class="button-list mb-3">
                                    <a href="{{ route('create.ticket') }}" class="btn btn-primary text-white">Add Ticket</a>
                                </div>
                                <div class="table-responsive" data-pattern="priority-columns" style="overflow:hidden">
                                    <div class="sticky-table-header">
                                        <table class="table table-bordered dataTable no-footer table-striped">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Subject</th>
                                                    <th>Issue Type</th>
                                                    <th>Urgency</th>
                                                    <th>Raised By</th>
                                                    <th>HelpDesk Agent</th>
                                                    <th>Status</th>
                                                    <th>Created</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($tickets as $t)
                                                <tr class="text-center">
                                                    <td>{{ $t->subject }}</td>
                                                    <td>{{ $t->type }}</td>
                                                    <td>{{ $t->urgency }}</td>
                                                    <td>{{ $t->raised_by_name }}</td>
                                                    <td>{{ $t->agent_name }}</td>
                                                    <td>{{ $t->status }}</td>
                                                    <td>{{ $t->created_at }}</td>
                                                    <td>
                                                        <a href="{{ route('view.ticket', ['slug'=>$t->slug]) }}" class="btn btn-xs btn-default btn-edit"><i class="mdi mdi-eye"></i></a>
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