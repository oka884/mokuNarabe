<?php
/**
 * 盤面のクラス
 *
 *
 */
class Board{

    private $board;

    /**
     * コンストラクタ
     *
     * GameSettingオブジェクトを引数に取る
     */
    public function __construct( $gameSetting ){
        $this->board = array();
        for( $i = 0 ; $i < $gameSetting->getSquareNumber() ; $i++ ){
            $this->board[] = new Line( $gameSetting );
        }
    }

    /**
     * lineオブジェクトの入ったboard配列を取得する
     *
     * @return $board配列
     */
    public function getBord(){
        return $this->board;
    }

    /**
     * 座標からboxを取得する
     *
     * @param $lineKey $行の座標
     * @param $columnKey $列の座標
     * @return $boxオブジェクト
     */
    public function getBoxFromBord($lineKey, $columnKey){
        $line = $this->board[$lineKey];
        $box = $line->getLine()[$columnKey];
        return $box;
    }
}
?>