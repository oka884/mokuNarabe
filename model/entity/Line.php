<?php
/**
 * 行のクラス
 *
 *
 */
class Line{

    private $line;

    /**
     * コンストラクタ
     *
     * @param $gameSetting GameSettingオブジェクトを引数に取る
     */
    public function __construct( $gameSetting ){
        $this->line = array();
        for( $i = 0 ; $i < $gameSetting->getSquareNumber() ; $i++ ){
            $this->line[] = new Box();
        }
    }

    /**
     * boxオブジェクトが入ったline配列を取得する
     *
     * @return $line配列
     */
    public function getLine(){
        return $this->line;
    }
}
?>