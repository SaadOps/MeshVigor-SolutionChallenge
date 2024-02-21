<?php
if(empty($_POST)){
    echo"it is an empty post";
}

else
{
$Name = $_POST['name'];
$Email = $_POST['email'];
$Mobile = $_POST['mobile'];
$Category = $_POST['category'];
$Amount = $_POST['amount'];


$key = "test_636228b763977155a6f781a52a9";
$token = "test_f9e33b774a75813ae5b76ba8b01";
$mojoURL = "test.instamojo.com";    


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://$mojoURL/api/1.1/payment-requests/");
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:$key",
                  "X-Auth-Token:$token"));
$payload = Array(
    'purpose' => 'Donation',
    'amount' => "$Amount", // Use amount from form,
    'category' => "$Category",
    'phone' => "$Mobile",
    'buyer_name' => "$Name",
    'redirect_url' => '',
    'send_email' => false,
    'webhook' => '',
    'send_sms' => false,
    'email' => "$Email",
    'allow_repeated_payments' => false
);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch); 
$decode = json_decode($response);

$success = $decode -> success;
if ($success == true)
{

$paymentURL = $decode->payment_request->longurl;

// SQL DATA ENTRY


header("Location:$paymentURL");
exit();

}
else{ echo"$response"; echo"Api key not valid";}
}

?>