<?php
get_header(); ?>

<main class="single-photo">
    <article>
        <h1><?php the_title(); ?></h1>
        <div class="photo-meta">
            <p>Type : <?php echo esc_html(get_post_meta(get_the_ID(), 'type', true)); ?></p>
            <p>Référence : <?php echo esc_html(get_post_meta(get_the_ID(), 'reference', true)); ?></p>
        </div>
        <div class="photo-content">
            <?php the_post_thumbnail('large', ['class' => 'photo-image']); ?>
            <div class="photo-description"><?php the_content(); ?></div>
        </div>
        <button id="contact-button" data-reference="<?php echo esc_attr(get_post_meta(get_the_ID(), 'reference', true)); ?>">Contact</button>
    </article>

    <section class="related-photos">
        <h2>Photos apparentées</h2>
        <?php get_template_part('template-parts/photo_block'); ?>
    </section>
</main>

<?php get_footer(); ?>
