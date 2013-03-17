
<div data-role="page" id="start">    
<div id="top">
	<div id="logo">
    <img src="/images/logo.png">
    </div>
    <div id="city">
    
    </div>
    <div style="clear:both;"></div>
</div>

<div id="placeimg_wrap" align="center">

  <div id="placeimg">
  <div id="placeimg_tagabout">About</div>
  <div id="placeimg_tagshare">Share</div>
  <img src="/images/plattan.png">
  </div>

</div>

<div id="top1">
  TOP 1 ALL CATEGORIES >>
  <div style="font-size:12px;">Find the one most recomended, trended per all categories.</div>	
</div>

<div id="todo">
	<div id="todo_left">
    	TOP 10<br><strong>TO DO</strong>
        <div style="font-size:10px;">WHERE YOU ARE</div>
    </div>
	<div id="todo_right">
    	TOP 10<br><strong>TO DO</strong>
        <div style="font-size:10px;">ANOTHER PLACE</div>
    </div>
    <div style="clear:both;"></div>
</div>

<div id="weather">
	<div id="weather_left">
    Currency
    <div id="rate" style="font-size:14px;"></div>   
    </div>
	<div id="weather_right">
    Weather
    <div style="font-size:14px;">Sunny</div>
    </div>
    <div style="clear:both;"></div>
</div>




<div id="search">
<form method="get" action="search.php">

<div id="searchlabel">
<div>
	<div style="float:left;">
      <img src="/images/geotag.png">
      </div>
      <div style="float:left; font-size:14px; text-align:left; margin-left:5px;">
    You are on street: <strong><div id="street"></div></strong><br>
    Use the search function below to explore.
    </div>
</div>
</div>



<div id="select" align="center">
<div>

<div data-role="fieldcontain"> 
    <div id="label" style="display:none;">Activity</div>
    <select name="activity" data-mini="true" data-corners="false" data-role="none" id="activity">
        <option value="1">Food / Dining</option>
        <option value="2">Drinking</option>
        <option value="3">Music / Dancing</option>
        <option value="4">Culture</option>
    </select>
</div>

</div>
</div>



<div id="slider" align="center">
<div style="max-width:80%;">

    <div id="label">Subway stops: </div>
    <input type="range" name="distance" id="distance" data-highlight="false" data-mini="true" min="0" max="10" value="0">

</div>
</div>

<div id="button" align="center">
<div style="max-width:50%;">

    <a href="#search-result" type="button" value="Search">Search</a>
</form>
</div>
</div>
</div>




<div id="map">
 	<div id="map_tag">Current place</div>
  <div id="map_canvas" style="width:100%; height:266px"></div>
</div>




</div><!-- page  start -->


