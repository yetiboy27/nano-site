function AddASong() {
    var option1 = document.getElementById("add_song");
    var option2 = document.getElementById("no_song");
    
    if(option1.checked) {
    	document.getElementById("song_info").innerHTML = "<br><label for=\"song\">Song Name<br><input type=\"text\" name=\"song\"></label><br><label for=\"song\">Song Name<br><input type=\"text\" name=\"song\"></label><br>";         
    }
    else if(option2.checked) {
    	document.getElementById("no_more_songs").innerHTML = "Submit your music then!";
    }
}

function  ChangeTheme() {
	var darkTheme = document.getElementById("dark_theme");
  var lightTheme = document.getElementById("light_theme");

	// document.addEventListener("DOMContentLoaded", function() {
		if (darkTheme.checked) {
			var sheet = document.createElement('link')
			sheet.innerHTML = "<link rel='stylesheet' href='dark_theme.css' type='text/css' id='dark_style'>";
			document.head.appendChild(sheet);
			// if (document.getElementById('light_style')=== true) {
			if (true) {	
				var sheetToBeRemoved = document.getElementById('light_style');
				var sheetParent = sheetToBeRemoved.parentNode;
				sheetParent.removeChild(sheetToBeRemoved);
			}
			
		}
		else if (lightTheme.checked) {			
			var sheet = document.createElement('link')
			sheet.innerHTML = "<link rel='stylesheet' href='light_theme.css' type='text/css' id='light_style'>";
			document.head.appendChild(sheet);
			if (true) {
				var sheetToBeRemoved = document.getElementById('dark_style');
				var sheetParent = sheetToBeRemoved.parentNode;
				sheetParent.removeChild(sheetToBeRemoved);
			}			
		}
}

canvas               = O('logo')
context              = canvas.getContext('2d')
context.font         = 'bold italic 56px arial'
context.textBaseline = 'top'
image                = new Image()
image.src            = '001-music-2.png'

image.onload = function()
{
  context.fillStyle = 'red';
  context.fillText(  "Music Collection Database", 90, 0)
  context.strokeText("Music Collection Database", 90, 0)
  context.drawImage(image, 0, 0)
}

function O(i) { return typeof i == 'object' ? i : document.getElementById(i) }
function S(i) { return O(i).style                                            }
function C(i) { return document.getElementsByClassName(i)                    }

