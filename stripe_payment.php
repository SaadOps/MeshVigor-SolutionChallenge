<?php
include 'connection.php';

// Check if form is submitted
if(isset($_POST['submit'])) {
    $name = $_POST['fname'];
    $email = $_POST['email'];
    $mobileno = $_POST['mobileno'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $amount = $_POST['amount']; // This is the amount received from the form

    if(isset($_GET['amount'])) {
        // Here you will handle the Stripe payment and get payment status and payment id
        // For demonstration purposes, I'm assuming you have obtained these values from Stripe
        $payment_status = "succeeded"; // You will replace this with the actual payment status from Stripe
        $payment_id = "stripe_payment_id"; // You will replace this with the actual payment ID from Stripe

        // Insert payment details into the stripe_payments table
        $insertquery ="INSERT INTO stripe_payments (name, email, amount, payment_status, payment_id) VALUES ('$name', '$email', '$amount', '$payment_status', '$payment_id')";

        $res = mysqli_query($con, $insertquery);

        if($res && $res != null) {
            ?>
            <script>
                swal("Payment Successful!", "Thank you for your donation!", "success");
            </script>
            <?php
        } else {
            ?>
            <script>
                swal("Oops...", "Payment failed! Please try again later.", "error");
            </script>
            <?php
        }
    } else {
        // Redirect to the Stripe payment page
        header("Location: stripe_payment.php?amount=$amount");
        exit();
    }
}
?>
