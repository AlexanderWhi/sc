<?php

class Html {

    static function encode($str) {
        return my_htmlspecialchars($str);
    }

    static function splitArray($size, $array) {
        $out = array();
        $i = 0;
        foreach ($array as $item) {
            if (!isset($out[$i])) {
                $out[$i] = array();
            }
            $out[$i][] = $item;
            if (count($out[$i]) == $size) {
                $i++;
            }
        }
        return $out;
    }

    // функция превода текста с кириллицы в траскрипт
    static function translite($st) {
        // Сначала заменяем "односимвольные" фонемы.
        $st = strtr($st, "абвгдеёзийклмнопрстуфхъыэ", "abvgdeeziyklmnoprstufh'ie");
        $st = strtr($st, "АБВГДЕЁЗИЙКЛМНОПРСТУФХЪЫЭ", "ABVGDEEZIYKLMNOPRSTUFH'IE");
        $st = strtr($st, " /.,%", "_____");

        $st = str_replace('"', '', $st);
        $st = str_replace("'", '', $st);
        // Затем - "многосимвольные".
        $st = strtr($st, array(
            "ж" => "zh", "ц" => "ts", "ч" => "ch", "ш" => "sh",
            "щ" => "shch", "ь" => "", "ю" => "yu", "я" => "ya",
            "Ж" => "ZH", "Ц" => "TS", "Ч" => "CH", "Ш" => "SH",
            "Щ" => "SHCH", "Ь" => "", "Ю" => "YU", "Я" => "YA",
            "ї" => "i", "Ї" => "Yi", "є" => "ie", "Є" => "Ye"
                )
        );
        // Возвращаем результат.
        $st = trim(preg_replace('/_+/', '-', $st), '-');
        return $st;
    }

}
