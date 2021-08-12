<?php

return [
    'models' => [
        'video' => [
            'labels' => [
                'youtube_url' => 'Youtube URL',
                'youtube_short_url' => 'Youtube short URL',
                'youtube_embed_url' => 'Youtube full URL for embed',
                'video_src_url' => 'Video direct source url',
                'thumbnail_url' => 'Preview image url',
                'preview' => 'Preview image',
            ]
        ],
        'settings' => [
            'labels' => [
                'preview' => 'Placeholder preview image',
            ]
        ],
    ],
    'plugin' => [
        'name' => 'Videos',
        'description' => 'Videos model for morphTo anything',
    ],
    'permissions' => [
        'settings' => 'Settings',
    ],
    'settings' => [
        'label' => 'Video',
        'description' => 'Video preview placeholder',
        'category' => 'Content',
    ],
];
