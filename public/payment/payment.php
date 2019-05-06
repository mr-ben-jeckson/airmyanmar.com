<?php

//Merchant Account Information
//$merchantID = "JT01";		//Get SecretKey from 2C2P PGW Dashboard
//$secretKey = "7jYcp4FxFdf0";		//Get SecretKey from 2C2P PGW Dashboard

session_start();

$merchantID = "104840000000086";
$secretKey = "dsfqCx7OCi03";

$version = "6.9";


$stringToHash = $version . $merchantID . $_POST['payment_description'] .$_POST['order_id'] . $_POST['invoice_no'] . $_POST['currency'] . $_POST['amount'] . $_POST['customer_email'] . $_POST['pay_category_id'] . $_POST['promotion'] . $_POST['user_defined_1'] . $_POST['user_defined_2'] . $_POST['user_defined_3'] . $_POST['user_defined_4'] . $_POST['user_defined_5'] . $_POST['result_url_1'] . $_POST['result_url_2'] . $_POST['payment_option'];
$hash = strtoupper(hash_hmac('sha1', $stringToHash ,$secretKey, false));  	//Calculate Hash Value


?>

<!--Construct form to submit authorization request to 2c2p PGW-->
<!--Payment request data should be sent to 2c2p PGW with POST method inside parameter named 'paymentRequest'-->
<!--https://demo2.2c2p.com/2C2PFrontEnd/RedirectV3/payment [demo] change-->

<form action='https://t.2c2p.com/RedirectV3/Payment' method='POST' name='authForm'>
    <!--display wait message to user when page is loading-->
    <center>
        Please wait for a while. Do not close the browser or refresh the page. We are redirecting to 2C2P Payment Gateway
    </center>
    <!--load request data-->


    <?php echo "<input type='hidden' id='version' name='version' value='" .$version. "'/>"; ?>
    <?php echo "<input type='hidden' id='merchant_id' name='merchant_id' value='" .$merchantID. "'/>"; ?>
    <?php echo "<input type='hidden' id='payment_description' name='payment_description' value='" .$_POST['payment_description']. "' /> "; ?>
    <?php echo "<input type='hidden' id='order_id' name='order_id' value='" .$_POST['order_id']. "' />    "; ?>
    <?php echo "<input type='hidden' id='invoice_no' name='invoice_no' value='" .$_POST['invoice_no']. "' />"; ?>
    <?php echo "<input type='hidden' id='currency' name='currency' value='" .$_POST['currency']. "'/>"; ?>
    <?php echo "<input type='hidden' id='amount' name='amount' value='" .$_POST['amount']. "'/>"; ?>
    <?php echo "<input type='hidden' id='customer_email' name='customer_email' value='" .$_POST['customer_email']. "'/>"; ?>
    <?php echo "<input type='hidden' id='pay_category_id' name='pay_category_id' value='" .$_POST['pay_category_id']. "'/>"; ?>
    <?php echo "<input type='hidden' id='payment_option' name='payment_option' value='" .$_POST['payment_option'] . "'/>"; ?>
    <?php echo "<input type='hidden' id='promotion' name='promotion' value='" .$_POST['promotion']. "'/>"; ?>
    <?php echo "<input type='hidden' id='user_defined_1' name=' user_defined_1' value='" .$_POST['user_defined_1']. "'/>"; ?>
    <?php echo "<input type='hidden' id='user_defined_2' name=' user_defined_2' value='" .$_POST['user_defined_2']. "'/>"; ?>
    <?php echo "<input type='hidden' id='user_defined_3' name=' user_defined_3' value='" .$_POST['user_defined_3']. "'/>"; ?>
    <?php echo "<input type='hidden' id='user_defined_4' name=' user_defined_4' value='" .$_POST['user_defined_4']. "'/>"; ?>
    <?php echo "<input type='hidden' id='user_defined_5' name=' user_defined_5' value='" .$_POST['user_defined_5']. "'/>"; ?>
    <?php echo "<input type='hidden' id='result_url_1' name='result_url_1' value='" .$_POST['result_url_1']. "'/>"; ?>
    <?php echo "<input type='hidden' id='result_url_2' name='result_url_2' value='" .$_POST['result_url_2']. "'/>"; ?>

    <?php echo "<input type='hidden' id='hash_value' name='hash_value' value='" .$hash. "'/>"; ?>


</form>

<script language="JavaScript">
    document.authForm.submit();			//submit form to 2c2p PGW
</script>
