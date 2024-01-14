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
                <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="status">status</label>
                        <select name="status" id="" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">InActive</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="show_at_home">Show At Home</label>
                        <select name="show_at_home" id="" class="form-control">
                            <option value="1">Yes</option>
                            <option selected value="0">No</option>
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
