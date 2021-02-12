<?php

/**
 * プレイヤーの行動を記録するクラス
 *
 * 座標オブジェクトを配列で保持する
 */
class Record
{

    private $record;

    /**
     * コンストラクタ
     *
     */
    public function __construct()
    {
        $this->record = array();
    }

    /**
     * 配列の最後にcoodinateオブジェクトを追加する
     *
     * @param $coordinate
     */
    public function addRecord( $coordinate )
    {
        $this->record[] = $coordinate;
    }

    /**
     * 最後の行動の座標オブジェクトを返す
     *
     * @return $columnKey;
     */
    public function getLastRecord()
    {
        $coordinate = $this->record[array_key_last($this->record)];
        return $coordinate;
    }

    /**
     * レコード配列そのものを返す
     *
     * @return $record
     */
    public function getRecord()
    {
        return $this->record;
    }

}
