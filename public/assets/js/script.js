document.querySelectorAll('a.ajax-link').forEach(link => {
    link.addEventListener('click', function (e) {
        e.preventDefault();
        const page = this.getAttribute('data-page');

        // Update de URL zonder te herladen
        history.pushState({ page }, '', `/${page}`);

        // Laad de nieuwe pagina via AJAX
        loadPage(`/page.php?page=${page}`);
    });
});

function loadPage(url) {
    fetch(url)
        .then(response => response.text())
        .then(data => {
            document.getElementById('main-content').innerHTML = data;
        })
        .catch(error => console.error('Error loading page:', error));
}

// Handelen bij gebruik van de terug-knop in de browser
window.onpopstate = function (event) {
    if (event.state && event.state.page) {
        loadPage(`/page.php?page=${event.state.page}`);
    }
};

// MODAL -------------------------------------------------------------------------

    // Open modal en laad inhoud via AJAX
    function openModal(url, title = '') {
        $('#modalTitle').text(title); // Stel de modaltitel in
        $('#modalBody').html('Loading...'); // Zet tijdelijke laadtekst

        // AJAX verzoek om content te laden
        $.ajax({
            url: url,
            method: 'GET',
            success: function(data) {
                $('#modalBody').html(data); // Laad de ontvangen content in de modal
                $('#dynamicModal').show(); // Toon de modal
            },
            error: function() {
                $('#modalBody').html('<p>Failed to load content.</p>');
            }
        });
    }

    // Sluit modal
    function closeModal() {
        $('#dynamicModal').hide();
        $('#modalBody').html(''); // Reset inhoud
    }

// LOGGING -------------------------------------------------------------------------

    // Navigation logging
    document.addEventListener('DOMContentLoaded', function () {
        // Log navigatie
        fetch('/api/log.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                activity_page: window.location.pathname,
                activity_class: 'navigation',
                activity_message: `Navigated to ${window.location.pathname}`
            }),
        });

        // Log klikken op links
        document.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', function () {
                fetch('/api/log.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({
                        activity_page: window.location.pathname,
                        activity_class: 'click',
                        activity_message: `Clicked link: ${this.href}`
                    }),
                });
            });
        });
    });

    // Form logging
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', function (e) {
            const formData = new FormData(this);
    
            // Converteer FormData naar een object
            const formObject = {};
            formData.forEach((value, key) => {
                formObject[key] = value;
            });
    
            // Log de formulieractie
            fetch('/api/log.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    activity_page: window.location.pathname,
                    activity_class: 'form_submit',
                    activity_message: `Form submitted: ${this.action}`,
                    activity_details: formObject,
                }),
            });
        });
    });
    
