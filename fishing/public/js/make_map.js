

// let js_array =[140,32] 
// console.log(js_array);


// const user_key=document.querySelector("#user_key");


//The following represents call-back-function for Bing-Map
// let map;
// let pin=[];
// let infobox;

  //マップ作製
   function GetMap(){
      //マップのインスタンス作成
     
       map = new Microsoft.Maps.Map(document.getElementById('myMap'), {
       center: new Microsoft.Maps.Location(43.1489024,141.3840896),
       mapTypeId: Microsoft.Maps.MapTypeId.aerial,
       zoom:8
     });
     
     //infoboxのインスタンス作成
     var infobox = new Microsoft.Maps.Infobox(point,
     {   
        title: '', 
        description: '',
        visible: false
      });
     //作成したinfoboxインスタンスをマップに組みこむ 
     infobox.setMap(map);

     //登録されているデータ数分のピン作成
    //  for(let i=0; i< js_array.length;i++){
    //   if(i%5==0){
    //    if( js_array[i][1]!==null && js_array[i][0]!==null){
    //       var point = new Microsoft.Maps.Location(Number(js_array[i][1]),Number(js_array[i][0]));
    //       var pushpin = new Microsoft.Maps.Pushpin(point,{
            
    //        color: user_key.value==js_array[i+4]? 'red':'blue'  
              
    //    });
         
    //       pushpin.metadata={
    //         title:`${js_array[i+1]}`,
    //         description:`${js_array[i+2]}<br><img src='${js_array[i+3]}'>`
    //       }
    //      //pushpinClickedという関数をクリックイベントに追加
    //      Microsoft.Maps.Events.addHandler(pushpin, 'click', pushpinClicked);
    //      map.entities.push(pushpin);
    //    }else{
    //      continue;
    //    }
    //   }
    // }

    //pushpinClicked関数の定義
    // function pushpinClicked(e) {
    //     if(e.target.metadata){
    //       infobox.setOptions({ 
    //         location:e.target.getLocation(),
    //         title:e.target.metadata.title,
    //         description:e.target.metadata.description,
    //         visible: true })
    //     }
    //   }
   
  }

