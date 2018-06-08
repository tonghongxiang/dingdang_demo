<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>评论墙</title>
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="css/default.css">
    <link rel="stylesheet" type="text/css" href="css/styles_show.css">
</head>
<style type="text/css">
    .img_show {
        width: 550px;
        height:400px;
        margin-bottom: 20px;

    }
    .img_show:hover{
        transform: scale(1.4);
        border-radius: 10px;
    }
</style>
<body>
<article class="htmleaf-container">
    <header class="htmleaf-header bgcolor-8">
        <h1>评价详情</h1>
        <div class="htmleaf-links">
            <a href="./index.html" title="主页" target="_blank">主页</a>
            <a  href="./person.html" title="返回个人中心" target="_blank">个人</a>
        </div>
    </header>
    <ul class="grid">
        <?php
        /**
         * Created by PhpStorm.
         * User: tonghongxiang
         * Date: 2018/4/26
         * Time: 下午6:37
         */

        $pro_type=$_COOKIE['pro_type'];

        $dbc=mysqli_connect('127.0.0.1','root','765256','dingdang')
        or die("ERROR to connect mysqli");

        $query="SELECT * FROM comments WHERE produce_name LIKE '%$pro_type%' AND parent>=0";
        $query1="SELECT * FROM comments WHERE produce_name LIKE '%$pro_type%' AND parent>=0";

        $result=mysqli_query($dbc,$query);
        $result1=mysqli_query($dbc,$query1);

        $data_row=mysqli_num_rows($result);



        for ($i=0;$i<$data_row;$i++) {
            $sql_arr = mysqli_fetch_assoc($result);
            $produce_id=$sql_arr['produce_id'];
            $content=$sql_arr['content'];
            $time=$sql_arr['time'];
            $title=$sql_arr['title'];
            $user_nickname=$sql_arr['user_nickname'];
            $pinglun_img=$sql_arr['pinglun_img'];
            $produce_name=$sql_arr['produce_name'];
            echo "
			<li class=\"grid__item grid__item--4\">
				<a href=\"\" class=\"grid__link\">
					<h2 class=\"grid__title\">标题：$title</h2>
					<p>$produce_name</p>
				</a>
			</li>
	  
		";

        }

        echo "</ul>";

        for ($m=0;$m<$data_row;$m++) {
            $sql_arr1 = mysqli_fetch_assoc($result1);
            $produce_id1=$sql_arr1['produce_id'];
            $ord_id1=$sql_arr['Order_ID'];
            $title1=$sql_arr1['title'];
            $content1=$sql_arr1['content'];
            $time1=$sql_arr1['time'];
            $parent_son=$sql_arr1['parent'];
            $user_nickname1=$sql_arr1['user_nickname'];
            $pinglun_img1=$sql_arr1['pinglun_img'];
            $id=$sql_arr['com_id'];
            $array= explode(",",$pinglun_img1);

            echo "<section class=\"post\">
			<article class=\"post__wrapper\">
				<h1>$title1</h1>
				<h3>Posted by $user_nickname1 $time1</h3>
				<p>$content1</p>";

            if($parent_son>0){
                $query3="SELECT * FROM comments WHERE com_id=$parent_son";
                $result3=mysqli_query($dbc,$query3);
                $sql_arr3 = mysqli_fetch_assoc($result3);
                $name3=$sql_arr3['user_nickname'];
                $comments1=$sql_arr3['content'];
                $time3=$sql_arr3['time'];
                echo "<div style='border-top: 1px solid rgba(0,0,0,0.15);word:100%;margin-bottom: 20px'><span>管理员：$name3<span style='float: right'>回复时间：$time3</span><br>
                <span>$comments1</span></div>";
            }

            echo "
				<div class='img_show' style='background-image: url(../upload/pinglun/$array[0]);background-size:100%;background-repeat: no-repeat'></div>
				<div class='img_show' style='background-image: url(../upload/pinglun/$array[1]);background-size:100%;background-repeat: no-repeat'></div>
				<div class='img_show' style='background-image: url(../upload/pinglun/$array[2]);background-size:100%;background-repeat: no-repeat'></div>
			</article>
			<a href=\"\" class=\"post__back\">
				<svg width=\"24\" height=\"24\" viewBox=\"0 0 24 24\"><path d=\"M4 11h5v-6h-5v6zm0 7h5v-6h-5v6zm6 0h5v-6h-5v6zm6 0h5v-6h-5v6zm-6-7h5v-6h-5v6zm6-6v6h5v-6h-5z\"/><path d=\"M0 0h24v24h-24z\" fill=\"none\"/>
		</svg> Back to posts
			</a>
			<a href=\"\" class=\"post__forw\">
				Next post<svg width=\"24\" height=\"24\" viewBox=\"0 0 24 24\"><path d=\"M0 0h24v24h-24z\" fill=\"none\"/><path d=\"M12 4l-1.41 1.41 5.58 5.59h-12.17v2h12.17l-5.58 5.59 1.41 1.41 8-8z\"/></svg> 
			</a>
		</section>

		";

        }
        mysqli_close($dbc);
        ?>

        <script src="js/jquery-2.1.0.min.js"></script>
        <script>
            window.onload=function () {

                $("#container").load("php/pinglun_show.php");

            };

            var ZoomGrid = (function() {
                var w = $(window);
                var grid = $('.grid');
                var item = $('.grid__item');
                var itemContent = item.find('.grid__link');
                var post = $('.post');
                var backBtn = post.find('.post__back');
                var nextBtn = post.find('.post__forw');
                var breakpoint = 700;
                var isBig = false;

                var zoom = function(event) {
                    var content = $(this).find('.grid__link');
                    var self = $(this);
                    var index = self.index();
                    var vw = w.innerWidth();
                    var vh = w.innerHeight();
                    var ds = $(document).scrollTop();
                    var px = event.pageX;
                    var py = event.pageY;

                    // scale stuff
                    var iw = $(this).innerWidth();
                    var ih = $(this).innerHeight();
                    var sx = vw/iw;
                    var sy = vh/ih;

                    // transform-origin stuff
                    var o = $(this).offset();
                    var xc = vw/2;
                    var yc = ds + vh/2;

                    var dsp = ds/ (vh+ds) * 100;

                    tox = px/vw *100;
                    toy = py/vh *100;
                    toy = toy - dsp;

                    if (!isBig && vw >= breakpoint) {
                        grid.css({
                            'transform-origin': tox + '% ' + toy + '%'
                        });

                        setTimeout(function() {
                            requestAnimationFrame(function() {
                                grid.css({
                                    'transform-origin': tox + '% ' + toy + '%',
                                    'transform': 'scale(' + sx + ',' + sy + ')'
                                });
                                itemContent.css({'opacity': '0'});
                                $('body').css('overflow', 'hidden');
                                showPost(index); // show post function
                                isBig = true;
                            });

                        }, 50);


                    } else {
                        // this stuff happens at the breakpoint/smaller screens

                        itemContent.css({
                            'opacity': '0'
                        });
                        showPost(index);
                        isBig = true;
                    }
                    return false;
                };

                var zoomout = function() {
                    // reset grid back to normal/hide post
                    if (isBig) {
                        post.addClass('post--hide');
                        post.removeClass('post--active');
                        post.on('transitionend', function() {
                            grid.css({
                                'transform': 'scale(1)'
                            });
                            itemContent.css({'opacity': '1'});
                            $('body').removeAttr('style');
                            post.off('transitionend');
                        });

                        isBig = false;
                    }
                    return false;
                };

                var showPost = function(index) {
                    post.eq(index).removeClass('post--hide').addClass('post--active');
                };

                var nextPost = function() {
                    var cur = $('.post--active');
                    var next = cur.next('.post');
                    if (!next.length) {
                        next = post.first();
                    }
                    cur.addClass('post--hide').removeClass('post--active');
                    next.removeClass('post--hide').addClass('post--active');
                    return false;
                };

                var bindActions = function() {
                    item.on('click', zoom);
                    backBtn.on('click', zoomout);
                    nextBtn.on('click', nextPost);
                };

                var init = function() {
                    bindActions();
                };

                return {
                    init: init
                };

            }());

            ZoomGrid.init();
        </script>
</body>
</html>