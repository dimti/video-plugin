<?php

return [
    'models' => [
        'video' => [
            'labels' => [
                'youtube_url' => 'Youtube URL',
                'youtube_short_url' => 'Youtube short URL',
                'youtube_embed_url' => 'Youtube full URL for embed',
                'video_src_url' => 'URL-адрес прямого источника видео',
                'thumbnail_url' => 'Ссылка для скачивания изображения для предосмотра',
                'preview' => 'Изображение предосмотра',
            ]
        ],
        'settings' => [
            'labels' => [
                'preview' => 'Заглушка при отсутствии изображения для предосмотра',
            ]
        ],
    ],
    'plugin' => [
        'name' => 'Видео',
        'description' => 'Модель видео для полиморфной связи с вашими любыми сущностями',
    ],
    'permissions' => [
        'settings' => 'Доступ к настройка - изменению заглушки по-умолчанию для видео',
    ],
    'settings' => [
        'label' => 'Видео',
        'description' => 'Заглушка превью для видео',
        'category' => 'Содержимое',
    ],
];
