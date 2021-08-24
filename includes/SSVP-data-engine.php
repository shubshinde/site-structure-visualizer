
<?php

$post_types = get_post_types(array('public' => true, '_builtin' => false), 'objects', 'and');


$site_data = array();
$site_data['post_types'] = array();

if (count($post_types)) {

    // create array for post types
    foreach ($post_types as $index => $post_type) {

        $post_name          = $post_type->label;
        $post_slug          = $post_type->name;
        $raw_taxonomies     = get_object_taxonomies($post_slug, 'objects');

        $post_taxonomies    = array();

        // create taxonomy array
        foreach ($raw_taxonomies as $index => $raw_taxonomy) {

            $tax_name   = $raw_taxonomy->label;
            $tax_slug   = $raw_taxonomy->name;

            $raw_terms = get_terms(array(
                'taxonomy'      => $tax_slug,
                'parent'        => 0,
                'hide_empty'    => false,
            ));

            $tax_terms  = array();

            foreach ($raw_terms as $index => $raw_term) {

                $term_name   = $raw_term->name;
                $term_slug   = $raw_term->slug;

                // push in taxonomy terms
                array_push(
                    $tax_terms,
                    array(
                        'term_name'    => $term_name,
                        'term_slug'    => $term_slug,
                    )
                );
            }

            // push in post taxonomies
            array_push(
                $post_taxonomies,
                array(
                    'tax_name'    => $tax_name,
                    'tax_slug'    => $tax_slug,
                    'tax_terms'   => $tax_terms,
                )
            );
        }

        // push in post types
        array_push(
            $site_data['post_types'],
            array(
                'post_name'         => $post_name,
                'post_slug'         => $post_slug,
                'post_taxonomies'   => $post_taxonomies,
            )
        );
    }
}

// define constant with generated data
define('SSVP_SITE_DATA', $site_data);

?>