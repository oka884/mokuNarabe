<?php
/**
 * ゲームのクラス
 *
 * gameSetting,board,turn のオブジェクトを保持するクラス
 * ほぼセッターとゲッターだけ
 */
class NarabeGame{

    private $gameSettinig;
    private $board;
    private $turn;

    /**
     * セッター
     *
     * @param $gameSetting
     * @param $board
     * @param $turn
     */
    public function setAll( $gameSetting, $board, $turn){
        $this->gameSettinig = $gameSetting;
        $this->board = $board;
        $this->turn =  $turn;
    }

    /**
     * gameSettingのセッター
     *
     * @param $gameSetting
     */
    public function setGameSetting( $gameSetting ){
        $this->gameSettinig = $gameSetting;
    }

    /**
     * boardのセッター
     *
     * @param $board
     */
    public function setBoard( $board ){
        $this->board = $board;
    }

    /**
     * turnのセッター
     *
     * @param $turn
     */
    public function setTurn( $turn ){
        $this->turn = $turn;
    }

    /**
     * gameSettingオブジェクトを返す
     *
     */
    public function getGameSetting(){
        return $this->gameSettinig;
    }

    /**
     * bordオブジェクトを返す
     *
     */
    public function getBoard(){
        return $this->board;
    }

    /**
     * turnオブジェクトを返す
     *
     */
    public function getTurn(){
        return $this->turn;
    }
}
?>