<?php
/*!
	\file Container.php
	\author Andrew Kerr
	\brief base class for GTSailing page
*/

class Container {

	public $title;
	public $self;
	public $breadcrumbs;

	public function __construct() {
		$this->title = "Welcome";
		$this->self = "index";
		$this->breadcrumbs = array( '/' => 'GTsailing', '/' => 'Welcome' );
	}

	public function action($action) {
		if ($action == 'show') {
			actionShow();
		}
		else {
			actionUnknown();
		}
	}

	public function actionShow() {
		$this->header();
		$this->content();
		$this->footer();
	}

	public function actionUnknown() {
		$this->header();
		$this->errorContent("Action not recognized");
		$this->footer();
	}
	
	public function errorContent($message) {
		?>
		<div id="content">
			<div id="left">
			<?php echo "<h3>Error</h3><p>{$message}</p>"; ?>
			</div>
			<div id="right">
			<?php $this->rightContent(); ?>
			</div>		
		</div>
		<?php
	}
			
	/*!
		\brief Navigation links in header
	*/
	public function navigationBar() {
		$pages = array( 
			'/' => 'Home', 
			'/news.php' => 'News',
			'/club_info.php' => 'Club Info',
			'/fleet.php' => 'Fleet',
			'/calendar.php' => 'Calendar',
			'/instruction.php' => 'Instruction',
			'/competition.php' => 'Competition',
			'/contact.php' => 'Contact Us');
		echo "<ul>";
		foreach ($pages as $page => $title) {
			echo "<li><a href=\"{$page}\">{$title}</a></li>\n";
		}
		echo "</ul>";
	}
	
	public function renderBreadcrumbs() {
		$n = 0;
		echo "<p>";
		foreach ($this->breadcrumbs as $page => $title) {
			if ($n+1 == count($this->breadcrumbs)) {
				echo ($n++ ? " &gt; " : "" ), $title;
			}
			else {
				echo ($n++ ? " &gt; " : "" ), "<a href=\"{$page}\">{$title}</a>";
			}
		}
		echo "</p>";
	}
	
	/*!
		\brief GTSailing page header
	*/
	public function header() {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title>GT Sailing Club - <?php echo $this->title; ?></title>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
.style2 {color: #9F823C}
.style4 {font-family: Verdana, Arial, Helvetica, sans-serif}
-->
</style>
</head>

<body><a name="Top" id="Top"></a>
<div id="container">
	<div id="header">
		<div id="logo_w1">Georgia Tech</div>
		<div id="logo_w2">Sailing Club </div>
		<div id="header_text">
			<p></p>
		</div>
		<?php $this->navigationBar(); ?>
	</div>
<?php
	}
	
	/*!
	
	*/
	public function footer() {
?>	
	<div class="style1" id="footer">&copy; 2010 Georgia Tech Sailing Club. All rights reserved.</div>	
</div>
</body>
</html>
<?php
	}

	public function content() {
		?>
		<div id="content">
			<div id="left">
			<?php $this->renderBreadcrumbs(); ?>
			<?php $this->leftContent(); ?>
			</div>
			<div id="right">
			<?php $this->rightContent(); ?>
			</div>
			<div id="footerline"></div>
		</div>
		<?php
	}
	
	public function leftContent() {
	?>
		<h3>Georgia Tech Sailing Club</h3>
		<p>The purpose of the Georgia Tech Sailing Club is to encourage, teach, and promote sailing in the Georgia Tech community. The club is open to all students, faculty, and staff with sailing experience ranging from lifelong sailors to those who have never been in a boat before. One of the oldest and most <span>reputable</span> clubs on campus, we have assembled an extensive fleet of windsurfers, single and double handed dinghies, catamarans, and keelboats.</p>
		
		<p><b>Mailing list:</b> gtsailing (at) googlegroups.com</p>
				
		<p><b>Summer 2012 Meetings</b> - Mondays at 7:30pm. Location is in CRC, room 249.</p>
				
		<p><b>New Member Barbecue</b> Saturday September 1st - Open to faculty, students, and alumni. Departing from CRC at 10am! Visit <a href="/nmbbq.php">this page</a>
			for details.</p>
		
		<p><b>Options Class</b> (Summer 2012) - <a href="/instruction.php">Learn to sail</a></p>
		
		<p><a href="http://www.facebook.com/groups/2200495519/#">
			<img src="/images/facebookicon.jpg"
				alt="http://www.psdgraphics.com(C)" /></a><br/>Find us on facebook!</p>
				
		<br/>
		<p><a href="https://groups.google.com/forum/?fromgroups#!forum/gtsailing">
			<img src="/images/emailicon.jpg"
				alt="http://www.psdgraphics.com(C)" /></a><br/>Communicate with us here!</p>
	<?php
	}
	
	/*!
		\brief this should be dynamically generated somehow, but for now edit this to show up on every page
	*/
	public function rightContent() {
		$this->renderTwitterFeed();
	}
	
	public function renderTwitterFeed() {
	?>
	<h2 class="style2">Latest News and Information</h2>
<script src="http://widgets.twimg.com/j/2/widget.js"></script>
<script>
new TWTR.Widget({
  version: 2,
  type: 'profile',
  rpp: 5,
  interval: 6000,
  width: 225,
  height: 500,
  theme: {
    shell: {
      background: '#e3e5db',
      color: '#000000'
    },
    tweets: {
      background: '#e3e5db',
      color: '#000000',
      links: '#397898'
    }
  },
  features: {
    scrollbar: false,
    loop: false,
    live: false,
    hashtags: true,
    timestamp: true,
    avatars: false,
    behavior: 'all'
  }
}).render().setUser('gtsailing').start();
</script>
	<?php
	}
}

?>
