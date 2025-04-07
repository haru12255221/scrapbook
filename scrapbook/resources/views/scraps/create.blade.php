<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>スクラップ作成</title>
</head>
<body>
    <h1>スクラップ作成フォーム</h1>
    <form action="/scraps" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label>見出し:</label>
            <input type="text" name="title" required>
        </div>
        <div>
            <label>URL:</label>
            <input type="url" name="url" required>
        </div>
        <div>
            <label>画像:</label>
            <input type="file" name="image">
        </div>
        <button type="submit">保存する</button>
    </form>

    <a href="/scraps">戻る</a>
</body>
</html>