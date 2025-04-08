<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>スクラップ一覧</title>
    <style>
        body {
            font:family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
            margin: 0;
            text-decoration: none;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }
        .add-button {
            display: block;
            width: 200px;
            margin: 0 auto 20px;
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            text-align: center;
            border-radius: bold;
            text-decoration: none;
            border-radius: 30px;
            transition: background-color 0.3s ease;
        }
        .add-button:hover {
            background-color: #2980b9;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }
        .card {
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s,box-shadow 0.3s;
            overflow: hidden;
            padding: 16px;
            text-align: center;
        }
        .card img:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .card img{
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            object-fit: cover;
            margin-bottom: 15px;
        }
        .card h2{
            font-size:1.2rem;
            margin: 10px 0;
        }
        .card p a{
            display: inline-block;
            margin-top: 10px;
            margin-bottom: 10px;
            padding: 8px 16px;
            background-color: #f2f2f2;
            border-radius: 5px;
            transition: background-color 0.3s;
            color: #3498db;
            text-decoration: none;
            font-size: 1rem;
            
        }
        .card a{
            text-decoration: none;
        }
        .card p :hover {
            text-decoration: underline;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }
        .delete-button {
            background-color: #e74c3c;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .delete-button:hover {
            background-color: #c0392b;
        }
        .edit-button {
            background-color: #3498db;
            color: #FFFFFF;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .edit-button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <h1>スクラップ一覧</h1>

    <a href="/scraps/create" class="add-button">+新規追加+</a>

    <ul class="grid">
        @foreach ($scraps as $scrap)
            <div class="card">
                <h2>{{ $scrap->title }}</h2>
                @if ($scrap->image)
                    <img src="{{ asset('storage/' . $scrap->image) }}" alt="画像">
                @endif
                <p><a href="{{ $scrap->url }}"  target="_blank">
                    {{ \Illuminate\Support\Str::limit($scrap->url, 20) }}
                </a></p>
                <div class="actions">
                    <a href="/scraps/{{$scrap->id}}/edit" class="edit-button">編集</a>
                    <form action="/scraps/{{$scrap->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button" onclick="return confirm('本当に削除しますか?')">削除</button>
                    </form>
                </div>
            </div>
        @endforeach
    </ul>
</body>
</html>


