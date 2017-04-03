<?php
error_reporting(0);
        if(!isset($_SESSION['title'])or!isset($_SESSION['date'])or!isset($_SESSION['election']))
        {
          echo 'No Result to Display ';
          echo "Click <a href='../newlogin.php'>here</a> to go back";
        }
?>

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
              <th colspan="4">Result</th>
          </tr>
          <?php foreach($result as $list):?>
            <tr>
                <td>
                    <div class="img">
                        <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $list['images'] ).'"/>';?>
                    </div>
            </td>
                <td><?php echo $list['name'];?></td>
                <td><?php echo $list['address'];?></td>
                <td><?php echo $list['vote'];?></td>
            </tr>
          <?php endforeach ;?>
      </table>
      </div>
</body>
</html>