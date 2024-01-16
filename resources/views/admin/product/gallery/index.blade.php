@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Product Gallery ({{ $product->name }})</h1>
        </div>
        <div>
            <a href="{{ route('admin.product.index')}}" class="btn btn-primary my-2">← Go Back</a>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>All Image</h4>
            </div>
            <div class="card-body">
                <div class="col-md-8">
                    <form action="{{ route('admin.product-gallery.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="file" class="form-control" name="image" />
                            <input type="hidden" value="{{ $product->id }}" name="product_id">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <div class="card card-primary">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id='targetData'>
                        @foreach ($images as $image)
                            <tr>
                                <td><img src="{{ asset($image->image) }}" alt="" height="60px"></td>
                                <td><a href='{{ route('admin.product-gallery.destroy', $image->id) }}' class='btn btn-danger delete-item mx-2'><i class='fas fa-trash'></i></a></td>
                            </tr>
                        @endforeach
                            @if (count($images)===0)
                            <tr>
                                <td colspan="2" class="text-center">No Data Found.</td>
                            </tr>
                            @endif
                    </tbody>
                </table>

            </div>
        </div>
    </section>
@endsection
