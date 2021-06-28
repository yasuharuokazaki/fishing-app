<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Base Edit') }}
        </h2>
    </x-slot>

    {{-- edit display --}}
this target is id:{{ $id }}
    <figure class="md:flex bg-blue-100 rounded-xl m-5 p-5">
            <div class="md:flex-shrink-0">
                <img class="rounded-xl h-40 w-full object-cover md:h-full md:w-48" src="" alt="" width="384" height="512">
            </div>
        
        
            <div class="pt-6 md:p-8 text-center md:text-left space-y-4">
            
                <blockquote>
                    <div class="text-gray-500">
                     <input class="rounded-md h-6 mb-1" type="text" placeholder="date">
                    </div>
                    <p class="text-lg font-semibold">
                     <input class="rounded-md h-10 mt-1" type="text" placeholder="name">
                     <input class="rounded-md h-10 w-13 mt-1" type="text" placeholder="size">
                    </p>
                </blockquote>

                <figcaption class="font-medium">
                    <div class="text-cyan-600">
                    {{-- input->desc  --}}
                        <textarea name="" id="" cols="40" rows="5" class="rounded-md"></textarea>
                    </div>
                    <div class="text-gray-500">
                    {{ "気温X℃" }}&emsp;{{ "水温X℃" }}&emsp;{{ "風Xkm/h" }}&emsp;{{ "気圧XhPa" }}
                    </div>
                </figcaption>
                
            </div>
    </figure>
    
</x-app-layout>