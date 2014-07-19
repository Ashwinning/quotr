
<?php

function customPageHeader(){}?>
 
<?php 

include_once('header.php');

?>

<div class="container-fluid" id="add-quote-fluid">
      <div id="add-quote-div">
        <p>Enter Quote Source</p>
        <form class="pull-center pull-center-1" method="POST" action="AddQuote.php" onSubmit="openPage()" >
          <input onChange="openPage()" class="textinput pull-center" type="text" id="QuoteSource" placeholder="Example : http://www.goodreads.com/quotes/503791-what-the-mysterious-is-i-do-not-know-i-do"> 
          <input type="submit" value="Go!">
        </form>
        <div id="note-add-quote">
        Note: You cannot enter a quote without specifying a source web url for the quote.<br>
        Example sources include: <br>
        -Blog Posts <Br> -News Articles <br> -Tweets <br> -Public Facebook Posts etc.
        </div> 
      </div>
    </div>
    
<script type="text/javascript">
	$(document).ready(function() {
		$(".fancybox").fancybox();
	});
</script>

<script type="text/javascript">

function openPage()
{
var data='Some Error Occured';
$.get( document.getElementById('QuoteSource').value, function( dataRet ) {
  data = dataRet;
  alert( "Load was performed." );
});


$.fancybox.open({
    padding : 0,
	content: data,
    type: 'html',
	title: 'Select the text you want to Quote',
	afterLoad: function()
	{
	  	
		
			
	}
});	


}

</script>


<?php 

include_once('footer.php');

?>