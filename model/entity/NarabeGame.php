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
    private $record;

    /**
     * セッター
     *
     * @param $gameSetting
     * @param $board
     * @param $turn
     * @param $record
     */
    public function setAll( $gameSetting, $board, $turn, $record){
        $this->gameSettinig = $gameSetting;
        $this->board = $board;
        $this->turn =  $turn;
        $this->record = $record;
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
     * recordのセッター
     *
     * @param $record
     */
    public function setRecord( $record ){
        $this->record = $record;
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

    /**
     * recordオブジェクトを返す
     *
     */
    public function getRecord(){
        return $this->record;
    }
}
?>