// JavaScript Document
function copytext()
				{
					alert ('copytext.js is running!')
					
				var t = '';
				function gText(e) 
					{
					t = (document.all) ? document.selection.createRange().text : document.getSelection();
				
					//document.getElementById('input').value = t; //put t in as the quote
					alert(t);
					}
				
				document.onmouseup = gText;
				if (!document.all) document.captureEvents(Event.MOUSEUP);
	
				}