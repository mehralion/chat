<?
define("olddelo",0); //�������� ������ ������� ���� - ��������� �� ��� ��� ��� ���� ����� ����� ��� �����
include "configcity.php"; // ���������� ��������� ������

$db_city[0]='oldbk.';
$db_city[1]='avalon.';
$db_city[2]='angels.';
$city_name[0]='CapitalCity';
$city_name[1]='AvalonCity';
$city_name[2]='AngelsCity';
header("Cache-Control: no-cache");
$ip = $_SERVER['REMOTE_ADDR'];
require_once('memcache.php');

	$rooms = array ("��������� �������","������� ��� ��������","������� ��� �������� 2","������� ��� �������� 3","������� ��� �������� 4","��� ������ 1","��� ������ 2","��� ������ 3","�������� ���",
	"��������� ���","����� �������-�����","���������� ���","����� �����","���������� �����","�������� ���","��� ���������","����� ������ ��������","��� ����","������� ����","������",
	"����������� �������","����������� �����","�������","��������� ����������","���������� ����","������������ �������","�������� �����","�����","������������ ������","����","���",
	"����� ������","���������� �����","�������� �����","��������� �������","������� '�������'","��� ������","���������� ����� - ��������","���������� ����� - �������","���������� ����� - ���������� ����",
	"���������� ����� - ����������","���������� ����� - ������� ������","������� ���������","������� �������","������� �44","���� � �������� �����","��������� �����","�������� �����","�������� �����","���� ������ ������","�������� �������",
	"������� ��������","������� ��������","��������� ��������","��� �����","������� �����","������� ������","��� �������� ����","������� �58","������� �59","����� �����","������� �61","������� �62","������� �63","������� �64","������� �65","66"=>'�������� �����',
"200"=> "���������",

//�������
"70" => "�������",
"71" => "�������",
"72" => "�������",
"75" => "�������",
"76" => "��� �������",
//
"80" => "�������",
"90" => "����� ����� �����������",
"91" => "�������", // � 91 � �� 97 ������ �� ������ � 191 �� ����� ��������
"92" => "�������",
"93" => "����������� ����� � ���������",
"94" => "���������� �������� � �������",
"95" => "���������� ��������",
"96" => "����� �����������",
"191" => "����� ��������",

//�������
"197"=>"��������� �������",
"198"=>"��������� �������",
"199"=>"��������� �������",

"270"=>"���� � ��������� ��������",
"271"=> "��������� ��������[1]",
"272"=> "��������� ��������[2]",
"273"=> "��������� ��������[3]",
"274"=> "��������� ��������[4]",
"275"=> "��������� ��������[5]",
"276"=> "��������� ��������[6]",
"277"=> "��������� ��������[7]",
"278"=> "��������� ��������[8]",
"279"=> "��������� ��������[9]",
"280"=> "��������� ��������[10]",
"281"=> "��������� ��������[11]",
"282"=> "��������� ��������[12]",
// ��������� ��������
"240"=>"���� � ��������� ��������",
"241"=> "��������� ��������[1]",
"242"=> "��������� ��������[2]",
"243"=> "��������� ��������[3]",
"244"=> "��������� ��������[4]",
"245"=> "��������� ��������[5]",
"246"=> "��������� ��������[6]",
"247"=> "��������� ��������[7]",
"248"=> "��������� ��������[8]",
"249"=> "��������� ��������[9]",
"250"=> "��������� ��������[10]",
"251"=> "��������� ��������[11]",
"252"=> "��������� ��������[12]",
"253"=> "��������� ��������[13]",
//�������� �������
"210"=>"���� � �������� �������",
"211"=> "�������� �������[1]",
"212"=> "�������� �������[2]",
"213"=> "�������� �������[3]",
"214"=> "�������� �������[4]",
"215"=> "�������� �������[5]",
"216"=> "�������� �������[6]",
"217"=> "�������� �������[7]",
"218"=> "�������� �������[8]",
"219"=> "�������� �������[9]",
"220"=> "�������� �������[10]",
"221"=> "�������� �������[11]",
"222"=> "�������� �������[12]",
"223"=> "�������� �������[13]",


//��� � ���������� ���������
"300" => "��� � ���������� ���������",

//���� ����� 400-450
"400" => "�������� �����",
"401" => "���� � �������� ������",
"402" => "�������� ������",

// ��
"501" => "��������� �����",
"502" => "�������",
"503" => "����� 3",
"504" => "����� 2",
"505" => "�������� ����� 2",
"506" => "����� 4",
"507" => "����� 1",
"508" => "��������� �������",
"509" => "��� ������ 2",
"510" => "�������� ����� 1",
"511" => "����� �� �����",
"512" => "��� ������ 2",
"513" => "����",
"514" => "��������� �������",
"515" => "��� ������ 1",
"516" => "������ ��� 2",
"517" => "������ ��� 1",
"518" => "������� ��� 3",
"519" => "��� ������ 1",
"520" => "��� ������ 3",
"521" => "��������� 3",
"522" => "��� ��������",
"523" => "���������",
"524" => "������� ���-����",
"525" => "������� ���",
"526" => "���������",
"527" => "��������� 1",
"528" => "���������� ����",
"529" => "�����.����-����",
"530" => "������ �������",
"531" => "��������� ��� 1",
"532" => "������� ��� 2",
"533" => "���������� 1",
"534" => "��������� 2",
"535" => "������ �����. �����",
"536" => "������� � �������",
"537" => "���������� 3",
"538" => "����� �� ����.����",
"539" => "������� ���-�������",
"540" => "�������� � ������ 1",
"541" => "����� �����. ����",
"542" => "��������� 4",
"543" => "��������� ��� 3",
"544" => "��������� ��� 2",
"545" => "��������� ������� 1",
"546" => "�������� � ������ 2",
"547" => "������ �����. ����� 2",
"548" => "�����.����-�����",
"549" => "���������� 2",
"550" => "��������� ������� 3",
"551" => "��������� ������� 2",
"552" => "�������� � ������ 3",
"553" => "�������",
"554" => "���������",
"555" => "��� ��������",
"556" => "�������� � ������ 4",
"557" => "������ �������",
"558" => "������ ������",
"559" => "������� � �������",
"560" => "������" ,
"600" => "�������",

"10000" => "����� ������",
"999" => "���� � �����",
"61000" => "������",
"72001" => "�������� �������",
"72002" => "����� �����",
);

if (CITY_ID == 0) {
	$rooms[49] = "���� �������";
}

function get_mag_stih($telo,$effect=null)
{
 					if ($telo['smagic']==0)
					{
					$dt=$telo['borndate'];
					$out_array=array();
					$month=substr($dt,3,2);
					$day=substr($dt,0,2);
				
					$month=(int)$month;
					$day=(int)$day;
				
					  if ($month == 1) {
				         if ($day >= 21) {$zodik=11;} else {$zodik=10;}}
				      else if ($month == 2) {
				         if ($day >= 21) {$zodik=12;} else {$zodik=11;} }
				       else if ($month == 3) {
				         if ($day >= 21) {$zodik=1;} else {$zodik=12;} }
				       else if ($month == 4) {
				         if ($day >= 21) {$zodik=2;} else {$zodik=1;} }
				       else if ($month == 5) {
				         if ($day >= 21) {$zodik=3;} else {$zodik=2;} }
				       else if ($month == 6) {
				         if ($day >= 22) {$zodik=4;} else {$zodik=3;} }
				       else if ($month == 7) {
				         if ($day >= 23) {$zodik=5;} else {$zodik=4;} }
				       else if ($month == 8) {
				         if ($day >= 24) {$zodik=6;} else {$zodik=5;} }
				       else if ($month == 9) {
				         if ($day >= 24) {$zodik=7;} else {$zodik=6;} }
				       else if ($month == 10) {
				         if ($day >= 24) {$zodik=8;} else {$zodik=7;} }
				       else if ($month == 11) {
				         if ($day >= 23) {$zodik=9;} else {$zodik=8;} }
				       else if ($month == 12) {
				         if ($day >= 22) {$zodik=10;} else {$zodik=9;}}
				         
				         
				         if (($zodik==1) OR ($zodik==5) OR ($zodik==9) )
				         {
				         $out_array[]=1; // ����� (����, ���, �������)
				         }
				         else if (($zodik==2) OR ($zodik==6) OR ($zodik==10))
				         {
				         $out_array[]=2; // ����� (�������. �����, ����)
				         }
				         else if (($zodik==3) OR ($zodik==7) OR ($zodik==11))
				         {
				         $out_array[]=3; //������ (����, �������, ��������)
				         }
				         else if (($zodik==4) OR ($zodik==8) OR ($zodik==12) )
				         {
				         $out_array[]=4; //���� (���, ��������, ����)
				         } 
				        }
				        else
				        {
					$out_array[]=$telo['smagic']; //������ ����� �������� �� ���� � �� ����������� �� ���� �������� ��� ���� �� 20/02/2016				        
				        }
        
        
        //�������������� 
         if (is_array($effect[10901]))
         	{
	         $out_array[]=1; // ����� (����, ���, �������)         	
         	}
	elseif (is_array($effect[10902]))
         	{
	         $out_array[]=2; // ����� (�������. �����, ����)
         	}         	
	elseif (is_array($effect[10903]))
         	{
         	$out_array[]=3; //������ (����, �������, ��������)
         	}     
	elseif (is_array($effect[10904]))
         	{
	         $out_array[]=4; //���� (���, ��������, ����)
         	}              	    	         
         	
 return $out_array;        
}


	function GetSalt(&$salt,$len) {
		$ret = substr($salt,0,$len);
		$salt = substr($salt,$len);
		return $ret;
	}


	function xorit($input) {
		for ($i = 0; $i < strlen($input); $i++) {
			$input[$i] = chr(ord($input[$i]) ^ 0xAF);
		}
		return base64_encode($input);
	}

	function codein($input) {
		$input = strval($input);
		$salt = "b42q9y";
		$salt = sha1($input.$salt).sha1($input.$input.$salt).sha1($input.$salt.sha1($input));
		$salt = preg_replace('~[a-z]~iU','',$salt);
	
		$kol=strlen($input);
		$input=strrev($input);
		$to_out = "";
		$c=0;
		for ($x=0; $x<$kol; $x++) {
 			$c++;
			if ($c==1)  { $to_out.=GetSalt($salt,1).$input[$x]; }
			else  if ($c==2)  { $to_out.=GetSalt($salt,2).$input[$x]; }
			else  if ($c==3)  { $to_out.=GetSalt($salt,3).$input[$x]; $c=0;} 
		}
		return $to_out;
	}


function open_clan_war_files($klan_short)
	{
       	if (!file_exists("/www/logs/combats_wars/".$klan_short))
		{
			return FALSE;
		}
		else
		{
			$load = file("/www/logs/combats_wars/".$klan_short);
			return $load;
        }
	}



function addchp ($text,$who,$room=0,$city=-1) {
			global $user;
			if ($room==0) {
				$room = $user['room'];
			}


			$city=$city+1;


			$txt_to_file=":[".time()."]:[{$who}]:[".($text)."]:[".$room."]";
			$room=-1; // TEST only by Fred
			$q = mysql_query("INSERT INTO `oldbk`.`chat` SET `text`='".mysql_real_escape_string($txt_to_file)."',`city`='".($city)."', `room`={$room} ;");
			if ($q !== FALSE) return true;
			return false;

			/*
			$fp = fopen ("/w/www/chat/chat.txt","a"); //��������
			flock ($fp,LOCK_EX); //���������� �����
			fputs($fp ,":[".time()."]:[{$who}]:[".($text)."]:[".$room."]\r\n"); //������ � ������
			fflush ($fp); //�������� ��������� ������ � ������ � ����
			flock ($fp,LOCK_UN); //������ ����������
			fclose ($fp); //��������
			*/
}

function err($t) {
	echo '<font color=red>',$t,'</font>';
}

function round_time($ts, $step) 
{
	return(floor(floor($ts/60)/60)*3600+floor(date("i",$ts)/$step)*$step*60);
}



	if (isset($_SESSION['uid'])) 
	{
		$query = mysql_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;");

		if (mysql_num_rows($query) != 1) 
		{
		die();
		}
		
		$user = mysql_fetch_assoc($query);		

		if(($user['align']>1 && $user['align']<2) || $user['deal']==-1)
		{

			if (!isset($_SESSION['pal_viz_time'])) $_SESSION['pal_viz_time'] = 0;

			if(!$_SESSION['pal_viz_time'] || $_SESSION['pal_viz_time']<time())
			{
				$_SESSION['pal_viz_time']=time()+60*15; //������ 5 ����� ������ ��������������� �����

				$chatactive = 1;
				if (!isset($_SESSION['lastpalupdate'])) $_SESSION['lastpalupdate'] = time();
				if ($_SESSION['lastpalupdate'] < time()-2*60) $chatactive = 0;
				mysql_query("INSERT into oldbk.pal_vizits SET owner='".$user['id']."' ,room='".$user['room']."', id_city=1, `chatactive` = ".$chatactive." ,`date`='".round_time(time(),15)."';");

			}
		}

		
		if($user['klan']=='Adminion' || $user['klan']=='radminion')
		{
			define("ADMIN",true);
		}
		else
		{
			define("ADMIN",false);
		}	

		if  ($user['block'] == 1) 
 		{
		 $_SESSION['block']=1;
		 die("<script>location.href='index.php?exit=3.14zde';</script>");
		}
		
		if($_SESSION['sid'] != $user['sid'])
		{
		  $_SESSION['uid'] = null;
		  $paramsz=mt_rand(11111111,999999999);
		   die ("<script>top.location.href='index.php?exit=$paramsz';</script>");
		}
		
		//fix sex
		if ($user['hidden']>0) {$user['sex']=1; }
		
		                if (isset($_SESSION['adm_view']) && $_SESSION['adm_view']==1)
				{
				}
				else
				{
				if (!isset($_SESSION['o_up'])) $_SESSION['o_up'] = 0;
				//����������� �������� ��� �������
				if ($_SESSION['o_up']<time()-20)
						{
							if (($user['ldate']<time()) OR ($user['bot']>0) )   // ���� ����� ������ ��� ������� �� ������ ����� - ���� ������ ���� �� �������
						 	{
							mysql_query("UPDATE users set ldate='".time()."' where id={$user['id']}; ");
//							save_otime_to_file_2($user['id']);
							}
						
						$_SESSION['o_up']=time();
						}
				//��� � ��� - ������ ���������� �������� ��� �������
				
				require_once('config_ko.php');
				if ((time()>$KO_start_time3) and (time()<$KO_fin_time3))
						{
						//����� �������� - ����
						if (!(isset($_SESSION['onl_1up']))) { $_SESSION['onl_1up']=time(); } // ��� ������ � ������ - �� ������ ������� ����� � ���� ���
						
						if ($_SESSION['onl_1up']<time()-3600) //1 ��� � ���
								{
							 	mysql_query("INSERT INTO `oldbk`.`users_timer` SET `owner`='{$user['id']}',`ctime`=1,`ttime`=NOW() ON DUPLICATE KEY UPDATE `ctime`=`ctime`+1,`ttime`=NOW() ;");
								$_SESSION['onl_1up']=time();
								
																$get_user_day=mysql_fetch_array(mysql_query("select * from oldbk.users_timer where owner='{$user['id']}' "));
								if ($get_user_day)
									{
										//�� ���
										$prsbat=10; //10% �� ���
										if ($get_user_day['cday']==6) $prsbat=5; //5 �� ���
										$myp=$get_user_day['cbattle']*$prsbat;
										if ($myp>50) $myp=50;
										//�� ������
										$mypo=$get_user_day['ctime']*10;
										if ($mypo>50) $mypo=50;
										$myp+=$mypo;
										
										if ($myp==10)
										{
										//���������� ��������
										$txtdata[0]='������� ��� ���������: ���� ������';
										$txtdata[1]='������� ��� ���������: ���� ������';										
										$txtdata[2]='������� ��� ���������: ���� ������';										
										$txtdata[3]='������� ��� ���������: ���� ���������';										
										$txtdata[4]='������� ��� ���������: ���� �����';										
										$txtdata[5]='������� ��� ���������: ���� ������';										
										$txtdata[6]='������� ��� ���������: ���� �������';										
										
										$txtdata=$txtdata[$get_user_day['cday']];
										
										$mtext="� ��� ��������� ����� ������� <a href=http://oldbk.com/encicl/?/act_line.html target=_blank>".$txtdata."</a>! ����������� �������� ����� ����� ������ �<a href=\"javascript:void(0)\" onclick=top.cht(\"http://capitalcity.oldbk.com/main.php?edit=1&effects=1#quests\")>���������</a>� ���������.";
										addchp ('<font color=red>��������!</font>'.$mtext,'{[]}'.$user['login'].'{[]}',$user['room'],$user['id_city']);						   		
										}
									}
								
								}
						
						}
				elseif ((time()>$KO_start_time4) and (time()<$KO_fin_time4))
						{
						//����� �������� - ����
						if (!isset($_SESSION['onl_1up'])) $_SESSION['onl_1up'] = 0;
						if ($_SESSION['onl_1up']==0) { $_SESSION['onl_1up']=time(); } // ��� ������ � ������ - �� ������ ������� ����� � ���� ���
						
						if ($_SESSION['onl_1up']<time()-3600) //1 ��� � ���
								{
							 	mysql_query("INSERT INTO `oldbk`.`users_timer` SET `owner`='{$user['id']}',`ctime`=1,`ttime`=NOW() ON DUPLICATE KEY UPDATE `ctime`=`ctime`+1,`ttime`=NOW() ;");
								$_SESSION['onl_1up']=time();
								}
						
						}		
					
						
						
                		}
				
		
		
	}
	else
	{
	die();
	}
		
function save_otime_to_file($text)
	{
	$fp = fopen ("/www/otime.txt","a"); //��������
	flock ($fp,LOCK_EX); //���������� �����
	fputs($fp , $text."\n"); //������ � ������
	fflush ($fp); //�������� ��������� ������ � ������ � ����
	flock ($fp,LOCK_UN); //������ ����������
	fclose ($fp); //��������
	}

function save_otime_to_file_2($text)
	{
	$fp = fopen ("/www/ltime.txt","a"); //��������
	flock ($fp,LOCK_EX); //���������� �����
	fputs($fp , $text."\n"); //������ � ������
	fflush ($fp); //�������� ��������� ������ � ������ � ����
	flock ($fp,LOCK_UN); //������ ����������
	fclose ($fp); //��������
	}

function get_item_fid($row)
 {
 $c[0]='cap';
 $c[1]='ava';
 $c[2]='ang';
 $out=$c[$row['idcity']].$row[id];

 return $out;
 }

function link_for_item($row,$retpath = false)
{

$ehtml = str_replace('.gif','',$row['img']);

	$razdel=array(
		1=>"kasteti", 11=>"axe", 12=>"dubini", 13=>"swords", 14=>"bow", 2=>"boots", 21=>"naruchi", 22=>"robi", 23=>"armors",
		24=>"helmet", 3=>"shields",4=>"clips", 41=>"amulets", 42=>"rings", 5=>"mag1", 51=>"mag2", 6=>"amun", 61=>'eda' , 72 =>''
	);

	$row['otdel'] == '' ? $xx = $row['razdel'] : $xx = $row['otdel'];

	if ($row['type']==30) 
	{
		$razdel[$xx]="runs/".$ehtml;
	} elseif($razdel[$xx] == '') 
	{
            	$dola = array(5001,5002,5003,5005,5010,5015,5020,5025);
		if (in_array($row['prototype'],$vau4)) 
		{
			$razdel[$xx]='vaucher';
		} elseif (in_array($row['prototype'],$dola)) 
		{
			$razdel[$xx]='earning';
		} else 
		{
			$oskol=array(15551,15552,15553,15554,15555,15556,15557,15558,15561,15562,15568,15563,15564,15565,15566,15567);
			if (in_array($row['prototype'],$oskol)) {
				$razdel[$xx]="amun/".$ehtml;
			} else {
				$razdel[$xx]='predmeti/'.$ehtml;
			}
		}
	} else 
	{
		$razdel[$xx]=$razdel[$xx]."/".$ehtml;

	}

	if (($row['art_param'] != '') and ($row['type']!=30)) 
	{
		if ($row['arsenal_klan'] != '')	
		{
			// ��������
			$razdel[$xx]='art_clan';
		} elseif ($row['sowner'] != 0) {
				//������
			$razdel[$xx]='art_pers';
		}
	}

	if ($retpath) return $razdel[$xx];

	$out= "<a href=http://oldbk.com/encicl/".$razdel[$xx].".html target=_blank>".$row['name']."</a>";
	return $out;
}

?>