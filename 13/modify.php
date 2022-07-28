<?php

$weekday = ['日', '月', '火', '水', '木', '金', '土'];


//2022年2月末日
$d1 = new DateTime('last day of February 2022');
$w1 = $weekday[$d1->format('w')];

//現在時刻の10日前
$d2 = new DateTime('today');
$d2->modify('-10 days');
$w2 = $weekday[$d2->format('w')];

//差を算出
$interval = $d1->diff($d2);
$days = $interval->days;


//結果を出力
$invert = $interval->invert;
if ($days == 0) {
    echo '日付は同じです';
} else {
    if ($invert == 1) {
        echo $d1->format('Y年m月d日') . '(' . $w1 .')曜日' . 'の方が「' . $days . '日分」' . $d2->format('Y年m月d日') . '(' . $w2 .')曜日' . 'より新しいです';
    } else {
        echo $d2->format('Y年m月d日') . '(' . $w2 .')曜日' . 'の方が「' . $days . '日分」' . $d1->format('Y年m月d日') . '(' . $w1 .')曜日' . 'より新しいです';
    }
}
