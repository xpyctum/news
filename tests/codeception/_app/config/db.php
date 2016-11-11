<?php

return [
    'class' => yii\db\Connection::class,
    'dsn' => 'sqlite::memory:',
    'attributes' => [
        PDO::ATTR_PERSISTENT => true
    ]
];
