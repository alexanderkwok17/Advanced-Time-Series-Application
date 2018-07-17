<!DOCTYPE html>
<html>
<head>
<!-- 1.9.28 -->
<title>MATH5805-5144_00308: Assignment 1</title>
<link rel="shortcut icon" href="http://moodle.telt.unsw.edu.au/theme/image.php/unsw/theme/1407333028/favicon">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><script type="text/javascript">window.NREUM||(NREUM={}),__nr_require=function(t,n,e){function r(e){if(!n[e]){var o=n[e]={exports:{}};t[e][0].call(o.exports,function(n){var o=t[e][1][n];return r(o?o:n)},o,o.exports)}return n[e].exports}if("function"==typeof __nr_require)return __nr_require;for(var o=0;o<e.length;o++)r(e[o]);return r}({D5DuLP:[function(t,n){function e(t,n){var e=r[t];return e?e.apply(this,n):(o[t]||(o[t]=[]),void o[t].push(n))}var r={},o={};n.exports=e,e.queues=o,e.handlers=r},{}],handle:[function(t,n){n.exports=t("D5DuLP")},{}],G9z0Bl:[function(t,n){function e(){var t=l.info=NREUM.info;if(t&&t.agent&&t.licenseKey&&t.applicationID&&p&&p.body){l.proto="https"===f.split(":")[0]||t.sslForHttp?"https://":"http://",i("mark",["onload",a()]);var n=p.createElement("script");n.src=l.proto+t.agent,p.body.appendChild(n)}}function r(){"complete"===p.readyState&&o()}function o(){i("mark",["domContent",a()])}function a(){return(new Date).getTime()}var i=t("handle"),u=window,p=u.document,s="addEventListener",c="attachEvent",f=(""+location).split("?")[0],l=n.exports={offset:a(),origin:f,features:[]};p[s]?(p[s]("DOMContentLoaded",o,!1),u[s]("load",e,!1)):(p[c]("onreadystatechange",r),u[c]("onload",e)),i("mark",["firstbyte",a()])},{handle:"D5DuLP"}],loader:[function(t,n){n.exports=t("G9z0Bl")},{}]},{},["G9z0Bl"]);</script>
<meta name="keywords" content="moodle, MATH5805-5144_00308: Assignment 1" />
<script type="text/javascript">
//<![CDATA[
var M = {}; M.yui = {};
M.pageloadstarttime = new Date();
M.cfg = {"wwwroot":"http:\/\/moodle.telt.unsw.edu.au","sesskey":"QBTbeIUPRl","loadingicon":"http:\/\/moodle.telt.unsw.edu.au\/theme\/image.php\/unsw\/core\/1407333028\/i\/loading_small","themerev":"1407333028","slasharguments":1,"theme":"unsw","jsrev":"1407333028","svgicons":true};var yui1ConfigFn = function(me) {if(/-skin|reset|fonts|grids|base/.test(me.name)){me.type='css';me.path=me.path.replace(/\.js/,'.css');me.path=me.path.replace(/\/yui2-skin/,'/assets/skins/sam/yui2-skin');}};
var yui2ConfigFn = function(me) {var p = me.path, b = me.name.replace(/^moodle-/,'').split('-', 3), n = b.pop();if (/(skin|core)/.test(n)) {n = b.pop();me.type = 'css';};me.path = b.join('-')+'/'+n+'/'+n;if(me.type !== 'css'){me.path=me.path+'-min';};me.path=me.path+'.'+me.type;};
YUI_config = {"debug":false,"base":"http:\/\/moodle.telt.unsw.edu.au\/lib\/yuilib\/3.9.1\/build\/","comboBase":"http:\/\/moodle.telt.unsw.edu.au\/theme\/yui_combo.php?r1407333028&","combine":true,"filter":null,"insertBefore":"firstthemesheet","groups":{"yui2":{"base":"http:\/\/moodle.telt.unsw.edu.au\/lib\/yuilib\/2in3\/2.9.0\/build\/","comboBase":"http:\/\/moodle.telt.unsw.edu.au\/theme\/yui_combo.php?r1407333028&","combine":true,"ext":false,"root":"2in3\/2.9.0\/build\/","patterns":{"yui2-":{"group":"yui2","configFn":yui1ConfigFn}}},"moodle":{"name":"moodle","base":"http:\/\/moodle.telt.unsw.edu.au\/theme\/yui_combo.php?moodle\/1407333028\/","combine":true,"comboBase":"http:\/\/moodle.telt.unsw.edu.au\/theme\/yui_combo.php?r1407333028&","ext":false,"root":"moodle\/1407333028\/","patterns":{"moodle-":{"group":"moodle","configFn":yui2ConfigFn}},"modules":{"moodle-core-tooltip":{"requires":["base","node","io-base","moodle-core-notification","json-parse","widget-position","widget-position-align","event-outside","cache"]},"moodle-core-notification":{"requires":["base","node","panel","event-key","dd-plugin"]},"moodle-core-formchangechecker":{"requires":["base","event-focus"]},"moodle-core-blocks":{"requires":["base","node","io","dom","dd","dd-scroll","moodle-core-dragdrop","moodle-core-notification"]},"moodle-core-chooserdialogue":{"requires":["base","panel","moodle-core-notification"]},"moodle-core-formautosubmit":{"requires":["base","event-key"]},"moodle-core-popuphelp":{"requires":["moodle-core-tooltip"]},"moodle-calendar-eventmanager":{"requires":["base","node","event-mouseenter","overlay","moodle-calendar-eventmanager-skin"]},"moodle-mod_mediagallery-base":{"requires":["base","node","selector-css3","dd-constrain","dd-proxy","dd-drop","dd-plugin","moodle-core-notification"]},"moodle-mod_mediagallery-mediabox":{"requires":["base","node","selector-css3"]},"moodle-mod_quiz-autosave":{"requires":["base","node","event","event-valuechange","node-event-delegate","io-form"]},"moodle-block_navigation-navigation":{"requires":["base","core_dock","io-base","node","dom","event-custom","event-delegate","json-parse"]},"moodle-filter_glossary-autolinker":{"requires":["base","node","io-base","json-parse","event-delegate","overlay","moodle-core-notification"]},"moodle-editor_tinymce-collapse":{"requires":["base","node","dom"]},"moodle-format_grid-gridkeys":{"requires":["gallery-event-nav-keys"]},"moodle-gradereport_grader-scrollview":{"requires":["base","node"]},"moodle-theme_bootstrapbase-bootstrap":{"requires":["node","selector-css3"]}}}},"modules":{"core_filepicker":{"name":"core_filepicker","fullpath":"http:\/\/moodle.telt.unsw.edu.au\/lib\/javascript.php\/1407333028\/repository\/filepicker.js","requires":["base","node","node-event-simulate","json","async-queue","io-base","io-upload-iframe","io-form","yui2-treeview","panel","cookie","datatable","datatable-sort","resize-plugin","dd-plugin","escape","moodle-core_filepicker"]},"core_dock":{"name":"core_dock","fullpath":"http:\/\/moodle.telt.unsw.edu.au\/lib\/javascript.php\/1407333028\/blocks\/dock.js","requires":["base","node","event-custom","event-mouseenter","event-resize","escape"]}}};
M.yui.loader = {modules: {}};

//]]>
</script>
<script type="text/javascript" src="http://moodle.telt.unsw.edu.au/theme/yui_combo.php?r1407333028&3.9.1/build/simpleyui/simpleyui-min.js&amp;3.9.1/build/loader/loader-min.js"></script><script id="firstthemesheet" type="text/css">/** Required in order to fix style inclusion problems in IE with YUI **/</script><link rel="stylesheet" type="text/css" href="http://moodle.telt.unsw.edu.au/theme/styles.php/unsw/1407333028/all" />
<script type="text/javascript" src="http://moodle.telt.unsw.edu.au/lib/javascript.php/1407333028/lib/javascript-static.js"></script>
<script type="text/javascript" src="http://moodle.telt.unsw.edu.au/theme/javascript.php/unsw/1407333028/head"></script>
</head>
<body id="page-mod-resource-view" class="format-topics  path-mod path-mod-resource gecko dir-ltr lang-en yui-skin-sam yui3-skin-sam moodle-telt-unsw-edu-au pagelayout-incourse course-5069 context-724990 cmid-309497 category-13 category-6 category-5 side-pre-only has_custome_menu">
<div class="skiplinks"><a class="skip" href="#maincontent">Skip to main content</a></div>
<script type="text/javascript">
//<![CDATA[
document.body.className += ' jsenabled';
//]]>
</script>

<div id="nice_debug_area"></div><div id="page">
  <div id="page-header">
    <div id="logo" class="clearfix">
      <a class="unsw-moodle-logo" href="http://www.unsw.edu.au/">UNSW Moodle</a>
            <div class="page-header-container">
        <div class="page-header-category-name">
        School of Mathematics & Statistics<small>Faculty of Science</small>        </div>
      </div>
          </div>
        <div id="custommenu" class="clearfix"><div id="custom_menu_1" class="yui3-menu yui3-menu-horizontal javascript-disabled custom-menu"><div class="yui3-menu-content"><ul><li class="yui3-menuitem"><a class="yui3-menuitem-content" title="Moodle Home" href="http://moodle.telt.unsw.edu.au/?redirect=0">Moodle Home</a></li><li class="yui3-menuitem"><a class="yui3-menuitem-content" title="Announcements" href="http://moodle.telt.unsw.edu.au/mod/page/view.php?id=41448">Announcements</a></li><li class="yui3-menuitem"><a class="yui3-menuitem-content" title="User Guides" href="http://moodle.telt.unsw.edu.au/mod/page/view.php?id=41449">User Guides</a></li></ul></div></div></div>
        <div class="headermain"></div>
    <div id="page-heading" class="clearfix">
            <h1>Advanced Time Series (s1_2014)</h1>
                  <div class="navbutton"></div>
            <div class="logininfo">You are logged in as <a href="http://moodle.telt.unsw.edu.au/user/profile.php?id=44706" title="View profile">Alexander Kwok</a> (<a href="http://moodle.telt.unsw.edu.au/login/logout.php?sesskey=QBTbeIUPRl">Logout</a>)</div>    </div>
      </div>
    <div class="navbar clearfix">
    <div class="breadcrumb">
      <span class="accesshide">Page path</span><ul role="navigation"><li><a href="http://moodle.telt.unsw.edu.au/my/">My home</a></li><li> <span class="accesshide " ><span class="arrow_text">/</span>&nbsp;</span><span class="arrow sep">&#x25BA;</span> <a href="http://moodle.telt.unsw.edu.au/my/">My courses</a></li><li> <span class="accesshide " ><span class="arrow_text">/</span>&nbsp;</span><span class="arrow sep">&#x25BA;</span> <a href="http://moodle.telt.unsw.edu.au/course/index.php?categoryid=5">UNSWA - University of New South Wales</a></li><li> <span class="accesshide " ><span class="arrow_text">/</span>&nbsp;</span><span class="arrow sep">&#x25BA;</span> <a href="http://moodle.telt.unsw.edu.au/course/index.php?categoryid=6">SCI - Faculty of Science</a></li><li> <span class="accesshide " ><span class="arrow_text">/</span>&nbsp;</span><span class="arrow sep">&#x25BA;</span> <a href="http://moodle.telt.unsw.edu.au/course/index.php?categoryid=13">MATH - School of Mathematics &amp; Statistics</a></li><li> <span class="accesshide " ><span class="arrow_text">/</span>&nbsp;</span><span class="arrow sep">&#x25BA;</span> <a title="Advanced Time Series (s1_2014)" href="http://moodle.telt.unsw.edu.au/course/view.php?id=5069">MATH5805-5144_00308</a></li><li> <span class="accesshide " ><span class="arrow_text">/</span>&nbsp;</span><span class="arrow sep">&#x25BA;</span> <span tabindex="0">Assignments</span></li><li> <span class="accesshide " ><span class="arrow_text">/</span>&nbsp;</span><span class="arrow sep">&#x25BA;</span> <a title="File" href="http://moodle.telt.unsw.edu.au/mod/resource/view.php?id=309497" id="action_link53ec72ac1c97f2">Assignment 1</a></li></ul>    </div>
  </div>
    <div id="page-content" class="clearfix">
        <div class="page-side-content">
            <div id="region-pre" class="block-region">
        <div class="region-content">
          <a href="#sb-1" class="skip-block">Skip Navigation</a><div id="inst4" class="block_navigation  block" role="navigation" aria-labelledby="instance-4-header"><div class="header"><div class="title"><div class="block_action"></div><h2 id="instance-4-header">Navigation</h2></div></div><div class="content"><ul class="block_tree list"><li class="type_unknown depth_1 contains_branch" aria-expanded="true"><p class="tree_item branch canexpand navigation_node"><a href="http://moodle.telt.unsw.edu.au/my/">My home</a></p><ul><li class="type_setting depth_2 item_with_icon"><p class="tree_item leaf hasicon"><a href="http://moodle.telt.unsw.edu.au/?redirect=0"><img alt="" class="smallicon navicon" title="" src="http://moodle.telt.unsw.edu.au/theme/image.php/unsw/core/1407333028/i/navigationitem" />Site home</a></p></li>
<li class="type_course depth_2 collapsed contains_branch" aria-expanded="false"><p class="tree_item branch"><span title="UNSW Moodle" tabindex="0">Site pages</span></p><ul><li class="type_custom depth_3 item_with_icon"><p class="tree_item leaf hasicon"><a href="http://moodle.telt.unsw.edu.au/tag/search.php"><img alt="" class="smallicon navicon" title="" src="http://moodle.telt.unsw.edu.au/theme/image.php/unsw/core/1407333028/i/navigationitem" />Tags</a></p></li>
<li class="type_custom depth_3 item_with_icon"><p class="tree_item leaf hasicon"><a href="http://moodle.telt.unsw.edu.au/calendar/view.php?view=month"><img alt="" class="smallicon navicon" title="" src="http://moodle.telt.unsw.edu.au/theme/image.php/unsw/core/1407333028/i/navigationitem" />Calendar</a></p></li>
<li class="type_activity depth_3 item_with_icon"><p class="tree_item leaf hasicon"><a title="Forum" href="http://moodle.telt.unsw.edu.au/mod/forum/view.php?id=28993"><img alt="Forum" class="smallicon navicon" title="Forum" src="http://moodle.telt.unsw.edu.au/theme/image.php/unsw/forum/1407333028/icon" />Site news</a></p></li>
<li class="type_activity depth_3 item_with_icon"><p class="tree_item leaf hasicon"><a title="Page" href="http://moodle.telt.unsw.edu.au/mod/page/view.php?id=41448"><img alt="Page" class="smallicon navicon" title="Page" src="http://moodle.telt.unsw.edu.au/theme/image.php/unsw/page/1407333028/icon" />Announcements</a></p></li>
<li class="type_activity depth_3 item_with_icon"><p class="tree_item leaf hasicon"><a title="Page" href="http://moodle.telt.unsw.edu.au/mod/page/view.php?id=41449"><img alt="Page" class="smallicon navicon" title="Page" src="http://moodle.telt.unsw.edu.au/theme/image.php/unsw/page/1407333028/icon" />User Guides</a></p></li></ul></li>
<li class="type_user depth_2 collapsed contains_branch" aria-expanded="false"><p class="tree_item branch"><span tabindex="0">My profile</span></p><ul><li class="type_custom depth_3 item_with_icon"><p class="tree_item leaf hasicon"><a href="http://moodle.telt.unsw.edu.au/user/profile.php?id=44706"><img alt="" class="smallicon navicon" title="" src="http://moodle.telt.unsw.edu.au/theme/image.php/unsw/core/1407333028/i/navigationitem" />View profile</a></p></li>
<li class="type_custom depth_3 collapsed contains_branch" aria-expanded="false"><p class="tree_item branch"><span tabindex="0">Forum posts</span></p><ul><li class="type_custom depth_4 item_with_icon"><p class="tree_item leaf hasicon"><a href="http://moodle.telt.unsw.edu.au/mod/forum/user.php?id=44706"><img alt="" class="smallicon navicon" title="" src="http://moodle.telt.unsw.edu.au/theme/image.php/unsw/core/1407333028/i/navigationitem" />Posts</a></p></li>
<li class="type_custom depth_4 item_with_icon"><p class="tree_item leaf hasicon"><a href="http://moodle.telt.unsw.edu.au/mod/forum/user.php?id=44706&amp;mode=discussions"><img alt="" class="smallicon navicon" title="" src="http://moodle.telt.unsw.edu.au/theme/image.php/unsw/core/1407333028/i/navigationitem" />Discussions</a></p></li></ul></li>
<li class="type_unknown depth_3 collapsed contains_branch" aria-expanded="false"><p class="tree_item branch"><span tabindex="0">Blogs</span></p><ul><li class="type_custom depth_4 item_with_icon"><p class="tree_item leaf hasicon"><a href="http://moodle.telt.unsw.edu.au/blog/index.php?userid=44706"><img alt="" class="smallicon navicon" title="" src="http://moodle.telt.unsw.edu.au/theme/image.php/unsw/core/1407333028/i/navigationitem" />View all of my entries</a></p></li>
<li class="type_custom depth_4 item_with_icon"><p class="tree_item leaf hasicon"><a href="http://moodle.telt.unsw.edu.au/blog/edit.php?action=add"><img alt="" class="smallicon navicon" title="" src="http://moodle.telt.unsw.edu.au/theme/image.php/unsw/core/1407333028/i/navigationitem" />Add a new entry</a></p></li>
<li class="type_setting depth_4 item_with_icon"><p class="tree_item leaf hasicon"><a href="http://moodle.telt.unsw.edu.au/rss/file.php/1/a035efa3b6ab2cf97a82c543ebe8aa6a/blog/user/44706/rss.xml"><img alt="" class="smallicon navicon" title="" src="http://moodle.telt.unsw.edu.au/theme/image.php/unsw/core/1407333028/i/rss" />Blog RSS feed</a></p></li></ul></li>
<li class="type_setting depth_3 item_with_icon"><p class="tree_item leaf hasicon"><a href="http://moodle.telt.unsw.edu.au/message/index.php"><img alt="" class="smallicon navicon" title="" src="http://moodle.telt.unsw.edu.au/theme/image.php/unsw/core/1407333028/i/navigationitem" />Messages</a></p></li>
<li class="type_setting depth_3 item_with_icon"><p class="tree_item leaf hasicon"><a href="http://moodle.telt.unsw.edu.au/user/files.php"><img alt="" class="smallicon navicon" title="" src="http://moodle.telt.unsw.edu.au/theme/image.php/unsw/core/1407333028/i/navigationitem" />My private files</a></p></li>
<li class="type_custom depth_3 item_with_icon"><p class="tree_item leaf hasicon"><a href="http://moodle.telt.unsw.edu.au/repository/manage_instances.php?contextid=52203"><img alt="" class="smallicon navicon" title="" src="http://moodle.telt.unsw.edu.au/theme/image.php/unsw/core/1407333028/i/navigationitem" />Repositories</a></p></li></ul></li>
<li class="type_system depth_2 contains_branch" aria-expanded="true"><p class="tree_item branch"><span tabindex="0">Current course</span></p><ul><li class="type_course depth_3 contains_branch" aria-expanded="true"><p class="tree_item branch canexpand"><a title="Advanced Time Series (s1_2014)" href="http://moodle.telt.unsw.edu.au/course/view.php?id=5069">MATH5805-5144_00308</a></p><ul><li class="type_unknown depth_4 collapsed contains_branch" aria-expanded="false"><p class="tree_item branch"><a href="http://moodle.telt.unsw.edu.au/user/index.php?id=5069">Participants</a></p><ul><li class="type_user depth_5 collapsed contains_branch" aria-expanded="false"><p class="tree_item branch"><a href="http://moodle.telt.unsw.edu.au/user/view.php?id=44706&amp;course=5069">Alexander Kwok</a></p><ul><li class="type_custom depth_6 item_with_icon"><p class="tree_item leaf hasicon"><a href="http://moodle.telt.unsw.edu.au/user/view.php?id=44706&amp;course=5069"><img alt="" class="smallicon navicon" title="" src="http://moodle.telt.unsw.edu.au/theme/image.php/unsw/core/1407333028/i/navigationitem" />View profile</a></p></li>
<li class="type_custom depth_6 collapsed contains_branch" aria-expanded="false"><p class="tree_item branch"><span tabindex="0">Forum posts</span></p><ul><li class="type_custom depth_7 item_with_icon"><p class="tree_item leaf hasicon"><a href="http://moodle.telt.unsw.edu.au/mod/forum/user.php?id=44706&amp;course=5069"><img alt="" class="smallicon navicon" title="" src="http://moodle.telt.unsw.edu.au/theme/image.php/unsw/core/1407333028/i/navigationitem" />Posts</a></p></li>
<li class="type_custom depth_7 item_with_icon"><p class="tree_item leaf hasicon"><a href="http://moodle.telt.unsw.edu.au/mod/forum/user.php?id=44706&amp;course=5069&amp;mode=discussions"><img alt="" class="smallicon navicon" title="" src="http://moodle.telt.unsw.edu.au/theme/image.php/unsw/core/1407333028/i/navigationitem" />Discussions</a></p></li></ul></li>
<li class="type_unknown depth_6 collapsed contains_branch" aria-expanded="false"><p class="tree_item branch"><span tabindex="0">Blogs</span></p><ul><li class="type_custom depth_7 item_with_icon"><p class="tree_item leaf hasicon"><a href="http://moodle.telt.unsw.edu.au/blog/index.php?userid=44706"><img alt="" class="smallicon navicon" title="" src="http://moodle.telt.unsw.edu.au/theme/image.php/unsw/core/1407333028/i/navigationitem" />View all of my entries</a></p></li>
<li class="type_custom depth_7 item_with_icon"><p class="tree_item leaf hasicon"><a href="http://moodle.telt.unsw.edu.au/blog/edit.php?action=add"><img alt="" class="smallicon navicon" title="" src="http://moodle.telt.unsw.edu.au/theme/image.php/unsw/core/1407333028/i/navigationitem" />Add a new entry</a></p></li>
<li class="type_setting depth_7 item_with_icon"><p class="tree_item leaf hasicon"><a href="http://moodle.telt.unsw.edu.au/rss/file.php/1/a035efa3b6ab2cf97a82c543ebe8aa6a/blog/user/44706/rss.xml"><img alt="" class="smallicon navicon" title="" src="http://moodle.telt.unsw.edu.au/theme/image.php/unsw/core/1407333028/i/rss" />Blog RSS feed</a></p></li></ul></li>
<li class="type_setting depth_6 item_with_icon"><p class="tree_item leaf hasicon"><a href="http://moodle.telt.unsw.edu.au/message/index.php"><img alt="" class="smallicon navicon" title="" src="http://moodle.telt.unsw.edu.au/theme/image.php/unsw/core/1407333028/i/navigationitem" />Messages</a></p></li>
<li class="type_setting depth_6 item_with_icon"><p class="tree_item leaf hasicon"><a href="http://moodle.telt.unsw.edu.au/user/files.php"><img alt="" class="smallicon navicon" title="" src="http://moodle.telt.unsw.edu.au/theme/image.php/unsw/core/1407333028/i/navigationitem" />My private files</a></p></li>
<li class="type_custom depth_6 item_with_icon"><p class="tree_item leaf hasicon"><a href="http://moodle.telt.unsw.edu.au/repository/manage_instances.php?contextid=52203"><img alt="" class="smallicon navicon" title="" src="http://moodle.telt.unsw.edu.au/theme/image.php/unsw/core/1407333028/i/navigationitem" />Repositories</a></p></li></ul></li></ul></li>
<li class="type_structure depth_4 collapsed contains_branch" aria-expanded="false"><p class="tree_item branch" id="expandable_branch_30_61687"><span tabindex="0">General Information</span></p></li>
<li class="type_structure depth_4 collapsed contains_branch" aria-expanded="false"><p class="tree_item branch" id="expandable_branch_30_63377"><span tabindex="0">Lectures</span></p></li>
<li class="type_structure depth_4 contains_branch" aria-expanded="true"><p class="tree_item branch"><span tabindex="0">Assignments</span></p><ul><li class="type_activity depth_5 item_with_icon current_branch"><p class="tree_item leaf hasicon active_tree_node"><a title="File" href="http://moodle.telt.unsw.edu.au/mod/resource/view.php?id=309497" id="action_link53ec72ac1c97f1"><img alt="File" class="smallicon navicon" title="File" src="http://moodle.telt.unsw.edu.au/theme/image.php/unsw/core/1407333028/f/pdf-24" />Assignment 1</a></p></li>
<li class="type_activity depth_5 item_with_icon"><p class="tree_item leaf hasicon"><a title="Folder" href="http://moodle.telt.unsw.edu.au/mod/folder/view.php?id=323070"><img alt="Folder" class="smallicon navicon" title="Folder" src="http://moodle.telt.unsw.edu.au/theme/image.php/unsw/folder/1407333028/icon" />Assignment 2</a></p></li>
<li class="type_activity depth_5 item_with_icon"><p class="tree_item leaf hasicon"><a title="Folder" href="http://moodle.telt.unsw.edu.au/mod/folder/view.php?id=343242"><img alt="Folder" class="smallicon navicon" title="Folder" src="http://moodle.telt.unsw.edu.au/theme/image.php/unsw/folder/1407333028/icon" />Assignment 3</a></p></li></ul></li>
<li class="type_structure depth_4 collapsed contains_branch" aria-expanded="false"><p class="tree_item branch" id="expandable_branch_30_63378"><span tabindex="0">R and S+Finmetrics Material</span></p></li>
<li class="type_structure depth_4 collapsed contains_branch" aria-expanded="false"><p class="tree_item branch" id="expandable_branch_30_63375"><span tabindex="0">Course Information</span></p></li>
<li class="type_structure depth_4 collapsed contains_branch" aria-expanded="false"><p class="tree_item branch" id="expandable_branch_30_63380"><span tabindex="0">Assumed Knowledge</span></p></li></ul></li></ul></li>
<li class="type_system depth_2 collapsed contains_branch" aria-expanded="false"><p class="tree_item branch" id="expandable_branch_0_mycourses"><a href="http://moodle.telt.unsw.edu.au/my/">My courses</a></p></li></ul></li></ul></div></div><span id="sb-1" class="skip-block-to"></span><a href="#sb-2" class="skip-block">Skip Settings</a><div id="inst5" class="block_settings  block" role="navigation" aria-labelledby="instance-5-header"><div class="header"><div class="title"><div class="block_action"></div><h2 id="instance-5-header">Settings</h2></div></div><div class="content"><div id="settingsnav" class="box block_tree_box"><ul class="block_tree list"><li class="type_course collapsed contains_branch" aria-expanded="false"><p class="tree_item branch root_node"><span tabindex="0">Course administration</span></p><ul><li class="type_setting collapsed item_with_icon"><p class="tree_item leaf"><a href="http://moodle.telt.unsw.edu.au/grade/report/index.php?id=5069"><img alt="" class="smallicon navicon" title="" src="http://moodle.telt.unsw.edu.au/theme/image.php/unsw/core/1407333028/i/grades" />Grades</a></p></li></ul></li>
<li class="type_unknown collapsed contains_branch" aria-expanded="false"><hr /><p class="tree_item branch root_node" id="usersettings"><span tabindex="0">My profile settings</span></p><ul><li class="type_setting collapsed item_with_icon"><p class="tree_item leaf"><a href="http://moodle.telt.unsw.edu.au/user/edit.php?id=44706&amp;course=5069"><img alt="" class="smallicon navicon" title="" src="http://moodle.telt.unsw.edu.au/theme/image.php/unsw/core/1407333028/i/navigationitem" />Edit profile</a></p></li>
<li class="type_setting collapsed item_with_icon"><p class="tree_item leaf"><a href="http://moodle.telt.unsw.edu.au/user/managetoken.php?sesskey=QBTbeIUPRl"><img alt="" class="smallicon navicon" title="" src="http://moodle.telt.unsw.edu.au/theme/image.php/unsw/core/1407333028/i/navigationitem" />Security keys</a></p></li>
<li class="type_setting collapsed item_with_icon"><p class="tree_item leaf"><a href="http://moodle.telt.unsw.edu.au/message/edit.php?id=44706"><img alt="" class="smallicon navicon" title="" src="http://moodle.telt.unsw.edu.au/theme/image.php/unsw/core/1407333028/i/navigationitem" />Messaging</a></p></li>
<li class="type_unknown collapsed contains_branch" aria-expanded="false"><p class="tree_item branch"><span tabindex="0">Blogs</span></p><ul><li class="type_setting collapsed item_with_icon"><p class="tree_item leaf"><a href="http://moodle.telt.unsw.edu.au/blog/preferences.php"><img alt="" class="smallicon navicon" title="" src="http://moodle.telt.unsw.edu.au/theme/image.php/unsw/core/1407333028/i/navigationitem" />Preferences</a></p></li>
<li class="type_setting collapsed item_with_icon"><p class="tree_item leaf"><a href="http://moodle.telt.unsw.edu.au/blog/external_blogs.php"><img alt="" class="smallicon navicon" title="" src="http://moodle.telt.unsw.edu.au/theme/image.php/unsw/core/1407333028/i/navigationitem" />External blogs</a></p></li>
<li class="type_setting collapsed item_with_icon"><p class="tree_item leaf"><a href="http://moodle.telt.unsw.edu.au/blog/external_blog_edit.php"><img alt="" class="smallicon navicon" title="" src="http://moodle.telt.unsw.edu.au/theme/image.php/unsw/core/1407333028/i/navigationitem" />Register an external blog</a></p></li></ul></li>
<li class="type_setting collapsed item_with_icon"><p class="tree_item leaf"><a href="http://moodle.telt.unsw.edu.au/local/userpolicy/index.php"><img alt="" class="smallicon navicon" title="" src="http://moodle.telt.unsw.edu.au/theme/image.php/unsw/core/1407333028/i/navigationitem" />Privacy Settings</a></p></li></ul></li></ul></div></div></div><span id="sb-2" class="skip-block-to"></span>        </div>
      </div>
                </div>
        <div id="region-main-wrap" class="page-main-content">
      <div id="region-main" class="clearfix">
        <div class="region-content">
        <div role="main"><span id="maincontent"></span><h2 id="resourceheading" class="main">Assignment 1</h2><div id="resourceintro" class="box mod_introbox"><div class="no-overflow"><p>Now Due MARCH 26.</p></div><p class="resourcedetails">119.5KB PDF document</p></div><div class="resourceworkaround">Click <a href="http://moodle.telt.unsw.edu.au/pluginfile.php/724990/mod_resource/content/1/Assignment_1_MATH5805_2014_S1.pdf" onclick="window.open('http://moodle.telt.unsw.edu.au/pluginfile.php/724990/mod_resource/content/1/Assignment_1_MATH5805_2014_S1.pdf', '', 'width=620,height=450,toolbar=no,location=no,menubar=no,copyhistory=no,status=no,directories=no,scrollbars=yes,resizable=yes'); return false;">Assignment_1_MATH5805_2014_S1.pdf</a> link to view the file.</div></div>        </div>
      </div>
    </div>
  </div>
  <div id="footer-push"></div>
</div>
<div id="footer">
  <div class="clearfix">
    <div class="footer-side-content">
      <div class="homelink"><a href="http://moodle.telt.unsw.edu.au/course/view.php?id=5069">MATH5805-5144_00308</a></div>    </div>
    <div class="footer-main-content">
      <ul id="footer-menu" class="unstyled">
        <li><a href="http://www.unsw.edu.au/privacy" target="_blank">Privacy</a></li>
        <li><a href="http://research.unsw.edu.au/content-and-social-media-disclaimer" target="_blank">Content &amp; Social Media Disclaimer</a></li>
        <li><a href="http://www.unsw.edu.au/copyright-disclaimer" target="_blank">Copyright &amp; Disclaimer</a></li>
        <li><a href="http://www.unsw.edu.au/accessibility" target="_blank">Accessibility</a></li>
        <li><a href="http://www.unsw.edu.au/sitemap" target="_blank">Site Map</a></li>
        <li></li>
      </ul>
      <div class="logininfo">You are logged in as <a href="http://moodle.telt.unsw.edu.au/user/profile.php?id=44706" title="View profile">Alexander Kwok</a> (<a href="http://moodle.telt.unsw.edu.au/login/logout.php?sesskey=QBTbeIUPRl">Logout</a>)</div>    </div>
  </div>
  <div class="clearfix">
    <div id="page-footer">
      <div class="footer-side-content">
        <a href="http://www.unsw.edu.au/" target="_blank" class="footer-logo"></a>
      </div>
      <div class="footer-main-content">
        <p>UNSW staff and students experiencing difficulties using Moodle? Contact External TELT Support for assistance.</p>
        <address>
          Email: <a href="mailto:externalteltsupport@unsw.edu.au">externalteltsupport@unsw.edu.au</a><br>
          Internal: x53331<br>
          External: 9385 3331<br>
          International: +61 2 9385 3331
        </address>
        <p>Page last updated Wednesday 6 August 2014<br>UNSW CRICOS Provider Code 00098G, ABN 57 195 873 179 | Sydney, NSW.2052, Australia</p>
        <a href="#" class="back-to-top">Back to top</a>
        
<script type="text/javascript"> 
//<![CDATA[ 

var _gaq = _gaq || []; 
_gaq.push(['_setAccount', 'UA-9972453-8']); 
_gaq.push(['_trackPageview']); 

(function() { 
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true; 
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js'; 
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s); 
})(); 

//]]> 
</script><div id="ns_uniqueid" style="display:none;">ns_uniqueid: 00000000:AE17_00000000:0050_53EC72AB_180C524:53C5</div>      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="http://moodle.telt.unsw.edu.au/lib/javascript.php/1407333028/lib/session-timeout.js"></script>
<script type="text/javascript">
//<![CDATA[
M.str = {"moodle":{"lastmodified":"Last modified","name":"Name","error":"Error","info":"Information","filetoolarge":"is too large to upload","viewallcourses":"View all courses","morehelp":"More help","loadinghelp":"Loading...","cancel":"Cancel","yes":"Yes"},"repository":{"type":"Type","size":"Size","invalidjson":"Invalid JSON string","nofilesattached":"No files attached","filepicker":"File picker","logout":"Logout","nofilesavailable":"No files available","norepositoriesavailable":"Sorry, none of your current repositories can return files in the required format.","fileexistsdialogheader":"File exists","fileexistsdialog_editor":"A file with that name has already been attached to the text you are editing.","fileexistsdialog_filemanager":"A file with that name has already been attached","renameto":"Rename to \"{$a}\"","referencesexist":"There are {$a} alias\/shortcut files that use this file as their source","select":"Select"},"block":{"addtodock":"Move this to the dock","undockitem":"Undock this item","dockblock":"Dock {$a} block","undockblock":"Undock {$a} block","undockall":"Undock all","hidedockpanel":"Hide the dock panel","hidepanel":"Hide panel"},"langconfig":{"thisdirectionvertical":"btt"},"admin":{"confirmation":"Confirmation"}};
//]]>
</script>
<script type="text/javascript">
//<![CDATA[
var navtreeexpansions4 = [{"id":"expandable_branch_30_61687","key":"61687","type":30},{"id":"expandable_branch_30_63377","key":"63377","type":30},{"id":"expandable_branch_30_63378","key":"63378","type":30},{"id":"expandable_branch_30_63375","key":"63375","type":30},{"id":"expandable_branch_30_63380","key":"63380","type":30},{"id":"expandable_branch_0_mycourses","key":"mycourses","type":0}];
//]]>
</script>
<script type="text/javascript">
//<![CDATA[
YUI().use('node', function(Y) {
M.util.load_flowplayer();
setTimeout("fix_column_widths()", 20);
watchTimeout(Y, "7200");
function legacy_activity_onclick_handler_1(e) { e.halt(); window.open('http://moodle.telt.unsw.edu.au/mod/resource/view.php?id=309497&redirect=1', '', 'width=620,height=450,toolbar=no,location=no,menubar=no,copyhistory=no,status=no,directories=no,scrollbars=yes,resizable=yes'); return false; };
M.yui.galleryversion="2010.04.08-12-35";Y.use("core_dock","moodle-block_navigation-navigation",function() {M.block_navigation.init_add_tree({"id":"4","instance":"4","candock":true,"courselimit":"20","expansionlimit":0});
});
M.yui.galleryversion="2010.04.08-12-35";Y.use("core_dock","moodle-block_navigation-navigation",function() {M.block_navigation.init_add_tree({"id":"5","instance":"5","candock":true});
});
M.yui.galleryversion="2010.04.08-12-35";Y.use("node-menunav",function() {(function(){M.core_custom_menu.init(Y, "custom_menu_1");
})();
});
M.util.help_popups.setup(Y);
M.yui.galleryversion="2010.04.08-12-35";Y.use("moodle-core-popuphelp",function() {M.core.init_popuphelp();
});
Y.on('domready', function() { M.util.move_debug_messages(Y); });
Y.on('domready', function() { M.util.netspot_perf_info(Y, "00000000:AE17_00000000:0050_53EC72AB_180C524:53C5", 1408004779.9763); });
M.util.init_block_hider(Y, {"id":"inst4","title":"Navigation","preference":"block4hidden","tooltipVisible":"Hide Navigation block","tooltipHidden":"Show Navigation block"});
M.util.init_block_hider(Y, {"id":"inst5","title":"Settings","preference":"block5hidden","tooltipVisible":"Hide Settings block","tooltipHidden":"Show Settings block"});
M.yui.galleryversion="2010.04.08-12-35";Y.use("moodle-filter_glossary-autolinker",function() {M.filter_glossary.init_filter_autolinking({"courseid":0});
});
Y.on('click', legacy_activity_onclick_handler_1, "#action_link53ec72ac1c97f1", null);
Y.on('click', legacy_activity_onclick_handler_1, "#action_link53ec72ac1c97f2", null);

});
//]]>
</script>
<script type="text/javascript">window.NREUM||(NREUM={});NREUM.info={"beacon":"beacon-2.newrelic.com","licenseKey":"d6bb71fb66","applicationID":"3373542,3377726","transactionName":"YVMHYkVQWkIAUERQDFgZMEReHlleBRxCXBBZQxdVUh5CWAREHkkLRg==","queueTime":0,"applicationTime":219,"ttGuid":"","agentToken":"","userAttributes":"","errorBeacon":"bam.nr-data.net","agent":"js-agent.newrelic.com\/nr-411.min.js"}</script></body>
</html>
