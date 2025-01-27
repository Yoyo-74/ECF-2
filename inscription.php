<?php

if (isset($_POST['sign-up'])) {

    include './dbh.class.php';
    $connection = new Dbh;
    $bdd = $connection->getConnection();

$username = $_POST['name'];
$email = $_POST['email'];
$pseudo = $_POST['pseudo'];
$password = $_POST['pwd'];
$passwordRepeat = $_POST['pwd-repeat'];

if (empty($username) || empty($email) || empty($pseudo) || empty($password) || empty($passwordRepeat)) {
    header("Location: index.php?error=emptyfields&name=".$username."&email=".$email."&pseudo=".$pseudo);
    exit();
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $pseudo)) {
    header("Location: index.php?error=invalidemail&pseudo");
    exit();
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: index.php?error=invalidemail&name=".$username."&pseudo=".$pseudo);
    exit();
} elseif (!preg_match("/^[a-zA-Z0-9]*$/", $pseudo)) {
    header("Location: index.php?error=invalidpseudo&name=".$username."&email=".$email);
    exit();
} elseif ($password !== $passwordRepeat) {
    header("Location: index.php?error=passwordcheck&name=".$username."&email=".$email."&pseudo=".$pseudo);
    exit();
} else {
    $sql = "SELECT email_user FROM user WHERE email_user=?";
    $stmt = $bdd->prepare($sql);
    $stmt->execute([$email]);
    $result = $stmt->fetch();
    if ($result) {
        header("Location: index.php?error=emailalreadytaken&name=".$username."&email=".$email);
        exit();
    } else {
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO user (name_user, email_user, pseudo_user, pw_user, date_user) VALUES (?, ?, ?, ?, NOW())"; 
        $stmt = $bdd->prepare($sql);
        $stmt->execute([$username, $email, $pseudo, $hashedPwd]);
        header("Location: index.php?signup=success");
        exit();
    }
}

} else {
    header("Location: index.php");
    exit();



}


