	
		<script type="text/javascript">
            var chartmanhour;
            
            var chartmanhourData = <?php echo $manhour ; ?>;

            AmCharts.ready(function () {
                // SERIAL CHART
                chartmanhour = new AmCharts.AmSerialChart();
                chartmanhour.dataProvider = chartmanhourData;
                chartmanhour.categoryField = "date";
                chartmanhour.plotAreaBorderAlpha = 0.2;
                chartmanhour.pathToImages = "../amcharts/images/";
                chartmanhour.startDuration = 1;
                chartmanhour.addTitle("<?php echo $title ?>", 14);

                // AXES
                chartmanhour.handDrawn = true;
                chartmanhour.handDrawnScatter = 3;
                
                // category
                var categoryAxis = chartmanhour.categoryAxis;
                categoryAxis.gridAlpha = 0.1;
                categoryAxis.axisAlpha = 0;
                categoryAxis.gridPosition = "start";

                // value
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.stackType = "regular";
                valueAxis.gridAlpha = 0.1;
                valueAxis.axisAlpha = 0;
                chartmanhour.addValueAxis(valueAxis);

                // GRAPHS
                // first graph    
                var graph = new AmCharts.AmGraph();
                graph.title = "Man-hour";
                graph.labelText = "[[value]]";
                graph.valueField = "manhour";
                graph.type = "column";
                graph.lineAlpha = 1;
                graph.fillAlphas = 1;
                graph.lineColor = "#8AF2A5";
                graph.alphaField = "alpha";
                graph.balloonText = "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>";
                chartmanhour.addGraph(graph);
      
             	// line graph
                var graph2 = new AmCharts.AmGraph();
                graph2.type = "line";
                graph2.lineColor = "#fcd202";
                graph2.bulletColor = "#FFFFFF";
                graph2.bulletBorderColor = "#fcd202";
                graph2.bulletBorderThickness = 2;
                graph2.bulletBorderAlpha = 1;
                graph2.title = "Average";
                graph2.valueField = 'average';
                graph2.lineThickness = 2;
                graph2.bullet = "round";
                graph2.fillAlphas = 0;
                graph2.balloonText = "<span style='font-size:13px;'>[[title]] : <b>[[value]]</b></span>";
                chartmanhour.addGraph(graph2);
                
                
             	// LEGEND                
                var legend = new AmCharts.AmLegend();
                legend.useGraphSettings = true;
                //legend.data = [{title:"Income", color:"#CC0000", markerType:"square"}, {title:"Expense", color:"#00CC00", markerType:"circle"}, {title:"Target", color:"#00CC00", markerType:"line"}]
                chartmanhour.addLegend(legend);

                // WRITE
                chartmanhour.write("manhourChart");
            });

            
        </script>
        <div id="manhourChart" style="height: 400px;"></div>