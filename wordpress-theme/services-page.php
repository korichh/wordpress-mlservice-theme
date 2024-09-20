<?php /* Template Name: Services */
get_header(); ?>

<div class="page-content">
    <main class="main">
        <div class="container">
            <ul class="services-inner__list services-list">
                <?php
                $paged = absint(
                    max(
                        1,
                        get_query_var('paged') ? get_query_var('paged') : get_query_var('page')
                    )
                );
                $services_query = new WP_Query([
                    'posts_per_page' => 8,
                    'post_type' => 'service',
                    'order' => 'ASC',
                    'paged' => $paged,
                ]);

                if ($services_query->have_posts()) :
                    while ($services_query->have_posts()) :
                        $services_query->the_post(); ?>

                        <li class="services-list__item services-item">
                            <div class="services-item__inner">
                                <h4 class="services-item__title">
                                    <?= the_title(); ?>
                                </h4>
                                <div class="services-item__button">
                                    <a href="<?= get_permalink(get_the_ID()); ?>">
                                        Детальніше
                                    </a>
                                </div>
                            </div>
                        </li>
                    <?php endwhile; ?>
            </ul>
            <div class="services-pagination pagination">
                <?php mlservice_paginate($services_query, $paged); ?>
            </div>
        <?php endif;
                wp_reset_postdata(); ?>
        </div>
    </main>
</div>

<?php get_footer(); ?>