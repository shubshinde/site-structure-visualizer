<?php

add_action('rest_api_init', function () {

    register_rest_route('SSVP', 'generate-data', array(
        'methods'               => 'GET',
        'callback'              => 'SSVP_generate_data',
        'permission_callback'   => '__return_true',
        'args' => array(
            'data_type' => array(
                'required'      => false,
                'type'          => 'string',
                'description'   => 'Data Type Of Structure',
            ),
        )
    ));
});



function SSVP_generate_data($request)
{
    // get data parameters sent while api request
    $data_type  = $request->get_param('data_type');

    switch ($data_type) {

        case 'post':
            return SSVP_post_data();
            break;

        case 'tree':
            return SSVP_tree_data();
            break;

        default:
            return SSVP_respond_error();
            break;
    }
}


// -------- functions to generate data ---------

function SSVP_respond_error()
{
    return rest_ensure_response('Error : Data Type Undefined');
}


function SSVP_tree_data()
{
    $site_data = array();
    $site_data['name'] = 'Post Types';
    $site_data['label'] = 'Post Types';

    $post_types = get_post_types(array('public' => true, '_builtin' => false), 'objects', 'and');

    $post_types_array = array();

    foreach ($post_types as $index => $post_type) {

        $post_type_title  = $post_type->label;
        $post_slug  = $post_type->name;

        $taxonomies_array = array();
        $raw_taxonomies = get_object_taxonomies($post_slug, 'objects');

        foreach ($raw_taxonomies as $index => $raw_taxonomy) {

            $taxonomy_title   = $raw_taxonomy->label;
            $taxonomy_slug    = $raw_taxonomy->name;

            $taxonomy_terms_array  = array();

            $raw_terms = get_terms(array(
                'taxonomy'      => $taxonomy_slug,
                'parent'        => 0,
                'hide_empty'    => false,
            ));

            foreach ($raw_terms as $index => $raw_term) {

                $term_title   = $raw_term->name;
                $term_slug   = $raw_term->slug;

                // push in terms array
                array_push(
                    $taxonomy_terms_array,
                    array(
                        'name'    => $term_title,
                        // 'children'=> '',
                        'label'   => 'Term',
                    )
                );
            }

            // push in taxonomy array
            array_push(
                $taxonomies_array,
                array(
                    'name'    => $taxonomy_title,
                    'children' => $taxonomy_terms_array,
                    'label'   => 'Taxonomy',
                )
            );
        }

        // push in post types array
        array_push(
            $post_types_array,
            array(
                'name'    => $post_type_title,
                'children' => $taxonomies_array,
                'label'   => 'Post Type',
            )
        );
    }

    $site_data['children'] = $post_types_array;


    return rest_ensure_response(json_encode($site_data));
}

function SSVP_post_data()
{

    $post_author = 'all';

    // get the posts
    $posts_list = get_posts(array('type' => 'post'));
    $post_data = array();

    foreach ($posts_list as $posts) {
        $post_id = $posts->ID;
        $post_author = $posts->post_author;
        $post_title = $posts->post_title;
        $post_content = $posts->post_content;

        $post_data[$post_id]['author'] = $post_author;
        $post_data[$post_id]['title'] = $post_title;
        $post_data[$post_id]['content'] = $post_content;
    }

    wp_reset_postdata();

    return rest_ensure_response($post_data);
}
