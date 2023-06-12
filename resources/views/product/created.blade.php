
@extends('layouts.app')

@section('title', 'Add Product')

@section('content')
<!-- Add Post -->
<div id="addEmployeeModal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form action="{{ route('product.store') }}" method="POST">
                @csrf
				<div class="modal-header">						
					<h4 class="modal-title">Add Product</h4>
					<a href="{{ route('product.index') }}" class="btn btn-danger d-flex"><i class="material-icons">&#xE15C;</i> <span>Back</span></a>
				</div>
				<div class="modal-body">	
					<div class="form-group">
						<label>Product Name</label>
						<select name="category_id" id="" class="custom-select form-control @error('category_id') is-invalid @enderror">
							<option value="" disabled selected>Select Category</option>								
							@foreach ($category as $id => $row)
								<option value="{{ $id }}">{{ $row }}</option>
							@endforeach
						</select>
						@error('category_id')
							<div class="alert alert-danger">{{ $message }}</div>
						@enderror
					</div>
					<div class="form-group">
						<label>Product Name</label>
						<input name="name" type="text" class="form-control @error('name') is-invalid @enderror">
						@error('name')
							<div class="alert alert-danger">{{ $message }}</div>
						@enderror
					</div>
					<div class="form-group">
						<label>Product Price</label>
						<input name="price" type="text" class="form-control @error('price') is-invalid @enderror">
						@error('price')
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