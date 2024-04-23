<?php
session_start();
if (isset($_SESSION["username"]) && isset($_SESSION["phonenum"])) {
?>



    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>

    <body>
        <main class="h-[100vh] flex items-center justify-center flex-col space-y-4 bg-[#4070f7]">
            <h1 class="text-3xl font-bold text-white">Chat Room</h1>
            <div class="chat-container min-w-[330px] max-w-[500px] w-[90vw] min-h-[80vh] rounded-lg bg-white flex flex-col text-center px-4 py-4 divide-y-4 divide-gray-300 overflow-y-scroll">
                <div class="user-welcome py-4 text-2xl text-black font-semibold">
                    Welcome to <span id="username" class="font-bold"><?= $_SESSION["username"] ?></span>
                </div>
                <div class="chat-messages py-4 h-full flex flex-col items-start gap-2 text-left">
                    <div class="reciever-mssg p-2 bg-slate-500 rounded-sm flex flex-col self-start">
                        <span class="reciever text-sm">User : </span>
                        <div class="message text-white">
                            Lorem ipsum dolor sit amet.
                        </div>
                    </div>
                    <div class="sender-mssg p-2 bg-emerald-500 rounded-sm flex flex-col self-end">
                        <span class="sender text-sm">Me : </span>
                        <div class="message text-white">
                            Lorem ipsum dolor sit amet.
                        </div>
                    </div>

                </div>
                <div class="user-input flex flex-row justify-around py-4 px-4 gap-4">
                    <input type="text" name="user-in" id="user-in" placeholder="message..." class="border-2 w-full rounded border-[#4070f7] px-2 py-2" />
                    <button class="text-white bg-[#4070f7] px-4 py-2 rounded" onclick="update()">Send</button>
                </div>
            </div>
        </main>
        <script>
            window.onkeydown = (e) => {
                if (e.key == "Enter") {
                    update()
                }
            }
            function update() {
                
            }
        </script>
    </body>

    </html>

<?php
} else {
    header("location: login.php");
}
?>