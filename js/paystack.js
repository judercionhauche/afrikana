const paymentForm = document.getElementById('paymentForm');
paymentForm.addEventListener("submit", payWithPaystack, false);

function payWithPaystack(e) {
  e.preventDefault();

  let handler = PaystackPop.setup({
    key: 'pk_test_ab49a5d290b88ba99712d41d80b66b14ae01a751', // Replace with your public key
    email: document.getElementById("email-address").value,
    amount: document.getElementById("amount").value * 100,
    currency: 'GHS', // Use GHS for Ghana Cedis or USD for US Dollars
    ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    // label: "Optional string that replaces customer email"
    onClose: function(){
      alert('Window closed.');
    },
    callback: function(response){
    //   let message = 'Payment complete! Reference: ' + response.reference;
    //   alert(message);
    $.ajax({
        url:"../../actions/paystack_process.php?reference="+response.reference,
        method:"GET",
        success: function(){ // this function is going to move items from the cart and move it in the orders
            window.location.href="http://localhost/FINAL/mvc_skeleton_template/view/paystack/success.php"
            console.log(location.href);
        //paymentForm.submit();
        },
    });
    },
  });

  handler.openIframe();
}
