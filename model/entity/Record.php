<?php
/**
 * プレイヤーの行動を記録するクラス
 *
 *
 */
class Record{

    private $x;
    private $y;

    public function __construct(){
        $this->x = array();
        $this->y = array();
    }

    /**
     * 盤面の横と縦の行をセットする
     *
     * @param $columnKey
     * @param $lineKey
     */
    public function addRecord( $columnKey, $lineKey){
        $this->x[] = $columnKey;
        $this->y[] = $lineKey;
    }

    /**
     * 最後の行動のx座標を返す
     *
     * @return $columnKey;
     */
    public function getLastXRecord(){
        return $this->x[ array_key_last( $this->x) ];
    }

    /**
     * 最後の行動のy座標を返す
     *
     * @return $lineKey
     */
    public function getLastYRecord(){
        return $this->y[ array_key_last( $this->y ) ];
    }

    /**
     * x座標の配列を返す
     *
     * @return $xArray
     */
    public function getX(){
        return $this->x;
    }

    /**
     * y座標の配列を返す
     *
     * @return $yArray
     */
    public function getY(){
        return $this->y;
    }

}
?>