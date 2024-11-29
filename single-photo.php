<?php
get_header();  // En-tête du site

if (have_posts()) : 
    while (have_posts()) : the_post(); ?>
        <article>
            <h1><?php the_title(); ?></h1> <!-- Titre de la photo -->
            <div><?php the_content(); ?></div> <!-- Contenu principal -->
            <p><strong>Type :</strong> <?php echo get_post_meta(get_the_ID(), 'type', true); ?></p> <!-- Champ personnalisé Type -->
            <p><strong>Référence :</strong> <?php echo get_post_meta(get_the_ID(), 'référence', true); ?></p> <!-- Champ personnalisé Référence -->
        </article>
    <?php endwhile; ?>
<?php endif; ?>


