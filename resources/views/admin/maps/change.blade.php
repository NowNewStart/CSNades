@extends('layout.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
    	<h3>{{ $map->map }} <small>Modify Map</small></h3>
    	<hr>
    	<div class="row">
    		<div class="col-lg-4">
    			<legend>Change Map Info</legend>
    			<form action="/admin/maps/{{ $map->slug }}/info" method="POST" role="form">
		    		<div class="form-group">
		    			<label for="map">Map Name</label>
		    			<input type="text" class="form-control" id="map" name="map" placeholder="Map" value="{{ $map->map }}">
		    		</div>
		    		<div class="form-group">
		    			<label for="url">Image (pls Imgur)</label>
		    			<input type="url" class="form-control" id="url" name="url" placeholder="Image (pls Imgur)" value="{{ $map->url }}">
		    		</div>
		    		{{ csrf_field() }}    		    	
		    		<button type="submit" class="btn btn-primary">Change</button>
    			</form>
    		</div>
    		<div class="col-lg-4">
    			<legend>Map Settings</legend>
    			<ul class="list-group">
    				<a href="/admin/maps/{{$map->slug}}/delete" class="list-group-item">Delete</a>
    				<a href="/admin/maps/{{$map->slug}}/deactivate" class="list-group-item">Deactivate</a>
    				<a href="/admin/maps/{{$map->slug}}/delnades" class="list-group-item">Delete all nades</a>
    			</ul>
    		</div>
    	</div>
    </div>
</div>
@endsection