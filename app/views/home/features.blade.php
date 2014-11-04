@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <ul>
            @foreach($features as $feature)
                <li>
                    {{ $feature['title'] }} - {{ $feature['description'] }}
                </li>
            @endforeach
            </ul>
        </div>
    </div>
@stop