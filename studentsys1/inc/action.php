 <?php
//1.连接数据库
 try {
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=studentsys;", "root", "root");

 } catch (PDOException $e) {
    die("数据库连接失败" . $e->getMessage());
 }
 //2.防止中文乱码
 $pdo->query("SET NAMES 'UTF8'");
 //3.通过action的值进行对应操作
 switch ($_GET['action']) {
     case 'add':{   //增加操作
	     $StudentID = $_POST['StudentID'];
         $Stu_name = $_POST['Stu_name'];        
        $Class = $_POST['Class'];
		
 
         //写sql语句
         $sql = "INSERT INTO grade VALUES (NULL ,'{$StudentID}','{$Stu_name}','{$Class}')";
         $rw = $pdo->exec($sql);
         if ($rw > 0) {
             echo "<script> alert('增加成功');
                            window.location='index.php'; //跳转到首页
                  </script>";
        } else {
             echo "<script> alert('增加失败');
                             window.history.back(); //返回上一页
                  </script>";
         }
         break;
     }

     case "edit" :{   //1.获取表单信息
         $StudentID = $_POST['StudentID'];
         $Stu_name = $_POST['Stu_name'];
         $Classid = $_POST['Classid'];
 
        $sql = "UPDATE grade SET name='{$Stu_name}',Class='{$Class}' WHERE StudentID='{$StudentID}'";
         $rw=$pdo->exec($sql);
        if($rw>0){
            echo "<script>alert('修改成功');window.location='index.php'</script>";
         }else{
            echo "<script>alert('修改失败');window.history.back()</script>";
        }

 
         break;
    }

 }