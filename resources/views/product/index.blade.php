@extends('layouts.app')

@section('title', 'Product')

@section('content')

<div class="container">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>All <strong>Product</strong></h2>
					</div>
					<div class="col-sm-6">
						<a href="{{ route('product.create') }}" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Add new Product</span></a>					
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">				
				<thead>
					<tr>
						<th>SL</th>
						<th>Category Name</th>
						<th>Product Name</th>
						<th>Product Slug</th>
						<th>Product Price</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					
					@forelse( $product as $row )
					<tr>
						<td>{{ $loop->iteration }}</td>
						<td>{{ $row->category->name }} </td>
						<td>{{ $row->name }} </td>
						<td>{{ $row->slug }} </td>
						<td>{{ $row->price }} tk </td>					
						<td>
                            <form action="{{ route('product.destroy', $row->id) }}" method="POST" class="d-flex">
                                <a href="{{ route('product.edit', $row->id) }}" class="edit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></button>
                            </form>
						</td>
					</tr>
					@empty 
						<tr>
							<td class="text-center mt-3" colspan="5">Not Found!</td>
						</tr>
					@endforelse
				</tbody>
			</table>
			{{ $product->onEachSide(5)->links() }}
		</div>
	</div>        
</div>

@push('script')
	<script>
		$('body').on('click', '.delete', function(e){
			e.preventDefault(); // prevent form submit
			var form = $(this).parents('form'); 
			Swal.fire({
				title: 'Are you sure?',
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