<?php
// Include file koneksi database
include('connect.php');


function login($request) {
    global $conn;

    if(!check_all_params_exist($request, ['email', 'password'])){
        make_response(['error' => "Parameter request kurang atau salah"], 400);
    }

    $email = $request['email'];
    $password = $request['password'];

    $quser = "SELECT id, username, email, hash_password FROM users WHERE email = ? LIMIT 1";

    $stmt = $conn->prepare($quser);
    if ($stmt === false) {
        make_response(['error' => "Ada masalah pada server"], 500);
    }

    $stmt->bind_param("s", $email);

    if ($stmt->execute() === false) {
        make_response(['error' => "Ada masalah pada server"], 500);
    }

    $result = $stmt->get_result();
    $data_login = $result->fetch_assoc();

    if(empty($data_login)){
        make_response(['message' => "Email atau Password salah!"], 401); // Autentikasi gagal
    }

    $hash_password = $data_login['hash_password'];

    if(!password_verify($password, $hash_password)){
        make_response(['message' => "Email atau Password salah!"], 401); // Autentikasi gagal
    }

    $data_login['message'] = "Login berhasil!";

    make_response($data_login, 200);
}

function sign_up($request) {
    global $conn;

    if(!check_all_params_exist($request, ['nama', 'username', 'email', 'password'])){
        make_response(['error' => "Parameter request kurang atau salah"], 400);
    }

    $nama = $request['nama'];
    $username = $request['username'];
    $email = $request['email'];
    $password = $request['password'];

    $hash_password = password_hash($password, PASSWORD_BCRYPT);

    // Check if the username or email is already registered
    $quser_exist = "SELECT id FROM users WHERE email = ?";
    $stmt = $conn->prepare($quser_exist);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        make_response(["message" => "Email yang diinput sudah ada"], 409) // Konflik
    }

    // Masukkan user ke tabel users
    $qinsert_user = "INSERT INTO users (username, email, hash_password) VALUES (?, ?, ?)";

    $insert_stmt = $conn->prepare($qinsert_user);
    if ($insert_stmt === false) {
        make_response(['error' => "Ada masalah pada server"], 500);
    }

    $insert_stmt->bind_param("sss", $username, $email, $hash_password);

    if ($insert_stmt->execute() === false) {
        make_response(['error' => "Ada masalah pada server"], 500);
    }
    
    // ambil user id untuk disimpan di akun perbank
    $quser = "SELECT id FROM users WHERE email = ? LIMIT 1";

    $stmt = $conn->prepare($quser);
    $stmt->bind_param("s", $email);

    if ($stmt->execute() === false) {
        make_response(['error' => "Ada masalah pada server"], 500);
    }

    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $user_id = $user['id'];

    // Masukkan user ke akun perbankan
    $qinsert_perbank_akun = "INSERT INTO data_transaksi_bank (user_id, nama, nilai_saldo) VALUES (?, ?, '0')";
    $insert_perbank = $conn->prepare($qinsert_perbank_akun);
    $insert_perbank->bind_param("ss", $user_id, $nama);

    if ($insert_perbank->execute() === false) {
        make_response(['error' => "Ada masalah pada server"], 500);
    }

    make_response(['message' => "Akun berhasil dibuat!"], 201);
}

function check_email_exists($request)
{
    global $conn;

    if(!check_all_params_exist($request, ['email'])){
        make_response(['error' => "Parameter request kurang atau salah"], 400);
    }

    $email = $request['email'];

    $quser_exist = "SELECT id, email FROM users WHERE email = ? LIMIT 1";
    $stmt = $conn->prepare($quser_exist);
    $stmt->bind_param("s", $email);

    if ($stmt->execute() === false) {
        make_response(['error' => "Ada masalah pada server"], 500);
    }

    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    make_response($user, 200);
}

function reset_password($request)
{
    global $conn;

    if(!check_all_params_exist($request, ['user_id', 'password'])){
        make_response(['error' => "Parameter request kurang atau salah"], 400);
    }

    $user_id = $request['user_id'];
    $new_password = $request['password'];

    $new_hash_password = password_hash($new_password, PASSWORD_BCRYPT);

    $quser_exist = "SELECT id FROM users WHERE id = ?";
    $stmt = $conn->prepare($quser_exist);
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows == 0) {
        make_response(["message" => "User tidak ditemukan"], 404);
    }

    $qupdate_password = "UPDATE users SET hash_password = ? WHERE id = ?";
    $update_stmt = $conn->prepare($qupdate_password);
    $update_stmt->bind_param("ss", $new_hash_password, $user_id);

    if ($update_stmt->execute() === false) {
        make_response(['error' => "Ada masalah pada server"], 500);
    }

    make_response(['message' => "Password berhasil diubah!"], 200);
}


function change_password($request)
{
    global $conn;

    if(!check_all_params_exist($request, ['user_id', 'current_password', 'new_password'])){
        make_response(['error' => "Parameter request kurang atau salah"], 400);
    }

    $user_id = $request['user_id'];
    $current_password = $request['current_password']
    $new_password = $request['new_password'];

    $new_hash_password = password_hash($new_password, PASSWORD_BCRYPT);

    $quser_exist = "SELECT hash_password FROM users WHERE id = ?";
    $stmt = $conn->prepare($quser_exist);
    $stmt->bind_param("s", $user_id);
    if ($stmt->execute() === false) {
        make_response(['error' => "Ada masalah pada server"], 500);
    }

    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    $hash_password = $user['hash_password'];

    if(!password_verify($current_password, $hash_password)){
        make_response(['message' => "Password salah!"], 401);
    }

    $qupdate_password = "UPDATE users SET hash_password = ? WHERE id = ?";
    $update_stmt = $conn->prepare($qupdate_password);
    $update_stmt->bind_param("ss", $new_hash_password, $user_id);

    if ($update_stmt->execute() === false) {
        make_response(['error' => "Ada masalah pada server"], 500);
    }

    make_response(['message' => "Password berhasil diubah!"], 200);
}
?>
