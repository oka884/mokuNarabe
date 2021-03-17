<?php
/**
 * ワンゲームごとの設定を保持させる
 *
 * コンストラクタでは引数を取らず、セッターで検査をしながら設定を入力する
 * 行数は長いがセッターとゲッターしかない
 */
class GameSetting{

    private $p1Color;
    private $p2Color;
    private $p1AccentColor;
    private $p2AccentColor;
    private $squareNumber;
    private $victoryConditions;

    /**
     * コンストラクタ
     *
     * スタティックなDefaultSettingを参照しオブジェクトを作る
     */
    public function __construct(){
        $this->p1Color = DefaultSetting::getP1Color();
        $this->p2Color = DefaultSetting::getP2Color();
        $this->p1AccentColor = DefaultSetting::getP1AccentColor();
        $this->p2AccentColor = DefaultSetting::getP2AccentColor();
        $this->squareNumber = DefaultSetting::getSquareNumber();
        $this->victoryConditions = DefaultSetting::getVictoryConditions();
    }

    /**
     * p1Colorのセッター
     *
     * @param $p1Color
     * @todo カラーコードと一致するかの検索はColorCodeDefinitionクラスにメソッドを作ったほうがよい
     */
    public function setP1Color( $getP1Color ){
        $p1Color = quotemeta( $getP1Color );
        $hexP1Color = "";
        $hexP1AccentColor = "";
        $ok = true;
        // カラーコード設定を回し、一致するものがあればその16進数コードを代入する
        if( $ok ){
            foreach ( ColorCodeDefinition::getLocalColorCode() as $key => $value ){
                if( $p1Color == $value ){
                    $hexP1Color = ColorCodeDefinition::getHexColorCode()[$key];
                    $hexP1AccentColor = ColorCodeDefinition::getHexAccentColorCode()[$key];
                    $ok = true;
                    break;
                }else{
                    $ok = false;
                }
            }
        }
        if( $ok ){
            $this->p1Color = $hexP1Color;
            $this->p1AccentColor = $hexP1AccentColor;
            return true;
        }else {
            return false;
        }
    }

    /**
     * p2Colorのセッター
     *
     * @param $p2Color
     * @todo カラーコードと一致するかの検索はColorCodeDefinitionクラスにメソッドを作ったほうがよい
     */
    public function setP2Color( $getP2Color ){
        $p2Color = quotemeta( $getP2Color );
        $hexP2Color = "";
        $hexP2AccentColor = "";
        $ok = true;
        // カラーコード設定を回し、一致するものがあればその16進数コードを代入する
        if( $ok ){
            foreach ( ColorCodeDefinition::getLocalColorCode() as $key => $value ){
                if( $p2Color == $value ){
                    $hexP2Color = ColorCodeDefinition::getHexColorCode()[$key];
                    $hexP2AccentColor = ColorCodeDefinition::getHexAccentColorCode()[$key];
                    $ok = true;
                    break;
                }else{
                    $ok = false;
                }
            }
        }
        if( $ok ){
            $this->p2Color = $hexP2Color;
            $this->p2AccentColor = $hexP2AccentColor;
            return true;
        }else {
            return false;
        }
    }

    /**
     * squareNumberのセッター
     *
     * @param $squareNumber
     */
    public function setSquareNumber( $getSquareNumber ){
        $squareNumber = quotemeta( $getSquareNumber );
        $ok = true;
        $ok = is_numeric( $squareNumber );
        // 盤面の最小最大値の範囲内であることの確認（三項演算子を使っている）
        if( $ok ){
            $ok = $squareNumber >= DefaultSetting::getMinSquareNumber() ? true : false ;
            $ok = $getSquareNumber <= DefaultSetting::getMaxSquareNumber() ? true : false ;
        }
        if( $ok ){
            $this->squareNumber = $squareNumber;
            return true;
        }else {
            return false;
        }
    }

    /**
     * victoryConditionsのセッター
     *
     * @param $victoryConditions
     */
    public function setVictoryConditions( $getVictoryConditions ){
        $victoryConditions = quotemeta( $getVictoryConditions );
        $ok = true;
        $ok = is_numeric( $victoryConditions );
        // 勝利条件のの最小最大値の範囲内であることの確認（三項演算子を使っている）
        if( $ok ){
            $ok = $victoryConditions >= DefaultSetting::getMinVictoryConditions() ? true : false;
            $ok = $victoryConditions <= DefaultSetting::getMaxVictoryConditions() ? true : false;
        }
        if( $ok ){
            $this->victoryConditions = $victoryConditions;
            return true;
        }else {
            return false;
        }
    }

    /**
     * p1Colorを返す
     *
     */
    public function getP1Color(){
        return $this->p1Color;
    }

    /**
     * p2Colorを返す
     *
     */
    public function getP2Color(){
        return $this->p2Color;
    }

    /**
     * p1AccentColorを返す
     */
    public function getP1AccentColor(){
        return $this->p1AccentColor;
    }

    /**
     * p2AccentColorを返す
     */
    public function getP2AccentColor(){
        return $this->p2AccentColor;
    }

    /**
     * squareNumberを返す
     *
     */
    public function getSquareNumber(){
        return $this->squareNumber;
    }

    /**
     * victoryConditionsを返す
     *
     */
    public function getVictoryConditions(){
        return $this->victoryConditions;
    }


    /**
     * 指定された座標がゲーム設定の範囲内かをbooleanで返す
     *
     * プレイヤーが盤面操作時、入力された座標を検査する目的で利用する
     *
     * @param int $columnKey
     * @param int $lineKey
     * @return bool
     */
    public function checkCoordinate( $getColumnKey, $getLineKey )
    {
        $columnKey = quotemeta( $getColumnKey);
        $lineKey = quotemeta( $getLineKey );

        $ok = true;
        $ok = is_numeric( $columnKey );
        $ok = is_numeric( $lineKey );

        if ( $ok ){
            $ok = $columnKey >= 0 ? true : false;
            $ok - $columnKey < $this->getSquareNumber() ? true : false;
        }
        if ( $ok ){
            $ok = $lineKey >= 0 ? true : false;
            $ok = $lineKey < $this->getSquareNumber() ? true : false;
        }

        return $ok;
    }
}
?>
