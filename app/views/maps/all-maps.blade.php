@extends('layouts.main')

@section('content')
        <div class="row">
        @foreach($maps as $map)
            <div class="col-lg-3 text-center">
                <a href="{{ action('NadesController@showNadesInMap', array('slug' => $map->slug)) }}">
                    <img src="{{ $map->image }}" alt="{{ $map->name }}" class="img-responsive hidden-xs hidden-sm"/>
                    <h3>{{ $map->name }}</h3>
                </a>
            </div>
        @endforeach
        </div>
@stop