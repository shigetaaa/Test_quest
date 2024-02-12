<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\tags;
use Illuminate\Http\Request;

class EditController extends Controller
{
  // 新規記事の作成
  public function create()
  {
    return view('post.create');
  }

  // 新規記事を保存
  public function store(Request $request)
  {
    $request->validate([
      'title' => 'required|max:255',
      'content' => 'required',
    ]);

    $blog = new Blog;
    $blog->title = $request->title;
    $blog->content = $request->content;
    $blog->subject = $request->subject;
    // 現在ログインしているユーザーのIDを取得し、それを新規ブログ記事のuser_idに設定する
    $blog->user_id = auth()->id();
    $blog->save();

    // タグの保存
    $tagNames = explode(',', $request->tags); // タグはカンマ区切りで受け取ると仮定
    $tagIds = [];
    foreach ($tagNames as $tagName) {
      $tag = tags::firstOrCreate(['name' => $tagName, 'user_id' => auth()->id()]); // タグが存在しなければ作成
      $tagIds[] = $tag->id;
    }
    $blog->tags()->sync($tagIds); // 中間テーブルに保存

    return redirect()->route('blogs.index')->with('success', '新規記事が正常に作成されました');
  }




  /**
   * ブログ記事の編集
   *
   * @param \App\Models\Blog $blog
   * @return \Illuminate\Http\Response
   */
  public function edit(Blog $blog) // ルート定義の引数としてblogsテーブルのidを受け取る→＄blogに代入
  {
    return view('edit', compact('blog'));
  }

  /**
   * データベースに更新されたブログ記事を保存
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
      'tags' => 'required',
      // 他のバリデーションルール...
    ]);

    $blog->update($validatedData);

    // タグの更新
    $tagNames = explode(',', $request->tags); // タグはカンマ区切りで受け取ると仮定
    $tagIds = [];
    foreach ($tagNames as $tagName) {
      $tag = tags::firstOrCreate(['name' => trim($tagName), 'user_id' => auth()->id()]); // タグが存在しなければ作成
      $tagIds[] = $tag->id;
    }
    $blog->tags()->sync($tagIds); // 中間テーブルに保存

    return redirect()->route('blogs.show', $blog)->with('success', 'Blog updated successfully');
  }

  /**
   * ブログ記事を削除
   *
   * @param \App\Models\Blog $blog
   * @return \Illuminate\Http\Response
   */
  public function destroy(Blog $blog)
  {
    // ブログ記事に関連するarticles_tagsテーブルのレコードを削除
    $blog->tags()->detach();

    // ブログ記事を削除
    $blog->delete();
    return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully');
  }
}
