<?php

//2022年2月末日
$d1 = new DateTime('last day of February 2022');

//現在時刻の10日前
$d2 = new DateTime('today');
$d2->modify('-10 days');

//差を算出
$interval = $d1->diff($d2);
$days = $interval->days;

//曜日の取得と和製の日付に変換
$jpd1 = getJpDate($d1);
$jpd2 = getJpDate($d2);

//結果を出力
$invert = $interval->invert;
if ($days == 0) {
    echo '日付は同じです';
} else {
    if ($invert == 1) {
        echo $jpd1 . 'の方が「' . $days . '日分」' . $jpd2 . 'より新しいです';
    } else {
        echo $jpd2 . 'の方が「' . $days . '日分」' . $jpd1 . 'より新しいです';
    }
}

/**
 * 曜日を取得し、和製の日付の文字列を返す
 *
 * @param object|null $d
 * @return string
 */
function getJpDate(?object $d): string
{
    //曜日の取得
    $weekday = ['日', '月', '火', '水', '木', '金', '土'];
    $w = $weekday[$d->format('w')];

    //文字列結合
    $jpDate = $d->format('Y年m月d日') . '(' . $w . ')';

    return $jpDate;
}
