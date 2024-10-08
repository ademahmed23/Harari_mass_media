@extends('admin.layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Category</h1>
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h4>Update Category</h4>

        </div>
        <div class="card-body">
            <form action="{{ route('admin.category.update', $category1s->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $category1s->name }}">
                </div>

                <div class="form-group">
                    <label>Show at Home</label>
                    <select name="show_at_home" class="form-control" id="">
                        <option @selected($category1s->show_at_home === 1) value="1">Yes</option>
                        <option @selected($category1s->show_at_home === 0) value="0">No</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control" id="">
                        <option @selected($category1s->status === 1) value="1">Active</option>
                        <option @selected($category1s->status === 0) value="0">Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</section>
@endsection
