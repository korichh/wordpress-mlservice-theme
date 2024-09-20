<?php get_header(); ?>

<div class="page-content">
    <main id="primary" class="main">
		<section class="hero" id="hero">
            <div class="hero-wrapper">
                <div class="hero-bg">
                    <div class="hero-bg__main ibg">
                        <img class="image" src="<?= wp_get_attachment_url(CFS()->get('hero_image', 10)); ?>" alt="mlservice background">
                        <video class="video" src="<?= wp_get_attachment_url(CFS()->get('hero_video', 10)); ?>"></video>
                    </div>
                </div>
                <div class="hero-inner">
                    <div class="hero-inner__content hero-content container">
                        <div class="hero-content__text">
                            <div class="title-top-text">
                                <p><?= CFS()->get('title_top_text', 10); ?></p>
                            </div>
                            <h1><?= CFS()->get('hero_title', 10); ?></h1>
                            <div class="title-bottom-text">
                                <p><?= CFS()->get('title_bottom_text', 10); ?></p>
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
                                        <p><?= CFS()->get('hero_video_button', 10); ?></p>
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
                                <p><strong><?= CFS()->get('hero_form_text', 10); ?></strong></p>
                            </div>
							<div class="wpcf7-response-output" aria-hidden="true"></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <section class="post">
            <?php
            if (have_posts()) :
                the_post();

                get_template_part('template-parts/content', 'page');

            endif; ?>
            <div class="page-container">
                <?php
                the_post_navigation(
                    array(
                        'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'mlservice') . '</span> <span class="nav-title">%title</span>',
                        'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'mlservice') . '</span> <span class="nav-title">%title</span>',
                    )
                );
                ?>
            </div>
        </section>
    </main>
</div>

<?php get_footer();
