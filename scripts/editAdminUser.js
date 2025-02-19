// Function to toggle the visibility of the edit form
function toggleEditForm() {
    const editForm = document.getElementById("edit-admin-info");
    if (editForm.style.display === "none" || editForm.style.display === "") {
        editForm.style.display = "block"; // Show the edit section
    } else {
        editForm.style.display = "none"; // Hide the edit section
    }
}

// SweetAlert functions remain the same
function displayUsernameMessage() {
    Swal.fire({
        title: 'Success!',
        text: 'Username changed successfully!',
        icon: 'success',
        confirmButtonText: 'OK'
    });
    return true;
}

function displayPasswordMessage() {
    Swal.fire({
        title: 'Success!',
        text: 'Password updated successfully!',
        icon: 'success',
        confirmButtonText: 'OK'
    });
    return true;
}

function displaySaveChangesMessage() {
    Swal.fire({
        title: 'Success!',
        text: 'Admin information updated successfully!',
        icon: 'success',
        confirmButtonText: 'OK'
    });
    return true;
}
