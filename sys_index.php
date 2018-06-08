<!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>管理员后台</title>
	<link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/htmleaf-demo.css">
	<link rel="stylesheet" type="text/css" href="css/sysindex_style.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet"  href="css/pignose.tab.min.css">
	<link  rel="stylesheet" href="css/ggtooltip.css" />
    <link rel="stylesheet" href="css/samples-styles.css">
	<script language="JavaScript">
        function changeProvince() {
            with(document.myForm){
                var selectS=document.querySelectorAll(".select");
                var countrys=new Array();
                countrys["0"]=["--请选择大类--"];
                countrys["手机"]=["DingDangPhoneX1","DingDangPhoneX2","DingDangPhoneX3"];
                countrys["笔记本电脑"]=["xps13.3","xps15.6","xps19"];
                countrys["智能手表"]=["DDwatch1","DDwatch2","DDwatch3"];
                countrys["耳机"]=["solo1","solo2","solo wress"];



                var value=selectS[0].value;
                selectS[1].options.length=0;
                var option;
                for (i=0;i<countrys[value].length;i++){
                    option=new Option(countrys[value][i],countrys[value][i]);
                    selectS[1].options.add(option);
                    selectS[1].options.selected=countrys[value][0];
                }
                if (selectS[0].value=="0")
                    selectS[1].disabled=true;
                else
                    selectS[1].disabled=false;
            }
        }


	</script>
	<style>
		#t2:target ul .a1,
		#t3:target ul .a1,
		#t4:target ul .a1,
		#t5:target ul .a1,
        #t6:target ul .a1
		{
			color: white;
		}
		.a1{
			color: black;
			font-size: 0.5em;
			font-weight: 300;
		}

		.article {
		position: absolute;
		top: -40px;
			left: 0;
			right: 10%;
		max-width: 1000px;
		min-width: 400px;
		width: 80%;
		margin: 20px auto;
		padding-top: 40px;
		font-family: 'Raleway', 'helvetica', 'sans-serif';
		text-align: center;
			border: none;
		transform: translateX(360%);
		-webkit-transform: translateX(360%);
		-moz-transform: translateX(360%);
		-o-transform: translateX(360%);
		transition: all .5s cubic-bezier(.25, 1, .5, 1.25);
		-webkit-transition: all .5s cubic-bezier(.25, 1, .5, 1.25);
		-moz-transition: all .5s cubic-bezier(.25, 1, .5, 1.25);
		-o-transition: all .5s cubic-bezier(.25, 1, .5, 1.25);
		}


		.article table {
			background: rgba(255,255,255,0);
			font-size: 115%;
			text-align: center;
		}
		.article pre {
			font-size: 115%;
		}

		.tab { width: 100%; max-width: 1200px; margin: 20px auto; padding: 5px; }


        #user_sub{
            color: rgba(0,0,0,0.53);
            cursor: pointer;
            margin-left: 30px;
        }
        #user_sub:hover{
            color: #2aabd2;
        }

        #dele_user{
            color: #2aabd2;
            cursor: pointer;
        }
        #dele_user:hover{
            color: #a94442;
        }

        .icon-list-ul{
            color: #2aabd2;
            cursor: pointer;
        }
        .icon-list-ul:hover{
            color: #a94442;
        }
        .table1 tr:hover{
            background-color: rgba(0,0,0,0.1);
        }

		table{
			width: 100%;
			text-align: center;

		}
		table tr{

		}
		table tr:nth-child(odd){
			background:#f5f5f5 ;
		}
		tr td{
			color: black;
			font-weight: 300;
			border: none;
			padding: 5px;
		}
		label{
			color: #1a0202;
		}
		#add_user1{
			font-size: 2em;
			color: #00b4ef;
			z-index: 2
		}
		#add_user1:hover{
				color: #a94442;
			cursor: pointer;
		}
		#user_AddContainer{
			position: absolute;
			margin: 0 auto;
			text-align: center;
			background-color: silver;
			top: 85px;
			width: 100%;
			height: 540px;
			border: 1px silver dashed;
			display: none;
		}
		#container_home {
			min-width: 320px;
			max-width: 600px;
			margin-bottom: 50px;
		}
		.bt_home{
			position: relative;
			left: 210px;
			background-color: white;
			color: black;
			border: none;
		}
		.bt_home:hover{
			border-bottom: black solid 1px;
		}
		#produce_all_2{
			display: none;
			font-size: 0.8em;
			color: black;
		}
        .img_show:hover{
            transform: scale(7);
        }
        .filter-table .quick { margin-left: 0.5em; font-size: 0.8em; text-decoration: none; }/*订单搜索高亮提示*/
        .fitler-table .quick:hover { text-decoration: underline; }
        td.alt { background-color: #ffc; background-color: rgba(255, 255, 0, 0.2); }

        .bt_pinglun1{
            position: relative;left: 35%;border: 1px solid rgba(0,0,0,0.37);border-radius: 8px;color:black;background-color: transparent;;margin:20px 0 20px 40px;
        }
        .bt_pinglun1:hover{
            background-color: rgba(0,0,0,0.05);
            color: #a94442;
        }
        .bt_pinglun2{
            position: relative;left: 35%;border: 1px solid rgba(0,0,0,0.37);border-radius: 8px;color:black;background-color: transparent;margin:20px 0 20px 40px;
        }
        .bt_pinglun2:hover{
            background-color: rgba(0,0,0,0.05);
            color: #a94442;
        }
	</style>
</head>
<body>
<script type="text/javascript" src="./js/jquery-2.1.0.min.js"></script>
<script src="./code/highcharts.js"></script>
<script src="./code/highcharts-more.js"></script>
<script src="./code/modules/exporting.js"></script>


	<div class="ct" id="t1">
	  <div class="ct" id="t2">
	    <div class="ct" id="t3">
	      <div class="ct" id="t4">
	         <div class="ct" id="t5">
                 <div class="ct" id="t6">
	          <ul id="menu">
	            <a href="#t1"><li class="icon icon-home" id="uno" title="主页"></li></a><br><p class="a1">主页</p><br>
	            <a href="#t2"><li class="icon icon-user" id="dos"></li></a><br><p class="a1">用户服务</p><br>
	            <a href="#t3"><li class="icon icon-barcode" id="tres"></li></a><br><p class="a1">产品管理</p><br>
	            <a href="#t4"><li class="icon  icon-list-alt" id="cuatro"></li></a><br><p class="a1">订单管理</p><br>
	            <a href="#t5"><li class="icon icon-bar-chart" id="cinco" ></li></a><br><p class="a1">财务报表</p><br>
                <a href="#t6"><li class="icon icon-cogs" id="sys"></li></a><br><p class="a1">评论管理</p>
	          </ul>


				<div class="page" id="p1">
                    <div id="container_home1" style="min-width: 310px; height: 400px; max-width: 600px; margin-left: 20%;margin-top: 90px"></div>

				</div>



	          <div class="page" id="p2" style="font-size: 14px">
                  <div class="tab pignose-tab-response tab">
                      <ul style="min-width: 600px">
                          <li >
                              <a href="#">用户检索</a>
                              <div class="article">
                                  <div style="text-align: center">
                                      <input id="user_phone" type="tel" placeholder="手机号" name="user_phone" style='width: 180px;border:none;border-bottom:1px solid rgba(0,0,0,0.25);background-color: transparent;color: black;margin-right: 20px'>
                                      <input id="user_name" type="text" placeholder="昵称" name="user_name" style='width: 180px;border:none;border-bottom:1px solid rgba(0,0,0,0.25);background-color: transparent;color: black;margin-right: 20px'>
                                      <input id="user_email" type="email" placeholder="邮箱" name="user_email" style='width: 180px;border:none;border-bottom:1px solid rgba(0,0,0,0.25);background-color: transparent;color: black'>
                                      <span id="user_sub">搜索</span>
                                  </div>



                                  <div id="user_container" style="width: 100%;height: 300px;position:relative;top: 20px;overflow: auto;border-top: 1px dashed red;border-bottom: 1px dashed red"></div>
                                  <div  id="user_order"style="width: 100%;height: 250px;overflow: auto"></div>

                              </div>


                          </li>
                        <li >
                      <a href="#" id="evalu">企业用户审核</a>
                          <div id="user_evalu">

                          </div>
                            <span id="user_evalu1" style="position: absolute;color: black;top: 10px;left:50%">

                            </span>

                        </li>
                      </ul>
                  </div>


			   </div>






	          <div class="page" id="p3" style="overflow:auto">
				  <div class="tab pignose-tab-response tab">
					  <ul style="min-width: 600px">
						  <li >
							  <a href="#" id="produce_all" >已上架产品</a>
							  <div id="produce_all_1" style="overflow:auto">
							  </div>

						  </li>
						  <li >
							  <a id="produce_all2" href="#" onclick="f()">商品上架</a>
							  <div id="produce_all_2" >
								  <p>添加产品</p><br>
								  <form method="post" action="php/sys_addproduce.php" name="myForm" enctype="multipart/form-data">
										  <select name="dalei" onchange="changeProvince()" class="select">
											  <option value="0">--请选择大类--</option>
											  <option value="手机">手机</option>
											  <option value="笔记本电脑">笔记本电脑</option>
											  <option value="智能手表">智能手表</option>
											  <option value="耳机">耳机</option>
										  </select>
										  <select name="xinghao"  class="select">
											  <option>--请选择型号--</option>
										  </select><br><br>
										  <label>仅限手机项目：</label>
										  <select name="color1">
											  <option></option>
											  <option>星空黑rgb(0, 0, 0)</option>
											  <option>皓雪白rgb(240, 255, 240)</option>
											  <option>天空蓝rgb(87, 250, 255)</option>
										  </select>
										  <br><br>
										  <input type="number" id="qiyejia" name="qiyejia" style="width: 65px;margin-right: 2px" placeholder="企业价">
										  <input type="number" id="vipjia" name="vipjia" style="width: 65px;margin-left: 2px" placeholder="市场价"><br><br>

										  <input type="number" id="kucun" name="kucun" placeholder="库存"><br><br>
										  <label>*商品图片:</label>
									  <img src="" id="dd" style=" height: 150px;width: auto;margin-left:30px;border-radius: 10px">
										  <input type="file" id="file" name="file" style="border: none;width: 180px" onchange="c()"><br>

									  <input type="submit" name="submit" value="提交">
								  </form>
							  </div>

						  </li>

					  </ul>
				  </div>
	          </div>



	          <div class="page" id="p4" style='overflow: auto'>
                  <div class="htmleaf-content" style="position:relative;left: -80px">
                  <div class="input-group" style=";width: 700px">
                      <div class="input-group-addon">查找订单</div>
                      <input class="form-control" type="search" id="input-filter" size="15" placeholder="输入用户手机号的一部分">
                  </div>
                  <div id="container_order" style=";width: 700px">

                  </div>
                      <div id="container_message" style="width:700px;height: 30px;position:fixed;top: 10px;left: -400px;margin-left: 50%;color: red;text-align: center"></div>
                  </div>
	          </div>

	          <div class="page" id="p5">
				  <div class="article">
					  <div class="tab pignose-tab-response tab">
						  <ul style="min-width: 600px">
							  <li >
								  <a href="#" >总销售额</a>
								  <div>
                                      <div id="container_home"></div>
                                      <button class="bt_home" id="plain">Plain</button>
                                      <button class="bt_home" id="inverted">Inverted</button>
                                      <button class="bt_home" id="polar">Polar</button>

								  </div>

							  </li>
							  <li>
								  <a href="#">全业务</a>
								  <div>
                                      <div id="container_phone"></div>
								  </div>
							  </li>
							  <li>
								  <a href="#">订单量</a>
								  <div>
                                      <div id="container_oda"></div>
                                      <button class="bt_home" id="plain">Plain</button>
                                      <button class="bt_home" id="inverted">Inverted</button>
                                      <button class="bt_home" id="polar">Polar</button>
								  </div>
							  </li>

						  </ul>
					  </div>
	              </div>

			  </div>

                 <div class="page" id="p6" style="overflow: auto">
                     <div id="box_6" style="position: relative;margin-left: 50%;left: -390px;color: rgba(0,0,0,0.66);font-size: 0.8em;border: none"></div>
                     <div id="box_1"></div>
                 </div>

	    </div>
	  </div>
	</div>
	</div>
<div id="ajax_box" style="position: relative;left: 12px;width: 10%"><span style="font-size: 0.6em;color: #2aabd2">管理员：</span><span id="ajax_name" style="font-size: 0.6em;color: #2aabd2"> </span><a href="php/syslogout.php" style="font-size: 0.6em;color: #2aabd2"> 注销</a></div>
    <?php
$dbc=mysqli_connect('127.0.0.1','root','765256','dingdang')
or die("ERROR to connect mysqli");

$query2="SELECT * FROM Order_List WHERE Order_Time LIKE '%2018-01%' AND Pay='已支付'";
$result2=mysqli_query($dbc,$query2);

$data_row2=mysqli_num_rows($result2);
?>
    <?php

$dbc=mysqli_connect('127.0.0.1','root','765256','dingdang')
or die("ERROR to connect mysqli");

$query1="SELECT * FROM Order_List WHERE Order_Time LIKE '%2018-01%' AND Pay='已支付'";
$result1=mysqli_query($dbc,$query1);

$data_row1=mysqli_num_rows($result1);

for ($i=0;$i<$data_row1;$i++) {
    $sql_arr = mysqli_fetch_assoc($result1);
    $order_price = $sql_arr['Produce_Price'];
    $a1 = $a1 + $order_price;
}


$query2="SELECT * FROM Order_List WHERE Order_Time LIKE '%2018-02%' AND Pay='已支付'";
$result2=mysqli_query($dbc,$query2);

$data_row2=mysqli_num_rows($result2);

for ($i=0;$i<$data_row2;$i++) {
    $sql_arr = mysqli_fetch_assoc($result2);
    $order_price = $sql_arr['Produce_Price'];
    $a2 = $a2 + $order_price;
}


$query3="SELECT * FROM Order_List WHERE Order_Time LIKE '%2018-03%' AND Pay='已支付'";
$result3=mysqli_query($dbc,$query3);

$data_row3=mysqli_num_rows($result3);

for ($i=0;$i<$data_row3;$i++) {
    $sql_arr = mysqli_fetch_assoc($result3);
    $order_price = $sql_arr['Produce_Price'];
    $a3 = $a3 + $order_price;
}


$query4="SELECT * FROM Order_List WHERE Order_Time LIKE '%2018-04%' AND Pay='已支付'";
$result4=mysqli_query($dbc,$query4);

$data_row4=mysqli_num_rows($result4);

for ($i=0;$i<$data_row4;$i++) {
    $sql_arr = mysqli_fetch_assoc($result4);
    $order_price = $sql_arr['Produce_Price'];
    $a4 = $a4 + $order_price;
}


$query5="SELECT * FROM Order_List WHERE Order_Time LIKE '%2018-05%' AND Pay='已支付'";
$result5=mysqli_query($dbc,$query5);

$data_row5=mysqli_num_rows($result5);

for ($i=0;$i<$data_row5;$i++) {
    $sql_arr = mysqli_fetch_assoc($result5);
    $order_price = $sql_arr['Produce_Price'];
    $a5 = $a5 + $order_price;
}


$query6="SELECT * FROM Order_List WHERE Order_Time LIKE '%2018-06%' AND Pay='已支付'";
$result6=mysqli_query($dbc,$query6);

$data_row6=mysqli_num_rows($result6);

for ($i=0;$i<$data_row6;$i++) {
    $sql_arr = mysqli_fetch_assoc($result6);
    $order_price = $sql_arr['Produce_Price'];
    $a6 = $a6 + $order_price;
}


$query7="SELECT * FROM Order_List WHERE Order_Time LIKE '%2018-07%' AND Pay='已支付'";
$result7=mysqli_query($dbc,$query7);

$data_row7=mysqli_num_rows($result7);

for ($i=0;$i<$data_row7;$i++) {
    $sql_arr = mysqli_fetch_assoc($result7);
    $order_price = $sql_arr['Produce_Price'];
    $a7 = $a7 + $order_price;
}


$query8="SELECT * FROM Order_List WHERE Order_Time LIKE '%2018-08%' AND Pay='已支付'";
$result8=mysqli_query($dbc,$query8);

$data_row8=mysqli_num_rows($result8);

for ($i=0;$i<$data_row8;$i++) {
    $sql_arr = mysqli_fetch_assoc($result8);
    $order_price = $sql_arr['Produce_Price'];
    $a8 = $a8 + $order_price;
}


$query9="SELECT * FROM Order_List WHERE Order_Time LIKE '%2018-09%'AND Pay='已支付'";
$result9=mysqli_query($dbc,$query9);

$data_row9=mysqli_num_rows($result9);

for ($i=0;$i<$data_row9;$i++) {
    $sql_arr = mysqli_fetch_assoc($result9);
    $order_price = $sql_arr['Produce_Price'];
    $a9 = $a9 + $order_price;
}


$query10="SELECT * FROM Order_List WHERE Order_Time LIKE '%2018-10%'AND Pay='已支付'";
$result10=mysqli_query($dbc,$query10);

$data_row10=mysqli_num_rows($result10);

for ($i=0;$i<$data_row10;$i++) {
    $sql_arr = mysqli_fetch_assoc($result10);
    $order_price = $sql_arr['Produce_Price'];
    $a10 = $a10 + $order_price;
}


$query11="SELECT * FROM Order_List WHERE Order_Time LIKE '%2018-11%'AND Pay='已支付'";
$result11=mysqli_query($dbc,$query11);

$data_row11=mysqli_num_rows($result11);

for ($i=0;$i<$data_row11;$i++) {
    $sql_arr = mysqli_fetch_assoc($result11);
    $order_price = $sql_arr['Produce_Price'];
    $a11 = $a1 + $order_price;
}


$query12="SELECT * FROM Order_List WHERE Order_Time LIKE '%2018-12%'AND Pay='已支付'";
$result12=mysqli_query($dbc,$query12);

$data_row12=mysqli_num_rows($result12);

for ($i=0;$i<$data_row12;$i++) {
    $sql_arr = mysqli_fetch_assoc($result12);
    $order_price = $sql_arr['Produce_Price'];
    $a12 = $a12 + $order_price;
}
mysqli_close($dbc);
echo "<script>  var para1=parseInt('$a1');
                var para2=parseInt('$a2');
                var para3=parseInt('$a3');
                var para4=parseInt('$a4');
                var para5=parseInt('$a5');
                var para6=parseInt('$a6');
                var para7=parseInt('$a7');
                var para8=parseInt('$a8');
                var para9=parseInt('$a9');
                var para10=parseInt('$a10');
                var para11=parseInt('$a11');
                var para12=parseInt('$a12');
                </script>"
?><!--插入php值到JS中，用于总金额报表-->
    <?php
    $dbc=mysqli_connect('127.0.0.1','root','765256','dingdang')
    or die("ERROR to connect mysqli");

    $query1="SELECT * FROM Car_List WHERE Order_Time LIKE '%2018-01%' AND Pay='已支付'";
    $result1=mysqli_query($dbc,$query1);

    $data_row1=mysqli_num_rows($result1);

    for ($i=0;$i<$data_row1;$i++) {
        $sql_arr = mysqli_fetch_assoc($result1);
        $order_price = $sql_arr['Produce_Price'];
        $a1 = $a1 + $order_price;
    }
    ?>
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/ggtooltip.js"></script>
	<script type="text/javascript" src="js/pignose.tab.min.js"></script>
	<script type="text/javascript">
        $('#user_container').bind("keyup",".user_mail1",function (e) {/*动态绑定刷新数据事件*/
            if (e.keyCode == "13") {
                var m = $(e.target).attr('id');
                var n = $("#"+m).val();
                $("#user_evalu1").load("php/sys_userupdate.php",{name1:m,name2:n});
            }
        });

        $("#input-filter").keyup(function(e){
            var tel1 = $(e.target).attr('id');
            var tel2 = $("#"+tel1).val();
            $("#container_order").load("php/order_selectsearch.php",{name1: tel2});
        });

        $('#container_order').bind("keyup",".adress1",function (e) {/*动态绑定刷新数据事件*/
            if (e.keyCode == "13") {
                var m2 = $(e.target).attr('id');
                var n2 = $("#"+m2).val();
                $("#container_message").load("php/sys_orderupdate.php",{name1:m2,name2:n2});
            }
        });

        window.onload=function () {
            $("#container_order").load("php/order_search.php");
            $("#ajax_name").load("php/sys_ajaxlogin.php");
            $("#box_6").load("php/sys_pinglun.php");
        };

        function f() {
                document.getElementById("produce_all_2").style.display="inline";
            alert(text2);
        }



        $("#add_user1").ggtooltip({ textcolor : "white", placement : "right" ,backcolor:"#0099cc"}); // multiple parameters
        $(function () {
            $("#evalu").click(function () {
                $("#user_evalu").load("php/user_evalu.php");
            });

            $('#user_evalu').on("click",".pass",function () {
                var c = $(this).attr('id');
                var d0 = $(this).attr('name');
                $("#user_evalu1").load("php/evalu_comfire.php",{name1: c, name2:'1',name3:d0});
                $("#user_evalu").load("php/user_evalu.php");
            });

            $('#user_evalu').on("click",".bt_pinglun1",function () {
                var d = $(this).attr('id');
                var d1 = $(this).attr('name');
                $("#user_evalu1").load("php/evalu_comfire.php",{name1: d,name2:'0',name3:d1});
            })

            $('#box_6').on("click",".bt_pinglun2",function () {
                var m4 = $(this).attr('name');
                var n4 = $("#"+m4).val();
                $("#box_1").load("php/sys_addpinglun.php",{name1: m4,name2:n4});
                location.reload();
            });
            $('#box_6').on("click",".bt_pinglun1",function () {
                var m5 = $(this).attr('name');
                var msg = "您确定要删除该评论吗？\n\n请确认！";
                if (confirm(msg)==true){
                    $("#box_1").load("php/sys_delepinglun.php",{name1: m5});
                    location.reload();
                }else{
                    return false;
                }


            });
        });

        $(function() {
            $('#user_container').on("click","#dele_user",function () {
                var du = $(this).attr('name');
                var msg = "您确定要删除吗？\n\n请确认！";
                if (confirm(msg)==true){
                    $("#user_evalu1").load("php/user_dele.php",{name1: du});
                    location.reload();
                }

            });


                $('#produce_all_1').on("click",".pro_dele",function () {
                    var m6 = $(this).attr('name');
                    var msg = "您确定要删除吗？\n\n请确认！";
                    if (confirm(msg)==true){
                        $("#produce_all_1").load("php/sys_producedelet.php",{name1: m6});
                        location.reload();
                    }
                });


            $('#container_order').on("click",".order_dele",function () {
                var m7 = $(this).attr('name');
                var msg = "您确定要删除吗？\n\n请确认！";
                if (confirm(msg)==true){
                    $("#container_order").load("php/sys_orderdelet.php",{name1: m7});
                    location.reload();
                }


            });



            $("#user_sub").click(function () {
                var a=document.getElementById("user_phone").value;
                var b=document.getElementById("user_name").value;
                var c=document.getElementById("user_email").value;
                $("#user_container").load("php/sys_usersearch.php",{name1: a,name2:b,name3:c})/*传递参数a给后台Php文件sys_usersearch.php，最后返回数据填入id为box2的div中*/
/*
                $("#user_order").load("php/sys_ordersearch.php",{name: b})/!*传递参数a给后台Php文件sys_usersearch.php，最后返回数据填入id为box2的div中*!/
*/



            });


        $('.tab').pignoseTab({//选项卡
            animation: true,
            children: '.tab'
        });


            $('#produce_all').click(function () {
                $("#produce_all_1").load("php/sys_produce_all.php");
                document.getElementById("produce_all_2").style.display="none";
            });



    });

        function c () {
            var r= new FileReader();
            f=document.getElementById('file').files[0];

            r.readAsDataURL(f);
            r.onload=function (e) {
                document.getElementById('dd').src=this.result;
            };

        }

        var chart = Highcharts.chart('container_oda', {

            title: {
                text: '2018年叮当网订单总量'
            },

            subtitle: {
                text: 'Plain'
            },

            xAxis: {
                categories: ['正月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月']
            },

            series: [{
                type: 'column',
                colorByPoint: true,
                data: [1000,1030,2500,2100,60,para6,para7,para8,para9,para10,para11,para12],
                showInLegend: false
            }]

        });
        var chart = Highcharts.chart('container_home', {

            title: {
                text: '2018年叮当网销售总额'
            },

            subtitle: {
                text: 'Plain'
            },

            xAxis: {
                categories: ['正月', '二月', '三月', '四月', '五月', '六月', '七月', '八月', '九月', '十月', '十一月', '十二月']
            },

            series: [{
                type: 'column',
                colorByPoint: true,
                data: [para1,para2,para3,para4,para5,para6,para7,para8,para9,para10,para11,para12],
                showInLegend: false
            }]

        });


        $('#plain').click(function () {
            chart.update({
                chart: {
                    inverted: false,
                    polar: false
                },
                subtitle: {
                    text: 'Plain'
                }
            });
        });

        $('#inverted').click(function () {
            chart.update({
                chart: {
                    inverted: true,
                    polar: false
                },
                subtitle: {
                    text: 'Inverted'
                }
            });
        });

        $('#polar').click(function () {
            chart.update({
                chart: {
                    inverted: false,
                    polar: true
                },
                subtitle: {
                    text: 'Polar'
                }
            });
        });

        Highcharts.chart('container_home1', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: '2018年 销售占比情况'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: [{
                    name: '手机',
                    y: 50.0,
                    sliced: true,
                    selected: true
                }, {
                    name: '笔记本电脑',
                    y: 10.0
                }, {
                    name: '耳机',
                    y: 10.0
                }, {
                    name: '智能手表',
                    y: 10.0
                }]
            }]
        });

        Highcharts.chart('container_phone', {

            title: {
                text: '2018年 1-8月'
            },

            subtitle: {
                text: '表单数据源于后台数据库'
            },

            yAxis: {
                title: {
                    text: 'Sales Amount'
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },

            plotOptions: {
                series: {
                    label: {
                        connectorAllowed: false
                    },
                    pointStart: 1
                }
            },

            series: [{
                name: '笔记本电脑',
                data: [43934, 52503, 57177, 69658, 97031, null , null , null ]
            }, {
                name: '手机',
                data: [null , 24064, 29742, 29851, 32490, null , null , null ]
            }, {
                name: '智能手表',
                data: [null , 17722, 16005, 19771, 20185, null , null , null ]
            }, {
                name: '耳机',
                data: [null , null, 7988, 12169, 15112, null , null , null ]
            }],

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 900
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }

        });
	</script>
    </body>
</html>