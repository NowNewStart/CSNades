@extends('layouts.main')

@section('content')
    <div class="row">
        @foreach($map->nades as $nade)
        <div class="col-sm-4">
            Title: {{ $nade->title }}
            <br>
            Imgur: {{ $nade->imgur_album }}
            <br>
            YouTube: {{ $nade->youtube }}
            <br>
            Type: <i class="{{ Nade::getGrenadeIcon($nade->type) }}" title="{{ Nade::getNadeTypeLabel($nade->type) }}"></i>
            <br>
            Working: {{ ($nade->is_working) ? "Yes" : "No" }}
            <br>
            Tags: {{ $nade->tags }}
            <br>
            Submited By: {{ $nade->user->username }}
            <br>
            Last Updated: {{ $nade->updated_at }}
        </div>
        @endforeach
    </div>
@stop
