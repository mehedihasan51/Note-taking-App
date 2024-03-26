
@props(['value'])

<textarea  {{$attributes->merge(['class' =>"block p-8	 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 "])}}placeholder="Write your thoughts here...">{{ $value ?? $slot }}</textarea>

