@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Product Category</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Create Category</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $category->name }}">
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
                        <button class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection