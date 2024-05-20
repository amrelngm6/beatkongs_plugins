<?php
defined('ABSPATH') or exit('Please don&rsquo;t call the plugin directly. Thanks :)');

///////////////////////////////////////////////////////////////////////////////////////////////////
//Breadcrumbs
///////////////////////////////////////////////////////////////////////////////////////////////////
//Display post parent items
function siteseo_breadcrumbs_post_parent($post, $crumbs) {
    if ($post->post_parent) { //If post has parent pages
        $parent_id = $post->post_parent;
        while ($parent_id) {
            $page = get_post($parent_id);
            $parent_id = $page->post_parent;
            if ('' != get_post_meta($page->ID, '_siteseo_robots_breadcrumbs', true)) {
                $parent_crumbs[] = [wp_strip_all_tags(get_post_meta($page->ID, '_siteseo_robots_breadcrumbs', true)), get_permalink($page->ID), $page->ID];
            } else {
                $parent_crumbs[] = [get_the_title($page->ID), get_permalink($page->ID), $page->ID];
            }
        }

        $parent_crumbs = array_reverse($parent_crumbs);

        foreach ($parent_crumbs as $crumb) {
            $crumbs[] = [
                0 => $crumb[0],
                1 => $crumb[1],
                2 => $crumb[2]
            ];
        }
    }

    return $crumbs;
}

//Display Term archive link
function siteseo_breadcrumbs_term_link($post, $crumbs, $options) {
    $cpt = get_post_type($post);
    $taxonomy = isset($options['breadcrumbs_tax'][$cpt]['tax']) ? $options['breadcrumbs_tax'][$cpt]['tax'] : null;

    $terms_crumbs = [];

    if ('none' != $taxonomy && null != $taxonomy) {//IF TAXONOMY SET FROM BREADCRUMBS OPTION
        if (get_post_meta($post->ID, '_siteseo_robots_primary_cat', true)) {
            $_siteseo_robots_primary_cat = get_post_meta($post->ID, '_siteseo_robots_primary_cat', true);

            if (isset($_siteseo_robots_primary_cat) && '' != $_siteseo_robots_primary_cat && 'none' != $_siteseo_robots_primary_cat) {
                $tax = get_term($_siteseo_robots_primary_cat, $taxonomy);
                if ( ! is_wp_error($tax) && $tax && isset($tax->term_id)) {
                    $terms = wp_get_post_terms($post->ID, $taxonomy, ['orderby' => 'parent', 'order' => 'DESC', 'child_of' => $tax->term_id]);
                    $terms = function_exists('siteseo_maybe_mangled_object_vars') ? siteseo_maybe_mangled_object_vars($terms) : $terms; // Prevent PHP 8.1 warning
                    $parent = current($terms);

                    if (false !== $parent) {
                        $tax = $parent;
                    }
                }
            } else {
                $terms = wp_get_post_terms($post->ID, $taxonomy, ['orderby' => 'parent', 'order' => 'DESC']);
                $terms = function_exists('siteseo_maybe_mangled_object_vars') ? siteseo_maybe_mangled_object_vars($terms) : $terms; // Prevent PHP 8.1 warning
                $tax = current($terms);
            }
        } else {
            $terms = wp_get_post_terms($post->ID, $taxonomy, ['orderby' => 'parent', 'order' => 'DESC']);
            $terms = function_exists('siteseo_maybe_mangled_object_vars') ? siteseo_maybe_mangled_object_vars($terms) : $terms; // Prevent PHP 8.1 warning
            $tax = current($terms);
        }

        if (isset($tax->term_id)) {
            $ancestors_cat = get_ancestors($tax->term_id, $taxonomy);

            $ancestors_crumb = array_reverse($ancestors_cat);

            if ( ! empty($ancestors_crumb)) {
                foreach ($ancestors_crumb as $key => $value) {
                    $term = get_term($value, $taxonomy);
                    $term_id = $term->term_id;
                    $term = $term->name;

                    if ('' != get_term_meta($value, '_siteseo_robots_breadcrumbs', true)) {
                        $term = get_term_meta($value, '_siteseo_robots_breadcrumbs', true);
                    }

                    $terms_crumbs[] = [
                        0 => wp_strip_all_tags($term),
                        1 => get_term_link($value),
                        2 => $term_id,
                    ];
                }
            }

            if ($tax) {
                $tax_name = $tax->name;

                if ('' != get_term_meta($tax->term_id, '_siteseo_robots_breadcrumbs', true)) {
                    $tax_name = get_term_meta($tax->term_id, '_siteseo_robots_breadcrumbs', true);
                }

                $terms_crumbs[] = [
                    0 => wp_strip_all_tags($tax_name),
                    1 => get_term_link($tax),
                    2 => $tax->term_id,
                ];
            }
        }
    }

    $terms_crumbs = apply_filters( 'siteseo_breadcrumbs_terms', $terms_crumbs );

    $crumbs = array_merge($crumbs, $terms_crumbs);

    return $crumbs;
}

///////////////////////////////////////////////////////////////////////////////////////////////////
//The Breadcrumbs
///////////////////////////////////////////////////////////////////////////////////////////////////
if ('1' === siteseo_get_service('AdvancedOption')->getBreadcrumbsEnable() || '1' === siteseo_get_service('AdvancedOption')->getBreadcrumbsJsonEnable()) {
    //Inline CSS in head
    function siteseo_breadcrumbs_inline_css( $empty = '', $echo = true ) {
        $siteseo_display_breadcrumbs_separator = siteseo_get_breadcrumbs_separator();
        $inline_css = "<style>.breadcrumb {list-style: none;margin:0}.breadcrumb li {margin:0;display:inline-block;position:relative;}.breadcrumb li::after{content:'" . $siteseo_display_breadcrumbs_separator . "';margin-left:5px;margin-right:5px;}.breadcrumb li:last-child::after{display:none}</style>";
        $inline_css = apply_filters('siteseo_breadcrumbs_css', $inline_css);
        if ( $echo ) echo $inline_css;
        return $inline_css;
    }
    add_action( 'wp_head', 'siteseo_breadcrumbs_inline_css', 30);

    /**
     * Returns the seperator
     *
     * @return  string  $seperator
     */
    function siteseo_get_breadcrumbs_separator(){
        $seperator = ' - ';
        if (!empty(siteseo_get_service('AdvancedOption')->getBreadcrumbsDisableSeparator())) {
            $seperator = null;
        } elseif (siteseo_get_service('AdvancedOption')->getBreadcrumbsSeparator()) {
            $seperator = ' ' . siteseo_get_service('AdvancedOption')->getBreadcrumbsSeparator() . ' ';
        }
        return apply_filters( 'siteseo_breadcrumbs_sep', $seperator );
    }

    function siteseo_display_breadcrumbs($echo = true) {
        $page_id = get_option('page_for_posts');
        /**i18n**/
        //Home
        if (!empty(siteseo_get_service('AdvancedOption')->getBreadcrumbsI18nHome())) {
            $i18n_home = siteseo_get_service('AdvancedOption')->getBreadcrumbsI18nHome();
        } else {
            $i18n_home = __('Home', 'siteseo');
        }
        //Author
        if (!empty(siteseo_get_service('AdvancedOption')->getBreadcrumbsI18nAuthor())) {
            $i18n_author = siteseo_get_service('AdvancedOption')->getBreadcrumbsI18nAuthor();
        } else {
            $i18n_author = __('Author: ', 'siteseo');
        }
        //404 error
        if (!empty(siteseo_get_service('AdvancedOption')->getBreadcrumbsI18n404())) {
            $i18n_404 = siteseo_get_service('AdvancedOption')->getBreadcrumbsI18n404();
        } else {
            $i18n_404 = __('404 error', 'siteseo');
        }
        //Search results for
        if (!empty(siteseo_get_service('AdvancedOption')->getBreadcrumbsI18nSearch())) {
            $i18n_search_results = siteseo_get_service('AdvancedOption')->getBreadcrumbsI18nSearch().' ';
        } else {
            $i18n_search_results = __('Search results for: ', 'siteseo');
        }
        //No results
        if (!empty(siteseo_get_service('AdvancedOption')->getBreadcrumbsI18nNoResults())) {
            $i18n_no_results = siteseo_get_service('AdvancedOption')->getBreadcrumbsI18nNoResults();
        } else {
            $i18n_no_results = __('No results', 'siteseo');
        }

        //Attachments
        if (!empty(siteseo_get_service('AdvancedOption')->getBreadcrumbsI18nAttachments())) {
            $i18n_attachments = siteseo_get_service('AdvancedOption')->getBreadcrumbsI18nAttachments();
        } else {
            $i18n_attachments = __('Attachments', 'siteseo');
        }
        //Paged
        if (!empty(siteseo_get_service('AdvancedOption')->getBreadcrumbsI18nPaged())) {
            $i18n_paged = siteseo_get_service('AdvancedOption')->getBreadcrumbsI18nPaged();
        } else {
            $i18n_paged = __('Page ', 'siteseo');
        }

        //Globals
        global $post, $wp_query;

        //Init
        $crumbs = [];
        $options = get_option('siteseo_advanced_option_name');

        //Home prefix
        include_once ABSPATH . 'wp-admin/includes/plugin.php';
        if (is_plugin_active('polylang/polylang.php') || is_plugin_active('polylang-pro/polylang.php')) {
            $real_home = pll_home_url();
        } else {
            $real_home = get_home_url();
        }

        $crumbs[] = [
            0 => $i18n_home,
            1 => $real_home,
        ];

        //404
        if (is_404()) {
            $crumbs[] = [
                0 => $i18n_404,
            ];
        }

        //Attachment
        if (is_attachment()) {
            $crumbs[] = [
                0 => $i18n_attachments,
            ];
        }

        //Single
        if (is_single() && ( ! is_home() && ! is_front_page())) {
            if (is_singular('tribe_events')) { //Events calendar
                $queried_object = get_queried_object();
                $post_type = get_post_type_object('tribe_events');

                $crumbs[] = [
                    0 => $post_type->labels->name,
                    1 => esc_url(tribe_get_events_link())
                ];

                $crumbs = siteseo_breadcrumbs_term_link($post, $crumbs, $options);

                if ('' != get_post_meta($queried_object->ID, '_siteseo_robots_breadcrumbs', true)) {
                    $crumbs[] = [
                        0 => wp_strip_all_tags(get_post_meta($queried_object->ID, '_siteseo_robots_breadcrumbs', true)),
                        1 => esc_url(tribe_get_event_link($queried_object->ID)),
                        2 => $queried_object->ID
                    ];
                } else {
                    $crumbs[] = [
                        0 => wp_strip_all_tags($queried_object->post_title),
                        1 => esc_url(tribe_get_event_link($queried_object->ID)),
                        2 => $queried_object->ID
                    ];
                }
            } elseif (is_singular('job_listing') && get_theme_support('job-manager-templates') === false) { //WP Job Manager
                $queried_object = get_queried_object();
                $post_type = get_post_type_object('job_listing');

                if (!empty(get_option('job_manager_jobs_page_id'))) {
                    if ('' != get_post_meta(get_option('job_manager_jobs_page_id'), '_siteseo_robots_breadcrumbs', true)) {
                        $crumbs[] = [
                            0 => wp_strip_all_tags(get_post_meta(get_option('job_manager_jobs_page_id'), '_siteseo_robots_breadcrumbs', true)),
                            1 => get_the_permalink(get_option('job_manager_jobs_page_id')),
                            2 => get_option('job_manager_jobs_page_id')
                        ];
                    } else {
                        $crumbs[] = [
                            0 => wp_strip_all_tags(get_the_title(get_option('job_manager_jobs_page_id'))),
                            1 => get_page_link(get_option('job_manager_jobs_page_id')),
                            2 => get_option('job_manager_jobs_page_id')
                        ];
                    }
                }

                if ('' != get_post_meta(get_the_id(), '_siteseo_robots_breadcrumbs', true)) {
                    $crumbs[] = [
                        0 => wp_strip_all_tags(get_post_meta(get_the_id(), '_siteseo_robots_breadcrumbs', true)),
                        1 => get_the_permalink(),
                        2 => get_the_id()
                    ];
                } else {
                    $crumbs[] = [
                        0 => wp_strip_all_tags(get_the_title()),
                        1 => get_the_permalink(),
                        2 => get_the_id()
                    ];
                }
            } elseif (is_singular('resume') && get_theme_support('resume-manager-templates') === false) { //WP Job Manager - Resume add-on
                $queried_object = get_queried_object();
                $post_type = get_post_type_object('resume');

                if (!empty(get_option('resume_manager_resumes_page_id'))) {
                    if ('' != get_post_meta(get_option('resume_manager_resumes_page_id'), '_siteseo_robots_breadcrumbs', true)) {
                        $crumbs[] = [
                            0 => wp_strip_all_tags(get_post_meta(get_option('resume_manager_resumes_page_id'), '_siteseo_robots_breadcrumbs', true)),
                            1 => get_the_permalink(get_option('resume_manager_resumes_page_id')),
                            2 => get_option('resume_manager_resumes_page_id')
                        ];
                    } else {
                        $crumbs[] = [
                            0 => wp_strip_all_tags(get_the_title(get_option('resume_manager_resumes_page_id'))),
                            1 => get_page_link(get_option('resume_manager_resumes_page_id')),
                            2 => get_option('resume_manager_resumes_page_id')
                        ];
                    }
                }

                if ('' != get_post_meta(get_the_id(), '_siteseo_robots_breadcrumbs', true)) {
                    $crumbs[] = [
                        0 => wp_strip_all_tags(get_post_meta(get_the_id(), '_siteseo_robots_breadcrumbs', true)),
                        1 => get_the_permalink(),
                        2 => get_the_id()
                    ];
                } else {
                    $crumbs[] = [
                        0 => wp_strip_all_tags(get_the_title()),
                        1 => get_the_permalink(),
                        2 => get_the_id()
                    ];
                }
            } elseif ('post' != get_post_type($post)) {
                $post_type = get_post_type_object(get_post_type($post));
                if ('1' == $post_type->has_archive || true == $post_type->has_archive) {//CPT
                    //Product CPT
                    if (function_exists('is_shop') && 'product' == get_post_type($post) && get_option('woocommerce_shop_page_id')) {
                        //Shop base
                        if ('1' !== siteseo_get_service('AdvancedOption')->getBreadcrumbsRemoveShopPage()) {
                            if ('' != get_post_meta(get_option('woocommerce_shop_page_id'), '_siteseo_robots_breadcrumbs', true)) {
                                $crumbs[] = [
                                    0 => wp_strip_all_tags(get_post_meta(get_option('woocommerce_shop_page_id'), '_siteseo_robots_breadcrumbs', true)),
                                    1 => get_the_permalink(get_option('woocommerce_shop_page_id')),
                                    2 => get_option('woocommerce_shop_page_id')
                                ];
                            } else {
                                $crumbs[] = [
                                    0 => wp_strip_all_tags(get_the_title(get_option('woocommerce_shop_page_id'))),
                                    1 => get_page_link(get_option('woocommerce_shop_page_id')),
                                    2 => get_option('woocommerce_shop_page_id')
                                ];
                            }
                        }
                    } else {
                        //Display CPT archive link
                        $crumbs_cpt = [
                            0 => $post_type->labels->name,
                            1 => get_post_type_archive_link(get_post_type($post)),
                        ];

                        $crumbs_cpt = apply_filters('siteseo_breadcrumbs_remove_cpt', $crumbs_cpt, $post_type);

                        if (false !== $crumbs_cpt) {
                            $crumbs[] = $crumbs_cpt;
                        }
                    }

                    $crumbs = siteseo_breadcrumbs_term_link($post, $crumbs, $options);

                    $crumbs = siteseo_breadcrumbs_post_parent($post, $crumbs);

                    if ('' != get_post_meta(get_the_id(), '_siteseo_robots_breadcrumbs', true)) {
                        $crumbs[] = [
                            0 => wp_strip_all_tags(get_post_meta(get_the_id(), '_siteseo_robots_breadcrumbs', true)),
                            1 => get_the_permalink(),
                            2 => get_the_id()
                        ];
                    } else {
                        $crumbs[] = [
                            0 => wp_strip_all_tags(get_the_title()),
                            1 => get_the_permalink(),
                            2 => get_the_id()
                        ];
                    }
                } else {
                    if (true === apply_filters('siteseo_breadcrumbs_force_archive_name', '__return_false')) {
                        $crumbs[] = [
                            0 => $post_type->labels->name,
                        ];
                    }

                    $crumbs = siteseo_breadcrumbs_term_link($post, $crumbs, $options);

                    $crumbs = siteseo_breadcrumbs_post_parent($post, $crumbs);

                    if ('' != get_post_meta(get_the_id(), '_siteseo_robots_breadcrumbs', true)) {
                        $crumbs[] = [
                            0 => wp_strip_all_tags(get_post_meta(get_the_id(), '_siteseo_robots_breadcrumbs', true)),
                            1 => get_the_permalink(),
                            2 => get_the_id()
                        ];
                    } else {
                        $crumbs[] = [
                            0 => wp_strip_all_tags(get_the_title()),
                            1 => get_the_permalink(),
                            2 => get_the_id()
                        ];
                    }
                }
            } else {
                //Blog parent page
                if ('1' !== siteseo_get_service('AdvancedOption')->getBreadcrumbsRemoveBlogPage()) {
                    if ('page' == get_option('show_on_front') && '0' != $page_id) {
                        if ('' != get_post_meta($page_id, '_siteseo_robots_breadcrumbs', true)) {
                            $crumbs[] = [
                                0 => wp_strip_all_tags(get_post_meta($page_id, '_siteseo_robots_breadcrumbs', true)),
                                1 => get_the_permalink($page_id),
                                2 => $page_id
                            ];
                        } else {
                            $crumbs[] = [
                                0 => wp_strip_all_tags(get_the_title($page_id)),
                                1 => get_the_permalink($page_id),
                                2 => $page_id
                            ];
                        }
                    }
                }

                //Display Term archive link
                $crumbs = siteseo_breadcrumbs_term_link($post, $crumbs, $options);

                //Default single post (custom + default)
                if ('' != get_post_meta(get_the_id(), '_siteseo_robots_breadcrumbs', true)) {
                    $crumbs[] = [
                        0 => wp_strip_all_tags(get_post_meta(get_the_id(), '_siteseo_robots_breadcrumbs', true)),
                        1 => get_the_permalink(),
                        2 => get_the_id()
                    ];
                } else {
                    $crumbs[] = [
                        0 => wp_strip_all_tags(get_the_title()),
                        1 => get_the_permalink(),
                        2 => get_the_id()
                    ];
                }
            }
        }

        //Page
        if (is_page() && ( ! is_home() && ! is_front_page())) {

            if ($post->post_parent) {
                $crumbs = siteseo_breadcrumbs_post_parent($post, $crumbs);
            } elseif (function_exists('is_wc_endpoint_url') && is_wc_endpoint_url()) { //WooCommerce Endpoint
                $crumbs[] = [
                    0 => get_the_title(),
                    1 => get_permalink(),
                    2 => get_the_id()
                ];
            }

            //Display Term archive link
            $crumbs = siteseo_breadcrumbs_term_link($post, $crumbs, $options);

            //Current page
            if (function_exists('is_wc_endpoint_url') && is_wc_endpoint_url()) {
            } else {
                if ('' != get_post_meta(get_the_id(), '_siteseo_robots_breadcrumbs', true)) {
                    $crumbs[] = [
                        0 => wp_strip_all_tags(get_post_meta(get_the_id(), '_siteseo_robots_breadcrumbs', true)),
                        1 => get_the_permalink(),
                        2 => get_the_id()
                    ];
                } else {
                    $crumbs[] = [
                        0 => wp_strip_all_tags(get_the_title()),
                        1 => get_the_permalink(),
                        2 => get_the_id()
                    ];
                }
            }
        }

        //Blog
        if (is_home()) {
            if ('page' == get_option('show_on_front') && '0' != $page_id) {
                if ('' != get_post_meta($page_id, '_siteseo_robots_breadcrumbs', true)) {
                    $crumbs[] = [
                        0 => wp_strip_all_tags(get_post_meta($page_id, '_siteseo_robots_breadcrumbs', true)),
                        1 => get_the_permalink($page_id),
                        2 => $page_id
                    ];
                } else {
                    $crumbs[] = [
                        0 => wp_strip_all_tags(get_the_title($page_id)),
                        1 => get_the_permalink($page_id),
                        2 => $page_id
                    ];
                }
            }
        }

        //Post Type Archives
        if (is_post_type_archive('tribe_events')) { //Events calendar
            $post_type = get_post_type_object('tribe_events');

            $crumbs[] = [
                0 => wp_strip_all_tags($post_type->labels->name),
                1 => esc_url(tribe_get_events_link()),
            ];
        } elseif (is_post_type_archive()) {
            $post_type = get_post_type_object(get_post_type());

            if (isset($post_type) && 'product' == $post_type->name) {
                //Product CPT
                if (function_exists('is_shop') && get_option('woocommerce_shop_page_id')) {
                    //Shop base
                    if ('' != get_post_meta(get_option('woocommerce_shop_page_id'), '_siteseo_robots_breadcrumbs', true)) {
                        $crumbs[] = [
                            0 => wp_strip_all_tags(get_post_meta(get_option('woocommerce_shop_page_id'), '_siteseo_robots_breadcrumbs', true)),
                            1 => get_the_permalink(get_option('woocommerce_shop_page_id')),
                            2 => get_option('woocommerce_shop_page_id')
                        ];
                    } else {
                        $crumbs[] = [
                            0 => wp_strip_all_tags(get_the_title(get_option('woocommerce_shop_page_id'))),
                            1 => get_page_link(get_option('woocommerce_shop_page_id')),
                            2 => get_option('woocommerce_shop_page_id')
                        ];
                    }
                }
            } elseif (isset($post_type)) {
                $crumbs[] = [
                    0 => wp_strip_all_tags($post_type->labels->name),
                    1 => get_post_type_archive_link($post_type->name),
                ];
            } else {
                $post_type = get_query_var('post_type');

                if (isset($post_type)) {
                    $crumbs[] = [
                        0 => $i18n_no_results,
                        1 => get_post_type_archive_link($post_type),
                    ];
                } else {
                    $crumbs[] = [
                        0 => $i18n_no_results,
                    ];
                }
            }
        }

        //Date Archives
        if (is_date()) {
            //Blog parent page
            if ('1' !== siteseo_get_service('AdvancedOption')->getBreadcrumbsRemoveBlogPage()) {
                if ('page' == get_option('show_on_front') && '0' != $page_id) {
                    if ('' != get_post_meta($page_id, '_siteseo_robots_breadcrumbs', true)) {
                        $crumbs[] = [
                            0 => wp_strip_all_tags(get_post_meta($page_id, '_siteseo_robots_breadcrumbs', true)),
                            1 => get_the_permalink($page_id),
                            2 => $page_id
                        ];
                    } else {
                        $crumbs[] = [
                            0 => wp_strip_all_tags(get_the_title($page_id)),
                            1 => get_the_permalink($page_id),
                            2 => $page_id
                        ];
                    }
                }
            }
            if (is_year() || is_month()) {
                $crumbs[] = [
                    0 => get_the_time('Y'),
                    1 => get_year_link(get_the_time('Y')),
                ];
            }
            if (is_month()) {
                $crumbs[] = [
                    0 => get_the_time('F'),
                    1 => get_month_link(get_the_time('Y'), get_the_time('m')),
                ];
            }
        }

        //Author Archives
        if (is_author()) {
            global $author;

            $author_name = get_userdata($author);

            $crumbs[] = [
                0 => $i18n_author . $author_name->display_name,
                1 => get_author_posts_url($author_name->ID),
                2 => $author_name->ID,
            ];
        }

        //Taxonomies (including Post Tag and Post Category)
        if (is_tax() || is_tag() || is_category()) {
            $current_term = $GLOBALS['wp_query']->get_queried_object();
            $taxonomy = get_taxonomy($current_term->taxonomy);

            $cpt = isset($options['breadcrumbs_cpt'][$taxonomy->name]['cpt']) ? $options['breadcrumbs_cpt'][$taxonomy->name]['cpt'] : null;
            $cpt = get_post_type_object($cpt);

            if ('none' != $cpt && null != $cpt) {
                //job_listing_tag
                if ( 'job_listing' == $cpt->name && get_theme_support('job-manager-templates') === false ) {
                    $queried_object = get_queried_object();
                    $post_type = get_post_type_object('job_listing');

                    if (!empty(get_option('job_manager_jobs_page_id'))) {
                        if ('' != get_post_meta(get_option('job_manager_jobs_page_id'), '_siteseo_robots_breadcrumbs', true)) {
                            $crumbs[] = [
                                0 => wp_strip_all_tags(get_post_meta(get_option('job_manager_jobs_page_id'), '_siteseo_robots_breadcrumbs', true)),
                                1 => get_the_permalink(get_option('job_manager_jobs_page_id')),
                                2 => get_option('job_manager_jobs_page_id')
                            ];
                        } else {
                            $crumbs[] = [
                                0 => wp_strip_all_tags(get_the_title(get_option('job_manager_jobs_page_id'))),
                                1 => get_page_link(get_option('job_manager_jobs_page_id')),
                                2 => get_option('job_manager_jobs_page_id')
                            ];
                        }
                    }
                } elseif ('post' == $cpt->name && '1' !== siteseo_get_service('AdvancedOption')->getBreadcrumbsRemoveBlogPage()) {//Blog page
                    if ('page' == get_option('show_on_front') && '0' != $page_id) {
                        if ('' != get_post_meta($page_id, '_siteseo_robots_breadcrumbs', true)) {
                            $crumbs[] = [
                                0 => wp_strip_all_tags(get_post_meta($page_id, '_siteseo_robots_breadcrumbs', true)),
                                1 => get_the_permalink($page_id),
                                2 => $page_id
                            ];
                        } else {
                            $crumbs[] = [
                                0 => wp_strip_all_tags(get_the_title($page_id)),
                                1 => get_the_permalink($page_id),
                                2 => $page_id
                            ];
                        }
                    }
                } elseif (function_exists('is_shop') && get_option('woocommerce_shop_page_id') && 'product' == $cpt->name) {//Shop page
                    //Shop base
                    if ('1' !== siteseo_get_service('AdvancedOption')->getBreadcrumbsRemoveShopPage()) {
                        if ('' != get_post_meta(get_option('woocommerce_shop_page_id'), '_siteseo_robots_breadcrumbs', true)) {
                            $crumbs[] = [
                                0 => wp_strip_all_tags(get_post_meta(get_option('woocommerce_shop_page_id'), '_siteseo_robots_breadcrumbs', true)),
                                1 => get_the_permalink(get_option('woocommerce_shop_page_id')),
                                2 => get_option('woocommerce_shop_page_id')
                            ];
                        } else {
                            $crumbs[] = [
                                0 => wp_strip_all_tags(get_the_title(get_option('woocommerce_shop_page_id'))),
                                1 => get_page_link(get_option('woocommerce_shop_page_id')),
                                2 => get_option('woocommerce_shop_page_id')
                            ];
                        }
                    }
                } else {
                    $crumbs[] = [
                        0 => wp_strip_all_tags($cpt->labels->name),
                        1 => get_post_type_archive_link($cpt->name),
                    ];
                }
            }

            //Ancestors
            if (0 != $current_term->parent) {
                $ancestors_term = get_ancestors($current_term->term_id, $current_term->taxonomy);

                $ancestors_crumb = array_reverse($ancestors_term);

                foreach ($ancestors_crumb as $key => $value) {
                    $current_term_name = get_term($value, $current_term->taxonomy);
                    $current_term_name = $current_term_name->name;

                    if ('' != get_term_meta($value, '_siteseo_robots_breadcrumbs', true)) {
                        $current_term_name = get_term_meta($value, '_siteseo_robots_breadcrumbs', true);
                    }

                    $crumbs[] = [
                        0 => wp_strip_all_tags($current_term_name),
                        1 => get_term_link($value),
                        2 => $current_term->term_id
                    ];
                }
            }

            //Current term
            $current_term_name = single_term_title('', false);

            if ('' != get_term_meta($current_term->term_id, '_siteseo_robots_breadcrumbs', true)) {
                $current_term_name = get_term_meta($current_term->term_id, '_siteseo_robots_breadcrumbs', true);
            }

            $crumbs[] = [
                0 => wp_strip_all_tags($current_term_name),
                1 => get_term_link($current_term),
                2 => $current_term->term_id,
            ];
        }

        //Search results
        if (is_search()) {
            $s_query = '';
            if ('' != get_search_query()) {
                $s_query = urlencode(get_query_var('s'));
            }

            $crumbs[] = [
                0 => $i18n_search_results . get_search_query(),
                1 => get_search_link($s_query),
            ];
        }

        //Pagination
        if (is_paged()) {
            global $wp;
            $current_url = home_url(add_query_arg([], $wp->request));

            $current_page = (get_query_var('paged')) ? get_query_var('paged') : 1;

            $crumbs[] = [
                0 => $i18n_paged . $current_page,
                1 => $current_url,
            ];
        }

        //WooCommerce Endpoint
        if (function_exists('is_wc_endpoint_url') && function_exists('wc_get_account_endpoint_url')) {
            if (is_wc_endpoint_url()) {
                $crumbs[] = [
                    0 => wp_strip_all_tags(WC()->query->get_endpoint_title(WC()->query->get_current_endpoint())),
                    1 => wc_get_account_endpoint_url(WC()->query->get_current_endpoint()),
                ];
            }
        }

        //Render
        if ((is_front_page() && is_paged()) || ! is_front_page()) {
            $siteseo_breadcrumbs_html = '';

            if (empty($crumbs) || ! is_array($crumbs)) {
                return;
            }

            //Schema.org itemListElement
            $crumbs = apply_filters('siteseo_breadcrumbs_crumbs', $crumbs);

            $display_markup = true;
            $display_markup = apply_filters('siteseo_breadcrumbs_html_markup', $display_markup);

            $linkable = apply_filters('siteseo_breadcrumbs_last_item_linkable', false);
            $last_key = array_keys($crumbs);
            $last_key = array_pop($last_key);

            foreach ($crumbs as $key => $crumb) {
                $sep = $key;
                if ($last_key != $sep) {
                    if ($display_markup === true) {
                        $siteseo_breadcrumbs_html .= '<li class="breadcrumb-item" itemprop="itemListElement" itemscope itemtype="' . siteseo_check_ssl() . 'schema.org/ListItem">';
                    } else {
                        $siteseo_breadcrumbs_html .= '<li class="breadcrumb-item">';
                    }
                } else {
                    if ($display_markup === true) {
                        $siteseo_breadcrumbs_html .= '<li class="breadcrumb-item active" aria-current="page" itemprop="itemListElement" itemscope itemtype="' . siteseo_check_ssl() . 'schema.org/ListItem">';
                    } else {
                        $siteseo_breadcrumbs_html .= '<li class="breadcrumb-item active" aria-current="page">';
                    }
                }

                if ($last_key != $sep || $linkable === true) {
                    if ( ! empty($crumb[1])) {
                        if ($display_markup === true) {
                            $siteseo_breadcrumbs_html .= '<a itemscope itemtype="http://schema.org/WebPage" itemprop="item" itemid="' . $crumb[1] . '" href="' . $crumb[1] . '">';
                        } else {
                            $siteseo_breadcrumbs_html .= '<a href="' . $crumb[1] . '">';
                        }
                    }
                }

                if ($display_markup === true) {
                    $siteseo_breadcrumbs_html .= '<span itemprop="name">' . $crumb[0] . '</span>';
                } else {
                    $siteseo_breadcrumbs_html .= '<span>' . $crumb[0] . '</span>';
                }

                if ($last_key != $sep || $linkable === true) {
                    if ( ! empty($crumb[1])) {
                        $siteseo_breadcrumbs_html .= '</a>';
                    }
                }

                $key = $key + 1;
                if ($display_markup === true) {
                    $siteseo_breadcrumbs_html .= '<meta itemprop="position" content="' . $key . '">';
                }
                $siteseo_breadcrumbs_html .= '</li>';
            }

            $here = '';
            if (siteseo_get_service('AdvancedOption')->getBreadcrumbsI18nHere()) {
                $here = siteseo_get_service('AdvancedOption')->getBreadcrumbsI18nHere();
            }

            $nav_class = '';
            $nav_class = apply_filters( 'siteseo_breadcrumbs_html_class', $nav_class );

            $ol_class = 'class="breadcrumb"';
            $ol_class = apply_filters( 'siteseo_breadcrumbs_html_class_ol', $ol_class );

            if ($display_markup === true) {
                $siteseo_breadcrumbs = '<nav ' . $nav_class . ' aria-label="' . esc_html__('breadcrumb', 'siteseo') . '">' . $here . '<ol ' . $ol_class . ' itemscope itemtype="' . siteseo_check_ssl() . 'schema.org/BreadcrumbList">' . $siteseo_breadcrumbs_html . '</ol></nav>';
            } else {
                $siteseo_breadcrumbs = '<nav ' . $nav_class . ' aria-label="' . esc_html__('breadcrumb', 'siteseo') . '">' . $here . '<ol ' . $ol_class . '>' . $siteseo_breadcrumbs_html . '</ol></nav>';
            }

            $siteseo_breadcrumbs = apply_filters('siteseo_breadcrumbs_html', $siteseo_breadcrumbs);

            //JSON-LD
            if ('1' === siteseo_get_service('AdvancedOption')->getBreadcrumbsJsonEnable()) {
                if (empty($crumbs) || ! is_array($crumbs)) {
                    return;
                }

                $siteseo_breadcrumbs_json = [];

                $old_markup = apply_filters( 'siteseo_breadcrumbs_old_markup', false );

                if ($old_markup === false) {
                    $siteseo_breadcrumbs_json = ['@context' => siteseo_check_ssl() . 'schema.org', 'name' => 'Breadcrumb', '@type' => 'BreadcrumbList'];
                } else {
                    $siteseo_breadcrumbs_json = ['@context' => siteseo_check_ssl() . 'schema.org', '@type' => 'BreadcrumbList'];
                }

                $siteseo_breadcrumbs_json['itemListElement'] = [];

                foreach ($crumbs as $key => $crumb) {
                    $siteseo_breadcrumbs_json['itemListElement'][$key] = [
                        '@type' => 'ListItem',
                        'position' => $key + 1,
                    ];

                    if ($old_markup === true) {
                        $siteseo_breadcrumbs_json['itemListElement'][$key]['name'] = $crumb[0];
                    }

                    //Check if URL is available
                    if ( ! empty($crumb[1])) {
                        if ($old_markup === false) {
                            $siteseo_breadcrumbs_json['itemListElement'][$key]['item'] = ['@type' => 'WebPage', 'id' => $crumb[1].'#webpage', 'url' => $crumb[1], 'name' => $crumb[0]];
                        } else {
                            $siteseo_breadcrumbs_json['itemListElement'][$key]['item'] = $crumb[1];
                        }
                    }
                }
            }

            if ('1' === siteseo_get_service('AdvancedOption')->getBreadcrumbsJsonEnable()) {
                $jsonld = '<script type="application/ld+json">';
                $jsonld .= json_encode($siteseo_breadcrumbs_json);
                $jsonld .= '</script>';
                $jsonld .= "\n";
            }

            if ('1' === siteseo_get_service('AdvancedOption')->getBreadcrumbsEnable()) {
                if (true === $echo) {
                    do_action('siteseo_breadcrumbs_before_html');
                    echo $siteseo_breadcrumbs;
                    do_action('siteseo_breadcrumbs_after_html');
                } elseif (false === $echo) {
                    return do_action('siteseo_breadcrumbs_before_html') . $siteseo_breadcrumbs . do_action('siteseo_breadcrumbs_after_html');
                }
            }

            if ('1' === siteseo_get_service('AdvancedOption')->getBreadcrumbsJsonEnable() && 'json' === $echo) {
                return $jsonld;
            }
        }
    }
    //Shortcode
    function siteseo_shortcode_breadcrumbs() {
        return siteseo_display_breadcrumbs(false);
    }
    if ('1' === siteseo_get_service('AdvancedOption')->getBreadcrumbsEnable()) {
        add_shortcode('siteseo_breadcrumbs', 'siteseo_shortcode_breadcrumbs');
    }

    //JSON-LD
    if ('1' === siteseo_get_service('AdvancedOption')->getBreadcrumbsJsonEnable()) {
        add_action('wp_head', 'siteseo_jsonld_breadcrumbs', 2);
        function siteseo_jsonld_breadcrumbs() {
            echo siteseo_display_breadcrumbs('json');
        }
    }

    if (siteseo_get_service('AdvancedOption')->getBreadcrumbsStorefront() ==='1') {
        function siteseo_storefront_display_breadcrumbs() {
            echo '
            <div class="storefront-breadcrumb">
                <div class="col-full">
                    ' . siteseo_display_breadcrumbs(false) . '
                </div>
            </div>';
        }

        add_action( 'init', 'siteseo_remove_wc_breadcrumbs' );
        function siteseo_remove_wc_breadcrumbs() {
            remove_action( 'storefront_before_content', 'woocommerce_breadcrumb', 10, 0 );
            add_action( 'storefront_before_content', 'siteseo_storefront_display_breadcrumbs', 20, 0 );
        }
    }
}
