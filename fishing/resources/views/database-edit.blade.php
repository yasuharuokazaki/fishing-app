<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Base Edit') }}
        </h2>
    </x-slot>



    {{-- edit display --}}
    <form action={{ url('/modify') }} method="POST" >
        @csrf
    <figure class="md:flex bg-blue-100 rounded-xl m-5 p-5">
            <div class="md:flex-shrink-1">
                <img class="rounded-xl h-auto w-auto object-cover md:h-auto md:w-auto" src="{{ asset("/storage/imgs")."/".$predata->img_path }}" alt="" width="384" height="512">
            </div>
        
        
            <div class="pt-6 md:p-8 text-center md:text-left space-y-3">
            
             
                    <blockquote class="">
                        <div class="">
                        <input name="id" value={{ $predata->id }} type="hidden">
                        <input name="get_time" value={{ $predata->get_time }} class="rounded-md h-6 mb-1" type="text" placeholder="date">
                    
                        <p class="text-lg font-semibold">
                        <input name="name" value='{{ $predata->name }}' class="rounded-md h-10 mt-1" type="text" placeholder="name">
                        <input  name="size"  class="rounded-md h-10 mt-1" type="text" placeholder="size" value='{{ $predata->size }}'>
                        </p>
                        <textarea name="desc" id="" cols="40" rows="5" class="rounded-md mt-3 mb-3">
                            {{ $predata->desc }}
                        </textarea>
                    </div>
                    </blockquote>

                    <figcaption class="font-medium">
                        <div class="text-gray-500">
                            気温<input name="temp" style="width:5rem" value='{{ $predata->temp }}' type="text" class="rounded-md">℃&emsp;
                            水温<input name="water_temp" style="width:5rem" value='{{ $predata->water_temp }}' type="text" class="rounded-md">℃&emsp;
                            風<input name="wind" style="width:5rem" value='{{ $predata->wind }}' type="text" class="rounded-md">km/h&emsp;
                            気圧<input name="hPa" style="width:5rem" value='{{ $predata->hPa }}' type="text" class="rounded-md">hPa&emsp;
                        </div>
                    </figcaption>

                    <div>
                        公開
                        <div>
                             <lavel for="op">する </lavel> 
                            <input id="op" name='op_flag' type="radio" value=1 {{ $predata->op_flag==1? 'checked':'' }} >
                        </div>
                        <div>
                            <lavel for="close">しない </lavel> 
                           <input id="close" name='op_flag' type="radio" value=0 {{ $predata->op_flag!==1? 'checked':'' }} >
                       </div>
                    
                           
                    
                    </div>

                    <div class="mx-8 mt-10 w-30 rounded-md">
                        <button type="submit" style="width:100px" class="mt-5 p-2 rounded-md transition duration-500 ease-in-out bg-blue-300 hover:bg-red-300 transform hover:-translate-y-1 hover:scale-110">訂正</button>
                    </div>    
                
            </div>  
    </figure>
</form> 
</x-app-layout>