<?php
/**
 * カラーコードの配列を2本持つスタティックなクラス
 *
 * クライアントから送られてくるカラーコードと、それに対応する16進数カラーコードの配列を持つ
 */
class ColorCodeDefinition{

    private static $localColorCode = array(
        "c01", "c02", "c03" ,"c04"
    );

    private static $hexColorCode = array(
        "#4169e1", "#ff6347", "#3cb371", "#ffd700"
    );

    public static function getLocalColorCode(){
        return self::$localColorCode;
    }

    public static function getHexColorCode(){
        return self::$hexColorCode;
    }
}
?>