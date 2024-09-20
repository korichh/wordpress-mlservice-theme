<?php get_header(); ?>

<div class="page-content">
    <main id="primary" class="main">
        <section class="posts">
            <?php if (have_posts()) :
                if (is_home() && !is_front_page()) :
            ?>
                    <header class="page-header">
                        <h1 class="page-title screen-reader-text">
                            <?php single_post_title(); ?>
                        </h1>
                    </header>
                <?php
                endif;

                while (have_posts()) :
                    the_post();

                    get_template_part('template-parts/content', get_post_type());

                endwhile; ?>

                <div class="page-pagination pagination">
                    <?php echo paginate_links(); ?>
                </div>

            <?php else :

                get_template_part('template-parts/content', 'none');

            endif;
            ?>
        </section>
    </main>
</div>

<?php get_footer();
