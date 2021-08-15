<!--Cabecera-->
<header id="header">
        <div id="category">
            <ul>
                <li>
                    <a href="#">Categorías</a>
                    <ul>
                        <li>
                            <a href="#">Deportes</a>
                        </li>
                        <li>
                            <a href="#">Electrohogar</a>
                        </li>
                        <li>
                            <a href="#">Belleza y Cuidado Personal</a>
                        </li>
                        <li>
                            <a href="#">Mascotas</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div id="logo">
            <a href="/../ishopcorp">
                <img src="https://www.ishopcorp.com/img/logo_ishopcorp.png" height="40"/>
                <p>ISHOPCORP</p>
            </a>  
        </div>
        <div id="busqueda">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <input type="text" name="busqueda" class="barrabuscar" placeholder="¿Qué busco?">
                <button type="submit" name="search" class="botsearch"><label class="icon">L</label></button>
            </form>
        </div>
        <nav id="menu">
            <ul>
                <?php
                    session_start();
                    if(!isset($_SESSION['usuario'])){
                ?>
                <li class="iconli">
                    <a href="#" class="iconlogo">
                        <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                        </svg>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="/../ishopcorp/vista/registrouser.php">Iniciar Sesión</a>
                        </li>
                        <li>
                            <a href="/../ishopcorp/vista/registrouser.php">Registrarme</a>
                        </li>        
                    </ul>             
                </li>
                
                <?php
                    }else{
                ?>
                <li class="iconli">
                    <a href="/../ishopcorp/vista/carrito.php" class="iconlogo">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                    </a>
                </li>
                <li class="iconli">
                    <a href="#" class="iconlogo">
                        <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                        </svg>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="/../ishopcorp/vista/miperfil.php">Mi perfil</a>
                        </li>
                        <li>
                            <a href="#">Historial de pedidos</a>
                        </li>
                        <li>
                            <a href="/../ishopcorp/vista/cerrar_session.php">Cerrar Sesión</a>
                        </li>        
                    </ul>             
                </li>
                
                <?php
                    }
                ?>
                
                
            </ul>
        </nav>
</header>

<!--Fin Cabecera-->


