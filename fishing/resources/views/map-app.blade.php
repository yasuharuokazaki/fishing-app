<x-app-layout>
    <x-slot name="header">
       
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              {{ __('Map') }}
          </h2>
         
      </x-slot>


<h2 style="margin:0px"><a href="./app_top.php">fishig_data</a></h2>
<p style="margin-top:0px">USER:</p>
{{-- <input id="user_key" type="hidden" value="{{ 1 }}"> --}}
 <p>※自分の情報：赤ピン<br>他人の情報:青ピン</p>  
  <section style="display:flex;flex-flow: row-reverse">
   <div id="img_wrap" style="width:350px">
   
    <table>
    <form action="" method="get">
    <div style="margin-left:10px">
    <p>対象魚名で絞り込む</p>
      <input name="serach" type="search" placeholder="キーワードを入力してください">
      <input type="submit">
      <p style="color:red">リセット：「キーワードを入力せず送信」を押してください。</p>
    </div>
    </form>
      {{-- print $imgs ? --}}
    </table>

    
    </div>
    <!-- space to display map -->
     <div class="ml-3" id="myMap" style='position:relative;width:600px;height:400px;'>
    
  </div> 
    
  </section>
 




</x-app-layout>