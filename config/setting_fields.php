<?php

return [
    'image' => [
        'title' => 'General',
        'desc' => 'All the general settings for application.',
        'icon' => 'glyphicon glyphicon-sunglasses',
        'elements' => [
            [
                'type' => 'string',
                'data' => 'string',
                'name' => 'image',
                'label' => 'App Favicon',
                'rules' => 'nullable|min:2|max:500',
                'class' => 'w-auto px-2',
                'value' => '/images/banner/upgrade.png'
            ]
        ]
    ],
    'logo' => [
        'title' => 'General',
        'desc' => 'All the general settings for application.',
        'icon' => 'glyphicon glyphicon-sunglasses',
        'elements' => [
            [
                'type' => 'string',
                'data' => 'string',
                'name' => 'logo',
                'label' => 'App Logo',
                'rules' => 'nullable|min:2|max:500',
                'class' => 'w-auto px-2',
                'value' => '/logo.jpeg'
            ]
        ]
    ],
    'modal' => [
        'title' => 'General',
        'desc' => 'All the general settings for application.',
        'icon' => 'glyphicon glyphicon-sunglasses',
        'elements' => [
            [
                'type' => 'string',
                'data' => 'string',
                'name' => 'modal',
                'label' => 'App modal',
                'rules' => 'nullable',
                'class' => 'w-auto px-2',
                'value' => '0'
            ]
        ]
    ],
];
