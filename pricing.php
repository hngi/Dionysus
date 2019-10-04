<?php
include 'includes/db/db_config.php';
include 'includes/header.php';
include 'includes/functions/functions.php';

$_POST['user_id']= $_SESSION['userid'];

 $errors = array();
 

?>
<?php
 //I INITIALIZED MY ERROR ARRAY
   

if(array_key_exists('basic', $_POST)) {

if(empty($_POST['agree'])) {
            $errors['agree'] = '<i style="color:red;">
      Please agree to the terms and conditions below to proceed </i>';
        }

 if(empty($errors)) {

 
		$_POST['id'] = 1;
		$show =  getUserByID($conn, $_POST);
   		$row = getPricingPlan($conn, $_POST);
      	$plan_id = $row[0];
      	 $email = $show['email'];

    	$username = $show['username'];
      	$amount = $row[2];
      	$vtoken = mt_rand();	                 
							
$curl = curl_init();

$customer_email = $email;
$custom_title = "Dionysus Basic Plan";
$amount = $amount;  
$currency = "NGN";
$custom_logo = "<img src='dion.png'>";
$customer_firstname = "Subscription for Dionysus Basic";
$txref = 'dionysus-'.$vtoken; // ensure you generate unique references per transaction.
$PBFPubKey = "FLWPUBK-344967f4470b9315b0b5964c2417dfc0-X"; // get your public key from the dashboard.
$redirect_url = "https://boiling-chamber-53204.herokuapp.com/dashboard.php";
$payment_plan = $plan_id; // this is only required for recurring payments.


curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/hosted/pay",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode([
    'amount'=>$amount,
    'customer_email'=>$customer_email,
    'currency'=>$currency,
    'txref'=>$txref,
    'PBFPubKey'=>$PBFPubKey,
    'redirect_url'=>$redirect_url,
     'custom_title'=>$custom_title,
    'payment_plan'=>$payment_plan
  ]),
  CURLOPT_HTTPHEADER => [
    "content-type: application/json",
    "cache-control: no-cache"
  ],
));

$response = curl_exec($curl);
$err = curl_error($curl);

if($err){
  // there was an error contacting the rave API
  die('Curl returned error: ' . $err);
}

$transaction = json_decode($response);

if(!$transaction->data && !$transaction->data->link){
  // there was an error from the API
  print_r('API returned error: ' . $transaction->message);
}

// uncomment out this line if you want to redirect the user to the payment page
//print_r($transaction->data->message);


// redirect to page so User can pay
// uncomment this line to allow the user redirect to the payment page
header('Location: ' . $transaction->data->link);


                     }        



  
    } 

///////////////////////////////////////////

    
    if(array_key_exists('thrift', $_POST)) {
   

     if(empty($_POST['agree'])) {
            $errors['agree'] = '<i style="color:red;">
      Please agree to the terms and conditions below to proceed </i>';
        }

 if(empty($errors)) {
 
		$_POST['id'] = 2;
		$show =  getUserByID($conn, $_POST);
   		$row = getPricingPlan($conn, $_POST);
      	$plan_id = $row[0];
      	$email = $show['email'];
      	$amount = $row[2];
      	$vtoken = mt_rand();	                 
							
$curl = curl_init();

$customer_email = $email;
$customer_firstname = $username;
$custom_title = "Dionysus Thrift Plan";
$amount = $amount;  
$currency = "NGN";
$txref = 'dionysus-'.$vtoken; 
$PBFPubKey = "FLWPUBK-344967f4470b9315b0b5964c2417dfc0-X"; // get your public key from the dashboard.
$redirect_url = "https://boiling-chamber-53204.herokuapp.com/dashboard.php";
$payment_plan = $plan_id; 


curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/hosted/pay",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode([
    'amount'=>$amount,
    'customer_email'=>$customer_email,
    'currency'=>$currency,
    'txref'=>$txref,
    'PBFPubKey'=>$PBFPubKey,
    'redirect_url'=>$redirect_url,
    'custom_title'=>$custom_title,
    'payment_plan'=>$payment_plan
  ]),
  CURLOPT_HTTPHEADER => [
    "content-type: application/json",
    "cache-control: no-cache"
  ],
));

$response = curl_exec($curl);
$err = curl_error($curl);

if($err){
  // there was an error contacting the rave API
  die('Curl returned error: ' . $err);
}

$transaction = json_decode($response);

if(!$transaction->data && !$transaction->data->link){
  // there was an error from the API
  print_r('API returned error: ' . $transaction->message);
}

// uncomment out this line if you want to redirect the user to the payment page
//print_r($transaction->data->message);


// redirect to page so User can pay
// uncomment this line to allow the user redirect to the payment page
header('Location: ' . $transaction->data->link);


         	}                       
  
    } 

///////////////////////////////////////////////////////
    if(array_key_exists('pro', $_POST)) {

     if(empty($_POST['agree'])) {
            $errors['agree'] = '<i style="color:red;">
      Please agree to the terms and conditions below to proceed </i>';
        }

 		if(empty($errors)) {
 
		$_POST['id'] = 3;
		$show =  getUserByID($conn, $_POST);
   		$row = getPricingPlan($conn, $_POST);
      	$plan_id = $row[0];
      	$email = $show['email'];
      	$amount = $row[2];
      	$vtoken = mt_rand();	                 
							
$curl = curl_init();

$customer_email = $email;
$custom_title = "Dionysus Pro Plan";
$amount = $amount;  
$currency = "NGN";
$txref = 'dionysus-'.$vtoken; // ensure you generate unique references per transaction.
$PBFPubKey = "FLWPUBK-344967f4470b9315b0b5964c2417dfc0-X"; // get your public key from the dashboard.
$redirect_url = "https://boiling-chamber-53204.herokuapp.com/dashboard.php";
$payment_plan = $plan_id; // this is only required for recurring payments.


curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/hosted/pay",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => json_encode([
    'amount'=>$amount,
    'customer_email'=>$customer_email,
    'currency'=>$currency,
    'txref'=>$txref,
    'PBFPubKey'=>$PBFPubKey,
    'redirect_url'=>$redirect_url,
    'custom_title'=>$custom_title,
    'payment_plan'=>$payment_plan
  ]),
  CURLOPT_HTTPHEADER => [
    "content-type: application/json",
    "cache-control: no-cache"
  ],
));

$response = curl_exec($curl);
$err = curl_error($curl);

if($err){
  // there was an error contacting the rave API
  die('Curl returned error: ' . $err);
}

$transaction = json_decode($response);

if(!$transaction->data && !$transaction->data->link){
  // there was an error from the API
  print_r('API returned error: ' . $transaction->message);
}

// uncomment out this line if you want to redirect the user to the payment page
//print_r($transaction->data->message);


// redirect to page so User can pay
// uncomment this line to allow the user redirect to the payment page
header('Location: ' . $transaction->data->link);


                          	}      
  
    } 

  


    ?>

    <?php 
                            $data = displayErrors($errors, 'agree');
                            echo $data;
                              ?>
		<table class="table-striped" style="width: 85%;">
			<tr style="border: 1px solid #ddd; margin-bottom: 24px;">
				<td> </td>
				<td class="basic" style="background-color: grey; text-align: center; padding-right: 9px; padding-left: 9px;"><h1>Basic</h1></td>
				<td class="basic" style="background-color: gold; text-align: center; padding-right: 9px; padding-left: 9px;"><h1>Thrift</h1></td>
				<td class="basic" style="background-color: silver; text-align: center; padding-right: 9px; padding-left: 9px;"><h1>Pro</h1></td>
			</tr>

			<tr>
				<td><!-- <?php if(isset($invalid))  echo $invalid ?> --> </td>
				<td style="text-align: center;"><h2>NGN 500</h2> <br><small>/month</small></td>
				<td style="text-align: center;"><h2>NGN 750</h2> <br><small>/month</small></td>
				<td style="text-align: center;"><h2>NGN 1000</h2> <br><small>/month</small></td>
			</tr>

			<tr>
				<td>Expense Tracker</td>
				<td class="animate" style="text-align: center;">&#10004;</td>
				<td style="text-align: center;">&#10004;</td>
				<td style="text-align: center;">&#10004;</td>
			</tr>

			<tr>
				<td>Expense Limit Reminder</td>
				<td style="text-align: center;">&#10004;</td>
				<td style="text-align: center;">&#10004;</td>
				<td style="text-align: center;">&#10004;</td>
			</tr>

			<tr>
				<td>24/7 Customer Support</td>
				<td style="text-align: center;">&#10004;</td>
				<td style="text-align: center;">&#10004;</td>
				<td style="text-align: center;">&#10004;</td>
			</tr>

			<tr>
				<td>Mobile App</td>
				<td style="text-align: center;">&#10004;</td>
				<td style="text-align: center;">&#10004;</td>
				<td style="text-align: center;">&#10004;</td>
			</tr>

			<tr>
				<td>Bill Tracking</td>
				<td style="text-align: center;">&#10004;</td>
				<td style="text-align: center;">&#10004;</td>
				<td style="text-align: center;">&#10004;</td>
			</tr>

			<tr>
				<td>Reports and Trends</td>
				<td style="text-align: center;">&#10004;</td>
				<td style="text-align: center;">&#10004;</td>
				<td style="text-align: center;">&#10004;</td>
			</tr>

			<tr>
				<td>Email Warning Alerts</td>
				<td style="text-align: center;">&#10060;</td>
				<td style="text-align: center;">&#10004;</td>
				<td style="text-align: center;">&#10004;</td>
			</tr>

			<tr>
				<td>SMS Notifications</td>
				<td style="text-align: center;">&#10060;</td>
				<td style="text-align: center;">&#10060;</td>
				<td style="text-align: center;">&#10004;</td>
			</tr>

			<tr>
				<td>Investments</td>
				<td style="text-align: center;">&#10060;</td>
				<td style="text-align: center;">&#10004;</td>
				<td style="text-align: center;">&#10004;</td>
			</tr>

			<tr>
				<td>Professional Financial Advisor</td>
				<td style="text-align: center;">&#10060;</td>
				<td style="text-align: center;">&#10060;</td>
				<td style="text-align: center;">&#10004;</td>
			</tr>

			<tr>
				<td>Sort Expenses</td>
				<td style="text-align: center;">&#10060;</td>
				<td style="text-align: center;">&#10060;</td>
				<td style="text-align: center;">&#10004;</td>
			</tr>

			<tr>
				<td>Spending Insights</td>
				<td style="text-align: center;">&#10060;</td>
				<td style="text-align: center;">&#10060;</td>
				<td style="text-align: center;">&#10004;</td>
			</tr>

			<tr>
				<td>Tax Calculation</td>
				<td style="text-align: center;">&#10060;</td>
				<td style="text-align: center;">&#10060;</td>
				<td style="text-align: center;">&#10004;</td>
			</tr>

			<tr style="background-color: white; padding-bottom: 5px;">
				<td></td>
				<td><form action="" method="POST"><input type="submit"  value="Choose Basic" target="_blank" class="button btn-success" name="basic" style="height: 59px; border-radius: 3px; width: 100%;"> <input type="hidden" name="amount" value="<?php  ?>"></td>
				<td> <input type="submit"  value="Choose Thrift" target="_blank" class="button btn-success" name="thrift" style="height: 59px; border-radius: 3px; width: 100%;"></td>
				<td> <input type="submit"  value="Choose Pro" target="_blank" class="button btn-success" name="pro" style="height: 59px; border-radius: 3px; width: 100%; background-color: purple;"></td>
		</table>
		
	</center>
	
	<label>By checking the box below, you have agreed to our <a href="#">terms and conditions</a></label>
	<input type="checkbox" name="agree" value="true" > 
	 </form>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.js"></script>
<script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</html>