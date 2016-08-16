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
				<a class="list-group-item" href="/admin/maps/addclassic">Add all general comp maps</a>
				<a class="list-group-item" href="/approve" style="background-color: #DEFEC8">Approve nades</a>
			</div>	
		</div>

	</div>
    </div>
</div>
@endsection