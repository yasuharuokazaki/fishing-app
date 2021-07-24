<x-app-layout>
    <x-slot name="header">
       
      <div class="flex">
        
            <div class="flex-1">
              <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                  {{ __('Satellite') }}
                
              </h2>
              <p style="margin-top:0px"></p>

              <div class="flex">
                <div class="flex-grow"><p>衛星画像の分析から得られた水温・潮目・クロロフィル-a</p></div>
                   
                <div class="flex">
                　  <label for="date_field">
                        
                        <div class="flex-1 flex">
                            <form id="submit_form" action="" method="get">
                                <input id="date_field" class="rounded-xl h-9 mr-2" type="date" value="@php print date('Y-m-d',strtotime('-1 day'));@endphp">
                                {{-- <input id="submit" type="submit">,strtotime('-1 day') --}}
                            </form>
                            <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="width: 32px; height: 32px; opacity: 1;" xml:space="preserve">
                                <style type="text/css">
                                    .st0{fill:#4B4B4B;}
                                    #map{ 
                                          position:relative;
                                          width:100%;
                                          height:0;
                                          padding-top:75%;
                                        }
                                    #map iframe{
                                                  position:absolute;
                                                  top:0;
	                                              left:0;
                                                  width:100%;
                                                  height:100%;
                                                }
                                </style>
                                <g>
                                    <path class="st0" d="M149.193,103.525c15.994,0,28.964-12.97,28.964-28.973V28.964C178.157,12.97,165.187,0,149.193,0
                                        C133.19,0,120.22,12.97,120.22,28.964v45.589C120.22,90.555,133.19,103.525,149.193,103.525z" style="fill: rgb(75, 75, 75);"></path>
                                    <path class="st0" d="M362.815,103.525c15.995,0,28.964-12.97,28.964-28.973V28.964C391.78,12.97,378.81,0,362.815,0
                                        c-16.002,0-28.972,12.97-28.972,28.964v45.589C333.843,90.555,346.813,103.525,362.815,103.525z" style="fill: rgb(75, 75, 75);"></path>
                                    <path class="st0" d="M435.164,41.287h-17.925v33.265c0,30.017-24.415,54.432-54.423,54.432c-30.017,0-54.431-24.415-54.431-54.432
                                        V41.287H203.615v33.265c0,30.017-24.414,54.432-54.422,54.432c-30.016,0-54.432-24.415-54.432-54.432V41.287H76.836
                                        c-38.528,0-69.763,31.234-69.763,69.763v331.187C7.073,480.765,38.309,512,76.836,512h358.328
                                        c38.528,0,69.763-31.235,69.763-69.763V111.05C504.927,72.522,473.691,41.287,435.164,41.287z M450.023,429.988
                                        c0,17.826-14.503,32.329-32.329,32.329H94.306c-17.826,0-32.329-14.503-32.329-32.329V170.876h388.047V429.988z" style="fill: rgb(75, 75, 75);"></path>
                                    <rect x="190.729" y="371.769" class="st0" width="51.191" height="51.192" style="fill: rgb(75, 75, 75);"></rect>
                                    <rect x="190.729" y="292.419" class="st0" width="51.191" height="51.19" style="fill: rgb(75, 75, 75);"></rect>
                                    <rect x="111.386" y="371.769" class="st0" width="51.19" height="51.192" style="fill: rgb(75, 75, 75);"></rect>
                                    <rect x="111.386" y="292.419" class="st0" width="51.19" height="51.19" style="fill: rgb(75, 75, 75);"></rect>
                                    <rect x="349.423" y="213.067" class="st0" width="51.19" height="51.191" style="fill: rgb(75, 75, 75);"></rect>
                                    <rect x="270.08" y="213.067" class="st0" width="51.199" height="51.191" style="fill: rgb(75, 75, 75);"></rect>
                                    <rect x="270.08" y="292.419" class="st0" width="51.199" height="51.19" style="fill: rgb(75, 75, 75);"></rect>
                                    <rect x="349.423" y="371.769" class="st0" width="51.19" height="51.192" style="fill: rgb(75, 75, 75);"></rect>
                                    <rect x="349.423" y="292.419" class="st0" width="51.19" height="51.19" style="fill: rgb(75, 75, 75);"></rect>
                                    <rect x="270.08" y="371.769" class="st0" width="51.199" height="51.192" style="fill: rgb(75, 75, 75);"></rect>
                                    <rect x="190.729" y="213.067" class="st0" width="51.191" height="51.191" style="fill: rgb(75, 75, 75);"></rect>
                                    <rect x="111.386" y="213.067" class="st0" width="51.19" height="51.191" style="fill: rgb(75, 75, 75);"></rect>
                                </g>
                            </svg> 
                           
                        </div>
                    </label>
                </div>

              </div>
              <div id="map">
                <iframe id="satellite_map" src="https://fishing-logi.sakura.ne.jp/satellite_data/{{ date('Ymd',strtotime('-1 day')) }}/" frameborder="0"></iframe> 
               </div>

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
                // submit_btn.click();
            });
                
                // fetch('url')でurl先にGETを飛ばす
                // fetch(`https://fishing-logi.sakura.ne.jp/satellite_data/${date}`);
                // });
        </script>
    </x-slot>
   {{-- flash massage --}}
  
   
       <body>
        {{-- @if (isset($ob_date))
          {{ $ob_date }}
        @endif
        
           <div id="map">
            <iframe id="satellite_map" src="https://fishing-logi.sakura.ne.jp/satellite_data/{{ date('Ymd',strtotime('-1 day')) }}/" frameborder="0"></iframe> 
           </div>
  --}}
       </body>
   
</x-app-layout>