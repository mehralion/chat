<?
$_SERVER['REMOTE_ADDR'] = "127.0.0.1";
include '/www/chat.oldbk.com/connect.php';

	//������������� ����
	$handle = opendir('/www/logs/combats_wars/');
	$sync_wars=array();
	while (false !== ($entry = readdir($handle))) 
	{
		if($entry!='.'&& $entry!='..')
		{
	        	$load = file("/www/logs/combats_wars/".$entry);
	        	$sync_wars[$entry]=$load[0]; //������ ��� ��� ���� � ������� �� ����
	        }
    	}
    	
	$data=mysql_query("Select * from oldbk.clans_war_new where winner=0 and  stime<=NOW() ORDER BY id DESC");// ������� �����
	while($row=mysql_fetch_assoc($data))
	{
		$agr_text=strip_tags($row['agr_txt']);
		$agr_text=str_replace(" � ������� ",",",$agr_text);
		
		$def_text=strip_tags($row['def_txt']);
		$def_text=str_replace(" � ������� ",",",$def_text);
		
			$agr_array=explode(",",$agr_text);
			foreach($agr_array as $kk=>$vv)
			{
			$save = fopen("/www/logs/combats_wars/".$vv,"w");
			fwrite($save,$def_text);
			unset($sync_wars[$vv]);//������� �� ������ ��������� � ������ ����, ��������� ����						
			}

			$def_array=explode(",",$def_text);
			foreach($def_array as $kk=>$vv)
			{
			$save = fopen("/www/logs/combats_wars/".$vv,"w");
			fwrite($save,$agr_text);
			unset($sync_wars[$vv]);//������� �� ������ ��������� � ������ ����, ��������� ����						
			}
	}
	
	if((count($sync_wars)>0))//���� ��� �� �������� � ������, ������ ����� ���������. � �� ���� ������� � ������
	{
		foreach($sync_wars as $k=>$v)
		{
			unlink("/www/logs/combats_wars/".$k); // ������� ���� �����
		}	
	}
echo date("Y-m-d H:i:s");
echo "- ok \n";
?>