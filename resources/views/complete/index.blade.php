<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-3">
                @foreach ($todo as $item )
                <div class="  bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-3">
                    <div class="flex flex-row justify-between items-center pr-5">

                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            {{$item->task}}
                        </div>

                        <div class="flex flex-row space-x-3">
                            <form action="{{ route('uncomplete.index') }}" method="post">
                                @csrf
                                @method('put')
                                <input type="hidden" value="{{ $item->id }}" name="id">
                                <button type="submit" class="text-white bg-blue-600 px-4 py-2 rounded hover:bg-blue-900 ">Mark as uncomplete</button>
                            </form>
                            <form action="{{ route('todo.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="hidden" value="{{ $item->id }}" name="id">
                                <button type="submit" class="text-white bg-red-600 px-4 py-2 rounded hover:bg-red-900 ">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>