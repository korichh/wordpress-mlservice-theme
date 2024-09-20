<?php /* Template Name: Posts */
get_header(); ?>

<div class="page-content">
    <main class="main">
        <div class="container">
            <ul class="posts-list">
                <?php
                $paged = absint(
                    max(
                        1,
                        get_query_var('paged') ? get_query_var('paged') : get_query_var('page')
                    )
                );
                $posts_query = new WP_Query([
                    'posts_per_page' => 6,
                    'post_type' => 'post',
                    'order' => 'DESC',
                    'paged' => $paged,
                ]);

                if ($posts_query->have_posts()) :
                    while ($posts_query->have_posts()) :
                        $posts_query->the_post(); ?>

                        <li class="posts-list__item posts-item ">
                            <div class="posts-item__inner">
                                <a href="<?= get_permalink(get_the_ID()); ?>">
                                    <div class="posts-item__image carousel-slide__image ibg">
                                        <?php the_post_thumbnail('full'); ?>
                                    </div>
                                </a>
                                <h4 class="posts-item__title carousel-slide__title">
                                    <?= the_title(); ?>
                                </h4>
                                <div class="posts-item__button carousel-slide__button">
                                    <a href="<?= get_permalink(get_the_ID()); ?>">
                                        Прочитати статтю
                                    </a>
                                </div>
                            </div>
                        </li>
                    <?php endwhile; ?>
            </ul>
            <div class="posts-pagination pagination">
                <?php mlservice_paginate($posts_query, $paged); ?>
            </div>
        <?php endif;
                wp_reset_postdata(); ?>
        </div>
    </main>
</div>

<?php get_footer(); ?>