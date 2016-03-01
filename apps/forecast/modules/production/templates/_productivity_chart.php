	
		<script type="text/javascript">
            var chartproductivity;
            
            var chartProductivityData = <?php echo $productivity ; ?>;

            AmCharts.ready(function () {
                // SERIAL CHART
                chartproductivity = new AmCharts.AmSerialChart();
                chartproductivity.dataProvider = chartProductivityData;
                chartproductivity.categoryField = "date";
                chartproductivity.plotAreaBorderAlpha = 0.2;
                chartproductivity.pathToImages = "../amcharts/images/";
                chartproductivity.startDuration = 1;
                chartproductivity.addTitle("<?php echo $title ?>", 14);

                // AXES
                chartproductivity.handDrawn = true;
                chartproductivity.handDrawnScatter = 3;
                
                // category
                var categoryAxis = chartproductivity.categoryAxis;
                categoryAxis.gridAlpha = 0.1;
                categoryAxis.axisAlpha = 0;
                categoryAxis.gridPosition = "start";

                // value
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.stackType = "regular";
                valueAxis.gridAlpha = 0.1;
                valueAxis.axisAlpha = 0;
                chartproductivity.addValueAxis(valueAxis);

                // GRAPHS
                // first graph    
                var graph = new AmCharts.AmGraph();
                graph.title = "Productivity";
                graph.labelText = "[[value]]";
                graph.valueField = "productivity";
                graph.type = "column";
                graph.lineAlpha = 1;
                graph.fillAlphas = 1;
                graph.lineColor = "#97BECF";
                graph.alphaField = "alpha";
                graph.balloonText = "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>";
                chartproductivity.addGraph(graph);
      
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
                chartproductivity.addGraph(graph2);
                
                
             	// LEGEND                
                var legend = new AmCharts.AmLegend();
                legend.useGraphSettings = true;
                //legend.data = [{title:"Income", color:"#CC0000", markerType:"square"}, {title:"Expense", color:"#00CC00", markerType:"circle"}, {title:"Target", color:"#00CC00", markerType:"line"}]
                chartproductivity.addLegend(legend);

                // WRITE
                chartproductivity.write("productivityChart");
            });

            
        </script>
        <div id="productivityChart" style="height: 400px;"></div>