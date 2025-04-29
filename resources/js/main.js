
document.addEventListener('DOMContentLoaded', function() {
    // Get current path
    const currentPath = window.location.pathname;
    
    // Find all nav links
    const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
    
    navLinks.forEach(link => {
        const linkPath = new URL(link.href).pathname;
        
        // Check if link href matches current path
        if (currentPath === linkPath) {
            link.classList.add('active');
            
            // If it's a dropdown item, also activate the parent
            const dropdownItem = link.closest('.dropdown-item');
            if (dropdownItem) {
                const dropdownToggle = dropdownItem.closest('.dropdown').querySelector('.dropdown-toggle');
                if (dropdownToggle) {
                    dropdownToggle.classList.add('active');
                }
            }
        }
    });
});
