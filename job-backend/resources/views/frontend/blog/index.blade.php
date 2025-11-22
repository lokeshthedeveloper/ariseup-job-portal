@extends('layouts.frontend')

@section('title', 'Blog - ' . config('app.name'))
@section('meta_description', 'Read career tips, job search advice, and industry insights on our blog.')
@section('body-class', 'blog-page')

@section('content')

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="container">
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="current">Blog</li>
                </ol>
            </nav>
            <h1>Blog</h1>
        </div>
    </div><!-- End Page Title -->

    <!-- Blog Posts Section -->
    <section id="blog-posts" class="blog-posts section">

        <div class="container">
            <div class="row gy-4">

                @foreach ($posts as $post)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <article>

                            <div class="post-img">
                                <img src="{{ $post['image'] }}" alt="{{ $post['title'] }}" class="img-fluid">
                            </div>

                            <p class="post-category">{{ $post['category'] }}</p>

                            <h2 class="title">
                                <a href="{{ route('blog.show', $post['slug']) }}">{{ $post['title'] }}</a>
                            </h2>

                            <div class="d-flex align-items-center">
                                <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80"
                                    alt="" class="img-fluid post-author-img shrink-0">
                                <div class="post-meta">
                                    <p class="post-author">{{ $post['author'] }}</p>
                                    <p class="post-date">
                                        <time
                                            datetime="{{ $post['created_at']->format('Y-m-d') }}">{{ $post['created_at']->format('M d, Y') }}</time>
                                    </p>
                                </div>
                            </div>

                            <p class="post-excerpt">{{ $post['excerpt'] }}</p>

                            <div class="d-flex align-items-center justify-content-between">
                                <a href="{{ route('blog.show', $post['slug']) }}" class="readmore stretched-link">
                                    <span>Read More</span>
                                    <i class="bi bi-arrow-right"></i>
                                </a>
                                <p class="post-views"><i class="bi bi-eye"></i> {{ number_format($post['views']) }}</p>
                            </div>

                        </article>
                    </div>
                @endforeach

            </div>

            <!-- Pagination -->
            @if ($total > $perPage)
                <div class="row mt-5">
                    <div class="col-12">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                @php
                                    $totalPages = ceil($total / $perPage);
                                @endphp

                                @if ($currentPage > 1)
                                    <li class="page-item">
                                        <a class="page-link" href="?page={{ $currentPage - 1 }}" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                @endif

                                @for ($i = 1; $i <= $totalPages; $i++)
                                    <li class="page-item {{ $i == $currentPage ? 'active' : '' }}">
                                        <a class="page-link" href="?page={{ $i }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                @if ($currentPage < $totalPages)
                                    <li class="page-item">
                                        <a class="page-link" href="?page={{ $currentPage + 1 }}" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                </div>
            @endif

        </div>

    </section><!-- /Blog Posts Section -->

@endsection

@push('styles')
    <style>
        .page-title {
            background: linear-gradient(rgba(63, 187, 192, 0.8), rgba(63, 187, 192, 0.8)), url('https://images.unsplash.com/photo-1486312338219-ce68d2c6f44d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80') center center;
            background-size: cover;
            padding: 60px 0;
            margin-bottom: 60px;
        }

        .page-title h1 {
            color: #fff;
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .breadcrumbs {
            margin-bottom: 20px;
        }

        .breadcrumbs ol {
            display: flex;
            flex-wrap: wrap;
            list-style: none;
            padding: 0;
            margin: 0;
            font-size: 14px;
        }

        .breadcrumbs ol li+li {
            padding-left: 10px;
        }

        .breadcrumbs ol li+li::before {
            display: inline-block;
            padding-right: 10px;
            color: rgba(255, 255, 255, 0.7);
            content: "/";
        }

        .breadcrumbs ol a {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
        }

        .breadcrumbs ol a:hover,
        .breadcrumbs ol .current {
            color: #fff;
        }

        .blog-posts article {
            background: #fff;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
            padding: 30px;
            height: 100%;
            border-radius: 8px;
            transition: 0.3s;
        }

        .blog-posts article:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
        }

        .post-img {
            overflow: hidden;
            margin: -30px -30px 20px -30px;
            border-radius: 8px 8px 0 0;
        }

        .post-img img {
            transition: 0.3s;
        }

        .blog-posts article:hover .post-img img {
            transform: scale(1.1);
        }

        .post-category {
            display: inline-block;
            padding: 5px 15px;
            background: #3fbbc0;
            color: #fff;
            border-radius: 4px;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .title {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .title a {
            color: #2c4964;
            text-decoration: none;
            transition: 0.3s;
        }

        .title a:hover {
            color: #3fbbc0;
        }

        .post-author-img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 15px;
            object-fit: cover;
        }

        .post-meta {
            flex-grow: 1;
        }

        .post-meta p {
            margin: 0;
            color: #555;
            font-size: 14px;
        }

        .post-author {
            font-weight: 700;
            color: #2c4964;
        }

        .post-excerpt {
            margin-top: 20px;
            margin-bottom: 20px;
            color: #555;
            line-height: 1.6;
        }

        .readmore {
            color: #3fbbc0;
            text-decoration: none;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: 0.3s;
        }

        .readmore:hover {
            color: #2c4964;
        }

        .post-views {
            color: #777;
            font-size: 14px;
            margin: 0;
        }

        .pagination .page-link {
            color: #3fbbc0;
            border: 1px solid #dee2e6;
        }

        .pagination .page-item.active .page-link {
            background-color: #3fbbc0;
            border-color: #3fbbc0;
            color: #fff;
        }

        .pagination .page-link:hover {
            background-color: #65c9cd;
            border-color: #3fbbc0;
            color: #fff;
        }
    </style>
@endpush
