<article id="post-<?php the_ID(); ?>" <?php post_class('post-inner'); ?>>
    <header class="post-header">
        <h2 class="post-title">
            <a href="<?php echo esc_url(get_permalink()); ?>">
                <?php the_title(); ?>
            </a>
        </h2>

        <?php if (get_post_type() === 'post') : ?>
            <div class="post-meta">
                <?php
                mlservice_date();
                mlservice_author();
                ?>
            </div>
        <?php endif; ?>
    </header>

    <?php mlservice_post_thumbnail(); ?>

    <div class="post-content">
        <?php the_excerpt(); ?>
    </div>

    <footer class="post-footer">
        <?php esc_html_e('The end of post', 'mlservice'); ?>
    </footer>
</article>