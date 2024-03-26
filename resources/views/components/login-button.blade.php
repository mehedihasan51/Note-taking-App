<button {{ $attributes->merge(['type' => 'submit', 'class' => 'flex inline text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-8 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800']) }}>
    {{ $slot }}
</button>