<?php session_start();?>
<?php require 'connector.php';?>
<?php

$SSTATUS = $_SESSION['sessionStata'] ?? "Inactive";
if ($SSTATUS == "Inactive") {
    header("Location: login.php");
    die("Please login first");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Driver Report - Life Saver Suite</title>
  <link rel="stylesheet" href="/report.css">
  <link rel="icon" href="/logo.png" type="image/x-icon">
</head>
<body>

  <?php include('nav.html');?>

  <!-- Main Content Area -->
  <main class="main-content">
    <header class="header">
      <h2>Driver Report</h2>
    </header>

    
      <section class="signin">
        <div class="form">
          <h3>Sensor Data</h3>
          <table>
            <tr>
              <th>Field</th>
              <th>Value</th>
            </tr>
            <tr>
              <tr>
                <td>Name</td>
                <td id="cuid"><?php echo $_SESSION['Name']; ?></td>
              </tr>
              <tr>
                <td>Phone Number</td>
                <td id="cuid"><?php echo $_SESSION['PHN']; ?></td>
              </tr>
              <td>CUID</td>
              <td id="cuid"><?php echo $_SESSION['CUID']; ?></td>
            </tr>
            <tr>
              <td>Blood Alcohol Presence</td>
              <td  class="dataVal status-div"id="BloodAlcoholLevel"></td>
              
            </tr>
            <tr>
              <td>Sleeping</td>
              <td class="dataVal status-div"id="BlinkRate"></td>

            </tr>
            <tr>
              <td>Holding Wheel</td>
              <td class="dataVal status-div"id="isOnWheel"></td>
              
            </tr>
          </table>

          <br>
          
        </div>
      </section>
  </main>

  <script>
    function setText (ID,TEXT)
    { 
      let element = document.getElementById(ID);
      element.innerText = TEXT;
    }
  
    // Update the status colors based on values
    
    setInterval(()=>{fetch(`${window.location.origin}/liveData.php`,{
      method: "GET",
    }).then((res)=>res.json())
    .then(
      json => {console.log(json);
      setText('BloodAlcoholLevel',json['Alcohol']);
      setText('BlinkRate',json['Sleeping']);
      setText('isOnWheel',json['HoldingWheel']);

      let datas = document.getElementsByClassName('dataVal');
for (const element of datas) {
  // Determine behavior based on element ID
  let behavior = (element.id === "BloodAlcoholLevel" || element.id === "BlinkRate") ? "Active High" : "Active Low";

  console.log(element.id);
  console.log(behavior);
  console.log(element.innerText);

  // Determine color based on behavior and innerText
  if(behavior == "Active High" && element.innerText == 1)
  { 
    element.style.background = "#ff9a9a"
  }
  else if(behavior == "Active Low" && element.innerText == 0)
  {
    element.style.background = "#ff9a9a"
  }
  else
  {
    element.style.background = "#9aff9a"
  }
}

        
    });},1000)
  </script>

</body>
</html>
