<!-- <!DOCTYPE html>
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
        .card a {
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
        .card a :hover {
            text-decoration: underline;
        }
        .card .edit {
            background-color: #f2f2f2;
            color: #3498db;
            padding: 8px 16px;
            border-radius: 5px;
            transition: background-color 0.3s;
            font-size: 0.8rem;
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
                <p><a href="{{ $scrap->url }}"  target="_blank">{{ $scrap->url }}</a></p>
                <a href="/scraps/{{$scrap->id}}/edit" class="edit">編集</a>
                <form action="/scraps/{{$scrap->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('本当に削除しますか?')">削除</button>
                </form>
            </div>
        @endforeach
    </ul>
</body>
</html>
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>スクラップ一覧</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.5/cdn.min.js" defer></script>
</head>
<body class="bg-gray-100 p-5 m-0" x-data="{ sidebarOpen: false }">
    <!-- サイドバーオーバーレイ -->
    <div 
        x-show="sidebarOpen" 
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100" 
        x-transition:leave-end="opacity-0"
        @click="sidebarOpen = false"
        class="fixed inset-0 bg-black bg-opacity-50 z-40"></div>
    
    <!-- サイドバーフォーム -->
    <div
        x-show="sidebarOpen"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="-translate-x-full" 
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="translate-x-0" 
        x-transition:leave-end="-translate-x-full"
        class="fixed left-0 top-0 h-full w-full sm:w-96 bg-white z-50 shadow-lg transform p-6 overflow-y-auto">
        
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-bold text-gray-800">新規スクラップ追加</h2>
            <button @click="sidebarOpen = false" class="text-gray-500 hover:text-gray-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        
        <form action="/scraps" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700 mb-1">タイトル</label>
                <input type="text" name="title" id="title" required class="w-full px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            
            <div>
                <label for="url" class="block text-sm font-medium text-gray-700 mb-1">URL</label>
                <input type="url" name="url" id="url" required class="w-full px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700 mb-1">画像（任意）</label>
                <input type="file" name="image" id="image" accept="image/*" class="w-full px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">メモ（任意）</label>
                <textarea name="description" id="description" rows="4" class="w-full px-3 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>
            
            <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 transition-colors font-medium">保存する</button>
        </form>
    </div>

    <!-- メインコンテンツ -->
    <h1 class="text-center text-2xl font-bold mb-8 text-gray-800">スクラップ一覧</h1>

    <button @click="sidebarOpen = true" class="block w-48 mx-auto mb-5 py-2 px-4 bg-blue-500 text-white text-center font-bold rounded-full transition-colors hover:bg-blue-600">+新規追加+</button>

    <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-5">
        @foreach ($scraps as $scrap)
            <div class="bg-white rounded-xl shadow-md transition duration-300 overflow-hidden p-4 text-center hover:shadow-lg">
                <h2 class="text-lg font-semibold my-2">{{ $scrap->title }}</h2>
                @if ($scrap->image)
                    <img src="{{ asset('storage/' . $scrap->image) }}" alt="画像" class="w-full h-auto rounded-lg object-cover mb-4 transition transform hover:-translate-y-1">
                @endif
                <p class="w-full overflow-hidden">
                    <a href="{{ $scrap->url }}" target="_blank" class="text-blue-500 hover:underline block truncate" title="{{ $scrap->url }}">{{ $scrap->url }}</a>
                </p>
                <div class="flex flex-col gap-2 mt-3">
                    <a href="/scraps/{{$scrap->id}}/edit" class="inline-block bg-gray-100 text-blue-500 py-2 px-4 rounded transition-colors hover:bg-gray-200 text-sm">編集</a>
                    <form action="/scraps/{{$scrap->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('本当に削除しますか?')" class="w-full bg-red-100 text-red-500 py-2 px-4 rounded transition-colors hover:bg-red-200 text-sm">削除</button>
                    </form>
                </div>
            </div>
        @endforeach
    </ul>
</body>
</html>