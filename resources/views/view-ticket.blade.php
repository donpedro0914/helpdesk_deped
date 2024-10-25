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
                            <li class="breadcrumb-item">Ticket</li>
                            <li class="breadcrumb-item active">{{ $ticket->subject }}</li>
                        </ol>
	                    <h4 class="page-title">{{ $ticket->subject }}</h4>
                    </div>
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="card-box">
                                <form action="{{ route('update.ticket', ['slug' => $ticket->slug]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="form-group col-md-12 col-xs-12">
                                                <label>Status</label>
                                                @php
                                                    $status = array(
                                                        'Open' => 'Open',
                                                        'In-Progress' => 'In-Progress',
                                                        'Closed' => 'Closed'
                                                    );
                                                @endphp
                                                {{ Form::select('status', $status, $ticket->status, ['class' => 'form-control']) }}
                                            </div>
                                            <div class="form-group col-md-12 col-xs-12">
                                                <label>Subject</label>
                                                <input type="text" class="form-control" name="subject" value="{{ $ticket->subject }}" readonly />
                                            </div>
                                            <div class="form-group col-md-12 col-xs-12">
                                                <label>Issue Type</label>
                                                {{ Form::select('issue_type', $issues, $ticket->issue_type, ['class' => 'form-control']) }}
                                            </div>
                                            <div class="form-group col-md-12 col-xs-12">
                                                <label>Urgency</label>
                                                @php
                                                    $urgency = array(
                                                        'Low' => 'Low',
                                                        'Normal' => 'Normal',
                                                        'High' => 'High'
                                                    );
                                                @endphp
                                                {{ Form::select('urgency', $urgency, $ticket->urgency, ['class' => 'form-control']) }}
                                            </div>
                                            <div class="form-group col-md-12 col-xs-12">
                                                <label>Details</label>
                                                <p style="height: 150px;border:1px solid #ccc;padding:5px;border-radius:5px;">{{ $ticket->details }}</p>
                                            </div>
                                            @include('global.notes')
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12 col-xs-12">
                                            <div class="clearfix text-right mt-3">
                                                <button type="submit" class="btn btn-success">
                                                    Update Ticket
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card-box">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label>HelpDesk Agent</label>
                                        {{ Form::select('agent', $agents, $ticket->agent, ['class' => 'form-control agent_list']) }}
                                        <button class="btn btn-primary float-right update_agent_btn" data-slug="{{ $ticket->slug }}">Update Agent</button>
                                    </div>
                                    <hr />
                                    <div class="form-group col-md-12">
                                        <label>Attachments</label>
                                        <ul class="media_upload">
                                            @foreach($uploads as $u)
                                            <li class="media_item">{{ $u->filename }} <small>(uploaded by {{ $u->name }})</small><a href="{{ route('download', ['filename' => $u->filename, 'slug' => $u->slug]) }}" target="_blank"><i class="mdi mdi-download"></i></a></li>
                                            @endforeach
                                        </ul>
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