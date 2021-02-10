<?php
/**
 * propertyDefine.php
 * 変数定義用フォルダだが現代はすべてのクラス定義も入っている
 */
$lineKey = null;
$columnKey = null;


/**
 * 設定を保持するスタティックなクラス
 *
 * プレイヤーの色・盤面の数を保持する
 */
class Configu{

    public static $p1Color = "#4169e1";
    public static $p2Color = "#ff6347";
    public static $squareNumber = 5;
}


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
     * どちらのターンであるかの判定をp1を基準にBooleanで返す
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
     */
    public function __construct(){
        $this->board = array();
        for( $i = 0 ; $i < Configu::$squareNumber ; $i++ ){
            $this->board[] = new Line();
        }
    }

    /**
     * lineオブジェクトの入ったboard配列を取得する
     *
     * @return $board配列
     */
    public function getBord(){
        return $this->board;
    }

    /**
     * 座標からboxを取得する
     *
     * @param $lineKey $行の座標
     * @param $columnKey $列の座標
     * @return $boxオブジェクト
     */
    public function getBoxFromBord($lineKey, $columnKey){
        $line = $this->board[$lineKey];
        $box = $line->getLine()[$columnKey];
        return $box;
    }
}


/**
 * 行のクラス
 *
 *
 */
class Line{

    private $line;

    /**
     * コンストラクタ
     *
     */
    public function __construct(){
        $this->line = array();
        for( $i = 0 ; $i < Configu::$squareNumber ; $i++ ){
            $this->line[] = new Box();
        }
    }

    /**
     * boxオブジェクトが入ったline配列を取得する
     *
     * @return $line配列
     */
    public function getLine(){
        return $this->line;
    }
}


/**
 * ボックスのクラス
 *
 *
 */
class Box{

    private $box;

    /**
     * コンストラクタ
     *
     */
    public function __construct(){
        $this->box = 0;
    }

    /**
     * 保持する値からカラーコードを返す
     *
     * @return $カラーコード
     */
    public function getColor(){
        if( $this->box == 1 ){
            return Configu::$p1Color;
        } elseif( $this->box == 2 ){
            return Configu::$p2Color;
        } else {
            return "#ccc";
        }
    }

    /**
     * すでにどちらかのプレイヤーの物になっている時boxのリンクを無効にする
     *
     * 1か2が入ってる時htmlにdisabled属性を設定する
     *
     * @return $disabled属性もしくは空白を返す
     */
    public function getNoneCSS(){
        if ( $this->box != 0 ){
            return "disabled=\"disabled\" ";
        } else{
            return "";
        }
    }

    /**
     * プレイヤーの行動によりboxが保持する値を変える
     *
     * ターンオブジェクトを引数に与えることでどちらの手番かを判断させる
     *
     * @param $turn $ターンオブジェクトを引数に与える
     */
    public function play($turn){
        if( $turn->whichTurn() ){
            $this->box = 1;
        } else {
            $this->box = 2;
        }
        $turn->turnChanges();
    }

}


?>