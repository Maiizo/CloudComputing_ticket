<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TWICE Concert Registration</title>
    <meta name="description" content="Register for the upcoming TWICE World Tour. Secure your VIP or General Admission tickets now!">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --twice-apricot: #FCC89B;
            --twice-magenta: #FF5FA2;
            --glass-bg: rgba(255, 255, 255, 0.15);
            --glass-border: rgba(255, 255, 255, 0.3);
            --text-main: #ffffff;
            --text-muted: rgba(255, 255, 255, 0.85);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Outfit', sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(-45deg, #FF5FA2, #FCC89B, #ff7eb3, #ffb3a7);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            color: var(--text-main);
            overflow: hidden;
            position: relative;
        }

        @keyframes gradientBG {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Floating background elements */
        .circle {
            position: absolute;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(255,255,255,0.2) 0%, rgba(255,255,255,0) 70%);
            animation: float 8s infinite ease-in-out;
            pointer-events: none;
        }

        .circle:nth-child(1) {
            width: 350px; height: 350px;
            top: 5%; left: 10%;
            animation-delay: 0s;
        }

        .circle:nth-child(2) {
            width: 450px; height: 450px;
            bottom: 5%; right: 5%;
            animation-delay: -3s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) scale(1); }
            50% { transform: translateY(-30px) scale(1.05); }
        }

        .registration-container {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 28px;
            padding: 45px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.2);
            transform: translateY(20px);
            opacity: 0;
            animation: slideUp 0.8s ease-out forwards;
            position: relative;
            z-index: 10;
        }

        @keyframes slideUp {
            to { transform: translateY(0); opacity: 1; }
        }

        .header {
            text-align: center;
            margin-bottom: 35px;
        }

        .header h1 {
            font-size: 2.8rem;
            font-weight: 700;
            margin-bottom: 12px;
            letter-spacing: 1.5px;
            text-shadow: 0 4px 15px rgba(0,0,0,0.15);
        }

        .header p {
            font-size: 1.1rem;
            color: var(--text-muted);
            font-weight: 300;
        }

        .form-group {
            margin-bottom: 24px;
            position: relative;
        }

        .form-label {
            display: block;
            margin-bottom: 10px;
            font-size: 0.95rem;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .form-control {
            width: 100%;
            padding: 16px 22px;
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 14px;
            color: white;
            font-size: 1.05rem;
            font-family: inherit;
            outline: none;
            transition: all 0.3s ease;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .form-control:focus, .form-control:hover {
            background: rgba(255, 255, 255, 0.25);
            border-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.2);
        }

        select.form-control {
            appearance: none;
            cursor: pointer;
        }
        
        select.form-control option {
            background: var(--twice-magenta);
            color: white;
            font-weight: 500;
        }

        .submit-btn {
            width: 100%;
            padding: 18px;
            background: linear-gradient(135deg, #ffffff, #fdfdfd);
            color: var(--twice-magenta);
            border: none;
            border-radius: 14px;
            font-size: 1.2rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            margin-top: 15px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .submit-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.25);
            background: #ffffff;
        }

        .submit-btn:active {
            transform: translateY(2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .decoration-icon {
            text-align: center;
            font-size: 3rem;
            margin-bottom: 15px;
            animation: popIn 1s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
            opacity: 0;
            transform: scale(0);
        }

        @keyframes popIn {
            to { opacity: 1; transform: scale(1); }
        }

        /* Custom dropdown arrow */
        .select-wrapper {
            position: relative;
        }
        .select-wrapper::after {
            content: "▼";
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: white;
            pointer-events: none;
            font-size: 0.8rem;
        }
    </style>
</head>
<body>

    <div class="circle"></div>
    <div class="circle"></div>

    <main class="registration-container">
        <div class="decoration-icon">🍭</div>
        <header class="header">
            <h1>TWICE WORLD TOUR</h1>
            <p>Secure your spot for the ultimate experience</p>
        </header>

        <form action="#" method="POST" onsubmit="event.preventDefault(); alert('Registration successful! See you at the concert! 💕');">
            <div class="form-group">
                <label class="form-label" for="name">Full Name</label>
                <input type="text" id="name" class="form-control" placeholder="Enter your full name" required>
            </div>

            <div class="form-group">
                <label class="form-label" for="email">Email Address</label>
                <input type="email" id="email" class="form-control" placeholder="once@example.com" required>
            </div>

            <div class="form-group select-wrapper">
                <label class="form-label" for="ticket_type">Ticket Type</label>
                <select id="ticket_type" class="form-control" required>
                    <option value="" disabled selected>Select a ticket tier</option>
                    <option value="vip">VIP Soundcheck Package</option>
                    <option value="standing">General Admission Standing</option>
                    <option value="seated">Reserved Seating</option>
                </select>
            </div>

            <div class="form-group">
                <label class="form-label" for="quantity">Number of Tickets</label>
                <input type="number" id="quantity" class="form-control" min="1" max="4" value="1" required>
            </div>

            <button type="submit" class="submit-btn">Register Now</button>
        </form>
    </main>

</body>
</html>
