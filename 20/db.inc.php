<?php

require_once dirname(__FILE__) . '/env.php';

/**
 *
 * PDOインスタンスを返すDB接続
 *
 * @return object
 *
*/
function dbConnect(): object
{
  // 値を戻さないと実行先で利用できない
    return new PDO(
        'mysql:host=' . DB_HOST . '; dbname=' . DB_NAME . '; charset=utf8',
        DB_USER, DB_PASS,
        [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES   => false,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
}
