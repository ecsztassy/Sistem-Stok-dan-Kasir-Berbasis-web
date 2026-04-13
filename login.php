<?php
    @ob_start();
    session_start();
    if(isset($_POST['proses'])){
        require 'config.php';
            
        $user = strip_tags($_POST['user']);
        $pass = strip_tags($_POST['pass']);

        // Update query untuk mengambil role juga
        $sql = 'select member.*, login.user, login.pass, login.role
                from member inner join login on member.id_member = login.id_member
                where user =? and pass = md5(?)';
        $row = $config->prepare($sql);
        $row->execute(array($user,$pass));
        $jum = $row->rowCount();
        if($jum > 0){
            $hasil = $row->fetch();
            $_SESSION['admin'] = $hasil;
            // simpan role
            $_SESSION['role'] = $hasil['role'];
            echo '<script>alert("Login Sukses");window.location="index.php"</script>';
        }else{
            echo '<script>alert("Login Gagal");history.go(-1);</script>';
        }
    }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login • TB Ilham Abadi</title>

    <!-- Fonts & SB Admin 2 -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900&display=swap" rel="stylesheet">
    <link href="sb-admin/css/sb-admin-2.min.css" rel="stylesheet">
    
    <!-- Favicon icon -->
    <link rel="shortcut icon" href="IA.png" type="image/x-icon">

    <!-- Sentuhan ringan (tidak terlalu heboh) -->
    <style>
        body.bg-soft {
            /* gradasi halus, tetap clean */
            background: linear-gradient(180deg, #4e73df12 0%, #1cc88a12 100%);
        }
        .card-login {
            border-radius: 18px;
            border: 1px solid #2664afff;
            box-shadow: 0 12px 28px rgba(0,0,0,.06);
        }
        .brand-chip {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 10px 14px;
            border-radius: 999px;
            border: 1px solid #e5e9f2;
            background: #ffffffcc;
            color: #4b5563;
            font-weight: 700;
            letter-spacing: .2px;
            font-size: 14px;
        }
        .brand-chip i { color: #4e73df; }
        .subtitle {
            color: #6b7280; 
            font-size: 14px;
            margin-top: 6px;
        }
        .form-control-user {
            border-radius: 12px !important;
        }
        .btn-brand {
    border-radius: 12px;
    font-weight: 700;
    background-color: #A8BBA3;
    border: 1px solid #94a88e;
    color: #fff;
    transition: all .2s ease-in-out;
}
.btn-brand:hover {
    background-color: #94a88e;
    border-color: #94a88e;
    color: #fff;
}

        .muted {
            color: #9aa3af; font-size: 12px;
        }
    </style>
</head>

<body class="bg-soft">
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-md-5 mt-5">
                <div class="text-center mt-4">
                    <!-- Brand sederhana -->
                    <span class="brand-chip">
                        <i class="fas fa-cash-register"></i> TB Ilham Abadi
                    </span>
                </div>

                <div class="card o-hidden border-0 my-4 card-login">
                    <div class="card-body p-0">
                        <div class="p-5">
                            <div class="text-center mb-3">
                                <h4 class="h4 text-gray-900 mb-1"><b>Masuk</b></h4>
                                <div class="subtitle">Silakan login untuk mengakses sistem kasir & stok</div>
                            </div>

                            <form class="form-login" method="POST">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="user"
                                           placeholder="User ID" autofocus required autocomplete="username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" name="pass"
                                           placeholder="Password" required autocomplete="current-password">
                                </div>
                                <button class="btn btn-block btn-brand" name="proses" type="submit">
                                    <i class="fa fa-lock"></i> SIGN IN
                                </button>
                            </form>

                            <div class="text-center mt-3 muted">
                                © <script>document.write(new Date().getFullYear())</script> TB Ilham Abadi
                            </div>
                        </div>
                    </div>
                </div>

                

    <!-- Scripts -->
    <script src="sb-admin/vendor/jquery/jquery.min.js"></script>
    <script src="sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="sb-admin/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="sb-admin/js/sb-admin-2.min.js"></script>
</body>
</html>
