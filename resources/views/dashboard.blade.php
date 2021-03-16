<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                        <h1 class="text-3xl">Welkom {{ \Auth::user()->name }},</h1>
                        <p class="mt-4 italic">
                            Er zijn momenteel <strong>{{ $configurators }}</strong> producten geconfigureerd.
                        </p>
                    <a href="{{ route('configurators.index') }}" class="underline italic text-indigo-500">Voeg nu een configuratie toe</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
