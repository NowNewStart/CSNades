@extends('layout.app')

@section('content')
<div class="row">
    <div class="col-lg-12">
    <h3>Admin Control Panel</h3>
    <h6>What do you want to do?</h6>
    <hr>
	<div class="row">
		<div class="col-lg-12">
			<div class="list-group">
				<a class="list-group-item" href="/admin/maps">Manage Maps</a>
				<a class="list-group-item" href="/admin/users">Manage Users</a>
			</div>	
		</div>

	</div>
    </div>
</div>
@endsection