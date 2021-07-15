<x-app-layout>
    <x-slot name="header">
       
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Base') }}
        </h2>
       
    </x-slot>

        

     {{-- flash massage --}}
     @if(session('flash_message'))
     <div style="margin-top:30px;padding-left:4%" class="font-bold　align-middle text-left text-4xl bg-green-100 flow-root text-green-500">
       {{ session('flash_message') }}
     </div>
     @endif
  
     {{-- error message --}}
     @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif

   <div class="py-12">
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
                   <div class=" space-x-4 inline-block">
                 

                  {{-- display is belowe --}}
              
                  @foreach($results as $result)
                    
                      <figure class="md:flex bg-blue-100 rounded-xl m-5 p-5">
                        <div class="md:flex-shrink-0">
                        <img class="rounded-md h-48 w-full object-cover md:h-full md:w-48" src="{{ asset("/storage/imgs")."/".$result->img_path }}" alt="" width="384" height="512">
                        </div>
                        
                        
                        <div class="pt-6 md:p-8 text-center md:text-left space-y-4">
                          
                          <blockquote>
                            <div class="text-gray-500">
                              {{ $result->get_time }}
                            </div>
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
                            {{-- button --}}

                              {{-- delete --}}
                              <form action="{{ url('database_app/'.$result->id) }}" method="POST">
                              @csrf
                              @method('DELETE')
                              <div class="md:flex">
                                <div class="mt-20 bg-gray-300 rounded-xl m-2 p-2 hover:bg-gray-400">
                                  <button type="submit">
                                    削除
                                  </button>
                                </div>
                              </form>

                              {{-- edit --}}
                                <form action="{{ url('database_app/edit/'.$result->id) }}" method="GET">
                                  @csrf
                                  <div class="mt-20 bg-gray-300 rounded-xl m-2 p-2 hover:bg-gray-400">
                                    <button type="submit">
                                      変更
                                    </button>
                                  </div>
                                </form>
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
