<!doctype html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>管理者画面</title>
<style>

    h1{
        text-align: center;
    }

</style>
</head>

<body>
   @if (count($errors) > 0)
   <div>
       <ul>
           @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
           @endforeach
       </ul>
   </div>
   @endif
<h1>物件情報追加</h1>

<form action="#" method="post" enctype="multipart/form-data" onSubmit="return check()">
    <input type="file" class="form-control" name="file1" accept="image/*" id="file1"><br>
    <input type="file" class="form-control" name="file2" accept="image/*" id="file2"><br>
    <input type="file" class="form-control" name="file3" accept="image/*" id="file3"><br>
    <input type="file" class="form-control" name="file4" accept="image/*" id="file4"><br>
    <input type="file" class="form-control" name="file5" accept="image/*" id="file5"><br>
    名前:<input type="text" name="name"><br>
    事故内容:<input type="text" name="trouble"><br>
    価格:<input type="number" name="price"  min = 0>万円<br>
    <!-- 最寄り駅路線:<input type="radio" name="train" value=1>山手線
    <input type="radio" name="train" value=2>中央線<br> -->
    最寄り駅:<select name="station">
        <option hidden disabled>選択してください</option>
        @foreach($stations as $station)
        <option value={{$station["id"]}}>{{$station["name"]}}</option>
        @endforeach
    </select>駅<br>
    築年月日:<input type="date" name="construction_date"><br>
    所在地:<input type="text" name="street_address"><br>
    <!-- 間取り:<input type="text" name="floor_plan"><br> -->
    間取り: <select name="floor_plan">
     @foreach($room as $roomType)
       <option value={{$roomType["id"]}}>{{$roomType["name"]}}</option>
     @endforeach
    </select></br>
    建物種別:<select name="building_type">
        @foreach($building_type as $buil)
        <option value={{$buil["id"]}}>{{$buil["name"]}}</option>
        @endforeach
    </select><br>
    部屋階数:<input type="number" name="room_floor"  min = 0>階<br>
    管理費:<input type="number" name="management_fee"  min = 0>万円<br>
    駅徒歩:<input type="number" name="station_walk"  min = 0>分<br>
    駅からの距離:<input type="number" name="physical_distance" min = 0>m<br>
    <!-- 構造:<input type="text" name="construction"><br> -->
    構造:<select name="construction">
        @foreach($construction as $constructionType)
        <option value={{$constructionType["id"]}}>{{$constructionType["name"]}}</option>
        @endforeach
</select></br>
    緯度:<input type="number" name="latitude" step="0.00001"><br>
    経度:<input type="number" name="longitude" step="0.00001"><br>
    備考:<br><textarea name="remarks" cols="30" rows="5" name="remarks"></textarea><br>
    <input type="submit" value="追加">
    <!-- <input type="submit" value="削除"> -->
    {{ csrf_field() }}
</form>

</body>
<script>
function check(){
    let count = 0;
    // event.preventDefault();
    let inputFile = document.querySelectorAll(".form-control");
    for (var i = 0; i < inputFile.length; i++) {
        count += inputFile[i].files.length;
    }
    if(count < 3){
        event.preventDefault();
        alert('画像は3枚以上');
    }else{
        return true;
    }
}
</script>
</html>
