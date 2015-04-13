<?php
function ldap_auth($ldap_id, $ldap_password){
	$ds = ldap_connect("ldap.iitb.ac.in") or die("Unable to connect to LDAP server. Please try again later.");
	if($ldap_id=='') die("You have not entered any LDAP ID. Please go back and fill it up.");
	if($ldap_password=='') die("You have not entered any password. Please go back and fill it up.");
	$sr = ldap_search($ds,"dc=iitb,dc=ac,dc=in","(uid=$ldap_id)");
	$info = ldap_get_entries($ds, $sr);
	$roll = $info[0]["employeenumber"][0];
	$ldap_id = $info[0]['dn'];
	if(@ldap_bind($ds,$ldap_id,$ldap_password))
	{
		return var_dump($info);
	}
	else
	{
		return "NONE";
	}
 	
}
echo ldap_auth($_GET['user'],$_GET['pass']);
?>

