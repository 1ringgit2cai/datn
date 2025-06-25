@extends('admin.layouts.app')
@section('title', 'Thêm Khóa Học')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Quản Lý Khóa Học</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Trang Chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.courses.index') }}">Quản Lý Khóa Học</a></li>
                    <li class="breadcrumb-item active">Thêm Khóa Học</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Nhập thông tin khóa học</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.courses.store') }}">
                            @csrf

                            <div class="form-group">
                                <label>Mã Khóa Học</label>
                                <input type="text" class="form-control" name="course_code" value="{{ old('course_code') }}" placeholder="Nhập mã khóa học" required>
                                @error('course_code') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label>Tên Khóa Học</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Nhập tên khóa học" required>
                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label>Mô Tả</label>
                                <textarea class="form-control" id="editor" name="description" rows="5" placeholder="Nhập mô tả khóa học">{{ old('description') }}</textarea>
                                @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                                <label>Số Tín Chỉ</label>
                                <input type="number" class="form-control" name="credits" value="{{ old('credits') }}" min="0" placeholder="Nhập số tín chỉ" required>
                                @error('credits') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="text-right">
                                <a class="btn btn-secondary" href="{{ route('admin.courses.index') }}">Quay Lại</a>
                                <button type="submit" class="btn btn-primary">Thêm Khóa Học</button>
                            </div>
                        </form>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</section>
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => console.error(error));
</script>
@endsection
