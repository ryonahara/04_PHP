<?php

class Validation
{

    /**
     * 入力された氏名の判定結果を元にエラーメッセージを返す
     *
     * @param string|null $name
     * @return string|null
     */
    public function validName(?string $name): ?string
    {
        if (empty($name)) {
            return '※氏名を入力してください';
        } elseif (mb_strlen($name, 'utf8') > 10) {
            return '※氏名10文字以内で入力してください';
        } else {
            return NULL;
        }
    }


    /**
     * 入力された年齢の判定結果を元に空値かエラーメッセージの配列を返す
     *
     * @param string|null $age
     * @return array
     */
    public function validAge(?string $age): ?array
    {
        /* 初期化 */
        $res['err'] = '';

        if ($age === '' || mb_ereg_match('/^(\s|　)+$/', $age)) {
            $res['age'] = null;
        } elseif (!is_numeric($age) || $age < 0) {
            /* 判定に引っかかっても値をそのまま返す */
            $res['age'] = $age;
            $res['err'] = '※年齢は0以上の数値を入力してください';
        } else {
            /* 成功時 */
            $res['age'] = $age;
            $res['err'] = null;
        }
        return $res;
    }
}
