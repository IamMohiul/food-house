@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Why Choose Us</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Create Item</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.why-choose-us.update', $WhyChooseUs->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Icon</label>
                        <br>
                        <button data-icon="{{ $WhyChooseUs->icon }}" data-selected-class="btn-danger" data-unselected-class="btn-info" class="btn btn-primary" role="iconpicker" name="icon"></button>
                    </div>
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $WhyChooseUs->title }}">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ $WhyChooseUs->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>status</label>
                        <select name="status" id="" class="form-control">
                            <option @selected($WhyChooseUs->status === 1) value="1">Active</option>
                            <option @selected($WhyChooseUs->status === 0) value="0">In Active</option>
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
