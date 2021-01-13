<?php

//REGISTRATION
function Register($password_1, $password_2, $username, $email, &$session_user){
if ($password_1 != $password_2){
	return "redirect:/?password_mismatch=1";
}
$user_helper = GetFromDatabase($username, 'users', 'username');
if ($user_helper == ERROR){
	http_response_code(500);
	header("Location: /error?database_disconnected=1");
}
if ($user_helper){
	return "redirect:/?username_already_used=1";
}
$user = [
	'username' => $username,
	'email' => $email,
	'password' => password_hash($password_1, PASSWORD_DEFAULT),
	'login_status' => 0,
];
$check = InsertItemToDatabase($user, "users");
if ($check == ERROR){
	http_response_code(500);
	header("Location: /error?database_disconnected=1");
}
$session_user = $username;
return "redirect:/?reg_success=1";
}

//LOGIN
function LogIn($username, $password, &$session_user){
$user = GetFromDatabase($username, "users", "username");
if ($user == ERROR){
	http_response_code(500);
	header("Location: /error?database_disconnected=1");
}
if (!$user){
	return "redirect:/?user_not_found=1";
}
if (!password_verify($password, $user['password'])){
	return "redirect:/?password_wrong=1";
}
$session_user = $username;
return "redirect:/?log_success=1";
}

//LOGOUT
function LogOut(&$session_user){
	$session_user = "";
	return "redirect:/?logout_success=1";
}
?>