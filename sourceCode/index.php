
<?php session_start();

if(isset($_SESSION['userName']) == false) {
    $_SESSION['userName'] = 'Guest';
}
?>
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
        <nav id="nn">
            <a href="./index.php" onclick="getHome()">TRANG CHỦ</a>
            <a id="mobileSearchForm" href="#" onclick="getSearchForm()">TÌM KIẾM</a>
            <a href="./intro.html">GIỚI THIỆU</a>
            <div class="dropDownOfCategory" onclick="getMajors()">
                <a href="#">THỂ LOẠI</a>
                <div class="dropDownContent">
                    <a href="#" onclick="get_article('lịch sử')">LỊCH SỬ</a>
                    <a href="#" onclick="get_article('quân sự')">QUÂN SỰ</a>
                    <a href="#" onclick="get_article('văn hóa')">VĂN HÓA</a>
                    <a href="#" onclick="get_article('địa lý')">ĐỊA LÝ</a>
                    <a href="#" onclick="get_article('kiến trúc')">KIẾN TRÚC</a>
                    <a href="#" onclick="get_article('công nghệ thông tin')">CÔNG NGHỆ THÔNG TIN</a>
                    <a href="#" onclick="get_article('game')">GAME</a>
                    <a href="#" onclick="get_article('Địa chất')">ĐỊA CHẤT</a>
                </div>
            </div>
            <a id="swichMobileForm" href="#" onclick="randomArticle()">BÀI VIẾT NGẪU NHIÊN</a>
            <a href="./posting.php">ĐÓNG GÓP</a>
            <a href="#" id="mobileFormSignin" onclick="getSigninForm()">ĐĂNG NHẬP</a>
            <a href="#" id="mobileFormLogin" onclick="getLoginForm()">ĐĂNG KÝ</a>
            <span id="userAccount"><?php echo $_SESSION['userName']; ?></span>
        </nav>
        <main>
            <div class="topMain">
                <p>
                    <span id="article">0</span> bài viết và <span id="member">0</span> thành viên
                </p>
            </div>
            <div class="mainContent">
                <div id="mostViews"></div>
                <div id="latest"></div>
                <div id="hotNews"></div>
                <div id="majors"></div>
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
                        <input type="submit" value="ĐĂNG NHẬP">
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
    <script src="./assets/js/get_article_content.js"></script>
    <script src="./assets/js/js.js"></script>
</body>
</html>
