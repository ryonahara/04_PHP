<?php
$score = '';
if (!is_numeric($score)) {
    echo '数値を入力してください';
} elseif (0 > $score || $score > 100) {
    echo '不正な点数です';
} else {
    if ($score == 100) {
        echo '満点おめでとう！';
    } elseif ($score >= 80) {
        echo '素晴らしいです！';
    } elseif ($score >= 60) {
        echo '合格です';
    } else {
        echo '不合格です';
    }
}
