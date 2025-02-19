function toggleEditForm() {
            const editForm = document.getElementById("edit-admin-info");
            if (editForm.style.display === "none" || editForm.style.display === "") {
                editForm.style.display = "block";
            } else {
                editForm.style.display = "none";
            }
}