@extends('layouts.main')

@section('content')
        {{ Form::model($nade, array('route' => $route)) }}
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-sm-offset-2">
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                        {{ Form::label('title', 'Nade Title', array('class' => 'col-xs-12')) }}
                        <div class="col-sm-12">
                            {{ Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'Title')) }}
                            {{ $errors->first('title', '<span class="help-block">:message</span>') }}
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="form-group {{ $errors->has('map') ? 'has-error' : '' }}">
                        <!-- <label for="map" class="col-sm-12">Map</label> -->
                        {{ Form::label('map', 'Map', array('class' => 'col-xs-12')) }}
                        <div class="col-sm-12">
                            {{ Form::select('map', $mapList, $nade->map->id, array('class' => 'form-control')) }}
                            {{ $errors->first('map', '<span class="help-block">:message</span>') }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-sm-offset-2">
                    <div class="form-group {{{ $errors->has('pop_spot') ? 'has-error' : '' }}}">
                        {{ Form::label('pop_spot', 'Pop Spot', array('class' => 'col-xs-12')) }}
                        <div class="col-sm-12">
                            {{ Form::select('pop_spot', $popSpots, $nade->pop_spot, array('class' => 'form-control')) }}
                            {{ $errors->first('pop_spot', '<span class="help-block">:message</span>') }}
                        </div>
                    </div>
                    <div class="form-group {{{ $errors->has('imgur_album') ? 'has-error' : '' }}}">
                        {{ Form::label('imgur_album', 'Imgur Link', array('class' => 'col-xs-12')) }}
                        <div class="col-sm-12">
                            {{ Form::text('imgur_album', null, array('class' => 'form-control', 'placeholder' => 'http://imgur.com/a/album')) }}
                            {{ $errors->first('imgur_album', '<span class="help-block">:message</span>') }}
                        </div>
                    </div>
                    <div class="form-group {{{ $errors->has('youtube') ? 'has-error' : '' }}}">
                        {{ Form::label('youtube', 'YouTube Link', array('class' => 'col-xs-12')) }}
                        <div class="col-sm-12">
                            {{ Form::text('youtube', null, array('class' => 'form-control', 'placeholder' => 'https://www.youtube.com/watch?v=video')) }}
                            {{ $errors->first('youtube', '<span class="help-block">:message</span>') }}
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="form-group {{{ $errors->has('type') ? 'has-error' : '' }}}">
                        <!-- <label class="col-sm-12">Nade Type</label> -->
                        {{ Form::label('type', 'Nade Type', array('class' => 'col-xs-12')) }}
                        <div class="col-xs-12">
                            @foreach (Nade::getNadeTypes() as $nadeTypeKey => $nadeType)
                            <div class="radio">
                                <label>
                                    {{ Form::radio('type', $nadeTypeKey) }}
                                        <i class="{{{ $nadeType['class'] }}}" title="{{{ $nadeType['label'] }}}"></i> {{{ $nadeType['label'] }}}
                                </label>
                            </div>
                            @endforeach
                            {{ $errors->first('type', '<span class="help-block">:message</span>') }}
                        </div>
                    </div>
                    <div class="form-group">
                        {{ Form::label('tags', 'Tags', array('class' => 'col-xs-12')) }}
                        <div class="col-sm-12">
                            {{ Form::textarea('tags', null, array('class' => 'form-control', 'placeholder' => 'double stack, car, garage', 'rows' => 2)) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-sm-offset-2">
                    <div class="form-group {{{ $errors->has('is_working') ? 'has-error' : '' }}}">
                        <div class="col-xs-12">
                            <div class="checkbox">
                                <label>
                                    {{ Form::checkbox('is_working', true, true) }}
                                        Nade is currently working
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group {{{ $errors->has('is_approved') ? 'has-error' : '' }}}">
                        @if($user->is_mod)
                        <div class="col-xs-12">
                            <div class="checkbox">
                                <label>
                                    {{ Form::checkbox('is_approved', true, true) }}
                                        Nade is approved
                                </label>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-primary">Submit Nade</button>
                        </div>
                    </div>
                </div>
            </div>
        {{ Form::close() }}
@stop
