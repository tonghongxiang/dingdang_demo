<?php
/**
 * Created by PhpStorm.
 * User: tonghongxiang
 * Date: 2018/4/26
 * Time: 下午6:37
 */

$dbc=mysqli_connect('127.0.0.1','root','765256','dingdang')
or die("ERROR to connect mysqli");

$query="SELECT * FROM comments";

$result=mysqli_query($dbc,$query);

$data_row=mysqli_num_rows($result);



for ($i=0;$i<$data_row;$i++) {
    $sql_arr = mysqli_fetch_assoc($result);
    $produce_id=$sql_arr['produce_id'];
    $content=$sql_arr['content'];
    $time=$sql_arr['time'];
    $user_nickname=$sql_arr['user_nickname'];
    $pinglun_img=$sql_arr['pinglun_img'];

    echo "<section class=\"post\">
			<article class=\"post__wrapper\">
				<h1>Brooklyn Put A Bird On It</h1>
				<h3>Posted by $user_nickname</h3>
				<p>$content</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere excepturi nisi ipsam est. Molestias fuga nemo sit, porro amet. Qui ut recusandae quam ad itaque magnam, autem quae vitae, perspiciatis.</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Suscipit porro ullam eaque voluptatem, a, id cum tempora at error! Quidem in dolorum voluptate, dolorem ut mollitia earum ab ex qui!</p>
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


