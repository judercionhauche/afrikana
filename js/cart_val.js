// JavaScript code to handle AJAX response and display error as a popup
function handleAjaxResponse(response) {
    if (response.status === 403) {
        // If response status is 403 (Forbidden), show the error message as a popup
        alert(response.responseText);
        // Redirect to login page
        window.location.href = 'login.php';
    } else if (response.ok) {
        // If response status is OK, redirect to cart page
        window.location.href = '../cart.php';
    } else {
        // Handle other types of responses if needed
        console.error('Unexpected AJAX response:', response);
    }
}

// Assuming formData contains the form data to be sent
fetch('actions/add_to_cart_actions.php', {
    method: 'POST',
    body: formData
})
.then(response => {
    handleAjaxResponse(response);
})
.catch(error => {
    console.error('Error occurred during fetch:', error);
});
