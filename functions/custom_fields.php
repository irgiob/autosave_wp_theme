<?php

if( function_exists('acf_add_local_field_group') ):

    // define rating field
    acf_add_local_field_group(array(
        'key' => 'group_ratings',
        'title' => 'Review Rating',
        'fields' => array (
            array (
                'key' => 'field_rating',
                'label' => 'Rating',
                'name' => 'rating',
                'type' => 'range',
                'instructions' => 'What do you rate this (out of 5)?',
                'required' => 1,
                'min' => 0,
                'max' => 5,
                'step' => 0.5,
                'append' => "/5"
            )
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_taxonomy',
                    'operator' => '==',
                    'value' => 'category:review',
                ),
            ),
        ),
    ));

    // define spotify podcast uri field
    $get_uri_instructions = "
        How to get Spotify Episode URI:<br/>
            1. Open Spotify Web (https://open.spotify.com/) and search for the podcast show</br>
            2. Find the episode associated with this post and open it in your browser</br>
            3. Go to the URL and copy the ID after the '/episode/' (ex. 7makk4oTQel546B0PZlDM5')</br>
            4. Paste the ID in the field below
    ";
    acf_add_local_field_group(array(
        'key' => 'group_podcast_uri',
        'title' => '(Spotify) Podcast Embed ID',
        'fields' => array (
            array (
                'key' => 'field_podcast_uri',
                'label' => 'Spotify Episode URI',
                'name' => 'spotify_episode_uri',
                'type' => 'text',
                'instructions' => $get_uri_instructions,
                'required' => 1,
                'prepend' => "https://open.spotify.com/episode/"
            )
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_taxonomy',
                    'operator' => '==',
                    'value' => 'category:podcast',
                ),
            ),
        ),
    ));

endif;