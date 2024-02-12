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
        @foreach($blog->tags as $tag)
        <span class="blog_tags">{{ $tag->name }}</span>
        @endforeach
        <div class="button_container">
          <a class="green_button" href="{{ route('blogs.edit', $blog->id) }}">Edit Blog</a>
          <form method="POST" action="{{ route('blogs.destroy', $blog->id) }}">
              @csrf
              @method('DELETE')
              <button class="green_border_button" type="submit">Delete Blog</button>
          </form>
        </div>

    </div>


</body>
</html>
