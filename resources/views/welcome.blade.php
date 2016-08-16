@extends('layout.app')

@section('content')
  <div class="map-picker">
    <div class="row">
    @foreach($maps as $map)
      <div class="col-lg-3 col-md-4 col-sm-6">
        <a href="/map/{{ $map->slug }}" class="map-list img-responsible" style="background-image: url('{{{ $map->url }}}')">
          <div class="map-title">{{{ $map->map }}}</div>
           <ul class="map-info">
            @foreach (App\Nade::getNadeTypes() as $nadeTypeKey => $nadeType)
            <li>
              {{ $map->nades()->where('type', $nadeTypeKey)->where('approved_at', 'IS NOT', '0000-00-00 00:00:00')->count() }}
              <i class="{{{ $nadeType['class'] }}}" title="{{{ $nadeType['label'] }}}"></i>
            </li>
            @endforeach 
          </ul>
        </a>
      </div>
    @endforeach
    </div>
  </div>
@endsection