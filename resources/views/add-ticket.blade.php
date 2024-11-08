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
                            <li class="breadcrumb-item active">Create</li>
                        </ol>
	                    <h4 class="page-title">Create Ticket</h4>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card-box">
                                <form action="{{ route('store.ticket') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="form-group col-md-12 col-xs-12">
                                                <label>Subject</label>
                                                <input type="text" class="form-control" name="subject" required />
                                            </div>
                                            <div class="form-group col-md-12 col-xs-12">
                                                <label>Issue Type</label>
                                                <select class="form-control" name="issue_type">
                                                    <option>-- Select Issue Type --</option>
                                                    @foreach($issue_types as $issue)
                                                    <option value="{{ $issue->id }}">{{ $issue->type }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12 col-xs-12">
                                                <label>Urgency</label>
                                                <select class="form-control" name="urgency">
                                                    <option>-- Select Urgency --</option>
                                                    <option value="Low">Low</option>
                                                    <option value="Normal">Normal</option>
                                                    <option value="High">High</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-12 col-xs-12">
                                                <label>Details</label>
                                                <textarea rows="10" class="form-control" name="details"></textarea>
                                            </div>
                                            <div class="form-group col-md-12 col-xs-12">
                                                <label>Attachments</label>
                                                <input type="file" class="form-control" name="upload" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12 col-xs-12">
                                            <div class="clearfix text-right mt-3">
                                                <button type="submit" class="btn btn-success">
                                                    Add Ticket
                                                </button>
                                            </div>
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