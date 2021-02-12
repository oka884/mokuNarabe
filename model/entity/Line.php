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
     * @param $lineKey
     * @param $gameSetting
     */
    public function __construct( $lineKey, $gameSetting )
    {
        $this->line = array();
        for( $i = 0 ; $i < $gameSetting->getSquareNumber() ; $i++ ){
            $this->line[] = new Box( $i, $lineKey );
        }
    }

    /**
     * boxオブジェクトが入ったline配列を取得する
     *
     * @return $line配列
     */
    public function getLine()
    {
        return $this->line;
    }
}
?>