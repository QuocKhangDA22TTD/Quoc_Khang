<?php session_start(); ?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/main.css">
</head>
<body>
    <div class="container">
        <header>
            <div class="logo">
                <a href="./index.php">BKTT</a>
            </div>
            <div class="form">
                <div id="searchForm">
                    <input type="search" id="keySearch" name="key_val" onkeyup="liveSearch(this.value)">
                    <input type="submit" onclick="searchArticlePage()" value="tìm kiếm">
                </div>
                <div id="searchList"></div>
            </div>
            <div class="account">
                <a href="#" onclick="getSigninForm()">ĐĂNG NHẬP</a>
                <span class="dash">/</span>
                <a href="#" onclick="getLoginForm()">ĐĂNG KÝ</a>
            </div>
            <div class="menuIcon">
                <div class="bar"></div>
                <div class="bar"></div>
                <div class="bar"></div>
            </div>
        </header>
        <nav>
            <a href="./index.php" onclick="getHome()">TRANG CHỦ</a>
            <a href="./intro.html">GIỚI THIỆU</a>
            <a href="./posting.php">ĐÓNG GÓP</a>
            <span id="userAccount"><?php echo $_SESSION['userName']; ?></span>
        </nav>
        <main>
            <div class="topMain">
                <p>
                    <span id="article">0</span> bài viết và <span id="member">0</span> thành viên
                </p>
            </div>
            <div class="mainContent">
                <form action="./server/ini/insertContent.ini.php" method="post" enctype="multipart/form-data">
                    <label for="title">TIÊU ĐỀ</label>
                    <br>
                    <input type="text" id="title" name="title_val">
                    <br>
                    <label for="major">CHUYÊN NGÀNH</label>
                    <br>
                    <!-- <input type="text" id="major" name="major_val"> -->
                    <select name="major_val" id="major">
                        <option value="lịch sử">lịch sử</option>
                        <option value="quân sự">quân sự</option>
                        <option value="văn hóa">văn hóa</option>
                        <option value="địa lí">địa lí</option>
                        <option value="kiến trúc">kiến trúc</option>
                        <option value="công nghệ thông tin">công nghệ thông tin</option>
                        <option value="game">game</option>
                        <option value="địa chất">địa chất</option>
                    </select>
                    <br>
                    <label for="title">NỘI DUNG BÀI VIẾT</label>
                    <br>
                    <textarea name="content_val" id="content"></textarea>
                    <br>
                    <input style="display: none;" type="text" id="accountName" name="userAccount_val">
                    <input type="file" id="introImage" name="introImage_val">
                    <input type="submit" value="ĐĂNG BÀI">
                </form>
            </div>
            <div id="listOfmajors"></div>
            <div id="login_and_signin_form">
                <div id="loginForm">
                    <form action="./server/ini/login.ini.php" method="post">
                        <h1>ĐĂNG KÝ</h1>
                        <label for="userName">TÊN: </label>
                        <input type="text" id="userName" name="userName_val">
                        <br>
                        <br>
                        <label for="userPassword">MẬT KHẨU: </label>
                        <input type="password" id="userPassword" name="userPassword_val">
                        <br>
                        <br>
                        <input type="submit" value="ĐĂNG KÝ">
                    </form>
                </div>
                <div id="signinForm">
                    <form action="./server/ini/signin.ini.php" method="post">
                        <h1>ĐĂNG NHẬP</h1>
                        <label for="userName">TÊN: </label>
                        <input type="text" id="userName" name="userName_val">
                        <br>
                        <br>
                        <label for="userPassword">MẬT KHẨU: </label>
                        <input type="password" id="userPassword" name="userPassword_val">
                        <br>
                        <br>
                        <input type="submit" value="ĐĂNG KÝ">
                    </form>
                </div>
            </div>
        </main>
        <footer>
            <div class="contact">
                <p>
                    email: <span class="emailInfo">BKTT@gmail.com</span>
                    <br>
                    Phone number : <span class="phoneNumberInfo">099 212 455</span>
                    <br>
                    facebook: <a class="facebookInfo" href="#"></a>
                </p>
            </div>
        </footer>
    </div>
    <script>
        var userAccount = document.getElementById('userAccount').innerText;
        document.getElementById('accountName').value = userAccount;
    </script>
    <script src="./assets/js/get_article_content.js"></script>
    <script src="./assets/js/js.js"></script>
</body>
</html>