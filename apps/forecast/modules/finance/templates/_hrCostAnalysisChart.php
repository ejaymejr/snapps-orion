
<?php 
	$divID = HrLib::randomID(); 
?>
       <script type="text/javascript">
            var chart;

            AmCharts.ready(function () {
                // SERIALL CHART
                chart = new AmCharts.AmSerialChart();
                chart.dataProvider = <?php echo $chartData ?>;
                chart.categoryField = "name";
                chart.plotAreaBorderAlpha = 0.2;
                chart.rotate = true;
                chart.addTitle("TOTAL INCOME ANALYSIS CHART", 14);

                // AXES
                // Category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.gridAlpha = 0.1;
                categoryAxis.axisAlpha = 0;
                categoryAxis.gridPosition = "start";

                // value
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.stackType = "regular";
                valueAxis.gridAlpha = 0.1;
                valueAxis.axisAlpha = 0;
                chart.addValueAxis(valueAxis);

                // GRAPHS
                // firstgraph
                <?php
                $colorList = HTMLLib::GetColorList();
                $pos = 0;
                foreach($acctList as $acctCode=>$acctName): 
                if ($acctCode <> 'TAKEHOMEPAY'):
                ?>
	                var graph = new AmCharts.AmGraph();
	                graph.title = "<?php echo $acctName ?>";
	                graph.labelText = "[[percents]]%"; //You can use tags like [[value]], [[description]], [[percents]], [[open]], [[category]]
	                graph.valueField = "<?php echo $acctCode ?>";
	                graph.type = "column";
	                graph.lineAlpha = 0;
	                graph.fillAlphas = 1;
	                graph.lineColor = "<?php echo $colorList[$pos] ?>";
	                graph.balloonText = "<b><span style='color:#C72C95'>[[title]]</b></span><br><span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>";
	                chart.addGraph(graph);
				<?php 
					$pos++; 
				endif;
				endforeach; ?>
				
                // GRAPH
                var graph2 = new AmCharts.AmGraph();
                graph2.type = "line";
                graph2.lineColor = "#27c5ff";
                graph2.bulletColor = "#FFFFFF";
                graph2.bulletBorderColor = "#27c5ff";
                graph2.bulletBorderThickness = 2;
                graph2.bulletBorderAlpha = 1;
                graph2.title = "Take Home Pay";
                graph2.valueField = "TAKEHOMEPAY";
                graph2.lineThickness = 2;
                graph2.bullet = "round";
                graph2.fillAlphas = 0;
                graph2.balloonText = "<span style='font-size:13px;'>[[title]] of [[category]]:<b>[[value]]</b></span>";
                chart.addGraph(graph2);

                // LEGEND
//                var legend = new AmCharts.AmLegend();
//                legend.position = "right";
//                legend.borderAlpha = 0.3;
//                legend.horizontalGap = 10;
//                legend.switchType = "v";
//                chart.addLegend(legend);
//
                chart.creditsPosition = "top-right";

                // WRITE
                chart.write("<?php echo $divID; ?>");
            });
            
        </script>
    </head>

<div id="<?php echo $divID; ?>" style="width: 1000px; height: <?php echo $height ?>px;"></div>
