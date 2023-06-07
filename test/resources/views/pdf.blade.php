<!-- pdf.blade.php -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table class="table table-bordered">
      <tr>
        <td>     
           <img src="{{asset('public/facebook_marketting_images/' . $getMarkettingSingleDAta->facebook_image) }}" height="200px" width="200px"></img>
           <p class="title">{{ $getMarkettingSingleDAta->title }}</p>
           <p class="title">{{ $getMarkettingSingleDAta->dimension }}</p>
           <p class="title">{{ $getMarkettingSingleDAta->description }}</p>
        </td>
      </tr>
    </table>
  </body>
</html>