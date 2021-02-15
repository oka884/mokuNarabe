<?php
@session_start();
/**
 * narabe.php
 *
 * クライアントからのリクエストにより処理を振り分ける。メインコントローラー
 */

// entityなどを読み込む
require_once ( dirname(__FILE__). "/../model/entity/propertyDefine.php");
require_once ( dirname(__FILE__). "/../model/entity/Board.php");
require_once ( dirname(__FILE__). "/../model/entity/BoardInspection.php");
require_once ( dirname(__FILE__). "/../model/entity/Box.php");
require_once ( dirname(__FILE__). "/../model/entity/ColorCodeDefinition.php");
require_once ( dirname(__FILE__). "/../model/entity/Coordinate.php");
require_once ( dirname(__FILE__). "/../model/entity/DefaultSetting.php");
require_once ( dirname(__FILE__). "/../model/entity/GameSetting.php");
require_once ( dirname(__FILE__). "/../model/entity/Line.php");
require_once ( dirname(__FILE__). "/../model/entity/NarabeGame.php");
require_once ( dirname(__FILE__). "/../model/entity/NarabePlay.php");
require_once ( dirname(__FILE__). "/../model/entity/Line.php");
require_once ( dirname(__FILE__). "/../model/entity/Record.php");
require_once ( dirname(__FILE__). "/../model/entity/Turn.php");


// 完了フラグ
$is_complete = false;


// リクエストによるLogicへの振り分け
// セッション切れの処理
while (! $is_complete) {
    if (! isset($_SESSION["narabeGame"])) {
        // 開始画面からのリクエストだった場合を例外として除外
        if (isset($_REQUEST["request"])) {
            $requestID = $_REQUEST["request"];
            if ( $requestID == "PN101GameStart" ){
                $is_complete = true;
                break;
            }
        }
        // その他すべてのセッション未所持の処理（最初の来訪含む）
        $requestID = "PN001SessionNone";
        $is_complete = true;
        break;
    }
    break;
}

// セッションがあるクライアントへの処理
while (! $is_complete){
    // セッションを保持しリクエストを持たないクライアントへの処理（再来訪時）
    if ((! isset($_REQUEST["request"])) && isset($_SESSION["narabeGame"]) ){
        $requestID = "PN002ComeBackGame";
        $complete = true;
        break;
    }

    // セッションとリクエストを持つクライアントへの処理（最も基本的な処理）
    if (isset($_REQUEST["request"])) {
        $requestID = $_REQUEST["request"];
        $complete = true;
        break;
    }
    break;
}



require_once ( dirname(__FILE__). "/../model/logic/" . quotemeta($requestID) . "Logic.php");

require_once ( dirname(__FILE__). "/../view/" . $nexView . ".php");

?>
