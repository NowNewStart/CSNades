@extends('layouts.main')

@section('content')
        {{ Form::open(array('method' => 'post', 'action' => 'NadesController@saveNade', 'class' => 'form-horizontal')) }}
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-sm-offset-2">
                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                        <label for="title" class="col-sm-12">Nade Title</label>
                        <div class="col-sm-12">
                            <input type="text" name="title" id="title" placeholder="Title" class="form-control" value="{{{ Input::old('title') }}}">
                            {{ $errors->first('title', '<span class="help-block">:message</span>') }}
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="form-group {{ $errors->has('map') ? 'has-error' : '' }}">
                        <label for="map" class="col-sm-12">Map</label>
                        <div class="col-sm-12">
                            <select name="map" id="map" class="form-control">
                                @foreach ($maps as $map)
                                <option value="{{{ $map->id }}}" {{{ Input::old('map') == $map->id ? "selected" : "" }}}>{{{ $map->name }}}</option>
                                @endforeach
                            </select>
                            {{ $errors->first('map', '<span class="help-block">:message</span>') }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-sm-offset-2">
                    <div class="form-group {{{ $errors->has('pop_spot') ? 'has-error' : '' }}}">
                        <label for="pop-spot" class="col-sm-12">Pop Spot</label>
                        <div class="col-sm-12">
                            <select name="pop_spot" id="pop-spot" class="form-control">
                                @foreach ($popSpots as $popSpot => $popName)
                                <option value="{{{ $popSpot }}}" {{{ Input::old('pop_spot') == $popSpot ? "selected" : "" }}}>{{{ $popName }}}</option>
                                @endforeach
                            </select>
                            {{ $errors->first('pop_spot', '<span class="help-block">:message</span>') }}
                        </div>
                    </div>
                    <div class="form-group {{{ $errors->has('imgur_album') ? 'has-error' : '' }}}">
                        <label for="imgur-album" class="col-sm-12">Imgur Link</label>
                        <div class="col-sm-12">
                            <input type="text" name="imgur_album" id="imgur-album" placeholder="http://imgur.com/a/album" class="form-control" value="{{{ Input::old('imgur_album') }}}">
                            {{ $errors->first('imgur_album', '<span class="help-block">:message</span>') }}
                        </div>
                    </div>
                    <div class="form-group {{{ $errors->has('youtube') ? 'has-error' : '' }}}">
                        <label for="youtube" class="col-sm-12">YouTube Link</label>
                        <div class="col-sm-12">
                            <input type="text" name="youtube" id="youtube" placeholder="https://www.youtube.com/watch?v=video" class="form-control" value="{{{ Input::old('youtube') }}}">
                            {{ $errors->first('youtube', '<span class="help-block">:message</span>') }}
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="form-group {{{ $errors->has('type') ? 'has-error' : '' }}}">
                        <label class="col-sm-12">Nade Type</label>
                        <div class="col-xs-12">
                            @foreach (Nade::getNadeTypes() as $nadeTypeKey => $nadeType)
                            <div class="radio">
                                <label>
                                    <input type="radio" name="type" value="{{{ $nadeTypeKey }}}" {{{ Input::old('type') == $nadeTypeKey ? "checked" : "" }}}>
                                        <i class="{{{ $nadeType['class'] }}}" title="{{{ $nadeType['label'] }}}"></i> {{{ $nadeType['label'] }}}
                                </label>
                            </div>
                            @endforeach
                            {{ $errors->first('type', '<span class="help-block">:message</span>') }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tags" class="col-sm-12">Tags</label>
                        <div class="col-sm-12">
                            <textarea rows="2" name="tags" id="tags" placeholder="double stack, car, garage" class="form-control">{{{ Input::old('tags') }}}</textarea>
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
                                    <input type="checkbox" name="is_working" value="1" checked="checked">
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
                                    <input type="checkbox" name="is_approved" value="1" checked="checked">
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
