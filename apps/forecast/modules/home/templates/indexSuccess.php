<table width="100%" class="FORMtable" border="0" cellpadding="4" cellspacing="0">
<tr>
    <td class="FORMcell-left FORMlabel" width="100" nowrap>
    <div align="center" >


<table width="844" border="0" bordercolor="#CCFF00">
   <tr>
     <td width="154" rowspan="2"><div align="center">
         <?php echo link_to(image_tag('hr/payroll.gif'), 'hrforecast') ?>
     </div></td>
     <th width="169" rowspan="2"><div align="center">HR FORECAST</div></th>
     <td width="473" height="80" bgcolor="#D3DBE2"><div align="center" class="tk-style16">
     <?php
     echo link_to('Daily Forecast - Based on Monthly Expected Plus Overtime <br>Income then less deduction per day.','hrforecast/dailyForeCast');
     ?>
     </div></td>
     <td width="20">&nbsp;</td>
   </tr>
   <tr>
     <td height="80" bgcolor="#D8CFFE"><div align="center" class="tk-style16">
     
     <?php
     echo link_to('Monthly Trend - Shows the Monthly Pay Listing', 'hrforecast/monthlyTrend');
     ?> 
     </div></td>
     <td>&nbsp;</td>
   </tr>
   <tr>
     <td colspan="4" bgcolor="#FCFECD">&nbsp;</td>
   </tr>
   
   <tr>
     <td rowspan="3"><div align="center">
     <?php echo link_to(image_tag('hr/dtr.jpg'), 'production') ?>
     </div></td>
     <th rowspan="3"><div align="center">PRODUCTION EFFICIENCY </div></th>
     <td height="80" bgcolor="#D3DBE2"><div align="center" class="tk-style16">
     <?php
     echo link_to('Daily Matrix - Compute No of Articles wash, Man-hours and Direct Staff', 'production/dailyMatrix');
     ?> 
     
     
     </div></td>
     <td>&nbsp;</td>
   </tr>
   <tr>
     <td height="80" bgcolor="#D8CFFE"><div align="center" class="tk-style16">
     <?php
     echo link_to('Weekly Matrix - Comparison between Weekly Productivity per Article', 'production/weeklyMatrix');
     ?> 
      
     </div></td>
     <td>&nbsp;</td>
   </tr>   
   <tr>
     <td height="80" bgcolor="#D8CFFE"><div align="center" class="tk-style16">
     <?php
     echo link_to('Monthly Matrix - Comparison between Monthly Productivity per Article', 'production/monthlyMatrix');
     ?> 
      
     </div></td>
     <td>&nbsp;</td>
   </tr>
   <tr>
    <td height="80" ></td>
    <td height="80" ></td>
     <td height="80" bgcolor="#D3DBE2"><div align="center" class="tk-style16">
     <?php
     echo link_to('Unit Price', 'http://dev.micronclean/cityhall/sales/invoice/upstats');
     ?> 
     </div></td>
     <td>&nbsp;</td>
   </tr>
   <tr>
     <td colspan="4" bgcolor="#FCFECD">&nbsp;</td>
   </tr>
   <tr>
     <td rowspan="3"><div align="center">
      <?php echo link_to(image_tag('hr/deduction.gif'),'reports') ?>
      </div></td>
     <th rowspan="3" bgcolor="#FFFFFF"><div align="center">FINANCIAL REPORT </div></th>
     <td height="80" bgcolor="#D8CFFE"><div align="center" class="tk-style16">
     
     <?php
     echo link_to('Daily Sales vs Cost Breakdown', 'finance/dailyIncomeExpense');
     ?> 
      
     </div></td>
     <td>&nbsp;</td>
   </tr>
   <tr>
     <td height="80" bgcolor="#D3DBE2"> <div align="center" class="tk-style16">
     
     <?php
     echo link_to('Cost vs Sales Monthly Trend', 'finance/trendIncomeExpense');
     ?> 
      
     </div></td>
     <td>&nbsp;</td>
   </tr>
      <tr>
     <td height="80" bgcolor="#D3DBE2"> <div align="center" class="tk-style16">
     
     <?php
     echo link_to('Ballast Water Treatment', 'finance/ballastSearch');
     ?> 
      
     </div></td>
     <td>&nbsp;</td>
   </tr>
 </table>


    </div>
    </td>
</tr>
</table>