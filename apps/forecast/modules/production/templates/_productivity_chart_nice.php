<?php //var_dump($target); exit(); ?>
<script type="text/javascript">
          var chart;
          AmCharts.ready(function () {
                // SERIAL CHART  
                chart = new AmCharts.AmSerialChart();
                chart.pathToImages = "../amcharts/images/";
                chart.dataProvider = <?php echo $productivity ?>;
                chart.categoryField = "date";
                chart.startDuration = 1;
                chart.addTitle("PRODUCTIVITY CHART", 14);
                
                chart.handDrawn = true;
                chart.handDrawnScatter = 3;

                // AXES
                // category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.gridPosition = "start";

                // value
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.axisAlpha = 0;
                chart.addValueAxis(valueAxis);

                // GRAPHS
                // column graph
                var graph1 = new AmCharts.AmGraph();
                graph1.type = "column";
                graph1.title = "Productivity";
                graph1.lineColor = "#97BECF";
                graph1.valueField = "Productivity";
                graph1.lineAlpha = 1;
                graph1.fillAlphas = 1;
                graph1.dashLengthField = "dashLengthColumn";
                graph1.alphaField = "alpha";
                graph1.balloonText = "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>";
                chart.addGraph(graph1);

                // line
                var graph2 = new AmCharts.AmGraph();
                graph2.type = "average";
                graph2.title = "Average";
                graph2.lineColor = "#fcd202";
                graph2.valueField = "average";
                graph2.lineThickness = 3;
                graph2.bullet = "round";
                graph2.bulletBorderThickness = 3;
                graph2.bulletBorderColor = "#fcd202";
                graph2.bulletBorderAlpha = 1;
                graph2.bulletColor = "#ffffff";
                graph2.dashLengthField = "dashLengthLine";
                graph2.balloonText = "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>";
                chart.addGraph(graph2);

                
                

                // LEGEND                
                var legend = new AmCharts.AmLegend();
                legend.useGraphSettings = true;
                //legend.data = [{title:"Income", color:"#CC0000", markerType:"square"}, {title:"Expense", color:"#00CC00", markerType:"circle"}, {title:"Target", color:"#00CC00", markerType:"line"}]
                chart.addLegend(legend);

                // WRITE
                chart.write("chartdiv");
            });
        </script>
        <div id="chartdiv" style="width:1000px; height:400px;"></div>