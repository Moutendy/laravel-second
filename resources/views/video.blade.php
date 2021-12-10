 






  <form action="videopost" method="post" enctype="multipart/form-data">
  	  {{ csrf_field() }}
  <div class="form-example">
    <label for="name">Video</label>
    <input type="file" name="video[]"  multiple="multiple">
  </div>
 
  <div class="form-example">
    <input type="submit" value="Subscribe!">
  </div>
</form>