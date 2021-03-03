<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profiel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-3xl">Gegevens {{ $user->name }},</h1>
                    <p class="italic">Bedrijf: {{$user->company->name}}</p>
                    <hr class="mb-4">
                    <label for="">E-mail</label>
                    <input class="mb-4 block rounded-md shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" value="{{$user->email}}">
                    <label for="">Webshop</label>
                    <input class="mb-4 block rounded-md shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" value="{{$user->company->domain}}">

                    <hr>
                    <label for="">Public key CCV</label>
                    <input class="mb-4 block rounded-md shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" value="{{$user->company->public_key}}">
                    <label for="">Private key CCV</label>
                    <input class="mb-4 block rounded-md shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="password" value="{{$user->company->private_key}}">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
