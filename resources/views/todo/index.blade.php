<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Todo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <a href="{{ route('todo.create') }}" class="inline-flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                    Create Data
                </a>
                <table class="mt-5 w-full table-auto">
                    <tr>
                        <th class="border px-4 py-2" width="10%">ID</th>
                        <th class="border px-4 py-2" width="70%">Title</th>
                        <th class="border px-4 py-2" width="20%">Action</th>
                    </tr>
                    @php
                        $no = 1;
                    @endphp
                    @forelse ($todos as $todo)
                    <tr>
                        <td class="border px-4 py-2">{{ $no++ }}</td>
                        <td class="border px-4 py-2">{{ $todo->todo }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('todo.edit', $todo->id) }}">Edit</a>
                            <form action="{{ route('todo.destroy', $todo->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('delete')
                            <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="border px-4 py-2 text-center">Tidak Ada Data</td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
