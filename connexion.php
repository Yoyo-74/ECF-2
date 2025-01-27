<?php



if (isset($_POST['sign-in']) ) {
    include './dbh.class.php';
    $connection = new Dbh;
    $bdd = $connection->getConnection();

    $email = $_POST['email'];
    $password = $_POST['pwd'];

    if (empty($email) || empty($password)) {
        header("Location: index.php?error=emptyfields");
        exit();
    } else {
        $sql = 'SELECT 		user.id_user AS IDU, 
			                name_user, 
        	                email_user, 
        	                pseudo_user, 
        	                pw_user, 
        	                DATE_FORMAT(date_user, "%d/%m/%Y") as DATE_SIGNUP, 
        	                COUNT(id_post) AS NB_POST 
                FROM 		user
                LEFT JOIN 	post
                ON 			user.id_user = post.id_user
                WHERE		email_user = ?
                GROUP BY 	IDU, name_user, email_user, pseudo_user, pw_user, DATE_SIGNUP;';

        $stmt = $bdd->prepare($sql);
        $stmt->execute([$email]);
        $result = $stmt->fetch();
        if ($result) {
            $pwdCheck = password_verify($password, $result['pw_user']);
            if ($pwdCheck) {
                session_start();
                $_SESSION['id'] = $result['IDU'];
                $_SESSION['name'] = $result['name_user'];
                $_SESSION['pseudo'] = $result['pseudo_user'];
                $_SESSION['email'] = $result['email_user'];
                $_SESSION['date_user'] = $result['DATE_SIGNUP'];
                $_SESSION['nb_post'] = $result['NB_POST'];
                header("Location: page1.php?login=success");
                exit();
            } else {
                header("Location: index.php?error=wrongpassword");
                exit();
            }
        } else {
            header("Location: index.php?error=nouser");
            exit();
        }
    }

}
else {
    header("Location: index.php");
    exit();
}
