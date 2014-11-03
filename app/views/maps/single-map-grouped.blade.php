@extends('layouts.main')

@section('content')
    @foreach($nadeTypes as $nadeTypeKey => $nadeType)
    @if (isset($nades[$nadeTypeKey]) > 0)
    {{ $nadeType['label']}}:
    <div class="row">
        @foreach($nades[$nadeTypeKey] as $nade)
        <div class="col-sm-4">
            Title: {{ $nade->title }}
            <br>
            Imgur: {{ $nade->imgur_album }}
            <br>
            YouTube: {{ $nade->youtube }}
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
    @endif
    @endforeach
@stop
