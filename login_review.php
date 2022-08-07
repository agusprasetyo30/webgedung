<?php
// Buat sesi baru
session_start();
 
// Cek sesi jika masih ada langsung ke menu penyewa index, kalau belum ada ya load page ini
if(isset($_SESSION["loggedin_review"]) && $_SESSION["loggedin_review"] === true){
    header("location: review_index.php?url=review_pengecekan");
    exit;
}
 
// Perlu file config db
require_once "function.php";
 
// Definisi pass dan username
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// POST Metode
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Jika username kosong
    if(empty(trim($_POST["username"]))){
        $username_err = "Silahkan input username anda";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Jika password kosong
    if(empty(trim($_POST["password"]))){
        $password_err = "Silahkan input password anda.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validasi db sql
    if(empty($username_err) && empty($password_err)){
        $sql = "SELECT id, username, password FROM users_review WHERE username = ?";
        
        if($stmt = mysqli_prepare($koneksi, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            $param_username = $username;
            
            if(mysqli_stmt_execute($stmt)){
                //Store hasil ke sql
                mysqli_stmt_store_result($stmt);
                
                // Verifikasi password
                if(mysqli_stmt_num_rows($stmt) == 1){      
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Jika password benar akan sesi baru
                            session_start();
                            
                            // Store data sesi loggedin
                            $_SESSION["loggedin_review"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect ke page index penyewa
                            header("location: review_index.php?url=review_pengecekan");
                        } else{
                            // Kalau kebalikannya
                            $login_err = "Username atau password salah.";
                        }
                    }
                } else{
                    // kalau username/password salah
                    $login_err = "Username atau password salah.";
                }
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

    <title>Login</title>

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
                                        <h1 class="h4 text-gray-900 mb-4">Silahkan masuk</h1>
                                    </div>
									
									<!-- Nontifkasi -->
									<?php 
									if(isset($_GET['alert'])){
									if($_GET['alert'] == "gagal"){
									?>
									<div class="alert alert-danger">Pendaftaraan gagal. Hubungi admin.</div>
									<?php
									} else if ($_GET['alert'] == "logindulu"){
									?>
									<div class="alert alert-danger">Silahkan login dahulu.</div>
									<?php
									} else if ($_GET['alert'] == "logout"){
									?>
									<div class="alert alert-success">Anda berhasil logout.</div>
									<?php
									} else if ($_GET['alert'] == "logout"){
									?>
									<div class="alert alert-success">Sesi lain telah di logout. Silahkan login kembali</div>
									<?php
									} else{
									?>
									<div class="alert alert-success">Berhasil. Silahkan login</div>
									<?php
										}
									}
									?>
									
									<!-- Nontifkasi jika ada yang kosong -->
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
										<input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
										<span class="invalid-feedback"><?php echo $password_err; ?></span>
									</div>
									<div class="form-group">
										<input type="submit" class="btn btn-primary" value="Login">
									</div>
									</form>
                                    <hr>
                                    <p>Kembali ke <a href="index.php">Landing</a>.</p>
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