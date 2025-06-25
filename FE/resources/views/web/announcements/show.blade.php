@extends('web.layouts.app')
@section('title', 'Thông Báo')

@section('content')
    <section class="page-header">
        <div class="container" style="padding-bottom: 45px;">
            <h1 class="fw-bold" style="line-height: 1.5;">{{ $announcement['title'] }}</h1>
            <p class="lead mt-4">
                <i class="fa-solid fa-calendar-days"></i> Ngày đăng:
                {{ \Carbon\Carbon::parse($announcement['createdAt'])->format('d/m/Y') }}
            </p>
        </div>
    </section>
    <section class="container">
        <div class="announcement-card">
            <div class="announcement-body">
                {!! $announcement['content'] !!}
            </div>
        </div>

        <!-- Latest Announcements -->
        <div class="announcement-list mb-5 mt-5">
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