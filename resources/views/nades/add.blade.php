@extends('layout.app')

@section('content')
  <h3>Add a new Nade</h3>
  <hr>
  {!! Form::open(array('url' => 'add/perform', 'method' => 'POST')) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="row">
      <div class="col-lg-6">
        <div class="form-group">
          <label for="title">Nade Title</label>
          <input type="text" name="title" id="inputTitle" class="form-control" placeholder="Title" required="required">          
        </div>
        <div class="form-group">
          <label for="pop">Pop Spot</label>
          <select name="pop" class="form-control">
            <option value="a-site">A Site</option>
            <option value="b-site">B Site</option>
            <option value="mid">Mid</option>
            <option value="other" selected>Other</option>
          </select>
        </div>
        <div class="form-group">
          <label for="imgur">Imgur Link</label>
          <input type="url" name="imgur" id="inputImgur" class="form-control" placeholder="http://imgur.com/a/album"  title="">
        </div>
        <div class="form-group">
          <label for="yt">YouTube Link</label>
          <input type="url" name="yt" id="inputYt" class="form-control" placeholder="https://www.youtube.com/watch?v=video"  title="">
        </div>
        <div class="form-group">
          <label for="gfy">GfyCat Link</label>
          <input type="url" name="gfy" id="inputGfy" class="form-control" placeholder="http://gfycat.com/GfyLinkHere"  title="">
        </div>
        <div class="form-group">
          <div class="checkbox">
            <label>
              <input type="checkbox" value="1" checked="checked" name="is_working">
              Nade is currently working
            </label>
          </div>
        </div>
        @if(Auth::user()->type == "H" OR Auth::user()->type == "A")
        <div class="form-group">
          <div class="checkbox">
            <label>
              <input type="checkbox" value="1" checked="checked" name="is_approved">
                Nade is approved
            </label>
          </div>
        </div>
        @endif
      </div>
      <div class="col-lg-6">
        <div class="form-group">
          <label for="map">Map</label>
          {!! Form::select('slug', $maps, null, ['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
          <label for="type">Nade Type</label>
            <div class="radio">
              <label>
                <input type="radio" name="type" id="inputType"  value="flash" checked="checked">
                <i class="fa fa-eye-slash" title="Flashbang"></i> Flashbang
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="type" id="inputType" value="frag" checked="checked">
                <i class="fa fa-bomb" title="HE Grenade"></i> HE Grenade
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="type" id="inputType" value="fire" checked="checked">
                <i class="glyphicon glyphicon-fire" title="Incendiary / Molotov"></i> Incendiary / Molotov
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="type" id="inputType" value="smoke" checked="checked">
                <i class="fa fa-soundcloud" title="Smoke Grenade"></i> Smoke Grenade
              </label>
            </div>
        </div>
        <div class="form-group">
          <label for="tags">Tags</label>
          <div class="col-sm-12">
            <textarea name="tags" id="inputTags" class="form-control" cols="50" id="tags" placeholder="double stack, car, garage" rows="2" ></textarea>
          </div>
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
  </div>
@endsection