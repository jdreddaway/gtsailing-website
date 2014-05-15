<?php
include('Container.php');

class Fleet extends Container {

	public function __construct() {
		$this->title = "Fleet";
		$this->self = "fleet";
		$this->breadcrumbs = array( '/' => 'GTSailing', 'fleet.php' => 'Fleet' );
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
			<h3>Georgia Tech Sailing Fleet</h3>
			<TABLE width="667" border="0" cellPadding="5" class="style4">
			<TBODY align="center">
				<TR>
				<TD width="320"><img src="images/windsurfer.jpg" width="295" height="325" /></TD>
					<TD width="321">
						<h3>Windsurf Fleet</h3>
						<P>We have a huge inventory of windsurf boards and sails. These are the fastest watercraft we own and the most versatile. 
						They can be sailed in almost no wind and when the wind is moving in excess of 30 knots. We have 6 Mistral longboards designed for beginner to
						intermediate windsurfers along with various shortboards for advanced windsurfers. We bring our boards with us on all our Florida trips
						and offer an Options class in the summer and fall to teach windsurfing.</P>
					</TD>
				</TR>
				<TR>
					<TD>
						<h3>Laser Fleet</h3>
						<P>Lasers are 14-foot, single-handed dinghies. They are an olympic class of boat - very competitive and maneuverable. We have seven 
						laser hulls with full rigs for all of them along with several radial rigs. There is a highly competitive laser racing series and
						laser sailing community at Lake Lanier that many of our members enjoy. We also sail them recreationally, bringing one or two with
						us on Flordia trips.</P>
					</TD>
					<TD><img src="images/laser.jpg" width="298" height="325" /></TD>
				</TR>
				<TR>
					<TD><img src="images/420.jpg" width="297" height="326" /></TD>
					<TD>
						<h3>420 Fleet</h3>
						<P>Just a few short years ago, we acquired 6 brand new, matching 420s. These are two-handed dinghies sailed in intercollegiate
						racing. Our raceteam uses this fleet to practice and host regattas. We also use them to teach an Options class for anyone
						interested in learning to sail. </P>
					</TD>
				</TR>
				<TR>
					<TD>
						<h3>Hobie 16 Fleet</h3>
						<P>After purchasing two new Hobie's a couple years ago, we now have 4 of these double-handed catamarans. These boats are the essence
						of fun and widely recognized as the world's most popular catamaran. We bring them on every Florida trip, sailing them off the beach. We
						also sail them competitively in a lively multihull racing circuit around the Atlanta area. Our club members have made the covers of sailing
						magazines in these boats and regularly place in the top tier of local regattas.</P>
					</TD>
					<TD><img src="images/hobie.jpg" width="295" height="325" /></TD>
				</TR>
				<TR>
					<TD><img src="images/J-24.jpg" width="295" height="323" /></TD>
					<TD>
						<h3>J-24 Fleet</h3>
						<P>J-24 is a 24 foot long keel boat that requires 4-5 people as crew. We have two of these large boats - 'J-Express' 
						and 'Helluva Boat'. Since they hold so many, they are great for recreational sailing trips around the lake; we take them out every
						week during the summer. We also race them year-round in regattas and racing series (such as the Wednesday Night Race Series hosted by AISC,
						which we won with 'Helluva Boat' in 2009).</P>
					</TD>
				</TR>
				<TR>
					<TD>
						<h3>Other Equipment</h3>
						<P>In addition to our one-design fleets, we also keep a handful of other types of watercraft. We have a zodiac (inflatable power boat) which
						we use as a chase and rescue boat. We have several different types of catamaran, including a Nacra 5.5 and a Prindle. In addition, we 
						received a Santana 20 - a beautiful racing class keel boat named 'Tigger' - as a donation in the fall of 2009.</P>
					</TD>
					<TD><img src="images/other_eq.jpg" width="296" height="326" /></TD>
				</TR>
			</TBODY>
	  </TABLE>        
	<?php
	}
}

$page = new Fleet();
$page->actionShow();

?>
