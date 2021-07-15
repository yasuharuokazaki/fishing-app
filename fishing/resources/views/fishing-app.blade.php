<x-app-layout>
    <x-slot name="header">
       
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fishing Data') }}
        </h2>
       
    </x-slot>

          {{-- flash massage --}}
          @if(session('flash_message'))
          <div style="margin-top:30px;padding-left:4%" class="font-bold　align-middle text-left text-4xl bg-green-100 flow-root text-green-500">
            {{ session('flash_message') }}
          </div>
          @endif

          {{-- validation --}}
          @if ($errors->any())
          <div class="text-red-500">
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
            
            
       
            <div class="flex">          
                   {{-- display img --}}
                   <div id="img_wrap" class="">
                        {{-- img up space--}}
                         <div id="image" class="box-border h-32 w-32 p-4 border-4 rounded-md" style="background-color:skyblue;width:300px;height:370px;margin-top:0px padding-bottom:10px" >
                              {{-- insert img with js --}}
                         </div>
                        {{-- input button --}}
                        <div class="">
                             <div class="my-4">
                                <strong>釣果写真をアップしてね!</strong>
                              </div>
                        {{-- form  --}}
                          <form action="{{ url('/fishing_app/submit') }}" method="POST" enctype="multipart/form-data">
                              @csrf
                              <div class="class="input-group" style="margin-right:100px">
                                    <input id="inputGroupFile04" name="img" type="file" value="Upload" class="form-control"  accept="image/*" capure=""  aria-describedby="inputGroupFileAddon04" aria-label="Upload" >
                                    <input id="lat" type="hidden" name="latitude" value="">
                                    <input id="lon" type="hidden" name="longitude" value="">
                                    <input id="getTime" type="hidden" name="gettime" value="">
                              </div>
                        </div> 
                   </div> 
                 {{--/display img  --}}

                 {{-- display fishing result data --}}
                <div style="margin-top:20px;">

                      {{-- fish data  --}}
                        <div style="margin-right:50px">   
                            <p><strong>Target-name</strong> | size</p>
                              <div class="space-x-2 input-group">
                                  <!-- name -->
                                  <div class="inline-block">
                                    <input name="name" type="text" id="target-name"  placeholder="target-name" aria-label="First name" class="rounded-xl" flex-basis="70%" required>
                                  </div>
                                  <!-- size  -->
                                  <div class="inline-block">
                                    <input name="size" type="text" id="target-size"  placeholder="target-size(cm)" aria-label="Last name" class="rounded-xl" style="width:135px">
                                  </div>
                              </div>          
                          <!-- description -->
                            <div class="input-group mb-4" style="margin-top:30px">
                                <p><strong>Descliption</strong></p>
                                <textarea name="desc" id="target-descliption" class="form-control rounded-xl w-500" aria-label="descliption" clos="50" rows="6" style="width:335px"></textarea>
                            </div>
                        </div>
                      {{-- /fish data --}}

                        {{-- environment data --}}
                            <div class="space-x-2">
                                <p><strong>Environment</strong><span style="font-size: 80%;border:none;margin-left:10px;background-color:yellow;color:black">※自動取得します</span></p>
                                <p style="font-size:13px">修正する場合は直接入力してください</p>
                                <!-- 気温<span id="tempSpn">--℃</span> -->
                                <div class="inline-block">
                                <label for="customRangeTemp" class="form-label">Temp </label>
                                    <div class="inline-block" style="display: flex;">
                                        <input name="temp" type="text" class="form-range rounded-xl" id="customRangeTemp" style="background-color: #ffffff;width:80px;"
                                          placeholder=" --℃">
                                        <p style="line-height:10px;color:black;margin-left:5px">℃</p>
                                    </div>
                                  </div>
                                <!-- 水温<span id="WtempSpn">--℃</span> -->
                                <div class="inline-block">
                                <label for="customRangeWtemp" class="form-label" style="margin-top: 5px;margin-bottom:10px">Water temp</label>
                                  <div class="inline-block" style="display: flex;">
                                    <input name="water_temp" type="text" class="form-range rounded-xl" id="customRangeWtemp" style="background-color: #ffffff;width:80px;"
                                      placeholder=" --℃">
                                      <p style="line-height:10px;color:black;margin-left:5px">℃</p>
                                  </div>
                                </div>
                            <!-- 風<span id="winSpn">-km/h</span>-->
                            <div class="inline-block">
                                <label for="customRangewinSpn" class="form-label wind-form" style="margin-top: 10px;margin-bottom:2px">Wind
                                  <span class="dirtext"style="margin-left: 100px;">Direction </span>
                                </label>
                             
                                <div class="inline-block" style="display: flex;">
                                    <div class="wind-form" >
                                      <input name="wind" type="text" class="form-range rounded-xl" id="customRangewinSpn" style="background-color: #ffffff;width:80px;"
                                      placeholder=" --km/h">
                                    </div>
                                    <div class="">
                                        <p style="line-height:10px;color:black;margin-left:5px">km/h</p>
                                        {{-- wind dir selection --}}
                                        <select name="win_dir" class="winDir rounded-xl" id="winDir" style="margin-top: 0px;margin-left:60px;width:50px">
                                          <option value="北">北</option>
                                          <option value="東">東</option>
                                          <option value="南">南</option>
                                          <option value="西">西</option>
                                        </select> 
                                    </div>
                                </div>
                            </div>
                            <!-- 気圧-->
                                <div class="mt-3">
                                  <label for="customRangepressure" class="form-label wind-form" style="margin-top: 10px;margin-bottom:2px">Pressure
                                  </label>
                                  <div  style="display: flex;">
                                    <input name="hPa" type="text" class="form-range rounded-xl" id="customRangepressure" style="background-color: #ffffff;width:80px;"
                                        placeholder=" --hPa">
                                      <p style="line-height:10px;color:black;margin-left:5px">hPa</p>
                                  </div>  
                                </div>     
                            </div>
                            {{-- /environ data --}}
                     </div>
                     </div>
                     {{-- /img + environments --}}

          
                  {{-- permition for publish --}}
                    <div style="display: flex">

                       <div style="margin-right:20px">
                          <p style="margin-left: 10px;"><strong>公開可否</strong></p>
                       </div>
                       <div>
                          <label><input type="checkbox" value="1" name="op_flag" checked>許可</label>
                       </div>

                    </div>
               
                  {{-- submit button --}}
                   <div>                  
                      <div class="mx-8 mt-10 w-30 rounded-md">
                          <button type="submit" class="mt-5 p-2 rounded-md transition duration-500 ease-in-out bg-blue-300 hover:bg-red-300 transform hover:-translate-y-1 hover:scale-110">データ保存</button>
                      </div>  
                   </div> 
                </div>
                
              </form>   
                
             
                
             
          

       {{-- 以下ラッパー --}}
             </div>
           </div>
       </div>
     </div>
  </div>
    
</x-app-layout>

<script>
 

</script>
