<!-- bladeファイル内でintelephenseが動かなくて型を付けれない。 -->
<!-- 萎えたのでPHPはもういいや・・・。 -->
<!-- https://github.com/bmewburn/vscode-intelephense/issues/93 -->
<x-layouts.app>
    <h1 class="text-2xl font-bold text-neutral-700">Todos</h1>
    <div class="mt-6 flex flex-col gap-3">
        <form class="flex gap-3" method="post" action="{{ route('todos.store') }}">
            @csrf
            <input name="text" class="bg-neutral-50 flex-1 border rounded-md px-4 py-2" placeholder="TODOを入力してください" />
            <button class="w-20 rounded-md bg-neutral-700 hover:bg-neutral-800 transition-all text-neutral-100">
                作成
            </button>
        </form>
        <div class="flex flex-col gap-3">
            @foreach ($todos as $todo)
                {{ $todos->name }}
            @endforeach
        </div>
    </div>
</x-layouts.app>
