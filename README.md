# hyperfetch
Wordpress Plugin: Creates dynamic HTML loading areas with nav and sub-menu controls.
<BR>
This has some hard coded stuff in it, as its an early release. But is working and highly flexable enough to make it easy to add and integrate with Wordpress menu system.
<BR>

HyperFetch Plugin<BR> 
Excuse The Mess:<BR>
This plugin is still slightly hard coded and designed for the website http://userspace.org The loading symbol is the userspace SVG symbol,I will have a few options in the future and tell you how to make your own SVG files as it has to be very basic options.
<BR>
While some of the code is hardcoded, its currently is a very flexable method for making many dynamc presentation blocks that work with the Wordpress menu system.
<BR>
hyperfetch shortcode parameters:<BR>
[ class :] This is the class attribute of the anchor links you wish to connect to.<BR>
[ initid :] This id starting at 0 is from the ordered hyperwitch shortcode list. You only need this for your primary menu,as to start loading on inital view.<BR>
[ controlsid :] This is the id for the nav or navigation div to know where to find the anchor links and take control of them.<BR>
[ containerid :] This is the id of the main div of the dynamic content that will be presented into after loading from remote page link.<BR>
[ loadbr:] When you start to load a remote page you will need a certian amount of default space to show the loading symbols. The number is the amount simple break tags to add to the contianerid area.<BR>
[ submenuid:] This is the id of the submenu that will be accessed from the main menu<BR>

hyperswitch shortcode parameters:<BR>
[ tag: ] This is the unique id of the anchor tag the switch will control<BR>
[ url: ] This is the remote page url to dynamically load into the menus dynamic page.<BR>
[ menu: ] This option tells the plugin how to display the menu control blocks. It can have 1 or 2 digits. The 1st is to show the main menu or not. 2nd is to show submenu or not.<BR>
[ img: ] If you wish to have an icon instead of text controls you can place the image in this paramter.<BR>
This is the minimal HTML skeleton setup for HyperFetch to connect to.<BR>

&#x3C;nav id=&#x22;btn-controls&#x22; &#x3E;<BR>
&#x3C;a href=&#x22;/&#x22; class=&#x22;connect&#x22; id=&#x22;TZ1&#x22; &#x3E;TEST1&#x3C;/a&#x3E;<BR>
&#x3C;a href=&#x22;/&#x22; class=&#x22;connect&#x22; id=&#x22;TZ2&#x22; &#x3E;TEST2&#x3C;/a&#x3E;<BR>
&#x3C;a href=&#x22;/&#x22; class=&#x22;connect&#x22; id=&#x22;TZ3&#x22; &#x3E;TEST3&#x3C;/a&#x3E;<BR>
&#x3C;/nav&#x3E;<BR>
<BR>
&#x3C;div style=&#x22;min-height: 500px;&#x22; id=&#x22;bazinga&#x22; &#x3E;<BR>
STUFF WILL BE HERE&#x3C;BR&#x3E;<BR>
&#x3C;/div&#x3E;<BR>
<BR>
<BR>

[hyperfetch class="connect" initid=0 controlsid="btn-controls" containerid="bazinga" loadbr=30 ]<BR>
[hyperswitch tag="TZ1" url="/tzcontent1" menu="1" img="http://47.217.123.141:8080/wp-content/uploads/2020/02/USOutils_icon.svg" ]<BR>
[hyperswitch tag="TZ2" url="/tzcontent2" menu="1" ]<BR>
[hyperswitch tag="TZ3" url="/tzcontent3" menu="1" img="http://47.217.123.141:8080/wp-content/uploads/2020/02/USOutils_icon.svg" ]<BR>
[/hyperfetch] <BR>
