<?php
session_start();
if (!isset($_SESSION['login_user'])){
	header("location: ../login/index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>WoodArts Company</title>
<link rel="stylesheet" href="../css/navmenu.css">
<link rel="stylesheet" href="../css/button.css">
<style>
.box {
        background-color:#e0e0d1;
        color:black;
        font-weight:bold;
        margin:20px auto;
        height:80px;
        width: 310px;
    }
</style>
<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
</head>
<body>
	<div id="profile">
		<b id="welcome">User : <i><?php echo $_SESSION['login_user']; ?></i></b>
		<b id="logout"><a href="../login/logout.php">Log Out</a></b>
	</div>
<p align="center"><img src="../img/logo.png"></p>
<h1 align="center"> Wood Arts Comapany Managment System</h1>
<?php
require_once('../process/menu.php');
echo $menu;

    include('conn.php');
    require_once('backup_restore.class.php');

    $newImport = new backup_restore($host,$db,$user,$pass);

    if(isset($_GET['process'])){
        $process = $_GET['process'];
        if($process == 'backup'){
            $message = $newImport -> backup ();
        }else if($process == 'restore'){
            $message = $newImport -> restore ();
            @unlink('backup/database_'.$db.'.sql');

        }
    }
    if(isset($_POST['submit'])){
        $db = 'database_'.$db.'.sql';
        $target_path = 'backup';
        move_uploaded_file($_FILES["file"]["tmp_name"], $target_path . '/' . $db);
        $message = 'Successfully uploaded. You can now <a href=index.php?process=restore>restore</a> the database!';
    }
?>


<br>
<br>
               <center> <h3>Backup / Restore Database</h3>


                        <?php if(isset($_GET['process'])): ?>
                            <?php
                                $msg = $_GET['process'];
                                $class = 'text-center';
                                switch($msg){
                                    case 'backup':
                                        $msg = 'Backup Successfully!<br />Download the <a href=backup/'.$message.' target=_blank >SQL FILE </a> OR RESTORE IT ANY TIME';
                                        break;
                                    case 'restore':
                                        $msg = $message;
                                        break;
                                    case 'upload':
                                        $msg = $message;
                                        break;
                                    default:
                                        $class = 'hide';
                                }
                            ?>
                                <strong><?php echo $msg; ?></strong><br>
                        <?php endif; ?>


                <br>
                            <a href="index.php?process=backup">
                                <button type="button" class="btn btn-success btn-lg span4"><i class="fa fa-database"></i> BACKUP DATABASE</button>
                            </a>

                            <a href="index.php?process=restore">
                                <button type="button" class="btn btn-info btn-lg span4"><i class="fa fa-database"></i> RESTORE DATABASE</button>
                            </a>
                <br />
                <br />
                    <form method="POST" enctype="multipart/form-data" style="border:1px solid #000; width:600px; padding:20px;">
                        <label>Upload SQL File:</label>
                        <input type="file" name="file" class="form-control">
                        <input type="submit" name="submit" class="btn btn-success" value="Upload Database" />
                    </form>
		<center>
		<br>
		</center>

</center>
<script type="text/javascript">
    <?php if(isset($_POST['add_room'])) echo '$.jGrowl("Added Successfully!");'; ?>
</script>

</body>
</html>
