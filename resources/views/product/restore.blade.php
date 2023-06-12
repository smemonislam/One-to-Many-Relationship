@extends('layouts.app')

@section('title', 'Restore User')

@section('content')
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>All Restore <b>Post</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="{{ route('posts.create') }}" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Add New Post</span></a>
						<a href="{{ route('posts.index') }}" class="btn btn-danger"><i class="material-icons">&#xE15C;</i> <span>Back</span></a>						
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">				
				<thead>
					<tr>
						<th>SL</th>
						<th>User Name</th>
						<th>User Post</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					
					@foreach( $trashed as $row )
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $row->user?->name }} </td>
						<td>
							<h5>{{ $row->title }}</h5>
							<p>{{ $row->content }}</p>	
						</td>					
						<td>
                            <form action="{{ route('posts.delete', $row->id) }}" method="POST" class="d-flex">
                                <a href="{{ route('posts.restore', $row->id) }}" class="edit"><span class="material-icons">restore_from_trash</span></a>
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