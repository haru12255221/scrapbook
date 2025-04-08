<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>スクラップ作成</title>
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
            width: 100%;
            margin-top: 10px;
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
    <h1>スクラップ作成フォーム</h1>
        <div class="form-container">
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
            <div class="buttons">
                <a href="/scraps"><button type="submit">保存する</button></a>
                <a href="/scraps" class="buck-link">戻る</a>
            </div>
        </form> 
    </div>
</body>
</html>