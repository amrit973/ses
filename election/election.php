<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'].'/ses/connect.php';
$query = 'select * from candidate';
$candidates = mysqli_query($connection,$query) or die ('Error querying candidate');
$query = 'select * from voters';
$voters = mysqli_query($connection,$query) or die ('Error querying candidate');
$title = strtoupper($_POST['title']);
$date = $_POST['date'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Election</title>
    <style type="text/css">
        .box
        {
            width: 60%;
            margin: 0 auto;
            text-align: center;
        }
        img
     {
        height: 100%;
        width: 100%;
        display: block;


     }
     .img
     {
        height: 120px;
        width: 190px;
        background: blue;
     }
        table
        {
            width: 65%;
            border-collapse: collapse;
        }
        th
        {
            background: #ddd;
        }
    </style>
</head>
<body>
  <?php echo $date;?>
  <div class="box">
  <h1><?php echo $title;?></h1>
          <table  align="center" >
          <tr>
              <th colspan="4" style="background:#4FC3F7;font-size: 20px;"><b>LIST OF CANDIDATES</b></th>
          </tr>
          <tr>
              <th>Image</th>
              <th>Name</th>
              <th>Address</th>
              <th>Option</th>
          </tr>
          <?php foreach($candidates as $list):?>
            <tr>
                <td>
                    <div class="img">
                        <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $list['images'] ).'"/>';?>
                    </div>
            </td>
                <td><?php echo $list['name'];?></td>
                <td><?php echo $list['address'];?></td>
                <td>
                    <form action="vote.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $list['id'];?>">
                        <input type="submit" name="action" value="vote">
                    </form>
                </td>
            </tr>
          <?php endforeach;?>
      </table>

  </div>
</body>
</html>