@extends('layout.app')

@section('content')
<h3>Edit nade</h3>
<hr>
<div class="row">
  <div class="col-lg-12">
    <ul class="list-group">
      <a href="/approve/{{ $data->id }}/delete" class="list-group-item" style="background-color:red;color:white;">Delete nade</a>
      <a href="/approve/{{ $data->id }}/confirm" class="list-group-item" style="background-color: #DEFEC8;">Approve nade</a>
    </ul>
  </div>
</div>
 {!! Form::open(array('url' => 'approve/'.$data->id.'/edit', 'method' => 'POST')) !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="row">
      <div class="col-lg-6">
        <div class="form-group">
          <label for="title">Nade Title</label>
          <input type="text" name="title" id="inputTitle" class="form-control" placeholder="Title" required="required" value="{{ $data->title }}">          
        </div>
        <div class="form-group">
          <label for="pop">Pop Spot</label>
          <select name="pop" class="form-control">
            @if($data->pop_spot == "a-site")
            <option value="a-site" selected>A Site</option>
            <option value="b-site">B Site</option>
            <option value="mid">Mid</option>
            <option value="other">Other</option>            
            @elseif($data->pop_spot == "b-site")
            <option value="a-site">A Site</option>
            <option value="b-site" selected>B Site</option>
            <option value="mid">Mid</option>
            <option value="other">Other</option>            
            @elseif($data->pop_spot == "mid")
            <option value="a-site" >A Site</option>
            <option value="b-site">B Site</option>
            <option value="mid" selected>Mid</option>
            <option value="other" >Other</option>
            @else 
            <option value="a-site" >A Site</option>
            <option value="b-site">B Site</option>
            <option value="mid">Mid</option>
            <option value="other" selected>Other</option>            
            @endif
          </select>
        </div>
        <div class="form-group">
          <label for="imgur">Imgur Link</label>
          <input type="url" name="imgur" id="inputImgur" class="form-control" placeholder="http://imgur.com/a/album"  title="" value="{{ $data->imgur_album }}">
        </div>
        <div class="form-group">
          <label for="yt">YouTube Link</label>
          <input type="url" name="yt" id="inputYt" class="form-control" placeholder="https://www.youtube.com/watch?v=video"  title="" value="{{ $data->youtube }}">
        </div>
        <div class="form-group">
          <label for="gfy">GfyCat Link</label>
          <input type="url" name="gfy" id="inputGfy" class="form-control" placeholder="http://gfycat.com/GfyLinkHere"  title="" value="{{ $data->gfycat }}">
        </div>
        <div class="form-group">
          <div class="checkbox">
            <label>
              @if($data->is_working == 1)
              <input type="checkbox" value="1" checked="checked" name="is_working">
              Nade is currently working
              @else 
              <input type="checkbox" value="0" name="is_working">
              Nade is currently working
            </label>            
            @endif
          </div>
        </div>
        @if(Auth::user()->type == "H" OR Auth::user()->type == "A")
        <div class="form-group">
          <div class="checkbox">
            <label>
              @if($data->approved_by != null)
              <input type="checkbox" value="1" checked="checked" name="is_approved">
                Nade is approved
              @else
              <input type="checkbox" value="1" checked="checked" name="is_approved">
                Nade is approved
              @endif              
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
                @if($data->type == "flash")
                <input type="radio" name="type" id="inputType"  value="flash" checked="checked">
                @else
                <input type="radio" name="type" id="inputType" value="flash">
                @endif
                <i class="fa fa-eye-slash" title="Flashbang"></i> Flashbang
              </label>
            </div>
            <div class="radio">
              <label>
                @if($data->type == "frag")
                <input type="radio" name="type" id="inputType"  value="frag" checked="checked">
                @else
                <input type="radio" name="type" id="inputType" value="frag">
                @endif
                <i class="fa fa-bomb" title="HE Grenade"></i> HE Grenade
              </label>
            </div>
            <div class="radio">
              <label>
                @if($data->type == "fire")
                <input type="radio" name="type" id="inputType"  value="fire" checked="checked">
                @else
                <input type="radio" name="type" id="inputType" value="fire">
                @endif
                <i class="glyphicon glyphicon-fire" title="Incendiary / Molotov"></i> Incendiary / Molotov
              </label>
            </div>
            <div class="radio">
              <label>
                @if($data->type == "smoke")
                <input type="radio" name="type" id="inputType"  value="smoke" checked="checked">
                @else
                <input type="radio" name="type" id="inputType" value="smoke">
                @endif
                <i class="fa fa-soundcloud" title="Smoke Grenade"></i> Smoke Grenade
              </label>
            </div>
        </div>
        <div class="form-group">
          <label for="tags">Tags</label>
          <div class="col-sm-12">
            <textarea name="tags" id="inputTags" class="form-control" cols="50" id="tags" placeholder="double stack, car, garage" rows="2" value="{{ $data->tags }}"></textarea>
          </div>
        </div>
      </div>
    </div>
    <button type="submit" class="btn btn-primary">Edit</button>
  </div>
@endsection