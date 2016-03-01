<?php echo select_tag('teamList', options_for_select(
HrEmployeePeer::GetTeamList($company)), 'multiple=multiple size=15x30') ;
echo checkbox_tag('SELECT_ALL', '', '', 'onclick="selectAll()"') . ' - SELECT ALL';
?>