function loadPage(page) {
    fetchPage(page);
}
function fetchPage(page) {
    fetch(`${page}.php`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text();
        })
        .then(data => {
            document.getElementById('pageContent').innerHTML = data;
            $('#example').DataTable().destroy();
            $('#example').DataTable();

            (() => {
                'use strict'
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                const forms = document.querySelectorAll('.needs-validation')
                // Loop over them and prevent submission
                Array.from(forms).forEach(form => {
                    form.addEventListener('submit', event => {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
            })()

            const navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(link => {
                if (link.getAttribute('id') === page) {
                    link.classList.add('active');
                } else {
                    link.classList.remove('active');
                }
            });

        })
        .catch(error => {
            console.error('There has been a problem with your fetch operation:', error);
        });
}

// Load default page
document.addEventListener('DOMContentLoaded', function () {
    fetchPage('view_keputusan');
});
