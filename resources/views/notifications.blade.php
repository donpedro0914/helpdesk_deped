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
                            <li class="breadcrumb-item active">Notofications</li>
                        </ol>
	                    <h4 class="page-title">Notofications</h4>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card-box">

                            <div class="row"><div class="col text-right" id="rscnt"></div></div>
                                <div class="table-responsive" data-pattern="priority-columns" style="overflow:hidden">
                                    <div class="sticky-table-header">    
                                        <table id="table" class="table table-bordered table-striped">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Campaign</th>
                                                    <th>Type</th>
                                                    <th>Status</th>
                                                    <th>Evaluated By</th>
                                                    <th>Position</th>
                                                    <th>Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($notifs as $notification)
                                                @php
                                                    $dateMatch = Carbon\Carbon::parse($notification->created_at)->locale('uk');
                                                @endphp
                                                <tr data-id="{{ $notification->Slug }}">
                                                    <td data-input="campaign"><a href="{{ URL::to('jobfile/info/'.$notification->Slug) }}">{{ $notification->campaign_name }}</a></td>
                                                    <td data-input="campaign"><a href="{{ URL::to('jobfile/info/'.$notification->Slug) }}">{{ $notification->type }}</a></td>
                                                    <td data-input="status"><a href="{{ URL::to('jobfile/info/'.$notification->Slug) }}">{{ $notification->Status }}</a></td>
                                                    <td data-input="user"><a href="{{ URL::to('jobfile/info/'.$notification->Slug) }}">{{ $notification->User }}</a></td>
                                                    <td data-input="user"><a href="{{ URL::to('jobfile/info/'.$notification->Slug) }}">{{ $notification->Position }}</a></td>
                                                    <td data-input="user"><a href="{{ URL::to('jobfile/info/'.$notification->Slug) }}">{{ $dateMatch }}</a></td>
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