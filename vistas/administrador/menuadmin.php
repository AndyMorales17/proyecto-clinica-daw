<style>
.navbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 20px; /* Añade un poco de padding para asegurar espacio alrededor de los elementos */
    background-color: #294352; /* Color de fondo */
}

.navbar-toggler {
    background-color: #294352; /* Color de fondo para el botón */
    color: #ffffff; /* Color del texto */
    border: none;
    padding: 8px 12px; /* Ajusta el padding para cambiar el tamaño del botón */
    font-size: 40px; /* Aumenta el tamaño de la fuente del botón */
    cursor: pointer;
    text-transform: uppercase; /* Mantiene las letras en mayúsculas */
    font-weight: bold; /* Mantiene el texto en negrita */
    border-radius: 5px; /* Bordes redondeados del botón */
}


.navbar-brand {
    display: flex;
    align-items: center;
    color: white; /* Color del texto */
    text-decoration: none; /* Remueve el subrayado del enlace */
    font-size: 12px; /* Aumenta el tamaño de la fuente para hacer el nombre de la farmacia más visible */
}

.navbar-brand img {
    height: 50px; /* Ajusta esto para cambiar el tamaño del logo */
    margin-right: 10px; /* Espacio entre el logo y el texto */
}

.navbar-collapse {
    height: 100%;
    width: 0; /* Inicialmente oculto */
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #294352; /* Color de fondo del panel lateral */
    overflow-x: hidden;
    transition: 0.5s; /* Suaviza la transición */
    padding-top: 60px;
}

.navbar-nav {
    display: block;
    padding-left: 25px;
}

.nav-item {
    margin-bottom: 10px;
}

.navbar-collapse.open {
    width: 250px; /* Ajusta el ancho del panel lateral cuando está abierto */
}

.nav-link {
    color: white; /* Ajusta el color de los enlaces */
    display: block;
    padding: 10px;
}


</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const navbarToggler = document.querySelector('.navbar-toggler');
    const navbarCollapse = document.querySelector('.navbar-collapse');

    navbarToggler.addEventListener('click', function () {
        navbarCollapse.classList.toggle('open');
    });
});

</script>

<nav class="navbar text-uppercase fixed-top" id="mainNav">
    <div class="container">
        <button class="navbar-toggler text-uppercase font-weight-bold rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive">
            <span style="font-size: 24px;">Menu <i class="fas fa-bars"></i> </span>
        </button>
        <div class="navbar-brand">
            <a href="inicio" style="text-decoration: none; color: #ffffff;">
                <img src="assets/img/hospital1.png" alt="Logo" style="height: 40px; margin-right: 10px;"> FARMACIA MAZAPAN
            </a>
        </div>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="categoria">CATEGORIA</a></li>
                <li class="nav-item"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="nosotros">NOSOTROS</a></li>
                <li class="nav-item"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="proveedores">Proveedores</a></lci>
                <li class="nav-item"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="todos">productos</a></lci>
                <li class="nav-item"><a class="nav-link py-3 px-0 px-lg-3 rounded" href="login">login</a></lci>
                
            </ul>

        </div>
    </div>
</nav>

