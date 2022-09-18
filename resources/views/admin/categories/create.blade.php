@extends('layouts.admin')
@section('category', 'active')
@section('page_title', 'Category Create')

@section('content')

    <div class="page-header d-md-flex justify-content-between">
        <div>
            <h3>Create Page</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('home') }}">Home</a>
                    </li>

                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.categories.index') }}">Category</a>
                    </li>

                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </nav>
        </div>

        <div class="mt-2 mt-md-0">
            <a href="{{ route('admin.categories.index') }}" class="btn btn-primary">
                 View All
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Category Create</h6>

                            @include('include.admin.message')

                            <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="col-md-6 mb-4">
                                        <label for="exampleInputPassword1">Title <span class="text-danger">*</span></label>
                                        <input name="title" value="{{ old('title') }}" type="text" class="form-control">
                                    </div>



                                    <div class="col-md-6 mb-4">
                                        <label for="exampleInputEmail1">Preview Image</label>
                                        <input name="preview_img" value="{{ old('preview_img') }}" type="file" class="form-control" >
                                        <small>( Formate : jpg, png )</small>
                                    </div>

                                    <div class="col-md-12 mb-4">
                                        <label for="exampleInputPassword1">Description</label>
                                        <textarea name="description" type="text" class="form-control">{{ old('description') }}</textarea>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




{{-- exta js  --}}
@section('exta_js')
    <script>
        // select2
        $('.select2-example').select2({
            placeholder: 'Select'
        });
    </script>
@endsection
