// alert("hello");


  const Img = document.querySelector("#inputGroupFile04");
  const imgDiv = document.querySelector("#image");
  const lonData = document.querySelector("#lon");
  const latData = document.querySelector("#lat");
  const temp = document.querySelector("#customRangeTemp");
  const watertemp = document.querySelector("#customRangeWtemp");
  const wind =document.querySelector("#customRangewinSpn");
  const pressure =document.querySelector("#customRangepressure");
  const gettime = document.querySelector("#getTime");
 
  let LocationInfo;
  let Lon;
  let Lat;
  let longitude;
  let latitude;
 
  let imgData={};
  let locationData=[];
 
  Img.onchange = function(){
    loadImage(
      this.files[0],
      function(img,data){
       imgDiv.innerHTML = "";
       imgDiv.appendChild(img);
 
       let gpsInfo
       try{
        gpsInfo = data.exif && data.exif.get('GPSInfo');
       console.log(data.exif[306].substring(0,10));
       }catch{
        alert("画像に位置情報が登録されていないため、環境情報を自動取得できませんでした。")
       }
       
       
       // data.exif[306)]
       if(gpsInfo){
        ;
         imgData = gpsInfo.getAll();
        let dmsLon = imgData.GPSLongitude;
        let dmsLat = imgData.GPSLatitude;
        let dmsLonArray = dmsLon.split(",");
        let dmsLatArray = dmsLat.split(",");
        let degLon = Number(dmsLonArray[0])+Number(dmsLonArray[1])/60+Number(dmsLonArray[2])/3600;
        let degLat = Number(dmsLatArray[0])+Number(dmsLatArray[1])/60+Number(dmsLatArray[2])/3600;
        locationData.push(degLon);
        locationData.push(degLat);
        lonData.value=locationData[0];
        latData.value=locationData[1];
        let Time = data.exif[306].substring(0,10);
        getWather(degLat,degLon,Time);
       }},
       { 
                   maxWidth:150,
                   maxHeight:150,
                   contain  : true,
                   meta     : true 
               }
      
    )
  }



//stormGrass function 
 function getWather(lat,lng,time){
 // const lat = 43.1544;
 // const lng = 141.1518;
 const params = 'waveHeight,airTemperature,waterTemperature,pressure,cloudCover,windSpeed,windDirection';
 
 fetch(`https://api.stormglass.io/v2/weather/point?lat=${lat}&lng=${lng}&params=${params}&start=${time}&end=${time}`, {
   headers: {
     'Authorization': '80d40762-b70b-11eb-80d0-0242ac130002-80d407da-b70b-11eb-80d0-0242ac130002'
   }
 }).then((response) => response.json()).then((jsonData) => {
   // Do something with response data.
   console.log(jsonData);
   temp.value=jsonData.hours[0].airTemperature.sg;
   watertemp.value=jsonData.hours[0].waterTemperature.sg;
   wind.value=jsonData.hours[0].windSpeed.sg;
   pressure.value=jsonData.hours[0].pressure.sg;
   gettime.value=jsonData.hours[0].time.substring(0,10);
  //  console.log(gettime.value);
 });
 };