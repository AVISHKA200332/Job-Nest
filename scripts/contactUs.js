// Handle form submission
document.getElementById('contactForm').onsubmit = function(event) {
    event.preventDefault(); // Prevent actual form submission

    // Simulate form submission to server
    fetch('insertContact.php', {
        method: 'POST',
        body: new FormData(this)
    }).then(response => {
        if (response.ok) {
            // Show success modal
            document.getElementById('successModal').style.display = 'block';
        }
    });
};

// Close the modal
document.getElementById('closeModal').onclick = function() {
    document.getElementById('successModal').style.display = 'none';
};
