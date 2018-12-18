<?


include "ny_events.php";

//������ ��� ����� ��
/*
������������ ����� ����� ���������� ����� ������:

�  $KO_start_time  �� $KO_fin_time ���������� ��������� ����� �� ������� �����.

1. ��� ������� ����� ������� - 10% �� ���� �� ��
2. ��� ������� ����� ���� ���� - 10% �� ���� �� ��
3. ��� ���������� �������� ������� ����� - 10% � ����� �� ��

�������� � ������ ����������, � ����� �������� ��� �� ��������.

*/

require_once __DIR__.'/classes/ConfigKo.php';
global $memcache;
$ConfigKo = ConfigKo::init($memcache);
$config_ko_list = $ConfigKo->getList();
foreach ($config_ko_list as $field => $value) {
	${$field} = $value;
}


$close_razdel_mf = 0;
$shop_skupka = 0;//  ������ ���/����		
$fontan_hill_travma = 0; //������� ������ � �������. 
$haos_recharge_50_per = 1; // ��������� �� ����*���� �� //�������� - ����������� ������  (�� ���������� �������� ����, ��� �������, � ���� �� ������.)
$start_volna = 0;
$end_volna = 0;


/// ==============================================================================================

//�������������� ���������� ������� �� ���� ������, ���� ���������� ���� ������. 

	//�� ������� �� �� (��������, ���� � ��)
	{
		//��������
		$snegovik_start=mktime(0,0,0,12,1,2016);
		$snegovik_stop=mktime(23,59,59,2,28,2017);
				
		//���� ��������� � ������ (��) 
		//�� ���0 - ����
		// >���0 <���1 - ���� + 1 ���
		// >���1 <���2 - ���� + 2 ���
		// >���2 <���3 - ���� + 3 ��� (�������� ����������� ���������)
		// >���3 ������ ������ ��������� �������� ������. ������� �������. �� �� ������ �������� ������ ���������
		$count_bols_st1[0]=array(5000,10000,15000,20001);
		$count_bols_st1[1]=array(3000,5000,7000,10001);
	}
	


	if ((time()>$ny_events['skupkastart']) and (time()<$ny_events['skupkaend'])) {
		$close_razdel_mf = 1;
		$shop_skupka=1;
		$price_koef=0.9;
		$prnt_inf = '<b>����� ����������� ������ �� �������� �� '.date("d.m.Y H:i:s",$ny_events['skupkaend']).'</b> &nbsp;&nbsp;';
	}


	if ((time()>$ny_events['nghaosstart']) and (time()<$ny_events['nghaosend'])) {
		$need_money_stat = 0; //����������������� ������ 
		$need_money_all_stat = 0; //����� ������
		$need_money_all_masters = 0; // ����� ������
		$update=0; //�� ������ ����� �� ������� ���-�� �������, ���� �� ������� ���������� (������ ������ ������� ������ � ���� � ���-�� �������������� �����������������)
		$txt='����� �����. '; // ��� ������ � ����
	 	$fontan_hill_travma=5;
		$mf_stat_rate=0;  //����� �� � ������ �� ����*���� � //�������� - ����� ������ � ������ (���������)	

		$start_volna = $ny_events['nghaosstart'];
		$end_volna = $ny_events['nghaosend'];
		//� �������� ���� ��������� ���� �� ��� � �������, �������� ���� ����, ������ 5-� ������  � 11-� �����
	}

	if ((time()>$ny_events['hbhaosstart']) and (time()<$ny_events['hbhaosend'])) {
		$need_money_stat = 0; //����������������� ������ 
		$need_money_all_stat = 0; //����� ������
		$need_money_all_masters = 0; // ����� ������
		$update=0; //�� ������ ����� �� ������� ���-�� �������, ���� �� ������� ���������� (������ ������ ������� ������ � ���� � ���-�� �������������� �����������������)
		$txt='����� �����. '; // ��� ������ � ����
	 	$fontan_hill_travma=5;
		$mf_stat_rate=0;  //����� �� � ������ �� ����*���� � //�������� - ����� ������ � ������ (���������)	

		$start_volna = $ny_events['hbhaosstart'];
		$end_volna = $ny_events['hbhaosend'];
		//� �������� ���� ��������� ���� �� ��� � �������, �������� ���� ����, ������ 5-� ������  � 11-� �����
	}
	
	if(time()>mktime(0,0,0,1,31,2015) && time()<mktime(23,59,59,2,1,2015))
	{
		$start_volna=mktime(0,0,0,1,31,2015);
		$end_volna=mktime(23,59,59,2,1,2015);
		$need_money_stat = 0; //����������������� ������ 
		$need_money_all_stat = 0; //����� ������
		$need_money_all_masters = 0; // ����� ������
		$update=0; //�� ������ ����� �� ������� ���-�� �������, ���� �� ������� ���������� (������ ������ ������� ������ � ���� � ���-�� �������������� �����������������)
		$txt='����� �����. '; // ��� ������ � ����
	 	$fontan_hill_travma=5;
	 	$fontan_lab_time=true;
		$mf_stat_rate=0;  //����� �� � ������ �� ����*���� � //�������� - ����� ������ � ������ (���������)	

	}

	//����� ����� ��� ���������
	if(time()>mktime(0,0,0,10,30,2016) && time()<mktime(23,59,59,11,1,2016))
	{
		$start_volna=mktime(0,0,0,10,30,2016);
		$end_volna=mktime(23,59,59,11,1,2016);
		$need_money_stat = 0; //����������������� ������ 
		$need_money_all_stat = 0; //����� ������
		$need_money_all_masters = 0; // ����� ������
		$update=0; //�� ������ ����� �� ������� ���-�� �������, ���� �� ������� ���������� (������ ������ ������� ������ � ���� � ���-�� �������������� �����������������)
		$txt='����� �����. '; // ��� ������ � ����
	 	$fontan_hill_travma=5;
	 	$fontan_lab_time=false;
		$mf_stat_rate=0;  //����� �� � ������ �� ����*���� � //�������� - ����� ������ � ������ (���������)	

	}

	//����� ����� ��� ������� ������
	if(time()>mktime(17,0,0,11,29,2016) && time()<mktime(23,59,59,12,6,2016))
	{
		$start_volna=mktime(17,0,0,11,29,2016);
		$end_volna=mktime(23,59,59,12,6,2016);
		$need_money_stat = 0; //����������������� ������ 
		$need_money_all_stat = 0; //����� ������
		$need_money_all_masters = 0; // ����� ������
		$update=0; //�� ������ ����� �� ������� ���-�� �������, ���� �� ������� ���������� (������ ������ ������� ������ � ���� � ���-�� �������������� �����������������)
		$txt='����� �����. '; // ��� ������ � ����
	 	$fontan_hill_travma=5;
	 	$fontan_lab_time=false;
		$mf_stat_rate=0;  //����� �� � ������ �� ����*���� � //�������� - ����� ������ � ������ (���������)	

	}


	if(time()>mktime(0,0,0,11,8,2017) && time()<mktime(23,59,59,11,11,2017)) //: 4-6 ������������
	{
		$start_volna=mktime(0,0,0,11,8,2017);
		$end_volna=mktime(23,59,59,11,11,2017);
		$need_money_stat = 0; //����������������� ������ 
		$need_money_all_stat = 0; //����� ������
		$need_money_all_masters = 0; // ����� ������
		$update=0; //�� ������ ����� �� ������� ���-�� �������, ���� �� ������� ���������� (������ ������ ������� ������ � ���� � ���-�� �������������� �����������������)
		$txt='����� �����. '; // ��� ������ � ����
	 	$fontan_hill_travma=5;
	 	$fontan_lab_time=false;
		$mf_stat_rate=0;  //����� �� � ������ �� ����*���� � //�������� - ����� ������ � ������ (���������)	
		$shop_skupka=1;
		$price_koef=0.9;
	}
	
//������
$gametime['15.06']=array('france','honduras');
$gametime['16.06']=array('argentina','bosnia_herzegovina','iran','nigeria','germany','portugal');
$gametime['17.06']=array('brazil','mexico','ghana','united_states','belgium','algeria');
$gametime['18.06']=array('netherlands','chile','australia','spain','russia','korea');
$gametime['19.06']=array('cameroon','croatia','colombia','cote_d_ivoire','england','uruguay');
$gametime['20.06']=array('japan','greece','costa_rica','italy','switzerland','france');
$gametime['21.06']=array('ecuador','honduras','argentina','iran','germany','ghana');
$gametime['22.06']=array('bosnia_herzegovina','nigeria','russia','belgium','korea','algeria');
$gametime['23.06']=array('netherlands','chile','australia','spain','united_states','portugal');
$gametime['24.06']=array('brazil','cameroon','mexico','croatia','costa_rica','italy','england','uruguay');
$gametime['25.06']=array('colombia','cote_d_ivoire','japan','greece','bosnia_herzegovina','argentina','iran','nigeria');
$gametime['26.06']=array('switzerland','ecuador','honduras','france','germany','portugal','united_states','ghana');
$gametime['27.06']=array('russia','belgium','korea','algeria');
$gametime['28.06']=array('brazil','chile');
$gametime['29.06']=array('colombia','uruguay','netherlands','mexico');
$gametime['30.06']=array('costa_rica','greece','france','nigeria');
$gametime['01.07']=array('argentina','switzerland','germany','algeria');
$gametime['02.07']=array('belgium','united_states');
$gametime['04.07']=array('germany','france');
$gametime['05.07']=array('brazil','colombia','argentina','belgium');
$gametime['06.07']=array('netherlands','costa_rica');
$gametime['09.07']=array('germany','brazil');
$gametime['10.07']=array('argentina','netherlands');
$gametime['13.07']=array('brazil','netherlands','germany','argentina');
 


$flag[171171]='brazil';
$flag[171172]='mexico';
$flag[171173]='cameroon';
$flag[171174]='croatia';
$flag[171175]='netherlands';
$flag[171176]='chile';
$flag[171177]='australia';
$flag[171178]='spain';
$flag[171179]='colombia';
$flag[171180]='cote_d_ivoire';
$flag[171181]='japan';
$flag[171182]='greece';
$flag[171183]='costa_rica';
$flag[171184]='italy';
$flag[171185]='england';
$flag[171186]='uruguay';
$flag[171187]='switzerland';
$flag[171188]='ecuador';
$flag[171189]='france';
$flag[171190]='honduras';
$flag[171191]='argentina';
$flag[171192]='bosnia_herzegovina';
$flag[171193]='iran';
$flag[171194]='nigeria';
$flag[171195]='germany';
$flag[171196]='portugal';
$flag[171197]='ghana';
$flag[171198]='united_states';
$flag[171199]='russia';
$flag[171200]='belgium';
$flag[171201]='korea';
$flag[171202]='algeria';  	

$banners[1]=' src="http://i.oldbk.com/i/icon_new.png" title="�������!" ';
$banners[2]=' src="http://i.oldbk.com/i/icon_action.png" title="�����!" ';
?>