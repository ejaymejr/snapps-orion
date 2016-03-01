<?php use_helper('SnappsGeneralForm', 'Validation', 'Javascript') ?>


<?php echo HTMLForm::Error('form'); ?>

<form name="FORMadd" id="IDFORMadd" action="<?php echo url_for($sf_request->getModuleAction()); ?>?id=<?php echo $sf_params->get('id') ?>" method="post">
<table width="100%" class="FORMtable" border="0" cellpadding="4" cellspacing="0">

<tr class="form-row">
    <td class="FORMcell-left" width="20%">Record Date</td>
    <td class="FORMcell-right" width="80%">
    
    <?php
    
    $url = url_for($sf_request->getModuleAction());
    $var = 'date_record';
    $val = $sf_params->get($var);
    ?>
    
    <script language="JavaScript">
    function calendarSelectDate(calendar, date) {
        
        var url = '<?php echo $url . '?' . $var . '='; ?>' + date;
        if (calendar.dateClicked) {
            showLoader();
            window.location = url;
            calendar.callCloseHandler(); // this calls "onClose" (see above)
        }
    };
    </script>
    
    <div id="DIVpageHeadingChDate">
    <input id="date_record" size="12" name="date_record" readonly="readonly" class="readonly"
        value="<?php echo $val; ?>" />
    <?php echo image_tag('icons/cal3.gif', 
            array('alt' => "Pick up date...",
            'id' => 'dateInput1',
            'style' => "cursor: pointer;",
            'title' => "Date selector",
            'class' => "inline-calendar-img")); ?>
    </div>
               
    <script type="text/javascript">
        Calendar.setup({
            inputField     :    "date_record",     // id of the input field
            ifFormat       :    "%Y-%m-%d",      // format of the input field
            button         :    "dateInput1",  // trigger for the calendar (button ID)
            singleClick    :    true,  
            weekNumbers    :    false,
            onSelect       :    calendarSelectDate
        });
    </script>
    <span class="negative">*</span>
    
    
    &nbsp;
    &nbsp;
    <?php
    
    $prevDate = DateUtils::AddDate($sf_params->get('date_record'), -1);
    $nextDate = DateUtils::AddDate($sf_params->get('date_record'), 1);
    
    $prevLink = link_to('&laquo; Previous Date', $sf_request->getModuleAction(), array('query_string' => 'date_record=' . $prevDate, 'onclick' => "showLoader();"));
    $nextLink = link_to('Next Date &raquo;', $sf_request->getModuleAction(), array('query_string' => 'date_record=' . $nextDate, 'onclick' => "showLoader();"));
    
    echo $prevLink . ' | ' . $nextLink;
    ?>
    </td>
</tr>
   

<tr class="form-row">
    <td class="FORMcell-left">Verified by</td>
    <td class="FORMcell-right" width="80%">
    <?php 
    echo HTMLForm::Error('verified_by');
    echo input_tag('verified_by', $sf_params->get('verified_by'), array('size' => '20')) ?>
    </td>
</tr>

<tr class="form-row">
    <td class="FORMcell-left">Supervised by</td>
    <td class="FORMcell-right" width="80%">
    <?php 
    echo HTMLForm::Error('supervised_by');
    echo input_tag('supervised_by', $sf_params->get('supervised_by'), array('size' => '20')) ?>
    </td>
</tr>

<tr class="form-row">
    <td colspan="2">
    <table border="0" cellspacing="20" cellpadding="2">
    <tr>
    <?php foreach ($setItemGroups as $groupName => $items) : ?>
    <td nowrap>
    <h2 align="center"><?php echo $groupName ?></h2>
    <table border="0" cellpadding="2" cellspacing="2">
    <?php foreach ($items as $ji) : ?>
    <?php
    $inputName = 'cb_' . $ji->getId();
    ?>
    <tr>
    <td class="FORMcell-left FORMlabel" nowrap><?php echo $ji->getItemName() ?></td>
    <td class="FORMcell-right" width="10">
    <?php echo checkbox_tag($inputName, 1, $sf_params->get($inputName, false) !== false, ' class="checkbox" '); ?>
    </td>
    </tr>
    <?php endforeach; ?>
    </table>
    
    </td>
    <?php endforeach; ?>
    </tr>
    </table>
    </td>
</tr>

<tr class="form-row">
    <td class="FORMcell-left">&nbsp;</td>
    <td class="FORMcell-right">

        <input type="submit" 
            name="FORMsubmit"
            value=" Submit "
            class="submit-button"
            ></td>
</tr>

</table>
</form>


<div class="alignRight isoRef">
MC Record Sheet #05A
<br />
Rev001
<br />
Date issued:01 Jul 1999
</div>