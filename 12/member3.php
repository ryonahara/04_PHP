<?php
declare(strict_types = 1);
require_once dirname(__FILE__) . '/Member.php';

(new Member('高橋三郎', 32, '神奈川県'))->showInfo();
