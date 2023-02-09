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
                <?php
                if (isset($_SESSION['is_login'])) {
                ?>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="<?php echo $path . 'index.php' ?>">TOP</a></li>
                        <li><a class="dropdown-item" href="<?php echo $path . 'views/post/create.php' ?>">投稿する</a></li>
                        <li><a class="dropdown-item" href="<?php echo $path . 'views/mypage/index.php' ?>">マイページ</a></li>
                        <li><input type="button" value="ログアウト" class="btn btn-dark" onclick="logout('<?php echo $path . 'controller/auth_logout_controller.php' ?>')"></li>
                    </ul>
                <?php
                } else {
                ?>
                    <!-- Guest -->
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="<?php echo $path . 'index.php' ?>">TOP</a></li>
                        <li><a class="text-white text-decoration-none dropdown-item" href="<?php echo $path . 'views/auth/registerOrLogin.php' ?>"><button type="button" class="btn btn-danger">ログイン/新規登録</button></a></li>
                    </ul>
                <?php
                }
                ?>
            </div>
        </div>
    </nav>
</header>

<script>
    function logout(path) {
        if (confirm("ログアウト")) {
            window.location.href = path;
        }
    }
</script>