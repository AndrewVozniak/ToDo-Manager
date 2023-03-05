@auth
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ToDo Manager') }}
        </h2>
    </x-slot>
    

    <div class="flex flex-col max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        @livewire('tasks')
    </div> 
</x-app-layout>

@else

<x-guest-layout>
    <div class="flex items-center justify-center h-screen">
        <x-login-banner>
            <x-slot:title>Please Sign In to start use ToDo Manager</x-slot:title>
            <x-slot:subtitle>For correct work we need to register you in our database</x-slot:subtitle>
            <x-slot:buttonText>Please Sign In to start use ToDo Manager</x-slot:buttonText>
        </x-login-banner>
    </div>
</x-guest-layout>
@endauth