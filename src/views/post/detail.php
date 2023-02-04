<?php
session_start();
$title = '投稿詳細-PHP8掲示板';
$description = '投稿詳細';
$path = '../../';
$header_path = $path . 'layout/header.php';
$footer_path = $path . 'layout/footer.php';


require_once($path . 'common/database.php');
$pid = $_GET['id'];
$item = postDetail($pid);
$item_user = userGetInfoById($item['user_id']);
?>

<!DOCTYPE html>
<html lang="ja">
<?php
//head
include $path . './common/head.php';
?>
</head>


<style lang="scss">
    img {
        margin: auto;
        width: 80%;
    }

    .item {
        padding: 0 5px;
    }

    .card-text {
        height: auto;
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
</style>

<body>
    <!-- ヘッダー -->
    <?php include($header_path); ?>
    <div class="container">
        <div class="row justify-content-center mt-3">
            <!-- メイン -->
            <div class="col-10 col-md-6">
                <div class="text-center">
                    <h2><?php echo $item['title'] ?></h2>
                </div>
                <div class="col-12 item mb-3">
                    <div class="card item-card card-block p-3">
                        <div class="card-text"><?php echo $item['body'] ?></div>
                        <div class="d-flex justify-content-between mt-2">
                            <div>by <strong> <?php echo $item_user['name'] ?></strong></div>
                            <div class="card-text text-black-50"><?php echo $item['created_at'] ?></div>
                        </div>
                    </div>
                </div>
                <!-- back BTN -->
                <div class="d-flex justify-content-between">
                    <button id="backBtn" class="btn btn-primary">戻る</button>
                    <?php if (isset($_SESSION['id'])) { ?>
                        <?php if ($item['user_id'] === $_SESSION['id']) { ?>
                            <form action="<?php echo $path ?>controller/post_delete_controller.php" method="post" onsubmit="return delete_dialog()">
                                <input type="hidden" name="pid" value="<?php echo $item['id']; ?>">
                                <input type="hidden" name="uid" value="<?php echo $_SESSION['id']; ?>">

                                <button type="submit" id="deleteBtn" class="btn btn-sm btn-outline-danger">削除する</button>
                            </form>
                        <?php } ?>
                    <?php } ?>
                </div>

            </div>
        </div>
    </div>
    <!-- フッター -->
    <?php include($footer_path); ?>
</body>
<script>
    function delete_dialog() {
        return window.confirm('削除しますか？');
    }

    let backBtn = document.getElementById('backBtn');
    backBtn.addEventListener('click', function() {
        history.back();
    });
</script>

</html>