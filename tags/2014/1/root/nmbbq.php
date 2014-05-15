<?php
include('Container.php');

class News extends Container {

	public function __construct() {
		$this->title = "New Member Barbeque";
		$this->self = "nmbbq";
		$this->breadcrumbs = array( '/' => 'GTSailing', 'news.php' => 'News', 'nmbbq.php' => 'New Member Barbeque' );
	}
	
	public function content() {
		?>
		<div id="content">
			<div id="main">
			<?php $this->renderBreadcrumbs(); ?>
			<?php $this->leftContent(); ?>
			</div>
			<div id="footerline"></div>
		</div>
		<?php
	}

	public function leftContent() {
		?>
		<div>
			<h3>New Member Barbeque</h3>
			<br/>
			<img src="http://lh6.ggpht.com/_qFPRuE6drmA/TJtvxgEoIpI/AAAAAAAAAWA/E_8mPmgOrVU/s640/IMG_2318.jpg" width="320" height="240" alt="" /> 
			<img src="/images/j24-running.jpg" width="320" height="240" alt="" />
			<p>
			The New Member Barbeque takes place once per semester at Lake Lanier courtesy of the Georgia Tech Sailing Club. This is 
			a cook-out of epic proportions, where new or potentially new members gather at the lake to enjoy free lunch and free sailboat
			rides. We hope to have our J/24 keelboats under sail as well as Hobie 16s and Club 420s. If you think you might be interested
			in experiencing sailing, this is the best opportunity.
			</p>
			<p>
			Everyone is invited. Bring your friends and family. No cost.
			</p>
						
			<ul>
				<li><b>Location:</b> Lake Lanier Sailing Club</li><br/>
				<li><b>When:</b> Saturday September 1st: 11am through 6pm</li><br/>
				<li><b><a href="http://maps.google.com/maps?f=d&source=s_d&saddr=10th+St+NW&daddr=Commodore+Dr&hl=en&geocode=FQF3AwIdrTT4-g%3BFQ0hCgIdvAD_-g&mra=dme&mrcr=0&mrsp=0&sz=15&sll=33.771513,-84.384141&sspn=0.022831,0.051069&ie=UTF8&t=h&ll=33.820373,-84.343929&spn=0.091558,0.138874&z=13">Driving directions</a></b></li><br/>
				<li><b>Questions?</b> Email exec (at) list.gtsailing.org</li>
			</ul>
			
			<p>The club plans to arrange carpooling from Georgia Tech's Campus Recreational Center, departing at 10am. If you have a car
			and can offer rides to attendees, your help would be greatly appreciated.</p>
			
			<h4>New Member Barbeques from Previous Semesters</h4>
			<a href="http://picasaweb.google.com/bence.gt.sailing/2009NewMemberBBQ#5435622531141870626">
				<img src="http://lh5.ggpht.com/_qFPRuE6drmA/S2810CyWutE/AAAAAAAAAGo/KTat0Nyn88E/s144-c/2009NewMemberBBQ.jpg" alt="Fall 2009 NMBBQ" /></a>
			<a href="http://picasaweb.google.com/bence.gt.sailing/2010NewMemberBBQ#"><img src="http://lh5.ggpht.com/_qFPRuE6drmA/S284Up4wx8E/AAAAAAAAAKw/AT5nRHqc2i8/s144-c/2010NewMemberBBQ.jpg" alt="2010 NMBBQ" /></a>
		</div>
		<?php
	}
}

$page = new News();
$page->actionShow();

?>
