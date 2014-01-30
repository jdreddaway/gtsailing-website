<?php
include('Container.php');

class ClubInfo extends Container {

	public function __construct() {
		$this->title = "Club Information";
		$this->self = "club_info";
		$this->breadcrumbs = array( '/' => 'GTSailing', 'club_info.php' => 'Club Information' );
	}

	public function leftContent() {
	?>
<!-- <div align="center"><img src="images/Page Titles/club_info.jpg" alt="Club Information" /></div> -->
		<h3>Club Information</h3>
			<p>The purpose of the Georgia Tech Sailing Club is to encourage, teach, and promote sailing in the Georgia Tech community. The club is open to all students, faculty, and staff with sailing experience ranging from lifelong sailors to those who have never been in a boat before. One of the oldest and most <span>reputable</span> clubs on campus, we have assembled an extensive fleet of windsurfers, single and double handed dinghies, catamarans, and keelboats.</p>
			
	        <p class="style4">The Georgia Tech Sailing Club was founded in 1961 by a group of students who discovered they had a common interest in sailing and racing. They wanted to encourage other students to take up their passion for sailing and began teaching everyone who wanted to learn. Over the years, the number of avid sailors at Georgia Tech has grown. We have accumulated  an extensive fleet of different sailboats and watercraft. Throughout this expansion, we have maintained our emphasis on racing through participation in intercollegiate and local racing circuits and maintained our passion for instruction through the Options Program at Georgia Tech. This sport is one of the most fun and exciting in the world, and we are proud to be an active part of the sailing community. </p>
	        <h3>Meeting Information</h3>
	        <p class="style4">We meet every Monday from 7:30 to 8:00pm. These meetings are located in room 249 of the Georgia Tech 
			Campus Recreation Center (CRC). To find the CRC, look for it on the <A href="http://gtalumni.org/map/" target="_blank">GT campus map</A>. 
			All members and anyone interested in the club are welcome at these meetings.</p>
	        <h3>Lakehosts</h3>
			<p class="style4">We keep all our boats and equipment at the Lake Lanier Sailing Club (LLSC). Only 
			members of LLSC are allowed on the grounds so we hold 10 student memberships with LLSC. Each year, our executive board appoints 10 students to 
			receive our LLSC memberships. These 10 students are known as <A href="instruction.php">lakehosts</A>. In order for any of our members to 
			use our equipment (or be at LLSC for any other reason), a lakehost must be present to accompany them.</p>
			<p class="style4">When appointing lakehosts, exec generally looks for students who are outgoing and actively involved in both sailing and maintaining 
			our fleets. In addition, a lakehost should be at least 420 or windsurf <A href="qualification.php">skipper qualified</A>, a member of GTSC for at least 
			one year, and plan on being a member of GTSC for at least one more year.</P>
			<p class="style4">To become a lakehost, a student must be appointed by GTSC exec and must complete 
			the <A href="documents/LLSC_Member_Application.pdf" target="_blank">LLSC membership application form</A> and submit it to the current secretary of LLSC.</p>
	        <h3>Dues and other Membership Costs</h3>
			<P>All GTSC members must pay dues either every semester or every year. Dues contribute to upkeep of boats and our participation in regional
			sailing events. Moreover, Georgia Tech funds the club according to the number of <i>dues-paying members</i>, so any contribution you make
			results in amplified funding from other sources. </P>
			
			<p><a href="/dues.php">Please see the Dues page for more information and payment options.</a></p>
			
	<?php
	}
	
	public function rightContent() {
	?>
			<h2 align="left" class="style2">Important Links </h2>
			<P><a href="/documents/Constitution_Bylaws_2011.pdf">Constitution and Bylaws</a> [PDF]</P>
			<p><a href="/dues.php">GTSailing Dues</a></p>
			<P><STRONG>Faculty Advisor</STRONG></P>
	  		<P><A href="mailto: douglas.britton@gtri.gatech.edu">Doug Britton</A><BR /></P>
			<P><STRONG>Fleet Information</STRONG></P>
			<P><A href="fleet.php">Our Boats:</A> See pictures and descriptions of the five different one-design fleets and other equipment we keep in excellent condition.</P>
			<P><A href="qualification.php">Skipper Qualification:</A> Due to concerns about the safety of our members and our equipment, we require that members meet some requirements before we allow them to take out any boats.</P>
			<P><STRONG>Lake Lanier</STRONG></P>
			<P>Get more information about the <A href="http://www.llsc.com/" target="_blank">Lake Lanier Sailing Club</A> where we keep our boats.</P>
			<P>Download and print <a href="documents/LLSC_Directions.pdf" target="_blank">directions</a> to our clubhouse at LLSC.</P>
			<P>View a <a href="documents/Lake_Lanier_Map.jpg" target="_blank">chart</a> of the area of Lake Lanier where we sail.</P>
			<P>&nbsp;</P>
			<P><STRONG>Club Profile</STRONG></P>
			<p><A href="instruction.php"><img src="images/profile_instr.jpg" width="124" height="94" border="0" align="middle"/></A> <A href="instruction.php">Instruction</A></p>
			<p><A href="competition.php"><img src="images/profile_comp.jpg" width="124" height="94" border="0" align="middle"/></A> <A href="competition.php">Competition</A></p>
	
	<?php
	}
}

$page = new ClubInfo();
$page->actionShow();

?>
