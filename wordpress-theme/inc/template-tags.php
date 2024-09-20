<?php
if (!function_exists('mlservice_date')) :
    function mlservice_date()
    {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if (get_the_time('U') !== get_the_modified_time('U')) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf(
            $time_string,
            esc_attr(get_the_date(DATE_W3C)),
            esc_html(get_the_date()),
            esc_attr(get_the_modified_date(DATE_W3C)),
            esc_html(get_the_modified_date())
        );

        $date = sprintf(
            esc_html_x('Posted on %s', 'post date', 'mlservice'),
            '<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
        );

        echo '<span class="posted-on">' . $date . '</span>';
    }
endif;

if (!function_exists('mlservice_author')) :
    function mlservice_author()
    {
        $byline = sprintf(
            esc_html_x('by %s', 'post author', 'mlservice'),
            '<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
        );

        echo '<span class="byline"> ' . $byline . '</span>';
    }
endif;

if (!function_exists('mlservice_post_thumbnail')) :
    function mlservice_post_thumbnail()
    {
        if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
            return;
        }

        if (is_singular()) :
?>

            <div class="post-image page-image">
                <?php the_post_thumbnail('full'); ?>
            </div>

        <?php else : ?>

            <a class="post-image page-image" href="<?php echo esc_url(get_permalink()); ?>" aria-hidden="true" tabindex="-1">
                <?php
                the_post_thumbnail(
                    'full',
                    array(
                        'alt' => the_title_attribute(
                            array(
                                'echo' => false,
                            )
                        ),
                    )
                );
                ?>
            </a>
<?php
        endif;
    }
endif;

if (!function_exists('wp_body_open')) :
    function wp_body_open()
    {
        do_action('wp_body_open');
    }
endif;

if (!function_exists('mlservice_paginate')) :
    function mlservice_paginate($query, $paged, array $args = [])
    {
        $big = 999999999;

        $defaults = array(
            'show_all'  => false,
            'prev_next' => true,
            'prev_text' => '« ' . esc_html__('Prev', 'mlservice'),
            'next_text' => esc_html__('Next', 'mlservice') . ' »',
            'end_size'  => 1,
            'mid_size'  => 2,
            'type'      => 'plain',
        );

        $args = wp_parse_args($args, $defaults);

        echo paginate_links(array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'current' => $paged,
            'total' => $query->max_num_pages,

            'show_all'  => $args['show_all'],
            'prev_next' => $args['prev_next'],
            'prev_text' => $args['prev_text'],
            'next_text' => $args['next_text'],
            'end_size'  => $args['end_size'],
            'mid_size'  => $args['mid_size'],
            'type'      => $args['type'],
        ));
    }
endif;
