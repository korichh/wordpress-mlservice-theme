<?php get_header(); ?>

<div class="page-content">
    <main class="main">
        <section class="hero" id="hero">
            <div class="hero-wrapper">
                <div class="hero-bg">
                    <div class="hero-bg__main ibg">
                        <img class="image" src="<?= wp_get_attachment_url(CFS()->get('hero_image')); ?>" alt="mlservice background">
                        <video class="video" src="<?= wp_get_attachment_url(CFS()->get('hero_video')); ?>"></video>
                    </div>
                </div>
                <div class="hero-inner">
                    <div class="hero-inner__content hero-content container">
                        <div class="hero-content__text">
                            <div class="title-top-text">
                                <p><?= CFS()->get('title_top_text'); ?></p>
                            </div>
                            <h1><?= CFS()->get('hero_title'); ?></h1>
                            <div class="title-bottom-text">
                                <p><?= CFS()->get('title_bottom_text'); ?></p>
                            </div>
                        </div>
                        <div class="hero-content__player hero-player">
                            <div class="hero-player__button">
                                <a href="#">
                                    <div class="circle">
                                        <img class="play" src="<?= get_template_directory_uri(); ?>/assets/img/svg/play.svg" alt="SABBATH">
                                        <img class="pause" src="<?= get_template_directory_uri(); ?>/assets/img/svg/pause.svg" alt="SABBATH">
                                        <img class="disk" src="<?= get_template_directory_uri(); ?>/assets/img/svg/disk.svg" alt="SABBATH">
                                    </div>
                                    <div class="text">
                                        <p><?= CFS()->get('hero_video_button'); ?></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <form action="/#wpcf7-f146-o1" method="post" data-status="init" class="hero-content__form hero-form">
                            <div style="display: none;">
                                <input type="hidden" name="_wpcf7" value="146">
                                <input type="hidden" name="_wpcf7_version" value="5.6.4">
                                <input type="hidden" name="_wpcf7_locale" value="uk">
                                <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f146-o1">
                                <input type="hidden" name="_wpcf7_container_post" value="0">
                                <input type="hidden" name="_wpcf7_posted_data_hash" value="">
                            </div>
                            <div class="hero-form__block">
                                <input type="tel" placeholder="Ваш телефон" pattern="\([0-9]{3}\)-[0-9]{3}-[0-9]{4}" name="tel-number" size="40" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel hero-form__input" aria-required="true" required>
                                <input type="submit" value="Записатися на СТО" class="wpcf7-form-control has-spinner wpcf7-submit hero-form__submit">
                            </div>
                            <span class="wpcf7-spinner"></span>
                            <input type="hidden" name="wpcf7tg_sending" value="1">
                            <div class="hero-content__text">
                                <p><strong><?= CFS()->get('hero_form_text'); ?></strong></p>
                            </div>
                            <div class="wpcf7-response-output" aria-hidden="true"></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <section class="services" id="services">
            <div class="services-wrapper">
                <div class="services-inner container">
                    <h2 class="services-inner__title main-title">
                        <?= CFS()->get('services_title'); ?>
                    </h2>
                    <ul class="services-inner__list services-list">
                        <?php
                        $service_query = new WP_Query([
                            'posts_per_page' => -1,
                            'post_type' => 'service',
                            'order' => 'ASC',
                        ]);

                        if ($service_query->have_posts()) :
                            while ($service_query->have_posts()) :
                                $service_query->the_post(); ?>

                                <li class="services-list__item services-item">
                                    <div class="services-item__inner">
                                        <h4 class="services-item__title">
                                            <?= the_title(); ?>
                                        </h4>
                                        <div class="services-item__button">
                                            <a href="<?= get_permalink(get_the_ID()); ?>">
                                                Записатися
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            <?php endwhile; ?>
                        <?php endif;
                        wp_reset_postdata(); ?>
                    </ul>
                    <div class="services-inner__button-more">
                        <a href="#">
                            Ще більше послуг
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section class="feedback" id="feedback">
            <div class="feedback-wrapper">
                <div class="feedback-inner container">
                    <h2 class="feedback-inner__title main-title">
                        <?= CFS()->get('feedback_title'); ?>
                    </h2>
                    <div class="feedback-inner__content feedback-content">
                        <div class="feedback-content__left">
                            <?= wp_get_attachment_image(CFS()->get('feedback_image'), 'full'); ?>
                        </div>
                        <div class="feedback-content__right">
                            <div class="feedback-content__text">
                                <div class="feedback-content__1">
                                    <h2><?= CFS()->get('feedback_maps'); ?></h2>
                                    <a href="<?= CFS()->get('feedback_maps_button')['url'] ?>" target="<?= CFS()->get('feedback_maps_button')['target'] ?>">
                                        <?= CFS()->get('feedback_maps_button')['text'] ?>
                                    </a>
                                </div>
                                <div class="feedback-content__1">
                                    <h2><?= CFS()->get('feedback_2gis'); ?></h2>
                                    <a href="<?= CFS()->get('feedback_2gis_button')['url'] ?>" target="<?= CFS()->get('feedback_2gis_button')['target'] ?>">
                                        <?= CFS()->get('feedback_2gis_button')['text'] ?>
                                    </a>
                                </div>
                                <h2><?= CFS()->get('feedback_block_title'); ?></h2>
                                <p><?= CFS()->get('feedback_block_text'); ?></p>
                            </div>
                            <div class="feedback-content__button">
                                <a href="<?= CFS()->get('feedback_links')['url'] ?>" target="<?= CFS()->get('feedback_links')['target'] ?>">
                                    <?= CFS()->get('feedback_links')['text'] ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="models" id="models">
            <div class="models-wrapper">
                <div class="models-inner container">
                    <h2 class="models-inner__title main-title">
                        <?= CFS()->get('models_title'); ?>
                    </h2>
                    <ul class="models-inner__list models-list">
                        <?php
                        $models_list = CFS()->get('models_list');
                        for ($i = 0; $i < count($models_list); $i++) : ?>
                            <li class="models-list__item models-item">
                                <div class="models-item__image">
                                    <?= wp_get_attachment_image($models_list[$i]['models_list_item'], 'full'); ?>
                                </div>
                            </li>
                        <?php endfor; ?>
                    </ul>
                </div>
            </div>
        </section>
        <section class="security" id="security">
            <div class="security-wrapper">
                <div class="security-inner container">
                    <h2 class="security-inner__title main-title">
                        <?= CFS()->get('security_title'); ?>
                    </h2>
                    <ul class="security-inner__list security-list">
                        <?php
                        $security_list = CFS()->get('security_list');
                        for ($i = 0; $i < count($security_list); $i++) : ?>
                            <li class="security-list__item security-item">
                                <div class="security-item__inner">
                                    <div class="security-item__image">
                                        <?= wp_get_attachment_image($security_list[$i]['security_list_image'], 'full'); ?>
                                    </div>
                                    <div class="security-item__text">
                                        <h3><?= $security_list[$i]['security_list_title']; ?></h3>
                                        <p><?= $security_list[$i]['security_list_text']; ?></p>
                                    </div>
                                </div>
                            </li>
                        <?php endfor; ?>
                    </ul>
                </div>
            </div>
        </section>
        <section class="carousel" id="carousel">
            <div class="carousel-wrapper">
                <div class="carousel-inner container">
                    <h2 class="carousel-inner__title main-title">
                        <?= CFS()->get('carousel_title'); ?>
                    </h2>
                    <div class="carousel-inner__body">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <?php
                                $service_query = new WP_Query([
                                    'posts_per_page' => -1,
                                    'post_type' => 'post',
                                    'order' => 'DESC',
                                ]);

                                if ($service_query->have_posts()) :
                                    while ($service_query->have_posts()) :
                                        $service_query->the_post(); ?>

                                        <div class="swiper-slide carousel-slide">
                                            <div class="carousel-slide__inner">
                                                <a href="<?= get_permalink(get_the_ID()); ?>">
                                                    <div class="carousel-slide__image ibg">
                                                        <?php the_post_thumbnail('full'); ?>
                                                    </div>
                                                </a>
                                                <h4 class="carousel-slide__title">
                                                    <?= the_title(); ?>
                                                </h4>
                                                <div class="carousel-slide__button">
                                                    <a href="<?= get_permalink(get_the_ID()); ?>">
                                                        Прочитати статтю
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif;
                                wp_reset_postdata(); ?>
                            </div>
                        </div>
                        <div class="swiper-button-prev">
                            <svg>
                                <use xlink:href="<?= get_template_directory_uri(); ?>/assets/img/svg/prev.svg#prev"></use>
                            </svg>
                        </div>
                        <div class="swiper-button-next">
                            <svg>
                                <use xlink:href="<?= get_template_directory_uri(); ?>/assets/img/svg/next.svg#next"></use>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="location" id="location">
            <div class="location-wrapper">
                <div class="location-bg">
                    <div class="location-bg__main ibg">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1318.8669514981477!2d22.29687435823645!3d48.61493659481607!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x473919af66631167%3A0xdce08b590b81c8cc!2z0YPQuy4g0JrQvtC90L7Qv9C70Y_QvdCw0Y8sIDIwLCDQo9C20LPQvtGA0L7QtCwg0JfQsNC60LDRgNC_0LDRgtGB0LrQsNGPINC-0LHQu9Cw0YHRgtGMLCA4ODAwMA!5e0!3m2!1sru!2sua!4v1666805221305!5m2!1sru!2sua" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="location-inner container">
                    <h2 class="location-inner__title main-title">
                        <?= CFS()->get('location_title'); ?>
                    </h2>
                    <div class="location-inner__content">
                        <div class="location-inner__contacts location-contacts">
                            <h2 class="location-contacts__title">
                                <?= CFS()->get('location_address_title'); ?>
                            </h2>
                            <p class="location-contacts__address">
                                <?= CFS()->get('location_address'); ?>
                            </p>
                            <div class="location-contacts__route">
                                <h3 class="location-contacts__title">
                                    <?= CFS()->get('location_route_title'); ?>
                                </h3>
                                <div class="location-contacts__links">
                                    <a class="location-contacts__link" href="<?= CFS()->get('location_maps')['url'] ?>" target="<?= CFS()->get('location_maps')['target'] ?>">
                                        <?= CFS()->get('location_maps')['text'] ?>
                                    </a>
                                    <a class="location-contacts__link" href="<?= CFS()->get('location_apple')['url'] ?>" target="<?= CFS()->get('location_apple')['target'] ?>">
                                        <?= CFS()->get('location_apple')['text'] ?>
                                    </a>
                                    <a class="location-contacts__link" href="<?= CFS()->get('location_2gis')['url'] ?>" target="<?= CFS()->get('location_2gis')['target'] ?>">
                                        <?= CFS()->get('location_2gis')['text'] ?>
                                    </a>
                                </div>
                            </div>
                            <div class="location-contacts__time">
                                <h3 class="location-contacts__title">
                                    <?= CFS()->get('location_time_title'); ?>
                                </h3>
                                <p class="location-contacts__text">
                                    <?= CFS()->get('location_time'); ?>
                                </p>
                                <div class="location-contacts__numbers">
                                    <?php
                                    $numbers_list = CFS()->get('location_numbers');
                                    for ($i = 0; $i < count($numbers_list); $i++) : ?>
                                        <a href="<?= $numbers_list[$i]['location_number']['url']; ?>" target="<?= $numbers_list[$i]['location_number']['target']; ?>" class="location-contacts__number">
                                            <?= $numbers_list[$i]['location_number']['text']; ?>
                                        </a>
                                    <?php endfor; ?>
                                </div>
                                <a class="location-contacts__mail" href="<?= CFS()->get('location_email')['url'] ?>" target="<?= CFS()->get('location_email')['target'] ?>">
                                    <?= CFS()->get('location_email')['text'] ?>
                                </a>
                            </div>
                            <div class="location-contacts__subscribe">
                                <h3 class="location-contacts__title">
                                    <?= CFS()->get('location_socials_title') ?>
                                </h3>
                                <div class="location-contacts__socials">
                                    <?php
                                    $socials_list = CFS()->get('location_socials');
                                    for ($i = 0; $i < count($socials_list); $i++) : ?>
                                        <a href="<?= $socials_list[$i]['location_social']['url']; ?>" target="<?= $socials_list[$i]['location_social']['target']; ?>" class="location-contacts__social">
                                            <?= wp_get_attachment_image($socials_list[$i]['location_social_icon']); ?>
                                        </a>
                                    <?php endfor; ?>
                                </div>
                            </div>
                        </div>
                        <form action="/#wpcf7-f146-o1" method="post" data-status="init" class="location-inner__form location-form">
                            <div style="display: none;">
                                <input type="hidden" name="_wpcf7" value="146">
                                <input type="hidden" name="_wpcf7_version" value="5.6.4">
                                <input type="hidden" name="_wpcf7_locale" value="uk">
                                <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f146-o1">
                                <input type="hidden" name="_wpcf7_container_post" value="0">
                                <input type="hidden" name="_wpcf7_posted_data_hash" value="">
                            </div>
                            <div class="location-form__block">
                                <input type="tel" placeholder="Ваш телефон" pattern="\([0-9]{3}\)-[0-9]{3}-[0-9]{4}" name="tel-number" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel location-form__input" aria-required="true" required>
                                <input type="submit" value="Записатися на СТО" class="wpcf7-form-control has-spinner wpcf7-submit location-form__submit">
                            </div>
                            <span class="wpcf7-spinner"></span>
                            <input type="hidden" name="wpcf7tg_sending" value="1">
                            <div class="wpcf7-response-output" aria-hidden="true"></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

<?php get_footer(); ?>