GW Mapper
=========

<h2>Description</h2>

<p>
	This Wordpres Plugin allows a uwer to create a Google Map inside a post or page usinga short tag.
</p>

<h2>Setup</h2>

<p>
Add the basic short tag to your page or post in wordpress to get a map. Wrap addresses to create markers at inside the short tags with a new address on each line.
</p>

<h2>short Tag</h2>

<p>
[gwmapper center="10 Main Street, Detroit, MI" zoom="10"]
</p>

<h2>Required Parameters</h2>

<p>
<b>center</b> - The address of the center point of the map. This can be any google acceptable map search string.
</p>

<p>
<b>zoom</b> - The zoom level for the map.
</p>

<h2>Optional Parameters</h2>

<p>
<b>height</b> - The height of the map in pixels. Default is 300.
</p>

<p>
<b>width</b> - The width of the map in pixels. Default is 300.
</p>

<h2>Examples</h2>

<p>
To get a map of Detroit that is zoomed in to the downtown area, use:
</p>
<p>
<code>[gwmapper center="Detroit, MI" zoom="10"]</code>
</p>

<p>
To get a map of Detroit that is zoomed in to the downtown area that is 500 pixels wide and 400 pixels tall, use:
</p>
<p>
<code>[gwmapper center="Detroit, MI" zoom="10" width="500" height="400"]</code>
</p>

<p>
To get a map of Detroit Meto area that has a marker in Royal Oak, MI and one in Dearborn, MI, use:
</p>
<p>
<code>[gwmapper center="Detroit, MI" zoom="8"]
Royal Oak, MI
Dearborn, MI
[/gwmapper]]
</code>
</p>



