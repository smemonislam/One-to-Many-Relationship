
@extends('layouts.app')

@section('title', 'New Category')

@section('content')
<!-- Add Post -->
<div id="addEmployeeModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="{{ route('category.store') }}" method="POST">
                @csrf
				<div class="modal-header">						
					<h4 class="modal-title">New Category</h4>
					<a href="{{ route('category.index') }}" class="btn btn-danger d-flex"><i class="material-icons">&#xE15C;</i> <span>Back</span></a>
				</div>
				<div class="modal-body">	
					<div class="form-group">
						<label>Category Name</label>
						<input name="name" type="text" class="form-control @error('name') is-invalid @enderror">
						@error('name')
							<div class="alert alert-danger">{{ $message }}</div>
						@enderror
					</div>	
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-success" value="Submit">
				</div>
			</form>
		</div>
	</div>
</div>

@push('script')
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