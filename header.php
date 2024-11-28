<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nathalie Mota - Photographe</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    
<?php wp_head(); ?>
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


        <!-- Menu principal -->
        <nav class="header-menu">
            <div class="close-button-container">
            <?php
            // Affiche le menu en utilisant 'main-menu'
            wp_nav_menu([
                'theme_location' => 'main-menu',
                'container'      => false
            ]);
            ?>
        </nav>
            
  


</header>
        

