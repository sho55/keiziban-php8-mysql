<!DOCTYPE html>
<html lang="ja">

<?php

$title = 'ログアウト-PHP8掲示板';
$description = 'ログアウト';
$path = '../../';

// Path List //
$header_path = $path . 'layout/header.php';
$footer_path = $path . 'layout/footer.php';
$head_path = $path . 'common/head.php';
// require_once($path . 'common/session.php');


?>
</head>

<body>

    <!-- ヘッダー -->
    <?php include($header_path); ?>
    <div class="container">
        <div class="row justify-content-center mt-3">
            <!-- メイン -->
            <div class="col-10 col-md-6">
                <p>ログアウトしました</p>
            </div>
        </div>
    </div>
    <!-- フッター -->
    <?php include $footer_path; ?>
</body>

</html>