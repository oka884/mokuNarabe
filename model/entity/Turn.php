<?php
/**
 * 全プレイヤーの総ターン数を保持し、管理をするクラス
 *
 * 初期値は1
 */
class Turn{

    private $count;

    /**
     * コンストラクタ
     *
     */
    public function __construct(){
        $this->count = 1;
    }

    /**
     * 総ターン数を取得する
     *
     */
    public function getCount(){
        return $this->count;
    }

    /**
     * ターン数を取得する
     *
     */
    public function getTurn(){
        $turn = ceil( $this->count / 2 );
        return $turn;
    }

    /**
     * 誰のターンなのかをプレイヤーナンバーで返す
     *
     *
     * @return int
     */
    public function whichTurn(){
        if( $this->count % 2 != 0 ){
            return 1;
        } else {
            return 2;
        }
    }

    /**
     * プレイヤーターン終了のメソッド
     *
     */
    public function turnChanges(){
        $this->count++;
    }
}
?>