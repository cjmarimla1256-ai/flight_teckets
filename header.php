<header class="page-header">
    <h1>Flight Schedule System</h1>
    <p id="currentDateTime"></p>
</header>

<script>
// Function to update date and time every second
function updateDateTime() {
    const now = new Date();
    const options = { 
        weekday: 'long', year: 'numeric', month: 'long', 
        day: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit',
        hour12: true 
    };
    const manilaTime = now.toLocaleString('en-PH', { ...options, timeZone: 'Asia/Manila' });
    document.getElementById('currentDateTime').textContent = manilaTime;
}

// Initial call
updateDateTime();

// Update every second
setInterval(updateDateTime, 1000);
</script>