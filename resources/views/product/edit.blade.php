@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
<!-- Edit Modal HTML -->
<div id="editEmployeeModal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form action="{{ route('product.update', $product->id) }}" method="POST">
                @csrf
                @method('PUT')
				<div class="modal-header">						
					<h4 class="modal-title">Edit Product</h4>
					<a href="{{ route('product.index') }}" class="btn btn-danger d-flex"><i class="material-icons">&#xE15C;</i> <span>Back</span></a>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Product Name</label>
						<select name="category_id" id="" class="custom-select form-control @error('category_id') is-invalid @enderror">								
							@foreach ($category as $id => $row)
								<option value="{{ $id }}" @selected($id == $product->category_id)>{{ $row }}</option>
							@endforeach
						</select>
						@error('category_id')
							<div class="alert alert-danger">{{ $message }}</div>
						@enderror
					</div>
					<div class="form-group">
						<label>Product Name</label>
						<input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $product->name }}">
						@error('name')
							<div class="alert alert-danger">{{ $message }}</div>
						@enderror
					</div>
					<div class="form-group">
						<label>Product Price</label>
						<input name="price" type="text" class="form-control @error('price') is-invalid @enderror" value="{{ $product->price }}">
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
@endsection