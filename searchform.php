<form class="search-box" action="/" method="get">
    <fieldset>
	<svg version="1.1" id="search-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="1em" height="1em" viewBox="0 0 40 40" enable-background="new 0 0 40 40" xml:space="preserve">
<path d="M22.815,22.707c0,0,0.898,0.876,2.041,0.604c2.627,2.627,0.655,0.655,11.002,11.002l-2.427,2.427c0,0-10.053-10.053-11.002-11.002c0.271-1.143-0.604-2.041-0.604-2.041l-0.346,0.015c-4.054,3.348-10.064,3.125-13.857-0.668c-4.03-4.03-4.03-10.564,0-14.594c4.029-4.03,10.563-4.03,14.593,0c3.812,3.812,4.018,9.863,0.62,13.917L22.815,22.707zM20.478,21.221c3.047-3.046,3.047-7.986,0-11.033c-3.047-3.047-7.987-3.047-11.034,0c-3.047,3.047-3.047,7.987,0,11.034C12.491,24.268,17.431,24.268,20.478,21.221z"/>
</svg>
	<input type="text" name="s" id="search" 
	       class="search-box-input"
	       value="<?php the_search_query(); ?>"
	       placeholder="search..."
	       required/>
    </fieldset>
</form>
