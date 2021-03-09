<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profiel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 grid grid-cols-2 gap-4">
                    <div>
                        <form action="{{ route('saveProfile') }}" method="POST">
                            @method('PUT')
                            @csrf
                            <h1 class="text-3xl">Gegevens {{ $user->name }},</h1>
                            <p class="italic">Bedrijf: {{$user->company->name}}</p>
                            <hr class="mb-4">
                            <label for="">Naam*</label>
                            <input class="w-full block rounded-md shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="name" value="{{$user->name}}">
                            @error('name')
                            <div class="text-xs mb-4 text-red-300">{{ $message }}</div>
                            @enderror
                            <label for="">E-mail*</label>
                            <input class="w-full block rounded-md shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="email" name="email" value="{{$user->email}}">
                            @error('email')
                            <div class="text-xs mb-4 text-red-300">{{ $message }}</div>
                            @enderror
                            <label for="">Webshop*</label>
                            <input class="w-full block rounded-md shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="url" name="domain" value="{{$user->company->domain}}">
                            @error('domain')
                            <div class="text-xs mb-4 text-red-300">{{ $message }}</div>
                            @enderror
                            <label for="category">Selecteer een categorie waar de maatwerkproducten in de shop terechtkomen</label>
                            <link-tree selected="{{ $user->company->category }}"></link-tree>
                            @error('category')
                            <div class="text-xs mb-4 text-red-300">{{ $message }}</div>
                            @enderror
                            <hr class="">
                            <label for="">Public key CCV</label>
                            <input class="w-full mb-4 block rounded-md shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="text" name="public" value="{{$user->company->public_key}}">
                            <label for="">Private key CCV</label>
                            <input class="w-full mb-4 block rounded-md shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="password" name="private" value="{{$user->company->private_key}}">
                       <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">Update gegevens</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    import ShopCategories from "../js/Components/ShopCategories";

    export default {
        components: {ShopCategories}
    }
</script>
