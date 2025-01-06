document.addEventListener('click', function(event) {
    const dropdown = document.querySelector('.profile-dropdown');
    const toggle   = document.getElementById('profileDropdown');

    // If the click is outside both the dropdown menu and toggle link, close the dropdown
    if (!dropdown.contains(event.target) && !toggle.contains(event.target)) {
        dropdown.classList.remove('show');
    }
});
function showTab(tabId) {
    // Hide all tab contents
    document.querySelectorAll('.tab-content').forEach(tab => {
        tab.classList.remove('active');
    });

    // Show selected tab content
    document.getElementById(tabId).classList.add('active');

    // Update nav links
    document.querySelectorAll('.nav-link').forEach(link => {
        link.classList.remove('active');
    });
    document.querySelector(`[href="#${tabId}"]`).classList.add('active');
}