<x-app-layout>
    <x-slot name="header">
       
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fishing Data') }}
        </h2>
       
    </x-slot>

        

  

   <div class="py-12">
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
                   <div class=" space-x-4 inline-block">
                 

                  {{-- display is belowe --}}
              
                  @foreach($results as $result)
                    
                      <figure class="md:flex bg-blue-100 rounded-xl m-5 p-5">
                        <div class="md:flex-shrink-0">
                        <img class="h-48 w-full object-cover md:h-full md:w-48" src="{{ asset("/storage/imgs")."/".$result->img_path }}" alt="" width="384" height="512">
                        </div>
                        <div class="pt-6 md:p-8 text-center md:text-left space-y-4">
                          <blockquote>
                            <p class="text-lg font-semibold">
                              {{ $result->name }}
                            </p>
                          </blockquote>
                          <figcaption class="font-medium">
                            <div class="text-cyan-600">
                              {{ $result->desc }} {{ $result->size."cm" }}
                            </div>
                            <div class="text-gray-500">
                              {{ "気温".$result->temp."℃" }}&emsp;{{ "水温".$result->water_temp."℃" }}&emsp;{{ "風".$result->wind."km/h" }}&emsp;{{ "気圧".$result->hPa."hPa" }}
                            </div>
                          </figcaption>
                         </div>
                      </figure>
                    
                    @endforeach
              

              {{ $results->links() }}
       {{-- 以下ラッパー --}}
             </div>
           </div>
       </div>
     </div>
  </div>
    
</x-app-layout>

<script>
 

</script>
