@extends('layout.app')

@section('content')
<div class="row">
    <div class="col-lg-4">
    	<div class="list-group">
    		<legend>Map list</legend>

    		@foreach($maps as $map)
				<a  href="/admin/maps/{{ $map->slug }}" class="list-group-item">{{ $map->map }} </a>
    		@endforeach
    	</div>  	
    </div>
    <div class="col-lg-4">
    	<form action="/admin/maps/add" method="POST" role="form">
    		<legend>Add a map</legend>   	
    		<div class="form-group">
    			<label for="map">Map Name</label>
    			<input type="text" class="form-control" id="map" name="map" placeholder="Map">
    		</div>
    		<div class="form-group">
    			<label for="url">Image (pls Imgur)</label>
    			<input type="url" class="form-control" id="url" name="url" placeholder="Image (pls Imgur)">
    		</div>
    		{{ csrf_field() }}    		    	
    		<button type="submit" class="btn btn-primary">Add</button>
    	</form>
    </div>
</div>
@endsection