<?php
$res = [];
?>

<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <!-- PC -->
        <div class="container-fluid d-none d-md-flex">
            <ul class="d-flex flex-row py-2">
                <li class="mx-2 list-unstyled"><a class="text-white text-decoration-none" href="<?php echo $path . 'index.php' ?>"><button type="button" class="btn btn-primary">TOP</button></a></li>
            </ul>

            <?php
        
            if (isset($_SESSION['is_login'])) {
            ?>
                <!-- Member -->
                <ul class="d-flex flex-row py-2">
                    <li class="mx-2 list-unstyled"><a class="text-white text-decoration-none" href="<?php echo $path . 'views/post/create.php' ?>"><button type="button" class="btn btn-success">投稿する</button></a></li>
                    <li class="mx-2 list-unstyled"><a class="text-white text-decoration-none" href="<?php echo $path . 'views/mypage/index.php' ?>"><button type="button" class="btn btn-danger">マイページ</button></a></li>
                    <li class="mx-2 list-unstyled"><input type="button" value="ログアウト" class="btn btn-dark" onclick="logout('<?php echo $path . 'controller/auth_logout_controller.php' ?>')">
                        <!-- <li class="mx-2 list-unstyled"><a class="text-white text-decoration-none" href="<?php echo $path . 'auth/logout.php' ?>"><button type="button" class="btn btn-dark">ログアウト</button></a></li> -->
                    </li>
                </ul>
            <?php
            } else {
            ?>
                <!-- Guest -->
                <ul class="d-flex flex-row py-2">
                    <li class="mx-2 list-unstyled"><a class="text-white text-decoration-none" href="<?php echo $path . 'views/auth/registerOrLogin.php' ?>"><button type="button" class="btn btn-danger">ログイン/新規登録</button></a></li>
                </ul>
            <?php
            }
            ?>

        </div>
        <!-- SP -->
        <div class="container-fluid d-flex d-md-none">
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    MENU
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="<?php echo $path . 'index.php' ?>">TOP</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<script>
    function logout(path) {
        if (confirm("ログアウト")) {
            window.location.href = path;
            // var dt = new Date('1999-01-01T23:59:59Z'); // 過去の日付をGMT形式に変換
            // document.cookie = "is_login=; expires=" + dt.toUTCString();
            // document.cookie = "is_login=; max-age=0";
            // document.cookie = "name=; max-age=0";
            // document.cookie = "email=; max-age=0";
            // alert(document.cookie); // cookieが表示されません
        }
    }
</script>