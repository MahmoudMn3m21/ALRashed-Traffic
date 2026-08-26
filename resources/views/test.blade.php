<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AlRashed Safety | Under Maintenance</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,
        body {
            height: 100%;
            font-family: 'Poppins', sans-serif;
        }

        body {
            overflow: hidden;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            background:
                radial-gradient(circle at top left, #2563eb 0%, transparent 35%),
                radial-gradient(circle at bottom right, #0891b2 0%, transparent 35%),
                linear-gradient(135deg, #020617, #0f172a, #111827);
        }

        /* Floating Background */

        .bg span {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, .05);
            backdrop-filter: blur(5px);
            animation: float 18s infinite ease-in-out;
        }

        .bg span:nth-child(1) {
            width: 420px;
            height: 420px;
            left: -140px;
            top: -120px;
        }

        .bg span:nth-child(2) {
            width: 250px;
            height: 250px;
            right: -60px;
            top: 12%;
            animation-delay: 3s;
        }

        .bg span:nth-child(3) {
            width: 300px;
            height: 300px;
            right: -100px;
            bottom: -90px;
            animation-delay: 5s;
        }

        .bg span:nth-child(4) {
            width: 120px;
            height: 120px;
            left: 18%;
            bottom: 15%;
            animation-delay: 7s;
        }

        @keyframes float {

            50% {
                transform: translateY(-30px) translateX(20px) scale(1.08);
            }

        }

        /* Card */

        .card {

            width: min(92%, 850px);

            background: rgba(255, 255, 255, .08);

            border: 1px solid rgba(255, 255, 255, .12);

            backdrop-filter: blur(25px);

            border-radius: 28px;

            padding: 70px;

            text-align: center;

            box-shadow:
                0 25px 80px rgba(0, 0, 0, .45);

            position: relative;

            z-index: 10;

        }

        .logo {

            width: 90px;
            height: 90px;

            margin: auto;

            border-radius: 50%;

            background: linear-gradient(135deg, #2563eb, #06b6d4);

            display: flex;
            align-items: center;
            justify-content: center;

            font-size: 40px;

            box-shadow: 0 15px 35px rgba(37, 99, 235, .4);

            animation: pulse 2s infinite;

        }

        @keyframes pulse {

            50% {
                transform: scale(1.08);
            }

        }

        h1 {

            margin-top: 30px;

            font-size: 52px;

            font-weight: 700;

            letter-spacing: .5px;

        }

        h2 {

            margin-top: 12px;

            font-weight: 400;

            color: #cbd5e1;

            font-size: 20px;

        }

        .divider {

            width: 120px;

            height: 4px;

            border-radius: 10px;

            margin: 35px auto;

            background: linear-gradient(90deg, #2563eb, #06b6d4);

        }

        p {

            color: #dbe4ef;

            line-height: 1.9;

            font-size: 18px;

            max-width: 650px;

            margin: auto;

        }

        /* Countdown */

        .countdown {

            margin-top: 45px;

            display: flex;

            justify-content: center;

            gap: 18px;

            flex-wrap: wrap;

        }

        .box {

            width: 120px;

            padding: 22px 10px;

            border-radius: 18px;

            background: rgba(255, 255, 255, .08);

            border: 1px solid rgba(255, 255, 255, .08);

        }

        .box h3 {

            font-size: 42px;

            margin-bottom: 5px;

        }

        .box span {

            color: #94a3b8;

            text-transform: uppercase;

            font-size: 13px;

            letter-spacing: 1px;

        }

        .badge {

            margin-top: 45px;

            display: inline-flex;

            align-items: center;

            gap: 10px;

            padding: 14px 28px;

            border-radius: 100px;

            background: #22c55e;

            font-weight: 600;

            box-shadow: 0 10px 25px rgba(34, 197, 94, .3);

        }

        .footer {

            margin-top: 35px;

            color: #94a3b8;

            font-size: 14px;

        }

        @media(max-width:768px) {

            .card {
                padding: 45px 25px;
            }

            h1 {
                font-size: 36px;
            }

            h2 {
                font-size: 17px;
            }

            p {
                font-size: 16px;
            }

            .box {
                width: 90px;
            }

            .box h3 {
                font-size: 32px;
            }

        }
    </style>

</head>

<body>

    <div class="bg">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>

    <div class="card">

        <div class="logo">
            🛠
        </div>

        <h1>We'll Be Back Soon</h1>

        <h2>Scheduled Maintenance in Progress</h2>

        <div class="divider"></div>

        <p>
            We're currently performing scheduled maintenance to improve the security,
            speed, and reliability of our platform.
            <br><br>
            Thank you for your patience.
            We look forward to welcoming you back shortly.
        </p>

        <div class="countdown">

            <div class="box">
                <h3 id="days">00</h3>
                <span>Days</span>
            </div>

            <div class="box">
                <h3 id="hours">00</h3>
                <span>Hours</span>
            </div>

            <div class="box">
                <h3 id="minutes">00</h3>
                <span>Minutes</span>
            </div>

            <div class="box">
                <h3 id="seconds">00</h3>
                <span>Seconds</span>
            </div>

        </div>

        <div class="badge">
            ● Maintenance Mode Enabled
        </div>

        <div class="footer">
            © 2026 AlRashed Safety. All Rights Reserved.
        </div>

    </div>

    <script>
        // Change this date
        const targetDate = new Date("August 28, 2026 18:00:00").getTime();

        setInterval(function() {

            const now = new Date().getTime();

            const distance = targetDate - now;

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));

            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));

            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));

            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("days").innerHTML = Math.max(days, 0);
            document.getElementById("hours").innerHTML = Math.max(hours, 0);
            document.getElementById("minutes").innerHTML = Math.max(minutes, 0);
            document.getElementById("seconds").innerHTML = Math.max(seconds, 0);

        }, 1000);
    </script>

</body>

</html>