 <?php use_helper('Form', 'Javascript', 'PagerNavigation'); ?>


 <?php
// $sdt = HrLib::GetStartDate($pcode);
// $edt = HrLib::GetEndDate($pcode);
 $pos = 0;
 $oldno = null;
 $gtot  = 0;
 
 //working
 foreach($empNoList as $ke=>$empNo)
 {
     switch($mess)
     {
         case 'BANK':
             $data      = PayEmployeeLedgerArchivePeer::GetEmployeeDataforBank($pcode, $empNo);
             break;
         case 'CASH':
             $data      = PayEmployeeLedgerArchivePeer::GetEmployeeDataforCash($pcode, $empNo);
             break;
         case 'CHEQUE':
             $data      = PayEmployeeLedgerArchivePeer::GetEmployeeDataforCheque($pcode, $empNo);
             break;
         default:
             $data      = PayEmployeeLedgerArchivePeer::GetEmployeeDataforCashandBank($pcode, $empNo);
             break;
     }
	 if (! $data)
	 {
	 	return sfView::SUCCESS;
	 }
     $empInfo = HrEmployeePeer::GetDatabyEmployeeNo($empNo);
     $summ    = TkDtrsummaryPeer::GetSummaryPerEmployeeDate($empNo, $sdt, $edt );
     $bp      = PayBasicPayPeer::GetDatabyEmployeeNo($empNo);
     $dtr     = TkDtrsummaryPeer::GetActualDatabyEmployeeNoDateRange($empNo, $sdt, $edt);
     $ot1    = 0;
     $ot2    = 0;
     $ot3    = 0;
     $ot1amt = 0;
     $ot2amt = 0;
     $ot3amt = 0;
     $ot1rat = 0;
     $ot2rat = 0;
     $ot3rat = 0;

     $cpf    = 0;
     $cdac   = 0;
     $sinda  = 0;
     $cbs    = 0;
     $dinner = 0;
     $mall   = 0;
     $basic  = 0;
     $levy   = 0;
     $tardy  = 0;
     $loan   = 0;
     $ap     = 0;
     $ot     = array();
     $otCode = 0;


     $tot  = 0;
     $etot = 0;
     $inc  = 0;
     $ded  = 0;
     $iother = 0;
     $dother = 0;

     $tothours = 0;
     $mcLeave  = 0;
     $pdLeave  = 0;
     $updLeave = 0;
     $subtot   = 0;

     foreach ($data as $rec)
     {
         switch($rec->getAcctCode())
         {
             case 'CPF':
                 $cpf = $cpf + $rec->getAmount();
                 break;
             case 'CDAC':
                 $cdac = $cdac + $rec->getAmount();
                 break;
             case 'SINDA':
                 $sinda = $sinda + $rec->getAmount();
                 break;
             case 'CBS':
                 $cbs = $cbs + $rec->getAmount();
                 break;
             case 'MR':
                 $dinner = $dinner + $rec->getAmount();
                 break;
             case 'MEAL':
                 $dinner = $dinner + $rec->getAmount();
                 break;
             case 'ML':
                 $mall = $mall + $rec->getAmount();
                 break;
             case 'BP':
                 $basic = $basic + $rec->getAmount();
                 break;
             case 'PI':
                 $basic = $basic + $rec->getAmount();
                 break;
             case 'LV':
                 $levy = $levy + $rec->getAmount();
                 break;
             case 'UL':
                 $tardy = $tardy + $rec->getAmount();
                 break;
             case 'TD':
                 $tardy = $tardy + $rec->getAmount();
                 break;
             case 'LN':
                 $loan = $loan + $rec->getAmount();
                 break;
             case 'AP':
                 $ap = $ap + $rec->getAmount();
                 break;
         }
         if ( $rec->getIncomeExpense() == '1' )
         {
             //$pdf->printLn(    $x+135, $xpos++   + $y - 7, money_format('%= #5.2n', $rec->getAmount()), 'Arial', '10');
             $inc = $inc + $rec->getAmount();
         }else{
             //$pdf->printLn(    $x+165, $xpos++   + $y - 7, money_format('%= #5.2n', $rec->getAmount()), 'Arial', '10');
             $ded = $ded + $rec->getAmount();
         }
         $tot = $tot + $rec->getAmount();

         if ($rec->getAcctCode() == 'OT')
         {
             $etot = 1;
             $bpos   = 0;
             $bpos   =  strpos($rec->getDescription(), '(');
             $otCode = substr($rec->getDescription(), $bpos+1, 17);
         }
     }

     //----------------------------- show overtime
     if ($etot == '1')
     {
         $hrLib = new HrLib();
         $ot     = TkDtrsummaryPeer::GetSummaryPerEmployeeDate($empNo, $hrLib->GetStartDate($otCode), $hrLib->GetEndDate($otCode) );
         $ot1 = $ot['ot1'];
         $ot2 = $ot['ot2'];
         $ot3 = $ot['ot3'];
         $ot1amt = $ot['ot1amt'];
         $ot2amt = $ot['ot2amt'];
         $ot3amt = $ot['ot3amt'];
         $ot1rat = $ot['ot1rat'];
         $ot2rat = $ot['ot2rat'];
         $ot3rat = $ot['ot3rat'];
     }

     $tothours = $summ['tothours'];
     
     $mcLeave  = $summ['mcleave'];
     $pdLeave  = $summ['paidleave'];
     $updLeave = $summ['unpaidleave'];
     
//     $mcLeave  = HrEmployeeLeavePeer::GetCountLeaves($empNo, '1', sfConfig::get('fiscal_year'));
//     $pdLeave  = HrEmployeeLeavePeer::GetCountPaidLeaves($empNo, sfConfig::get('fiscal_year'));
//     $updLeave = HrEmployeeLeavePeer::GetCountLeaves($empNo, '6', sfConfig::get('fiscal_year'));
     
     $levy     = $summ['levy'];
     $isubtot  = $basic + $ot1amt + $ot2amt + $ot3amt + $dinner + $mall + $cbs;
     $dsubtot  = $tardy + $cpf + $sinda + $cdac + $levy + $loan + $ap;
     $iother   = $inc - $isubtot;
     $dother   = $ded - $dsubtot;


     $x = 12;
     $y = 1;
     $xpos = 1;
     setlocale(LC_MONETARY, 'en_US');
     echo "
            <table width='100%' border='0'>
              <tr>
                <td>
                  <div align='center'>
                    <table width='80%' border='0' cellpadding='4' cellspacing='0' >
                      <tr>
                        
                        <td colspan='6' class='tk-style19' align='Center'>PAYSLIP for ".DateUtils::DUFormat('F j - ', $sdt).DateUtils::DUFormat('j,', $edt).DateUtils::DUFormat(' Y', $sdt).' ('.$mess.')'."</td>
                        
                      </tr>
                      <tr>
                        <td width='25%' class='tk-style20'>NRIC No: ".$empNo."</td>
                        <td colspan='4' class='tk-style20'>NAME: ".$empInfo->getName()."</td>
                        <td width='25%' class='tk-style20'>COMPANY: TC KHOO (".substr(HrCompanyPeer::GetNamebyId($empInfo->getHrCompanyId()) , 0, 1) .")</td>
                      </tr>
                   </table>
                  </div>
                <div align='left'></div></td>
              </tr>
            </table>
            ";
     echo "
            <table width='100%' border='0'>
              <tr>
                <td>
                  <div align='center'>
                    <table width='80%' border='0' cellpadding='4' cellspacing='0'>
                        <tr>
                        <td width='16%' class='tk-style22'>&nbsp;</td>
                        <td width='16%' class='tk-style22'>BASIC</td>
                        <td width='16%' class='tk-style22' align='right'>".money_format('%-#5n',$basic)."</td>
                        <td width='4%' class='tk-style22'>&nbsp;</td>
                        <td width='16%' class='tk-style22'>HOURLY</td>
                        <td width='16%' class='tk-style22' align='right'>". 0
//     											if ($bp):  
//     												money_format('%-#5n',$bp->getHourlyRate());
//     											endif; 
     											."</td>
                        <td width='16%' class='tk-style22'>&nbsp;</td>
                        </tr>

                        <tr>
                        <td width='18%' class='tk-style22'>&nbsp;</td>
                        <td width='16%' class='tk-style22'>NORMAL HOURS</td>
                        <td width='16%' class='tk-style22' align='right'>".$tothours."</td>
                        <td width='4%' class='tk-style22'>&nbsp;</td>
                        <td width='16%' class='tk-style22'>ABSENCES/TARDY</td>
                        <td width='16%' class='tk-style22' align='right'>".money_format('%-#5n',$tardy)."</td>
                        <td width='18%' class='tk-style22'>&nbsp;</td>
                        </tr>
                        
                        <tr>
                        <td width='18%' class='tk-style22'>&nbsp;</td>
                        <td width='16%' class='tk-style22'>OT <1.5> ".$ot1." HRS</td>
                        <td width='16%' class='tk-style22' align='right'>".'$'.$ot1rat .' = '. money_format('%-#5n',$ot1amt)."</td>
                        <td width='4%' class='tk-style22'>&nbsp;</td>
                        <td width='16%' class='tk-style22'>CPF</td>
                        <td width='16%' class='tk-style22' align='right'>".money_format('%-#5n',$cpf)."</td>
                        <td width='18%' class='tk-style22'>&nbsp;</td>
                        </tr>

                        <tr>
                        <td width='18%' class='tk-style22'>&nbsp;</td>
                        <td width='16%' class='tk-style22'>OT <2.0> ".$ot2." HRS</td>
                        <td width='16%' class='tk-style22' align='right'>".'$'.$ot2rat .' = '. money_format('%-#5n',$ot2amt)."</td>
                        <td width='4%' class='tk-style22'>&nbsp;</td>
                        <td width='16%' class='tk-style22'>SINDA</td>
                        <td width='16%' class='tk-style22' align='right'>".money_format('%-#5n',$sinda)."</td>
                        <td width='18%' class='tk-style22'>&nbsp;</td>
                        </tr>
                        
                        <tr>
                        <td width='18%' class='tk-style22'>&nbsp;</td>
                        <td width='16%' class='tk-style22'>OT <2.5> ".$ot3." HRS</td>
                        <td width='16%' class='tk-style22' align='right'>".'$'.$ot3rat .' = '. money_format('%-#5n',$ot3amt)."</td>
                        <td width='4%' class='tk-style22'>&nbsp;</td>
                        <td width='16%' class='tk-style22'>CDAC</td>
                        <td width='16%' class='tk-style22' align='right'>".money_format('%-#5n',$cdac)."</td>
                        <td width='18%' class='tk-style22'>&nbsp;</td>
                        </tr>
                        
                        <tr>
                        <td width='18%' class='tk-style22'>&nbsp;</td>
                        <td width='16%' class='tk-style22'>ALLOWANCES</td>
                        <td width='16%' class='tk-style22' align='right'>".money_format('%-#5n', $mall)."</td>
                        <td width='4%' class='tk-style22'>&nbsp;</td>
                        <td width='16%' class='tk-style22'>UNPAID LEVY</td>
                        <td width='16%' class='tk-style22' align='right'>".money_format('%-#5n', $levy)."</td>
                        <td width='18%' class='tk-style22'>&nbsp;</td>
                        </tr>

                        <tr>
                        <td width='18%' class='tk-style22'>&nbsp;</td>
                        <td width='16%' class='tk-style22'>BANK</td>
                        <td width='16%' class='tk-style22' align='right'>".money_format('%-#5n',$cbs)."</td>
                        <td width='4%' class='tk-style22'>&nbsp;</td>
                        <td width='16%' class='tk-style22'>LOAN</td>
                        <td width='16%' class='tk-style22' align='right'>".money_format('%-#5n',$loan)."</td>
                        <td width='18%' class='tk-style22'>&nbsp;</td>
                        </tr>
                        
                        <tr>
                        <td width='18%' class='tk-style22'>&nbsp;</td>
                        <td width='16%' class='tk-style22'>DINNER</td>
                        <td width='16%' class='tk-style22' align='right'>".money_format('%-#5n',$dinner)."</td>
                        <td width='4%' class='tk-style22'>&nbsp;</td>
                        <td width='16%' class='tk-style22'>ADVANCE PAY</td>
                        <td width='16%' class='tk-style22' align='right'>".money_format('%-#5n',$ap)."</td>
                        <td width='18%' class='tk-style22'>&nbsp;</td>
                        </tr>

                        <tr>
                        <td width='18%' class='tk-style22'>&nbsp;</td>
                        <td width='16%' class='tk-style22' align='right'>SUB-TOTAL</td>
                        <td width='16%' class='tk-style22' align='right'>".money_format('%-#5n',$isubtot)."</td>
                        <td width='4%' class='tk-style22'>&nbsp;</td>
                        <td width='16%' class='tk-style22' align='right'>SUB-TOTAL</td>
                        <td width='16%' class='tk-style22' align='right'>".money_format('%-#5n',$dsubtot)."</td>
                        <td width='18%' class='tk-style22'>&nbsp;</td>
                        </tr>
                        
                        <tr>
                        <td width='18%' class='tk-style22'>&nbsp;</td>
                        <td width='16%' class='tk-style22'>PAID-LEAVE</td>
                        <td width='16%' class='tk-style22' align='right'>".$pdLeave. ' Day(s)     '."</td>
                        <td width='4%' class='tk-style22'>&nbsp;</td>
                        <td width='16%' class='tk-style22'>UNPAID LEAVES</td>
                        <td width='16%' class='tk-style22' align='right'>".$updLeave . ' Day(s)     '."</td>
                        <td width='18%' class='tk-style22'>&nbsp;</td>
                        </tr>
                        
                        <tr>
                        <td width='18%' class='tk-style22'>&nbsp;</td>
                        <td width='16%' class='tk-style22'>PAID-MC(S)</td>
                        <td width='16%' class='tk-style22' align='right'>".$mcLeave. ' Day(s)     ' ."</td>
                        <td width='4%' class='tk-style22'>&nbsp;</td>
                        <td width='16%' class='tk-style22'>UNPD ALLOWANCE</td>
                        <td width='16%' class='tk-style22' align='right'>0.00</td>
                        <td width='18%' class='tk-style22'>&nbsp;</td>
                        </tr>
                        
                        <tr>
                        <td width='18%' class='tk-style22'>&nbsp;</td>
                        <td width='16%' class='tk-style22'>OTHERS</td>
                        <td width='16%' class='tk-style22' align='right'>".money_format('%-#5n',$iother)."</td>
                        <td width='4%' class='tk-style22'>&nbsp;</td>
                        <td width='16%' class='tk-style22'>OTHERS</td>
                        <td width='16%' class='tk-style22' align='right'>".money_format('%-#5n',$dother)."</td>
                        <td width='18%' class='tk-style22'>&nbsp;</td>
                        </tr>
                        
                        <tr>
                        <td width='18%' class='tk-style22'>&nbsp;</td>
                        <td width='16%' class='tk-style22' align='right'>TOTAL</td>
                        <td width='16%' class='tk-style22' align='right'>".money_format('%-#5n',$inc)."</td>
                        <td width='4%' class='tk-style22'>&nbsp;</td>
                        <td width='16%' class='tk-style22' align='right'>TOTAL</td>
                        <td width='16%' class='tk-style22' align='right'>".money_format('%-#5n',$ded)."</td>
                        <td width='18%' class='tk-style22'>&nbsp;</td>
                        </tr>
                        
                        <tr>
                        <td width='18%' class='tk-style22' colspan='6' align='right'>TOTAL</td>
                        <td width='16%' class='tk-style22' align='right'>".money_format('%= #5.2n', $tot)."</td>
                        </tr>
                        
                        </table>
                  </div>
                <div align='left'></div></td>
              </tr>
            </table>
            ";
 }
?>
 <div class="grid-toolbar-2">                       
<?php 
	$showButton = HTMLForm::DrawButton('pushbutton1', 'button1', 'Print Payslip',    url_for('reports/printIndividualPayslip?employee_no='. $empNo . '&period_code=' . $pcode . '&bank_cash=' . $mess));
	echo $showButton ?>
</div>

<?php
 	$cal = new TkCalendar(sfConfig::get('fiscal_year'));
 	echo ($cal->DtrSummaryCalendar($sdt, $empNo, $dtr));
 
     ?>