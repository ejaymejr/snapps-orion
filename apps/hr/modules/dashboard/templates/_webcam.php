	<table class="table bordered condensed ">
		<tr>
			<td ><a
				href="javascript:webcam.capture();changeFilter();void(0);" class="button info span3">Take a picture instantly</a>
			</td>
			<td ><a
				href="javascript:uploadImage()" class="button success span3">Save This Photo</a>
			</td>
		</tr>
		<tr>
			<td><div id="webcam"></div></td>
			<td><canvas id="canvas" height="240" ></canvas></td>
		</tr>
	</table>

<script type="text/javascript">
	var pos = 0;
	var ctx = null;
	var cam = null;
	var image = null;
	
	var filter_on = false;
	var filter_id = 0;
	
	function changeFilter() {
	 if (filter_on) {
	 	filter_id = (filter_id + 1) & 7;
	 }
	}
	
	function toggleFilter(obj) {
	 if (filter_on =!filter_on) {
	 	obj.parentNode.style.borderColor = "#c00";
	 } else {
	 	obj.parentNode.style.borderColor = "#333";
	 }
	}

	function uploadImage()
	{
		var canvas = document.getElementById("canvas");
		var dataURL = canvas.toDataURL("image/jpeg", 1.0);
		$.ajax({
			  type: "POST",
			  url: "http://orion.micronclean/orion/hr/dashboard/upload",
			  data: { 
			     data: dataURL
			  }
			}).done(function(o) {
			  console.log('saved'); 
			  // If you want the file to be visible in the browser 
			  // - please modify the callback in javascript. All you
			  // need is to return the url to the file, you just saved 
			  // and than put the image in your browser.
			});
	}
	
	$("#webcam").webcam({
	
	 width: 320,
	 height: 240,
	 mode: "callback",
	 swffile: "../../webcam/jscam_canvas_only.swf",
	
	 onTick: function(remain) {
	
	 if (0 == remain) {
		 jQuery("#status").text("Cheese!");
	 } else {
		 jQuery("#status").text(remain + " seconds remaining...");
	 }
	 },
	
	 onSave: function(data) {
	 
	 var col = data.split(";");
	 var img = image;
	
	 if (false == filter_on) {
	
	 for(var i = 0; i < 320; i++) {
	 var tmp = parseInt(col[i]);
	 img.data[pos + 0] = (tmp >> 16) & 0xff;
	 img.data[pos + 1] = (tmp >> 8) & 0xff;
	 img.data[pos + 2] = tmp & 0xff;
	 img.data[pos + 3] = 0xff;
	 pos+= 4;
	 }
	
	 } else {
	
	 var id = filter_id;
	 var r,g,b;
	 var r1 = Math.floor(Math.random() * 255);
	 var r2 = Math.floor(Math.random() * 255);
	 var r3 = Math.floor(Math.random() * 255);
	
	 for(var i = 0; i < 320; i++) {
	 var tmp = parseInt(col[i]);
	
	 /* Copied some xcolor methods here to be faster than calling all methods inside of xcolor and to not serve complete library with every req */
	
	 if (id == 0) {
		 r = (tmp >> 16) & 0xff;
		 g = 0xff;
		 b = 0xff;
	 } else if (id == 1) {
		 r = 0xff;
		 g = (tmp >> 8) & 0xff;
		 b = 0xff;
	 } else if (id == 2) {
		 r = 0xff;
		 g = 0xff;
		 b = tmp & 0xff;
	 } else if (id == 3) {
		 r = 0xff ^ ((tmp >> 16) & 0xff);
		 g = 0xff ^ ((tmp >> 8) & 0xff);
		 b = 0xff ^ (tmp & 0xff);
	 } else if (id == 4) {
		 r = (tmp >> 16) & 0xff;
		 g = (tmp >> 8) & 0xff;
		 b = tmp & 0xff;
		 var v = Math.min(Math.floor(.35 + 13 * (r + g + b) / 60), 255);
		 r = v;
		 g = v;
		 b = v;
	 } else if (id == 5) {
		 r = (tmp >> 16) & 0xff;
		 g = (tmp >> 8) & 0xff;
		 b = tmp & 0xff;
	 if ((r+= 32) < 0) r = 0;
	 if ((g+= 32) < 0) g = 0;
	 if ((b+= 32) < 0) b = 0;
	 } else if (id == 6) {
		 r = (tmp >> 16) & 0xff;
		 g = (tmp >> 8) & 0xff;
		 b = tmp & 0xff;
	 if ((r-= 32) < 0) r = 0;
	 if ((g-= 32) < 0) g = 0;
	 if ((b-= 32) < 0) b = 0;
	 } else if (id == 7) {
		 r = (tmp >> 16) & 0xff;
		 g = (tmp >> 8) & 0xff;
		 b = tmp & 0xff;
		 r = Math.floor(r / 255 * r1);
		 g = Math.floor(g / 255 * r2);
		 b = Math.floor(b / 255 * r3);
	 }
		 img.data[pos + 0] = r;
		 img.data[pos + 1] = g;
		 img.data[pos + 2] = b;
		 img.data[pos + 3] = 0xff;
		 pos+= 4;
	 }
	 }
	
	 if (pos >= 0x4B000) {
		 ctx.putImageData(img, 0, 0);
		 pos = 0;
		 //webcam.save('http://orion.micronclean/orion/hr/dashboard/upload');
	 }
	 },
	
	 onCapture: function () {
	 webcam.save();
	
		 jQuery("#flash").css("display", "block");
		 jQuery("#flash").fadeOut(100, function () {
		 jQuery("#flash").css("opacity", 1);
	 });
	 },
	 	debug: function (type, string) {
	 	jQuery("#status").html(type + ": " + string);
	 },
	
	 onLoad: function () {
		 var cams = webcam.getCameraList();
		 for(var i in cams) {
		 jQuery("#cams").append("<li>" + cams[i] + "</li>");
	 }
	 }
	});
	
	
	 //********************************************
	 window.addEventListener("load", function() {
		
	 var canvas = document.getElementById("canvas");
	
	 if (canvas.getContext) {
		 ctx = document.getElementById("canvas").getContext("2d");
		 ctx.clearRect(0, 0, 320, 240);
		
		 var img = new Image();
		 img.src = "/image/logo.gif";
		 img.onload = function() {
		 ctx.drawImage(img, 320, 240);
	 }
	 	image = ctx.getImageData(0, 0, 320, 240);
	 }
	 
	}, false);

// window.addEventListener("resize", function() {

//  var pageSize = getPageSize();
//  jQuery("#flash").css({ height: pageSize[1] + "px" });

// }, false);

</script>