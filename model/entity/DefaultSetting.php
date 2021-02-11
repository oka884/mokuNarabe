<?php
/**
 * デフォルトのゲーム設定を保持するスタティックなクラス
 *
 * デフォルトのプレイヤーの色・盤面の数・勝利条件を保持する
 */
class DefaultSetting{

    protected static $notOwnedColor = "#ccc";
    protected static $defaultP1Color = "#4169e1";
    protected static $defaultP2Color = "#ff6347";
    protected static $defaultSquareNumber = 5;
    protected static $defaultVictoryConditions = 3;

    public static function getNotOwnedColor(){
        return self::$notOwnedColor;
    }

    public static function getP1Color(){
        return self::$defaultP1Color;
    }

    public static function getP2Color(){
        return self::$defaultP2Color;
    }

    public static function getSquareNumber(){
        return self::$defaultSquareNumber;
    }

    public static function getVictoryConditions(){
        return self::$defaultVictoryConditions;
    }
}
?>