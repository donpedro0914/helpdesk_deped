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
                            <li class="breadcrumb-item">Issue Type</li>
                            <li class="breadcrumb-item active">{{ $issue->type }}</li>
                        </ol>
	                    <h4 class="page-title">{{ $issue->type }}</h4>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card-box">
                                <form action="{{ route('issue.update', ['id'=>$issue->id]) }}" method="post">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-12 col-xs-12">
                                            <label>Issue Type</label> <span class="issuecheck"></span>
                                            <input type="text" name="type" id="issueType" class="form-control" value="{{ $issue->type }}"/>
                                        </div>
                                        <div class="form-group col-md-12 col-xs-12">
                                            <label>Status</label>
                                            @php
                                                $opt = array(
                                                    '0' => 'Inactive',
                                                    '1' => 'Active'
                                                );
                                            @endphp
                                            {{ Form::select('status', $opt, $issue->status, array('class' => 'form-control')) }}
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 col-xs-12">
                                        <div class="clearfix text-right mt-3">
                                            <button type="submit" id="updateIssueBtn" class="btn btn-success">
                                                Update Issue Type
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