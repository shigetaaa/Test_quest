<head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
      <link rel="stylesheet" href="{{ asset('css/style.css') }}">
      <title>conduit Edit Blog</title>

</head>
<body>
    {{-- ヘッダーパーツの取り込み --}}
    @include('layouts.blog-header')
    <div class="home-banner">
      <h1>Edit Blog</h1>
        <p>A place to share your knowledge.</p>
    </div>
<div class="small_container">

    <form method="POST" action="{{ route('blogs.update', $blog->id) }}">
    @csrf
    @method('PUT')
    <div>
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="{{ $blog->title }}">
    </div>

    <div>
        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject" value="{{ $blog->subject }}">
    </div>

    <div>
        <label for="content">Content:</label>
        <textarea id="content" name="content">{{ $blog->content }}</textarea>
    </div>

    <div>
        <label for="tags">Tags:</label>
        <textarea id="tags" name="tags">{{ implode(',', $blog->tags->pluck('name')->toArray()) }}</textarea>
    </div>

    <div>
        <button type="submit">Update Blog</button>
    </div>
</form>

</div>
</body>
