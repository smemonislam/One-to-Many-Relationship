@extends('layouts.app')

@section('title', 'Edit Cateogry')

@section('content')
<!-- Edit Modal HTML -->
<div id="editEmployeeModal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form action="{{ route('category.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
				<div class="modal-header">						
					<h4 class="modal-title">Edit Category</h4>
					<a href="{{ route('category.index') }}" class="btn btn-danger d-flex"><i class="material-icons">&#xE15C;</i> <span>Back</span></a>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Category Name</label>
						<input name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ $category->name }}" >
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
@endsection