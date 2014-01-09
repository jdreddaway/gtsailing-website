<?php

// Report all PHP errors (see changelog)
error_reporting(E_ALL);
include('Container.php');

class Instruction extends Container {

	public function __construct() {
		$this->title = "Instruction";
		$this->self = "instruction";
		$this->breadcrumbs = array( '/' => 'GTSailing', 'instruction.php' => 'Instruction' );
	}

	public function leftContent() {
	?>
		<h3>Instruction</h3>
		<p>Georgia Tech Sailing welcomes students and alumni of all experience levels. Each semester, we offer
		an <a href="http://www.studentcenter.gatech.edu/scpc/committees/options/options_program/Pages/default.aspx"
			>Options Class</a> through the Student Center that focuses on teaching new or novice
		sailors how to sail. Students learn sailing theory during a weekly classroom
		session and gain experience sailing our Club 420s during on-the-water instruction. In addition to
		classroom sessions, this includes several on-the-water days of hands on instruction with our sailing instructors.
		Our goal is to develop new skippers during each semester.</p>
		<p>
		Students enrolled in the Options Class are full members of the club. Tuition includes a semester of dues, a sailing textbook,
		and prioritized sailing instruction. 
		</p>
		<p><a href="http://www.studentcenter.gatech.edu/scpc/committees/options/options_program/Pages/default.aspx"
			>Register for Options Class</a></p>
		<p>
		If you have problems registering online, visit <a href="http://options.gatech.edu/">http://options.gatech.edu/</a> and
		click "Register-Alumni/Community". Fill out and email or fax (404.894.3888) the registration form to the 
		Student Center Programs Council.
		</p>
		
		<h3>Important Information</h3>
		<p>See this page for information on the <a href="/qualification.php">skipper qualification process</a>.
		
		<p>See this directory for notes on  <a href="/documents/J24-certification">Advanced Sailing and  J/24 Certification</a></p>
		
		<p>See this directory for notes from Davis King <a href="/documents/keelboat-notes">Keelboat Exam notes</a></p>
	
			<P><a name="Lakehosts" id="Lakehosts"></a>&nbsp;</P>
			<H3>Lakehosts</H3>
			<P>Below is a list of our current lakehosts - the 10 GT sailing club members who also have 
			student memberships at the Lake Lanier Sailing Club (LLSC), where we keep all our boats and equipment.
			In order for any member of our club to be at LLSC, at least one lakehost must also be present.</P>
			
			<table border="4" cellspacing="2" cellPadding="5px">
				<tbody>
				<?php
					//
					// lakehosts and instructors need to be included in this list
					//
					$email = array(
						"Abhay Baliga" => "abaliga6 (at) gatech.edu",
						"Alex Richardson" => "yellowalex10@yahoo.com",
						"Eliza Rahn"  => "rahn.eliza (at) gmail.com",
						"Mike Roberts" => "mroberts (at) gatech.edu",
						"Matt Sheffield" => "sheffmatt (at) gmail.com",						
						"Matthew Salley" => "mattsalley@gmail.com",
						"Christopher Jackson" => "cjtjackson36@gmail.com"
					);
														
					$lakehosts = array(
						"Abhay Baliga",		
						"Alex Richardson",
						"Eliza Rahn",
						"Mike Roberts",
						"Matt Sheffield",
						"Matthew Salley",
						"Christopher Jackson"
					);
					foreach ($lakehosts as $lakehost) {
						echo "<tr><td style=\"padding:8px\">{$lakehost}</td><td style=\"padding:8px\">{$email[$lakehost]}</td></tr>\n";
					}
					
				?>
				</tbody>
			</table>
	
		<P><a name="Instructors" id="Instructors"></a>&nbsp;</P>
		<H3>Instructors</H3>
		<P>We have several experienced members of our club that are qualified to teach new sailors
		how to rig and sail our boats. These instructors can also give the on-the-water practical
		test as part of the skipper qualification process. Below is a list of our current instructors
		and their contact information: </P>
		
		
		<table width="667" border="4" cellspacing="2">
		<tbody>
		<?php
		
		// the keys of $fleet should match the elements of the array value for each instructor
		$fleet = array(
			"windsurf" => "Windsurfer", 
			"laser" => "Laser", 
			"420" => "Club 420", 
			"hobie" => "Hobie", 
			"j24" => "J/24"
		);
		$instructors = array(
			"Andrew Battigaglia" => array("420",),
			"Mike Roberts" => array("420", "hobie",),
			"Matt Sheffield" => array("420", "laser"),
			"Christopher Jackson" => array("j24"),
			"Elliot Newnham" => array("420", "laser"),
			"J.D. Reddaway" => array("420", "laser"),
			"Martin Kendrick" => array("420", "laser")
		);
		
		$widths = array(138, 250, 64, 41, 31, 42, 41);
		echo "<tr>";
		
		echo "<td width=\"138\" style=\"padding:3px\"><strong>Instructor:</strong></td>\n";
		echo "<td width=\"250\" style=\"padding:3px\"><strong>E-mail Address:</strong></td>\n";
		$n = 2;
		foreach ($fleet as $design => $designName) {
			echo "<td width=\"{$widths[$n]}\" style=\"\"><strong>{$designName}</strong></td>\n";
			$n++;
		}
		echo "</tr>\n";
		foreach ($instructors as $instructorName => $qualifications) {
			echo "<tr>";
			echo "<td style=\"padding:3px\">{$instructorName}</td>\n";
			echo "<td style=\"padding:3px\">{$email[$instructorName]}</td>\n";
			foreach ($fleet as $design => $designName) {
				$mark = (in_array($design, $qualifications) ? "X" : "&nbsp;");
				echo "<td style=\"padding:3px\"><div align=\"center\">{$mark}</div></td>\n";
			}
			echo "</tr>\n";
		}
		
		?>
		</tbody>
		</table>
		
		<?php
		
		/*
		<TABLE width="667" border="4" cellspacing="2">
		<TBODY>
			<TR>
				<TD width="138" style="padding:3px"><STRONG>Instructor:</STRONG></TD>
				<TD width="250" style="padding:3px"><STRONG>E-mail Address:</STRONG></TD>
				<TD width="64" style="padding:3px"><STRONG>Windsurf</STRONG></TD>
				<TD width="41" style="padding:3px"><STRONG>Laser</STRONG></TD>
				<TD width="31" style="padding:3px"><strong>Dinghy</strong></TD>
				<TD width="42" style="padding:3px"><STRONG>Hobie</STRONG></TD>
				<TD width="41" style="padding:3px"><STRONG>J-24</STRONG></TD>
			</TR>
			<TR>
				<TD style="padding:3px">Andrew Battigaglia</TD> ("420",)
				<TD style="padding:3px">abattigaglia (at) gatech.edu</TD>
				<TD style="padding:3px"><div align="center">&nbsp;</div></TD>
				<TD style="padding:3px"><div align="center">&nbsp;</div></TD>
				<TD style="padding:3px"><div align="center">X</div></TD>
				<TD style="padding:3px"><div align="center">&nbsp;</div></TD>
				<TD style="padding:3px"><div align="center">&nbsp;</div></TD>
			</TR>
			<TR>
				<TD style="padding:3px">Doug Britton</TD> ("windsurf","j24")
				<TD style="padding:3px">douglas.britton (at) gtri.gatech.edu</TD>
				<TD style="padding:3px"><div align="center">X</div></TD>
				<TD style="padding:3px"><div align="center">&nbsp;</div></TD>
				<TD style="padding:3px"><div align="center">&nbsp;</div></TD>
				<TD style="padding:3px"><div align="center">&nbsp;</div></TD>
				<TD style="padding:3px"><div align="center">X</div></TD>
			</TR>
			<TR>
				<TD style="padding:3px">Phil Forgione</TD> ("laser", "420")
				<TD style="padding:3px">laserrad90 (at) yahoo.com</TD>
				<TD style="padding:3px"><div align="center">&nbsp;</div></TD>
				<TD style="padding:3px"><div align="center">X</div></TD>
				<TD style="padding:3px"><div align="center">X</div></TD>
				<TD style="padding:3px"><div align="center">&nbsp;</div></TD>
				<TD style="padding:3px"><div align="center">&nbsp;</div></TD>
			</TR>
			<TR>
				<TD style="padding:3px">Clint Hodges</TD> ("420", "j24")
				<TD style="padding:3px">sugarfreesailor (at) gatech.edu</TD>
				<TD style="padding:3px"><div align="center">&nbsp;</div></TD>
				<TD style="padding:3px"><div align="center">&nbsp;</div></TD>
				<TD style="padding:3px"><div align="center">X</div></TD>
				<TD style="padding:3px"><div align="center">&nbsp;</div></TD>
				<TD style="padding:3px"><div align="center">X</div></TD>
			</TR>
			<TR>
				<TD style="padding:3px">Jamie Keogh</TD> 
				<TD style="padding:3px">gtg641q (at) mail.gatech.edu</TD>
				<TD style="padding:3px"><div align="center">&nbsp;</div></TD>
				<TD style="padding:3px"><div align="center">X</div></TD>
				<TD style="padding:3px"><div align="center">X</div></TD>
				<TD style="padding:3px"><div align="center">&nbsp;</div></TD>
				<TD style="padding:3px"><div align="center">&nbsp;</div></TD>
			</TR>
			<TR>
				<TD style="padding:3px">Davis King</TD> ("j24",)
				<TD style="padding:3px">davis1 (at) davisking.com</TD>
				<TD style="padding:3px"><div align="center">&nbsp;</div></TD>
				<TD style="padding:3px"><div align="center">&nbsp;</div></TD>
				<TD style="padding:3px"><div align="center">&nbsp;</div></TD>
				<TD style="padding:3px"><div align="center">&nbsp;</div></TD>
				<TD style="padding:3px"><div align="center">X</div></TD>
			</TR>
			<TR>
				<TD style="padding:3px">David Leung</TD> ("windsurf", "420", "hobie")
				<TD style="padding:3px">windsurfgod (at) gmail.com</TD>
				<TD style="padding:3px"><div align="center">X</div></TD>
				<TD style="padding:3px"><div align="center">&nbsp;</div></TD>
				<TD style="padding:3px"><div align="center">X</div></TD>
				<TD style="padding:3px"><div align="center">X</div></TD>
				<TD style="padding:3px"><div align="center">&nbsp;</div></TD>
			</TR>
			<TR>
				<TD style="padding:3px">Laura Levy</TD> ("420",)
				<TD style="padding:3px">laura.levy (at) gmail.com</TD>
				<TD style="padding:3px"><div align="center">&nbsp;</div></TD>
				<TD style="padding:3px"><div align="center">&nbsp;</div></TD>
				<TD style="padding:3px"><div align="center">X</div></TD>
				<TD style="padding:3px"><div align="center">&nbsp;</div></TD>
				<TD style="padding:3px"><div align="center">&nbsp;</div></TD>
			</TR>
			<TR>
				<TD style="padding:3px">Greg Matthews</TD> ("windsurf", "hobie","j24")
				<TD style="padding:3px">sailingreg (at) yahoo.com</TD>
				<TD style="padding:3px"><div align="center">X</div></TD>
				<TD style="padding:3px"><div align="center">&nbsp;</div></TD>
				<TD style="padding:3px"><div align="center">&nbsp;</div></TD>
				<TD style="padding:3px"><div align="center">X</div></TD>
				<TD style="padding:3px"><div align="center">X</div></TD>
			</TR>
			<TR>
				<TD style="padding:3px">Tim McKinzie</TD> ("420",)
				<TD style="padding:3px">tmckinzie (at) gatech.edu</TD>
				<TD style="padding:3px"><div align="center">&nbsp;</div></TD>
				<TD style="padding:3px"><div align="center">&nbsp;</div></TD>
				<TD style="padding:3px"><div align="center">X</div></TD>
				<TD style="padding:3px"><div align="center">&nbsp;</div></TD>
				<TD style="padding:3px"><div align="center">&nbsp;</div></TD>
			</TR>
			<TR>
				<TD style="padding:3px">Sebastian Miles</TD> ("420",)
				<TD style="padding:3px">gtg302q (at) mail.gatech.edu</TD>
				<TD style="padding:3px"><div align="center">&nbsp;</div></TD>
				<TD style="padding:3px"><div align="center">&nbsp;</div></TD>
				<TD style="padding:3px"><div align="center">X</div></TD>
				<TD style="padding:3px"><div align="center">&nbsp;</div></TD>
				<TD style="padding:3px"><div align="center">&nbsp;</div></TD>
			</TR>
			<TR>
				<TD style="padding:3px">Ralph Mueller</TD> ("hobie",)
				<TD style="padding:3px">ralphm (at) isye.gatech.edu</TD>
				<TD style="padding:3px"><div align="center">&nbsp;</div></TD>
				<TD style="padding:3px"><div align="center">&nbsp;</div></TD>
				<TD style="padding:3px"><div align="center">&nbsp;</div></TD>
				<TD style="padding:3px"><div align="center">X</div></TD>
				<TD style="padding:3px"><div align="center">&nbsp;</div></TD>
			</TR>
			<TR>
				<TD style="padding:3px">Konrad Rykaczewski</TD> ("windsurf",)
				<TD style="padding:3px">konrad.rykaczewski (at) gmail.com</TD>
				<TD style="padding:3px"><div align="center">X</div></TD>
				<TD style="padding:3px"><div align="center">&nbsp;</div></TD>
				<TD style="padding:3px"><div align="center">&nbsp;</div></TD>
				<TD style="padding:3px"><div align="center">&nbsp;</div></TD>
				<TD style="padding:3px"><div align="center">&nbsp;</div></TD>
			</TR>
			<TR>
				<TD style="padding:3px">Matthew Widlansky</TD> ("laser","420","j24")
				<TD style="padding:3px">gtg058g (at) mail.gatech.edu</TD>
				<TD style="padding:3px"><div align="center">&nbsp;</div></TD>
				<TD style="padding:3px"><div align="center">X</div></TD>
				<TD style="padding:3px"><div align="center">X</div></TD>
				<TD style="padding:3px"><div align="center">&nbsp;</div></TD>
				<TD style="padding:3px"><div align="center">X</div></TD>
			</TR>
			<TR>
				<TD style="padding:3px">Darin "Pablo" Yawn</TD> ("windsurf","laser","420","hobie","j24")
				<TD style="padding:3px">gtpablo (at) gmail.com</TD>
				<TD style="padding:3px"><div align="center">X</div></TD>
				<TD style="padding:3px"><div align="center">X</div></TD>
				<TD style="padding:3px"><div align="center">X</div></TD>
				<TD style="padding:3px"><div align="center">X</div></TD>
				<TD style="padding:3px"><div align="center">&nbsp;</div></TD>
			</TR>
		</TBODY>
		</TABLE>
		*/
		?>
		
	<?php
	}
	
	public function rightContent() {
	?>	
		<h3>Important Links</h3>
		<ul>
			<li>
				<a href="http://www.studentcenter.gatech.edu/scpc/committees/options/options_program/Pages/default.aspx"
					>GTSailing Options Class</a></li>
			<li>
				<a href="http://home.ussailing.org/">U.S. Sailing</a></li>
			<li><a href="/qualification.php">Skipper Qualification</a></li>
			<li><a href="/documents/J24-certification">J/24 Certification</a></li>
			<li><a href="/documents/keelboat-notes">Keelboat Notes</a></li>
			<li><a href="http://www.boat-ed.com/ga/index.htm?gclid=CKrfqZqDjqcCFU5a7Aod8GHqdQ">Georgia boating course</a></li>
		</ul>
	<?php
	}
}

$page = new Instruction();
$page->actionShow();

?>
