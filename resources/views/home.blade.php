@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
            <div class="card">
            <div class="card-header">Inbox</div>
                <div class="card-body" id="app">
               <inbox :user="{{ auth()->user() }}"></inbox>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
