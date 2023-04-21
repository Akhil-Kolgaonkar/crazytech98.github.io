$(document).ready(function(){
	$("#colorizeBtn").click(function(){
		var input = $("#imageInput")[0];
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				var img = new Image();
				img.onload = function() {
					var canvas = document.createElement("canvas");
					canvas.width = img.width;
					canvas.height = img.height;
					var ctx = canvas.getContext("2d");
					ctx.drawImage(img, 0, 0);
					var imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
					var data = imageData.data;
					for (var i = 0; i < data.length; i += 4) {
						var grayscale = data[i] * 0.3 + data[i + 1] * 0.59 + data[i + 2] * 0.11;
						data[i] = grayscale;
						data[i + 1] = grayscale;
						data[i + 2] = grayscale;
					}
					ctx.putImageData(imageData, 0, 0);
					var url = canvas.toDataURL("image/jpeg");
					colorize(url);
				}
				img.src = e.target.result;
			}
			reader.readAsDataURL(input.files[0]);
		}
	});
});

function colorize(url) {
	$("#result").html("Colorizing... Please wait.");
	$.ajax({
		url: "https://api.deepai.org/api/colorizer",
		type: "POST",
		data: {image: url},
		headers: {
			"api-key": "quickstart-QUdJIGlzIGNvbWluZy4uLi4K"
		},
		success: function(response) {
			var colorizedUrl = response.output_url;
			$("#result").html("<img src='" + colorizedUrl + "'>");
		},
		error: function() {
			$("#result").html("Error colorizing image.");
		}
	});
}
