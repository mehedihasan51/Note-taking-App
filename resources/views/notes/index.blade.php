<x-app-layout :title=$title>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notes') }}
        </h2>
    </x-slot>

    <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 p-4">
    @if(session('success'))
    <div class="alert alert-success" role="alert">
        
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
  <span class="font-medium">{{session('success')}}
</div>
   
</div>
@endif
    <div class="float-right">

<a href="{{route('notes.create')}}" class="text-white inline-flex items-center bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 right-3.5">Created
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
</svg>

 </a>

</div>
        
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mt-6 space-y-6 mb-2">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-4">
                    Id
                </th>
                <th scope="col" class="px-6 py-4">
                    Title
                </th>
                <th scope="col" class="px-6 py-4">
                    Content
                </th>
                <th scope="col" class="px-6 py-4">
                    Creation Date,
                </th>
                <th scope="col" class="px-6 py-4">
                    Modified Date.
                </th>
                <th scope="col" class="px-6 py-4">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
             
        @forelse($notes as $note)

        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   {{$note->id}}
                </th>
                <td class="px-6 py-4">
                  {{$note->title}}
                </td>
                <td class="px-6 py-4">
                {{$note->content}}
                </td>
                <!-- <td class="px-6 py-4">
                {{$note->created_at->diffForHumans()}}
                </td> -->
                <td class="px-6 py-4">
                {{$note->created_at}}
                </td>
                <td class="px-6 py-4">
                {{$note->updated_at}}
                </td>
                <td class="px-6 py-4 inline-flex">

                <a href="{{route('notes.show',$note)}}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                   </svg>
                   </a>

                   <a href="{{route('notes.edit',$note)}}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                    </svg>
                    </a>


                    <form action="{{route('notes.destroy',$note->id)}}" method="POST">
                
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure delete this Note')">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                       </svg>
                       </button>
                </form>
                
                </td>
            </tr>

        @empty


        @endforelse
    
        </tbody>
    </table>

    {{$notes->links()}}
</div>

        </div>
    </div>
</x-app-layout>
