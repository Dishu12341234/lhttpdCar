<?php
session_start();
require('connector.php');
if((isset($_SESSION['sessionStata']) ? isset($_SESSION['sessionStata']) : "Incative") != "Active")
{
	header('Location:login.php');
	die();
}
?>

<html>
	<head>
		<title>Save A Car</title>
	</head>
	<body>
		
		</body>
		<?php 

			include("home.php");
			if( $_SESSION['Status'] != "ADMIN")
			{
				$CUID = $_SESSION['CUID'];
				echo $CUID;
				echo "<script>document.getElementById('cuid').value = \"$CUID\"</script>";
			}
		?>
</html>