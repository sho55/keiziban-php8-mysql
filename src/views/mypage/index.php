<?php
session_start();
$title = 'マイページ-PHP8掲示板';
$description = 'マイページ';
$path = '../../';

// Path List //
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
                <form action="<?php echo $path ?>controller/auth_edit_controller.php" method="post" onsubmit="return confirm_dialog()">
                    <input type="hidden" class="" name="uid" value="<?php echo isset($_SESSION['id']) ? $_SESSION['id'] : ''; ?>" >
                    <div class="d-flex">
                        <table class="table">
                            <tr>
                                <th>ユーザー名</th>
                                <td>
                                    <div class="edit_input"><?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ''; ?></div>
                                    <input type="text" class="edit_input d-none" name="name" value="<?php echo $_SESSION['name'] ?>">
                                </td>
                            </tr>
                            <tr>
                                <th>メールアドレス</th>
                                <td>
                                    <div class="edit_input"><?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?></div>
                                    <input type="text" class="edit_input d-none" name="email" value="<?php echo $_SESSION['email'] ?>">
                                </td>
                            </tr>
                            <tr>
                                <th>パスワード</th>
                                <td>
                                    <div class="edit_input">************</div>
                                    <input type="text" class="edit_input d-none" name="password" value="">
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="d-block text-center">
                        <button onclick="updateUser()" class="btn btn-lg btn-success edit_input d-none">変更</button>
                    </div>
                </form>
                <div class="d-block">
                    <button onclick="editMode()" class="btn btn-outline-success edit_input">編集モード</button>
                    <span onclick="editMode()" class="text-danger edit_input d-none" style="cursor: pointer;">取り消し</span>
                </div>
            </div>


        </div>
    </div>
    <!-- フッター -->
    <?php include $footer_path; ?>
</body>

<script>
    function confirm_dialog() {
        return window.confirm('送信しますか？');
    }

    function editMode() {
        const el = document.getElementsByClassName('edit_input');
        // console.log(el);
        for (let i = 0; i < el.length; i++) {
            const element = el[i];
            isCheck = element.classList.contains('d-none');
            // console.log(isCheck);
            isCheck ? element.classList.remove('d-none') : element.classList.add('d-none');
        }
    }

    function updateUser() {
        const el = document.getElementsByClassName('edit_input');
        // console.log(el);
        for (let i = 0; i < el.length; i++) {
            const element = el[i];
            isCheck = element.classList.contains('d-none');
            // console.log(isCheck);
            isCheck ? element.classList.remove('d-none') : element.classList.add('d-none');
        }
    }
</script>