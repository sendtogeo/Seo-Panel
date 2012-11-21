<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta content="text/html; charset=UTF-8" http-equiv="content-type" />
    <?php
    	$spTitle = empty($spTitle) ? SP_TITLE : $spTitle;
    	$spDescription = empty($spDescription) ? SP_DESCRIPTION : $spDescription;
    	$spKeywords = empty($spKeywords) ? SP_KEYWORDS : $spKeywords;  
    ?>
    <title><?=stripslashes($spTitle)?></title>
    <meta name="description" content="<?=$spDescription?>" />
    <meta name="keywords" content="<?=$spKeywords?>" />
    <link rel="stylesheet" type="text/css" href="<?=SP_CSSPATH?>/screen.css" media="all" />
    <link rel="stylesheet" type="text/css" href="<?=SP_CSSPATH?>/datepicker.css" media="all" />
    <?php if (in_array($_SESSION['lang_code'], array('ar', 'he', 'fa'))) {?>
    	<link rel="stylesheet" type="text/css" href="<?=SP_CSSPATH?>/screen_rtl.css" media="all" />
    <?php }?>
    <link rel="shortcut icon" href="<?=SP_IMGPATH?>/favicon.ico" />
    <script language="Javascript" src="<?=SP_JSPATH?>/prototype.js"></script>
    <script language="Javascript" src="<?=SP_JSPATH?>/common.js"></script>
    <script language="Javascript" src="<?=SP_JSPATH?>/datepicker.js"></script>
</head>
<body>
<script>
var spdemo = <?=SP_DEMO?>;
var wantproceed = '<?=$spText['label']['wantproceed']?>';
</script>

<div class="main_container">

    <div id="Header">
    
    	<div id="round_content_header">
    
            <?php include_once(SP_VIEWPATH."/menu/topmenu.ctp.php");?>
            
            <div style="width:300px;">
            	<h1 style="width:200px;">Seo Panel</h1>
            </div>
        
            <!-- TABS -->
            <div id="Tabs">
                <ul id="MainTabs">
                    <?php
                    $userInfo = Session::readSession('userInfo');
                    $userType = empty($userInfo['userType']) ? "guest" : $userInfo['userType'];
                    include(SP_VIEWPATH.'/menu/'.$userType.'menu.ctp.php');
                    ?>
                </ul>
            </div>
        </div>
        
        <?php echo getRoundTabBot(); ?>
    </div>
    
    <div id="Wrapper">
        <table width="100%" cellspacing="0px" cellpadding="0px">
        	<tr><td id="newsalert"></td></tr>
        	<tr>
        		<td class="Container">
            		<div id="ContentFrame">
            			<noscript>
            				<p class="note error">JavaScript is turned off in your web browser. Turn it on to take full advantage of this site, then refresh the page.</p>
            			</noscript>
            			<?=$viewContent?>
            		</div>
        		</td>
        	</tr>
        </table>
    </div>
    <?php include_once(SP_VIEWPATH."/common/footer.ctp.php"); ?>
</div>
<div id="tmp"></div>
<?php if(empty($_COOKIE['hidenews'])){ ?>
	<script>scriptDoLoad('<?=SP_WEBPATH?>/index.php?sec=news', 'newsalert');</script>
<?php }?>
</body>
</html>