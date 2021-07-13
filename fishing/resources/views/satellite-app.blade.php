<x-app-layout>
    <x-slot name="header">
      <div class="flex">
            <div class="flex-1">
              <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                  {{ __('Satellite') }}
                
              </h2>
              <p style="margin-top:0px">user:{{ Auth::user()->name }}</p>
              <p>衛星画像を分析して得られた水温・潮目・クロロフィルaの観測情報</p> 
            </div>
       </div>
      
    </x-slot>
   {{-- flash massage --}}
    <div>
      <a href="{{ path('file:///C:/Users/rockf/OneDrive/%E3%83%87%E3%82%B9%E3%82%AF%E3%83%88%E3%83%83%E3%83%97/satellite_test/index.html#7/41.185/141.599')}}"></a>
    </div>
 
  <section style="display:flex;flex-flow: row-reverse">
   <div id="img_wrap" style="width:auto">

    
    </div>
    <!-- space to display map -->
     <div class="" id="myMap" style='position:relative;width:1500px;height:700px;'>
    
  </div> 
  
  </section>
 


</body>
</x-app-layout>