
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RIZA AI | Your AI Teacher</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #080d19;
            color: white;
            font-family: Arial, sans-serif;
            min-height: 100vh;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 7%;
            background: #111827;
            border-bottom: 1px solid #263247;
        }

        .logo {
            font-size: 28px;
            font-weight: bold;
        }

        .logo span {
            color: #a855f7;
        }

        .language {
            background: #202b40;
            color: white;
            padding: 10px;
            border: 1px solid #39465e;
            border-radius: 8px;
        }

        main {
            max-width: 850px;
            margin: 55px auto;
            padding: 20px;
            text-align: center;
        }

        .avatar {
            width: 145px;
            height: 145px;
            margin: 0 auto 25px;
            background: linear-gradient(135deg, #9333ea, #2563eb);
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 0 40px #7536d5;
        }

        .face {
            width: 95px;
            height: 105px;
            background: #f2c49c;
            border-radius: 48%;
            position: relative;
        }

        .eyes {
            display: flex;
            justify-content: space-evenly;
            padding-top: 38px;
        }

        .eye {
            width: 11px;
            height: 14px;
            background: #171717;
            border-radius: 50%;
            animation: blink 4s infinite;
        }

        .mouth {
            width: 23px;
            height: 9px;
            background: #9b3c50;
            border-radius: 50%;
            margin: 17px auto;
        }

        @keyframes blink {
            0%, 45%, 50%, 100% {
                transform: scaleY(1);
            }
            47%, 48% {
                transform: scaleY(0.1);
            }
        }

        h1 {
            font-size: 36px;
            margin-bottom: 12px;
        }

        .description {
            color: #aab5c8;
            margin-bottom: 30px;
        }

        .teachers {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin: 25px 0;
            flex-wrap: wrap;
        }

        .teacher {
            padding: 13px 24px;
            background: #172238;
            color: white;
            border: 1px solid #39465e;
            border-radius: 10px;
            cursor: pointer;
        }

        .teacher.active {
            background: #7025c9;
            border-color: #a855f7;
        }

        .chat-box {
            background: #121d30;
            padding: 20px;
            border-radius: 15px;
            border: 1px solid #29364d;
            text-align: left;
        }

        #messages {
            min-height: 110px;
            max-height: 300px;
            overflow-y: auto;
            margin-bottom: 15px;
        }

        .message {
            padding: 12px;
            margin-bottom: 10px;
            border-radius: 9px;
            line-height: 1.5;
        }

        .bot {
            background: #263550;
        }

        .user {
            background: #54269a;
            text-align: right;
        }

        .input-area {
            display: flex;
            gap: 10px;
        }

        input {
            flex: 1;
            min-width: 0;
            padding: 14px;
            border: none;
            border-radius: 8px;
            background: #263550;
            color: white;
            outline: none;
        }

        button {
            padding: 13px 20px;
            background: #9333ea;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
        }

        button:hover {
            background: #7e22ce;
        }

        footer {
            color: #758198;
            padding: 30px;
            text-align: center;
        }

        @media(max-width: 500px) {
            h1 { font-size: 27px; }
            header { padding: 18px; }
            .input-area { flex-direction: column; }
        }
    </style>
</head>

<body>

<header>
    <div class="logo">RIZA <span>AI</span></div>

    <select class="language" id="language">
        <option value="en">English</option>
        <option value="rw">Kinyarwanda</option>
    </select>
</header>

<main>

    <div class="avatar">
        <div class="face">
            <div class="eyes">
                <div class="eye"></div>
                <div class="eye"></div>
            </div>
            <div class="mouth"></div>
        </div>
    </div>

    <h1>Welcome to RIZA AI</h1>

    <p class="description">
        Your Intelligent AI Teaching Assistant
    </p>

    <div class="teachers">
        <button class="teacher active" onclick="chooseTeacher('RIZA BOY', this)">
            RIZA BOY
        </button>

        <button class="teacher" onclick="chooseTeacher('RIZA GIRL', this)">
            RIZA GIRL
        </button>
    </div>

    <div class="chat-box">

        <div id="messages">
            <div class="message bot">
                Hello! I am RIZA AI. What would you like to learn today?
            </div>
        </div>

        <div class="input-area">
            <input
                type="text"
                id="question"
                placeholder="Ask your teacher anything..."
                onkeydown="if(event.key === 'Enter') sendMessage()"
            >

            <button onclick="sendMessage()">Send</button>
        </div>

    </div>

</main>

<footer>
    RIZA AI © 2026 | Learn Without Limits
</footer>

<script>
    let currentTeacher = "RIZA BOY";

    function chooseTeacher(name, button) {
        currentTeacher = name;

        document.querySelectorAll(".teacher").forEach(item => {
            item.classList.remove("active");
        });

        button.classList.add("active");
    }

    function sendMessage() {
        const input = document.getElementById("question");
        const messages = document.getElementById("messages");

        const question = input.value.trim();

        if (!question) return;

        const userMessage = document.createElement("div");
        userMessage.className = "message user";
        userMessage.textContent = question;
        messages.appendChild(userMessage);

        const answer = document.createElement("div");
        answer.className = "message bot";
        answer.textContent =
            currentTeacher + ": I received your question! My AI brain will be connected soon.";

        messages.appendChild(answer);

        input.value = "";
        messages.scrollTop = messages.scrollHeight;
    }
</script>

</body>
</html>
