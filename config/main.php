<?php

/*
|--------------------------------------------------------------------------
| Application config
|--------------------------------------------------------------------------
*/


//  <id> => [
//      'name' => '<name>',
//      'fullName' => '<fullName>',
//      'ip' => '<ip>',
//      'port' => '<port>'
//  ],

// <id> * - значение из sm_chat_log_server_id [1, 2, ...]
// <name> * - короткое обозначение сервера [TS, Public, ...]
// <fullName> * - полное название сервера [Test Server, Public Server, ...]
// <ip> - ip от сервера [0.0.0.0, 0.0.0.1, ...]
// <port> - порт от сервера [27016, 27015, ...]
// параметры со звездочкой * - обязательны

// Примеры:

//  1 => [
//    'name' => 'TS',
//    'fullName' => 'Test Server',
//    'ip' => '0.0.0.0',
//    'port' => '27016'
//  ],
//  2 => [
//    'name' => 'TS2',
//    'fullName' => 'Test Server 2',
//  ],

return [
    /*
     * Настройи БД перенесены в /.env
     *
     * Где
     *      DB_HOST - Хост от БД (значение "host" из database.cfg)
     *      DB_DATABASE - База данных (значение "database" из database.cfg)
     *      DB_USERNAME - Имя пользователя от БД (значение "user" из database.cfg)
     *      DB_PASSWORD - Пароль от БД (значение "pass" из database.cfg)
     *      DB_PORT - Порт от БД (значение "port" из database.cfg)
     *
     * Пример:
     *      DB_CONNECTION=mysql
     *      DB_HOST=localhost
     *      DB_DATABASE=chat
     *      DB_USERNAME=SomeUsername
     *      DB_PASSWORD=SomePassword
     *      DB_PORT=3306
     */
    /*
     * Если вы распаковили архив не в корневую директорию, то нужно в /.env указать путь до сайта без домена (APP_BASE_URL)
     *      Примеры:
     *          https://example.com => APP_BASE_URL=/
     *          https://example.com/chat => APP_BASE_URL=/chat
     *          https://example.com/some-folder => APP_BASE_URL=/some-folder
     *          https://example.com/some-folder/chat => APP_BASE_URL=/some-folder/chat
     *          ...
     *
     *          https://chat.example.com/ => APP_BASE_URL=/
     *          https://chat.example.com/chat => APP_BASE_URL=/chat
     *          https://chat.example.com/some-folder => APP_BASE_URL=/some-folder
     *          https://chat.example.com/some-folder/chat => APP_BASE_URL=/some-folder/chat
     *          ...
     */
    'projectName' => [
        'img' => '', // Ссылка на лого [относительная или абсолютная ссылка] ['' - если не нужно]
        'name' => 'chat-logging',
        'url' => '', // Ссылка при нажатии [относительная или абсолютная ссылка] ['' - если не нужно]
        'blank' => true // нужно ли открывать в новой вкладке true - ДА / false - НЕТ
    ],
    'metaData' => [
        'title' => 'chat-logging' // Название вкладки
    ],
    // ↑↑↑
    'servers' => [
        1 => [
            'name' => 'TS',
            'fullName' => 'Test Server',
            'ip' => '0.0.0.0',
            'port' => '27015'
        ],
        2 => [
            'name' => 'TS2',
            'fullName' => 'Test Server 2',
        ],
        // ...
    ],
    // Ссылки в <toolbar>
    'navBarItems' => [
        [
            'url' => '//vk.com', // относительная или абсолютная ссылка
            'name' => 'VK1',
            'blank' => true // нужно ли открывать в новой вкладке true - ДА / false - НЕТ
        ],
        [
            'url' => '//vk.com', // относительная или абсолютная ссылка
            'name' => 'VK2',
            'blank' => true // нужно ли открывать в новой вкладке true - ДА / false - НЕТ
        ],
        // ...
    ],
    // Сообщения с таким же типом не будут отображаться
    'ignoreTypes' => [
        //'say',
        //'say_team',
        //'sm_csay',
        //'sm_hsay',
        //'sm_msay',
        //'sm_tsay',
        //'sm_psay',
        //'sm_say',
        //'sm_chat'
    ],
    // Сообщения с таким же текстом не будут отображаться (текст регистронезависимый)
    'ignoreTexts' => [
        '',
        ' ',
        // ...
    ],
    'delete' => [  // Крон команда -   * * * * * php /path-to-chat-logging/artisan schedule:run >>/dev/null 2>&1
        'days' => 0, // Удалять сообщения старше n дней... [0 - выкл / n > 0 - вкл] (без крона работать не будет)
    ]
];