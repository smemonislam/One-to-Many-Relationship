@extends('layouts.app')

@section('title', 'Restore User')

@section('content')
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>All Restore <b>User</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="{{ route('users.create') }}" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Add New User</span></a>
						<a href="{{ route('users.index') }}" class="btn btn-danger"><i class="material-icons">&#xE15C;</i> <span>Back</span></a>						
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">				
				<thead>
					<tr>
						<th>SL</th>
						<th>User Name</th>
						<th>User Role</th>
						<th>Email</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					
					@foreach ( $trashed as $row )
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $row->name }} </td>
						<td>{{ $row->role->name }} </td>
						<td>{{ $row->email }}</td>					
						<td>
                            <form action="{{ route('users.delete', $row->id) }}" method="POST" class="d-flex">
                                <a href="{{ route('users.restore', $row->id) }}" class="edit"><span class="material-icons">restore_from_trash</span></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></button>
                            </form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			{{ $trashed->onEachSide(5)->links() }}
		</div>
	</div>        
</div>
@push('script')
	<script>
		$('body').on('click', '.delete', function(e){
			e.preventDefault(); // prevent form submit
			var form = $(this).parents('form'); 
			Swal.fire({
				title: 'Are you sure Permanent Delete?',
				text: "You won't be able to revert this!",
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete it!'
			}).then((result) => {
				if (result.value) {
					form.submit();
				}
			})
		})
	</script>

	@if(session()->has('message'))	
	<script>
		window.swal.fire({
			position: 'top-end',
			icon: "{{ session('type') }}",
			title: "{{ session('message') }}",
			showConfirmButton: false,
			timer: 1500
		}).then(console.log)
			.catch(console.error);
	</script>
	@endif
@endpush

@endsection