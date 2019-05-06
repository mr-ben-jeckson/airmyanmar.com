<?php
ob_start();
if(session_id() === ""){
    session_start();
}
else{

}
ob_clean();
error_reporting(0);
?>
<?php
$pass = false;
$booking = isset($_GET['booking_id'])?$_GET['booking_id']:"";
$invoice = isset($_GET['invoice'])?$_GET['invoice']:"";
$encode = serialize(json_encode($_POST));
$status = $pass?"Succeeded":"Failed";
if(isset($_POST['channel_response_code']) && $_POST['channel_response_code'] == '00'){
    $pass = true;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../images/favicon.png" rel="shortcut icon" type="image/vnd.microsoft.icon">
    <title>Payment Done</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/orange.css">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-74311295-6"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-74311295-6');
    </script>
    <!-- Global site tag (gtag.js) - Google Ads: 768299617 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-768299617"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'AW-768299617');
    </script>

    <!-- Event snippet for Booking Conversion conversion page -->
    <script>
      gtag('event', 'conversion', {
          'send_to': 'AW-768299617/J7wWCOGaypMBEOGkre4C',
          'transaction_id': '{{$invoice}}'
      });
    </script>

</head>
<body>
<div class="container" style="margin-top: 30px;">
    <center>
        <a href="../"><img src="../images/big-x-logo.png" alt="airmyanmar.com" class="img-responsive"></a>
    </center>
</div>
<?php
if ($pass){
    $color = "#c90074";
    $icon = '<i class="fa fa-check" aria-hidden="true"></i>';
    $class = "process-bar-active";
}
else{
    $color = "#d92819";
    $icon = '<i class="fa fa-warning" aria-hidden="true"></i>';
    $class = "process-bar";
}
?>
<div class="container-fluid" style="margin-top: 50px;">
    <hr>
        <div class="container-fluid process-container">
            <div class="col-md-3 process-bar-active"> <i class="fa fa-plane"></i> Step 1 <br> <span class="small">Flight Selected</span></div>
            <div class="col-md-3 process-bar-active"> <i class="fa fa-pencil"></i> Step 2 <br> <span class="small">Fill Passenger Information</span></div>
            <div class="col-md-3 process-bar-active"> <i class="fa fa-credit-card-alt"></i> Step 3 <br> <span class="small">Wait booking status & Make Payment</span> </div>
            <div class="col-md-3 <?php echo $class;?>"> <i class="fa fa-ticket"></i> Step 4 <br> <span class="small">Complete & Confirmation Download <?php echo $icon; ?></span></div>
        </div>
    <h3 style="text-align: center">Your Booking Payment is <?php echo $status;?></h3>
    <hr>
    <center>
        <a href="../" class="btn btn-primary"><i class="fa fa-home"></i> Back to Home </a> <a href="../contact-us" class="btn btn-primary"><i class="fa fa-phone-square"></i> Contact us </a>
    </center>
    <hr>
    <div class="container well" style="padding: 20px;">
        <span style="font-weight: bold;">If you have any further question, Please click or press "Contact us" button to join us and let us know.
        </span>

    </div>
</div>
<div class="container text-center">
    &copy; <?php echo date('Y'); ?> Airmyanmar.com
</div>
<script type="text/javascript" src="../js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script>
</body>
</html>