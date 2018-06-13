<?php echo 'Theme by Jeaviking  http://www.jeavi.name';exit;?>
<!--{subtemplate common/header_common}-->
<meta name="application-name" content="$_G['setting']['bbname']" />
<meta name="msapplication-tooltip" content="$_G['setting']['bbname']" />
<!--{if $_G['setting']['portalstatus']}-->
<meta name="msapplication-task" content="name=$_G['setting']['navs'][1]['navname'];action-uri={echo !empty($_G['setting']['domain']['app']['portal']) ? 'http://'.$_G['setting']['domain']['app']['portal'] : $_G[siteurl].'portal.php'};icon-uri={$_G[siteurl]}{IMGDIR}/portal.ico" />
<!--{/if}-->
<meta name="msapplication-task" content="name=$_G['setting']['navs'][2]['navname'];action-uri={echo !empty($_G['setting']['domain']['app']['forum']) ? 'http://'.$_G['setting']['domain']['app']['forum'] : $_G[siteurl].'forum.php'};icon-uri={$_G[siteurl]}{IMGDIR}/bbs.ico" />
<!--{if $_G['setting']['groupstatus']}-->
<meta name="msapplication-task" content="name=$_G['setting']['navs'][3]['navname'];action-uri={echo !empty($_G['setting']['domain']['app']['group']) ? 'http://'.$_G['setting']['domain']['app']['group'] : $_G[siteurl].'group.php'};icon-uri={$_G[siteurl]}{IMGDIR}/group.ico" />
<!--{/if}-->
<!--{if helper_access::check_module('feed')}-->
<meta name="msapplication-task" content="name=$_G['setting']['navs'][4]['navname'];action-uri={echo !empty($_G['setting']['domain']['app']['home']) ? 'http://'.$_G['setting']['domain']['app']['home'] : $_G[siteurl].'home.php'};icon-uri={$_G[siteurl]}{IMGDIR}/home.ico" />
<!--{/if}-->
<!--{if $_G['basescript'] == 'forum' && $_G['setting']['archiver']}-->
<link rel="archives" title="$_G['setting']['bbname']" href="{$_G[siteurl]}archiver/" />
<!--{/if}-->
<!--{if !empty($rsshead)}-->
$rsshead<!--{/if}-->
<!--{if widthauto()}-->

<link rel="stylesheet" id="css_widthauto" type="text/css" href="data/cache/style_{STYLEID}_widthauto.css?{VERHASH}" />
<script type="text/javascript">HTMLNODE.className += ' widthauto'</script>
<!--{/if}-->
<!--{if $_G['basescript'] == 'forum' || $_G['basescript'] == 'group'}-->
<script type="text/javascript" src="{$_G[setting][jspath]}forum.js?{VERHASH}"></script>
<!--{elseif $_G['basescript'] == 'home' || $_G['basescript'] == 'userapp'}-->
<script type="text/javascript" src="{$_G[setting][jspath]}home.js?{VERHASH}"></script>
<!--{elseif $_G['basescript'] == 'portal'}-->
<script type="text/javascript" src="{$_G[setting][jspath]}portal.js?{VERHASH}"></script>
<!--{/if}-->
<!--{if $_G['basescript'] != 'portal' && $_GET['diy'] == 'yes' && check_diy_perm($topic)}-->
<script type="text/javascript" src="{$_G[setting][jspath]}portal.js?{VERHASH}"></script>
<!--{/if}-->
<!--{if $_GET['diy'] == 'yes' && check_diy_perm($topic)}-->
<link rel="stylesheet" type="text/css" id="diy_common" href="data/cache/style_{STYLEID}_css_diy.css?{VERHASH}" />
<!--{/if}-->



</head>
<body id="nv_{$_G[basescript]}" class="pg_{CURMODULE}{if $_G['basescript'] === 'portal' && CURMODULE === 'list' && !empty($cat)} {$cat['bodycss']}{/if}" onkeydown="if(event.keyCode==27) return false;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<!--{if $_GET['diy'] == 'yes' && check_diy_perm($topic)}--> 
<!--{template common/header_diy}--> 
<!--{/if}--> 
<!--{if check_diy_perm($topic)}--> 
<!--{template common/header_diynav}--> 
<!--{/if}--> 
<!--{if CURMODULE == 'topic' && $topic && empty($topic['useheader']) && check_diy_perm($topic)}--> 
$diynav 
<!--{/if}--> 
<!--{if empty($topic) || $topic['useheader']}--> 
<!--{if $_G['setting']['mobile']['allowmobile'] && (!$_G['setting']['cacheindexlife'] && !$_G['setting']['cachethreadon'] || $_G['uid']) && ($_GET['diy'] != 'yes' || !$_GET['inajax']) && ($_G['mobile'] != '' && $_G['cookie']['mobile'] == '' && $_GET['mobile'] != 'no')}-->
<div class="xi1 bm bm_c"> {lang your_mobile_browser}<a href="{$_G['siteurl']}forum.php?mobile=yes">{lang go_to_mobile}</a> <span class="xg1">|</span> <a href="$_G['setting']['mobile']['nomobileurl']">{lang to_be_continue}</a> </div>
<!--{/if}--> 
<!--{if $_G['setting']['shortcut'] && $_G['member'][credits] >= $_G['setting']['shortcut']}-->
<div id="shortcut"> <span><a href="javascript:;" id="shortcutcloseid" title="{lang close}">{lang close}</a></span> {lang shortcut_notice} <a href="javascript:;" id="shortcuttip">{lang shortcut_add}</a> </div>
<script type="text/javascript">setTimeout(setShortcut, 2000);</script> 
<!--{/if}-->


<!--{if $_GET['diy'] == 'yes' && check_diy_perm($topic)}-->
<style>
.header_fake {height: 30px;_height: 0;_display: none;}
</style>

<script type="text/javascript">

</script> 

<!--{/if}--> 

<div id="headnav" {if $_GET['diy'] == 'yes' && check_diy_perm($topic)}class="hide"{/if}>

<div id="toptb" class="cl">
  <div class="wp">
  
  
     <!-- search begin -->
 <!--{subtemplate common/pubsearchform}-->
    <!-- search end -->
  
  
    <div class="z"> 
    <div style=" display:none;">
      <!--{loop $_G['setting']['topnavs'][0] $nav}--> 
      <!--{if $nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))}-->$nav[code]<!--{/if}--> 
      <!--{/loop}--> 
      
       <!--{loop $_G['setting']['topnavs'][1] $nav}--> 
      <!--{if $nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))}-->$nav[code]<!--{/if}--> 
      <!--{/loop}--> 
      <a id="switchblind" href="javascript:;" onClick="toggleBlind(this)" title="{lang switch_blind}" class="switchblind">{lang switch_blind}</a> 
      </div>

      <!--{if empty($_G['disabledwidthauto']) && $_G['setting']['switchwidthauto']}--> 
      <a href="javascript:;" id="switchwidth" onClick="widthauto(this)" title="{if widthauto()}{lang switch_narrow}{else}{lang switch_wide}{/if}" class="switchwidth"><!--{if widthauto()}-->{lang switch_narrow}<!--{else}-->{lang switch_wide}<!--{/if}--></a> 
      <!--{/if}--> 
      <!--{if !empty($_G['style']['extstyle'])}--><a id="sslct" href="javascript:;" onMouseOver="delayShow(this, function() {showMenu({'ctrlid':'sslct','pos':'34!'})});">{lang changestyle}</a><!--{/if}--> 
      <!--{if check_diy_perm($topic)}--> 
      $diynav 
      <!--{/if}--> 
      <!--{hook/global_cpnav_extra1}-->
      <!--{hook/global_cpnav_extra2}--> 
    </div>
    

    <!-- user info begin -->
    <div class="userbox"> 
      <!--{if $_G['uid']}-->
      <ul class="usernav">
        <li class="user_list"><a id="nte_menu" href="home.php?mod=space&do=notice" class="user_link notification"><i></i><!--{if $_G[member][newprompt]}--><span class="unread_num png">$_G[member][newprompt]</span><!--{/if}--></a> </li>
        <li class="user_list msg"> <a id="msg_menu" href="home.php?mod=space&do=pm" class="user_link msg"><i></i><!--{if $_G[member][newpm]}--><span class="unread_num png">{$_G[member][newpm]}</span><!--{/if}--></a> </li>
      </ul>
      <a href="home.php?mod=space&uid=$_G[uid]" title="{$_G[member][username]}" class="userinfo" id="m" onMouseOver="showMenu({'ctrlid':'m','pos':'34!','ctrlclass':'hover','duration':2});"> <span class="user_avt"><!--{avatar($_G[uid],small)}--></span><i class="arrow"></i> </a> 
      
      <!--{elseif !empty($_G['cookie']['loginuser'])}-->
      <ul class="usernav user_part">
        <li class="user_list"><a id="loginuser" class="user_link"><!--{echo dhtmlspecialchars($_G['cookie']['loginuser'])}--></a></li>
        <li class="user_list"><a class="user_link" href="member.php?mod=logging&action=login" onClick="showWindow('login', this.href)">{lang activation}</a></li>
        <li class="user_list"><a class="user_link" href="member.php?mod=logging&action=logout&formhash={FORMHASH}">{lang logout}</a></li>
      </ul>
      <!--{elseif !$_G[connectguest]}-->
      <ul class="usernav user_part">
        <li class="user_list"><a href="javascript:;" onClick="javascript:lsSubmit();" class="user_link">{lang login}</a></li>
        <li class="user_list"><a href="member.php?mod={$_G[setting][regname]}" class="user_link">$_G['setting']['reglinkname']</a></li>
        
        <!-- 第三方登录位置 -->
        <li class="user_list"><a href="connect.php?mod=login&amp;op=init&amp;referer=forum.php&amp;statfrom=login"><i class="i_qq">腾讯QQ</i></a></li>
        <li class="user_list"><a href="plugin.php?id=ljxlwb&opp=in"><i class="i_wb">微博登录</i></a></li>
      </ul>
      <div style="display:none"><!--{template member/login_simple}--></div>
      <!--{else}-->
      <ul class="usernav user_part">
        <li class="user_list"><a href="home.php?mod=spacecp&ac=usergroup" class="user_link">{$_G[member][username]}</a></li>
        <li class="user_list"><a href="member.php?mod=logging&action=logout&formhash={FORMHASH}" class="user_link">{lang logout}</a></li>
      </ul>
      <!--{/if}--> 
     </div> 
    <!-- user info end -->

    
  </div>
</div>

    
<div class="header"> 
  <div class="hdr">
  <div class="wp cl"> 
  <!--{hook/global_cpnav_top}-->
    <!-- 站点LOGO -->
    <div class="hd_logo"> 
      <!--{eval $mnid = getcurrentnav();}-->
      <!--{if !isset($_G['setting']['navlogos'][$mnid])}--><a href="{if $_G['setting']['domain']['app']['default']}http://{$_G['setting']['domain']['app']['default']}/{else}./{/if}" title="$_G['setting']['bbname']">{$_G['style']['boardlogo']}</a><!--{else}-->$_G['setting']['navlogos'][$mnid]<!--{/if}-->
    </div>
    
    
    <div class="nav">
      <ul>
        <!--{loop $_G['setting']['navs'] $nav}--> 
        <!--{if $nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))}-->
        <li {if $mnid == $nav[navid]}class="a" {/if}$nav[nav]></li>
        <!--{/if}--> 
        <!--{/loop}-->
      </ul>
      <!--{hook/global_nav_extra}--> 
    </div>
    </div> 
</div></div>
</div>
<div class="header_fake"></div>



<!--{if !IS_ROBOT}--> 
<!--{if $_G['uid']}-->
<ul id="myprompt_menu" class="p_pop" style="display: none;">
  <li><a href="home.php?mod=space&do=pm" id="pm_ntc" style="background-repeat: no-repeat; background-position: 0 50%;"><em class="prompt_news{if empty($_G[member][newpm])}_0{/if}"></em>{lang pm_center}</a></li>
  <li><a href="home.php?mod=follow&do=follower"><em class="prompt_follower{if empty($_G[member][newprompt_num][follower])}_0{/if}"></em><!--{lang notice_interactive_follower}-->{if $_G[member][newprompt_num][follower]}($_G[member][newprompt_num][follower]){/if}</a></li>
  
  <!--{if $_G[member][newprompt] && $_G[member][newprompt_num][follow]}-->
  <li><a href="home.php?mod=follow"><em class="prompt_concern"></em><!--{lang notice_interactive_follow}-->($_G[member][newprompt_num][follow])</a></li>
  <!--{/if}--> 
  <!--{if $_G[member][newprompt]}--> 
  <!--{loop $_G['member']['category_num'] $key $val}-->
  <li><a href="home.php?mod=space&do=notice&view=$key"><em class="notice_$key"></em><!--{echo lang('template', 'notice_'.$key)}-->(<span class="rq">$val</span>)</a></li>
  <!--{/loop}--> 
  <!--{/if}--> 
  <!--{if empty($_G['cookie']['ignore_notice'])}-->
  <li class="ignore_noticeli"><a href="javascript:;" onClick="setcookie('ignore_notice', 1);hideMenu('myprompt_menu')" title="{lang temporarily_to_remind}"><em class="ignore_notice"></em></a></li>
  <!--{/if}-->
</ul>
<!--{/if}--> 
<!--{if !empty($_G['style']['extstyle'])}-->
<div id="sslct_menu" class="cl p_pop" style="display: none;"> 
  <!--{if !$_G[style][defaultextstyle]}--><span class="sslct_btn" onClick="extstyle('')" title="{lang default}"><i></i></span><!--{/if}--> 
  <!--{loop $_G['style']['extstyle'] $extstyle}--> 
  <span class="sslct_btn" onClick="extstyle('$extstyle[0]')" title="$extstyle[1]"><i style='background:$extstyle[2]'></i></span> 
  <!--{/loop}--> 
</div>
<!--{/if}--> 
<!--{subtemplate common/header_qmenu}--> 
<!--{/if}--> 


<!-- 二级导航 --> 
<!--{if !empty($_G['setting']['plugins']['jsmenu'])}-->
<ul class="p_pop h_pop" id="plugin_menu" style="display: none">
  <!--{loop $_G['setting']['plugins']['jsmenu'] $module}--> 
  <!--{if !$module['adminid'] || ($module['adminid'] && $_G['adminid'] > 0 && $module['adminid'] >= $_G['adminid'])}-->
  <li>$module[url]</li>
  <!--{/if}--> 
  <!--{/loop}-->
</ul>
<!--{/if}-->
<div class="sub_nav"> $_G[setting][menunavs] </div>
<ul class="sub_menu" id="m_menu" style="display: none;">
  <!--{if check_diy_perm($topic)}-->
  <li><a href="javascript:openDiy();" title="{lang open_diy}">打开DIY</a></li>
  <!--{/if}-->
  
  <li><!--{hook/global_usernav_extra1}--></li>
  <li><!--{hook/global_usernav_extra2}--></li>
  <li><!--{hook/global_usernav_extra3}--></li>
	<!--{loop $_G['setting']['mynavs'] $nav}-->
		<!--{if $nav['available'] && (!$nav['level'] || ($nav['level'] == 1 && $_G['uid']) || ($nav['level'] == 2 && $_G['adminid'] > 0) || ($nav['level'] == 3 && $_G['adminid'] == 1))}-->
			<li>$nav[code]</li>
		<!--{/if}-->
	<!--{/loop}-->
  <!--{hook/global_usernav_extra3}-->
  <li><a href="home.php?mod=spacecp">{lang setup}</a></li>
  <!--{if ($_G['group']['allowmanagearticle'] || $_G['group']['allowpostarticle'] || $_G['group']['allowdiy'] || getstatus($_G['member']['allowadmincp'], 4) || getstatus($_G['member']['allowadmincp'], 6) || getstatus($_G['member']['allowadmincp'], 2) || getstatus($_G['member']['allowadmincp'], 3))}-->
  <li><a href="portal.php?mod=portalcp"><!--{if $_G['setting']['portalstatus'] }-->{lang portal_manage}<!--{else}-->{lang portal_block_manage}<!--{/if}--></a></li>
  <!--{/if}--> 
  <!--{if $_G['uid'] && $_G['group']['radminid'] > 1}-->
  <li><a href="forum.php?mod=modcp&fid=$_G[fid]" target="_blank">{lang forum_manager}</a></li>
  <!--{/if}--> 
  <!--{if $_G['uid'] && $_G['adminid'] == 1 && $_G['setting']['cloud_status']}-->
  <li><a href="admin.php?frames=yes&action=cloud&operation=applist" target="_blank">{lang cloudcp}</a></li>
  <!--{/if}--> 
  <!--{if $_G['uid'] && getstatus($_G['member']['allowadmincp'], 1)}-->
  <li><a href="admin.php" target="_blank">{lang admincp}</a></li>
  <!--{/if}--> 
  <!--{hook/global_usernav_extra4}-->
  <li><a href="member.php?mod=logging&action=logout&formhash={FORMHASH}">{lang logout}</a></li>
</ul>
  <!--{ad/headerbanner/wp a_h}--> 
  <!--{ad/subnavbanner/wp a_mu}--> 
<!--{hook/global_header}--> 
<!--{/if}-->

<div id="wp" class="wp j_wp">
