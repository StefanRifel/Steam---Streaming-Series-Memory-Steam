document.addEventListener('DOMContentLoaded', function () {
    const toggle = document.querySelector('.toggle');
    const container = document.querySelector('.create-series-container');

    toggle.addEventListener('click', function () {
        container.classList.toggle('open');
    });
});