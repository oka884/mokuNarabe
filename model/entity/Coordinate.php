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
     *
     * @return int
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * 縦軸の座標をの値を返す
     *
     * @return int
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * 上の座標のboxを返す。上の座標のboxがなければfalseを返す
     *
     * @param $narabeGame
     * @return object|bool
     * @see GameSetting Board
     */
    public function getUpperBox( $narabeGame )
    {
        $nextY = $this->y - 1;

        $ok = true;
        while ( $ok ){
            if ( $nextY < 0 ){
                $ok = false;
                break;
            }
            if ( $nextY >= $narabeGame->getGameSetting()->getSquareNumber() ){
                $ok = false;
                break;
            }
            break;
        }
        if ( $ok ){
            $box = $narabeGame->getBoard()->getBoxFromXY( $this->x, $nextY );
            return $box;
        } else {
            return false;
        }
    }

    /**
     * 右上の座標のboxを返す。右上の座標のboxがなければfalseを返す
     *
     * @param $narabeGame
     * @return object|bool
     * @see GameSetting Board
     */
    public function getUpperRightBox( $narabeGame )
    {
        $nextX = $this->x + 1;
        $nextY = $this->y - 1;

        $ok = true;
        while ( $ok ){
            if ( $nextX < 0 ){
                $ok = false;
                break;
            }
            if ( $nextX >= $narabeGame->getGameSetting()->getSquareNumber() ){
                $ok = false;
                break;
            }
            if ( $nextY < 0 ){
                $ok = false;
                break;
            }
            if ( $nextY >= $narabeGame->getGameSetting()->getSquareNumber() ){
                $ok = false;
                break;
            }
            break;
        }
        if ( $ok ){
            $box = $narabeGame->getBoard()->getBoxFromXY( $nextX, $nextY );
            return $box;
        } else {
            return false;
        }
    }

    /**
     * 右の座標のboxを返す。右の座標のboxがなければfalseを返す
     *
     * @param $narabeGame
     * @return object|bool
     * @see GameSetting Board
     */
    public function getRightBox( $narabeGame )
    {
        $nextX = $this->x + 1;

        $ok = true;
        while ( $ok ){
            if ( $nextX < 0 ){
                $ok = false;
                break;
            }
            if ( $nextX >= $narabeGame->getGameSetting()->getSquareNumber() ){
                $ok = false;
                break;
            }
            break;
        }
        if ( $ok ){
            $box = $narabeGame->getBoard()->getBoxFromXY( $nextX, $this->y );
            return $box;
        } else {
            return false;
        }
    }

    /**
     * 右下の座標のboxを返す。右下の座標のboxがなければfalseを返す
     *
     * @param $narabeGame
     * @return object|bool
     * @see GameSetting Board
     */
    public function getLowerRightBox( $narabeGame )
    {
        $nextX = $this->x + 1;
        $nextY = $this->y + 1;

        $ok = true;
        while ( $ok ){
            if ( $nextX < 0 ){
                $ok = false;
                break;
            }
            if ( $nextX >= $narabeGame->getGameSetting()->getSquareNumber() ){
                $ok = false;
                break;
            }
            if ( $nextY < 0 ){
                $ok = false;
                break;
            }
            if ( $nextY >= $narabeGame->getGameSetting()->getSquareNumber() ){
                $ok = false;
                break;
            }
            break;
        }
        if ( $ok ){
            $box = $narabeGame->getBoard()->getBoxFromXY( $nextX, $nextY );
            return $box;
        } else {
            return false;
        }
    }

    /**
     * 下の座標のboxを返す。下の座標のboxがなければfalseを返す
     *
     * @param $narabeGame
     * @return object|bool
     * @see GameSetting Board
     */
    public function getLowerBox( $narabeGame )
    {
        $nextY = $this->y + 1;

        $ok = true;
        while ( $ok ){
            if ( $nextY < 0 ){
                $ok = false;
                break;
            }
            if ( $nextY >= $narabeGame->getGameSetting()->getSquareNumber() ){
                $ok = false;
                break;
            }
            break;
        }
        if ( $ok ){
            $box = $narabeGame->getBoard()->getBoxFromXY( $this->x, $nextY );
            return $box;
        } else {
            return false;
        }
    }

    /**
     * 左下の座標のboxを返す。左下の座標のboxがなければfalseを返す
     *
     * @param $narabeGame
     * @return object|bool
     * @see GameSetting Board
     */
    public function getLowerLeftBox( $narabeGame )
    {
        $nextX = $this->x - 1;
        $nextY = $this->y + 1;

        $ok = true;
        while ( $ok ){
            if ( $nextX < 0 ){
                $ok = false;
                break;
            }
            if ( $nextX >= $narabeGame->getGameSetting()->getSquareNumber() ){
                $ok = false;
                break;
            }
            if ( $nextY < 0 ){
                $ok = false;
                break;
            }
            if ( $nextY >= $narabeGame->getGameSetting()->getSquareNumber() ){
                $ok = false;
                break;
            }
            break;
        }
        if ( $ok ){
            $box = $narabeGame->getBoard()->getBoxFromXY( $nextX, $nextY );
            return $box;
        } else {
            return false;
        }
    }

    /**
     * 左の座標のboxを返す。左の座標のboxがなければfalseを返す
     *
     * @param $narabeGame
     * @return object|bool
     * @see GameSetting Board
     */
    public function getLeftBox( $narabeGame )
    {
        $nextX = $this->x - 1;

        $ok = true;
        while ( $ok ){
            if ( $nextX < 0 ){
                $ok = false;
                break;
            }
            if ( $nextX >= $narabeGame->getGameSetting()->getSquareNumber() ){
                $ok = false;
                break;
            }
            break;
        }
        if ( $ok ){
            $box = $narabeGame->getBoard()->getBoxFromXY( $nextX, $this->y );
            return $box;
        } else {
            return false;
        }
    }

    /**
     * 左上の座標のboxを返す。左上の座標のboxがなければfalseを返す
     *
     * @param $narabeGame
     * @return object|bool
     * @see GameSetting Board
     */
    public function getUpperLeftBox( $narabeGame )
    {
        $nextX = $this->x - 1;
        $nextY = $this->y - 1;

        $ok = true;
        while ( $ok ){
            if ( $nextX < 0 ){
                $ok = false;
                break;
            }
            if ( $nextX >= $narabeGame->getGameSetting()->getSquareNumber() ){
                $ok = false;
                break;
            }
            if ( $nextY < 0 ){
                $ok = false;
                break;
            }
            if ( $nextY >= $narabeGame->getGameSetting()->getSquareNumber() ){
                $ok = false;
                break;
            }
            break;
        }
        if ( $ok ){
            $box = $narabeGame->getBoard()->getBoxFromXY( $nextX, $nextY );
            return $box;
        } else {
            return false;
        }
    }

    /**
     * 座標から右上がり斜め直線左端の座標を返す
     *
     * @param object $narabeGame
     * @return object $coordinate
     */
    public function getUpwardLineStartPoint( $narabeGame )
    {
        $squareNumber = $narabeGame->getGameSetting()->getSquareNumber();
        $board = $narabeGame->getBoard();

        if ( $this->x + $this->y < $squareNumber ){
            $startY = $this->y + $this->x;

            $box = $board->getBoxFromXY( 0, $startY );
            $coordinate = $box->getCoordinate();

            return $coordinate;
        } else {
            $startX = $this->x - ( $squareNumber - 1 - $this->y );

            $box = $board->getBoxFromXY( $startX, $squareNumber - 1 );
            $coordinate = $box->getCoordinate();

            return $coordinate;
        }
    }

    /**
     * 座標から右下がり斜め直線左端の座標を返す
     *
     * @param object $narabeGame
     * @return object $coordinate
     */
    public function getDownwardLineStartPoint( $narabeGame )
    {
        $board = $narabeGame->getBoard();

        if ( $this->x >= $this->y ){
            $startX = $this->x - $this->y;

            $box = $board->getBoxFromXY( $startX, 0 );
            $coordinate = $box->getCoordinate();

            return $coordinate;
        } else {
            $startY = $this->y - $this->x;

            $box = $board->getBoxFromXY( 0, $startY );
            $coordinate = $box->getCoordinate();

            return $coordinate;
        }
    }

    /**
     * 座標から水平方向左端の座標を返す
     *
     * @param object $narabeGame
     * @return object $coordinate
     */
    public function getHorizontalLineStartPoint( $narabeGame )
    {
        $board = $narabeGame->getBoard();

        $box = $board->getBoxFromXY( 0, $this->y );
        $coordinate = $box->getCoordinate();

        return $coordinate;
    }

    /**
     * 座標から垂直方向上端の座標を返す
     *
     * @param object $narabeGame
     * @return object $coordinate
     */
    public function getVerticalLineStartPoint( $narabeGame )
    {
        $board = $narabeGame->getBoard();

        $box = $board->getBoxFromXY( $this->x, 0 );
        $coordinate = $box->getCoordinate();

        return $coordinate;
    }

}
