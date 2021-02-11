<?php
/**
 * ワンゲームごとの設定を保持させる
 *
 * コンストラクタでは引数を取らず、セッターで検査をしながら設定を入力する
 * 行数は長いが単純なセッターとゲッターしかない
 */
class GameSetting{

    private $p1Color;
    private $p2Color;
    private $squareNumber;
    private $victoryConditions;

    /**
     * コンストラクタ
     *
     * スタティックなDefaultSettingを参照しオブジェクトを作る
     */
    public function __construct(){
        $this->p1Color = DefaultSetting::getP1Color();
        $this->p2Color = DefaultSetting::getP2Color();
        $this->squareNumber = DefaultSetting::getSquareNumber();
        $this->victoryConditions = DefaultSetting::getVictoryConditions();
    }

    /**
     * p1Colorのセッター
     *
     * @param $p1Color
     */
    public function setP1Color( $getP1Color ){
        $p1Color = quotemeta( $getP1Color );
        $hexP1Color = "";
        $ok = true;
        // カラーコード設定を回し、一致するものがあればその16進数コードを代入する
        if( $ok ){
            foreach ( ColorCodeDefinition::getLocalColorCode() as $key => $value ){
                if( $p1Color == $value ){
                    $hexP1Color = ColorCodeDefinition::getHexColorCode()[$key];
                    $ok = true;
                    break;
                }else{
                    $ok = false;
                }
            }
        }
        if( $ok ){
            $this->p1Color = $hexP1Color;
            return true;
        }else {
            return false;
        }
    }

    /**
     * p2Colorのセッター
     *
     * @param $p2Color
     */
    public function setP2Color( $getP2Color ){
        $p2Color = quotemeta( $getP2Color );
        $hexP2Color = "";
        $ok = true;
        // カラーコード設定を回し、一致するものがあればその16進数コードを代入する
        if( $ok ){
            foreach ( ColorCodeDefinition::getLocalColorCode() as $key => $value ){
                if( $p2Color == $value ){
                    $hexP2Color = ColorCodeDefinition::getHexColorCode()[$key];
                    $ok = true;
                    break;
                }else{
                    $ok = false;
                }
            }
        }
        if( $ok ){
            $this->p2Color = $hexP2Color;
            return true;
        }else {
            return false;
        }
    }

    /**
     * squareNumberのセッター
     *
     * @param $squareNumber
     */
    public function setSquareNumber( $getSquareNumber ){
        $squareNumber = quotemeta( $getSquareNumber );
        $ok = true;
        $ok = is_numeric( $squareNumber );
        // 5以上、11以下であることの確認
        if( $ok ){
            $ok = $squareNumber > 4 && $getSquareNumber < 12 ? true : false ;
        }
        if( $ok ){
            $this->squareNumber = $squareNumber;
            return true;
        }else {
            return false;
        }
    }

    /**
     * victoryConditionsのセッター
     *
     * @param $victoryConditions
     */
    public function setVictoryConditions( $getVictoryConditions ){
        $victoryConditions = quotemeta( $getVictoryConditions );
        $ok = true;
        $ok = is_numeric( $victoryConditions );
        // 3以上、5以下であることの確認
        if( $ok ){
            $ok = $victoryConditions > 2 && $victoryConditions < 6 ? true : false;
        }
        if( $ok ){
            $this->victoryConditions = $victoryConditions;
            return true;
        }else {
            return false;
        }
    }

    /**
     * p1Colorを返す
     *
     */
    public function getP1Color(){
        return $this->p1Color;
    }

    /**
     * p2Colorを返す
     *
     */
    public function getP2Color(){
        return $this->p2Color;
    }

    /**
     * squareNumberを返す
     *
     */
    public function getSquareNumber(){
        return $this->squareNumber;
    }

    /**
     * victoryConditionsを返す
     *
     */
    public function getVictoryConditions(){
        return $this->victoryConditions;
    }

}
?>
