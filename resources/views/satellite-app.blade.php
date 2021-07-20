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
                            <input id="date_field" class="rounded-xl h-9 mr-2" type="date">
                            <svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="width: 32px; height: 32px; opacity: 1;" xml:space="preserve">
                                <style type="text/css">
                                    .st0{fill:#4B4B4B;}
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

            </div>
       </div>
  
    </x-slot>
   {{-- flash massage --}}
  
   
       <body>
           <div id="map">
           </div>
           <script src="js/qgis2web_expressions.js"></script>
           <script src="js/leaflet.js"></script><script src="js/L.Control.Locate.min.js"></script>
           <script src="js/leaflet.rotatedMarker.js"></script>
           <script src="js/leaflet.pattern.js"></script>
           <script src="js/leaflet-hash.js"></script>
           <script src="js/Autolinker.min.js"></script>
           <script src="js/rbush.min.js"></script>
           <script src="js/labelgun.min.js"></script>
           <script src="js/labels.js"></script>
           <script src="js/leaflet-control-geocoder.Geocoder.js"></script>
           <script>
           var map = L.map('map', {
               zoomControl:true, maxZoom:28, minZoom:1
           }).fitBounds([[35.70361704262386,137.20674039247245],[46.24404241763905,145.99161760076203]]);
           var hash = new L.Hash(map);
           map.attributionControl.setPrefix('<a href="https://github.com/tomchadwin/qgis2web" target="_blank">qgis2web</a> &middot; <a href="https://leafletjs.com" title="A JS library for interactive maps">Leaflet</a> &middot; <a href="https://qgis.org">QGIS</a>');
           var autolinker = new Autolinker({truncate: {length: 30, location: 'smart'}});
           L.control.locate({locateOptions: {maxZoom: 19}}).addTo(map);
           var bounds_group = new L.featureGroup([]);
           function setBounds() {
           }
           map.createPane('pane_OSMStandard_0');
           map.getPane('pane_OSMStandard_0').style.zIndex = 400;
           var layer_OSMStandard_0 = L.tileLayer('http://tile.openstreetmap.org/{z}/{x}/{y}.png', {
               pane: 'pane_OSMStandard_0',
               opacity: 1.0,
               attribution: '<a href="https://www.openstreetmap.org/copyright">© OpenStreetMap contributors, CC-BY-SA</a>',
               minZoom: 1,
               maxZoom: 28,
               minNativeZoom: 0,
               maxNativeZoom: 19
           });
           layer_OSMStandard_0;
           map.addLayer(layer_OSMStandard_0);
           map.createPane('pane_chloro_1');
           map.getPane('pane_chloro_1').style.zIndex = 401;
           var img_chloro_1 = 'data/20210718/chloro_1.png';
           var img_bounds_chloro_1 = [[40.71937193719372,139.72906075506293],[45.52985298529853,145.90157513126096]];
           var layer_chloro_1 = new L.imageOverlay(img_chloro_1,
                                                 img_bounds_chloro_1,
                                                 {pane: 'pane_chloro_1'});
           bounds_group.addLayer(layer_chloro_1);
           map.addLayer(layer_chloro_1);
           map.createPane('pane_water_temp_2');
           map.getPane('pane_water_temp_2').style.zIndex = 402;
           var img_water_temp_2 = 'data/20210718/water_temp_2.png';
           var img_bounds_water_temp_2 = [[41.17141714171417,139.37835026802145],[45.72787278727873,145.83286662933034]];
           var layer_water_temp_2 = new L.imageOverlay(img_water_temp_2,
                                                 img_bounds_water_temp_2,
                                                 {pane: 'pane_water_temp_2'});
           bounds_group.addLayer(layer_water_temp_2);
           map.addLayer(layer_water_temp_2);
           map.createPane('pane_water_temp_slope_3');
           map.getPane('pane_water_temp_slope_3').style.zIndex = 403;
           var img_water_temp_slope_3 = 'data/20210718/water_temp_slope_3.png';
           var img_bounds_water_temp_slope_3 = [[41.17141714171417,139.37835026802145],[45.72787278727873,145.83286662933034]];
           var layer_water_temp_slope_3 = new L.imageOverlay(img_water_temp_slope_3,
                                                 img_bounds_water_temp_slope_3,
                                                 {pane: 'pane_water_temp_slope_3'});
           bounds_group.addLayer(layer_water_temp_slope_3);
           map.addLayer(layer_water_temp_slope_3);
           var osmGeocoder = new L.Control.Geocoder({
               collapsed: true,
               position: 'topleft',
               text: 'Search',
               title: 'Testing'
           }).addTo(map);
           document.getElementsByClassName('leaflet-control-geocoder-icon')[0]
           .className += ' fa fa-search';
           document.getElementsByClassName('leaflet-control-geocoder-icon')[0]
           .title += 'Search for a place';
           var baseMaps = {};
           L.control.layers(baseMaps,{"water_temp_slope": layer_water_temp_slope_3,"water_temp": layer_water_temp_2,"chloro": layer_chloro_1,"OSM Standard": layer_OSMStandard_0,},{collapsed:false}).addTo(map);
           setBounds();
           L.ImageOverlay.include({
               getBounds: function () {
                   return this._bounds;
               }
           });
           </script>
          
       </body>
   
</x-app-layout>