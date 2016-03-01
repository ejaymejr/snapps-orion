<?php use_helper('Form', 'Javascript');
//    var_dump($comp);
//    exit(); 
    $teamList = HrEmployeePeer::GetTeamList($comp);
    echo select_tag('teams', 
         options_for_select($teamList, 
         $sf_params->get('teams') ), array('multiple' => true, 'size'=> 8, 100) );    
    ?>
    <span class='negative'>
    * press CTRL to select multiple group
    </span>

	