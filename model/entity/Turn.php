<?php
/**
 * ターン情報を保持し管理をするクラス
 *
 * 初期値は1
 */
class Turn{

    private $turn;

    /**
     * コンストラクタ
     *
     */
    public function __construct(){
        $this->turn = 1;
    }

    /**
     * ターン数を取得する
     *
     */
    public function getTurn(){
        return $this->turn;
    }

    /**
     * p1のターンかどうかをBooleanで返す
     *
     * ただどちらのターンかの判定がしたいだけだが、p1を基準にBooleanで返している
     *
     * @return $Booleanを返す
     */
    public function whichTurn(){
        if( $this->turn % 2 != 0 ){
            return true;
        } else {
            return false;
        }
    }

    /**
     * ターン進行のメソッド
     *
     */
    public function turnChanges(){
        $this->turn++;
    }
}
?>