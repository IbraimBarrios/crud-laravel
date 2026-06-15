<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Show Student') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">
              <div class="max-w-sm mx-auto">
                <dl class="max-w-md text-heading divide-y divide-default">
                    <div class="flex flex-col pb-3">
                        <dt class="mb-1 text-body dark:text-white">Name:</dt>
                        <dd class="text-lg font-medium dark:text-white">{{ $student->name }}</dd>
                    </div>
                    <div class="flex flex-col py-3">
                        <dt class="mb-1 text-body dark:text-white">Age:</dt>
                        <dd class="text-lg font-medium dark:text-white">{{ $student->age }}</dd>
                    </div>
                </dl>
              </div>
            </div>
        </div>
    </div>
</x-app-layout>