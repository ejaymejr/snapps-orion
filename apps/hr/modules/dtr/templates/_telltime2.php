
       <script type="text/javascript">
			var chart;
			var sArrow;
			var mArrow;
			var hArrow;
			var starttime = new Date();
			AmCharts.ready(function () {
			
				// clock is just an angular gauge with three arrows
				chart = new AmCharts.AmAngularGauge();
				chart.startDuration = 0.3;
			
				// for simplicyty, we use only one axis
				var axis = new AmCharts.GaugeAxis();
				axis.startValue = 0;
				axis.endValue = 12;
				axis.valueInterval = 1;
				axis.minorTickInterval = 0.2;
				axis.showFirstLabel = false;
				axis.startAngle = 0;
				axis.endAngle = 360;
				axis.axisAlpha = 0.3;
				chart.addAxis(axis);
			
				// hour arrow
				hArrow = new AmCharts.GaugeArrow();
				hArrow.radius = "50%";
				hArrow.clockWiseOnly = true;
			
				// minutes arrow
				mArrow = new AmCharts.GaugeArrow();
				mArrow.radius = "80%";
				mArrow.startWidth = 6;
				mArrow.nailRadius = 0;
				mArrow.clockWiseOnly = true;
			
				// seconds arrow
				sArrow = new AmCharts.GaugeArrow();
				sArrow.radius = "90%";
				sArrow.startWidth = 3;
				sArrow.nailRadius = 4;
				sArrow.color = "#CC0000";
				sArrow.clockWiseOnly = true;
			
				// update clock before adding arrows to avoid initial animation
				
				updateClock();
			
				// add arrows
				chart.addArrow(hArrow);
				chart.addArrow(mArrow);
				chart.addArrow(sArrow);
			
				chart.write("chartdiv2");
				
				// update each second
				setInterval(updateClock, 1000);
			});
			
			// update clock
			function updateClock() {
				var serverTime = <?php echo time() * 1000; ?>;
				var timeDiff = serverTime - starttime;
				var cdate = new Date();
				var date = new Date(cdate.getTime() + timeDiff );
				var hours = date.getHours();
				var minutes = date.getMinutes();
				var seconds = date.getSeconds();
				// set hours
				hArrow.setValue(hours + minutes / 60);
				// set minutes
				mArrow.setValue(12 * (minutes + seconds / 60) / 60);
				// set seconds
				sArrow.setValue(12 * date.getSeconds() / 60);
			}
					
			
        </script>
    	
        <div id="chartdiv2" style="width:300px; height:250px;"></div>
        