<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー登録</title>
</head>
<body>
    <h1>ユーザー登録</h1>

    @if (session('error'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    <form action="/register" method="POST">
        @csrf

        <div>
            <label for="name">名前</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div>
            <label for="email">メールアドレス</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <label for="password">パスワード</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div>
            <label for="is_admin">管理者ですか?:</label>
            <input type="checkbox" name="is_admin" id="is_admin" value="1" required>
        </div>

        <button type="submit">登録</button>
    </form>
</body>
</html>