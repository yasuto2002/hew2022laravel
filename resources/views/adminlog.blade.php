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
   <form method="POST" action="/admin/log">
       @csrf
       <p>emaile</p>
       <input type="text" name="name">
       <br>
       <p>password</p>
       <input type="password" name="pas">
       <br>
       <input type="submit" value="ログイン">
   </form>

</form>
@isset($items)
@php

$items[0]->password;

@endif
</body>
</html>
