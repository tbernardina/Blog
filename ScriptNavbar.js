function showMenus() {
    var links = document.querySelectorAll('.link_navbar');
    links.forEach(function(link) {
        if (link.classList.contains('show')) {
            link.classList.remove('show');
        } else {
            link.classList.add('show');
        }
    });
}