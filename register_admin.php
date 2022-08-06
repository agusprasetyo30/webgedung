<?php
require_once "function.php";
 
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["username"]))){
        $username_err = "Silahkan input username anda";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username hanya dapat berupa teks, angak dan underline.";
    } else{
        $sql = "SELECT id FROM users_admin WHERE username = ?";
        
        if($stmt = mysqli_prepare($koneksi, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            $param_username = trim($_POST["username"]);
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "Username sudah ada.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Silahkan refresh dan daftar kembali.";
            }

            mysqli_stmt_close($stmt);
        }
    }
    // Cek password
    if(empty(trim($_POST["password"]))){
        $password_err = "Silahkan input password anda.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password wajib minimal 6 karakter.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Cek konfirmasi passsowrd
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Silahkan konfirmasi password anda.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Konfirmasi password tidak sesuai.";
        }
    }
    
    // Check dan store ke my sql
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        $sql = "INSERT INTO users_admin (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($koneksi, $sql)){
           
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            if(mysqli_stmt_execute($stmt)){
                // Jika benar otw ke login
                header("location: login_admin.php?alert=benar");
            } else{
                echo "Oops! Silahkan refresh dan daftar kembali.";
            }

            mysqli_stmt_close($stmt);
        }
    }
    
    mysqli_close($koneksi);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-6col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Silahkan Mendaftar</h1>
                                    </div>
									
									<?php 
									if(!empty($login_err)){
									echo '<div class="alert alert-danger">' . $login_err . '</div>';
									}        
									?>
                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
									<div class="form-group">
										<label>Username</label>
										<input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
										<span class="invalid-feedback"><?php echo $username_err; ?></span>
									</div>    
									<div class="form-group">
										<label>Password</label>
										<input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
										<span class="invalid-feedback"><?php echo $password_err; ?></span>
									</div>
									<div class="form-group">
										<label>Password</label>
										<input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
										<span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
									</div>
									<div class="form-group">
										<input type="submit" class="btn btn-primary" value="Submit">
										
									</div>
									<p>Sudah memiliki akun? <a href="login_admin.php">Login sekarang</a>.</p>
									</form>
                                    <hr>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>