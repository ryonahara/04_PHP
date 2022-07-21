<?php
$domain = 'http://example.com?';
$text = 'PHP　MySQL　Laravel';

echo ($domain . http_build_query(explode('　', $text)));

/* http://example.com?0=PHP&1=MySQL&2=Laravel */
