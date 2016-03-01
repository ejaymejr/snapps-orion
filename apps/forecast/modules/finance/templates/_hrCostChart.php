
<?php 
	$divID = HrLib::randomID(); 
	//var_dump($chartData);
?>
        <script type="text/javascript">
            var chart;

//            var chartData = [
//                {
//                    "year": 2005,
//                    "income": 23.5,
//                    "expenses": 18.1
//                },
//                {
//                    "year": 2006,
//                    "income": 26.2,
//                    "expenses": 22.8
//                },
//                {
//                    "year": 2007,
//                    "income": 30.1,
//                    "expenses": 23.9
//                },
//                {
//                    "year": 2008,
//                    "income": 29.5,
//                    "expenses": 25.1
//                },
//                {
//                    "year": 2009,
//                    "income": 24.6,
//                    "expenses": 25
//                }
//            ];


            AmCharts.ready(function () {
                // SERIAL CHART
                chart = new AmCharts.AmSerialChart();
                chart.dataProvider = <?php echo $chartData ?>;
                chart.categoryField = "name";
                chart.startDuration = 1;
                chart.rotate = true;

                // AXES
                // category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.gridPosition = "start";
                categoryAxis.axisColor = "#DADADA";
                categoryAxis.dashLength = 3;

                // value
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.dashLength = 3;
                valueAxis.axisAlpha = 0.2;
                valueAxis.position = "top";
                valueAxis.title = "<?php echo $title ?> CHART";
                valueAxis.minorGridEnabled = true;
                valueAxis.minorGridAlpha = 0.08;
                valueAxis.gridAlpha = 0.15;
                chart.addValueAxis(valueAxis);

                // GRAPHS
                // column graph
                var graph1 = new AmCharts.AmGraph();
                graph1.type = "column";
                graph1.title = "<?php echo $title ?>";
                graph1.valueField = "total";
                graph1.lineAlpha = 0;
                graph1.fillColors = "#ADD981";
                graph1.fillAlphas = 0.8;
                graph1.balloonText = "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b></span>";
                chart.addGraph(graph1);

                // line graph
                var graph2 = new AmCharts.AmGraph();
                graph2.type = "line";
                graph2.lineColor = "#27c5ff";
                graph2.bulletColor = "#FFFFFF";
                graph2.bulletBorderColor = "#27c5ff";
                graph2.bulletBorderThickness = 2;
                graph2.bulletBorderAlpha = 1;
                graph2.title = "Average";
                graph2.valueField = "average";
                graph2.lineThickness = 2;
                graph2.bullet = "round";
                graph2.fillAlphas = 0;
                graph2.balloonText = "<span style='font-size:13px;'>[[title]] in [[category]]:<b>[[value]]</b></span>";
                chart.addGraph(graph2);

                // LEGEND
                var legend = new AmCharts.AmLegend();
                legend.useGraphSettings = true;
                chart.addLegend(legend);

                chart.creditsPosition = "top-right";

                // WRITE
                chart.write("<?php echo $divID; ?>");
            });
        </script>

<div id="<?php echo $divID; ?>" style="width: 1000px; height: <?php echo $height ?>px;"></div>
