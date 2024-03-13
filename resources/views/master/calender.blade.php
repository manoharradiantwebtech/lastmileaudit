@extends('main.app')
@section('title')
Calender
@endsection
@section('content')
    <section class="locations-section py-4">
        <div class="container container-custom">
            <div class="d-flex justify-content-between align-items-center">
                <div class="page-header page-header-left">
                    <h3>Audits Calendar</h3>
                </div>
                <div class="page-header-right">
                    <a class="btn btn-prime btn-sm shadow-sm" href="add-audit.html">Add New Audit</a>
                </div>
            </div>
            <div class="content-card card">
                <div class="card-body">
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </section>
@endsection