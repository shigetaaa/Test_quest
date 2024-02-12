<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('css/style.css') }}">
      <title>conduit</title>

  </head>
  <body>
      {{-- ヘッダーパーツの取り込み --}}
    @include('layouts.blog-header')
    <div class="home-banner">
      <h1>conduit</h1>
        <p>A place to share your knowledge.</p>
    </div>

    {{-- ここからメイン表示 --}}
    <div class="main_container">
      <div class="grid-container">
        <div>            {{-- フィード表示切替 --}}
            <ul>
              <li >
                <a class=home_nav_link href="#">Global Feed</a>
              </li>
            </ul>
            {{-- ブログ一覧表示 --}}
            <ul>
                @foreach ($blogs as $blog)
                <a href="{{ route('blogs.show', $blog->id) }}" class="blog_list_link">
                <div class="blog_list_container">
                    <li>
                        <h2>{{ $blog->title }}</h2>
                        <p class="subject_style">{{ $blog->subject }}</p>
                        <div class="blog_elements">
                            <span class="read_more">read more...</span>
                            <div>
                            @foreach($blog->tags as $tag)
                            <span class="blog_tags">{{ $tag->name }}</span>
                            @endforeach
                            </div>
                        </div>
                    </li>


                </div>
                </a>
                @endforeach
                <div> {{-- ページネーション表示 --}}
                    {{ $blogs->links() }}
                </div>
            </ul>
        </div>



        <div class="popular_tags_container">
{{-- タグ表示 --}}

            <div class="tag-list">
              <p>Popular Tags</p>
              <a href="" class="tag-pill tag-default">programming</a>
              <a href="" class="tag-pill tag-default">javascript</a>
              <a href="" class="tag-pill tag-default">emberjs</a>
              <a href="" class="tag-pill tag-default">angularjs</a>
              <a href="" class="tag-pill tag-default">react</a>
              <a href="" class="tag-pill tag-default">mean</a>
              <a href="" class="tag-pill tag-default">node</a>
              <a href="" class="tag-pill tag-default">rails</a>
            </div>
          </div>
      </div>{{-- grid終了 --}}
    </div> {{-- コンテナ終了 --}}
  </body>
</html>
