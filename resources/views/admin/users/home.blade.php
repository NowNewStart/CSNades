@extends('layout.app')

@section('content')
<div class="row">
	@if(Auth::user()->type == "H")
    <div class="col-lg-4">
    	<legend>Change user group</legend>
    	<form action="/admin/users/group" method="POST" role="form">
    	
    		<div class="form-group">
    			<label for="steamid">SteamID</label>
    			<input type="text" class="form-control" id="steamid" name="steamid" placeholder="SteamID">
    		</div>
    		<div class="form-group">
    			<label for="group">Group</label>
    			<select name="group" class="form-control" id="group">
    				<option name="A">Admin</option>
    				<option name="U" selected>User</option>
    			</select>
    		</div>
    		{{ csrf_field() }}
    		<div class="form-group">
    			<button type="submit" class="btn btn-primary">Change</button>
    		</div>
    	
    		
    	</form>
    </div>
    @endif
    <div class="col-lg-4">
    	<legend>Ban user</legend>
    	<form action="/admin/users/ban" method="POST" role="form">
    	
    		<div class="form-group">
    			<label for="steamid">SteamID</label>
    			<input type="text" class="form-control" id="steamid" name="steamid" placeholder="SteamID">
    		</div>    	
    		{{ csrf_field() }}
    		<div class="form-group">
    			<button type="submit" class="btn btn-primary">Ban</button>
    		</div>    		
    		
    	</form>
    </div>
    <div class="col-lg-4">
    	<legend>Most contributing users</legend>
        <ul class="list-group">
            @foreach($users as $user)
                <li class="list-group-item">{{ $user->nickname }} ({{ $user->contributions }})</li>
            @endforeach
        </ul>
    </div>
</div>
@endsection