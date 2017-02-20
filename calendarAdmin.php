<!--http://placehold.it/500x300-->
<?php
session_start();
include 'connect.php';
if(!isset($_SESSION['email']))
{
  header('Location:index.php');
}
$dbhost='localhost';
$dbuser = 'root';
$dbpassword  ='';
$dbdatabse ='ses';
$connection =mysqli_connect($dbhost,$dbuser,$dbpassword,$dbdatabse)or die ("error connecting databse");
?>
<html>
 <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width-device-width, initial-scale=1">
   <title>SES</title>
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
   <link rel="stylesheet" type="text/css" href="font/bootstrap-social.css">
   <link rel="stylesheet" type="text/css" href="fontawesome/css/font-awesome.min.css">
   <link rel="stylesheet" type="text/css" href="styleAdmin.css">
   <script type="text/javascript">
        function goLastMonth(month,year)
        {
              if(month==1)
              {
                --year;
                month=13;
              }
              month--;
              var monthString = ""+month+"";
              var monthLength = monthString.length;
              if(monthLength<=1)
              {
                monthString = "0"+monthString;
              }
              document.location.href= "<?php $_SERVER['PHP_SELF'];?>?month="+monthString+"&year="+year;
        }
        function goNextMonth(month,year)
        {
           if(month==12)
           {
            month=0;
            ++year;
           }
           month++;
              var monthString = ""+month+"";
              var monthLength = monthString.length;
              if(monthLength<=1)
              {
                monthString = "0"+monthString;
              }
            document.location.href= "<?php $_SERVER['PHP_SELF'];?>?month="+monthString+"&year="+year;
        }
    </script>
   <style >
     #box{width: 70%;
      margin:0 auto;
      margin-top: 20px}
      .today {background: #29B6F6;}
        .event {background: #B3E5FC;}
        #event {
            text-align: center;
            width: 70%;
            margin:0 auto;}
          table
          {
            width: 80%;
            height: 50%;
            border-collapse: collapse;
          }
          table {border: 1px solid #ddd;}
    th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: center;
    background-color: #4CAF50;
    color: white;
}
.detail
{
  width: 300px;
  margin:0 auto;
}

  </style>
 </head>
   <body>
    <div id="wrapper">
         <nav class="navbar navbar-inverse navbar-fixed-top navposition"><!--top menu-->

              <div class="navbar-header">
                 <button type="button" class="navbar-toggle" data-toggle="collapse"
                 data-target="#myNavbar">
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                 </button>
                <a class="navbar-brand">SES Admin</a>
              </div>
                <div class="collapse navbar-collapse" id="myNavbar">
             <ul class="nav navbar-nav pull-right">
               <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="glyphicon glyphicon-user"></span>
                                  Admin
                                       <b class="caret"></b>
                  </a>
                    <ul class="dropdown-menu">
                       <li><a href="adminLogout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
                    </ul>
               </li>
             </ul>
             </div>
          </nav><!--top menu-->
          <!--sidebar-->

            <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="#"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="admin.php"><i class="fa fa-user"></i> &nbsp;Profile</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-wrench"></i> &nbsp;Election</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-envelope"></i> &nbsp;Mail</a>
                    </li>
                    <li>
                        <a href="calendarAdmin.php"><i class="fa fa-calendar"></i> &nbsp;Calendar</a>
                    </li>
            </ul>
</div><!--wrapper-->
    <div id="box">
     <div class="row">
         <?php
    if(isset($_GET['day']))
    {
        $day=$_GET['day'];
    }
    else
    {
        $day = date("j");
    }
    if(isset($_GET['month']))
    {
        $month=$_GET['month'];
    }
    else
    {
        $month = date("n");
    }
    if(isset($_GET['year']))
    {
       $year=$_GET['year'];
    }
    else
    {
        $year = date("Y");
    }


    //store day month year in  timestamp
    $currentTimeStamp = strtotime("$year-$month-$day");
    //get current month name
    $monthName = date("F",$currentTimeStamp);
    //no of days in current month
    $numDays= date("t",$currentTimeStamp);
    $counter =0;

    ?>
    <?php
    if(isset($_GET['add']))
    {
        $title = $_POST['textTitle'];
        $detail = $_POST['textDetail'];
        $eventDate = $month."/".$day."/".$year;
        $query = "Insert into eventcalendar (Title,Detail,eventDate,dateAdded) values('$title','$detail','$eventDate',now())";
        $result = mysqli_query($connection,$query)or die ("error querying database");

    }
    ?>
   <table border="1" align="center">
       <tr>
           <td><input type="button" name="previousMonth" style="width: 100%;height: 100%;" value="<<" onClick="goLastMonth(<?php echo  $month.','.$year;?>);"></td>
           <td colspan="5" align="center"><?php echo $monthName.",".$year;?></td>
           <td><input type="button" name="nextMonth" style="width: 100%; height: 100%;" value=">>"  onClick="goNextMonth(<?php echo $month.','.$year;?>);"></td>

       </tr>
       <tr>

           <th >Sunday</th>
           <th >Monday</th>
           <th >Tuesday</th>
           <th >Wednesday</th>
           <th >Thursday</th>
           <th >Friday</th>
           <th >Saturday</th>
       </tr>
       <?php
         echo "<tr>";
         for($i=1;$i<$numDays+1;$i++,$counter++)
         {
            $timeStamp = strtotime("$year-$month-$i");
            if($i==1)
            {
                $firstDay = date("w",$timeStamp);
                for($j=0;$j<$firstDay;$j++,$counter++)
                     echo"<td>&nbsp;</td>";
            }
            if($counter % 7== 0)
            {
                  echo "</tr><tr>";
            }
             $monthString = $month;
             $monthLength = strlen($monthString);
             $dayString = $i;
             $dayLength = strlen($dayString);
             if($monthLength<=1)
             {
                $monthString = "0".$monthString;
             }
             if($dayString<=1)
             {
                $dayString = "0".$dayString;
             }
             $todayDate = date("m/d/Y");
             $datetoCompare = $monthString."/".$dayString."/".$year;
             echo "<td align='center'";
             if($todayDate == $datetoCompare)
             {
                echo "class='today'";
             }
             else
             {
                $query ="select * from eventcalendar where eventDate='".$datetoCompare."'";
                $noOfEvent = mysqli_num_rows(mysqli_query($connection,$query));
                if($noOfEvent >=1)
                {
                    echo "class='event'";
                }

             }
            echo "><a href='".$_SERVER['PHP_SELF']."?month=".$monthString."&day=".$dayString."&year=".$year."&v=true'>$i</a></td>";



         }
         echo "</tr>";
       ?>
   </table>
   <?php
   if(isset($_GET['v']))
   {
    echo "<h3 align='center'><a href='".$_SERVER['PHP_SELF']."?month=".$month."&day=".$day."&year=".$year."&v=true&f=true'>Add Event</a></h3>";
    if(isset($_GET['f']))
        include 'eventForm.php';
   }
   $sqlEvent = "select * from eventcalendar where eventDate='".$month."/".$day."/".$year."'";
   $resultEvent = mysqli_query($connection,$sqlEvent)or die ("error querying databse");
   foreach($resultEvent as $desc)
   {
    echo "<div id ='event'>";
    echo "<hr>";
    echo "Title: ".$desc['Title']."<br>";
    echo "Detail: ".$desc['Detail']."<br";
    echo "Date: ".$desc['eventDate']."<br";
    echo "</div>";

   }
   ?>

     </div><!--end of row-->
    </div><!--end of box-->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   </body>
</html>