<?php
session_start();
$title = '新規投稿-PHP8掲示板';
$description = '投稿機能';
$path = '../../';
$header_path = $path . 'layout/header.php';
$footer_path = $path . 'layout/footer.php';
$head_path = $path . 'common/head.php';
?>

<!DOCTYPE html>
<html lang="ja">
<?php
//head //
include $head_path;
?>
</head>

<body>
    <!-- ヘッダー -->
    <?php include($header_path); ?>
    <div class="container">
        <div class="row justify-content-center mt-3">
            <!-- メイン -->
            <div class="col-10 col-md-6">
                <div class="text-center">
                    <h2>新規投稿</h2>
                </div>
                <form action="<?php echo $path ?>controller/post_create_controller.php" method="post" onsubmit="return confirm_dialog()">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">
                    <div class="form-group row">
                        <div class="mt-2">
                            <label for="titleLabel" class="col-sm-2 col-form-label col-form-label-sm fw-bold">タイトル</label>
                        </div>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="title" id="titleLabel">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="mt-2">
                            <label for="bodyLabel" class="col-sm-2 col-form-label col-form-label-sm fw-bold">内容</label>
                        </div>
                        <div class="col-sm-12">
                            <textarea name="body" class="form-control" id="bodyLabel" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <div class="mt-4 text-center">
                                <a href="#" class="d-inline-block"><input type="submit" class="form-control btn btn-outline-primary" value="投稿する"></a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- フッター -->
    <?php include($footer_path); ?>
</body>
<script>
    function confirm_dialog() {
        return window.confirm('送信しますか？');
    }
</script>

</html>