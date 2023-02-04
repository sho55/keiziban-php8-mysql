<?php
session_start();
$title = 'ユーザー登録-PHP8掲示板';
$description = '新規登録';
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

<style>
    .tab-item {
        flex-grow: 1;
        padding: 5px;
        list-style: none;
        border: solid 1px #CCC;
        border-radius: 20px 20px 0 0;
        text-align: center;
        cursor: pointer;
    }

    .t-area ul {
        padding: 0;
    }

    .area {
        display: none;
    }

    .tab-item.is-active {
        background: #7c7c7c;
        color: #FFF;
        transition: all 0.3s ease-out;
    }
</style>

<body>

    <!-- ヘッダー -->
    <?php include($header_path); ?>
    <div class="container">
        <div class="row justify-content-center mt-3">
            <!-- メイン -->
            <div class="col-10 col-md-6">
                <?php
                if (isset($_SESSION['message'])) {
                ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> <?php echo $_SESSION['message'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php } ?>
                <div class="t-area">
                    <ul class="d-flex">
                        <li class="tab-item tab-01 is-active">ログイン</li>
                        <li class="tab-item tab-02">ユーザー登録</li>
                    </ul>
                    <div class="">
                        <div class="area tab-01 d-block">
                            <h2 class="text-center">ログイン</h2>
                            <form action="<?php echo $path ?>controller/auth_login_controller.php" method="post">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <input type="hidden" name="is_login" value="1">
                                <div class="my-3 row">
                                    <label for="exampleFormControlInput1" class="col-sm-2 form-label">E-mail</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" required />
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">パスワード</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password" class="form-control" id="inputPassword" required />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="mt-2 text-center">
                                            <a href="#" class="d-inline-block"><input type="submit" class="form-control btn btn-outline-primary" value="ログイン"></a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="area tab-02">
                            <h2 class="text-center">ユーザー登録</h2>
                            <form action="<?php echo $path ?>controller/auth_register_controller.php" method="post" onsubmit="return confirm_dialog()">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <div class="my-3 row">
                                    <label for="exampleFormControlInput1" class="col-sm-2 form-label">E-mail</label>
                                    <div class="col-sm-10">
                                        <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" required />
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputPassword" class="col-sm-2 col-form-label">パスワード</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password" class="form-control" id="inputPassword" required />
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputUserName" class="col-sm-2 col-form-label">ユーザー名</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control" id="inputUserName" required />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <div class="mt-2 text-center">
                                            <a href="#" class="d-inline-block"><input type="submit" class="form-control btn btn-outline-primary" value="登録する"></a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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

    ///タブ切り替え///
    document.addEventListener('DOMContentLoaded', function() {

        const tabs = document.getElementsByClassName('tab-item');
        for (let i = 0; i < tabs.length; i++) {
            tabs[i].addEventListener('click', tabSwitch);
        }

        function tabSwitch() {
            const ancestorEle = this.closest('.t-area');
            ancestorEle.getElementsByClassName('is-active')[0].classList.remove('is-active');
            this.classList.add('is-active');

            ancestorEle.getElementsByClassName('d-block')[0].classList.remove('d-block');
            const groupTabs = ancestorEle.getElementsByClassName('tab-item');
            const arrayTabs = Array.prototype.slice.call(groupTabs);
            const index = arrayTabs.indexOf(this);
            ancestorEle.getElementsByClassName('area')[index].classList.add('d-block');
        };
    });
</script>

</html>