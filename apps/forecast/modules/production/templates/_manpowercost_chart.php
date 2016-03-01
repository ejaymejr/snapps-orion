	
		<script type="text/javascript">
            var chart;

            AmCharts.ready(function () {
                // SERIAL CHART
                chart = new AmCharts.AmSerialChart();
                chart.dataProvider = <?php echo $salaryChartJson ?>;
                chart.categoryField = "date";
                chart.plotAreaBorderAlpha = 0.2;
                chart.addTitle("<?php echo $title ?>", 14);

                // AXES
                // category
                chart.handDrawn = true;
                chart.handDrawnScatter = 3;
                chart.startDuration = 1;
                
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
                // first graph
                <?php foreach($teamSalaryColor as $team => $color): ?>
                var graph = new AmCharts.AmGraph();
                graph.title = "<?php echo $team ?> ";
                graph.labelText = "[[value]]";
                graph.valueField = "<?php echo $team ?>";
                graph.type = "column";
                graph.lineAlpha = 0;
                graph.fillAlphas = 1;
                graph.lineColor = "<?php echo $color ?>";
                graph.balloonText = "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>";
                chart.addGraph(graph);
				<?php endforeach; ?>
				
                // second graph
//                 graph = new AmCharts.AmGraph();
//                 graph.title = "North America";
//                 graph.labelText = "[[value]]";
//                 graph.valueField = "namerica";
//                 graph.type = "column";
//                 graph.lineAlpha = 0;
//                 graph.fillAlphas = 1;
//                 graph.lineColor = "#D8E0BD";
//                 graph.balloonText = "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>";
//                 chart.addGraph(graph);

                

                // LEGEND
                var legend = new AmCharts.AmLegend();
                legend.useGraphSettings = true;
                chartmanhour.addLegend(legend);

                // WRITE
                chart.write("manpower_cost_chart");
            });

            
        </script>
        
        <div id="manpower_cost_chart" style="height: 400px;"></div>