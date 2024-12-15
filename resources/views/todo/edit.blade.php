<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Task
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('todo.update') }}">
                @csrf
                @method('put')
                <input type="hidden" name="id" id="id" value="{{$data->id}}">
                <div>
                    <x-input-label for="task" :value="__('Task')" />
                    <x-text-input id="task" class="block mt-1 w-full" type="text" name="task" value="{{ $data->task }}" required autofocus />
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