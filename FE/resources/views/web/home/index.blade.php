@extends('web.layouts.app')
@section('title', 'Cổng Thông Tin Tuyển Sinh Thạc Sĩ KHDL')

@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1 class="display-4 fw-bold">Cổng Thông Tin Thạc Sĩ Khoa Học Dữ Liệu</h1>
            <p class="lead mt-3">Nền tảng hỗ trợ tra cứu tài liệu, quản lý khóa học và luận văn hiệu quả dành cho học
                viên cao học.</p>
            <a href="#" class="btn btn-warning btn-lg mt-4 shadow-sm"
                style="text-transform: uppercase; font-weight: 500;">Đăng Ký Học</a>
        </div>
    </section>

    <!-- Statistics -->
    <section class="container text-center mt-5">
        <div class="row g-4">
            <div class="col-md-3">
                <div class="stats-card">
                    <i class="fas fa-book fa-2x text-primary mb-2"></i>
                    <h3>120+</h3>
                    <p>Khóa học</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <i class="fas fa-chalkboard-teacher fa-2x text-success mb-2"></i>
                    <h3>35+</h3>
                    <p>Giảng viên</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <i class="fas fa-file-alt fa-2x text-warning mb-2"></i>
                    <h3>500+</h3>
                    <p>Tài liệu</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stats-card">
                    <i class="fas fa-scroll fa-2x text-danger mb-2"></i>
                    <h3>180+</h3>
                    <p>Luận văn</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Announcements -->
    <section class="container">
        <h2 class="section-title mb-5">📢 Thông báo mới nhất</h2>
        <div class="announcement-list">
            @foreach ($announcements as $index => $item)
                <div class="announcement-item">
                    <a href="{{ route('web.announcements.show', $item['id']) }}" class="text-decoration-none">
                        <h6>[{{ \Carbon\Carbon::parse($item['createdAt'])->format('d/m/Y') }}] {{ $item['title'] }}</h6>
                    </a>
                    <p>{{ \Illuminate\Support\Str::limit(strip_tags($item['content']), 200) }}</p>
                </div>
            @endforeach
        </div>
        @if ($totalPages > 1)
            <div class="card-footer clearfix mt-4">
                <ul class="pagination pagination-sm m-0 float-right">
                    @for ($i = 1; $i <= $totalPages; $i++)
                        <li class="page-item {{ $i == $page ? 'active' : '' }}">
                            <a class="page-link"
                                href="{{ route('web.home', ['page' => $i, 'search' => request('search')]) }}">{{ $i }}</a>
                        </li>
                    @endfor
                </ul>
            </div>
        @endif
    </section>

    <!-- Documents -->
    <section class="container">
        <h2 class="section-title mb-4">
            📚 Tài liệu mới cập nhật
        </h2>
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead>
                    <tr>
                        <th class="text-center">STT</th>
                        <th class="text-center">Tên tài liệu</th>
                        <th class="text-center">Môn học</th>
                        <th class="text-center">Mô tả</th>
                        <th class="text-center">Tải</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($documents as $index => $item)
                        <tr>
                            <td class="text-center">{{ ($page - 1) * 10 + $index + 1 }}</td>
                            <td class="text-center">{{ $item['title'] }}</td>
                            <td class="text-center">{{ $item['course']['name'] ?? 'Không rõ' }}</td>
                            <td>{{ \Illuminate\Support\Str::limit(strip_tags($item['description']), 100) }}</td>
                            <td class="text-center">
                                <a href="http://127.0.0.1:3001{{ $item['file_path'] }}" class="btn btn-sm btn-outline-primary"
                                    target="_blank">
                                    <i class="fa-solid fa-download"></i> Tải
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="text-center mt-3">
            <a href="{{ route('web.documents.index') }}" class="btn btn-sm btn-outline-primary" style="background-color: #1a237e; color: white; border-color: #1a237e;"> Xem Tất Cả</a>
        </div>
    </section>

    <!-- Theses -->
    <section class="container mb-5">
        <h2 class="section-title">📄 Luận văn mới cập nhật</h2>
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead>
                    <tr>
                        <th class="text-center">STT</th>
                        <th class="text-center">Tên luận văn</th>
                        <th class="text-center">Tác giả</th>
                        <th class="text-center">Năm</th>
                        <th class="text-center">Tải về</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($thesis as $index => $item)
                        <tr>
                            <td class="text-center">{{ ($page - 1) * 10 + $index + 1 }}</td>
                            <td>{{ $item['title'] }}</td>
                            <td class="text-center">{{ $item['author_name'] ?? 'Chưa rõ' }}</td>
                            <td class="text-center">{{ $item['year'] ?? 'N/A' }}</td>
                            <td class="text-center">
                                @if (!empty($item['file_path']))
                                    <a href="http://127.0.0.1:3001{{ $item['file_path'] }}" class="btn btn-sm btn-outline-primary"
                                        target="_blank">
                                        <i class="fa-solid fa-download"></i> Tải
                                    </a>
                                @else
                                    <span class="text-muted">Chưa có</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="text-center mt-3">
            <a href="{{ route('web.theses.index') }}" class="btn btn-sm btn-outline-primary" style="background-color: #1a237e; color: white; border-color: #1a237e;"> Xem Tất Cả</a>
        </div>
    </section>
@endsection