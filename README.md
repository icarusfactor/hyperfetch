# hyperfetch
Wordpress Plugin: Creates dynamic HTML loading areas with nav and sub-menu controls.

This has some hard coded stuff in it, as its an early release. But is working and highly flexable enough to make it easy to add and integrate with Wordpress menu system.


HyperFetch Plugin
Excuse The Mess:
This plugin is still slightly hard coded and designed for the website http://userspace.org The loading symbol is the userspace SVG symbol,I will have a few options in the future and tell you how to make your own SVG files as it has to be very basic options.

While some of the code is hardcoded, its currently is a very flexable method for making many dynamc presentation blocks that work with the Wordpress menu system.

hyperfetch shortcode parameters:
[ class :] This is the class attribute of the anchor links you wish to connect to.
[ initid :] This id starting at 0 is from the ordered hyperwitch shortcode list. You only need this for your primary menu,as to start loading on inital view.
[ controlsid :] This is the id for the nav or navigation div to know where to find the anchor links and take control of them.
[ containerid :] This is the id of the main div of the dynamic content that will be presented into after loading from remote page link.
[ loadbr:] When you start to load a remote page you will need a certian amount of default space to show the loading symbols. The number is the amount simple break tags to add to the contianerid area.
[ submenuid:] This is the id of the submenu that will be accessed from the main menu

hyperswitch shortcode parameters:
[ tag: ] This is the unique id of the anchor tag the switch will control
[ url: ] This is the remote page url to dynamically load into the menus dynamic page.
[ menu: ] This option tells the plugin how to display the menu control blocks. It can have 1 or 2 digits. The 1st is to show the main menu or not. 2nd is to show submenu or not.
[ img: ] If you wish to have an icon instead of text controls you can place the image in this paramter.
This is the minimal HTML skeleton setup for HyperFetch to connect to.
<nav id="btn-controls" >
<a href="/" class="connect" id="TZ1" >TEST1</a>
<a href="/" class="connect" id="TZ2" >TEST2</a>
<a href="/" class="connect" id="TZ3" >TEST3</a>
</nav>

<div style="min-height: 500px;" id="bazinga" >
STUFF WILL BE HERE<BR>
</div>


[hyperfetch class="connect" initid=0 controlsid="btn-controls" containerid="bazinga" loadbr=30 ]
[hyperswitch tag="TZ1" url="/tzcontent1" menu="1" img="http://47.217.123.141:8080/wp-content/uploads/2020/02/USOutils_icon.svg" ]
[hyperswitch tag="TZ2" url="/tzcontent2" menu="1" ]
[hyperswitch tag="TZ3" url="/tzcontent3" menu="1" img="http://47.217.123.141:8080/wp-content/uploads/2020/02/USOutils_icon.svg" ]
[/hyperfetch] 
