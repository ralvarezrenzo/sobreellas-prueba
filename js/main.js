// Sidebar MaterializeCss inicialización
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems);

    var collaps = document.querySelectorAll('.collapsible');
    var collapsInstancia = M.Collapsible.init(collaps);
});
 
