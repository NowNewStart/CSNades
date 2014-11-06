@extends('layouts.main')

@section('content')
    <div class="features row">
        @foreach($features as $feature)
        <div class="item col-xs-6">
            <div>
                <h4>{{ $feature['title'] }} &mdash; <small>{{{ date("F j, Y", strtotime($feature['created_at'])) }}}</small></h4>
                <p>{{ $feature['description'] }}</p>
            </div>
        </div>
        <div class="item col-xs-6">
            <div>
                <h4>{{ $feature['title'] }} &mdash; <small>{{{ date("F j, Y", strtotime($feature['created_at'])) }}}</small></h4>
                <p>{{ $feature['description'] }}asdfasdfasfasdfasdfasdfasdfasfasdfasdfasdfasdfasfasdfasdfasdfasdfasfasdfasdf</p>
            </div>
        </div>
        <div class="item col-xs-6">
            <div>
                <h4>{{ $feature['title'] }} &mdash; <small>{{{ date("F j, Y", strtotime($feature['created_at'])) }}}</small></h4>
                <p>{{ $feature['description'] }}</p>
            </div>
        </div>
        <div class="item col-xs-6">
            <div>
                <h4>{{ $feature['title'] }} &mdash; <small>{{{ date("F j, Y", strtotime($feature['created_at'])) }}}</small></h4>
                <p>{{ $feature['description'] }}</p>
            </div>
        </div>
        @endforeach
    </div>
@stop
