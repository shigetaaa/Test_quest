<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class EditController extends Controller
{
  /**
   * Show the form for editing the specified blog.
   *
   * @param \App\Models\Blog $blog
   * @return \Illuminate\Http\Response
   */
  public function edit(Blog $blog) // ルート定義の引数としてblogsテーブルのidを受け取る→＄blogに代入
  {
    return view('edit', compact('blog'));
  }

  /**
   * Update the specified blog in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param \App\Models\Blog $blog
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Blog $blog)
  {
    $validatedData = $request->validate([
      'title' => 'required|max:255',
      'content' => 'required',
      // 他のバリデーションルール...
    ]);

    $blog->update($validatedData);

    return redirect()->route('blogs.show', $blog)->with('success', 'Blog updated successfully');
  }
}
