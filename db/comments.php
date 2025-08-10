<?php
global $HTTP_SERVER_VARS, $HTTP_GET_VARS, $HTTP_POST_VARS;
$include_path = dirname(__FILE__);
if ($include_path == "/") {
    $include_path = ".";
}

$register_poll_vars = array("id","template_set","action");
for ($i=0;$i<sizeof($register_poll_vars);$i++) {
    if (isset($HTTP_POST_VARS[$register_poll_vars[$i]])) {
        eval("\$$register_poll_vars[$i] = \"".trim($HTTP_POST_VARS[$register_poll_vars[$i]])."\";");      
    } elseif (isset($HTTP_GET_VARS[$register_poll_vars[$i]])) {
        eval("\$$register_poll_vars[$i] = \"".trim($HTTP_GET_VARS[$register_poll_vars[$i]])."\";");      
    } else {
        eval("\$$register_poll_vars[$i] = '';");               
    }
}

require $include_path."/include/config.inc.php";
require $include_path."/include/$POLLDB[class]";
require $include_path."/include/class_poll.php";
require $include_path."/include/class_pollcomment.php";
$CLASS["db"] = new polldb_sql;
$CLASS["db"]->connect();

$my_comment = new pollcomment();

if (!empty($template_set)) {
    $my_comment->set_template_set("$template_set");
}
if (empty($id)) {
    echo $my_comment->print_message("Poll ID <b>".$id."</b> does not exist or is disabled!");
} elseif ($my_comment->is_comment_allowed($id)) {
    if ($action == "add") {
        $poll_input = array("message","name","email");
        for($i=0;$i<sizeof($poll_input);$i++) {
            if (isset($HTTP_POST_VARS[$poll_input[$i]])) {     
                $HTTP_POST_VARS[$poll_input[$i]] = trim($HTTP_POST_VARS[$poll_input[$i]]);    
            } else {
                $HTTP_POST_VARS[$poll_input[$i]] = '';
            }
        }
        if (empty($HTTP_POST_VARS['name'])) {
            echo $my_comment->print_message("Please enter your name.<br><a href=\"javascript:history.back()\">Go back</a>");
        }
        elseif (empty($HTTP_POST_VARS['message'])) {
            echo $my_comment->print_message("You forgot to fill in the message field!<br><a href=\"javascript:history.back()\">Go back</a>");
        }
    /*
        elseif (empty($HTTP_POST_VARS['email'])) {
            echo $my_comment->print_message("You must specify your e-mail address.!<br><a href=\"javascript:history.back()\">Go back</a>");
        }
    */
        else {
            $my_comment->add_comment($id);
            echo $my_comment->print_message("Your message has been sent!",1);
        }
    } else {
        echo $my_comment->poll_form($id);
    }
}

?>