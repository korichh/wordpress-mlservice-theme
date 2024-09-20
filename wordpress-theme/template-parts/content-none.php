<article class="no-results not-found">
    <?php if (is_search()) : ?>
        <h1 class="section-title">
            <?php esc_html_e('Sorry, but nothing matched your search terms.', 'mlservice'); ?>
        </h1>
        <div class="section-text">
            <?php esc_html_e('Please try again with some different keywords.', 'mlservice'); ?>
        </div>
    <?php elseif (is_category()) : ?>
        <h1 class="section-title">
            <?php echo sprintf(esc_html__('No posts in category: %s', 'mlservice'), get_query_var('category_name')); ?>
        </h1>
    <?php else : ?>
        <h1 class="section-title">
            <?php esc_html_e('Nothing Found', 'mlservice'); ?>
        </h1>
    <?php endif; ?>
</article>