

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Life Saver Suite</title> 
  <link rel="stylesheet" href="/style.css">
  <link rel="icon" href="/logo.png" type="image/x-icon">
</head>
<body>

<?php include("nav.html") ?>


<section>
  <header class="header">
    <h2 id="header">Home</h2> 
  </header>
  <div class="signin">
    <div class="content">
      <h2>Sensor Data Input Form</h2>
      <div class="form">
        <form id="sensor-form">
          <!-- Table Structure for Form Fields -->
          <table>
            <tr>
              <td><label for="cuid">CUID:</label></td>
              <td><input type="text" id="cuid" name="cuid" placeholder="0" required></td>
            </tr>
            <tr>
              <td><label for="BloodAlcoholLevel" id="bal">Blood Alcohol Presence:</label></td>
              <td><input type="number" id="BloodAlcoholLevel" name="BloodAlcoholLevel" placeholder="0" min="0" max="100" required></td>
            </tr>
            <tr>
              <td><label for="BlinkRate">Sleeping:</label></td>
              <td><input type="number" id="BlinkRate" name="BlinkRate" placeholder="0" min="0" max="100" required></td>
            </tr>
            <tr>
              <td><label for="isOnWheel">Holding Wheel:</label></td>
              <td><input type="number" id="isOnWheel" name="isOnWheel" placeholder="0" min="0" max="10" required></td>
            </tr>
            <tr>
              <td colspan="2" style="text-align: center;">
                <br>
                <input type="submit" value="Submit" class="action-btn">
              </td>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </div>

  <div id="notification" class="notification">
    <button class="close-btn" onclick="closeNotification()">×</button>
    <div id="notification-message-container">This is a notification!</div>
  </div>

</section>

<script>
  function showNotification(action) {
        const notification = document.getElementById('notification');
        const messageElement = document.getElementById('notification-message-container');  // Replaced span with div

    if (action === 'submit') {
        messageElement.textContent = 'Your Data Has Been Successfully Submitted!'; // Set the message in the <div>
        notification.classList.add('show-notification');
    }
    }

    function closeNotification() {
        const notification = document.getElementById('notification');
        notification.style.opacity = '0';
        setTimeout(function() {
            notification.classList.remove('show-notification');
        }, 500); 
    }

    document.getElementById('sensor-form').addEventListener('submit', function(event) {
        event.preventDefault(); 
        showNotification('submit');
    });
</script>

</body>
</html>
