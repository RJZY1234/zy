<?php
session_start();
include_once "mysql.php";
header('Content-type:text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/popper.js/1.15.0/umd/popper.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>班单科平均成绩</title>
    <style>
        .container{
            padding-top:100px;
        }
        .box{
            box-sizing: border-box;
            width: 100%;
            height: 100%;
            padding: 100px;
            position: absolute;
            top: 0%;
            left: 0%;
            background-color: rgba(200, 200, 200, .7);
            display: none;
        }
        .panel-footer{
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
<div>
        <nav class="navbar navbar-expand-sm bg-light navbar-light fixed-top">
            <a class="navbar-brand" href="#">服务中心 |</a>
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                  数据管理
                </a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="information_data.php">Link 1</a>
                  <a class="dropdown-item" href="#">Link 2</a>
                  <a class="dropdown-item" href="#">Link 3</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="inc/grade_manage.php" id="navbardrop" data-toggle="dropdown">
                  成绩管理
                </a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="grade_manage.php">成绩分析</a>
                  <a class="dropdown-item" href="graderank.php">成绩排名</a>
                </div>
              </li>
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
               信息管理
              </a>
             <div class="dropdown-menu">
              <a class="dropdown-item" href="search.php">信息查询</a>
              <a class="dropdown-item" href="change.php">信息修改</a>
             </div>
           </li>
            </ul>
          </nav> 
    </div>
<div class="container">
    <div class="panel panel-primary">

        <div class="panel-body">
            <table class="table table-hover">
                    <a href="passing_rate.php"><button type="button" class="btn btn-success passing" name="passing" style="margin-right: 10px" >每班单科及格率</button></a>
                    <a href="average.php"><button type="button" class="btn btn-success average" name="average" style="margin-right: 10px"  >每班单科平均成绩</button></a>
                    <a href="Ave.php"><button type="button" class="btn btn-success Ave" name="Ave" style="margin-right: 10px" >系单科平均成绩</button></a>
                <thead>
                <tr>
                    <th>班级</th>
                    <th>语文平均成绩</th>
                    <th>数学平均成绩</th>
                    <th>英语平均成绩</th>
                </tr>
                </thead>
                <?php
                $conn = new Conn("studentsys");
                $sql="select Class, AVG(Chinese) as CJ,AVG(Math) as MJ,AVG(English) as EJ from grade group by Class";
                $result = $conn->query($sql);
                while ($data=mysqli_fetch_assoc($result)){
                    $html=<<<A
            <tr>
                <td><output  name="Class">{$data["Class"]}</output></td>
                <td><output  name="CJ">{$data["CJ"]}</output></td>
                <td><output  name="MJ">{$data["MJ"]}</output></td>
                <td><output  name="EJ">{$data["EJ"]}</output></td>
            </tr>
A;
                    echo $html;
                }
                ?>
            </table>
        </div>
    </div>
</div>
</body>
</html>

