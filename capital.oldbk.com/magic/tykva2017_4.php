 <?php

if (!($_SESSION['uid'] >0)) {
	header("Location: index.php");
	die();
}

/*2017104 ����������� ����� tykva2017_3.gif
����: 100 �����, 5���, 1000��
��� ����� �������� �� �����, ������� ������� �� ����������� �����, ���� �������� 180 ����, ������ ����� � ���
*/
$TKV_GODEN=180;

$l1 = array(
56666 => 0, //������� ��������� IV, ���� 3% (+ ��������, ����� ������������� �������� ��������, �������� ������ ��� ���)
55559 =>0, //����������� ������ ������� �� �����, ���� 9%
4202 => 0, //������� ������ ����������� ������, ���� 7%
319 => 0, //����������� ������ ��������������� 90 �����, ���� 8%
321 => 0, //����������� ������ ��������������� 360 �����, ���� 9%
119119120 => 0, //����������� ������ �������������, ���� 8%
200279 => 0, //����������� ������ ��������������� 180HP�, ���� 9%
200277 => 0, //������� ������ ��������������� 720HP�, ���� 9%
100431 => 0, //������� ������ ���� ������, ���� 6%
190191 => 0, //������� ������ 8, ���� 1% ( ��������, ����� ������������� �������� ��������, �������� ������ ��� ���)
200023 => 0, //����������� ������ ������ ������, ���� 6%
1002225 => 0, //������� �������, ���� 6%
3004052 => 0, //�������� ����, ���� 10%
);

$l2 = array(
19108 => 0, //������� ������ ������� ����, ���� 10%
100199 => 0, //������� ������ ������ ����� ������, ���� 8%
320 => 0, //����������� ������ ��������������� 180 �����, ���� 10%
120120121 => 0, //����������� ������ ��������������, ���� 10%
200278 => 0, //����������� ������ ��������������� 360HP�, ���� 10%
55554 => 0, //����������� ������ ������� �� �����, ���� 8%
3001001 => 0, //���� ����������, ���� 8%
1122 => 0, //������� ������ ���������� ��������, ���� 3% (+ ��������, ����� ������������� �������� ��������, �������� ������ ��� ���)
190192 => 0, //������� ������ 9, ���� 1% ( ��������, ����� ������������� �������� ��������, �������� ������ ��� ���)
200441 => 0, //������� ������ ������� �������������, ���� 4%
100421 => 0, //������� ������ ��������� ����, ���� 4%
//4016 => 0, //������� � �����, ���� 1%
1002226 => 0, //����������� �������, ���� 7%
1654 => 0, //����������� ������ ����������, ���� 6%
3004053 => 0, //�������� ������, ���� 10%
);

$l3 = array(
	4016 => 0
); //������� � �����


$addmag[1]=150156;   //����������� ������ ����� �����, ���� ��������� � �������� ������� �����, ���� 9%
$addmag[2]=920926;   //����������� ������ ������ �������, ���� ��������� � �������� ������� �����, ���� 9%
$addmag[3]=130136;  //����������� ������ ���� �������, ���� ��������� � �������� ������� �����, ���� 9%
$addmag[4]=930936;  //����������� ������ ����� ������, ���� ��������� � �������� ������� �����, ���� 9%

$need_astih=get_mag_stih($user); // �������� �� ������
$need_astih=$need_astih[0]; //�� 0� ����� ������ ������
$need_astih=$addmag[$need_astih]; //������ ������
//������� ��� ������ ������

$l1[$need_astih]=0;  //�� ����



//����� ������ ��� ������ 1
$rnd1=array(
56666 => 3,
55559 =>9,
4202 => 7,
319 => 8,
321 => 9,
119119120 => 8,
200279 => 9,
200277 => 9,
100431 => 6,
190191 => 1,
200023 => 6,
1002225 => 6,
3004052 => 10
);


//����� ������ ��� ������ 2
$rnd2=array(
19108 => 10,
100199 =>8,
320 => 10,
120120121 => 10,
200278 => 10,
55554 => 8,
3001001 => 8,
1122 => 3,
190192 => 1,
200441 => 4,
100421 => 4,
//4016 => 1,
1002226 => 7,
1654 => 6,
3004053 => 10
);
//������� ��� ������ ������
$rnd1[$need_astih]=9;

//����� ������ ��� ������ 3
$rnd3=array(
	4016=>100
); //100%


include "tykva2017.php"

?>