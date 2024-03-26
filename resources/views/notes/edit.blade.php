<x-app-layout :title=$title>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Notes') }}
        </h2>
    </x-slot>
  
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 p-2">

        <div class="float-right mt-2">
            <x-amber-btn-link class="inline-flex items-center " :href="route('notes.index')">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="m18.75 4.5-7.5 7.5 7.5 7.5m-6-15L5.25 12l7.5 7.5" />
</svg>Back
</x-amber-btn-link>
        </div>
            
        <form method="post" action="{{ route('notes.update', $note) }}" class="mt-6 space-y-4">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title', $note->title)" required autofocus autocomplete="title" />
            <x-input-error class="mt-2" :messages="$errors->get('title')" />
        </div>

        <div>
            <x-input-label for="content" :value="__('content')" />
            <x-textarea-input name="content" class="mt-1 block w-full">{{old('content',$note->content)}}</x-textarea-input>
            <x-input-error class="mt-2" :messages="$errors->get('content')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Update') }}</x-primary-button>

        </div>
    </form>
        </div>
    </div>
</x-app-layout>
