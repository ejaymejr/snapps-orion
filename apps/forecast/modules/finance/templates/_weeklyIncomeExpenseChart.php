<?php //var_dump($chartdata); exit(); ?>
<script type="text/javascript">


            AmCharts.ready(function () {
                // SERIAL CHART  
                chart = new AmCharts.AmSerialChart();
                chart.pathToImages = "../amcharts/images/";
                chart.dataProvider = <?php echo $chartdata ?>;
                chart.categoryField = "week";
                chart.startDuration = 1;
                chart.addTitle("WEEKLY INCOME VS EXPENSES", 14);
                
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
                graph1.title = "Income";
                graph1.lineColor = "#97BECF";
                graph1.valueField = "Income";
                graph1.lineAlpha = 1;
                graph1.fillAlphas = 1;
                graph1.dashLengthField = "dashLengthColumn";
                graph1.alphaField = "alpha";
                graph1.balloonText = "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>";
                chart.addGraph(graph1);

                // line
                var graph2 = new AmCharts.AmGraph();
                graph2.type = "line";
                graph2.title = "Expenses";
                graph2.lineColor = "#fcd202";
                graph2.valueField = "Expenses";
                graph2.lineThickness = 3;
                graph2.bullet = "round";
                graph2.bulletBorderThickness = 3;
                graph2.bulletBorderColor = "#fcd202";
                graph2.bulletBorderAlpha = 1;
                graph2.bulletColor = "#ffffff";
                graph2.dashLengthField = "dashLengthLine";
                graph2.balloonText = "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>";
                chart.addGraph(graph2);

                // line
                var target = new AmCharts.AmGraph();
                target.type = "line";
                target.title = "Target S$<?php echo number_format($target) ?> ";
                target.lineColor = "#82FA58";
                target.valueField = "Target";
                target.lineThickness = 3;
                target.bullet = "square";
                target.bulletBorderThickness = 3;
                target.bulletBorderColor = "#82FA58";
                target.bulletBorderAlpha = 1;
                target.bulletColor = "#ffffff";
                target.dashLengthField = "dashLengthLine";
                target.balloonText = "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b> [[additional]]</span>";
                chart.addGraph(target);
                

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