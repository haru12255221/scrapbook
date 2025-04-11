<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>

    <style>
        body {
    background-color: #f0f2f5;
    font-family: 'Helvetica Neue', Arial, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.container {
    background: white;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0px 0px 20px rgba(0,0,0,0.1);
    width: 100%;
    max-width: 400px;
}

h1 {
    text-align: center;
    margin-bottom: 30px;
}

input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 12px;
    margin: 10px 0 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button[type="submit"] {
    width: 100%;
    background-color: #4CAF50;
    color: white;
    padding: 12px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
    background-color: #45a049;
}

.buck-link {
    display: block;
    margin-top: 20px;
    text-align: center;
    color: #555;
    text-decoration: none;
}

.buck-link:hover {
    text-decoration: underline;
}
    </style>
</head>
<body>
    <div class="container">
        <h1>ログイン</h1>

        @if(session('error'))
            <div style="color: red;">
                {{ session('error') }}
            </div>
        @endif

        <form action="/login" method="POST">
            @csrf

            <div>
                <label for="email">メールアドレス</label>
                <input type="email" name="email" id="email" required>
            </div>

            <div>
                <label for="password">パスワード</label>
                <input type="password" name="password" id="password" required>
            </div>

            <div>
                <button type="submit">ログイン</button>
            </div>
        </form>

        <a href="/scraps" class="buck-link">戻る</a>
        
        <!-- <div>
            <p>まだアカウントを作成していませんか？ <a href="/register">新規登録</a></p>
        </div> -->
    </div>
</body>
</html>
