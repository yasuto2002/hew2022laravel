
  <form action="images" method="post" enctype="multipart/form-data">
    <!-- アップロードフォームの作成 -->
    <input type="file" multiple class="form-control" name="item_url[]">
    {{ csrf_field() }}
    <input type="submit" value="アップロード">
  </form>
