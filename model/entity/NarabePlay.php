<?php
/**
 * ゲームのルールに合わせて行動を管理するクラス
 *
 *
 */
class NarabePlay{

    private $narabeGame;
    private $boardInspection;

    /**
     * コンストラクタ
     *
     * @param $narabeGame
     */
    public function __construct( $narabeGame ){
        $this->narabeGame = $narabeGame;

        $this->boardInspection = new BoardInspection;
        $this->boardInspection->inspectionSetting( $narabeGame );
    }


    /**
     * プレイヤーの行動によりboxが保持する値を変える
     *
     * @param $coordinate $ボックスオブジェクトを引数に与える
     */
    public function ownSquare( $coordinate )
    {
        $box = $this->narabeGame->getBoard()->getBox( $coordinate );
        $this->box = $this->narabeGame->getTurn()->whoTurn();

        $this->narabeGame->getTurn()->turnChanges();
    }

    /**
     * 盤面が埋まったかどうかを確認する
     *
     * @param $box $ボードオブジェクトを引数に与える
     * @return bool $埋まっていればtrue 埋まっていなければfalseを返す
     */
    public function checkIsEnd()
    {
        foreach( $this->narabeGame->getBoard()->getBoard() as $line ){
            foreach( $line->getLine() as $box ){
                if( $box->getBox() == 0 ){
                    return false;
                }
            }
        }
        return true;
    }

    /**
     * 勝利条件を満たすかの判断をする
     *
     * @param $narabeGame
     * @return bool
     */
    public function checkIsVictory( $coordinate ){
        $is_win = false;

        $is_win = $this->checkHorizontalLine( $coordinate );
        if ( $is_win ) return $is_win;

        $is_win = $this->checkVerticalLine( $coordinate );
        if ( $is_win ) return $is_win;

        $is_win = $this->checkUpwardLine( $coordinate );
        if ( $is_win ) return $is_win;

        $is_win = $this->checkDownwardLine( $coordinate );
        if ( $is_win ) return $is_win;

        return $is_win;
    }


    /**
     * プレイされた座標から水平の行を確認する
     *
     * 勝利条件を満たしていればture 満たしていなければfalseを返す
     *
     * @param object $coordinate
     * @return bool
     */
    public function checkHorizontalLine( $coordinate ){
        $gameSetting = $this->narabeGame->getGameSetting();
        $board = $this->narabeGame->getBoard();
        $turn = $this->narabeGame->getTurn();

        $line = $board->getLine( $coordinate );

        foreach ( $line->getLine() as $box ){
            $winFlag = 0;

            switch ( $box->getBox() ){
                case $turn->whichTurn() :
                    $winFlag++ ;
                    break ;
                default:
                    $winFlag = 0;
            }

            if ( $winFlag >= $gameSetting->getVictoryConditions() ){
                    return true;
            }
        }
        return false;
    }

    /**
     * プレイされた座標から垂直の列を確認する
     *
     * 勝利条件を満たしていればture 満たしていなければfalseを返す
     *
     * @param object $coordinate
     * @return bool
     */
    public function checkVerticalLine( $coordinate ){
        $gameSetting = $this->narabeGame->getGameSetting();
        $turn = $this->narabeGame->getTurn();

        $line = $this->boardInspection->getVerticalLineOne( $coordinate );

        foreach ( $line as $box ){
            $winFlag = 0;

            switch ( $box->getBox() ){
                case $turn->whichTurn() :
                    $winFlag++ ;
                    break ;
                default:
                    $winFlag = 0;
            }

            if ( $winFlag >= $gameSetting->getVictoryConditions() ){
                return true;
            }
        }
        return false;
    }

    /**
     * プレイされた座標から右上がり斜めの列を確認する
     *
     * 勝利条件を満たしていればture 満たしていなければfalseを返す
     *
     * @param object $coordinate
     * @return bool
     */
    public function checkUpwardLine( $coordinate ){
        $gameSetting = $this->narabeGame->getGameSetting();
        $turn = $this->narabeGame->getTurn();

        $line = $this->boardInspection->getUpwardLineOne( $coordinate );

        foreach ( $line as $box ){
            $winFlag = 0;

            switch ( $box->getBox() ){
                case $turn->whichTurn() :
                    $winFlag++ ;
                    break ;
                default:
                    $winFlag = 0;
            }

            if ( $winFlag >= $gameSetting->getVictoryConditions() ){
                return true;
            }
        }
        return false;
    }

    /**
     * プレイされた座標から右下がり斜めの列を確認する
     *
     * 勝利条件を満たしていればture 満たしていなければfalseを返す
     *
     * @param object $coordinate
     * @return bool
     */
    public function checkDownwardLine( $coordinate ){
        $gameSetting = $this->narabeGame->getGameSetting();
        $turn = $this->narabeGame->getTurn();

        $line = $this->boardInspection->getDownwardLineOne( $coordinate );

        foreach ( $line as $box ){
            $winFlag = 0;

            switch ( $box->getBox() ){
                case $turn->whichTurn() :
                    $winFlag++ ;
                    break ;
                default:
                    $winFlag = 0;
            }

            if ( $winFlag >= $gameSetting->getVictoryConditions() ){
                return true;
            }
        }
        return false;
    }

}
?>