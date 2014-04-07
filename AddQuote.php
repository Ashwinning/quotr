
<?php

function customPageHeader(){}?>
 
<?php 

include_once('header.php');

?>

<div class="container-fluid" id="add-quote-fluid">
      <div id="add-quote-div">
        <p>Enter Quote Source</p>
        <form class="pull-center pull-center-1" action="">
          <input class="textinput pull-center" type="text" id="QuoteSource" placeholder="Example : http://www.goodreads.com/quotes/503791-what-the-mysterious-is-i-do-not-know-i-do" onchange="sourceEntered();">
        </form>
        <div id="note-add-quote">
        Note: You cannot enter a quote without specifying a source web url for the quote.<br>
        Example sources include: <br>
        -Blog Posts <Br> -News Articles <br> -Tweets <br> -Public Facebook Posts etc.
        </div> 
      </div>
    </div>


<?php 

include_once('footer.php');

?>