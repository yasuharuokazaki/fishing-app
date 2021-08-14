<x-app-layout>

    <x-slot name="header">
       
      <div class="flex">
        
            <div class="flex-1">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Satellite') }}
                </h2>
                 <p style="margin-top:0px"></p>

                    {{-- <div class="flex"> --}}
                        <div class="flex-grow"><p>衛星画像の分析から得られた水温・潮目・クロロフィル-a</p></div>
                            {{-- <div class="flex"> --}}

                {{-- 　              <label for="date_field"> --}}
                        
                                        
    </x-slot>
   {{-- flash massage --}}
   <div class="flex">
        
            <div class="flex " style="position:absolute;z-index:10;top:75px ;right:4%">

    　              <label for="date_field">
        
                        <div class="flex-1 flex">
                            <form id="submit_form" action="" method="get">
                                <input id="date_field" class="rounded-xl h-9 mr-2" type="date" value="@php print date('Y-m-d',strtotime('-1 day'));@endphp">
                        {{-- <input id="submit" type="submit">,strtotime('-1 day') --}}
                            </form>
                            <x-carendor />
                        
                        </div>
                    </label>
            </div>
        </div>

        <div id="map" style="height:1000px">
            <iframe id="satellite_map" src="https://fishing-logi.sakura.ne.jp/satellite_data/{{ date('Ymd',strtotime('-1 day')) }}/" frameborder="0"></iframe> 
        </div>

        <div class="w-10 h-10" style="position:absolute; top:90%;left:5px; z-index:10">
            <button style="position:absolute; width:90px " onclick="window.scrollTo(0,0)">
              <img src="{{ asset('/css/images/icon.PNG') }}" style="width:auto; height:auto; max-width:100% ;max-height:100%" alt="">
            </button>
         </div>

    </div>

<script>
const inputBox = document.querySelector("#date_field");
const iframe=document.querySelector("#satellite_map");
const submit_form=document.querySelector("#submit_form");
const submit_btn=document.querySelector("#submit")

    inputBox.addEventListener("change",(event)=>{
    console.log("test")
let date=inputBox.value.replace(/-/g,"")
let folder=`https://fishing-logi.sakura.ne.jp/satellite_data/${date}/`


        iframe.setAttribute('src',folder);
        console.log(iframe);
        console.log("test")

});


</script>
      
   
</x-app-layout>