@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Products</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Update Product</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Image</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">Choose File</label>
                            <input type="file" name="image" id="image-upload" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                    </div>
                    <div class="form-group">
                        <label for="category">status</label>
                        <select name="category" id="" class="form-control select2">
                            <option selected value="#">Select</option>
                            @foreach ($categories as $category)
                                <option @selected($product->category_id === $category->id) value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" name="price" class="form-control" value="{{ $product->price }}">
                    </div>
                    <div class="form-group">
                        <label for="offer_price">Offer Price</label>
                        <input type="text" name="offer_price" class="form-control"  value="{{ $product->offer_price }}">
                    </div>
                    <div class="form-group">
                        <label for="short_description">Short Description</label>
                        <textarea name="short_description" class="form-control" id="">{{ $product->short_description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="long_description">Long Description</label>
                        <textarea name="long_description" class="summernote form-control" id="">{!! $product->long_description !!}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="sku">SKU</label>
                        <input type="text" name="sku" class="form-control" value="{{ $product->sku }}">
                    </div>
                    <div class="form-group">
                        <label for="seo_title">SEO Title</label>
                        <input type="text" name="seo_title" class="form-control" value="{{ $product->seo_title }}">
                    </div>
                    <div class="form-group">
                        <label for="seo_description">SEO Description</label>
                        <textarea name="seo_description" class="form-control" id="">{!! $product->seo_description !!}</textarea>
                    </div>


                    <div class="form-group">
                        <label for="status">status</label>
                        <select name="status" id="" class="form-control">
                            <option @selected($category->status === 1) value="1">Active</option>
                            <option @selected($category->status === 0) value="0">InActive</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="show_at_home">Show At Home</label>
                        <select name="show_at_home" id="" class="form-control">
                            <option @selected($category->show_at_home === 1) value="1">Yes</option>
                            <option @selected($category->show_at_home === 0) value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        $('.image-preview').css({
            "background-image": `url({{ asset($product->thumb_image) }})` || 'none',
            "background-size":"cover",
            // "background-position":"center center";
        })
    })
</script>
@endpush
