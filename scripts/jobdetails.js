const jobData = {
    1: {
        title: 'Software Engineer',
        logo: 'images/company1_logo.png',
        description: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum'
    },
    2: {
        title: 'Marketing Specialist',
        logo: 'images/company2_logo.png',
        description: 'Help us reach new heights with creative marketing strategies. You will oversee and develop marketing campaigns, conduct research and analyze data to identify and define audiences.'
    },
    3: {
        title: 'Graphic Designer',
        logo: 'images/company3_logo.png',
        description: 'Design compelling graphics for our marketing campaigns. You will work closely with clients and other team members to create innovative designs that engage and captivate the target audience.'
    }
};

function populateJobDetails() {
    const params = new URLSearchParams(window.location.search);
    const jobId = params.get('job');

    if (jobData[jobId]) {
        document.getElementById('jobTitle').innerText = jobData[jobId].title;
        document.getElementById('companyLogo').src = jobData[jobId].logo;
        document.getElementById('jobDescription').innerText = jobData[jobId].description;
    } else {
        document.getElementById('jobTitle').innerText = 'Job not found';
        document.getElementById('jobDescription').innerText = '';
    }
}

document.getElementById('applyNowButton').addEventListener('click', () => {
    document.getElementById('applicationForm').style.display = 'block'; // Show the application form
});

// Handle form submission
document.getElementById('form').addEventListener('submit', async (event) => {
    event.preventDefault(); // Prevent default form submission

    const formData = new FormData(event.target); // Create a FormData object from the form

    try {
        const response = await fetch('apply.php', {
            method: 'POST',
            body: formData // Send the form data
        });

        const result = await response.text(); // Get the response text
        alert(result); // Show success message
        document.getElementById('applicationForm').style.display = 'none'; // Hide the form
        event.target.reset(); // Reset the form
    } catch (error) {
        console.error('Error:', error);
        alert('There was an error submitting your application. Please try again.');
    }
});

populateJobDetails();
