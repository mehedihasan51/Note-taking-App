<x-app-layout :title=$title>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>

  
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 p-2">

        <div class="mt-2">
            <x-amber-btn-link class="inline-flex items-center " :href="route('notes.index')">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5" />
           </svg>Back
           </x-amber-btn-link>
        </div>

        <div class="w-fill mx-auto bg-white dark:bg-gray-800 shadow-md rounded-md overflow-hidden">
            <div class="p-6">

             <h3 class="text-2xl font-semibold text-gray-800 dark:text-white">{{$note->title}}</h3>
             <p class="text-gray-600 dark:text-gray-300 mt-2">{{$note->content}}</p>
            </div>
            <div class="flex justify-content-end p-4 bg-gray-100 dark:bg-gray-700">

            @if($note->user->is(auth()->user()))

            <div class="flex justify-content-end">
            <a href="{{route('notes.edit',$note)}}">
            <x-edit-button class="mr-2">Edit</x-edit-button>

            </a>
            <form action="{{route('notes.destroy',$note->id)}}" method="POST">
                
                @csrf
                @method('DELETE')

            <x-red-button type="submit" onclick="return confirm('Are you sure delete this Note')">Delete</x-red-button>

            </form>
            </div>
        @endif
           
            </div>
        </div>

    </div>
</x-app-layout>
