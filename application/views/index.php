-->   
<div data-role="page" id="start">    

<div id="top" align="center">
<img src="/images/toplogo.png" width="500" height="73">
</div>

<form method="get" action="/start/search">
<div align="center">
<div id="city-container">
You are in city: <div id="city"></div>
</div>
<div id="street-container">
You are on street: <div id="street"></div>
</div>
</div>



<div id="select" align="center">
<div style="max-width:80%;">

<div data-role="fieldcontain">
    <div id="label">Activity</div>
    <select name="activity" data-mini="true" id="activity">
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

    <div id="label">Max nr of subway stations: </div>
    <input type="range" name="distance" id="distance" data-highlight="false" data-mini="true" min="0" max="10" value="0">

</div>
</div>

<div id="button" align="center">
<div style="max-width:50%;">

    <input type="submit" value="Search">
</form>
</div>
</div>
</div><!-- page  start -->


<div data-role="page" id="result1">
Hello!!!
</div><!-- page result -->
