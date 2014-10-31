@extends('layouts.main')

@section('content')
  <div class="map-picker">
    <div class="row">
    @foreach($maps as $map)
      <div class="col-lg-3 col-md-4 col-sm-6">
        <a href="{{ action('NadesController@showNadesInMap', array('slug' => $map->slug)) }}" class="map-list" style="background-image: url('{{ $map->image }}')">
          <div class="map-title">{{ $map->name }}</div>
          <ul class="map-info">
            <li>10 <i class="fa fa-bomb"></i></li>
            <li>1 <i class="fa fa-eye-slash"></i></li>
            <li>30 <i class="fa fa-soundcloud"></i></li>
            <li>3 <span class="glyphicon glyphicon-fire"></span></li>
          </ul>
        </a>
      </div>
    @endforeach
    </div>
  </div>
@stop
