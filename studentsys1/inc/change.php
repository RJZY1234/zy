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
    <title>Document</title>
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
              <a class="dropdown-item" href="#">信息查询</a>
             </div>
           </li>
            </ul>
          </nav> 
    </div>
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-body">
            <form>
                <tr>
                    <td>（输入修改信息学生学号）</td>
                    <td ><input style="margin-left: 20px" type="text" name="id" /></td>
                    <p>
                    <tr>
                     <th>修改后姓名</th>
                     <th><input style="margin-left: 20px" type="text" name="Cname" /></th>
                     <th>修改后专业</th>
                     <th><input style="margin-left: 20px" type="text" name="CDe" /></th>
                     <th><input style=" cursor:pointer;" class="btn btn-success sea" type="submit" name="submit" value="保存" /></a></th>
                     </tr>
                    </p>

                </tr>
                <table class="table table-hover">

                    <?php
                    $upD = $_GET['CDe'];
                    $upname = $_GET['Cname'];
                    $upid = $_GET['id'];
                    $conn = new Conn("studentsys");
                    if(!empty($upid) || !empty($upname) || !empty($upD)){
                    if(isset($_GET['id']) && isset($_GET['Cname']) && isset($_GET['CDe'])) {
                        $sql = "update student set Stu_name='".$upname."',Department = '".$upD."' WHERE StudentID = {$upid}";
                        $result = $conn->query($sql);
                        if($result){
                            echo "成功";
                        }else{
                            echo "失败";
                        }
                    }
                }else {
                    echo '请输入完整信息';
                }
                    ?>
                </table>
            </form>

        </div>
    </div>
</div>
</body>
</html>