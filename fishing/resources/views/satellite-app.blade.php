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
           var img_chloro_1 = 'data/chloro_1.png';
           var img_bounds_chloro_1 = [[40.71937193719372,139.72906075506293],[45.52985298529853,145.90157513126096]];
           var layer_chloro_1 = new L.imageOverlay(img_chloro_1,
                                                 img_bounds_chloro_1,
                                                 {pane: 'pane_chloro_1'});
           bounds_group.addLayer(layer_chloro_1);
           map.addLayer(layer_chloro_1);
           map.createPane('pane_water_temp_2');
           map.getPane('pane_water_temp_2').style.zIndex = 402;
           var img_water_temp_2 = 'data/water_temp_2.png';
           var img_bounds_water_temp_2 = [[41.17141714171417,139.37835026802145],[45.72787278727873,145.83286662933034]];
           var layer_water_temp_2 = new L.imageOverlay(img_water_temp_2,
                                                 img_bounds_water_temp_2,
                                                 {pane: 'pane_water_temp_2'});
           bounds_group.addLayer(layer_water_temp_2);
           map.addLayer(layer_water_temp_2);
           map.createPane('pane_water_temp_slope_3');
           map.getPane('pane_water_temp_slope_3').style.zIndex = 403;
           var img_water_temp_slope_3 = 'data/water_temp_slope_3.png';
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