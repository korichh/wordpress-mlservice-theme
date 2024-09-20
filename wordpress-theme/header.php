<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div class="page">
        <div class="page-wrapper">
            <div class="overlay"></div>
            <header class="header">
                <style>
                    #wpadminbar {
                        position: absolute !important;
                    }

                    html {
                        margin: 0 !important;
                    }
                </style>
                <div class="header-wrapper">
                    <div class="header-inner">
                        <div class="container">
                            <div class="header-inner__top">
                                <div class="header-inner__logo">
                                    <?php if (get_theme_mod('custom_logo')) : ?>
                                        <a href="<?php echo home_url('/'); ?>">
                                            <img src="<?php echo esc_url(wp_get_attachment_url(get_theme_mod('custom_logo'))); ?>" alt="mlservice logo">
                                        </a>
                                    <?php endif; ?>
                                </div>
                                <div class="header-inner__address header-address">
                                    <div class="header-address__icon">
                                        <img src="<?= get_template_directory_uri(); ?>/assets/img/mark.png" alt="mark icon">
                                    </div>
                                    <div class="header-address__text">
                                        <p><?= CFS()->get('location_address', 10); ?> <a href="<?= CFS()->get('location_maps', 10)['url'] ?>">подивитися на мапі</a></p>
                                    </div>
                                    <div class="header-address__time">
                                        <p><?= CFS()->get('location_time', 10); ?></p>
                                    </div>
                                </div>
                                <div class="header-inner__numbers">
                                    <?php
                                    $numbers_list = CFS()->get('location_numbers', 10);
                                    for ($i = 0; $i < count($numbers_list); $i++) : ?>
                                        <a href="<?= $numbers_list[$i]['location_number']['url']; ?>" target="<?= $numbers_list[$i]['location_number']['target']; ?>">
                                            <?= $numbers_list[$i]['location_number']['text']; ?>
                                        </a>
                                    <?php endfor; ?>
                                </div>
                                <nav class="header-inner__nav burger-nav">
                                    <div class="header-inner__logo">
                                        <?php if (get_theme_mod('custom_logo')) : ?>
                                            <a href="<?php echo home_url('/'); ?>">
                                                <img src="<?php echo esc_url(wp_get_attachment_url(get_theme_mod('custom_logo'))); ?>" alt="mlservice logo">
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                    <?php
                                    wp_nav_menu(array(
                                        'theme_location'  => 'header-menu',
                                        'menu_id'         => 'header-menu',
                                        'container'       => false,
                                    ));
                                    ?>
                                    <div class="header-inner__address header-address">
                                        <div class="header-address__text">
                                            <p><?= CFS()->get('location_address', 10); ?> <a href="<?= CFS()->get('location_maps', 10)['url'] ?>">подивитися на мапі</a></p>
                                        </div>
                                        <div class="header-address__time">
                                            <p><?= CFS()->get('location_time', 10); ?></p>
                                        </div>
                                        <div class="header-inner__numbers">
                                            <?php
                                            $numbers_list = CFS()->get('location_numbers', 10);
                                            for ($i = 0; $i < count($numbers_list); $i++) : ?>
                                                <a href="<?= $numbers_list[$i]['location_number']['url']; ?>" target="<?= $numbers_list[$i]['location_number']['target']; ?>">
                                                    <?= $numbers_list[$i]['location_number']['text']; ?>
                                                </a>
                                            <?php endfor; ?>
                                        </div>
                                    </div>
                                </nav>
                                <div class="header-inner__burger header-burger">
                                    <span></span>
                                </div>
                            </div>
                        </div>
                        <div class="billet"></div>
                        <div class="container">
                            <nav class="header-inner__nav header-nav">
                                <?php
                                wp_nav_menu(array(
                                    'theme_location'  => 'header-menu',
                                    'menu_id'         => 'header-menu',
                                    'container'       => false,
                                ));
                                ?>
                            </nav>
                        </div>
                    </div>
                </div>
            </header>
            <div class="popup-contacts">
                <div class="popup-wrapper">
                    <a href="#" class="close">
                        <svg width="100%" height="100%" viewBox="0 0 37 36" xmlns="http://www.w3.org/2000/svg">
                            <line x1="34.8913" y1="0.842759" x2="0.910903" y2="34.8232" stroke="white" stroke-width="1.50049" />
                            <line x1="35.8613" y1="34.8236" x2="1.88091" y2="0.843154" stroke="white" stroke-width="1.50049" />
                        </svg>
                    </a>
                    <div class="popup-inner">
                        <div class="popup-inner__image">
                            <?= wp_get_attachment_image(CFS()->get('popup_image'), 'full'); ?>
                        </div>
                        <div class="popup-inner__content popup-content">
                            <h2 class="popup-content__title">
                                <?= CFS()->get('popup_title'); ?>
                            </h2>
                            <form action="/#wpcf7-f146-o1" method="post" data-status="init" class="popup-content__form hero-form">
                                <div style="display: none;">
                                    <input type="hidden" name="_wpcf7" value="146">
                                    <input type="hidden" name="_wpcf7_version" value="5.6.4">
                                    <input type="hidden" name="_wpcf7_locale" value="uk">
                                    <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f146-o1">
                                    <input type="hidden" name="_wpcf7_container_post" value="0">
                                    <input type="hidden" name="_wpcf7_posted_data_hash" value="">
                                </div>
                                <div class="hero-form__block popup-form__block">
                                    <input type="tel" pattern="\([0-9]{3}\)-[0-9]{3}-[0-9]{4}" name="tel-number" size="40" class="wpcf7-form-control wpcf7-text wpcf7-tel wpcf7-validates-as-required wpcf7-validates-as-tel hero-form__input" aria-required="true" required="" inputmode="text">
                                    <input type="submit" value="Записатися на СТО" class="wpcf7-form-control has-spinner wpcf7-submit hero-form__submit">
                                </div>
                                <span class="wpcf7-spinner"></span>
                                <input type="hidden" name="wpcf7tg_sending" value="1">
                                <div class="wpcf7-response-output" aria-hidden="true"></div>
                            </form>
                            <div class="popup-content__text">
                                <p><?= CFS()->get('popup_text'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="popup-success">
                <div class="popup-wrapper">
                    <div class="popup-inner">
                        <h2 class="popup-inner__title">
                            Ви успішно відправили заявку
                        </h2>
                        <div class="popup-inner__text">
                            <p>Протягом 10 хв ми вам подзвонимо</p>
                        </div>
                    </div>
                </div>
            </div>