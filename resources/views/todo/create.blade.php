<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tambah Task
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form method="POST" action="{{ route('todo.store') }}">
        @csrf

        <div>
            <x-input-label for="task" :value="__('Task')" />
            <x-text-input id="task" class="block mt-1 w-full" type="text" name="task" :value="old('task')" required autofocus />
            <x-input-error :messages="$errors->get('task')" class="mt-2" />
        </div>

    
        <div class="flex items-center justify-end mt-4">

            <x-primary-button class="ms-3">
                {{ __('Simpan') }}
            </x-primary-button>
        </div>
    </form>
        </div>
    </div>
</x-app-layout>