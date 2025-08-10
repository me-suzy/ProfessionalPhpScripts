<?php
/**
 * ----------------------------------------------
 * Advanced Poll 2.0.2 (PHP/MySQL)
 * Copyright (c)2001 Chi Kien Uong
 * URL: http://www.proxy2.de
 * ----------------------------------------------
 */

$version = "v2.02";
if (!isset($PHP_SELF)) {
  $PHP_SELF = $HTTP_SERVER_VARS["PHP_SELF"];
  if (isset($HTTP_GET_VARS)) {
    while (list($name, $value)=each($HTTP_GET_VARS)) {
      $$name=$value;
    }
  }
  if (isset($HTTP_POST_VARS)) {
    while (list($name, $value)=each($HTTP_POST_VARS)) {
      $$name=$value;
    }
  }
}
if (!file_exists("./install/cross.gif")) {
  $img_loc="http://www.proxy2.de/poll/install";
} else {
  $img_loc="install";
}

function print_header() {
global $PHP_SELF, $version;
?>
<html>
<head>
<title>Advanced Poll <?php echo $version; ?> Upgrade</title>
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="Expires" content="-1">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.td1 {  font-family: "MS Sans Serif"; font-size: 9pt}
-->
</style>
<script language="Javascript">
<!--
function abort() {
 if (window.confirm("Are you sure you want to cancel the Upgrade?")) {
    window.location.href = "http://"+window.location.host+window.location.pathname+"?action=cancel"
 }
}
// -->
</script>
</head>
<?php
}

function sql_error() {
global $PHP_SELF, $version, $img_loc;
$description = mysql_error();
?>
<body bgcolor="#3A6EA5">
<br>
<br>
<table border="1" cellspacing="0" cellpadding="0" align="center" width="500">
  <tr bgcolor="#C6C3C6">
    <td>
      <table width="500" border="0" cellspacing="0" cellpadding="1" align="center">
        <tr bgcolor="#400080">
          <td height="20" class="td1" bgcolor="#000084"><b><font color="#FFFFFF">
            &nbsp;Advanced Poll <?php echo $version; ?> Upgrade</font></b></td>
          <td height="20" class="td1" align="right" bgcolor="#000084"><img src="<?php echo $img_loc; ?>/cross.gif" width="16" height="14" border="0" usemap="#close"><map name="close"><area shape="rect" coords="1,1,14,12" href="javascript:abort()"></map>
          </td>
        </tr>
        <tr align="center">
          <td colspan="2">
            <form method="post" action="<?php echo $PHP_SELF; ?>">
              <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr bgcolor="#FFFFFF" valign="bottom">
                  <td class="td1" height="30"><b>&nbsp;&nbsp;&nbsp;&nbsp;Error
                    occured!</b></td>
                </tr>
                <tr bgcolor="#FFFFFF">
                  <td class="td1" height="30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    The following error occured...</td>
                </tr>
                <tr bgcolor="#C6C3C6">
                  <td class="td1" align="center">
                    <table width="400" border="0" cellspacing="0" cellpadding="0" align="center">
                      <tr>
                        <td class="td1" height="75"><?php echo $description; ?>
                        </td>
                      </tr>
                      <tr>
                        <td height="140" class="td1">&nbsp;
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr bgcolor="#C6C3C6">
                  <td align="center" height="20">
                    <img src="<?php echo $img_loc; ?>/h_line.gif" height="18" width="490">
                  </td>
                </tr>
                <tr bgcolor="#C6C3C6">
                  <td align="right"><img src="<?php echo $img_loc; ?>/back.gif" width="75" height="22" border="0" usemap="#Back" alt="Back"><map name="Back"><area shape="rect" coords="1,1,73,20" href="javascript:history.go(-1)"></map>
                    &nbsp;&nbsp;<img src="<?php echo $img_loc; ?>/cancel.gif" width="75" height="22" usemap="#Cancel" border="0" alt="Cancel"><map name="Cancel"><area shape="rect" coords="1,1,73,20" href="javascript:abort()"></map>
                    &nbsp;&nbsp; </td>
                </tr>
              </table>
            </form>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<br>
<br>
<br>
</body>
</html>
<?php
exit();
}

function db_config() {
global $PHP_SELF, $version, $img_loc;
?>
<body bgcolor="#3A6EA5">
<br>
<br>
<table border="1" cellspacing="0" cellpadding="0" align="center" width="500">
  <tr bgcolor="#C6C3C6">
    <td>
      <table width="500" border="0" cellspacing="0" cellpadding="1" align="center">
        <tr bgcolor="#400080">
          <td height="20" class="td1" bgcolor="#000084"><b><font color="#FFFFFF">
            &nbsp;Advanced Poll <?php echo $version; ?> Upgrade</font></b></td>
          <td height="20" class="td1" align="right" bgcolor="#000084"><img src="<?php echo $img_loc; ?>/cross.gif" width="16" height="14" border="0" usemap="#close"><map name="close"><area shape="rect" coords="1,1,14,12" href="javascript:abort()"></map>
          </td>
        </tr>
        <tr align="center">
          <td colspan="2">
            <form method="post" action="<?php echo $PHP_SELF; ?>">
              <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr bgcolor="#FFFFFF" valign="bottom">
                  <td class="td1" height="30"><b>&nbsp;&nbsp;&nbsp;&nbsp;Welcome to the Advanced Poll Upgrade script.</b></td>
                </tr>
                <tr bgcolor="#FFFFFF">
                  <td class="td1" height="30">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </td>
                </tr>
                <tr bgcolor="#C6C3C6">
                  <td class="td1" align="center">
                    <table width="400" border="0" cellspacing="0" cellpadding="0" align="center">
                      <tr>
                        <td class="td1" height="75">Please enter your database settings...</td>
                      </tr>
                      <tr>
                        <td height="140" class="td1">
                          <table width="100%" border="0" cellspacing="0" cellpadding="3">
                            <tr>
                              <td width="18%" class="td1">Hostname:</td>
                              <td width="82%">
                                <input type="text" name="mysql_host" size="25" value="localhost">
                              </td>
                            </tr>
                            <tr>
                              <td width="18%" class="td1">Database:</td>
                              <td width="82%">
                                <input type="text" name="db_name" size="25">
                              </td>
                            </tr>
                            <tr>
                              <td width="18%" class="td1">Username:</td>
                              <td width="82%">
                                <input type="text" name="mysql_user" size="25">
                              </td>
                            </tr>
                            <tr>
                              <td width="18%" class="td1">Password:</td>
                              <td width="82%">
                                <input type="password" name="mysql_pass" size="25">
                                <input type="hidden" name="action" value="connect">
                              </td>
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
                <tr bgcolor="#C6C3C6">
                  <td align="center" height="20">
                    <img src="<?php echo $img_loc; ?>/h_line.gif" height="18" width="490">
                  </td>
                </tr>
                <tr bgcolor="#C6C3C6">
                  <td align="right"><img src="<?php echo $img_loc; ?>/disabled.gif" width="75" height="22" border="0" alt="Back"><input type="image" src="<?php echo $img_loc; ?>/next.gif" width="75" height="22" border="0" alt="Next">
                    &nbsp;&nbsp;<img src="<?php echo $img_loc; ?>/cancel.gif" width="75" height="22" usemap="#Cancel" border="0" alt="Cancel"><map name="Cancel"><area shape="rect" coords="1,1,73,20" href="javascript:abort()"></map>
                    &nbsp;&nbsp; </td>
                </tr>
              </table>
            </form>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<br>
<br>
<br>
</body>
</html>
<?php
}

function message_box($msg) {
global $version, $img_loc;
?>
<body bgcolor="#3A6EA5">
<br><br><br><br><br><br>
<table border="1" cellspacing="0" cellpadding="0" align="center" width="300">
  <tr bgcolor="#C6C3C6">
    <td>
      <table width="300" border="0" cellspacing="0" cellpadding="1" align="center">
        <tr bgcolor="#400080">
          <td height="20" class="td1" bgcolor="#000084"><b><font color="#FFFFFF">
            &nbsp;Advanced Poll <?php echo $version; ?> Upgrade</font></b></td>
          <td height="20" class="td1" align="right" bgcolor="#000084"><img src="<?php echo $img_loc; ?>/cross.gif" width="16" height="14" border="0">
          </td>
        </tr>
        <tr align="center">
          <td>
            <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
              <tr bgcolor="#C6C3C6">
                <td align="center" height="75" width="20%"><img src="<?php echo $img_loc; ?>/info.gif" width="35" height="35"></td>
                <td align="left" height="75" width="80%" class="td1"><?php echo $msg; ?></td>
              </tr>
              <tr bgcolor="#C6C3C6" align="center">
                <td colspan="2" height="40"><img src="<?php echo $img_loc; ?>/disabled.gif" width="75" height="22" border="0" alt="Back">&nbsp;&nbsp;<img src="<?php echo $img_loc; ?>/ok.gif" width="75" height="22" border="0" alt="Ok"></td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<br>
<br>
<br>
</body>
</html>
<?php
exit();
}

function new_tplset($new_tplsetname,$templates) {
    global $poll_db, $POLLTBL;
    $now = date("Y-m-d H:i:s",time());
    $tpl_array = array("display_head","display_loop","display_foot","result_head","result_loop","result_foot","comment");
    $poll_db->query("INSERT INTO $POLLTBL[poll_tplset] (tplset_name,created) VALUES ('$new_tplsetname','$now')");
    $poll_db->fetch_array($poll_db->query("select max(tplset_id) as tplset_id from $POLLTBL[poll_tplset]"));
    $new_tpl_id = $poll_db->record["tplset_id"];
    for ($i=0; $i<sizeof($tpl_array); $i++) {
        $poll_db->query("INSERT INTO $POLLTBL[poll_tpl] (tplset_id,title,template) VALUES ('$new_tpl_id','$tpl_array[$i]','$templates[$i]')");
    }
}

if (!isset($action)) {
  $action ='';
}

switch ($action) {

case "cancel":
  print_header();
  message_box("The operation has been cancelled!");
  break;

case "connect":
  print_header(); 
  if (file_exists("./include/config.inc.php")) {
    include ("./include/config.inc.php");
    include "./include/$POLLDB[class]";
  } else {
    message_box("Cannot find the configuration file <u>config.inc.php</u>.");
  }
  $POLLDB["dbName"] = $db_name;
  $POLLDB["host"]   = $mysql_host;
  $POLLDB["user"]   = $mysql_user;
  $POLLDB["pass"]   = $mysql_pass;
  $poll_db = new polldb_sql();
  $poll_db->connect();
  $poll_db->query("UPDATE $POLLTBL[poll_config] SET poll_version='2.02' WHERE config_id='1'");
  $templates[] = "<table width=\"450\" border=\"0\" cellspacing=\"0\" cellpadding=\"2\" bgcolor=\"#CCCCCC\">\r\n  <tr>\r\n    <td align=\"center\">\r\n     <style type=\"text/css\">\r\n       <!--\r\n        .input { font-family: \$pollvars[font_face]; font-size: 9pt}\r\n       -->\r\n      </style> \r\n      <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\" bgcolor=\"#F6F6F6\">\r\n        <tr align=\"center\"> \r\n          <td colspan=\"2\" height=\"40\"><font face=\"\$pollvars[font_face]\" color=\"\$pollvars[font_color]\" size=\"1\"><b>\$question</b></font></td>\r\n        </tr>\r\n        <tr align=\"center\"> \r\n          <td colspan=\"2\"> \r\n            <form method=\"post\" action=\"\$this->form_forward\">\r\n              <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"1\">";
  $templates[] = " <tr> \r\n   <td width=\"11%\" align=\"center\"><input type=\"radio\" name=\"option_id\" value=\"\$data[option_id]\"></td>\r\n   <td width=\"89%\"><font face=\"\$pollvars[font_face]\" size=\"1\" color=\"\$pollvars[font_color]\">\$data[option_text]</font></td>\r\n </tr>";
  $templates[] = "                <tr align=\"center\" valign=\"bottom\"> \r\n                  <td colspan=\"2\"> \r\n                    <input type=\"submit\" value=\"\$pollvars[vote_button]\" class=\"input\" name=\"submit\">\r\n                    <input type=\"hidden\" name=\"action\" value=\"vote\">\r\n                    <input type=\"hidden\" name=\"poll_ident\" value=\"\$poll_id\">\r\n                  </td>\r\n                </tr>\r\n                <tr valign=\"bottom\"> \r\n                  <td colspan=\"2\" height=\"30\" align=\"center\"><font face=\"\$pollvars[font_face]\" color=\"\$pollvars[font_color]\" size=\"1\">[<a href=\"\$this->form_forward?action=results&amp;poll_ident=\$poll_id\">\$pollvars[result_text]</a>]</font></td>\r\n                </tr>\r\n              </table>\r\n            </form>\r\n          </td>\r\n        </tr>\r\n      </table>\r\n    </td>\r\n  </tr>\r\n</table>\r\n";
  $templates[] = "<table width=\"450\" border=\"0\" cellspacing=\"0\" cellpadding=\"2\" bgcolor=\"#CCCCCC\">\r\n  <tr>\r\n    <td align=\"center\"> \r\n      <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"3\" bgcolor=\"#F6F6F6\">\r\n        <tr align=\"center\"> \r\n          <td colspan=\"3\" height=\"40\"><font face=\"\$pollvars[font_face]\" size=\"1\" color=\"#000000\"><b>\$question</b></font></td>\r\n        </tr>\r\n";
  $templates[] = "        <tr>\r\n          <td width=\"3%\">&nbsp;</td>\r\n          <td><font face=\"\$pollvars[font_face]\" color=\"\$pollvars[font_color]\" size=\"1\">\$option_text</font></td>\r\n          <td><font face=\"\$pollvars[font_face]\" color=\"\$pollvars[font_color]\" size=\"1\"><img src=\"\$pollvars[base_gif]/\$poll_color.gif\" width=\"\$img_width\" height=\"\$pollvars[img_height]\"> \$vote_percent % (\$vote_count)</font></td>\r\n        </tr>\r\n";
  $templates[] = "        <tr> \r\n          <td colspan=\"3\" valign=\"bottom\" align=\"center\"><b><font face=\"\$pollvars[font_face]\" color=\"\$pollvars[font_color]\" size=\"1\">\$pollvars[total_text]: \r\n            \$total_votes</font></b></td>\r\n        </tr>\r\n        <tr align=\"center\"> \r\n          <td colspan=\"3\" valign=\"top\"><font face=\"\$pollvars[font_face]\" color=\"\$pollvars[font_color]\" size=\"1\">\$VOTE \r\n            <br>\r\n            \$COMMENT</font></td>\r\n        </tr>\r\n        <tr align=\"right\"> \r\n          <td colspan=\"3\"><font face=\"\$pollvars[font_face]\" size=\"1\"><a href=\"http://www.proxy2.de\" target=\"_blank\" title=\"Advanced Poll\">Version \$pollvars[poll_version]</a></font></td>\r\n        </tr>\r\n      </table>\r\n    </td>\r\n  </tr>\r\n</table>\r\n";
  $templates[] = "<table border=\"0\" cellspacing=\"0\" cellpadding=\"1\" align=\"center\" bgcolor=\"#666699\">\r\n  <tr align=\"center\">\r\n    <td>\r\n     <style type=\"text/css\">\r\n      <!--\r\n       .button {  font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 8pt}\r\n       .textarea {  font-family: \"MS Sans Serif\"; font-size: 9pt; width: 195px}\r\n       .input {  width: 195px}\r\n      -->\r\n    </style><font color=\"#FFFFFF\" face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"2\"><b>Send Your Comment</b></font></td>\r\n  </tr>\r\n  <tr>\r\n    <td>\r\n      <table border=\"0\" cellspacing=\"0\" cellpadding=\"5\" align=\"center\" bgcolor=\"#F3F3F3\" width=\"200\">\r\n        <tr>\r\n          <td width=\"149\">\r\n            <form method=\"post\" action=\"\$this->form_forward\">\r\n              <table border=\"0\" cellspacing=\"0\" cellpadding=\"2\" bgcolor=\"\" align=\"center\">\r\n                <tr>\r\n                  <td class=\"td1\" height=\"40\"><b><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\">\$question</font></b></td>\r\n                </tr>\r\n                <tr>\r\n                  <td class=\"td1\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\">Name:</font><br>\r\n                    <input type=\"text\" name=\"name\" maxlength=\"25\" class=\"input\" size=\"23\">\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td class=\"td1\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\">e-mail:</font><br>\r\n                    <input type=\"text\" name=\"email\" size=\"23\" maxlength=\"50\" class=\"input\">\r\n                  </td>\r\n                </tr>\r\n                <tr>\r\n                  <td class=\"td1\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\">Comment(*):</font><br>\r\n                    <font face=\"MS Sans Serif\" size=\"1\">\r\n                    <textarea name=\"message\" cols=\"19\" wrap=\"VIRTUAL\" rows=\"6\" class=\"textarea\"></textarea>\r\n                    </font>\r\n                  </td>\r\n                </tr>\r\n                <tr valign=\"top\">\r\n                  <td>\r\n                    <input type=\"submit\" value=\"Submit\" class=\"button\">\r\n                    <input type=\"reset\" value=\"Reset\" class=\"button\">\r\n                    <input type=\"hidden\" name=\"action\" value=\"add\">\r\n                    <input type=\"hidden\" name=\"id\" value=\"\$poll_id\">\r\n                  </td>\r\n                </tr>\r\n              </table>\r\n            </form>\r\n          </td>\r\n        </tr>\r\n      </table>\r\n    </td>\r\n  </tr>\r\n</table>\r\n";
  $poll_db->fetch_array($poll_db->query("SELECT tplset_name FROM $POLLTBL[poll_tplset] WHERE tplset_name='plain'"));
  if (!$poll_db->record['tplset_name']) {
    new_tplset("plain",$templates);
  }  
  $poll_db->fetch_array($poll_db->query("SELECT title FROM $POLLTBL[poll_tpl] WHERE title='poll_comment'"));
  if (!$poll_db->record['title']) {
    $poll_db->query("INSERT INTO $POLLTBL[poll_tpl] (tplset_id, title, template) VALUES (0, 'poll_comment', '<table border=\"0\" cellspacing=\"1\" cellpadding=\"2\" width=\"450\">\r\n  <tr bgcolor=\"#E4E4E4\"> \r\n    <td bgcolor=\"#F2F2F2\"><b><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">\$data[name]</font></b> \r\n      <i><font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">\$data[email]</font></i> \r\n      - <font size=\"1\" face=\"Verdana, Arial, Helvetica, sans-serif\">\$data[time]</font><br>\r\n      <font size=\"1\" face=\"Arial, Helvetica, sans-serif\">\$data[host] - \$data[browser]</font> \r\n    </td>\r\n  </tr>\r\n  <tr>\r\n    <td><font size=\"2\" face=\"Verdana, Arial, Helvetica, sans-serif\">\$data[message]</font> \r\n    </td>\r\n  </tr>\r\n  <tr> \r\n    <td height=\"15\">&nbsp;</td>\r\n  </tr>\r\n</table>\r\n')");
  }
  $poll_db->fetch_array($poll_db->query("SELECT title FROM $POLLTBL[poll_tpl] WHERE title='poll_list'"));
  if (!$poll_db->record['title']) {
    $poll_db->query("INSERT INTO $POLLTBL[poll_tpl] (tplset_id, title, template) VALUES (0, 'poll_list', '<table border=\"0\" cellspacing=\"0\" cellpadding=\"4\" width=\"450\">\r\n  <tr> \r\n    <td width=\"80\" valign=\"top\"> &#0149; <font size=\"2\" face=\"Arial, Helvetica, sans-serif\"><i>\$data[timestamp]</i></font></td>\r\n    <td width=\"354\"><font face=\"Arial, Helvetica, sans-serif\" size=\"2\"><a href=\"\$PHP_SELF?poll_id=\$data[poll_id]\">\$data[question]</a></font></td>\r\n  </tr>\r\n</table>\r\n')");
  }
  $poll_db->fetch_array($poll_db->query("SELECT title FROM $POLLTBL[poll_tpl] WHERE title='poll_form'"));
  if (!$poll_db->record['title']) {
    $poll_db->query("INSERT INTO $POLLTBL[poll_tpl] (tplset_id, title, template) VALUES (0, 'poll_form','<table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\r\n  <tr> \r\n    <td> \r\n      <style type=\"text/css\">\r\n      <!--\r\n       .button {  font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 8pt}\r\n       .textarea {  font-family: \"MS Sans Serif\"; font-size: 9pt; width: 300px}\r\n       .input {  width: 300px}\r\n      -->\r\n    </style>\r\n      <form method=\"post\" action=\"\$this->form_forward\">\r\n        <table border=\"0\" cellspacing=\"0\" cellpadding=\"4\">\r\n          <tr>\r\n            <td class=\"td1\"><font color=\"#CC0000\" face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\"><b>\$msg</b></font></td>\r\n          </tr>\r\n          <tr> \r\n            <td class=\"td1\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\">Name:</font><br>\r\n              <input type=\"text\" name=\"name\" value=\"\$comment[name]\" maxlength=\"30\" class=\"input\" size=\"25\">\r\n            </td>\r\n          </tr>\r\n          <tr> \r\n            <td class=\"td1\"><font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\">E-mail:</font><br>\r\n              <input type=\"text\" name=\"email\" value=\"\$comment[email]\" size=\"25\" maxlength=\"50\" class=\"input\">\r\n            </td>\r\n          </tr>\r\n          <tr> \r\n            <td class=\"td1\"> <font face=\"Verdana, Arial, Helvetica, sans-serif\" size=\"1\">Comment:</font><br>\r\n              <font face=\"MS Sans Serif\" size=\"1\"> \r\n              <textarea name=\"message\" cols=\"25\" wrap=\"VIRTUAL\" rows=\"8\" class=\"textarea\">\$comment[message]</textarea>\r\n              </font> </td>\r\n          </tr>\r\n          <tr valign=\"top\"> \r\n            <td> \r\n              <input type=\"submit\" value=\"Submit\" class=\"button\" name=\"submit\">\r\n              <input type=\"reset\" value=\"Reset\" class=\"button\" name=\"reset\">\r\n              <input type=\"hidden\" name=\"action\" value=\"add\">\r\n              <input type=\"hidden\" name=\"pcomment\" value=\"\$poll_id\">\r\n            </td>\r\n          </tr>\r\n        </table>\r\n      </form>\r\n    </td>\r\n  </tr>\r\n</table>\r\n')");
  }
  message_box("Upgrade completed!");
  break;

default:
  print_header();
  db_config();
  break;

}

?>