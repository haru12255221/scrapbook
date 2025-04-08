<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>スクラップ編集</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
            margin: 0;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input[type="text"],
        input[type="url"],
        input[type="file"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: 1px solid #ccc;
        }
        button {
            background-color: #3498db;
            color: #fff;
            padding: 8px 8px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #2980b9;
        }
        .buck-link {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #3498db;

        }
        .buttons {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    <h1>スクラップ編集フォーム</h1>
        <div class="form-container">
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
            <div class="buttons">
                <button type="submit">更新する</button>
                <a href="/scraps" class="buck-link">戻る</a>
            </div>
        </form>
    </div>
</body>
</html>