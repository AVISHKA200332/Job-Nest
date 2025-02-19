function search() {
    const searchQuery = document.getElementById("jobSearchAlt").value.trim();

    if (searchQuery) {
        alert("Searching for: " + searchQuery);
        window.location.href = "jobsearch.html";
    } else {
        alert("Please enter a keyword or job title");
    }
}
