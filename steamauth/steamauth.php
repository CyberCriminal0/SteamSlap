<?php
ob_start();
session_start();
require ('openid.php');

function logoutbutton() {
    echo '<li><h3 style="color:white">Hello, '.$_SESSION['steam_personaname'].'</h3></li>';
    echo '<li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown"><img src="'.$_SESSION['steam_avatarmedium'].'" style="max-width:50px; margin-top: -5px;" class="profile-image img-circle""/><b class="caret"></b></a><ul class="dropdown-menu"><li><a href="account.php"><i class="glyphicon glyphicon-cog"></i> Account</a></li><li class="divider"></li><li><a href="steamauth/logout.php"><i class="glyphicon glyphicon-off"></i> Sign-out</a></li></ul></li>';
    //echo "<form action=\"steamauth/logout.php\" method=\"post\"><input value=\"Logout\" type=\"submit\" /></form>"; //logout button
}

function steamlogin()
{
try {
    require("settings.php");
    $openid = new LightOpenID($steamauth['domainname']);

    $button['small'] = "small";
    $button['large_no'] = "large_noborder";
    $button['large'] = "large_border";
    $button = $button[$steamauth['buttonstyle']];
    
    if(!$openid->mode) {
        if(isset($_GET['login'])) {
            $openid->identity = 'http://steamcommunity.com/openid';
            header('Location: ' . $openid->authUrl());
        }

    return "<form action=\"?login\" method=\"post\"> <input type=\"image\" src=\"/images/loginSteam.png\"></form>";
    }

     elseif($openid->mode == 'cancel') {
        echo 'User has canceled authentication!';
    } else {
        if($openid->validate()) { 
                $id = $openid->identity;
                $ptn = "/^http:\/\/steamcommunity\.com\/openid\/id\/(7[0-9]{15,25}+)$/";
                preg_match($ptn, $id, $matches);
              
                $_SESSION['steamid'] = $matches[1]; 

                // First determine of the $steamauth['loginpage'] has been set, if yes then redirect there. If not redirect to where they came from
                if($steamauth['loginpage'] !== "") {
                    $returnTo = $steamauth['loginpage'];
                } else {
                    //Determine the return to page. We substract "login&"" to remove the login var from the URL.
                    //"file.php?login&foo=bar" would become "file.php?foo=bar"
                    $returnTo = str_replace('login&', '', $_GET['openid_return_to']);
                    //If it didn't change anything, it means that there's no additionals vars, so remove the login var so that we don't get redirected to Steam over and over.
                    if($returnTo === $_GET['openid_return_to']) $returnTo = str_replace('?login', '', $_GET['openid_return_to']);
                }
                header('Location: '.$returnTo);
        } else {
                echo "User is not logged in.\n";
        }

    }
} catch(ErrorException $e) {
    echo $e->getMessage();
}
}

?>
