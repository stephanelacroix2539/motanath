

<?php get_header();?>
<body>
    <main>
    
        <div class = "hero">
        <?php // Affichage du héro

            query_posts(array('post_type' => 'photo', 'orderby' => 'rand', 'showposts' => 1 ));
            if (have_posts()) :
                while (have_posts()) : the_post(); ?>
                <div class="hero-image" style="background-image: url('<?php echo the_post_thumbnail_url(); ?>');">
                    <h1 class="hero-title">PHOTOGRAPHE EVENT</h1>
                </div>
                <?php endwhile;
            endif ?>    
        </div>



        <?php get_footer();?>