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
     * @param $gameSetting
     */
    public function __construct( $gameSetting )
    {
        $this->board = array();
        for( $i = 0 ; $i < $gameSetting->getSquareNumber() ; $i++ ){
            // 行数とgameSettingを与えてLineを作る
            $this->board[] = new Line( $i, $gameSetting );
        }
    }

    /**
     * lineオブジェクトの入ったboard配列を取得する
     *
     * @return array $board配列
     */
    public function getBord()
    {
        return $this->board;
    }

    /**
     * 座標オブジェクトからboxを取得する
     *
     * @param object $coordinate
     * @return object $boxオブジェクト
     */
    public function getBox( $coordinate )
    {
        $line = $this->board[ $coordinate->getY() ];
        $box = $line->getLine()[ $coordinate->getX() ];
        return $box;
    }

    /**
     * 座標の値からboxを取得する
     *
     * @param int $x
     * @param int $y
     * @return object $boxオブジェクト
     */
    public function getBoxFromXY( $x, $y )
    {
        $line = $this->board[ $y ];
        $box = $line->getLine()[ $x ];
        return $box;
    }

    /**
     * 座標からboxオブジェクトが持つ座標オブジェクトを返す
     *
     * @param $columnKey
     * @param $lineKey
     * @return object $coordinate
     */
    public function getCoordinate( $columnKey, $lineKey )
    {
        $line = $this->board[ $lineKey ];
        $box = $line->getLine()[ $columnKey ];
        $coordinate = $box->getCoordinate();
        return $coordinate;
    }

    /**
     * 座標からその座標が含まれる$lineオブジェクトを返す
     *
     * @param object $coordinate
     * @return object
     */
    public function getLine( $coordinate )
    {
        $y = $coordinate->getY();
        $line = $this->board[ $y ]->getLine();
        return $line;
    }
}
?>
