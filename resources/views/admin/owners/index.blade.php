<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            オーナー情報
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- *************************************************
                　　　　　　 コンテンツ部分
                    *************************************************** -->
                    <!-- オーナー新規作成へ遷移 -->
                    <div>
                        <button onclick="location.href='{{ route('admin.owners.create') }}'">新規登録</button>
                    </div>
                    <!-- オーナー一覧情報 -->
                    <div>
                        <table>
                            <thead> <!-- table見出し -->
                                <tr>
                                    <th>名前</th>
                                    <th>メール</th>
                                    <th>登録日</th>
                                    <th>更新日</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($owners as $owner)
                                    <tr>
                                        <td>{{$owner->name}}</td>
                                        <td>{{$owner->email}}</td>
                                        <td>{{$owner->created_at->diffForHumans()}}</td>
                                        <td>{{$owner->updated_at->diffForHumans()}}</td>
                                        <td><button type="button" onclick="location.href='{{ route('admin.owners.edit', ['owner' => $owner->id]) }}'" >更新</button></td>
                                        <td>
                                            <form action="{{route('admin.owners.destroy', ['owner'=>$owner->id])}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit">削除</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
