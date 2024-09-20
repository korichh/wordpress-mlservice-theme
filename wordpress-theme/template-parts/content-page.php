<article id="post-<?php the_ID(); ?>" <?php post_class('post-inner'); ?>>
    <header class="post-header">
        <h1 class="post-title">
            <?php the_title(); ?>
        </h1>
    </header>
    <div class="page-container">
        <?php mlservice_post_thumbnail(); ?>
        <div class="post-content">
            <?php the_content(); ?>
        </div>
        <footer class="post-footer">
        </footer>
    </div>
</article>