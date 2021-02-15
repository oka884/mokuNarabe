<?php
/**
 * ボックスのクラス
 *
 * ボックスの値と座標オブジェクトを持つ
 */
class Box
{

    private $box;
    private $coordinate;

    /**
     * コンストラクタ
     *
     * @param $columnKey
     * @param $lineKey
     */
    public function __construct( $columnKey, $lineKey )
    {
        $this->box = 0;
        $this->coordinate = new Coordinate( $columnKey, $lineKey );
    }

    /**
     * 保持している値を返す
     *
     * @return int
     */
    public function getBox()
    {
        return $this->box;
    }

    /**
     * 保持している座標オブジェクトを返す
     *
     */
    public function getCoordinate()
    {
        return $this->coordinate;
    }


    /**
     * 保持する値からカラーコードを返す
     *
     * @param $gameSetting $ゲームセッティングオブジェクトを引数に取る
     * @return $カラーコード
     */
    public function getColor( $gameSetting )
    {
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
     * @return $cssのdisabled属性もしくは空白を返す
     */
    public function getNoneCSS()
    {
        if ( $this->box != 0 ){
            $css = "disabled=\"disabled\" ";
            return $css;
        } else{
            return "";
        }
    }

    /**
     * プレイヤーの行動によりboxが保持する値を変える
     *
     * ターンオブジェクトを引数に与えることでどちらの手番かを判断させる
     *
     * @param object $turn
     */
    public function play($turn)
    {
        $this->box = $turn->whichTurn();
    }

}
