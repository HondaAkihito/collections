<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Honda Collections Site') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex flex-col font-sans antialiased items-center justify-center bg-gray-100">
    <main class="flex-grow flex flex-col items-center justify-center text-center">
        <div class="text-center">
            <!-- タイトル -->
            <h1 class="text-4xl font-bold text-gray-800 mb-6">Collections<br class="sm:hidden">管理者ページ</h1>
    
            @if (Route::has('login'))
                <!-- ボタンコンテナ -->
                <div class="space-x-4">
                    @auth
                        <a href="{{ url('/admin/collections') }}"
                            class="px-6 py-3 bg-gray-800 text-white text-lg font-semibold rounded-lg shadow-md 
                                    hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 
                                    focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 
                                    transition duration-300">トップページへ</a>
                    @else
                        <!-- ログインボタン -->
    
                        <a href="{{ route('login') }}"
                            class="px-6 py-3 bg-gray-800 text-white text-lg font-semibold rounded-lg shadow-md 
                                    hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 
                                    focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 
                                    transition duration-300">
                            ログイン
                        </a>
                    @endauth
                </div>
            @endif
        </div>
    </main>

    <x-footer-top />
</body>

</html>
