document.getElementById("donationForm").addEventListener("submit", function(event) {
    event.preventDefault();
    
    const donationAmount = document.getElementById("donation_amount").value;

    //Send donation data to the server
    const xhr = new XMLHttpRequest(); 
    xhr.open("POST", "process_donation.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Display the success message
            document.getElementById("successMessage").textContent = "Thanks for your donation of $" + donationAmount + "!";
            document.getElementById("successMessage").style.display = "block";
        } else {
            // Handle errors.
            console.error("Error processing donation:", xhr.responseText);
        }
    };
    xhr.send("donation_amount=" + encodeURIComponent(donationAmount));
});