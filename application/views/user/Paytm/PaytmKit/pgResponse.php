

<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once __DIR__."./lib/config_paytm.php";
require_once __DIR__."./lib/encdec_paytm.php";

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.
// print_r($_POST[]);
?>
<!DOCTYPE html>
		<html>
		<head>
			<title></title>
			<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
		<style type="text/css">

		    body
		    {
		        background:#f2f2f2;
		    }

		    .payment
			{
				border:1px solid #f2f2f2;
				height:280px;
		        border-radius:20px;
		        background:#fff;
			}
		   .payment_header
		   {
			   background:rgba(255,102,0,1);
			   padding:20px;
		       border-radius:20px 20px 0px 0px;
			   
		   }
		   
		   .check
		   {
			   margin:0px auto;
			   width:50px;
			   height:50px;
			   border-radius:100%;
			   background:#fff;
			   text-align:center;
		   }
		   
		   .check i
		   {
			   vertical-align:middle;
			   line-height:50px;
			   font-size:30px;
		   }

		    .content 
		    {
		        text-align:center;
		    }

		    .content  h1
		    {
		        font-size:25px;
		        padding-top:25px;
		    }

		    .content a
		    {
		        width:200px;
		        height:35px;
		        color:#fff;
		        border-radius:30px;
		        padding:5px 10px;
		        background:rgba(255,102,0,1);
		        transition:all ease-in-out 0.3s;
		    }

		    .content a:hover
		    {
		        text-decoration:none;
		        background:#000;
		    } 
		</style>
		</head>
	<?php	

// $this->User->bookTicket();	

if($isValidChecksum == "TRUE") {
	// echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		
		// print_r($_POST['ORDERID']);
		// $this->User_model->p_success();
		?>

		<body>
			<div class="container">
		   <div class="row">
		      <div class="col-md-6 mx-auto mt-5">
		         <div class="payment">
		            <div class="payment_header">
		               <div class="check"><i class="fa fa-check" aria-hidden="true"></i></div>
		            </div>
		            <div class="content">
		               <h1>Payment Success !</h1>
		               <?php 
		               	$p = $this->session->userdata('pnr_number');
		               	// $bid = $this->session->userdata('booking_id');	
		               	$this->User_model->p_success($p);
		               ?>
		               <p class="mb-1">PNR NO: <?php echo $p; ?></p> 
		               <p>Amount: <?php echo $_POST['TXNAMOUNT']; ?></p>
		               <a href="<?=base_url();?>">Go to Home</a>
		            </div>
		            
		         </div>
		      </div>
		   </div>
		</div>
		</body>
		</html>
		<!-- $this->load->view('user/includes/header'); -->
<?php
	
		// echo "<b>Transaction status is success</b>" . "<br/>";
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
	}
	else {
		// echo "<b>Transaction status is failure</b>" . "<br/>";
		?>
		<body>
			<div class="container">
		   <div class="row">
		      <div class="col-md-6 mx-auto mt-5">
		         <div class="payment">
		            <div class="payment_header">
		               <div class="check"><i class="fa fa-check" aria-hidden="true"></i></div>
		            </div>
		            <div class="content">
		               <h1>Payment failure !</h1>
		               <!-- <p>ORDERID: <?php echo $_POST['ORDERID']; ?></p> -->
		               <p>PNR NO: PNR NO NOT AVAILABLE.</p>
		               <p>Amount: <?php echo $_POST['TXNAMOUNT']; ?></p>
		               <a href="<?=base_url();?>">Go to Home</a>
		            </div>
		            
		         </div>
		      </div>
		   </div>
		</div>
		</body>
		</html>
	<?php
	}

	if (isset($_POST) && count($_POST)>0 )
	{ 
		foreach($_POST as $paramName => $paramValue) {
				// echo "<br/>" . $paramName . " = " . $paramValue;
		}
	}
	

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<!-- <p>hii</p> -->
</body>
</html>