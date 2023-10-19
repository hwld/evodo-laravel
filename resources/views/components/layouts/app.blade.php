<html lang="ja">

<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-neutral-50 h-[100dvh]">
    <div class="flex h-full">
        <div class="flex-shrink-0 w-80 h-full bg-neutral-100 border  border-neutral-200 flex-col">
            <div class="h-14 flex items-center p-3 text-lg font-bold text-neutral-700 border-b">
                Evodo
            </div>
        </div>
        <div class="p-8 flex-1 max-w-5xl">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
