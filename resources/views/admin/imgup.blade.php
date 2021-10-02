
  <form action="img" method="post" enctype="multipart/form-data">
    <!-- アップロードフォームの作成 -->
    <input type="file" class="form-control" name="file">
    {{ csrf_field() }}
    <input type="submit" value="アップロード">
  </form>
