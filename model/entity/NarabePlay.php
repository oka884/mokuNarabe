<?php
/**
 * ゲームのルールに合わせて行動を管理するクラス
 *
 *
 */
class NarabePlay{

    private $turn;

    /**
     * コンストラクタ
     *
     * @param $turn
     */
    public function __construct( $turn ){
        $this->turn = $turn;
    }

    /**
     * プレイヤーの行動によりboxが保持する値を変える
     *
     * @param $box $ボックスオブジェクトを引数に与える
     */
    public function ownSquare( $box ){
        $this->box = $this->turn->whoTurn();

        $this->turn->turnChanges();
    }

    /**
     * 盤面が埋まったかどうかを確認する
     *
     * @param $box $ボードオブジェクトを引数に与える
     * @return bool $埋まっていればtrue 埋まっていなければfalseを返す
     */
    public function checkEnd( $board ){
        foreach( $board->getBoard as $line ){
            foreach( $line->getLine as $box ){
                if( $box->getBox == 0 ){
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
    public function checkVictory( $narabeGame ){
        return false;
    }



    /**
     * 盤面の横の行を確認する
     *
     * @param $narabeGame $オブジェクトnarabeGameを引数に与える
     */
    public function checkLine( $narabeGame ){
        $gameSetting = $narabeGame->getGameSetting();
        $board = $narabeGame->getBoard();
        $turn = $narabeGame->getTurn();
    }

    /**
     * 盤面の縦の列を確認する
     *
     * @param $narabeGame $オブジェクトnarabeGameを引数に与える
     */

    /**
     * 盤面の右肩上がり斜めの列を確認する
     *
     * @param $narabeGame $オブジェクトnarabeGameを引数に与える
     */

    /**
     * 盤面の右肩下がり斜めの列を確認する
     *
     * @param $narabeGame $オブジェクトnarabeGameを引数に与える
     */

}
?>