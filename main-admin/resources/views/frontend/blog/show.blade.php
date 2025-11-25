@extends('layouts.frontend')

@section('title', $post['title'] . ' - ' . config('app.name'))
@section('meta_description', $post['excerpt'])
@section('body-class', 'blog-details-page')

@section('content')

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
        <div class="container">
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('blog.index') }}">Blog</a></li>
                    <li class="current">{{ $post['title'] }}</li>
                </ol>
            </nav>
            <h1>Blog Details</h1>
        </div>
    </div><!-- End Page Title -->

    <!-- Blog Details Section -->
    <section id="blog-details" class="blog-details section">

        <div class="container">

            <div class="row">

                <!-- Main Content -->
                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">

                    <article class="article">

                        <div class="post-img">
                            <img src="{{ $post['image'] }}" alt="{{ $post['title'] }}" class="img-fluid">
                        </div>

                        <h2 class="title">{{ $post['title'] }}</h2>

                        <div class="meta-top">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                        href="#">{{ $post['author'] }}</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time
                                            datetime="{{ $post['created_at']->format('Y-m-d') }}">{{ $post['created_at']->format('M d, Y') }}</time></a>
                                </li>
                                <li class="d-flex align-items-center"><i class="bi bi-eye"></i> <a
                                        href="#">{{ number_format($post['views']) }} Views</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-folder"></i> <a
                                        href="#">{{ $post['category'] }}</a></li>
                            </ul>
                        </div><!-- End meta top -->

                        <div class="content">
                            {!! $post['content'] !!}
                        </div><!-- End post content -->

                        <div class="meta-bottom">
                            <i class="bi bi-tags"></i>
                            <ul class="tags">
                                <li><a href="#">Career</a></li>
                                <li><a href="#">Job Search</a></li>
                                <li><a href="#">Tips</a></li>
                            </ul>
                        </div><!-- End meta bottom -->

                    </article><!-- End article -->

                    <!-- Post Author -->
                    <div class="post-author d-flex align-items-center">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80"
                            class="rounded-circle shrink-0" alt="">
                        <div>
                            <h4>{{ $post['author'] }}</h4>
                            <div class="social-links">
                                <a href="#"><i class="bi bi-twitter-x"></i></a>
                                <a href="#"><i class="bi bi-facebook"></i></a>
                                <a href="#"><i class="bi bi-linkedin"></i></a>
                            </div>
                            <p>
                                Career advisor and HR professional with over 10 years of experience helping people find
                                their dream jobs and advance their careers.
                            </p>
                        </div>
                    </div><!-- End post author -->

                </div>

                <!-- Sidebar -->
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">

                    <div class="sidebar">

                        <!-- Search Widget -->
                        <div class="sidebar-widget search-form">
                            <h3 class="sidebar-title">Search</h3>
                            <form action="{{ route('blog.index') }}" method="get" class="sidebar-search-form">
                                <input type="text" name="search" placeholder="Search...">
                                <button type="submit"><i class="bi bi-search"></i></button>
                            </form>
                        </div><!-- End Search Widget -->

                        <!-- Categories Widget -->
                        <div class="sidebar-widget categories">
                            <h3 class="sidebar-title">Categories</h3>
                            <ul class="categories-list">
                                @foreach ($categories as $category)
                                    <li><a href="{{ route('blog.index') }}?category={{ urlencode($category) }}">{{ $category }}
                                            <span>(12)</span></a></li>
                                @endforeach
                            </ul>
                        </div><!-- End Categories Widget -->

                        <!-- Recent Posts Widget -->
                        <div class="sidebar-widget recent-posts">
                            <h3 class="sidebar-title">Recent Posts</h3>
                            @foreach ($recentPosts as $recentPost)
                                <div class="post-item">
                                    <img src="{{ $recentPost['image'] }}" alt="{{ $recentPost['title'] }}"
                                        class="flex-shrink-0">
                                    <div>
                                        <h4><a
                                                href="{{ route('blog.show', $recentPost['slug']) }}">{{ $recentPost['title'] }}</a>
                                        </h4>
                                        <time
                                            datetime="{{ $recentPost['created_at']->format('Y-m-d') }}">{{ $recentPost['created_at']->format('M d, Y') }}</time>
                                    </div>
                                </div><!-- End recent post item -->
                            @endforeach
                        </div><!-- End Recent Posts Widget -->

                        <!-- Tags Widget -->
                        <div class="sidebar-widget tags">
                            <h3 class="sidebar-title">Tags</h3>
                            <ul>
                                <li><a href="#">Career</a></li>
                                <li><a href="#">Jobs</a></li>
                                <li><a href="#">Resume</a></li>
                                <li><a href="#">Interview</a></li>
                                <li><a href="#">Tips</a></li>
                                <li><a href="#">Guide</a></li>
                                <li><a href="#">Remote Work</a></li>
                                <li><a href="#">Skills</a></li>
                                <li><a href="#">Salary</a></li>
                            </ul>
                        </div><!-- End Tags Widget -->

                    </div>

                </div>

            </div>

        </div>

    </section><!-- /Blog Details Section -->

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

        .article {
            background: #fff;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
            padding: 30px;
            border-radius: 8px;
        }

        .article .post-img {
            margin: -30px -30px 30px -30px;
            overflow: hidden;
            border-radius: 8px 8px 0 0;
        }

        .article .title {
            font-size: 32px;
            font-weight: 700;
            color: #2c4964;
            margin-bottom: 20px;
        }

        .article .meta-top {
            margin-bottom: 30px;
        }

        .article .meta-top ul {
            display: flex;
            flex-wrap: wrap;
            list-style: none;
            padding: 0;
            margin: 0;
            gap: 20px;
        }

        .article .meta-top ul li {
            color: #555;
            font-size: 14px;
        }

        .article .meta-top ul li i {
            color: #3fbbc0;
            margin-right: 5px;
        }

        .article .meta-top ul li a {
            color: #555;
            text-decoration: none;
        }

        .article .meta-top ul li a:hover {
            color: #3fbbc0;
        }

        .article .content {
            line-height: 1.8;
            color: #555;
        }

        .article .content h3 {
            font-size: 24px;
            font-weight: 700;
            color: #2c4964;
            margin-top: 30px;
            margin-bottom: 15px;
        }

        .article .content ul,
        .article .content ol {
            margin-bottom: 20px;
        }

        .article .content ul li,
        .article .content ol li {
            margin-bottom: 10px;
        }

        .article .content blockquote {
            border-left: 4px solid #3fbbc0;
            padding: 20px;
            background: #f8f9fa;
            margin: 30px 0;
            font-style: italic;
        }

        .article .meta-bottom {
            margin-top: 30px;
            padding-top: 30px;
            border-top: 1px solid #dee2e6;
        }

        .article .meta-bottom i {
            color: #3fbbc0;
            margin-right: 10px;
        }

        .article .meta-bottom .tags {
            display: inline-flex;
            flex-wrap: wrap;
            list-style: none;
            padding: 0;
            margin: 0;
            gap: 10px;
        }

        .article .meta-bottom .tags li a {
            display: inline-block;
            padding: 5px 15px;
            background: #f8f9fa;
            color: #555;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
            transition: 0.3s;
        }

        .article .meta-bottom .tags li a:hover {
            background: #3fbbc0;
            color: #fff;
        }

        .post-author {
            background: #f8f9fa;
            padding: 30px;
            margin-top: 30px;
            border-radius: 8px;
        }

        .post-author img {
            width: 80px;
            height: 80px;
            margin-right: 20px;
            object-fit: cover;
        }

        .post-author h4 {
            font-size: 20px;
            font-weight: 700;
            color: #2c4964;
            margin-bottom: 10px;
        }

        .post-author .social-links {
            margin-bottom: 15px;
        }

        .post-author .social-links a {
            color: #555;
            margin-right: 10px;
            font-size: 18px;
            transition: 0.3s;
        }

        .post-author .social-links a:hover {
            color: #3fbbc0;
        }

        .post-author p {
            color: #555;
            margin: 0;
            line-height: 1.6;
        }

        /* Sidebar Styles */
        .sidebar {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
        }

        .sidebar .sidebar-widget {
            margin-bottom: 40px;
        }

        .sidebar .sidebar-widget:last-child {
            margin-bottom: 0;
        }

        .sidebar .sidebar-title {
            font-size: 20px;
            font-weight: 700;
            color: #2c4964;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #3fbbc0;
        }

        .sidebar .search-form .sidebar-search-form {
            position: relative;
        }

        .sidebar .search-form input {
            width: 100%;
            padding: 12px 50px 12px 15px;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            font-size: 14px;
        }

        .sidebar .search-form button {
            position: absolute;
            right: 0;
            top: 0;
            bottom: 0;
            padding: 0 20px;
            background: #3fbbc0;
            color: #fff;
            border: none;
            border-radius: 0 4px 4px 0;
            cursor: pointer;
            transition: 0.3s;
        }

        .sidebar .search-form button:hover {
            background: #65c9cd;
        }

        .sidebar .categories-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar .categories-list li {
            padding: 10px 0;
            border-bottom: 1px solid #dee2e6;
        }

        .sidebar .categories-list li:last-child {
            border-bottom: none;
        }

        .sidebar .categories-list li a {
            color: #555;
            text-decoration: none;
            display: flex;
            justify-content: space-between;
            transition: 0.3s;
        }

        .sidebar .categories-list li a:hover {
            color: #3fbbc0;
        }

        .sidebar .categories-list li a span {
            color: #999;
        }

        .sidebar .recent-posts .post-item {
            display: flex;
            margin-bottom: 20px;
        }

        .sidebar .recent-posts .post-item:last-child {
            margin-bottom: 0;
        }

        .sidebar .recent-posts .post-item img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 4px;
            margin-right: 15px;
        }

        .sidebar .recent-posts .post-item h4 {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .sidebar .recent-posts .post-item h4 a {
            color: #2c4964;
            text-decoration: none;
            transition: 0.3s;
        }

        .sidebar .recent-posts .post-item h4 a:hover {
            color: #3fbbc0;
        }

        .sidebar .recent-posts .post-item time {
            font-size: 14px;
            color: #999;
        }

        .sidebar .tags ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .sidebar .tags ul li a {
            display: inline-block;
            padding: 5px 15px;
            background: #f8f9fa;
            color: #555;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
            transition: 0.3s;
        }

        .sidebar .tags ul li a:hover {
            background: #3fbbc0;
            color: #fff;
        }
    </style>
@endpush
