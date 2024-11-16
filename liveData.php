<?php
    require("connector.php");
    session_start();
    

    $CUID = $_SESSION["CUID"] ?? -1;
    $sql = "SELECT * FROM Logs LEFT JOIN UserInfo ON Logs.CUID = UserInfo.CUID LEFT JOIN Users ON UserInfo.AddharNumber = Users.ADDHAR WHERE Logs.CUID='$CUID'  ORDER BY TID DESC LIMIT 1;";
    $res = $conn->query($sql)->fetch_assoc();
    $JSONToSend = new stdClass();
    $JSONToSend->CUID = $res['CUID'];
    $JSONToSend->Alcohol = $res['Alcohol'];
    $JSONToSend->Sleeping = $res['Sleeping'];
    $JSONToSend->HoldingWheel = $res['HoldingWheel'];
    $JSONToSend->Score = $res['Score'];
    $JSONToSend->Name = $res['Name'];
    $JSONToSend->PHN = $res['PhoneNumber'];
    $JSONToSend->Age = $res['AGE'];
    $myJSON = json_encode($JSONToSend);
    header('Content-Type:application/json; charset=UTF-8');
    echo $myJSON;
?>