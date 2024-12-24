<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nathalie Mota - Photographe</title>
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <?php wp_head(); ?>
</head>
<body>
<div class="overlay"></div>
    <!-- Section d'en-tête -->
    <header>
        <!-- Logo de l'en-tête -->
        <div class="header-logo">
            <?php
            $custom_logo_id = get_theme_mod('custom_logo');
            $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
            ?>
            <a href="<?php echo home_url(); ?>">
                <img src="/nathalie-mota/wp-content/themes/mota/assets/images/Logo.png" alt="Logo">
            </a>
        </div>

        <!-- Bouton burger Menu Mobile -->
        <div class="mobile-menu-button" id="open-fullscreen-menu-button">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
        
        <!-- Menu de l'en-tête -->
        <nav class="header-menu">
        
            <div class="close-button-container">
                <!-- Conteneur du logo -->
                <div class="logo-container">
                    <?php
                    $custom_logo_id = get_theme_mod('custom_logo');
                    $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
                    ?>
                    <a href="<?php echo home_url(); ?>">
                    <img src="/nathalie-mota/wp-content/themes/mota/assets/images/Logo.png" alt="Logo">
                    </a>
                </div>
                <button id="close-fullscreen-menu-button" class="close-button">X</button>
            </div>

            <!-- Conteneur du menu -->
            <div class="menu-container">
                <?php
                wp_nav_menu([
                    'theme_location' => 'main-menu',
                    'container'      => false,
                    'menu_class'     => 'menu-items'
                ]);
                ?>
            </div>
        
        </nav>
    </header>
</body>
</html>

