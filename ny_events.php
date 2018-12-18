<?php
	$ny_events_cur_m = date("m");
	$ny_events_cur_y = date("Y");

	$ny_events = array(
		// � 1 ������� �� 31 ������
		'sertstart' => $ny_events_cur_m == 12 ? mktime(0,0,0,12,1,$ny_events_cur_y) : mktime(0,0,0,1,1,$ny_events_cur_y),
		'sertend' => $ny_events_cur_m == 12 ? mktime(23,59,59,12,31,$ny_events_cur_y) : mktime(23,59,59,1,30,$ny_events_cur_y),

		/*
			[2:06:53] �������: �� 55600008
			�� 55600047
			[2:07:14] �������: �� ������� ���� ������. ������� 1 �������. ������ - ������ �������
			��� ������� ���� ��������
		*/


		/*
			����� � 10 ������� �� 31 ������� // ��������� ���������
		*/		
		'larcistart' => mktime(0,0,0,12,10,$ny_events_cur_y-2),
		'larciend' => mktime(23,59,59,12,31,$ny_events_cur_y-2),
	

		/* ���� �� �� � 15 ������� �� 30 ������ 23:59  */
		'elkacpstart' => $ny_events_cur_m == 12 ? mktime(0,0,0,12,15,$ny_events_cur_y) : mktime(0,0,0,1,1,$ny_events_cur_y),
		'elkacpend' => $ny_events_cur_m == 12 ? mktime(23,59,59,12,31,$ny_events_cur_y) : mktime(23,59,59,2,29,$ny_events_cur_y),


		/* ������� �� ���� ����� ����� � 20 ������� � 1:30 ���� �� 29 ������ 23:59  */
		'elkacpgiftstart' => $ny_events_cur_m == 12 ? mktime(1,30,0,12,20,$ny_events_cur_y) : mktime(0,0,0,1,1,$ny_events_cur_y),
		'elkacpgiftend' => $ny_events_cur_m == 12 ? mktime(23,59,59,12,31,$ny_events_cur_y) : mktime(23,59,59,1,29,$ny_events_cur_y),

		/* ��� �� ���� ����� ����� � 29 ������� �� 2 ������ 23:59  */
		'elkacpeatstart' => $ny_events_cur_m == 12 ? mktime(0,0,0,12,29,$ny_events_cur_y) : mktime(0,0,0,1,1,$ny_events_cur_y),
		'elkacpeatend' => $ny_events_cur_m == 12 ? mktime(23,59,59,1,2,$ny_events_cur_y+1) : mktime(23,59,59,1,2,$ny_events_cur_y),

		/* ����� �� ���� ����� ����� � 20 ������� c 1:30 �� 10 ������ 23:59  */
		'elkacpcarnavalstart' => $ny_events_cur_m == 12 ? mktime(1,30,0,12,20,$ny_events_cur_y) : mktime(0,0,0,1,1,$ny_events_cur_y),
		'elkacpcarnavalend' => $ny_events_cur_m == 12 ? mktime(23,59,59,12,31,$ny_events_cur_y) : mktime(23,59,59,1,10,$ny_events_cur_y),

		/* ������� ���� � ��������� */
		'elkadropstart' => $ny_events_cur_m == 12 ? mktime(0,0,0,12,1,$ny_events_cur_y) : mktime(0,0,0,1,1,$ny_events_cur_y),
		'elkadropend' => $ny_events_cur_m == 12 ? mktime(23,59,59,2,28,$ny_events_cur_y+1) : mktime(23,59,59,2,28,$ny_events_cur_y),

		/* 10% ����� �� ��������� � 29 ������� �� 2 ������ 23:59  */
		'ngloseexpstart' => $ny_events_cur_m == 12 ? mktime(0,0,0,12,29,$ny_events_cur_y) : mktime(0,0,0,1,1,$ny_events_cur_y),
		'ngloseexpend' => $ny_events_cur_m == 12 ? mktime(23,59,59,12,31,$ny_events_cur_y) : mktime(23,59,59,1,2,$ny_events_cur_y),

		/* 10% ����� �� ��������� � 00:00 14 �� �� 23:59 15 ������  */
		'hbloseexpstart' => mktime(0,0,0,1,14,$ny_events_cur_y),
		'hbloseexpend' => mktime(23,59,59,1,15,$ny_events_cur_y),

		/* ������ */
		'skupkastart' => mktime(0,0,0,12,29,$ny_events_cur_y),
		'skupkaend' => mktime(23,59,59,12,30,$ny_events_cur_y),

		/* �������� ����� ����� */
		'nghaosstart' => $ny_events_cur_m == 12 ? mktime(0,0,0,12,29,$ny_events_cur_y) : mktime(0,0,0,1,1,$ny_events_cur_y),
		'nghaosend' => $ny_events_cur_m == 12 ? mktime(23,59,59,12,31,$ny_events_cur_y) : mktime(23,59,59,1,2,$ny_events_cur_y),

		/* ����� �� ��������� � 00:00 14 �� �� 23:59 15 ������ */
		'hbhaosstart' => mktime(0,0,0,1,14,$ny_events_cur_y),
		'hbhaosend' => mktime(23,59,59,1,15,$ny_events_cur_y),
	);
?>