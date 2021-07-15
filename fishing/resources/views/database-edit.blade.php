<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Base Edit') }}
        </h2>
    </x-slot>

    {{-- validation --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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
                        <p><label for="get_time">釣れた日</label></p>
                        <input id="get_time" name="get_time" value={{ $predata->get_time }} class="rounded-md h-6 mb-1" type="text" placeholder="ex:2021-07-15">
                    
                        <p class="text-lg font-semibold">
                            <label for="name">魚名</label>
                        </p>
                            <input id="name" name="name" value='{{ $predata->name }}' class="rounded-md h-10 mt-1" type="text" placeholder="name">
                        
                        <p class="text-lg font-semibold">
                            <label for="size">大きさ</label>
                        </p>
                            <input  id="size" name="size"  class="rounded-md h-10 mt-1" type="text" placeholder="size" value='{{ $predata->size }}'>
                        
                            <p class="text-lg font-semibold">
                                <label for="desc">説明</label>
                            </p>
                        <textarea name="desc" id="desc" cols="40" rows="5" class="rounded-md mt-3 mb-3" style="align:left">
                            {{ $predata->desc }}
                        </textarea>
                    </div>
                    </blockquote>

                    <figcaption class="font-medium">
                        <div class="text-gray-500 space-x-4">
                            <div class="inline-block"><p>気温</p><input name="temp" style="width:5rem" value='{{ $predata->temp }}' type="text" class="rounded-md">℃</div>
                            <div class="inline-block"><p>水温</p><input name="water_temp" style="width:5rem" value='{{ $predata->water_temp }}' type="text" class="rounded-md">℃</div>
                            <div class="inline-block"><p>風</p><input name="wind" style="width:5rem" value='{{ $predata->wind }}' type="text" class="rounded-md">km/h</div>
                            <div class="inline-block"><p>風向</p><select name="win_dir" class="winDir rounded-xl" id="winDir" style="margin-top: 0px;margin-left:0px;width:50px">
                                <option value="北">北</option>
                                <option value="東">東</option>
                                <option value="南">南</option>
                                <option value="西">西</option>
                            </select> </div>   
                                    
                            <div class="inline-block"><p>気圧</p><input name="hPa" style="width:5rem" value='{{ $predata->hPa }}' type="text" class="rounded-md">hPa</div>
                            
                            &emsp;
                        </div>
                    </figcaption>

                    <div class="flex">
                        <div><p class="text-lg font-semibold mr-3">公開</p></div>
                       
                        <div>
                             <lavel for="op">する 
                            <input id="op" name='op_flag' type="radio" value=1 {{ $predata->op_flag==1? 'checked':'' }} ></lavel> 
                        </div>
                        <div>
                            <lavel for="close">しない 
                           <input id="close" name='op_flag' type="radio" value=0 {{ $predata->op_flag!==1? 'checked':'' }} ></lavel> 
                       </div>
                    
                           
                    
                    </div>

                    <div class="mx-8 mt-10 w-30 rounded-md">
                        <button type="submit" style="width:100px" class="mt-5 p-2 rounded-md transition duration-500 ease-in-out bg-blue-300 hover:bg-red-300 transform hover:-translate-y-1 hover:scale-110">訂正</button>
                    </div>    
                
            </div>  
    </figure>
</form> 
</x-app-layout>