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
                                    <h4 class="header-title float-left">No. of Closed Tickets</h4>
                                    <h1 class="float-right">{{ $resolvedTicktCount }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card-box">
                                <!-- @if(Auth::user()->role == 'Administrator' || Auth::user()->role == 'Supervisor/Manager')                                
                                <div class="button-list mb-3">
                                    <span>Priority:</span>
                                    <a href="{{ route('tickets', ['urgency' => 'High']) }}" class="btn btn-success text-white">High</a>
                                    <a href="{{ route('tickets', ['urgency' => 'Normal']) }}" class="btn btn-secondary text-white">Nomal</a>
                                    <a href="{{ route('tickets', ['urgency' => 'Low']) }}" class="btn btn-danger text-white">Low</a>
                                </div>
                                @endif -->
                                @if(Auth::user()->role == 'Administrator' || Auth::user()->role == 'Teacher/Staff')
                                <div class="button-list mb-3 d-flex">
                                    <a href="{{ route('create.ticket') }}" class="btn btn-primary text-white">Add Ticket</a>
                                    @if(Auth::user()->role == 'Administrator' || Auth::user()->role == 'Supervisor/Manager')
                                    <form method="GET">
                                        <select class="form-control issue_type" style="width: 100%; margin-left:15px;" name="issue_type">
                                            <option>-- Select Issue Type --</option>
                                            @foreach($issue_type as $issue)
                                            <option value="{{ $issue->type }}">{{ $issue->type }}</option>
                                            @endforeach
                                        </select>
                                    </form>
                                    @endif
                                </div>
                                @endif
                                <div class="table-responsive" data-pattern="priority-columns" style="overflow:hidden">
                                    <div class="sticky-table-header">
                                        <table class="table table-bordered dataTable no-footer table-striped">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>ID</th>
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
                                                @if(Auth::user()->role == 'Administrator' || Auth::user()->role == 'Supervisor/Manager')
                                                    @if($tickets)
                                                    @foreach($tickets as $t)
                                                        <tr class="text-center">
                                                            <td>{{ str_pad($t->id, 6, '0', STR_PAD_LEFT) }}</td>
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
                                                    @endif
                                                @else
                                                    @foreach($tickets as $t)
                                                    <tr class="text-center">
                                                        <td>{{ str_pad($t->id, 6, '0', STR_PAD_LEFT) }}</td>
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
                                                @endif
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

        $.fn.dataTable.ext.type.order['custom-priority-order-pre'] = function(d) {
            switch (d) {
                case 'High':
                    return 1;
                case 'Normal':
                    return 2;
                case 'Low':
                    return 3;
                default:
                    return 4; // For any other values that might appear
            }
        };

        $('.table').DataTable({
            keys: true,
            columnDefs: [
                { 
                    targets: 2, // Index of your third column
                    type: 'custom-priority-order' 
                }
            ],
            order: [[2, 'asc']] // Sort by the third column in ascending order based on custom type
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