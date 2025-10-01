<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = [
            ['id' => 1, 'title' => 'Giới thiệu Laravel 12', 'body' => 'Nội dung A'],
            ['id' => 2, 'title' => 'Blade Components', 'body' => 'Nội dung B'],
        ];
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required','string','max:255'],
            'body'  => ['required','string','min:10'],
        ]);
        return redirect()->route('articles.index')
            ->with('success', 'Tạo bài viết thành công (demo).');
    }

    public function show(string $id)
    {
        return "Xem chi tiết bài viết ID: " . (int) $id;
    }

    public function edit(string $id)
    {
        $article = ['id' => $id, 'title' => 'Tiêu đề mẫu', 'body' => 'Nội dung mẫu'];
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => ['required','string','max:255'],
            'body'  => ['required','string','min:10'],
        ]);
        return redirect()->route('articles.index')
            ->with('success', "Cập nhật bài viết #$id thành công (demo).");
    }

    public function destroy(string $id)
    {
        return redirect()->route('articles.index')
            ->with('success', "Đã xoá bài viết #$id (demo).");
    }
}
