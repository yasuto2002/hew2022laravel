<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href=https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <style>
        .mes{
            color:#f00;
        }
        p{
            margin:0;
        }
    </style>
</head>
<body>
   <form method="POST" action="/admin">
       @csrf
       <p>id</p>
       @error('id')
        <p class="mes">{{$message}}</p>
       @enderror
       <input type="text" name="id" value = "{{old('id')}}">
       <br>
       <p>password</p>
       @error('pas')
        <p class="mes">{{$message}}</p>
       @enderror
       <input type="password" name="pas" value = "{{old('pas')}}">
       <br>
       <input type="submit" value="ログイン">
   </form>

</form>
@isset($items)

{{$items}}

@endif
</body>
</html>
