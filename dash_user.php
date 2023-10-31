<?php
session_start();

if (!isset($_SESSION["role"]) || $_SESSION["role"] != "user") {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="//cdn.tailwindcss.com"></script>
</head>

<body>

<div class="flex flex-col h-screen">
<div class=" py-8 hidden sm:block "> 
<nav class="flex" aria-label="Breadcrumb">
  <ol class="inline-flex items-center space-x-1 md:space-x-3">
    <li class="inline-flex items-center">
      <a href="dash_user.php" class="inline-flex items-center text-xl font-bold text-orange-500 hover:text-sky-900 ">
        <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="fill-orange-500" viewBox="0 0 20 20">
          <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
        </svg>
        Home
      </a>
    </li>
    <li>
      <div class="flex items-center">
        <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
          <path stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
        </svg>
        <p class="ml-1 text-l font-medium text-orange-400  md:ml-2"> <?php echo $_SESSION["email"];?>
        </p>
      </div>
    </li>
    <li>
      <div class="flex items-center">
        <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
          <path stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
        </svg>
        <p class="ml-1 text-l font-medium text-orange-400  md:ml-2"> <?php echo $_SESSION["role"]; ?>
            </p>
        </div>
    </li>
    <li>
      <div class="flex items-center">
        <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
          <path stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
        </svg>
        <a href="logout.php" class="ml-1 text-l font-medium text-rose-500 hover:text-fuchsia-900 md:ml-2">Logout</a>
      </div>
    </li>
  </ol>
</nav>
</div>
    <div class="flex flex-grow items-center justify-center bg-sky-800">
        <h1 class="text-5xl leading-5 text-center text-slate-100">Welcome!
            <?php echo $_SESSION["username"] . " to our wonderful website."; ?>
        </h1>
    </div>
</div>
</body>

</html>