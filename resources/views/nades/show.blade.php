@extends('layout.app')

@section('content')

  @for($i=0;$i<count($nades);$i++)
    <div class="col-lg-3 col-md-4 col-sm-6">
      <div class="panel panel-default" style="height: 277px;">
        <div class="panel-wrap">
          <div class="panel-heading">
            <h3 class="panel-title">
              <i class="{{{ ($nades[$i]->is_working) ? "glyphicon glyphicon-ok text-success" : "" }}}"></i>
              <i class="{{{ App\Nade::getNadeIcon($nades[$i]->type) }}}" title="{{{ App\Nade::getNadeTypeLabel($nades[$i]->type) }}}"></i>
              {{ $nades[$i]->title }}
            </h3>
            <div class="author">
              By <a href="#">{{ $nades[$i]->user->nickname }}
            </div>
          </div>
          <div class="panel-body">
            <div class="tutorial row text-center">
              @if($i == 0) 
                @if(!empty($nades[$i]->imgur_album))
                  <a class="col-xs-12" href="{{ $nades[$i]->imgur_album }}" target="_blank">
                    <img src="/img/imgur.png" class="imgurfirst">
                  </a>
                @endif                
              @else
              @if(!empty($nades[$i]->imgur_album))
                <a class="col-xs-12" href="{{ $nades[$i]->imgur_album }}" target="_blank">
                  <img src="/img/imgur.png" class="imgur">
                </a>
              @endif
              @if(!empty($nades[$i]->gfycat))
                <a class="col-xs-12" href="{{ $nades[$i]->gfycat }}" target="_blank">
                  <img src="/img/gfycat.png" class="gfy">
                </a>
              @endif
              @if(!empty($nades[$i]->youtube))
                <a class="col-xs-12" href="{{ $nades[$i]->youtube }}" target="_blank">
                  <img src="/img/youtube.png" class="img-responsive yt">
                </a>
              @endif
              @endif
            </div>
            <div class="tags">
              @foreach(explode(',', $nades[$i]->tags) as $tag)
                @if(!empty($tag))
                  <span class="label label-primary" style="margin-left: 1px;">
                    {{$tag }}
                  </span>
                @endif
              @endforeach           
            </div>
          </div>
        </div>
        <div class="panel-footer" class="position: relative;">
          <small>
            @if(Auth::check() && (Auth::user()->type == "H" OR Auth::user()->type == "A"))
              <div class="pull-right">
                <a href="/map/{{ $nades[$i]->map->slug }}/nade/{{ $nades[$i]->id }}">Edit</a>
              </div>
            @endif
            {{ $nades[$i]->updated_at }}
            </small>
        </div>
      </div>
    </div>      
  @endfor

@endsection