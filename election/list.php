<!DOCTYPE html>
<html>
<head>
 <style type="text/css">
     img
     {
        height: 100%;
        width: 100%;
        display: block;


     }
     .img
     {
        height: 100px;
        width: 150px;
        background: blue;
     }

 </style>
</head>
<body>
    <div class="box">
    <h1></h1>
      <table  align="center">
          <tr>
              <th colspan="4"><?php echo $title;?></th>
          </tr>
          <?php foreach($array as $list):?>
            <tr>
                <td>
                    <div class="img">
                        <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $list['images'] ).'"/>';?>
                    </div>
            </td>
                <td><?php echo $list['name'];?></td>
                <td><?php echo $list['address'];?></td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?php echo $list['id'];?>">
                        <input type="submit" name="action" value="<?php echo $action;?>">
                    </form>
                </td>
            </tr>
          <?php endforeach;?>
      </table>
      </div>
</body>
</html>