<?php

// Load user data from db.json
function loadUserData()
{
    return json_decode(file_get_contents('./data/db.json'), true);
    
}

// Save user data to db.json
function saveUserData($data)
{
    file_put_contents('./data/db.json', json_encode($data, JSON_PRETTY_PRINT));
}

// Create a new role for a user
function createRole($email, $newRole)
{
    $data = loadUserData();
    if (array_key_exists($email, $data)) {
        $data[$email]['role'] = $newRole;
        saveUserData($data);
        return true;
    } else {
        return false;
    }
}



// Update an existing user's role
function updateRole($email)
{
    $data = loadUserData();

    if (array_key_exists($email,$data)) {
        // Toggle the role between "user" and "admin"
        if ($data[$email]["role"] === "admin") {
            $data[$email]["role"] = "user";
        } elseif ($data[$email]["role"] === "user") {
            $data[$email]["role"] = "admin";
        }
        saveUserData($data);
        $data2 = loadUserData();
        if($data2[$email]["role"] === "user") {
            $_SESSION['role'] = "user";
            header("Location: dash_user.php");
        }
        return true;
    } else {
        return false;
    }
}

// Delete a user role
function deleteRole($email)
{
    $data = loadUserData();

    if (array_key_exists($email, $data)) {
        $data[$email]["role"] = "";
        saveUserData($data);
        return true;
    } else {
        return false;
    }
} 
