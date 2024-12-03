<?php
//   Vignettes d'images pour son affichage dans le front-page
    
    ?>  
    <article class="photo filtered-image">
        <div class="rollover-image rowling-image">
            <span class="rollover-titre">
          
            </span>
            <span class="rollover-fullscreen fa-solid fa-expand fa-2xl" data-lightbox-item-id="<?php echo get_the_ID(); ?>"></span>
           
            <a href="<?php the_permalink(); ?>" class="rollover-eye fa-solid fa-eye fa-2xl"></a>
        </div>
            <?php the_post_thumbnail(); ?>
                                    
    </article>
