
<!-- Affichage du Héro -->
<?php get_header();?>
<body>
    <main>
    
        <div class = "hero">
        <?php 

            query_posts(array('post_type' => 'photo', 'orderby' => 'rand', 'showposts' => 1 ));
            if (have_posts()) :
                while (have_posts()) : the_post(); ?>
                <div class="hero-image" style="background-image: url('<?php echo the_post_thumbnail_url(); ?>');">
                    <h1 class="hero-title">PHOTOGRAPHE EVENT</h1>
                </div>
                <?php endwhile;
            endif ?>    
        </div>

        <div class="filters">
    <!-- Filtre Catégorie -->
    <select id="filter-category">
        <option value="">CATEGORIES</option>
        <?php
        $categories = get_terms('categorie');
        foreach ($categories as $category) {
            echo '<option value="' . esc_attr($category->slug) . '">' . esc_html($category->name) . '</option>';
        }
        ?>
    </select>

    <!-- Filtre Format -->
    <select id="filter-format">
        <option value="">FORMATS</option>
        <?php
        $formats = get_terms('format');
        foreach ($formats as $format) {
            echo '<option value="' . esc_attr($format->slug) . '">' . esc_html($format->name) . '</option>';
        }
        ?>
    </select>

    <!-- Tri des résultats -->
    <select id="sort-order">
        <option value="">TRIER PAR</option>
        <option value="date_desc">Plus récents</option>
        <option value="date_asc">Plus anciens</option>
    </select>
</div>


        <main class="photo-list">
    <div id="photo-container">
        <?php get_template_part('templates_part/photo-block'); ?>
    </div>
</main>
<div class="button-load">
<button id="load-more" data-page="1">Charger plus</button>
</div>
</body>

     <?php get_footer();?>