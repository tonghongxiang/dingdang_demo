<?php
/**
 * Created by PhpStorm.
 * User: tonghongxiang
 * Date: 2018/5/18
 * Time: 下午11:38
 */

$dbc=mysqli_connect('127.0.0.1','root','765256','dingdang')
or die("ERROR to connect mysqli");

$query="SELECT * FROM comments WHERE parent>=0";

$result=mysqli_query($dbc,$query);

$data_row=mysqli_num_rows($result);
echo "<div style='width: 700px;border: none'>";
if($data_row <=0){
    echo "用户暂无评论";
    mysqli_close($dbc);
}else {
    for ($i = 0; $i < $data_row; $i++) {
        $sql_arr = mysqli_fetch_assoc($result);
        $id=$sql_arr['com_id'];
        $user_nickname=$sql_arr['user_nickname'];
        $parent_son=$sql_arr['parent'];
        $time=$sql_arr['time'];
        $title=$sql_arr['title'];
        $produce_name=$sql_arr['produce_name'];
        $content=$sql_arr['content'];

        echo "<div style='border: 1px solid rgba(0,0,0,0.3);margin-top: 30px'>
                <div style='border-bottom: 1px solid rgba(0,0,0,0.07);padding: 5px 10px 5px 10px'><span>标题：$title</span>
                <span style='margin-left: 60px'>产品：$produce_name</span><sapn style='position: relative;float: right'>时间：$time</sapn><br>   
                <span>用户：$user_nickname</span><br>
                <span>内容：$content</span></div>";

            if($parent_son>0){
                $query1="SELECT * FROM comments WHERE com_id=$parent_son";
                $result1=mysqli_query($dbc,$query1);
                $sql_arr1 = mysqli_fetch_assoc($result1);
                $name1=$sql_arr1['user_nickname'];
                $comments1=$sql_arr1['content'];
                $time1=$sql_arr1['time'];
            echo "<div style='border-bottom: 1px solid rgba(0,0,0,0.07);padding: 5px 10px 5px 10px'>
                <sapn style='position: relative;float: right'>时间：$time1</sapn><br>
                <span>用户：$name1 </span><i class=' icon-share-alt'></i><span></span> $user_nickname</span><br>
                <span>内容：$comments1</span></div>
                <textarea id='$id'  type='text'  style='width: 100%;height:50px;border: rgba(0,0,0,0.1)' placeholder='  回复内容'></textarea></div>
                <button  name='$id' class='bt_pinglun1'>删除</button><button name='$id' class='bt_pinglun2'>重新回复</button>";
          }else{
                echo "<textarea id='$id'  type='text'  style='width: 100%;height:50px;border: rgba(0,0,0,0.1)' placeholder='  回复内容'></textarea></div>
          <button  name='$id' class='bt_pinglun1'>删除</button><button name='$id' class='bt_pinglun2'>回复</button>";
            }


    }
}
echo "</div>";