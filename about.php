<?php
session_start();
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
    <title>Life Saver Suite</title>
    <link rel="stylesheet" href="/about.css">
    <link rel="icon" href="/logo.png" type="image/x-icon">
  </head>
  <body>
    
    <?php include("nav.html") ?>


  <!-- Main Content Area -->
  <main class="main-content">
    <header class="header">
      <h2>System Overview</h2>
    </header>


    <section class="system-description">
        <div class="test">
      <h3>Start</h3>
      <p>The system operates with a stable and appropriate power supply. Once activated, an alcohol sensor checks if the driver is intoxicated. If the driver's alcohol levels exceed the permissible limit, the system issues a warning and disables the vehicle's engine.</p> <p>If no alcohol is detected, the vehicle starts normally and continues to operate without interruption.</p> <p>An eye blink sensor monitors the driver for signs of drowsiness. If it detects that the driver is falling asleep, the system triggers an alarm and flashes a red light as a warning.</p> <p>The temperature sensor continuously monitors the engine's heat levels. If the engine overheats beyond normal conditions, the system alerts the driver with a red light warning. Otherwise, the vehicle remains operational.</p> <p>In the event of an accident, an accelerometer detects the impact and sends a signal to the microcontroller to initiate emergency protocols.</p> <p>The GPS module determines the vehicle's location, and the GSM module sends a message containing the latitude, longitude, and a Google Maps link to emergency contacts, including ambulance services and the police.</p> <p>Throughout its operation, the system uses an Arduino Uno microcontroller to monitor all sensors in real-time, ensuring effective prevention, detection, and reporting of incidents.</p>
        </div>
    </section>
  </main>

</body>
</html>