<article id="post-<?php the_ID(); ?>" <?php post_class('post-inner'); ?>>
    <header class="post-header">
        <?php if (is_singular()) : ?>
            <h1 class="post-title">
                <?php the_title(); ?>
            </h1>
        <?php else : ?>
            <h2 class="post-title">
                <a href="<?php echo esc_url(get_permalink()); ?>">
                    <?php the_title(); ?>
                </a>
            </h2>
        <?php endif;
        if (get_post_type() === 'post') : ?>
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
        <?php
        the_content(
            sprintf(
                wp_kses(
                    __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'mlservice'),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                wp_kses_post(get_the_title())
            )
        );

        wp_link_pages(
            array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'mlservice'),
                'after'  => '</div>',
            )
        );
        ?>
    </div>

    <footer class="post-footer">
        <?php esc_html_e('The end of post', 'mlservice'); ?>
    </footer>
</article>