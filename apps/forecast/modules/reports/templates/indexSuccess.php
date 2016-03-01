<table width="100%" border="0" >
  <tr>
    <td height="500" align="center" valign="middle">
        <table width="80%" border="0" class="alignCenter">
          <tr>
            <td width="20%">
            <?php
            echo link_to (image_tag('account/businessReport.jpg'), 'reports/dailyIncomeExpense')
            ?>
            </td>
            <td width="20%">
            <?php
            echo link_to (image_tag('account/trendChart.jpg'), 'reports/trendIncomeExpense')
            ?>
            </td>
          </tr>
          <tr>
            <td height="27"><?php echo link_to ('Daily', 'reports/dailyIncomeExpense') ?></td>
            <td height="27"><?php echo link_to ('Trend', 'reports/trendIncomeExpense') ?></td>            
          </tr>
          
        </table>    
    </td>    
  </tr>
</table>