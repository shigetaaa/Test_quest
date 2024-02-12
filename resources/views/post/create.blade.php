
<head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
      <link rel="stylesheet" href="{{ asset('css/style.css') }}">
      <title>conduit Create Blog</title>

</head>
<body>
    {{-- ヘッダーパーツの取り込み --}}
    @include('layouts.blog-header')
    <div class="home-banner">
      <h1>Create Blog</h1>
        <p>A place to share your knowledge.</p>
    </div>
<div class="small_container">

    <h2>Blog Create</h2>
    <form action="{{ route('blogs.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="subject">subject</label>
            <textarea class="form-control" id="subject" name="subject" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="content">content</label>
            <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="tags">tags</label>
            <span class="text-muted">*If more than one, please enter them separated by commas.</span>
            <textarea class="form-control" id="tags" name="tags" rows="1" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">submit</button>
    </form>

</div>{{-- コンテナここで終わり --}}
</body>
