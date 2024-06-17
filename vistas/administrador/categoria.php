<?php
$controlador = new categoriacontroler();
$categorias1 = $controlador->listar1();
$categorias2 = $controlador->listar2();
$categorias3 = $controlador->listar3();
$categorias4 = $controlador->listar4();
$categorias5 = $controlador->listar5();
$categorias6 = $controlador->listar6();
?>

    <!-- Portfolio Section-->
    <section class="page-section portfolio mt-5 mb-5" id="portfolio">
        <div class="container">
            <!-- Portfolio Section Heading-->
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">CATEGORIAS</h2>
            <!-- Icon Divider-->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Portfolio Grid Items-->
            <div class="row justify-content-center">
                <!-- Portfolio Item 1-->
                <?php foreach ($categorias1 as $categoria): ?>
                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="portfolio-item mx-auto">
                        <a href="productos">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white">
                                    <i class="fas fa-plus fa-3x"></i>
                                </div>
                            </div>
                            <img class="img-fluid" src="assets/img/medicamento1.png" alt="..." style="height: 300px; width: 100%; object-fit: cover;"/>
                        </a>
                        <div class="portfolio-details mt-2">
                            <h3><?php echo htmlspecialchars($categoria['Nombre']); ?></h3>
                            <p><?php echo htmlspecialchars($categoria['Descripción']); ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

                <!-- Portfolio Item 2-->
                <?php foreach ($categorias2 as $categoria): ?>
                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="portfolio-item mx-auto">

                        <a href="producto2">

                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white">
                                    <i class="fas fa-plus fa-3x"></i>
                                </div>
                            </div>
                            <img class="img-fluid" src="assets/img/personales.png" alt="..." style="height: 300px; width: 100%; object-fit: cover;"/>
                        </a>
                        <div class="portfolio-details mt-2">
                            <h3><?php echo htmlspecialchars($categoria['Nombre']); ?></h3>
                            <p><?php echo htmlspecialchars($categoria['Descripción']); ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

                <!-- Portfolio Item 3-->
                <?php foreach ($categorias3 as $categoria): ?>
                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="portfolio-item mx-auto">
                        <a href="producto3">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white">
                                    <i class="fas fa-plus fa-3x"></i>
                                </div>
                            </div>
                            <img class="img-fluid" src="assets/img/vitaminas.png" alt="..." style="height: 300px; width: 100%; object-fit: cover;"/>
                        </a>
                        <div class="portfolio-details mt-2">
                            <h3><?php echo htmlspecialchars($categoria['Nombre']); ?></h3>
                            <p><?php echo htmlspecialchars($categoria['Descripción']); ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

                <!-- Portfolio Item 4-->
                <?php foreach ($categorias4 as $categoria): ?>
                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="portfolio-item mx-auto">
                        <a href="producto4">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white">
                                    <i class="fas fa-plus fa-3x"></i>
                                </div>
                            </div>
                            <img class="img-fluid" src="assets/img/aparatos.png" alt="..." style="height: 300px; width: 100%; object-fit: cover;"/>
                        </a>
                        <div class="portfolio-details mt-2">
                            <h3><?php echo htmlspecialchars($categoria['Nombre']); ?></h3>
                            <p><?php echo htmlspecialchars($categoria['Descripción']); ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

                <!-- Portfolio Item 5-->
                <?php foreach ($categorias5 as $categoria): ?>
                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="portfolio-item mx-auto">
                        <a href="producto5">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white">
                                    <i class="fas fa-plus fa-3x"></i>
                                </div>
                            </div>
                            <img class="img-fluid" src="assets/img/vacunas.png" alt="..." style="height: 300px; width: 100%; object-fit: cover;"/>
                        </a>
                        <div class="portfolio-details mt-2">
                            <h3><?php echo htmlspecialchars($categoria['Nombre']); ?></h3>
                            <p><?php echo htmlspecialchars($categoria['Descripción']); ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

                <!-- Portfolio Item 6-->
                <?php foreach ($categorias6 as $categoria): ?>
                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="portfolio-item mx-auto">
                        <a href="producto6">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white">
                                    <i class="fas fa-plus fa-3x"></i>
                                </div>
                            </div>
                            <img class="img-fluid" src="assets/img/botiquin.png" alt="..." style="height: 300px; width: 100%; object-fit: cover;"/>
                        </a>
                        <div class="portfolio-details mt-2">
                            <h3><?php echo htmlspecialchars($categoria['Nombre']); ?></h3>
                            <p><?php echo htmlspecialchars($categoria['Descripción']); ?></p>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                
                <div class="col-md-6 col-lg-4 mb-5">
                    <div class="portfolio-item mx-auto">

                        <a href="todos">

                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white">
                                    <i class="fas fa-plus fa-3x"></i>
                                </div>
                            </div>
                            <img class="img-fluid" src="todo.png" alt="..." style="height: 300px; width: 100%; object-fit: cover;"/>
                        </a>
                        <div class="portfolio-details mt-2">
                            <h3>Todos los productos</h3>
                            <p>Se le presentarán todos los productos de consumo disponibles en nuestra farmacia. Desde medicamentos y suplementos hasta productos de cuidado personal y bienestar.</p>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </section>

    <!-- Footer-->
    <footer class="footer text-center">
        <?php 
            require_once("pie.php");
        ?>
    </footer>




