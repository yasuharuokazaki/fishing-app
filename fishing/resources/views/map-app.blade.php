<x-app-layout>
    <x-slot name="header">
      <div class="flex">
            <div class="flex-1">
              <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                  {{ __('Map') }}
                
              </h2>
              <p style="margin-top:0px">user:{{ Auth::user()->name }}</p>
              <input type="hidden" id="user_id" value="{{ Auth::user()->id }}">
{{-- <input id="user_key" type="hidden" value="{{ 1 }}"> --}}
               <p>自分の情報:<span class="text-red-500">赤ピン</span><br>他人の情報:<span class="text-blue-500">青ピン</span></p> 
            </div>
          <form action="{{ url('/map_app/serch')}}" method="get">
            @csrf
            <div class="flex-1" style="margin-left:10px">
            <p>キーワードで絞り込む</p>
              <input class="rounded-md" name="keyword" type="search" placeholder="キーワードを入力してください">
              <button class="bg-gray-400" type="submit">検索</button>
              <p style="color:red">リセット：キーワードを入力せず「検索」を押してください。</p>
            </div>
           </form>
       </div>
      
    </x-slot>
   {{-- flash massage --}}
 
 
  <section style="display:flex;flex-flow: row-reverse">
   <div id="img_wrap" style="width:auto">

    
    </div>
    <!-- space to display map -->
     <div class="" id="myMap" style='position:relative;width:1500px;height:700px;'>
    
  </div> 
  
  </section>
 
  <script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=Ap-tEEOxYuHTXwifpZYWXeZKOSx38CUi3prp9jDAyf5DM-s-w5o-PjGl5-V9GgSq' async defer></script>
<script>
  let json=@json($json) ;
  let userId=document.querySelector("#user_id").value;
 
  

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
                               color: userId==json[i]['user_id']?'red':'blue',
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
    
    if(json.length==0){
    alert('該当する情報なし。別のキーワードで検索してください。');
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