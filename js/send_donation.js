document.addEventListener('DOMContentLoaded', function() {
  const submitButton = document.getElementById('donateButton');
  const donationForm = document.getElementById('donationForm');
  const resultDiv = document.getElementById('result');

  submitButton.addEventListener('click', function(event) {
    event.preventDefault(); 

    // Get the donation amount
    const donationAmount = parseFloat(document.getElementById('donation_amount').value);

    // Check if the input is a valid
    if (!isNaN(donationAmount) && donationAmount > 0) {

      // send the donation to the server
      sendDonationData(donationAmount, username);
      resultDiv.innerHTML = `Thank you for your donation of $${donationAmount.toFixed(2)}!`;
      
    } 
    else {
      resultDiv.innerHTML = 'Please enter a valid donation amount.';
    }
  });

  function sendDonationData(amount, username) {
    // new XMLHttpRequest
    const xhr = new XMLHttpRequest();

    // POST request to process_donation.php
    xhr.open('POST', 'process_donation.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    // Build the data to be sent to the server
    const data = `donation_amount=${encodeURIComponent(amount)}&username=${encodeURIComponent(username)}`;

    // Handle response from the server
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4) {
        if (xhr.status === 200) {
          console.log(xhr.responseText);
        } else {
          // Handle errors
          console.log('Error processing donation. Please try again later.');
        }
      }
    };

    // Send the request to server
    xhr.send(data);
  }
});