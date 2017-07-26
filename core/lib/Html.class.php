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

    static function groupArray($count, $array) {
        $size = $count;
        $out = array();
        $i = 0;
        foreach ($array as $item) {
            if ($i == $size) {
                $i = 0;
            }
            if (!isset($out[$i])) {
                $out[$i] = array();
            }
            $out[$i][] = $item;
            $i++;
        }
        return $out;
    }

    // ������� ������� ������ � ��������� � ���������
    static function translite($st) {
        // ������� �������� "��������������" ������.
        $st = strtr($st, "������������������������", "abvgdeeziyklmnoprstufh'ie");
        $st = strtr($st, "�����Ũ������������������", "ABVGDEEZIYKLMNOPRSTUFH'IE");
        $st = strtr($st, " /.,%", "_____");

        $st = str_replace('"', '', $st);
        $st = str_replace("'", '', $st);
        // ����� - "���������������".
        $st = strtr($st, array(
            "�" => "zh", "�" => "ts", "�" => "ch", "�" => "sh",
            "�" => "shch", "�" => "", "�" => "yu", "�" => "ya",
            "�" => "ZH", "�" => "TS", "�" => "CH", "�" => "SH",
            "�" => "SHCH", "�" => "", "�" => "YU", "�" => "YA",
            "�" => "i", "�" => "Yi", "�" => "ie", "�" => "Ye"
                )
        );
        // ���������� ���������.
        $st = trim(preg_replace('/_+/', '-', $st), '-');
        return $st;
    }

}
