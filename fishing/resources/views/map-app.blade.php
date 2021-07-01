<x-app-layout>
    <x-slot name="header">
      <div class="flex">
            <div class="flex-1">
              <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                  {{ __('Map') }}
                
              </h2>
              <p style="margin-top:0px">USER:{{ Auth::user()->name }}</p>
{{-- <input id="user_key" type="hidden" value="{{ 1 }}"> --}}
               <p>自分の情報：赤ピン<br>他人の情報:青ピン</p> 
            </div>
          <form action="" method="get">
            <div class="flex-1" style="margin-left:10px">
            <p>対象魚名で絞り込む</p>
              <input name="serach" type="search" placeholder="キーワードを入力してください">
              <input type="submit">
              <p style="color:red">リセット：「キーワードを入力せず送信」を押してください。</p>
            </div>
           </form>
       </div>
    </x-slot>

 
  <section style="display:flex;flex-flow: row-reverse">
   <div id="img_wrap" style="width:auto">

    
    </div>
    <!-- space to display map -->
     <div class="" id="myMap" style='position:relative;width:1500px;height:700px;'>
    
  </div> 
  
  </section>
 

<script>
  let json=@json($json) ;

  console.log(json[2]);

  function GetMap(){
      //マップのインスタンス作成
     
       map = new Microsoft.Maps.Map(document.getElementById('myMap'), {
                 center: new Microsoft.Maps.Location(43.1489024,141.3840896),
                 mapTypeId: Microsoft.Maps.MapTypeId.aerial,
                 zoom:8
               });
     
     //
       var infobox = new Microsoft.Maps.Infobox(point,{   
                                                    title: '', 
                                                    description: '',
                                                    visible: false,
                                                    
                                                  });

     //作成したinfoboxインスタンスをマップに組みこむ 
       infobox.setMap(map);

     //登録されているデータ数分のピン作成
        for(let i=0; i< json.length;i++){

          if( json[i]['lat']!==null && json[i]['lon']!==null && json[i]['op_flag']==1){

              var point = new Microsoft.Maps.Location(json[i]['lat'],json[i]['lon']);
              var pushpin = new Microsoft.Maps.Pushpin(point,{
                               color: 'red'
                             });
         
              pushpin.metadata={
                                title:`${json[i]['name']}`,
                                description:`<img class="mt-0 ml-0 mb-0 h-20 m-10" src={{ asset("/storage/imgs") }}/${json[i]['img_path']}><br><p class="w-50 p-0">${json[i]['desc']}</p>`
                               }

         //pushpinClickedという関数をクリックイベントに追加
              Microsoft.Maps.Events.addHandler(pushpin, 'click', pushpinClicked);
              map.entities.push(pushpin);
            }else{
                  continue;
            }
        }
    

    //pushpinClicked関数の定義
    function pushpinClicked(e) {
       console.log(e);
        if(e.target.metadata){
          infobox.setOptions({ 
            location:e.target.getLocation(),
            title:e.target.metadata.title,
            description:e.target.metadata.description,
            visible:true,
            width:'auto',
            height:'auto',
            })
          }
        };
   }
</script>

</body>
</x-app-layout>