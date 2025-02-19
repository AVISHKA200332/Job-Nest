const jobs = [
    {
        id: 1,
        companyLogo: 'images/company1_logo.png',
        jobName: 'Software Engineer',
        description: 'Join our dynamic team to develop innovative solutions.',
        category: 'tech'
    },
    {
        id: 2,
        companyLogo: 'images/company2_logo.png',
        jobName: 'Marketing Specialist',
        description: 'Help us reach new heights with creative marketing strategies.',
        category: 'marketing'
    },
    {
        id: 3,
        companyLogo: 'images/company3_logo.png',
        jobName: 'Graphic Designer',
        description: 'Design compelling graphics for our marketing campaigns.',
        category: 'design'
    }
];

const jobList = document.getElementById('jobList');
const searchInput = document.getElementById('searchInput');
const jobFilter = document.getElementById('jobFilter');

// Function to display jobs
function displayJobs(filteredJobs) {
    jobList.innerHTML = ''; // Clear previous listings
    filteredJobs.forEach(job => {
        const li = document.createElement('li');
        li.className = 'job-item';
        
        li.innerHTML = `
            <img src="${job.companyLogo}" alt="${job.jobName} Logo" class="company-logo">
            <div class="job-details">
                <a href="jobDetails.html?job=${job.id}" class="job-title">${job.jobName}</a>
                <p>${job.description}</p>
            </div>
        `;
        
        jobList.appendChild(li);
    });
}

// Initial display of jobs
displayJobs(jobs);

// Search functionality
searchInput.addEventListener('input', () => {
    const query = searchInput.value.toLowerCase();
    const filteredJobs = jobs.filter(job => job.jobName.toLowerCase().includes(query));
    displayJobs(filteredJobs);
});

// Filter functionality
jobFilter.addEventListener('change', () => {
    const selectedCategory = jobFilter.value;
    const filteredJobs = jobs.filter(job => (selectedCategory === '' || job.category === selectedCategory));
    displayJobs(filteredJobs);
});
