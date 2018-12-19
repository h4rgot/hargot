<?php
$user='bditcoder';
$pass='regestr';
$dbh = new PDO('mysql:host=localhost;dbname=regestr', $user, $pass, array(
    PDO::ATTR_PERSISTENT => true
));
$loginform="nikita";
$zapros="SELECT * from loginpassword WHERE login=\"".$loginform."\";";
foreach($dbh->query($zapros) as $row) {
    $login=$row['login'];
    $pass=$row['password'];

}
foreach($dbh->query('SELECT * from loginpassword') as $row) {
    $asd[]+=$row['login'];
}
$asd="gggggggggggggggggasd";
if(isset($login)){$q="TRUE";}


//=====================================================================================================================
function lastAct($id)
{
    $tm=date('Y-m-d H:i:s');

//    $tm = time();
//mysql_query("UPDATE users SET online=\"'.$tm.'\" , last_act=\"'.$tm.' \" WHERE id=\"'.$id.'\"'");
    $user='bditcoder';
    $pass='regestr';
    $dbh = new PDO('mysql:host=localhost;dbname=regestr', $user, $pass, array(
        PDO::ATTR_PERSISTENT => true
    ));
    $zapros="UPDATE users SET online='".$tm."' , last_act='11:11' WHERE id=1;";
//    $zapros="UPDATE users SET online=\'''.$tm.'\' , last_act=\''.$tm.' \' WHERE id='.$id.';'";
    foreach($dbh->query($zapros) as $row) {
//    print $row['author_name'] . "<br>";
//        $login=$row['login'];
//        $pass=$row['password'];
echo ("yes");
    }
}

function enter ()
{ $user='bditcoder';
    $pass='regestr';
    $dbh = new PDO('mysql:host=localhost;dbname=regestr', $user, $pass, array(
        PDO::ATTR_PERSISTENT => true
    ));
    $error = array();
    if ($_POST['login'] != "" && $_POST['password'] != "")

    {
        $login1 = $_POST['login'];
        $password1 = $_POST['password'];
        $zapros1="SELECT * from loginpassword WHERE login='".login1."';";
        foreach($dbh->query($zapros1) as $row) {
            $asd1=$row['login'];
            $qwe1=$row['password'];
        }

if (isset($asd1))
        {
//    min 7
    $salt = substr(sha1($login1), 2, 6)."\3\1\2\6";


    if (sha1(sha1($password1).$row['soli']) == $row['password'])
            {

                setcookie ("login", $row['login'], time() + 60*60*60*24*365*100*1234567890);
                setcookie ("password", sha1(sha1($password1).$salt), time() + 60*60*60*24*365*100*1234567890);
                $_SESSION['id'] = $row['id'];

                $id = $_SESSION['id'];
                lastAct($id);
                return $error;
            }
            else

            {
                $error[] = "Неверный пароль";
                return $error;
            }
        }
        else

        {
            $error[] = "Неверный логин и пароль";
            return $error;
        }
    }


    else
    {
        $error[] = "Поля не должны быть пустыми!";
        return $error;
    }

}




function login () {
    ini_set ("session.use_trans_sid", true); 	session_start();  	if (isset($_SESSION['id']))

    {
        if(isset($_COOKIE['login']) && isset($_COOKIE['password']))
            {
            SetCookie("login", "", time() - 1, '/'); 			SetCookie("password","", time() - 1, '/');

        setcookie ("login", $_COOKIE['login'], time() + 999999999999999999999999, '/');

        setcookie ("password", $_COOKIE['password'], time() + 999999999999999999999999999, '/');

        $id = $_SESSION['id'];

        lastAct($id);
        return true;

    }
    else
    {
        $user='bditcoder';
        $pass='regestr';
        $dbh = new PDO('mysql:host=localhost;dbname=regestr', $user, $pass, array(
            PDO::ATTR_PERSISTENT => true
        ));
        $rez="SELECT * FROM users WHERE id=".$_SESSION['id'].";";

        foreach($dbh->query($rez) as $row) {
            $asd1=$row['id'];
            $qwe1=$row['onlain'];
        }
        if (isset($row))
            {
                foreach($dbh->query($rez) as $row) {
                    $asd1=$row['id'];
                    $qwe1=$row['onlain'];
                    $zxc1=$row['last_act'];
                }

        setcookie ("login", $row['login'], time()+99999999999999999999999999, '/');

        setcookie ("password", md5($row['login'].$row['password']), time() + 99999999999999999999999999, '/');

        $id = $_SESSION['id'];
        lastAct($id);
        return true;

    }
else return false;
}
}

else
{
    if(isset($_COOKIE['login']) && isset($_COOKIE['password']))

    {

        $user='bditcoder';
        $pass='regestr';
        $dbh = new PDO('mysql:host=localhost;dbname=regestr', $user, $pass, array(
            PDO::ATTR_PERSISTENT => true
        ));
        $rez="SELECT * FROM users WHERE login='".$_COOKIE['login']."';";

        foreach($dbh->query($rez) as $row) {
            $asd1=$row['id'];
            $qwe1=$row['onlain'];
        }
        sha1(sha1($row['password']).substr(sha1($row['login']), 2, 6)."\3\1\2\6");
        if(isset($row['id']) && sha1(sha1($row['password']).substr(sha1($row['login']), 2, 6)."\3\1\2\6") == $_COOKIE['password'])

        {
            $_SESSION['id'] = $row['id'];
            $id = $_SESSION['id'];

            lastAct($id);
            return true;
        }
        else
        {
            SetCookie("login", "", time() - 99999999999999999999999999360000, '/');

            SetCookie("password", "", time() - 9999999999999999999999999999999999999999360000, '/');
            return false;

        }
    }
    else
    {
        return false;
    }
}
}


function is_admin($id) {
//    @$rez = mysql_query("SELECT prava FROM users WHERE id='$id'");
    $user='bditcoder';
    $pass='regestr';
    $dbh = new PDO('mysql:host=localhost;dbname=regestr', $user, $pass, array(
        PDO::ATTR_PERSISTENT => true
    ));
    $rez="SELECT * FROM users WHERE login='".$_COOKIE['login']."';";
//        $rez = mysql_query("SELECT * FROM users WHERE id='{$_SESSION['id']}'");

    foreach($dbh->query($rez) as $row) {
        $asd1=$row['id'];
        $qwe1=$row['onlain'];
        $zxc1=$row['prava'];
    }


    if (isset($row['id']))
    {
//        $prava = mysql_result($rez, 0);
$prava=$zxc1;
        if ($prava == '1') return true;
        else return false;

    }
    else return false;
}
function out ()
{
    session_start();
    $id = $_SESSION['id'];
    $user = 'bditcoder';
    $pass = 'regestr';
    $dbh = new PDO('mysql:host=localhost;dbname=regestr', $user, $pass, array(
        PDO::ATTR_PERSISTENT => true
    ));
    $rez = "UPDATE users SET online=0 WHERE id=" . $id . ";";

    foreach ($dbh->query($rez) as $row) {
//    $asd1=$row['id'];
//    $qwe1=$row['onlain'];
//    $zxc1=$row['prava'];
        echo(".");
    }
    unset($_SESSION['id']);
    SetCookie("login", "");

    SetCookie("password", "");
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/');


}





if($_GET['action'] == "out") out();

if (login())

{
    $UID = $_SESSION['id'];
    $admin = is_admin($UID);

}
else
{
    if(isset($_POST['log_in']))
    {
        $error = enter();

        if (count($error) == 0)
        {
            $UID = $_SESSION['id'];

            $admin = is_admin($UID);
        }
    }
}




?>








<html>
<head>
    <title>ITCODER</title>
</head>
<body>
<style>
html{
background-color:black;
color:black;
}
body{
color:white;
}
@keyframes es{
    0%   {background-color: red; left:0px; top:0px;}
    25%  {background-color: yellow; left:200px; top:0px;}
    50%  {background-color: blue; left:200px; top:200px;}
    75%  {background-color: green; left:0px; top:200px;}
    100% {background-color: red; left:0px; top:0px;}
}

.logotip {
   
    animation-name:e;
    animation-duration:2s;
}
@keyframes e{
0%{  }
10%{  }
20%{transform:scale(10,1);}
30%{}
40${}
50${}
60%{}
80%{}
90%{ }
100%{    }
}
.pp{
color:white;
padding-left:830px;
top:10px;
position:absolute;


}

@keyframes regestr{
    0%{  }
    10%{  }
    20%{transform: translate(5000px,0px);}
    30%{}
40${}
50${}
60%{}
80%{}
90%{ }
100%{    }
}
.ppasd{
    animation-name:regestr;
    animation-duration:2s;

    color:white;
    left:83%;
    top:10%;
    position:absolute;



}

.w{
top:1000px;

margin-top:0;
 margin-bottom: 0;
}
.as{
}
.q{
}
@keyframes re{
0%{  }
10%{  }
20%{transform: translate(5000px,1px);}
30%{}
40${}
50${}
60%{}
80%{}
90%{ }
100%{    }
}
@keyframes up{
0%{  }
10%{  }
20%{transform: translate(1px,5000px);}
30%{}
40${}
50${}
60%{}
80%{}
90%{ }
100%{    }
}

.menu, .menu ul { 

  list-style: none; margin: 0; padding: 0;
  z-index:100;
 }
 .menu {
 z-index:100;
  background: linear-gradient(to bottom, #fff, #f1f2f2);
  border: 1px solid #999;
  padding: 0 5px;
  padding-left:300px;
  top:300px;
  animation-name:re;
  animation-duration:2s;
  font: 14px Arial, sans-serif;
  box-shadow: 0 2px 5px rgba(0,0,0,0.2);
 }
 .menu > li {
  display: inline-block;
  border-right: 1px solid #fff;
  position: relative;
 }
 .menu a {
  text-decoration: none;
  color: #4c4c4c;
  display: block;
 }
 .menu > li > a {
  padding: 10px 15px;
  border-right: 1px solid #d8d8d8;
  position: relative; z-index: 3;
 }
 .menu ul {
  position: absolute;
  display: none;
  width: 200px;
  background: #fff;
  box-shadow: 0 0 10px #666;
 }
 .menu ul a {
  padding: 5px 10px;
 }
 .menu ul a:hover {
  background: white    ;
  color: black;
 }
 .menu li:hover ul {
  display: block;
 }
 .menu > li:hover::before {
  content: \'\';
  top: 0; left: 0; right: 0; bottom: 0;
  box-shadow: 0 5px 10px #666;
  position: absolute;
 }
 .menu > li:hover > a {
  background: #fff; /* Цвет фона */
 }

.bl{
padding-left:100px;
color:white;
background-color:white;
width:100px;
hight:100px;
borde4-color:white;

}

.b1{
animation-name:qqee;
    animation-duration:2s;
/*margin-top:20px;
padding-top:200px;

width:100px;
hight:100px;
color:white;
background-color:white;
border-right:100px solid white;
border-top:100px solid white;
    */	word-break:break-all;
    position: absolute;
    margin-top: 1%;
    margin-left: 0.5%;
    width:20%;
    height:100%;

    color:black;
    border-radius:10px ;
    background-color:white;

}
@keyframes qqee{
0%{  }
10%{  }
20%{transform: translate(-500px,1px);}
30%{}
40${}
50${}
60%{}
80%{}
90%{ }
100%{    }
}
.b2{
    /*padding: 20px;*/
    animation-name:qqe;
    animation-duration:2s;

    word-break:break-all;
/*margin-right:100px;*/
/*margin-top:20px;*/
/*top:190px;*/
/*left:750px;*/
/*padding-top:200px;*/
/*position:absolute;*/
/*width:100px;*/
/*height:100px;*/
/*color:white;*/
/*background-color:white;*/
/*border-right:100px solid white;*/
/*border-top:100px solid white;*/

    position: absolute;
    margin-top: 1%;
    margin-left: 78%;
    margin-right: 10%;
    width:20%;
    height:100%;

    color:black;
    border-radius:10px ;
    background-color:white;

}
@keyframes qqe{
0%{  }
10%{  }
20%{transform: translate(500px,1px);}
30%{}
40${}
50${}
60%{}
80%{}
90%{ }
100%{    }
}
@keyframes wqqe{
0%{  }
10%{  }
20%{transform: translate(1px,-500px);}
30%{}
40${}
50${}
60%{}
80%{}
90%{ }
100%{    }
}

.b3{	word-break:break-all;
animation-name:wqqe;
    animation-duration:1.5s;
/*z-index:1;*/
/*margin-right:100px;*/
/*margin-top:20px;*/
/*top:190px;*/
/*left:230px;*/

/*position:absolute;*/
/*width:400px;*/
/*height:1px;*/
/*color:white;*/

/*background-color:white;*/
/*border-right:100px solid white;*/
/*border-top:100px solid white;*/

    position: absolute;
    margin-top: 1%;
    margin-left: 21.8%;
    width:55%;
    height:40%;

    color:black;
    border-radius:10px ;
    background-color:white;

}
@keyframes dqqe{
0%{  }
10%{  }
20%{transform: translate(1px,500px);}
30%{}
40${}
50${}
60%{}
80%{}
90%{ }
100%{    }
}
.exit{color: white;
background-color: black;
    position: absolute;
    /*left: -9%;*/
    right: 5%;
    bottom: 197.5%;
}
.forma1{
    color:white;
    background-color: black;
    position: absolute;
    bottom: 190%;
    left: 1%;
    /*border-color: black;*/

    /*border-right-width:30px ;*/
    /*border-top-width: 300px;*/
    /*border-style: dashed;*/

}
/*.buttonforma1{*/
    /*color:white;*/
    /*background-color: black;*/
    /*position: absolute;*/
    /*top: 10%;*/


/*}*/
.b4 {	word-break:break-all;
    animation-name: dqqe;
    animation-duration: 2s;

    position: absolute;
    margin-top: 19%;
    margin-left: 21.8%;
    width:55%;
    height:57%;

    color:black;
    border-radius:10px ;
    background-color:white;



    /*margin-right: 100px;*/
    /*margin-top: 20px;*/
    /*top: 300px;*/
    /*left: 230px;*/

    /*position: absolute;*/
    /*width: 400px;*/
    /*height: 100px;*/
    /*color: black;*/

    /*background-color: white;*/
    /*border-right: 100px solid white;*/
    /*border-top: 100px solid white;*/

}

</style>

<div class="logotip"><img src="weee_1.jpg"></div>
<div class="logotip">


<!---->
<!--//for ($asd=0;$asd<10;$asd++){-->
<!--//-->
<!--//    //$hello=1;-->
<!--//    echo '<span  ><h5 >'.$hello.'</h5></span>';-->
<!--//}-->

Hello world!
<!--     От программиста для программиста-->
</div>
<ul class="menu">
    <li><a href="#">Языки</a>
        <ul>
            <li><a href="ASSEMBLER.html">ASSEMBLER</a></li>
            <li><a href="CSSS.html">CSS</a></li>
            <li><a href="JS.html">JavaScript</a></li>
            <li><a href="htmll.html">HTML</a></li>
            <li><a href="SQL.html">SQL</a></li>
        </ul>
    </li>
    <li><a href="#">Примеры кода</a>
        <ul>
            <li><a href="mysql.php">MySql</a></li>
            <li><a href="php.php">PHP</a></li>
            <li><a href="assembler.php">Assembler</a></li>
            <li><a href="css.php"> CSS</a></li>
            <li><a href="js.php">JavaScript</a></li>
            <li><a href="python.php" >Python</a></li>
            <li><a href="sql.php">SQL</a></li>
        </ul>
    </li>
    <li><a href="istochniki.php">Источники</a></li>
    <li><a href="biblioteki.php" >Библиотеки</a>
        <ul>
            <li><a href="pythonbibl.html" >Python</a></li>
            <li><a href="jsbibl.php" >JavaScript</a></li>
            <li><a href="cppbibl.php"></a></li>
        </ul>
    </li>
</ul>
<span class="nomerodin"></span>
<a class="ppasd" href="regestration.php" >Регистрация</a>

<div class="b1">

</div>

<div  id="right" class="b2">.sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss</div>
<div class="b3"> session.serialize_handler string
    session.serialize_handler определяет имя обработчика, который используется для сериализации/десериализации данных. Поддерживаются формат сериализации PHP (наименование php_serialize), внутренний формат PHP (наименование php и php_binary) и WDDX (наименование wddx). WDDX доступен только в том случае, если PHP скомпилирован с поддержкой WDDX. php_serialize доступен с версии PHP 5.5.4. php_serialize использует простую функцию сериализации/десериализации для внутренних нужд и не имеет тех ограничений, какие есть у php и php_binary. Старые обработчики сериализации не могут хранить ни числовые, ни строковые индексы, содержащие специальные символы (| и !) в $_SESSION. Используйте php_serialize, чтобы обойти ошибки числовых и строковых индексов при завершении скрипта. Значение по умолчанию php. </div>
<div class="b4">

    <script type="text/javascript">



        // var stroka="WWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW";
        // var i =0;
    // i++;
    //     for (var i;
        //      i<stroka.length;i++){
        //     if ((i%17)==0){
        //         document.getElementById("right").innerHTML=document.getElementById("right").innerHTML+"<br>";
        //     }
        //     document.getElementById("right").innerHTML='aaaaaaaaaaaaaaaaaaaaaaaaaa' +
        //         '<br>aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa';
        // document.getElementById("right").innerHTML="asdasdasd";
        // }

        // var elem1=document.getElementById("right");
        // elem1.textContent="hello";
        //
        // for(var i;i<stroka.length;i++){
        //     elem12=document.getElementById("right");
        //     var elem12.textContent=elem.textContent+"<br>";
        // }

  </script>
    <a class="exit" href="/?action=out">Выход</a>


    <?php
    if ($q=="TRUE") {
        print_r($login);
        echo("====>");
        print_r($pass);


    }
    If($UID or 1==1) //если переменной нет, выводим форму
    {echo("
        <form class=\"forma1\"  method=\"post\">

            Логин: <input class=\'forma1\' type=\"text\" name=\"login\" />
           Пароль: <input class=\'forma1\' type=\"password\" name=\"password\" />

            <input class=\"fbuttonforma1\" type=\"submit\" value=\"Войти\" name=\"log_in\" />
        </form>
    ");}
    ?>


</div>





<?php


//if ($q=="TRUE"){
////if(){
//echo ("<form class =\"vhod\" method=\"post\">
//    Логин: <input type=\"text\" name=\"login\" />
//
//    Пароль: <input type=\"password\" name=\"password\" />
//    <input type=\"submit\" value=\"Войти\" name=\"log_in\" />
//
//</form>");}
//else{print_r("NOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO");}

//}



?>
<!--<form class ="vhod" action="/" method="post">-->
<!--    Логин: <input type="text" name="login" />-->
<!---->
<!--    Пароль: <input type="password" name="password" />-->
<!--    <input type="submit" value="Войти" name="log_in" />-->
<!---->
<!--</form>-->

</body>
</html>