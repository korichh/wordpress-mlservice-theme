<?php get_header(); ?>

<div class="page-content">
    <main id="primary" class="main">
        <section class="error-404 not-found">
            <header class="page-header">
                <h1 class="page-title main-title">
                    <?php esc_html_e('Oops! That page can&rsquo;t be found.', 'mlservice'); ?>
                </h1>
                <p><?php esc_html_e('It looks like nothing was found at this location.', 'mlservice'); ?></p>
            </header>
        </section>
    </main>
</div>

<?php get_footer();
