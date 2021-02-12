<?php
/**
 * デフォルトのゲーム設定を保持するスタティックなクラス
 *
 * デフォルトのプレイヤーの色・盤面の数・勝利条件を保持する
 */
class DefaultSetting{

    // 誰も保持していないBoxの色、プレイヤーの色の設定
    protected static $notOwnedColor = "#ccc";
    protected static $defaultP1Color = "#4169e1";
    protected static $defaultP2Color = "#ff6347";
    // 盤面のデフォルト値と最小最大値、勝利条件のデフォルト値と最小最大値
    protected static $defaultSquareNumber = 5;
    protected static $defaultVictoryConditions = 3;
    protected static $minSquareNumber = 5;
    protected static $maxSquareNumber = 11;
    protected static $minVictoryConditions = 3;
    protected static $maxVictoryConditions = 5;

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

    public static function getMinSquareNumber(){
        return self::$minSquareNumber;
    }

    public static function getMaxSquareNumber(){
        return self::$maxSquareNumber;
    }

    public static function getMinVictoryConditions(){
        return self::$minVictoryConditions;
    }

    public static function getMaxVictoryConditions(){
        return self::$maxVictoryConditions;
    }
}
?>