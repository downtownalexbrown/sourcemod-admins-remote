<?php
        $steamid = $_POST['steamid'];
        $alias = $_POST['alias'];

	$conn_id = ftp_connect(""); // Remote gameserver address
	$ftp_user = ""; // FTP username
        $ftp_pass = ""; // FTP login

        $login_result = ftp_login($conn_id, $ftp_user, $ftp_pass);
        ftp_pasv($conn_id, true);

        if ((!conn_id) || (!login_result)) {
        	echo "FTP is broke";
                exit;
        }

        ftp_get($conn_id, './admins', '/csgo/addons/sourcemod/configs/admins_simple.ini', FTP_ASCII, 0);

        file_put_contents("admins", "\"" . $steamid . "\"                       \"flags\" \n", FILE_APPEND);
        $upload = ftp_put($conn_id, '/csgo/addons/sourcemod/configs/admins_simple.ini', './admins', FTP_ASCII);

        ftp_close($conn_id);  
?>
