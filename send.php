<html><head><link href="http://www.shiptsg.com/Dev/assets/css/bootstrap.css" rel="stylesheet">
	<link href="http://www.shiptsg.com/Dev/assets/css/bootstrap-responsive.css" rel="stylesheet">
	
    <style type="text/css">
      body {
        padding-top: 20px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
			      }
	</style>
	</head><body><div class="container">

<?php
$file_name = 'No File';
$today = date("m-d-Y_His");
 
 
 
 
 
/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require_once 'PHPExcel-develop/Classes/PHPExcel.php';



//START SAVING FILE TO SERVER

$allowedExts = array("xml", "txt", "doc", "docx", "pdf", "jpg", "jpeg", "png", "gif", "bmp", "tiff", "tif", "xls", "xlxs", "zip");

$extension = end(explode(".", $_FILES["file"]["name"]));

if (($_FILES["file"]["size"] < 104857600))

  {

  if ($_FILES["file"]["error"] > 0)

    {

    //echo "Return Code: " . $_FILES["file"]["error"] . "<br>";

    }

  else

    {

    //echo "Upload: " . $_FILES["file"]["name"] . "<br>";

   // echo "Type: " . $_FILES["file"]["type"] . "<br>";

   // echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";

  //  echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";


$file_name = $today . '_' . preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $_FILES["file"]["name"]);

    if (file_exists("upload/".$file_name))

      {

      //echo $_FILES["file"]["name"] . " already exists. ";

      }

    else

      {

      move_uploaded_file($_FILES["file"]["tmp_name"],

      "upload/".$file_name);

     // echo "Stored in: " . "upload/" . $_FILES["file"]["name"];

      }

    }

  }

else

  {

 // echo "Invalid file";

  }
$Recipient=$_POST['Recipient'];
$sender=$_POST['sender'];

if($file_name=='No File'){
$filemsg='No File Attached by User';
}else{
$filemsg = '<a href="http://www.shiptsg.net/Dev/fileSend/upload/' . $file_name . '">Click Here to Download Your File</a>';
}


$message = '<h3>A file was sent to you by '.$sender.' on our website.  Please make sure you trust the person who sent this to you.  See Charles if you have any Questions.</h3><br /><br />' . $filemsg;

$to = $Recipient;

    $headers  = "From:web@shiptsg.com\r\n"; 
    $headers .= "Content-type: text/html\r\n"; 

 $email = $to;
  $subject = 'File Sent to ' . $Recipient ;
  mail($to, $subject,$message, $headers);
  echo '<center><br /><img src="y.png"><br / ><br / ><h1>Your File Has Been Sent.</h1><br /><h2><a href="filesend.html">Click Here to Send Another</a></h2></center>';

?>
<script src="http://www.shiptsg.com/Dev/assets/js/jquery.js"></script>
    <script src="http://www.shiptsg.com/Dev/assets/js/bootstrap-transition.js"></script>
    <script src="http://www.shiptsg.com/Dev/assets/js/bootstrap-alert.js"></script>
    <script src="http://www.shiptsg.com/Dev/assets/js/bootstrap-modal.js"></script>
    <script src="http://www.shiptsg.com/Dev/assets/js/bootstrap-dropdown.js"></script>
    <script src="http://www.shiptsg.com/Dev/assets/js/bootstrap-scrollspy.js"></script>
    <script src="http://www.shiptsg.com/Dev/assets/js/bootstrap-tab.js"></script>
    <script src="http://www.shiptsg.com/Dev/assets/js/bootstrap-tooltip.js"></script>
    <script src="http://www.shiptsg.com/Dev/assets/js/bootstrap-popover.js"></script>
    <script src="http://www.shiptsg.com/Dev/assets/js/bootstrap-button.js"></script>
    <script src="http://www.shiptsg.com/Dev/assets/js/bootstrap-collapse.js"></script>
    <script src="http://www.shiptsg.com/Dev/assets/js/bootstrap-carousel.js"></script>
    <script src="http://www.shiptsg.com/Dev/assets/js/bootstrap-typeahead.js"></script>
</div></body></html>