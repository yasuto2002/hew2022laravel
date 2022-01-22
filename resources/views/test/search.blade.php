<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href=https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
 検索

 <form action="" method="POST">
    <label>山手線::<input type="radio" name = "station_root"></label>
    <label>中央線::<input type="radio" name = "station_root"></label>

    <br>路線<br>
    <input type="checkbox" name="station" value = 1>東京
    <input type="checkbox" name="station" value = 2>新宿
    賃料
    <div style="display:flex;">
    <select>
        <option disabled selected>下限</option>
        <option>5万円以下</option>
    </select>
        <select>
        <option disabled selected>上限</option>
        <option>5万円以上</option>
    </select>
    </div>
 </form>
</body>
</html>
