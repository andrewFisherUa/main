<?php
	// ����� ������� ������
	$q_status = array(
		0 => "����� ��������� ��� ��������",
		1 => "�������� � ��������� � ����������.",
		2 => "�������� � ��������� � ���������.",
		3 => "�������� � ��������� � ����.",
		4 => "�������� ���� ���� ���� (%N1%/1), ���� ������� (%N2%/3), ����� ������� (%N3%/1)",
		5 => "������� ��������� ��� �������� ������.",
	);
	
	if (!isset($questexist) || $questexist === FALSE || $questexist['q_id'] != 22) return;

	$step = $questexist['step'];

	$sf = basename(basename($_SERVER['PHP_SELF']),".php");
	
	$ai = explode("/",$questexist['addinfo']);

	if ($sf == "mlhorse") {
		$mlqfound = false;
		$todel = QItemExistsID($user,3003081);
		if ($todel !== FALSE) $mlqfound = true;

		if (isset($_GET['qaction'])) {
			if ($_GET['qaction'] == 1) {
				mysql_query('START TRANSACTION') or QuestDie();
				unsetQuest($user) or QuestDie();
				mysql_query('COMMIT') or QuestDie();
				unsetQA();		
			} elseif ($_GET['qaction'] == 2 && $mlqfound) {
				$mldiag = array(
					0 => "� ���� �� ���� ��� ���� �������������� ������ ������� ����������� ����������. ������� ����, �������� �������!",
					3 => "����.",
				);
			} elseif ($_GET['qaction'] == 3 && $mlqfound) {
				// �������� �������
				mysql_query('START TRANSACTION') or QuestDie();

				$r = AddQuestRep($user,250) or QuestDie();
				$m = AddQuestM($user,2,"�����") or QuestDie();
				$e = AddQuestExp($user) or QuestDie();

				PutQItem($user,15562,"�����",0,$todel,255,"eshop") or QuestDie();
				PutQItem($user,105,"�����") or QuestDie();

				$msg = "<font color=red>��������!</font> �� �������� <b>������� ������ �����������</b> � <b>������ �������</b>, <b>".$r."</b> ���������, <b>".$e."</b> ����� � <b>".$m."</b> ��. �� ���������� ������!";
				addchp ($msg,'{[]}'.$user['login'].'{[]}',-1,$user['id_city']) or QuestDie();

				UnsetQuest($user) or QuestDie();
				UnsetQA();
				mysql_query('COMMIT') or QuestDie();
			} else {
				unsetQA();
			}
		} else {
			$mldiag = array(
				0 => "������, �� ������ ��� ��, ��� � ������?",
				1 => "���, � ���� ���������� �� ������� (� ����, ��� ����� ����� ��������� ������ ����� 20 �����)",
				2 => "��, ������, ��� ��������� �������, ��� � �����. ��� �����, ��� ����� ������ ������.",
				30000 => "������� � �������",
				11111 => "���, � ������ �������� ����.",
			);
			if (!$mlqfound) unset($mldiag[2]);
		}
	}

	if ($sf == "mlvillage") {
		if ($step == 0 && ((isset($_GET['quest']) && $_GET['quest'] == 2) || (isset($_GET['qaction']) && $_GET['qaction'] > 1000 && $_GET['qaction'] < 2000))) {
			if (isset($_GET['qaction'])) {
				if ($_GET['qaction'] == 1001) {
					$mldiag = array(
						0 => "��, ��� ��� ������� � ���� ������������� ����, �� �����, ����� �������� ��������, ����� ����� � �������� � ��� ������ �� ��������. ������ � �������� ���� ������ �������� � ���������, �������� � ���� � ��.",
						1003 => "��� � ������. ����!",
					);
				} elseif ($_GET['qaction'] == 1003) {
					mysql_query('START TRANSACTION') or QuestDie();				
					SetQuestStep($user,22,1) or QuestDie();				
					mysql_query('COMMIT') or QuestDie();			
					unsetQA();
				} else {
					unsetQA();
				}
			} else {
				$mldiag = array(
					0 => "����������� ����, ������, � ����� �������� �������. ������ �� �� ������� ������� � ��������� � ��������� ������ ��� ���������� �� ���� � ����� ������ ���������?",
					1001 => "�� ������ � �� ������, ������ ����. ����� ����� ��� � ����� ��� � ������. ��� ������� ������ ������ ������, � �� ������ � ��� ���� �������� �������. �������� �� ����� �� ���� � ���, ��� �� � ������ ������� �������� ���������� ��������?",
					11111 => "������ ���� ��������",
				);
			}
		}
		if ($step == 4 && ((isset($_GET['quest']) && $_GET['quest'] == 2) || (isset($_GET['qaction']) && $_GET['qaction'] > 1000 && $_GET['qaction'] < 2000))) {
			// ����� ������
			if (isset($_GET['qaction'])) {
				if ($_GET['qaction'] == 1001) {
					$mldiag = array(
						0 => "��, ��������� ������������! ��������� �������! �� ��, �������, �� ������� ��������� �� ����, ������� �� � ���� ��� �� �������� ���, ������ ��� � �������� ������� � ������ �� ����������� ��� ��� ���� �������, ����� ������ ���� �� �����.",
						1003 => "�� �����!",
					);
				} elseif ($_GET['qaction'] == 1003) {
					mysql_query('START TRANSACTION') or QuestDie();				
					SetQuestStep($user,22,5) or QuestDie();				

					// �������� �����
					PutQItem($user,667667,"���������") or QuestDie();

					$msg = "<font color=red>��������!</font> �� �������� <b>����� ������� ����</b> �� ����� ������!";
					addchp ($msg,'{[]}'.$user['login'].'{[]}',-1,$user['id_city']) or QuestDie();


					mysql_query('COMMIT') or QuestDie();			
					unsetQA();
				} else {
					unsetQA();
				}
			} else {
				$mldiag = array(
					0 => "����������� ����, ������, � ����� �������� �������. ������ �� �� ������� ������� � ��������� � ��������� ������ ��� ���������� �� ���� � ����� ������ ���������?",
					1001 => "�� ������ ���������� � ����� ������ ��������� � � �� ������, �� ��� ��� ������ ���� ��������, ��� �� ����-�����, ����� ���� ���� � ��� ����� �� ����, ������ ����, ��� �� � ��� �� ��������, �� �� ��� ��������� ��, ����� ��������, �� ��� ���������� ���� �����.",
					11111 => "������� � ������ �������",
				);
			}
		}
	}

	if ($sf == "mlfort" && $step == 1) {
		if (isset($_GET['qaction'])) {
			if ($_GET['qaction'] == 1) {
				$mldiag = array(
					0 => "������� ���, �������, ����, �� � ������ �������� � �� �����, ������ ������ ���� �� �����, �� �� �� ��������, ��������� � ���� ��� ������������� ���������. ����� ���� ��� ������ ������� ��� ����  ������ �����? ���� ������ �� ���� �������� ������ ���������� �� ������, ��-�� ��� ���������� ������ ������� �����������",
					3 => "������� �� �����, ��� � ������. ����!",
				);
			} elseif ($_GET['qaction'] == 3) {
				mysql_query('START TRANSACTION') or QuestDie();				
				SetQuestStep($user,22,2) or QuestDie();				
				mysql_query('COMMIT') or QuestDie();			
				unsetQA();
			} else {
				unsetQA();
			}
		} else {
			$mldiag = array(
				0 => "������� ������, �� ������������. ��� ���������� �����, � �� �������. ��� ��� �������� � �� ����. �� ��� ����� ��� �����? �������, ������!",
				1 => "����� ���� ���� �� ��������, ���� ������ ��� ���� �����-������ ��������� � ����� � ��� ��������� ��� ������� �������. ��������� ������ ��� �� ��������� ��� ���� ����������� ����� � ��� ���� ���-������, ����� ��� ������� ���������� ���� �������!",
				11111 => "�������, �������! ������� ��������",
			);
		}
	}

	if ($sf == "mlmage") {
		if ($step == 2) {
			if (isset($_GET['qaction'])) {
				if ($_GET['qaction'] == 1) {
					$mldiag = array(
						0 => "��! ���������! ������� �� ���� ��� �� �� ����� ������, � � ������. ��-�� ������ ���� ��� ��� ������� �� �����",
						3 => "������ ������ ���� �� �����. ���� ��� � ������ ������ � � ������ ������� ���� ��� �������� ������������� ������������� ������ ���� ����. ���� ������� �� �� ������� ���������� ���������.",
					);
				} elseif ($_GET['qaction'] == 3) {
					$mldiag = array(
						0 => "���? ������?! �?! �� ����� ���������� �����-�� ��� ���������?!  �-�� ������ � ������� ��� ���-�� ��������. ��� ��������� �����, ���� ���� � ����� �������� � �� ������� ���. � ��������, ���� �� ����, ���� ��� ����� ���� � ���������. ���-��!",
						4 => "������, ������� ���� ��� �����������. ����!",
					);
				} elseif ($_GET['qaction'] == 4) {
					mysql_query('START TRANSACTION') or QuestDie();				
					SetQuestStep($user,22,3) or QuestDie();				
					mysql_query('COMMIT') or QuestDie();			
					unsetQA();
				} else {
					unsetQA();
				}
			} else {
				$mldiag = array(
					0 => "�� ����� ���� ����� ���������. ����� ������ � �� ������ ����? ������.",
					1 => "� ������ ������� ������, ��������� ��������� ������� � �� �������� ����� ����, �� ��� ������ ������ ��� ����� �� ����. �� ��� ��������� �������.",
					33333 => "�������, �� ������ ������� ���������� ����� �� ��������� �������. ���� ��������� ���� � ����� ������.",
					44444 => "� ������ ����� �����, ��� �� ������ ������� ���������� ���� �������. ���� ��� ������, �� ��� �� �� �������� ���������.",
					11111 => "������ ������",
				);
			}		
		}
	
		if ($step == 3) {
			$mlqfound = false;
			$qi1 = QItemExistsID($user,3003003);
			$qi2 = QItemExistsID($user,3003080);
			$qi3 = QItemExistsCountID($user,3003079,3);
	
			if ($qi1 !== FALSE && $qi2 !== FALSE && $qi3 !== FALSE) {
				$mlqfound = true;
				$todel = array_merge($qi1,$qi2,$qi3);
			}

			if (isset($_GET['qaction'])) {
				if ($_GET['qaction'] == 1 && $mlqfound) {
					$mldiag = array(
						0 => "�������, ������� �, ����� ��� ����������! ������ �����������. ������, �������. ���, ��� ��� ��� ��, ����� ������� ��� �����.  ��� ����� ���",
						3 => "������ �� �����-�� ������...",
					);
				} elseif ($_GET['qaction'] == 3 && $mlqfound) {
					$mldiag = array(
						0 => "������-�� ��� ��� �����������-�������� ������-������. � ��� ������ �����, ��� ���� �������. � ���� ��� ����� ������������� ������� � �� ������ ���������� ����������, ��� ��� ������ ���� ����!",
						4 => "������������� �������� ����!",
					);
				} elseif ($_GET['qaction'] == 4 && $mlqfound) {
					mysql_query('START TRANSACTION') or QuestDie();				
					PutQItem($user,3003081,"���",0,$todel) or QuestDie();
					addchp ('<font color=red>��������!</font> ��� ������� ��� <b>��������� ��� ��������</b>','{[]}'.$user['login'].'{[]}',-1,$user['id_city']) or QuestDie();

					SetQuestStep($user,22,4) or QuestDie();				
					mysql_query('COMMIT') or QuestDie();			
					unsetQA();
				} else {
					unsetQA();
				}
			} else {
				$mldiag = array(
					0 => "������, �� ������ ��� ��, ��� � ������?",
					1 => "��, ��� ����, �������� ����� � �����",
					33333 => "�������, �� ������ ������� ���������� ����� �� ��������� �������. ���� ��������� ���� � ����� ������.",
					44444 => "� ������ ����� �����, ��� �� ������ ������� ���������� ���� �������. ���� ��� ������, �� ��� �� �� �������� ���������.",
					11111 => "��� ���, ������� �����.",
				);
				if (!$mlqfound) unset($mldiag[1]);
			}				
		}
	} 
?>