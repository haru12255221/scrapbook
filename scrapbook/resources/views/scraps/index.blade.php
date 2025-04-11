<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic&display=swap" rel="stylesheet">
    <title>スクラップ一覧</title>
    <style>
        body {
            font-family: 'Zen Maru Gothic', sans-serif;
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
            font-weight: bold;

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
            border: 1px solid #ccc;
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


        .scrap-title {
            margin-bottom: 10px;
        }
        
        .header {
            max-width: 90%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        input[type="text"]
        {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
            margin-right: 10px;
        }

        .search-form {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .search-button{
            background-color: #3498db;
            color: #fff;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            margin-bottom: 10px;
        }
        button:hover {
            background-color: #2980b9;
        }

        .search-button{
            width: 40px;
            height: 37.5px;
        }

        .logout-button, 
        .login-button {
            background-color: #3498db;
            color: #fff;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            margin-bottom: 10px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            margin: 0 5px;
        }
        
        .logout-button {
            background-color: #e74c3c;
        }
        .logout-button:hover {
            background-color: #c0392b;
        }

        .login-button {
            background-color: #green;
        }

        .header-main {
            display: flex;
            justify-content: space-between; /* 要素を両端に配置 */
            align-items: center;
        }
        .action{
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="header-main">
            <h1>本棚</h1>
            <div class="action">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                    </button>
                </form>
                <a href="/login" class="login-button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-in"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path><polyline points="10 17 15 12 10 7"></polyline><line x1="15" y1="12" x2="3" y2="12"></line></svg>
                </a>
            </div>
        </div>
        <form action="/scraps" method="GET" class="search-form">
            @csrf
            <input type="text" name="keyword" placeholder="キーワードで検索">
            <button type=submit class="search-button">
                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            </button>
        </form>
    

    @if(Auth::check() && Auth::user()->is_admin)
        <a href="/scraps/create" class="add-button">+新規追加+</a>
    @endif

    <ul class="grid">
        @forelse ($scraps as $scrap)
            <div class="card">
                <span onclick="copyToClipboard(event, '{{ $scrap->title }}')" style="cursor: pointer;" class="scrap-title">
                    {{ $scrap->title }}
                </span>
                @if ($scrap->image)
                    <img src="{{ asset('storage/' . $scrap->image) }}" alt="画像">
                @endif
                @if ($scrap->is_borrowed)
                    <div style="color:red; font-weight:bold;">貸出中！</div>
                @else
                    <div style="color:green; font-weight:bold;">貸出可能</div>
                @endif
                <p><a href="{{ $scrap->url }}"  target="_blank">
                    {{ \Illuminate\Support\Str::limit($scrap->url, 20) }}
                </a></p>
                <div class="actions">
                @if(Auth::check() && Auth::user()->is_admin)
                    <a href="/scraps/{{$scrap->id}}/edit" class="edit-button">編集</a>
                    <form action="/scraps/{{$scrap->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button" onclick="return confirm('本当に削除しますか?')">削除</button>
                    </form>
                @endif
                </div>
            </div>
        @empty
            <p></p>
            <p style="text-align: center; margin-top: 20px;">スクラップが見つかりませんでした。</p>
        @endforelse
    </ul>
    </div>
    <script>
        function copyToClipboard(event, text) {
            navigator.clipboard.writeText(text).then(function() {
                showTooltip(event, 'コピーしました!');
            }, function(err) {
                console.error('コピーに失敗しました: ', err);
            });
        }

        function showTooltip(event, message) {
            const tooltip = document.createElement('div');
            tooltip.textContent = message;
            tooltip.style.position = 'fixed';
            tooltip.style.top = (event.clientY - 20) + 'px'; // カーソルのちょい上
            tooltip.style.left = (event.clientX + 10) + 'px'; // カーソルのちょい右
            tooltip.style.background = 'rgba(0, 0, 0, 0.7)';
            tooltip.style.color = '#fff';
            tooltip.style.padding = '5px 10px';
            tooltip.style.borderRadius = '5px';
            tooltip.style.fontSize = '0.8rem';
            tooltip.style.pointerEvents = 'none';
            tooltip.style.zIndex = 1000;
            tooltip.style.transition = 'opacity 0.3s ease';
            document.body.appendChild(tooltip);

            // ちょっと時間たったらフェードアウトして消す
            setTimeout(() => {
                tooltip.style.opacity = 0;
                setTimeout(() => {
                    document.body.removeChild(tooltip);
                }, 300);
            }, 800); // 表示時間
                }
    </script>
</body>
</html>


