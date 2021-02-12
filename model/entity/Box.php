<?php
/**
 * ボックスのクラス
 *
 * 0・1・2のいずれかの値を保持し、それぞれ オーナーなし・P1・P2 のものとする。
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
     * 保持している値を返す
     *
     */
    public function getBox(){
        return $this->box;
    }


    /**
     * 保持する値からカラーコードを返す
     *
     * @param $gameSetting $ゲームセッティングオブジェクトを引数に取る
     * @return $カラーコード
     */
    public function getColor( $gameSetting ){
        if( $this->box == 1 ){
            return $gameSetting->getP1Color();
        } elseif( $this->box == 2 ){
            return $gameSetting->getP2Color();
        } else {
            return DefaultSetting::getNotOwnedColor();
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