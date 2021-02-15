<?php
/**
 * 検査のクラス
 *
 * 盤面の縦・左斜・右斜を配列にし、検査する
 */
class BoardInspection
{

    private $verticalLines;
    private $upwardLines;
    private $downwardLines;

    /**
     * コンストラクタ
     *
     */
    public function __construct()
    {
        $this->verticalLines = array();
        $this->upwardLines = array();
        $this->downwardLines = array();
    }

    /**
     * 検査用の配列をまとめて作るメソッド
     *
     * @param $narabeGame
     */
    public function inspectionSetting( $narabeGame )
    {
        $this->setVerticalLines( $narabeGame );
        $this->setUpwardLines( $narabeGame );
        $this->setDownwardLines( $narabeGame );
    }

    /**
     * 垂直方向の配列のセッター
     *
     * @param $narabeGame
     */
    public function setVerticalLines( $narabeGame )
    {
        $gameSetting = $narabeGame->getGameSetting();
        $board = $narabeGame->getBoard();

        $i = 0;

        while ( $i < $gameSetting->getSquareNumber() ){
            $box = $board->getBoxFromXY( $i, 0 );

            $this->verticalLines[$i] = array();
            $this->verticalLines[$i][] = $box;

            do {
                $coordinate = $box->getCoordinate();
                $box = $coordinate->getLowerBox( $narabeGame );

                if ( $box ){
                    $this->verticalLines[$i][] = $box;
                }
            } while ( $box );

            $i++;
        }
    }

    /**
     * 右上がり斜め配列のセッター
     *
     * 盤面の左上から順に斜め方向を配列にしていくイメージ
     *
     * @param $narabeGame
     */
    public function setUpwardLines( $narabeGame )
    {
        $gameSetting = $narabeGame->getGameSetting();
        $squareNumber = $gameSetting->getSquareNumber();
        $board = $narabeGame->getBoard();

        $yKey = 0;
        $xKey = 1;
        $i = 0;

        while ( $yKey < $squareNumber ){
            $box = $board->getBoxFromXY( 0, $yKey );

            $this->upwardLines[$i] = array();
            $this->upwardLines[$i][] = $box;

            do {
                $coordinate = $box->getCoordinate();
                $box = $coordinate->getUpperRightBox( $narabeGame );

                if ( $box ){
                    $this->upwardLines[$i][] = $box;
                }
            } while ( $box );

            $yKey++;
            $i++;
        }

        while ( $xKey < $squareNumber ){
            $box = $board->getBoxFromXY( $xKey, $squareNumber - 1 );

            $this->upwardLines[$i] = array();
            $this->upwardLines[$i][] = $box;

            do {
                $coordinate = $box->getCoordinate();
                $box = $coordinate->getUpperRightBox( $narabeGame );

                if ( $box ){
                    $this->upwardLines[$i][] = $box;
                }
            } while ( $box );

            $xKey++;
            $i++;
        }
    }

    /**
     * 右下がり斜め配列のセッター
     *
     * 盤面の右上から順に配列にしていくイメージ
     *
     * @param $narabeGame
     */
    public function setDownwardLines( $narabeGame )
    {
        $gameSetting = $narabeGame->getGameSetting();
        $squareNumber = $gameSetting->getSquareNumber();
        $board = $narabeGame->getBoard();

        $xKey = $squareNumber - 1;
        $yKey = 1;
        $i = 0;

        while ( $xKey >= 0 ){
            $box = $board->getBoxFromXY( $xKey, 0 );

            $this->downwardLines[$i] = array();
            $this->downwardLines[$i][] = $box;

            do {
                $coordinate = $box->getCoordinate();
                $box = $coordinate->getLowerRightBox( $narabeGame );

                if ( $box ){
                    $this->downwardLines[$i][] = $box;
                }
            } while ( $box );

            $xKey--;
            $i++;
        }

        while ( $yKey < $squareNumber ){
            $box = $board->getBoxFromXY( 0, $yKey );

            $this->downwardLines[$i] = array();
            $this->downwardLines[$i][] = $box;

            do {
                $coordinate = $box->getCoordinate();
                $box = $coordinate->getLowerRightBox( $narabeGame );

                if ( $box ){
                    $this->downwardLines[$i][] = $box;
                }
            } while ( $box );

            $yKey++;
            $i++;
        }
    }

    /**
     * 垂直方向の配列を返す
     *
     * @return array
     */
    public function getVerticalLines()
    {
        return $this->verticalLines;
    }

    /**
     * 右上がり斜め方向の配列を返す
     *
     * @return array
     */
    public function getUpwardLines()
    {
        return $this->upwardLines;
    }

    /**
     * 右下がり斜め方向の配列を返す
     *
     * @return array
     */
    public function getDownwardLines()
    {
        return $this->downwardLines;
    }

    /**
     * 座標からその座標が含まれる垂直方向の配列一本を返す
     *
     * @param object $coordinate
     * @return array
     */
    public function getVerticalLineOne( $coordinate )
    {
        $x = $coordinate->getX();
        $verticalLine = $this->verticalLines[ $x ];
        return $verticalLine;
    }

    /**
     * 座標からその座標が含まれる右上がり方向の配列一本を返す
     *
     * @param object $coordinate
     * @param object $narabeGame
     * @return array
     */
    public function getUpwardLineOne( $coordinate, $narabeGame )
    {
        $startCoordinate = $coordinate->getUpwardLineStartPoint( $narabeGame );
        $key = $startCoordinate->getX() + $startCoordinate->getY();
        $upwardLine = $this->upwardLines[ $key ];

        return $upwardLine;
    }

    /**
     * 座標からその座標が含まれる右下がり方向の配列一本を返す
     *
     * @param object $coordinate
     * @param object $narabeGame
     * @return array
     */
    public function getDownwardLineOne( $coordinate, $narabeGame )
    {
        $startCoordinate = $coordinate->getDownwardLineStartPoint( $narabeGame );
        $verticalLastKey = array_key_last( $this->verticalLines );

        switch ( $startCoordinate->getY() ){
            case 0:
                $key = $verticalLastKey - $startCoordinate->getX();
                $downwardLine = $this->downwardLines[ $key ];
                return $downwardLine;
                break;

            default:
                $key = $verticalLastKey + $startCoordinate->getY();
                $downwardLine = $this->downwardLines[ $key ];
                return $downwardLine;
        }
    }


}