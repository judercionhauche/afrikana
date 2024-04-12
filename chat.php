<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Popup Example</title>
  <style>
    .popup {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0,0,0,0.5);
    }

    .popup-content {
      background-color: #fefefe;
      margin: 15% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
      max-width: 600px;
      position: relative;
    }

    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
    }
  </style>
</head>
<body>

<button id="openPopup" onclick="openPopup()">Open Chat Bot</button>

<div id="popupContainer" class="popup">
  <div class="popup-content">
    <span class="close" onclick="closePopup()">&times;</span>
    <!-- Your popup content here -->
    <iframe src="https://landbot.online/v3/H-2187470-YGXOL18ZVTJBWIF5/index.html" frameborder="0"></iframe>
    <button onclick="closePopup()">Close</button>
  </div>
</div>

<script>
  function openPopup() {
    document.getElementById('popupContainer').style.display = 'block';
  }

  function closePopup() {
    document.getElementById('popupContainer').style.display = 'none';
  }
</script>

</body>
</html>
