<?php
require 'connector.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ADDHAR = isset($_POST['ADDHAR']) ? htmlspecialchars($_POST['ADDHAR']) : null;
    $PWD = isset($_POST['PWD']) ? htmlspecialchars($_POST['PWD']) : null;
    $CUID = isset($_POST['CUID']) ? htmlspecialchars($_POST['CUID']) : null;
    $Sleeping = isset($_POST['Sleeping']) ? htmlspecialchars($_POST['Sleeping']) : null;
    $AlcoholPresence = isset($_POST['AlcoholPresence']) ? htmlspecialchars($_POST['AlcoholPresence']) : null;
    $HoldingWheel = isset($_POST['HoldingWheel']) ? htmlspecialchars($_POST['HoldingWheel']) : null;
    $Score = isset($_POST['Score']) ? htmlspecialchars($_POST['Score']) : 0;
    if (!$ADDHAR || !$PWD) {
        echo "Can not login. <br> Empty feilds";
        die();
    }

    $sql = "SELECT * FROM Users LEFT JOIN UserInfo ON Users.ADDHAR = UserInfo.AddharNumber WHERE Users.ADDHAR= ? AND PWD= ? AND UserInfo.CUID = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        echo "Error in preparing the statement." . $conn->error;
        die();
    }
    $stmt->bind_param("sss", $ADDHAR, $PWD,$CUID);
    if (!$stmt->execute()) {
        echo "Error executing the statement: " . $stmt->error;
        die();
    }
    #echo $sql;
    $res = $stmt->get_result();
    if ($res === false) {
        echo "Error in getting the result: " . $stmt->error;
        die();
    }
    $rowe = $res->fetch_assoc();
    if (!$rowe) {
        header('HTTP/1.0 403 Forbidden');
        exit;
    }
    // echo $AlcoholPresence;
    // echo $Sleeping;
    // echo $HoldingWheel;

    $sql = "INSERT INTO Logs (CUID, Alcohol, Sleeping, HoldingWheel, Score) 
        VALUES ('$CUID', $AlcoholPresence, $Sleeping, $HoldingWheel, $Score)";

    $conn->query($sql);
    // echo "Data inserted";
    echo $sql;

    $stmt->close();
}
