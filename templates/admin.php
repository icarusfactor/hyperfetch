<?php 
?>
<h1>HyperFetch Plugin</h1>
<p>
<b>Excuse The Mess:</b><BR>
This plugin is still slightly hard coded and designed for the website http://userspace.org
The loading symbol is the userspace SVG symbol,I will have a few options in the future
and tell you how to make your own SVG files as it has to be very basic options.   
</p>
<p>
  While some of the code is hardcoded, its currently is a very flexable method for making many dynamc presentation blocks that work with the Wordpress menu system.   
</p>
<p>
<b>hyperfetch shortcode parameters:</b><BR>
[ <i>class :</i>]  This is the class attribute of the anchor links  you wish to connect to. <BR>
[ <i>initid :</i>]  This id starting at 0 is from the ordered hyperwitch shortcode list. You only need this for your primary menu,as to start loading on inital view.<BR>
[ <i>controlsid :</i>] This is the id for the nav or navigation div  to know where to find the anchor links and take control of them. <BR>
[ <i>containerid :</i>] This is the id of the main div of the dynamic content that will be presented into after loading from remote page link. <BR>
[ <i>loadbr:</i>] When you start to load a remote page you will need a certian amount of default space to show the loading symbols.  The number is the amount simple break tags to add to the contianerid area. <BR>
[ <i>submenuid:</i>] This is the id of the submenu that will be accessed from the main menu</i> <BR>
<BR>
<b>hyperswitch shortcode parameters:</b><BR>
[ <i>tag:</i> ]  This is the unique id of the anchor tag the switch will control<BR>
[ <i>url:</i>  ] This is the remote page url to dynamically load into the  menus dynamic page.<BR>
[ <i>menu:</i> ] This option tells the plugin how to display the menu control blocks. It can have 1 or 2 digits. The 1st is to show the main menu or not. 2nd is  to show submenu or not.<BR>
[ <i>img:</i> ] If you wish to have an icon instead of text controls you can place the image in this paramter. <BR>

</p>
</blockquote>
This is the  minimal HTML skeleton setup for HyperFetch to connect to.  
</blockquote>
<pre>
&#x3C;nav id=&#x22;btn-controls&#x22; &#x3E;
&#x3C;a href=&#x22;/&#x22; class=&#x22;connect&#x22; id=&#x22;TZ1&#x22; &#x3E;TEST1&#x3C;/a&#x3E;
&#x3C;a href=&#x22;/&#x22; class=&#x22;connect&#x22; id=&#x22;TZ2&#x22; &#x3E;TEST2&#x3C;/a&#x3E;
&#x3C;a href=&#x22;/&#x22; class=&#x22;connect&#x22; id=&#x22;TZ3&#x22; &#x3E;TEST3&#x3C;/a&#x3E;
&#x3C;/nav&#x3E;

&#x3C;div style=&#x22;min-height: 500px;&#x22; id=&#x22;bazinga&#x22; &#x3E;
STUFF WILL BE HERE&#x3C;BR&#x3E;
&#x3C;/div&#x3E;


[hyperfetch class="connect" initid=0 controlsid="btn-controls" containerid="bazinga" loadbr=30 ]
[hyperswitch tag="TZ1" url="/tzcontent1" menu="1" img="http://47.217.123.141:8080/wp-content/uploads/2020/02/USOutils_icon.svg" ]
[hyperswitch tag="TZ2" url="/tzcontent2" menu="1" ]
[hyperswitch tag="TZ3" url="/tzcontent3" menu="1" img="http://47.217.123.141:8080/wp-content/uploads/2020/02/USOutils_icon.svg" ]
[/hyperfetch]
</pre>
<BR><BR>
<BR><BR>
<blockquuote>
Below is a complex method of chained menu usage.  With this method you can continually traverse down and back up the dyamically loaded menus to no end.  
Will create a tutorial and example later on. But just posting this to give brief explanation.  
</blockquote>
<BR><BR>
<pre>
[hyperfetch class="works" initid=0 controlsid="button-container-work" containerid="works"  loadbr=5  submenuid="button-container-item" ]
[hyperswitch tag="DISTRO" url="/distro" menu="10" ]
[hyperswitch tag="DESKTOP" url="/desktop" menu="10" ]
[hyperswitch tag="FOSS" url="/foss_utils" menu="11"  ]
[/hyperfetch]

[hyperfetch class="item" controlsid="button-container-item" containerid="works"  loadbr=5 ]
[hyperswitch tag="foss_utils" url="/foss_utils"  menu="1" img="http://47.217.123.141:8080/wp-content/uploads/2020/02/USOutils_icon.svg"  ]
[hyperswitch tag="foss_sys" url="/foss_sys" menu="1" img="http://47.217.123.141:8080/wp-content/uploads/2020/02/USOsystem_icon.svg" ]
[hyperswitch tag="foss_net" url="/foss_net" menu="1" img="http://47.217.123.141:8080/wp-content/uploads/2020/02/USOinternet_icon.svg" ]
[hyperswitch tag="foss_graph" url="/foss_graph" menu="1" img="http://47.217.123.141:8080/wp-content/uploads/2020/02/USOgraphics_icon.svg" ]
[hyperswitch tag="foss_sci" url="/foss_sci" menu="1" img="http://47.217.123.141:8080/wp-content/uploads/2020/02/USOscience_icon.svg" ]
[hyperswitch tag="foss_dev" url="/foss_dev" menu="1" img="http://47.217.123.141:8080/wp-content/uploads/2020/02/USOdevelopment_icon.svg" ]
[hyperswitch tag="foss_serv" url="/foss_serv"  menu="1" img="http://47.217.123.141:8080/wp-content/uploads/2020/02/USOserver_icon.svg" ]
[hyperswitch tag="foss_media" url="/foss_media" menu="1" img="http://47.217.123.141:8080/wp-content/uploads/2020/02/USOmultimedia_icon.svg" ]
[hyperswitch tag="foss_game" url="/foss_game" menu="1" img="http://47.217.123.141:8080/wp-content/uploads/2020/02/USOgames_icon.svg" ]
[hyperswitch tag="foss_office" url="/foss_office" menu="1" img="http://47.217.123.141:8080/wp-content/uploads/2020/02/USOoffice_icon.svg" ]
[/hyperfetch]
</pre>