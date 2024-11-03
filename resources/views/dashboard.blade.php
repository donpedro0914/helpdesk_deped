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
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
	                    <h4 class="page-title">Dashboard</h4>
                    </div>
                    <div class="row">
                        <div class="col-xl-3">
                            <div class="card border border-primary">
                                <div class="card-body text-primary">
                                    <h4 class="header-title float-left">All Tickets</h4>
                                    <h1 class="float-right">{{ $allTickets }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="card border border-success">
                                <div class="card-body text-success">
                                    <h4 class="header-title float-left">Open Tickets</h4>
                                    <h1 class="float-right">{{ $openTickets }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="card border border-warning">
                                <div class="card-body text-warning">
                                    <h4 class="header-title float-left">In-Progress Tickets</h4>
                                    <h1 class="float-right">{{ $progressTickets }}</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3">
                            <div class="card border border-danger">
                                <div class="card-body text-danger">
                                    <h4 class="header-title float-left">Closed Tickets</h4>
                                    <h1 class="float-right">{{ $closedTickets }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-8">
                            <div class="card-box">
	                            <h4 class="header-title">No of Tickets raised for the month of {{ $month }}</h4>
                                {!! $chartjs->render() !!}
                            </div>
                        </div>
                        <div class="col-xl-4">
                            <div class="card-box">
                                <h4 class="header-titl">Most common issues for {{ $month }}</h4>
                                {!! $pie->render() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection