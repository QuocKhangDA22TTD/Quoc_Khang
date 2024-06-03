        // bài viết nhiều lượt xem nhất
        const mostView = new XMLHttpRequest();
        mostView.onload = function() {
            document.getElementById('mostViews').innerHTML = this.responseText;
        }
        mostView.open("GET", "./server/mostView.php");
        mostView.send();

        // bài viết mới nhất
        const latest = new XMLHttpRequest();
        latest.onload = function() {
            document.getElementById('latest').innerHTML = this.responseText;
        }
        latest.open("GET", "./server/latest.php");
        latest.send();

        // bài viết được tìm kiếm nhiều nhất
        const hotNews = new XMLHttpRequest();
        hotNews.onload = function() {
            document.getElementById('hotNews').innerHTML = this.responseText;
        }
        hotNews.open("GET", "./server/hotNews.php");
        hotNews.send();

        // bài viết theo chủ đề
        const major = new XMLHttpRequest();
        major.onload = function() {
            document.getElementById('majors').innerHTML = this.responseText;
        }
        major.open("GET", "./server/major.php");
        major.send();

        // số bài viết
        const article = new XMLHttpRequest();
        article.onload = function() {
            document.getElementById('article').innerHTML = this.responseText;
        }
        article.open("GET", "./server/getNumOfArticle.php");
        article.send();

        // số thành viên
        const member = new XMLHttpRequest();
        member.onload = function() {
            document.getElementById('member').innerHTML = this.responseText;
        }
        member.open("GET", "./server/getMember.php");
        member.send();

        function getHome() {
            document.getElementsByClassName('mainContent')[0].style.display = 'flex';
            document.getElementById('listOfmajors').style.display = 'none';
            document.getElementById('loginForm').style.display = "none";
            document.getElementById('signinForm').style.display = "none";
        }

        function getMajors() {
            document.getElementsByClassName('mainContent')[0].style.display = 'none';
            document.getElementById('listOfmajors').style.display = 'block';
            document.getElementById('loginForm').style.display = "none";
            document.getElementById('signinForm').style.display = "none";
        }

        function getLoginForm() {
            document.getElementById('loginForm').style.display = "block";
            document.getElementsByClassName('mainContent')[0].style.display = 'none';
            document.getElementById('listOfmajors').style.display = "none";
            document.getElementById('signinForm').style.display = "none";
        }
        
        function getSigninForm() {
            document.getElementById('signinForm').style.display = "block";
            document.getElementById('loginForm').style.display = "none";
            document.getElementsByClassName('mainContent')[0].style.display = 'none';
            document.getElementById('listOfmajors').style.display = "none";
        }

        function createArticlePage(articleTitle) {
            const article = new XMLHttpRequest();
            article.onload = function() {
                document.getElementById('listOfmajors').innerHTML = this.responseText;
                document.getElementsByClassName('mainContent')[0].style.display = 'none';
                document.getElementById('signinForm').style.display = "none";
                document.getElementById('loginForm').style.display = "none";
                document.getElementById('listOfmajors').style.display = "block";
                
            }
            article.open("GET", "./server/createArticlePage.php?active=view&title=" + articleTitle);
            article.send();
        }

        function searchArticlePage() {
            const search = new XMLHttpRequest();
            search.onload = function() {
                document.getElementById('listOfmajors').innerHTML = this.responseText;
                document.getElementsByClassName('mainContent')[0].style.display = 'none';
                document.getElementById('signinForm').style.display = "none";
                document.getElementById('loginForm').style.display = "none";
                document.getElementById('searchList').innerHTML = "";
                document.getElementById('keySearch').value = "";
                document.getElementById('listOfmajors').style.display = "block";
                }
            var title = document.getElementById('keySearch').value;
            search.open("GET", "./server/createArticlePage.php?active=search&title=" + title);
            search.send();
        }

        function displayNav() {
            var nav = document.getElementsByTagName("nav")[0];
            nav.classList.toggle('displayNav');
        }

        function getSearchForm() {
            var form = document.getElementsByClassName("form")[0];
            form.classList.toggle('displaySearch');
        }

        function keyOpen(Skey) {
            const openKey = new XMLHttpRequest();
            openKey.onload = function() {
                document.getElementById('listOfmajors').innerHTML = this.responseText;
                displayNav();
                getSearchForm()
                document.getElementsByClassName('mainContent')[0].style.display = 'none';
                document.getElementById('signinForm').style.display = "none";
                document.getElementById('loginForm').style.display = "none";
                document.getElementById('searchList').innerHTML = "";
                document.getElementById('keySearch').value = "";
                document.getElementById('listOfmajors').style.display = "block";

            }

            openKey.open("GET", "./server/createArticlePage.php?active=search&title=" + Skey);
            openKey.send();
        }

        function liveSearch(Skey) {
            if(Skey.length == 0) {
                document.getElementById("searchList").innerHTML = "";
                return;
            }

            const searchKey = new XMLHttpRequest();
            searchKey.onload = function() {
                document.getElementById("searchList").innerHTML = this.response;
            }
            searchKey.open("GET", "./server/liveSearch.php?key=" + Skey);
            searchKey.send();
        }


        function randomArticle() {
            const random = new XMLHttpRequest();
            random.onload = function() {
                document.getElementById('listOfmajors').innerHTML = this.responseText;
                document.getElementsByClassName('mainContent')[0].style.display = 'none';
                document.getElementById('signinForm').style.display = "none";
                document.getElementById('loginForm').style.display = "none";
                document.getElementById('listOfmajors').style.display = "block";
                }
            random.open("GET", "./server/randomArticle.php");
            random.send();
        }

        // đi tới các danh mục chủ đề
        function get_article(majorName) {
            var nav = document.getElementsByTagName("nav")[0];
            nav.classList.toggle('displayNav');
            
            const historial_articles = new XMLHttpRequest();
            historial_articles.onload = function() {
                document.getElementById('listOfmajors').innerHTML = this.responseText;
            }
            historial_articles.open("GET", "./server/listOfMajors.php?major=" + majorName);
            historial_articles.send();
        }

        function insertComment() {
            const insert = new XMLHttpRequest();
            insert.onload = function() {
                document.getElementById('comment').innerHTML = this.response;
            }

            var comment = document.getElementById("comment_input").value;

            insert.open("GET", "./server/ini/comment.ini.php?comment=" + comment);
            insert.send();
        }