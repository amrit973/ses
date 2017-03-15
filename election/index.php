<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'].'/ses/connect.php';
//list of candidates
$query = 'select * from candidate';
$candidates = mysqli_query($connection,$query) or die ('Error querying candidate');
//list of voters
$query = 'select * from voters';
$voters = mysqli_query($connection,$query) or die ('Error querying candidate');
include 'electionModule.php';

if(isset($_GET['newelection']))
{
    include 'newElection.php';
}

if(isset($_GET['candidates']))
{
    $action='Delete candidate';
    $title='List of candidates';
    $array = $candidates;
    include 'list.php';
}

if(isset($_GET['voters']))
{
    $action='Delete voter';
    $title='List of voters';
    $array = $voters;
    include 'list.php';
}

if(isset($_POST['action']) && $_POST['action']=='Delete candidate')
{
  $id = $_POST['id'];
  $query = "Delete from candidate where id= '$id'";
  $result =mysqli_query($connection,$query)or die('error deleting candidates');
  header('Location:.');
  //exit();
}

if(isset($_POST['action']) && $_POST['action']=='Delete voter')
{
  $id = $_POST['id'];
  $query = "Delete from voters where id= '$id'";
  $result =mysqli_query($connection,$query)or die('error deleting candidates');
  header('Location: .');
}

if(isset($_GET['election']))
{
  include 'form.php';
  $_SESSION['election']='election';
}
