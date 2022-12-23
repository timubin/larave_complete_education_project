@extends('Layout.app')
@section('title','Home')
@section('content')

<div class="container">
    <div class="row">

        <div class="col-md-3 p-2">
            <div class="card">
                <a href="{{url('/visitor')}}">
                    <div class="card-body">
                        <h3 class="count-card-title">{{$totalVisitor}}</h3>
                        <h3 class="count-card-text">Total Visitor</h3>
                    </div>
                </a>
               
            </div>
        </div>

        <div class="col-md-3 p-2">
            <div class="card">
                <div class="card-body">
                    <h3 class="count-card-title">{{$totalService}}</h3>
                    <h3 class="count-card-text">Total Service</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 p-2">
            <div class="card">
                <div class="card-body">
                    <h3 class="count-card-title">{{$totalProject}}</h3>
                    <h3 class="count-card-text">Total Project</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 p-2">
            <div class="card">
                <div class="card-body">
                    <h3 class="count-card-title">{{$totalCours}}</h3>
                    <h3 class="count-card-text">Total Courses</h3>
                </div>
            </div>
        </div>


        <div class="col-md-3 p-2">
            <div class="card">
                <div class="card-body">
                    <h3 class="count-card-title">{{$totalContact}}</h3>
                    <h3 class="count-card-text">Total Contact</h3>
                </div>
            </div>
        </div>


    </div>
</div>


@endsection