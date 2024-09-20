<?php get_header(); ?>

<div class="page-content">
    <main id="primary" class="main">
        <section class="post">
            <?php
            while (have_posts()) :
                the_post();

                get_template_part('template-parts/content', 'page');

            endwhile;
            ?>
        </section>
    </main>
</div>

<?php get_footer();
