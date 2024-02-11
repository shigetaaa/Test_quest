<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>conduit Blog Post</title>
</head>
<body>
        {{-- ヘッダーパーツの取り込み --}}
    @include('layouts.blog-header')
    <div class="blog-banner">
      <div class="main_container">
        <h1>{{ $blog->title }}</h1>
      </div>
    </div>

    <div class="main_container">
        <p>{{ $blog->content }}</p>
    </div>

</body>
</html>
