<?php

/**
 * 座標のクラス
 *
 * 実際のプレイ画面の表示では左上を0とし右下に向かって値が大きくなる。イメージとしては第四象限
 */
class Coordinate
{

    private $x;
    private $y;

    /**
     * コンストラクタ
     * 
     * @param $columnKey
     * @param $lineKey
     */
    public function __construct( $columnKey, $lineKey )
    {
        $this->x = $columnKey;
        $this->y = $lineKey;
    }

    /**
     * 横軸の座標の値を返す
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * 縦軸の座標をの値を返す
     */
    public function getY()
    {
        return $this->y;
    }

}
