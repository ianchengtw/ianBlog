<?php
include('base/org.php');
class Edit extends baseMod {
	var $_state = 0;
	function get(){}
	function post(){}
	function nodata(){}
	function doing(){}
	function view(){
?>
<article class="is-post is-post-excerpt">
	<header>
		<h2><a href="#">Summary</a></h2>
		<span class="byline"></span>
	</header>

	<p>I have three years of experience as a video game developer. I am skilled in PHP, JavaScript, CSS, HTML, C++. I do web design, development, and deployment on LAMP (Linux/Apache/MySQL/PHP). I am interested in any web project.
	<pre>
[Personal Design]
	Web
		Blog - http://winky.eu5.org/ianBlog/
		Chatting System - http://winky.eu5.org/Chat
	</pre>
	</p>
</article>

<article class="is-post is-post-excerpt">
	<header>
		<h2><a href="#">Experience</a></h2>
		<span class="byline"></span>
	</header>

	<p><pre>Programmer
Jumbo Technology Co., Ltd.	2011 – 2012 (1 year)
	- Developed arcade game of slot machines by C++;
	- Developed flash game of slot machines by ActionScript.</pre>
	</p>
	
	<p><pre>Programmer
XPEC	2009 – 2011 (2 years)
	- Developed a massively multiplayer online role-playing game (MMORPG) for two years. During the time, I was developing the client program of the game, based on Win32 platform, using C++ computer language.
	- Maintained a website which based on LAMP (Linux, Apache, MySQL, PHP)</pre>
	</p>
</article>

<article class="is-post is-post-excerpt">
	<header>
		<h2><a href="#">Contact Me</a></h2>
		<span class="byline"></span>
	</header>

	<p>
	<pre>
Email: chang.baoh@gmail.com
Location: Taiwan
	</pre>
	</p>
</article>
<?php
	}
}
$main = new Edit();
?>


