<?php

namespace App\Http\Controllers;

use App\Models\Scrap;
use Illuminate\Http\Request;

class ScrapController extends Controller
{
    //フォームを表示する
    public function create()
    {
        return view('scraps.create');
    }

    // ほぞんする
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'url' => 'required|url',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $path = $request->file('image')->store('images', 'public');

        Scrap::create([
            'title' => $request->title,
            'url' => $request->url,
            'image' => $path,
            'is_borrowed' => $request->has('is_borrowed'),
        ]);

        return redirect('/scraps/create');
    }

    // scrapを編集する
    public function edit(Scrap $scrap)
    {
        return view('scraps.edit', compact('scrap'));
    }
    // scrapを更新する
    public function update(Request $request, Scrap $scrap)
    {
        $request->validate([
            'title' => 'required|max:255',
            'url' => 'required|url',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = [
            'title' => $request->title,
            'url' => $request->url,
            'is_borrowed' => $request->has('is_borrowed'),
        ];

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $data['image']= $path;
        }

        $scrap->update($data);

        return redirect('/scraps');
    }

    public function destroy(Scrap $scrap)
    {
        $scrap->delete();
        return redirect('/scraps');
    }

    // // scrap一覧を表示する
    public function index(Request $request)
    {
        $query =Scrap::Query();
        if ($request->filled('keyword')) {
            $query->where('title', 'like', '%' . $request->keyword . '%');
        }
        $scraps = $query->get();
        return view('scraps.index', compact('scraps'));
    }
}
