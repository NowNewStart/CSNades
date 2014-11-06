@extends('layouts.main')

@section('content')
    <div class="features row">
        @foreach($features as $feature)
        <div class="col-md-6 col-sm-12">
            <div class="item">
                <h4>{{{ $feature['title'] }}} &mdash; <small>{{{ date("F j, Y", strtotime($feature['created_at'])) }}}</small></h4>
                <p>{{{ $feature['description'] }}}</p>
            </div>
        </div>
        @endforeach
    </div>
@stop
