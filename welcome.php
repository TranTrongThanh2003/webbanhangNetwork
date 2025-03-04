<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WELCOME TO THÀNH HIẾU</title>
    <link rel="shortcut icon" href="img/logo_Network.jpg" type="image/x-icon">
    <style>
        @keyframes marquee {
            0% {
                transform: translateX(100%);
            }
            100% {
                transform: translateX(-100%);
            }
        }
        #marquee-container {
            position: absolute;
            top: 0;
            left: 300px;
            right: 300px;
            overflow: hidden;
            height: 30px;
        }
        #marquee {
            width: 100%;
            white-space: nowrap;
            overflow: hidden;
            box-sizing: border-box;
        }
        .marquee-content {
            display: inline-block;
            position: absolute;
            width: 100%;
            animation: marquee 15s linear infinite;
            font-size: 18px;
            color: red;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
            margin-top:10px;
        }
    </style>
</head>
<body>
    <div id="marquee-container">
        <div id="marquee">
            <div class="marquee-content">
            🥳 Chào mừng bạn đã ghé thăm cửa hàng thiết bị mạng <span style="color:cyan">Thành Hiếu</span> 😍
            </div>
        </div>
    </div>
</body>
</html>
