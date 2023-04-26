<?php

return [
    'base_url' => env('GITHUB_BASE_URL', 'https://api.github.com/'),
    'github_user' => env('GITHUB_USER', 'nmachuca'),
    'github_api_version' => env('GITHUB_API_VERSION', '2022-11-28'),
    'is_secure' => env('IS_SECURED', false),
    'default_user' => [
        'name' => env('DEFAULT_USER_NAME', 'default'),
        'email' => env('DEFAULT_USER_EMAIL', 'default@fulltime-force.com'),
        'pass' => env('DEFAULT_USER_PASS', '8Z$f7!mftbS5S0E6ad3L')
    ]
];
