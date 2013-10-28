<?php
include('base/org.php');
class Index extends baseMod {
	function get(){}
	function post(){}
	function nodata(){}
	function doing(){}
	function view(){
		$this->loadHeader(true);
?>
	<script src="js/articleBrowse.js"></script>
	<script>
		//enum
		var NAV_ARTICLE_BROWSE = 1;
		var NAV_ABOUT_ME = 2;
		var NAV_ARTICLE_POST = 9;
		
		var _currentSystem = NAV_ARTICLE_BROWSE;
		
		function updateView(data){
			
			switch(_currentSystem){
				case NAV_ARTICLE_BROWSE:
					
					var cmds = $.parseJSON(data);
			
					for(var i=0;i<cmds.length;i++){
						var row = $.parseJSON(cmds[i]);
						switch(row.cmd){
							case 'PostData':
								console.log('PostData');
								receivePost($.parseJSON(row.data));
								$("html, body").animate({ scrollTop: 0 }, "slow");
								outputArea.innerHTML = '';
								break;
							case 'Pager':
								console.log('Pager');
								displayPager($.parseJSON(row.data));
								break;
						}

					}
					
					break;
				case NAV_ABOUT_ME:
					
					var ci = document.getElementById('content-inner');
					ci.innerHTML = data;
					
					break;
				case NAV_ARTICLE_POST:
					
					var ci = document.getElementById('content-inner');
					ci.innerHTML = data;
					
					break;
			}
				
			
		}
		function changeSystem(n){
			
			empty_ArticleBrowse();
			
			switch(n.id){
				case 'sysArticleBrowse':
					requestSysArticleBrowse();
					break;
				case 'sysArticlePost':
					requestSysArticlePost();
					break;
				case 'sysAboutMe':
					requestSysAboutMe();
					break;
			}
		}
		function requestSysArticleBrowse(){
			
			_currentSystem = NAV_ARTICLE_BROWSE;
			
			var ci = document.getElementById('content-inner');
			ci.innerHTML = '<div class="pager" id="divPager">\
						<a class="button previous" id="buttonPrevious" onclick="buttonPrevious();" style="cursor:pointer;">Previous Page</a>\
						<div class="pages" id="pagerPages">\
							<span id="previousHellip">&hellip;</span>\
							<span id="nextHellip">&hellip;</span>\
						</div>\
						<a class="button next" id="buttonNext" onclick="buttonNext();" style="cursor:pointer;">Next Page</a>\
					</div>';
			_nowPage = 1;
			requestPost(_nowPage);
			init_ArticleBrowse();
		}
		function requestSysArticlePost(){
			
			_currentSystem = NAV_ARTICLE_POST;
			
			xmlhttp.open('GET', 'edit.php');
			xmlhttp.send(null);
		}
		function requestSysAboutMe(){
			
			_currentSystem = NAV_ABOUT_ME;
			
			xmlhttp.open('GET', 'aboutMe.php');
			xmlhttp.send(null);
		}
		function ready(){
			requestSysArticleBrowse();
		}
		
	</script>
	
	<!-- Wrapper -->
	<div id="wrapper">

		<!-- Content -->
			<div id="content">
				<div id="content-inner">
					<!-- Post -->
					
					<!-- Pager -->
				
					
				</div>
				
			</div>

		<!-- Sidebar -->
			<div id="sidebar">
			
				<!-- Logo -->
					<div id="logo">
						<h1>Ian Blog</h1>
					</div>
			
				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li class="current_page_item"><a href="#" id="sysArticleBrowse" onclick="changeSystem(this);">Article Browse</a></li>
							<li><a href="#" id="sysAboutMe" onclick="changeSystem(this);">About Ian</a></li>
						</ul>
					</nav>

				<!-- Search -->
					<section class="is-search">
						<form method="post" action="#">
							<input type="text" class="text" name="search" placeholder="Search" />
						</form>
					</section>
			
				<!-- Text -->
					<section class="is-text-style1">
						<div class="inner">
							<p>
								<strong>Striped:</strong> A free and fully responsive HTML5 site
								template designed by <a href="http://n33.co/">AJ</a> for <a href="http://html5up.net/">HTML5 up!</a>
							</p>
						</div>
					</section>
			
				<!-- Recent Posts -->
					<section class="is-recent-posts">
						<header>
							<h2>Recent Posts</h2>
						</header>
						<ul>
							<li><a href="#">Nothing happened</a></li>
						</ul>
					</section>
			
				<!-- Recent Comments -->
					<section class="is-recent-comments">
						<header>
							<h2>Recent Comments</h2>
						</header>
						<ul>
							<li>case on <a href="#">Now Full Cyborg</a></li>
						</ul>
					</section>
			
				

				<!-- Copyright -->
					<div id="copyright">
						<p>
							&copy; 2013 An Untitled Site.<br />
							Images: <a href="http://n33.co">n33</a>, <a href="http://fotogrph.com">fotogrph</a>, <a href="http://iconify.it">Iconify.it</a>
							Design: <a href="http://html5up.net/">HTML5 UP</a>
						</p>
					</div>

			</div>

	</div>	
	
	<div id="outputArea"></div>
		
<?php
		$this->loadFooter();
	}
}
$main = new Index();
?>


