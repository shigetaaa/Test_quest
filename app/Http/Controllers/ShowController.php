<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class ShowController extends Controller
{
  /**
   * Display the specified blog.
   *
   * @param  \App\Models\Blog  $blog
   * @return \Illuminate\Http\Response
   */
  public function show(Blog $blog)
  {
    return view('blogs.show', compact('blog'));
  }
}
