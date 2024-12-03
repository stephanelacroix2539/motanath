

<?php
$args = [
    'post_type'      => 'photo',
    'posts_per_page' => 8,
    'paged'          => 1,
];
$query = new WP_Query($args);

if ($query->have_posts()) :
    while ($query->have_posts()) : $query->the_post(); ?>
        <div class="photo-block">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('thumbnail'); ?>
                <h3><?php the_title(); ?></h3>
            </a>
        </div>
    <?php endwhile;
endif;
wp_reset_postdata();
?>
