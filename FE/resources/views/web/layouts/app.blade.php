<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trang chủ - @yield('title', 'Cổng thông tin tuyển sinh Thạc Sĩ')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            scroll-behavior: smooth;
        }

        .hero {
            background: linear-gradient(to right, #1a237e, #3949ab);
            color: white;
            padding: 120px 0;
            text-align: center;
            background-image: url('https://ncube.com/wp-content/uploads/2020/02/shutterstock_1134885563-1.jpg');
        }

        .stats-card {
            border-radius: 1rem;
            padding: 30px;
            background: white;
            text-align: center;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .stats-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .section-title {
            margin: 70px 0 30px;
            font-weight: 700;
            font-size: 1.9rem;
            border-left: 6px solid #3949ab;
            padding-left: 18px;
            color: #1a237e;
            position: relative;
        }

        .section-title::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -10px;
            width: 60px;
            height: 3px;
            background: #ffcc80;
        }

        .card-title {
            font-weight: 600;
        }

        .navbar-brand span {
            font-weight: bold;
            color: #ffcc80;
        }

        .card {
            transition: all 0.3s ease-in-out;
            border: none;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.08);
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        }

        footer {
            background: #1a237e;
        }

        .btn-outline-primary:hover,
        .btn-success.btn-sm:hover {
            transform: scale(1.05);
        }

        .list-group-item-action:hover {
            background-color: #f1f1f1;
        }

        .page-header {
            background: linear-gradient(to right, #3f51b5, #1a237e);
            color: white;
            padding: 80px 0 60px;
            text-align: center;
        }

        .table thead th {
            background-color: #1a237e;
            color: #fff;
        }

        .table tbody tr:hover {
            background-color: #f1f1f1;
        }

        .course-detail {
            background: #fff;
            border-radius: 1rem;
            padding: 40px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 40px;
        }

        .course-title {
            color: #1a237e;
            font-size: 2rem;
            font-weight: bold;
        }

        .course-code {
            font-size: 1.1rem;
            color: #555;
            margin-bottom: 10px;
        }

        .course-credits {
            font-size: 1rem;
            color: #333;
            margin-bottom: 25px;
        }

        .course-description {
            font-size: 1.1rem;
            line-height: 2.5;
        }

        .announcement-list {
            background: #ffffff;
            border-radius: 1rem;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .announcement-item:not(:last-child) {
            border-bottom: 1px dashed #ccc;
            margin-bottom: 15px;
            padding-bottom: 15px;
        }

        .announcement-item h6 {
            color: #1a237e;
            font-weight: 600;
        }

        .announcement-section {
            padding: 80px 0 40px;
            background: linear-gradient(to right, #3f51b5, #1a237e);
            color: white;
            text-align: center;
        }

        .announcement-card {
            background: white;
            padding: 30px;
            border-radius: 1rem;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            margin-top: -40px;
            position: relative;
        }

        .announcement-item p {
            margin-bottom: 0px;
        }

        .announcement-title {
            color: #1a237e;
            font-weight: bold;
            font-size: 1.8rem;
        }

        .announcement-meta {
            font-size: 0.9rem;
            color: #555;
            margin-top: 10px;
        }

        .announcement-body {
            line-height: 2.5;
            font-size: 1.05rem;
        }

        .navbar {
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.4);
            z-index: 10;
            background-color: #283593;
        }

        .contact-buttons {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .btn-contact {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            background-color: white;
            padding: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            animation: pulse 2s infinite;
            transition: transform 0.3s ease;
        }

        .btn-contact:hover {
            transform: scale(1.1);
        }

        .contact-icon {
            width: 100%;
            height: 100%;
            object-fit: contain;
            border-radius: 50%;
        }

        /* Hiệu ứng nhấp nháy */
        @keyframes pulse {
            0% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(255, 193, 7, 0.6);
            }

            70% {
                transform: scale(1.05);
                box-shadow: 0 0 0 10px rgba(255, 193, 7, 0);
            }

            100% {
                transform: scale(1);
                box-shadow: 0 0 0 0 rgba(255, 193, 7, 0);
            }
        }

        .nav-link {
            font-weight: 500;
            color: white;
        }

        figure {
            text-align: center;
        }

        figure img {
            max-width: 100%;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color: #1a237e;">
        <div class="container">
            <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ route('web.home') }}">
                <i class="fas fa-graduation-cap me-2 text-warning"></i> MSc <span class="text-white ms-1">Portal</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                {{-- Menu chức năng bên trái --}}
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a href="{{ route('web.home') }}"
                            class="nav-link {{ request()->routeIs('web.home') ? 'active' : '' }}">
                            <i class="fas fa-home me-1"></i> Trang chủ
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('web.courses.index') }}"
                            class="nav-link {{ request()->routeIs('web.courses.*') ? 'active' : '' }}">
                            <i class="fas fa-book-open me-1"></i> Môn học
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-chalkboard-teacher me-1"></i> Giảng viên
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('web.documents.index') }}" class="nav-link">
                            <i class="fas fa-folder-open me-1"></i> Tài liệu
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('web.theses.index') }}" class="nav-link">
                            <i class="fas fa-file-alt me-1"></i> Luận văn
                        </a>
                    </li>
                </ul>

                {{-- Nút ứng tuyển bên phải --}}
                <div class="d-flex">
                    <button class="btn btn-warning btn-sm fw-bold" data-bs-toggle="modal"
                        data-bs-target="#registerModal">
                        <i class="fas fa-paper-plane me-1"></i> Đăng Ký Học
                    </button>
                </div>
            </div>
        </div>
    </nav>

    @yield('content')

    <div class="contact-buttons">
        <a href="https://www.facebook.com/fit.hcmus" class="btn-contact" target="_blank" title="Facebook">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/05/Facebook_Logo_%282019%29.png/500px-Facebook_Logo_%282019%29.png"
                style="width: 100%; height: 100%" alt="Messenger" class="contact-icon">
        </a>
        <a href="https://zalo.me/0937734004" class="btn-contact" target="_blank" title="Zalo">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/91/Icon_of_Zalo.svg/2048px-Icon_of_Zalo.svg.png"
                style="width: 100%; height: 100%" alt="Zalo" class="contact-icon">
        </a>
        <a href="mailto:info@fit.hcmus.edu.vn" class="btn-contact" title="Gmail">
            <img src="https://images.vexels.com/media/users/3/140928/isolated/preview/8d338f5acd60bfbc9b5fb1b208c8814f-outlined-email-round-icon.png?w=360"
                style="width: 100%; height: 100%" alt="Gmail" class="contact-icon">
        </a>
    </div>
    <!-- Modal Đăng ký -->
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content shadow-lg">
                <div class="modal-header text-white" style="background-color: #1a237e;">
                    <h5 class="modal-title" id="registerModalLabel">
                        <i class="fas fa-user-plus me-1"></i> Đăng Ký Học Thạc Sĩ
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <form action="{{ route('web.register.store') }}" method="POST">
                    @csrf
                    <div class="modal-body row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Họ và tên</label>
                            <input type="text" name="full_name"
                                class="form-control @error('full_name') is-invalid @enderror" placeholder="Họ và tên"
                                value="{{ old('full_name') }}" required>
                            @error('full_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Số điện thoại</label>
                            <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                placeholder="Số điện thoại" value="{{ old('phone') }}" required>
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                placeholder="Email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Quê quán</label>
                            <input type="text" name="address"
                                class="form-control @error('address') is-invalid @enderror" placeholder="Quê quán"
                                value="{{ old('address') }}" required>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Trình độ hiện tại</label>
                            <input type="text" name="education"
                                class="form-control @error('education') is-invalid @enderror"
                                placeholder="Cử nhân / Kỹ sư / Khác" value="{{ old('education') }}" required>
                            @error('education')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Chuyên ngành hiện tại</label>
                            <input type="text" name="major" class="form-control @error('major') is-invalid @enderror"
                                placeholder="Chuyên ngành" value="{{ old('major') }}" required>
                            @error('major')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" style="background-color: #1a237e;">
                            <i class="fas fa-paper-plane me-1"></i> Gửi Đăng Ký
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="text-white pt-5 pb-4" style="background-color: #1a237e;">
        <div class="container text-center text-md-start">
            <div class="row text-center text-md-start">
                <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 fw-bold text-warning">MSc Portal</h5>
                    <p>Cổng thông tin hỗ trợ học viên cao học ngành Khoa học Dữ liệu - Đại học KHTN.</p>
                </div>

                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 fw-bold text-warning">Chức năng</h5>
                    <p><a href="#" class="text-white text-decoration-none">Khóa học</a></p>
                    <p><a href="#" class="text-white text-decoration-none">Tài liệu</a></p>
                    <p><a href="#" class="text-white text-decoration-none">Luận văn</a></p>
                    <p><a href="#" class="text-white text-decoration-none">Giảng viên</a></p>
                </div>

                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 fw-bold text-warning">Hỗ trợ</h5>
                    <p><a href="#" class="text-white text-decoration-none">Hỏi đáp</a></p>
                    <p><a href="#" class="text-white text-decoration-none">Tài khoản</a></p>
                    <p><a href="#" class="text-white text-decoration-none">Hướng dẫn sử dụng</a></p>
                    <p><a href="#" class="text-white text-decoration-none">Liên hệ</a></p>
                </div>

                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                    <h5 class="text-uppercase mb-4 fw-bold text-warning">Liên hệ</h5>
                    <p><i class="fas fa-home me-3"></i> 227 Nguyễn Văn Cừ, Q.5, TP.HCM</p>
                    <p><i class="fas fa-envelope me-3"></i> admin@fit.hcmus.edu.vn</p>
                    <p><i class="fas fa-phone me-3"></i> (028) 3835 2196</p>
                    <p><i class="fas fa-globe me-3"></i> www.fit.hcmus.edu.vn</p>
                </div>
            </div>

            <hr class="my-3">

            <div class="row d-flex justify-content-between">
                <div class="col-md-7 col-lg-8">
                    <p class="text-white">© 2025 MSc Portal - Phát triển bởi nhóm hệ thống thông tin - Đại học KHTN</p>
                </div>
                <div class="col-md-5 col-lg-4">
                    <div class="text-center text-md-end">
                        <a href="#" class="text-white me-4"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white me-4"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="text-white me-4"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>