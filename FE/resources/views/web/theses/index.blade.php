@extends('web.layouts.app')
@section('title', 'Luận Văn')

@section('content')
    <section class="page-header">
        <div class="container">
            <h1 class="fw-bold">Danh sách luận văn</h1>
            <p class="lead">Tổng hợp các luận văn trong khoa</p>
        </div>
    </section>
    <section class="container py-5">
        <form method="GET" action="{{ route('web.theses.index') }}" class="mb-4" style="max-width: 300px;">
            <div class="input-group input-group-sm">
                <input type="text" name="search" class="form-control"
                    placeholder="Tìm luận văn..." value="{{ request('search') }}">
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
                        <th class="text-center">Tên luận văn</th>
                        <th class="text-center">Tác giả</th>
                        <th class="text-center">Năm</th>
                        <th class="text-center">Tải về</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($theses as $index => $item)
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

        @if ($totalPages > 1)
            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                    @for ($i = 1; $i <= $totalPages; $i++)
                        <li class="page-item {{ $i == $page ? 'active' : '' }}">
                            <a class="page-link" href="{{ route('web.theses.index', ['page' => $i, 'search' => request('search')]) }}">{{ $i }}</a>
                        </li>
                    @endfor
                </ul>
            </div>
        @endif
    </section>
@endsection