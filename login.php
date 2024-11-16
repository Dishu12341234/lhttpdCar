<?php
session_start();
require 'connector.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $USERNAME = isset($_POST['UNAME']) ? htmlspecialchars($_POST['UNAME']) : null;
    $PWD = isset($_POST['PWD']) ? htmlspecialchars($_POST['PWD']) : null;
    if (!$USERNAME || !$PWD) {
        echo "Can not login. <br> Empty feilds";
        die();
    }

    $sql = "SELECT * FROM Users LEFT JOIN UserInfo ON Users.ADDHAR = UserInfo.AddharNumber WHERE Users.Name= ? AND PWD= ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        echo "Error in preparing the statement." . $conn->error;
        die();
    }
    $stmt->bind_param("ss", $USERNAME, $PWD);
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
    if ($rowe) {
        $STATUS = $rowe['Status'];
        $ADDHAR = $rowe['ADDHAR'];
        $CUID = $rowe['CUID'];
        $Name = $rowe['Name'];
        $PHN = $rowe['PhoneNumber'];
		$_SESSION["sessionStata"] = "Active";
		$_SESSION["Status"] = $STATUS;	
		$_SESSION["ADDHAR"] = $ADDHAR;	
		$_SESSION["CUID"] = $CUID;
		$_SESSION["Name"] = $Name;
		$_SESSION["PHN"] = $PHN;
        header('Location: /');

    } else {
        echo "No matching records found. For $USERNAME";
        header('Location: login.php');
    }
    $stmt->close();
} else {
    include "login.html";
    include "nav.html";
}
