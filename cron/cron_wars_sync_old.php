<?
$_SERVER['REMOTE_ADDR'] = "127.0.0.1";
include '/www/chat.oldbk.com/connect.php';

	//������������� ����
	$handle = opendir('/www_logs/combats_wars/');
	$sync_wars=array();
	while (false !== ($entry = readdir($handle))) 
	{
		if($entry!='.'&& $entry!='..')
		{
	        	$load = file("/www_logs/combats_wars/".$entry);
	        	$sync_wars[$entry]=$load[0]; //������ ��� ��� ���� � ������� �� ����
	        }
    	}
    	
	$data=mysql_query("SELECT * FROM  oldbk.clans_war_city_sync where stime<=NOW()");//������� ��� � ���� ���� ��� ���������
	while($row=mysql_fetch_assoc($data))
	{
		$save = fopen("/www_logs/combats_wars/".$row[name],"w");//��������� ����� � ������ (��� ��� ����� ����� ���������� ��� �����)
		fwrite($save,$row[war_with]);
		unset($sync_wars[$row[name]]);//������� �� ������ ��������� � ������ ����, ��������� ����			
	}
	
	if((count($sync_wars)>0))//���� ��� �� �������� � ������, ������ ����� ���������. � �� ���� ������� � ������
	{
		foreach($sync_wars as $k=>$v)
		{
			unlink("/www_logs/combats_wars/".$k); // ������� ���� �����
		}	
	}
echo date("Y-m-d H:i:s");
echo "- ok \n";
?>