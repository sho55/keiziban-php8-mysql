<?php
session_start();
$title = '新規投稿-PHP8掲示板';
$description = '投稿機能';
$path = './';

// Path List //
$header_path = $path . 'layout/header.php';
$footer_path = $path . 'layout/footer.php';
$head_path = $path . 'common/head.php';
// $cookie_path = $path . 'common/session.php';

require_once($path . 'common/database.php');
$items = postList();

?>

<!DOCTYPE html>
<html lang="ja">
<?php
//head //
include $head_path;
?>
</head>
</head>

<style lang="scss">
    .wrap-content {
        margin-bottom: 60px;
    }

    img {
        margin: auto;
        width: 80%;
    }

    .item {
        padding: 0 5px;
        text-decoration: none;
    }

    .item-card {
        transition: 0.5s;
        cursor: pointer;
    }

    .item-card-title {
        font-size: 15px;
        transition: 1s;
        cursor: pointer;
    }

    .item-card-title i {
        font-size: 15px;
        transition: 1s;
        cursor: pointer;
        color: #ffa710
    }

    .card:hover {
        /* transform: scale(1.05); */
        box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.3);
    }

    .card-text {
        height: auto;
        padding: 5px 0;
    }

    .card::before,
    .card::after {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        transform: scale3d(0, 0, 1);
        transition: transform .3s ease-out 0s;
        background: rgba(255, 255, 255, 0.1);
        content: '';
        pointer-events: none;
    }

    .card::before {
        transform-origin: left top;
    }

    .card::after {
        transform-origin: right bottom;
    }

    .until-2lines {
        -webkit-line-clamp: 2;
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>

<body>

    <!-- ヘッダー -->
    <?php include_once($header_path); ?>
    <div class="container wrap-content">
        <div class="row justify-content-center">
            <!-- メイン -->
            <div class="col-12 col-md-6 p-2">
                <!-- lists -->
                <?php foreach ($items as $item) { ?>
                    <div class="col-12 item mb-3">
                        <a href="/views/post/detail.php?id=<?php echo $item['id'] ?>" class="text-decoration-none link-dark">
                            <div class="card item-card card-block p-3">
                                <h4 class="card-title text-right"><i class="material-icons"><?php echo $item['title'] ?></i></h4>
                                <div class="card-text until-2lines"><?php echo $item['body'] ?></div>
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- フッター -->
    <?php include_once $footer_path; ?>
</body>

</html>