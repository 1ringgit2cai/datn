@extends('web.layouts.app')
@section('title', $course['name'])

@section('content')
    <section class="page-header">
        <div class="container">
            <h1 class="fw-bold">{{ $course['name'] }}</h1>
            <p class="lead">Mã môn học: {{ $course['course_code'] }} - {{ $course['credits'] }} tín chỉ</p>
        </div>
    </section>
    <section class="container py-5">
        <div class="course-detail">
            <div class="course-description">
                {!! $course['description'] !!}
            </div>
        </div>

        <!-- Latest Announcements -->
        <div class="announcement-list">
            <h4 class="mb-4" style="color: #1a237e;"><i class="fa-solid fa-bell"></i> Thông báo mới nhất</h4>
            <hr>
            @foreach ($announcements['data'] as $index => $item)
                <div class="announcement-item">
                    <a href="{{ route('web.announcements.show', $item['id']) }}" class="text-decoration-none"><h6>[{{ \Carbon\Carbon::parse($item['createdAt'])->format('d/m/Y') }}] {{ $item['title'] }}</h6></a>
                    <p>{{ \Illuminate\Support\Str::limit(strip_tags($item['content']), 200) }}</p>
                </div>
            @endforeach
        </div>
    </section>
@endsection