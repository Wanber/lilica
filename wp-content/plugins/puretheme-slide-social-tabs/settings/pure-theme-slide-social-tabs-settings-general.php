<?php

global $PTSST_settings;

// General Settings section
$PTSST_settings[] = array(
    'section_id' => 'general',
    'section_title' => '',
    'section_description' => 'Common settings for Facebook, Twitter, Google Plus & Youtube.',
    'section_order' => 5,
    'fields' => array(
        array(
            'id' => 'facebook',
            'title' => 'Facebook Page Name',
            'desc' => 'Give Facebook Page Name like NewBloggerTips.',
            'type' => 'text',
            'std' => 'NewBloggerTips'
        ),        
		array(
            'id' => 'twitter',
            'title' => 'Twitter Profile Username',
            'desc' => 'Give Twitter Profile Username like NewBloggerTips.',
            'type' => 'text',
            'std' => 'KHNAHMOD'
        ),		
		array(
            'id' => 'gplus',
            'title' => 'Google Plus Profile ID',
            'desc' => 'Give Google Plus Profile ID like 114850220168831844723.',
            'type' => 'text',
            'std' => '114850220168831844723'
        ),		
		array(
            'id' => 'youtube',
            'title' => 'Youtube Channel Name',
            'desc' => 'Give Youtube Channel Name like NewBloggerTips.',
            'type' => 'text',
            'std' => 'NewBloggerTips'
        ),
	    array(
            'id' => 'custom-css',
            'title' => 'Custom CSS',
            'desc' => 'Custom css coding area. Use !important if needed. Otherwise Leave Empty',
            'type' => 'textarea',
            'std' => ''
        ),
    )
);


?>