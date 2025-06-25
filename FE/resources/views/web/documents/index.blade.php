@extends('web.layouts.app')
@section('title', 'Tài Liệu')

@section('content')
    <section class="page-header">
        <div class="container">
            <h1 class="fw-bold">Danh sách tài liệu</h1>
            <p class="lead">Tổng hợp các tài liệu môn học</p>
        </div>
    </section>
    <section class="container py-5">
        <form method="GET" action="{{ route('web.documents.index') }}" class="mb-4" style="max-width: 300px;">
            <div class="input-group input-group-sm">
                <input type="text" name="search" class="form-control"
                    placeholder="Tìm tài liệu..." value="{{ request('search') }}">
                <button class="btn btn-outline-secondary" style="background-color: #1a237e; color: white;" type="submit" title="Tìm kiếm">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </form>
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

        @if ($totalPages > 1)
            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    @for ($i = 1; $i <= $totalPages; $i++)
                        <li class="page-item {{ $i == $page ? 'active' : '' }}">
                            <a class="page-link" href="{{ route('web.documents.index', ['page' => $i, 'search' => request('search')]) }}">{{ $i }}</a>
                        </li>
                    @endfor
                </ul>
            </div>
        @endif
    </section>
@endsection