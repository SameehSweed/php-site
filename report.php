<?php
/* median nabwani - 207571498
sameeh sweed - 206444739  */
session_start();
$fp = fopen("reports.txt", "a");//opens the reports.txt for addding info
if ($fp != false)//if the file opened successfully
{
  $message = $_SESSION["username"] . " added a report : " . $_POST['report_submit'];
  if(trim($_POST['report_submit'])!="")//to skip empty or spacing only reports
  {
    fputs($fp, "$message\n");
    fputs($fp, "--------------------------------\n");
    fclose($fp);
    echo"<script>
      alert('Report was sent. thank you!');
      window.location.href='home.php';
      </script>";
  }
  else
  {
    echo"<script>
        alert('Send valid report!');
        window.location.href='home.php';
        </script>";
  }
}


?>