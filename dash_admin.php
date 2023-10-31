<?php
session_start();

if (!isset($_SESSION["username"]) || $_SESSION["role"] !== "admin") {
    header("Location: login.php");
    exit;
}

require_once('./admin_functions.php');

if (isset($_POST['confirmCreateRole'])) {
    $emailToCreate = $_POST['emailToCreate'];
    $roleToCreate = $_POST['roleToCreate'];
    createRole($emailToCreate, $roleToCreate);
}

if (isset($_POST['confirmUpdateRole'])) {
    $emailToUpdate = $_POST['emailToUpdate'];
    updateRole($emailToUpdate);
}

if (isset($_POST['confirmDeleteRole'])) {
    $emailToDelete = $_POST['emailToDelete'];
    deleteRole($emailToDelete);
}

$data = loadUserData();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="//cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="min-w-full py-3 bg-cyan-950 " >
        <h1 class="text-center text-xl text-slate-100 font-bold"> Admin Dashboard</h1>
        <p class="ml-4 text-center text-rose-500 underline-offset-1 text-base"><a href="logout.php">Logout</a></p>
    </div>

    
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Username
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3">
                    Role
                </th>
                <th scope="col" class="px-12 py-3">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $email => $user) { ?>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      <?php echo $user['username']; ?>
                </th>
                <td class="px-6 py-4">
                    <?php echo $user['email']; ?>
                </td>
                <td class="px-6 py-4 ">
                    <?php
                            echo $user["role"];
                            ?>
                            
                </td>
                <td class="px-6 py-4">
                    <?php
                        if ($user["role"] === "") {
                            echo '<a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" onclick="confirmCreateRole(\'' . $email . '\')">Create</a>';
                        } else if ($user["role"] === "admin") {
                            echo ' <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" onclick="confirmUpdateRole(\'' . $email . '\')">Update</a>';
                            echo ' | <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" onclick="confirmDeleteRole(\'' . $email . '\')">Delete</a>';
                        } elseif ($user["role"] === "user") {
                            echo ' <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" onclick="confirmUpdateRole(\'' . $email . '\')">Update</a>';
                            echo ' | <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" onclick="confirmDeleteRole(\'' . $email . '\')">Delete</a>';
                        }

                        ?>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
    
    
    <script src="./assets/script.js"></script>
</body>

</html>