<?php
include "db.php";
session_start();
if (isset($_POST["userName"]) && isset($_POST["phoneNo"])) {
  $name = $_POST["userName"];
  $phone = $_POST["phoneNo"];
  $query = "SELECT * FROM `users` WHERE uName='$name' && phoneNum='$phone'";
  if ($rq = mysqli_query($db, $query)) {
    if (mysqli_num_rows($rq) == 1) {
      $_SESSION["username"] = $name;
      $_SESSION["phonenum"] = $phone;
      header("location: index.php");
    } else {
      $query = "SELECT * FROM `users` WHERE phoneNum='$phone'";
      if ($rq = mysqli_query($db, $query)) {
        if (mysqli_num_rows($rq) == 1) {
          echo "<script>alert($phone + ' is already taken')</script>";
        } else {
          $query = "INSERT INTO `users`(`uName`, `phoneNum`) VALUES ('$name', '$phone')";
          if ($rq = mysqli_query($db, $query)) {
            $query = "SELECT * FROM `users` WHERE uName='$name' && phoneNum='$phone'";
            if ($rq = mysqli_query($db, $query)) {
              if (mysqli_num_rows($rq) == 1) {
                $_SESSION["username"] = $name;
                $_SESSION["phonenum"] = $phone;
                header("location: index.php");
              }
            }
          }
        }
      }
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            clifford: "#da373d",
          },
        },
      },
      plugins: [
        require("@tailwindcss/forms")({
          strategy: "base", // only generate global styles
          strategy: "class", // only generate classes
        }),
      ],
    };
  </script>
  <style type="text/tailwindcss">
    @layer utilities {
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
          -webkit-appearance: none;
          margin: 0;
        }

        /* Firefox */
        input[type="number"] {
          -moz-appearance: textfield;
        }
      }
    </style>
</head>

<body class="text-red-800">
  <main class="h-[100vh] flex items-center justify-center flex-col space-y-4 bg-[#4070f7]">
    <h1 class="text-3xl font-bold text-white">Chat Room</h1>
    <div class="chat-container min-w-[330px] max-w-[500px] w-[90vw] rounded-lg bg-white flex flex-col text-center px-4 py-4 gap-2 text-black">
      <h1 class="text-2xl font-bold">Login</h1>
      <p class="text-slate-700 text-sm">
        This ChatRoom is the best example to demonstrate the concept of
        ChatBot and it's completely for beginners
      </p>
      <form action="" method="post" class="flex flex-col gap-2 text-left px-[2rem]">
        <div class="form-group space-y-2 py-2">
          <label for="username" class="block font-semibold">UserName :
          </label>
          <input type="text" class="form-input border-2 rounded-sm border-slate-400 px-2 py-1 rounded-lg w-full" placeholder="short name" name="userName" />
        </div>
        <div class="form-group space-y-2 py-2">
          <label for="username" class="block font-semibold">Mobile Number :
          </label>
          <input type="number" class="form-input border-2 rounded-sm border-slate-400 px-2 py-1 rounded-lg w-full resize-none" placeholder="with country code" min="1111111111" max="9999999999" name="phoneNo" />
        </div>
        <button type="submit" class="bg-[#4070f7] self-center px-4 py-2 text-white rounded">
          Login/Register
        </button>
      </form>
    </div>
  </main>
</body>

</html>