<?php
$domain = 'http://example.com?';

$textURL = $domain . http_build_query(explode('　', 'PHP　MySQL　Laravel'));

echo ($textURL);

/* http://example.com?0=PHP&1=MySQL&2=Laravel */
