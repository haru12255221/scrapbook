<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>スクラップ編集</title>
</head>
<body>
    <h1>スクラップ編集フォーム</h1>

    <form action="/scraps/{{ $scrap->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label>見出し:</label>
            <input type="text" name="title" value="{{ $scrap->title }}" required>
        </div>
        <div>
            <label>URL:</label>
            <input type="url" name="url" value="{{ $scrap->url }}" required>
        </div>
        <div>
            <label>現在の画像:</label><br>
            @if ($scrap->image)
                <img src="{{ asset('storage/' . $scrap->image) }}" alt="画像" style="max-width: 200px;">
            @endif
        </div>
        <div>
        <div>
            <label>新しい画像を選ぶ:</label>
            <input type="file" name="image">
        </div>
        </div>
        <button type="submit">更新する</button>
    </form>
    <a href="/scraps">戻る</a>
</body>
</html>