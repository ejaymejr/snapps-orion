<div class="panel " >
	    <div class="panel-header bg-lightBlue fg-white">
	        ARTICLE PER KILLOWATT HOUR
	    </div>
	    <div class="panel-content" >		
		<script type="text/javascript">
            var chart2;
            
            var articleperkwh = <?php echo $articleperkwhJson; ?>;

            AmCharts.ready(function () {
                // SERIAL CHART
                chart2 = new AmCharts.AmSerialChart();
                chart2.dataProvider = articleperkwh;
                chart2.categoryField = "month";
                chart2.plotAreaBorderAlpha = 0.2;

                // AXES
                // category
                var categoryAxis = chart2.categoryAxis;
                categoryAxis.gridAlpha = 0.1;
                categoryAxis.axisAlpha = 0;
                categoryAxis.gridPosition = "start";

                // value
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.stackType = "regular";
                valueAxis.gridAlpha = 0.1;
                valueAxis.axisAlpha = 0;
                chart2.addValueAxis(valueAxis);

                // GRAPHS
                // first graph    
                var graph = new AmCharts.AmGraph();
                graph.title = "article/kwh";
                graph.labelText = "[[value]]";
                graph.valueField = "total";
                graph.type = "column";
                graph.lineAlpha = 0;
                graph.fillAlphas = 1;
                graph.lineColor = "#CC0000";
                graph.balloonText = "<span style='color:#555555;'>[[category]]</span><br><span style='font-size:14px'>[[title]]:<b>[[value]]</b></span>";
                chart2.addGraph(graph);
      
             	// line graph
                var graph2 = new AmCharts.AmGraph();
                graph2.type = "line";
                graph2.lineColor = "#27c5ff";
                graph2.bulletColor = "#FFFFFF";
                graph2.bulletBorderColor = "#27c5ff";
                graph2.bulletBorderThickness = 2;
                graph2.bulletBorderAlpha = 1;
                graph2.title = "Average";
                graph2.valueField = 'average';
                graph2.lineThickness = 2;
                graph2.bullet = "round";
                graph2.fillAlphas = 0;
                graph2.balloonText = "<span style='font-size:13px;'>[[title]] in [[category]] : <b>[[value]]</b></span>";
                chart2.addGraph(graph2);
                
                // LEGEND                  
                var legend = new AmCharts.AmLegend();
                legend.borderAlpha = 0.2;
                legend.horizontalGap = 10;
                chart2.addLegend(legend);

                // WRITE
                chart2.write("articleperkwh");
            });

            
        </script>
        <div id="articleperkwh" style="height: 400px;"></div>
    </div>
</div>