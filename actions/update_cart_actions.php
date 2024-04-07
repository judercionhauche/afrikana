<?php
session_start();

require_once('../controllers/general_controller.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit'])) {
    $p_id = $_POST['p_id'];
    $c_id = $_POST['c_id'];
    $qty = $_POST['qty'];
    $general_controller = new General_Class();
    $updated = $general_controller->update_cart_item($p_id, $c_id, $qty);
    var_dump($updated);

    if ($updated) {
        header("Location: ../cart.php?message=Quantity updated successfully");
        exit();
    } else {
        header("Location: ../cart.php?error=Failed to update quantity");
        exit();
    }
} else {
    header("Location: ../cart.php");
    exit();
}
?>
