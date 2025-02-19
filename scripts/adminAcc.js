document.getElementById('changeUsernameForm').onsubmit = function(event) {
    event.preventDefault();

    fetch('changeUsername.php', {
        method: 'POST',
        body: new FormData(this)
    }).then(response => {
        if (response.ok) {
            // Show success modal
            document.getElementById('successModal').style.display = 'block';
        }
    }).catch(error => {
        console.error('Error changing username:', error);
    });
};

// Close the success modal
document.getElementById('closeModal').onclick = function() {
    document.getElementById('successModal').style.display = 'none';
};

// Hide modal if user clicks outside the modal content
window.onclick = function(event) {
    if (event.target == document.getElementById('successModal')) {
        document.getElementById('successModal').style.display = 'none';
    }
};
