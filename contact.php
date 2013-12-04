<?php
include('Container.php');

class Contact extends Container {

	public function __construct() {
		$this->title = "Contact Us";
		$this->self = "contact";
		$this->breadcrumbs = array( '/' => 'GTSailing',
			'contact.php' => 'Contact' );
	}
	
	public function content() {
		?>
		<div id="content">
			<div id="left">
			<?php $this->renderBreadcrumbs(); ?>
			<?php $this->leftContent(); ?>
			</div>
			<div id="footerline"></div>
		</div>
		<?php
	}

	public function leftContent() {		
		$ExecutiveBoard = array(
			array(
				'name' => 'Abhay Baliga',
				'position' => 'Commodore',
				'email' => 'abaliga6 (at) gatech.edu',
				'image' => 'abhay-baliga.jpg',
				'size' => array(103, 154)),
			array(
				'name' => 'Eliza Rahn',
				'position' => 'Vice Commodore & Race Team Captain',
				'email' => 'rahn.eliza (at) gmail.com',
				'image' => 'eliza-rahn.jpg',
				'size' => array(103, 154)),
			array(
				'name' => 'Daniel Rodriguez',
				'position' => 'Secretary',
				'email' => 'drodriguez33 (at) gatech.edu',
				'image' => 'daniel-rodriguez.jpg',
				'size' => array(111, 154)),
			array(
				'name' => 'Chris Jackson',
				'position' => 'Fleet Captain',
				'email' => 'cjtjackson36 (at) gmail.com',
				'image' => 'chris-jackson.jpg',
				'size' => array(103, 137)),
			array(
				'name' => 'Justin Eisenberg',
				'position' => 'Treasurer',
				'email' => 'justin.eisenberg (at) gatech.edu',
				'image' => 'justin-e.jpg',
				'size' => array(103, 103)),
			array(
				'name' => 'Matt Sheffield',
				'position' => 'Social Chair',
				'email' => 'sheffmatt (at) gatech.edu',
				'image' => 'matt.jpg',
				'size' => array(103, 183)),
			);
	?>
			<h1 align="left" class="style2">Contact GTSailing</h1>
			
			<p>Follow on 
			<a href="http://www.twitter.com/gtsailing">
			<img src="http://twitter-badges.s3.amazonaws.com/twitter-a.png" 
				alt="Follow gtsailing on Twitter"/></a>
			</p>
			
			<h3>Executive Board</h3>
			<table width="667" border="0" cellPadding="5" class="style4">
			<?php
				$count = 0;
				foreach ($ExecutiveBoard as $member) {
					if ($count % 2 == 0) {
						echo "<tr>\n";
					}
					
					$imgSize = $member['size'];
					$imgUrl = "images/{$member['image']}";
					echo "<td width=\"111\"><div align=\"right\"><a href=\"{$imgUrl}\"><img src=\"{$imgUrl}\" 
						width=\"{$imgSize[0]}\" height=\"{$imgSize[1]}\" alt=\"{$member['name']}\"/></a></div></td>";
					echo "<td width=\"181\"><div align=\"center\"><b>{$member['position']}</b></div>";
					echo "<div>&nbsp;</div>";
					echo "<div align=\"center\">{$member['name']}</div>";
					echo "<div align=\"center\">{$member['email']}</div>";
					echo "<div></div></td>\n";
					
					if ($count % 2 == 1) {
						echo "</tr>\n";
					}
					++$count;
				}
				if ($count % 2 == 1) {
					echo "</tr>\n";
				}
			?>
			</table>	  
	  
		<P>&nbsp;</P>
		<H3>E-mail Lists</H3>
		<P>There are several e-mail lists we use to disseminate information through our club:</P>
		<TABLE class="indent" border="0" cellspacing="2" cellPadding="5px">
			<TBODY>
				<TR>
					<TD width="218" style="VERTICAL-ALIGN: top; padding:3px"><UL><LI><STRONG>gtsailingexec (at) googlegroups.com</STRONG></LI></UL></TD>
					<TD style="padding:3px">Send an e-mail out to this list if you have questions or requests for the executive board</TD>
				</TR>
				<TR>
					<TD style="VERTICAL-ALIGN: top; padding:3px"><UL><LI><STRONG>gtsailing (at) googlegroups.com</STRONG></LI></UL></TD>
					<TD style="padding:3px">We send out most club info to this list - meeting reminders, minutes, upcoming events, etc.</TD>
				</TR>
				<TR>
					<TD style="VERTICAL-ALIGN: top; padding:3px"><UL><LI><STRONG>raceteam-gtsailing (at) googlegroups.com</STRONG></LI></UL></TD>
					<TD style="padding:3px">The undergraduate raceteam uses this list to organize practices and teams for regattas</TD>
				</TR>
				<TR>
					<TD style="VERTICAL-ALIGN: top; padding:3px"><UL><LI><STRONG>gtsailingkeel (at) googlegroups.com</STRONG></LI></UL></TD>
					<TD style="padding:3px">This list is for information about sailing opportunities on the J-24 fleet</TD>
				</TR>
				<TR>
					<TD style="VERTICAL-ALIGN: top; padding:3px"><UL><LI><STRONG>GTSailingLakehosts (at) googlegroups.com</STRONG></LI></UL></TD>
					<TD style="padding:3px">Send an e-mail out to this list to coordinate with the lakehosts so you can be at LLSC</TD>
				</TR>
			</TBODY>
		</TABLE>
		<p>To subscribe or unsubscribe from any of our lists, please vist 
		<A href="http://googlegroups.com/" target="_blank">http://googlegroups.com/</A> and click on the list to view subscription options.<BR>
	  &nbsp;</p>
		<H3>GTSC Mailing Address</H3>
		<P>Please send any mail or dues checks to the following address:</P>
		<p class="indent">Georgia Tech Sailing Club<BR>350292 Georgia Tech Station<BR>Atlanta, GA 30332</P>

	<?php
	}
}

$page = new Contact();
$page->actionShow();

?>
