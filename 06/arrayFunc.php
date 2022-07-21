<?php
$domain = 'http://example.com?';
$text = 'PHP　MySQL　Laravel';

$textArray = explode('　', $text);
$textURL = 'http://example.com?' . http_build_query($textArray);

echo '<pre>';
print_r($textURL);
echo '</pre>';
/* http://example.com?0=PHP&1=MySQL&2=Laravel */
