update `finance_summary` set classification = 'SALES' where component = 'SALES'

update `finance_summary` set classification = 'EXPENSE' where component = 'SUBCON'

update `finance_summary` set classification = 'COST OF GOODS' where component not in ('SALES', 'COST OF GOODS')

insert into hr_employee_daily (employee_no, name, company, basic, ot, meal, allowance, part_time, cpf_em, cpf_er, undertime, absent, trans_date)
SELECT employee_no, name, company, sum( if( acct_code = 'BP', amount, 0 ) ) AS basic, sum( if( acct_code = 'OT', amount, 0 ) ) AS overtime, sum( if( acct_code = 'MR', amount, 0 ) ) AS meal, sum( if( acct_code = 'ML', amount, 0 ) ) AS allowance, sum( if( acct_code = 'PI', amount, 0 ) ) AS parttime, -1 * sum( if( acct_code = 'CPF', amount, 0 ) ) AS cpf_em, -1 * sum( if( acct_code = 'CPF', cpf_er, 0 ) ) AS cpf_er, sum( if( acct_code = 'UT', amount, 0 ) ) AS tardy, sum( if( acct_code = 'UL', amount, 0 ) ) AS absent, '2009-03-01' AS trans_date
FROM pay_employee_ledger_archive
WHERE period_code = '20090101-20090131-ALL-MONTHLY'
GROUP BY employee_no
ORDER BY name


SELECT a.company, a.reference_date, b.account_no, b.category,
                SUM(ROUND(b.gst_amount, 2)) as total_gst,
                SUM(ROUND(b.price_with_gst_normalized, 2)) as total,
                NOW() as nnn
            FROM payable a JOIN payable_item b ON (a.id = b.payable_id)
            WHERE a.reference_date >= '2008-10-01'
            AND b.account_no not IN ('60400','60300','60200','610-020','60100','610-100','610-000','60500','80100','80202','80400','905-000','904-001','80502','80503','81400','81600','920-001','81401','81602','920-002','919-002','81501','81502','81503','81504','81505','81601','81603','81611','81612','81621','81622','81631','81632','81633','81634','81635','81641','81642','81651','81652','81661','81671','81672','81691','81692','81701','81702','81800','81801','81802','81803','81804','81805','81806','81811','81812','81821','81822','81823','81824','81831','81832','81833','81834','81835','81836','81861','81862','921-000','921-003','920-004','81623','921-004','921-005','921-006','81301','919-003','918-002')
            GROUP BY a.company, a.reference_date, b.account_no
            ORDER BY a.reference_date, b.account_no ASC, a.company ASC