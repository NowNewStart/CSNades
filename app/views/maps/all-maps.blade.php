@extends('layouts.main')

@section('content')
  <div class="map-picker">
    <div class="row">
    @foreach($maps as $map)
      <div class="col-lg-3 col-md-4 col-sm-6">
        <a href="{{{ action('NadesController@showNadesInMap', array('slug' => $map->slug)) }}}" class="map-list" style="background-image: url('{{{ $map->image }}}')">
          <div class="map-title">{{{ $map->name }}}</div>
          <ul class="map-info">
            @foreach (Nade::getNadeTypes() as $nadeTypeKey => $nadeType)
            <li>
              {{ $map->nades()->where('type', $nadeTypeKey)->where('approved_at', '>', '2014-10-13')->count() }}
              <i class="{{{ $nadeType['class'] }}}" title="{{{ $nadeType['label'] }}}"></i>
            </li>
            @endforeach
          </ul>
        </a>
      </div>
    @endforeach
    </div>
  </div>
@stop
