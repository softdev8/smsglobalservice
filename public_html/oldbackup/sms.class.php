<?php
//@ini_set('register_globals','on');
class sendsms
{
	 
	protected $msg_url;
	protected $login_url;
	
	function sendsms()
	{
		include_once "admin/ez_sql.php";
		$db1 = new db(EZSQL_DB_USER, EZSQL_DB_PASSWORD, EZSQL_DB_NAME, EZSQL_DB_HOST);
		$api=$db1->get_row("select apilink, username, password from sms_api where id=1");
		// routesms cpanel http://121.241.242.116/websms/ict
		//http://121.241.242.116:8080/sendsms?username=ct-smsglob&password=bolgsms!&type=0&dlr=0&destination=00923336581680&source=00923336581680&message=Hello
		$this->msg_url=$api->apilink."?username=".$api->username."&password=".$api->password;
		//$this->msg_url=$api->apilink."?username=".$api->username."&password=test";
		
			
	}
    
	function message($msg, $phone, $sender, $msgtype)
    {

		$dttime=gmdate("Y-m-d H:i:s",time()+(3600));
		include_once "admin/ez_sql.php";
		$db2 = new db(EZSQL_DB_USER, EZSQL_DB_PASSWORD, EZSQL_DB_NAME, EZSQL_DB_HOST);
		
		$message = urlencode($msg);	
		$sender=urlencode($sender);	
		$sms_url=$this->msg_url."&type=".$msgtype."&dlr=0&destination=".$phone."&source=".$sender."&message=".$message;
		//echo $sms_url;
				
		$curlHandle = curl_init();
		curl_setopt($curlHandle, CURLOPT_URL, $sms_url); // set the url to fetch
        curl_setopt($curlHandle, CURLOPT_HEADER, 0); // set headers (0 = no headers in result)
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1); // type of transfer (1 = to string)
        curl_setopt($curlHandle, CURLOPT_TIMEOUT, 30); // time to wait in seconds Library is not installed";
		$code = curl_exec($curlHandle);
			
		
		
		
		if($GLOBALS['cron']=="yes")
		{
			$customer_id=$GLOBALS['cs_id'];
		}
		else
		{
			$customer_id=$_SESSION['cus_id'];
		}
		$msg=ereg_replace("'" ,"\'",$msg);
		$qstaus="insert into sms_delivery (cus_id, msgtype, message, return_code, sent_date) values (".$customer_id.", ".$msgtype.",'".$msg."','".$code."', '".$dttime."')";
		//echo "<br/>This is deleivery status".$qstaus;
		$sms_status=$db2->query($qstaus);		
		return substr($code,0,4); 
    }

}

?>