<?php
include 'DB_CONNECTION.PHP'; 
$EMP_NAME = $_REQUEST['EMP_NAME'];
$SAL = $_REQUEST['SAL'];
$ADDRESS = $_REQUEST['ADDRESS'];
$DEP = $_REQUEST['DEP'];
if(empty($_REQUEST['EMP_ID'])){
  $query="insert into empolyees (EMP_NAME,SAL,ADDRESS,DEP)
  values('$EMP_NAME','$SAL','$ADDRESS','$DEP')";
  $result=mysqli_query($mysqli,$query);
}else {
  $EMP_ID=$_REQUEST['EMP_ID'];
  $query="update empolyees set EMP_NAME='$EMP_NAME',SAL='$SAL',ADDRESS='$ADDRESS',DEP='$DEP' where EMP_ID='$EMP_ID'" ;
  $result=mysqli_query($mysqli,$query);
}