<?php
$score = 50;
if ($score == 100) {
    echo '満点おめでとう！';
} elseif ($score >= 80) {
    echo '素晴らしいです！';
} elseif ($score >= 60) {
    echo '合格です';
} else {
    echo '不合格です';
}
