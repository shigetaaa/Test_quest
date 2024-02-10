<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
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

            <ul>
              <li>
                <a href="#">Your Feed</a>
              </li>
              <li>
                <a href="#">Global Feed</a>
              </li>
            </ul>


            <p>Popular Tags</p>

            <div class="tag-list">
              <a href="" class="tag-pill tag-default">programming</a>
              <a href="" class="tag-pill tag-default">javascript</a>
              <a href="" class="tag-pill tag-default">emberjs</a>
              <a href="" class="tag-pill tag-default">angularjs</a>
              <a href="" class="tag-pill tag-default">react</a>
              <a href="" class="tag-pill tag-default">mean</a>
              <a href="" class="tag-pill tag-default">node</a>
              <a href="" class="tag-pill tag-default">rails</a>
            </div>

  </body>
</html>
