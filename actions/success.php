<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();
require_once('../controllers/general_controller.php'); 

  $curl = curl_init();
  $reference =$_GET['ref'];
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/".$reference,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Authorization: Bearer sk_test_06b949231274ff999daf09f43ce5df0d65c96dcf",
      "Cache-Control: no-cache",
    ),
  ));
  
  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);
  
  if ($err) {
    echo "cURL Error #:" . $err;
    // Redirect the user to the cart page if there's a cURL error
    header('Location: cart.php');
    exit(); // Terminate script execution after redirection
} else {
    // Handle successful cURL request
    // Start by storing the customer_id from session
    $customer_id = $_SESSION['customer_id'];
    
    // Generate a random invoice number
    $invoice_no = mt_rand();
    
    // Get the current date
    $order_date = date("Y-m-d");
    
    // Set the order status to "success"
    $order_status = "success";
    
    // Insert the order into the database
    $insert = create_order($customer_id, $invoice_no, $order_date, $order_status);
    
    // Check if the order insertion was successful
    if ($insert) {
        // Retrieve the inserted order_id
        $order_id = get_last_inserted_order_id();
                 
        // Decode the response from the API
        $data = json_decode($response, true);
        
        // Extract payment details from the API response
        $amount = $data['data']['amount'] ?? 0;
        $currency = $data['data']['currency'] ?? '';
        $payment_date = date("Y-m-d H:i:s", strtotime($data['data']['paidAt']));
        
        // Insert payment details into the database
        $insert_payment = add_payment($amount, $customer_id, $order_id, $currency, $payment_date);
        
        // Check if the payment insertion was successful
        if ($insert_payment) {
            $delete_cart= clear_cart($customer_id);
            header('Location: ../confirmation.php');
            exit(); // Terminate script execution after redirection
        } else {
            header('Location: payment_error.php');
            exit(); // Terminate script execution after redirection
        }
    } else {
      
        header('Location: order_error.php');
        exit(); // Terminate script execution after redirection
    }
}

?>




    

