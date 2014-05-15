<?php
include('Container.php');

class Qualification extends Container {

	public function __construct() {
		$this->title = "Qualification";
		$this->self = "qualification";
		$this->breadcrumbs = array( '/' => 'GTSailing', '/club_info.php' => 'Club Info', 
			'qualification.php' => 'Skipper Qualification' );
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
	?>
		<h3>Skipper Qualification Process</h3>
	        <p class="style4">In order to protect our <A href="fleet.html">equipment</A> and our members, the Georgia Tech Sailing Club has developed a strict skipper qualification process. Each fleet has a unique and specific process, all of which are documented on this page. Each process is intended to ensure that only members who have demonstrated mastery of fleet-specific boat handling skills may take out crew or equipment. </p>
	        <p class="style4">Quick Links:</p>
	        <ol>
              <li><A href="#Dinghy">Dinghy (420) Qualification</A></li>
	          <li><A href="#Windsurf">Windsurf Qualification</A></li>
			  <li><A href="#Laser">Laser Qualification</A></li>
              <li><A href="#Hobie">Hobie 16 Qualification</A></li>
              <li><A href="#J24">J-24 Qualification</A></li>
              <li><A href="#Zodiac">Zodiac Usage Policy</A></li>
	  </ol>
	  <P class="style4">Click <A href="documents/Qualification_Flowchart.pdf">here</A> to access a flowchart of all fleet qualification processes.</P>
	</div>
	
	<div id="right">		
			<h5 class="style2">Relevant Documents</h5>
			<p><A href="contacts.html#Instructors">GTSC Instructors</A></p>
			<P><A href="documents/Qualification_Flowchart.pdf" target="_blank">Qualification Flowchart</A></P>
			<P><STRONG>J-24 Qualification</STRONG></P>
	  	    <P><A href="documents/J24-certification/J24_Certification_Process.pdf">J-24 Certification Process</A></P>
			<P><A href="documents/J24-certification/J24_Skipper_Requirements.pdf">J-24 Skipper Requirements</A></P>
			<P><A href="documents/J24-certification/J24_Skipper_Application.doc">J-24 Skipper Application</A></P>
			<P><A href="documents/J24-certification/J24_On-the-water-test_Checklist.pdf">J-24 On-the-Water Checklist</A></P>
			<P><A href="documents/J24-certification/J24_FloatPlan_Sample.pdf">J-24 Sample Float Plan</A></P>
	  </div>		

	  <div id="main">
	  		<a name="Dinghy" id="Dinghy"></a>	
	        <h3>Dinghy (420) Qualification</h3>
	        <p class="style4">There are two steps involved in becoming dinghy qualified at GTSC: a written test and an on-the-water test. You must take the written test before attempting the on-the-water test with a GTSC dinghy instructor. When you pass the on-the-water test, your instructor will  send a formal recommendation to the executive board. If exec approves, you will be a dinghy qualified skipper. The end result of this process is that, as a dinghy qualified skipper, you may enjoy the priviledges described below and exec will add dinghy qualification to your GTSC Skipper card. </p>
	        <p class="style4">Dinghy  qualified members of the club enjoy the following priviledges: </p>
	        <ul>
	          <li>May take GTSC 420s out on the water along with up to two crew members. <br />
                <strong>Note:</strong> If you are sailing at LLSC, then <strong>a lakehost must be present</strong>.</li>
        </ul>
	    <h2 class="style2">The Written Test:</h2>
	        <p>The GTSC Vice-Commodore maintains the dinghy written tests and test results. You may take the test any Thursday evening before one of our weekly meetings. If you would like to do this, please contact the Vice-Commodore in advance to make arrangements. The test focuses on parts of the boat, right of way rules, and points of sail. </p>
	        <h2 class="style2">	The On-The-Water Test:</h2>
	        <p>The on-the-water test involves demonstrating the following skills for a dinghy instructor:</p>
	        <ul>
	          <li><strong>Most important</strong>: Must be able to assess the conditions (wind, current, launch position, hazards) to determine whether you should go out based on your own skills and limitations. </li>
            </ul><ul>  
			  <li>Proper rigging (including knowledge of GTSC 420 equipment storage)</li>
              <li>Proper docking procedures </li>
              <li>Ability to skipper comfortably in moderate breeze (&gt; 12 knots)</li>
              <li>Ability to confidently direct crew in their responsibilities </li>
              <li>Proper tacking and jibing</li>
              <li>Points of sail </li>
              <li>Man overboard procedures</li>
              <li>Capsize recovery </li>
              <li>Proper de-rigging</li>
      </ul>
	  <p><A href="#Top">[Back to Top]</A></P>
	  </div>
	<div id="main">
			<a name="Windsurf" id="Windsurf"></a>	
	        <h3>Windsurf Qualification</h3>
	        <p class="style4">There are three steps involved in becoming windsurf qualified at GTSC: a written test, an on-the-water test, and a swim test. After passing these three tests, your instructor will send a formal recommendation to the executive board. If exec approves, you will be a windsurf qualified skipper. The end result of this process is that, as a windsurf qualified skipper, you may enjoy the priviledges described below and exec will add windsurf qualification to your GTSC Skipper card. </p>
	        <p class="style4">Windsurf qualified members of the club enjoy the following priviledges: </p>
	        <ul>
	          <li>May use windsurf equipment without instructor supervision</li>
              <li> May borrow windsurf equipment for use at locations other than LLSC following notification and approval of the executive board </li>
              <li>May use personal discretion to decide whether or not to use a lifejacket while windsurfing. <br />
                <strong>Note:</strong> All non-windsurf qualified members <strong>are required to wear lifejackets</strong> while using GTSC windsurf equipment.</li>
      </ul>
	    <h2 class="style2">The Written Test:</h2>
	        <p>The windsurf written test is provided by US Sailing and may be accessed online <a href="http://www.windsurfing.sailingcourse.com/windsurfing_test.htm" target="_blank">here</a>. If you take the test online, please print out a copy of the certificate you receive when you pass and bring it to exec during one of our regular weekly meetings. You may take a written version of the test any Thursday before our weekly meeting. If you would like to do this, please contact the Vice-Commodore in advance to make arrangements.</p>
	        <h2 class="style2">	The On-The-Water Test:</h2>
	        <p>The on-the-water test involves demonstrating the following skills for a windsurf instructor:</p>
	        <ul>
	          <li><strong>Most important</strong>: Must be able to assess the conditions (wind, current, launch position, hazards) to determine whether you should go out, and if so, what size sail you should use based on your own skills and limitations. </li>
            </ul><ul>  
			  <li>Proper rigging (including knowledge of GTSC windsurf equipment storage)</li>
              <li> Comfort maintaining the basic position</li>
              <li>Proper steering (in particular, ability to go up &amp; down wind)</li>
              <li> Points of sail</li>
              <li>Proper tacking and jibing</li>
              <li>Proper de-rigging (Note: Never de-rig on the sand. Always wash equipment with fresh water and allow sails to dry completely before putting away.) </li>
      </ul>
	        <h2 class="style2">The Swim Test:</h2>
	        <p>The swim test involves demonstrating the following physical skills for a windsurf instructor:</p>
	        <ul>
	          <li>Swim 25 yards  unassisted (without a lifejacket)</li>
              <li> Tread water for 5 minutes unassisted (without a lifejacket)</li>
              <li>Put a lifejacket on over your head while in the water </li>
      </ul>
	  <p><A href="#Top">[Back to Top]</A></P>
	  </div>
	  <div id="main">	
	  		<a name="Laser" id="Laser"></a>
			<h3>Laser Qualification</h3>
	         <p>Any GTSC dinghy skipper may become laser skipper qualified if they pass an on-the-water test given by a laser instructor. <span class="style4">If you pass the laser on-the-water test, your instructor will send a formal recommendation to the executive board. If exec approves then they will add laser qualification to your GTSC Skipper Card.  The end result of this process is that, as a laser qualified skipper, you may enjoy the priviledges described below.</span></p>
	         <p class="style4">Laser qualified members of the club enjoy the following priviledges: </p>
	         <ul>
	          <li>May use GTSC lasers and related equipment without instructor supervision</li>
              <li>May borrow laser equipment and trailer for use at locations other than LLSC following notification and approval of the executive board </li>
        </ul>
	    <h2 class="style2">Prerequisites:</h2>
	        <p>In order to become laser skipper qualified, you must first be GTSC dinghy (420) skipper qualified.</p>
			 <h2 class="style2">The On-The-Water Test:</h2>
	        <p>The on-the-water test involves demonstrating the following skills for a laser instructor:</p>
	        <ul>
	          <li><strong>Most important</strong>: Must be able to assess the conditions (wind, current, launch position, hazards) to determine whether you should go out in a laser based on your own skills and limitations. </li>
        </ul><ul>
          <li>Proper laser rigging (including knowledge of GTSC equipment storage)<br />
          <strong>Note:</strong> Laser rudders do not float; improper rigging may cause the mast to come out (and sink) if you capsize </li>
          <li>Proper docking procedures </li>
          <li>Ability to skipper comfortably in moderate breeze (&gt; 12 knots)</li>
          <li>Proper tacking and jibing</li>
          <li>Points of sail </li>
          <li>Capsize recovery </li>
          <li>Proper de-rigging</li>
      </ul>
	  <p><A href="#Top">[Back to Top]</A></P>
	  </div>
		<div id="main">	
			<a name="Hobie" id="Hobie"></a>	
			<h3>Hobie 16 Qualification</h3>
	         <p>Any GTSC dinghy skipper may become hobie skipper qualified if they pass an on-the-water test given by a hobie instructor. <span class="style4">If you pass the hobie on-the-water test, your instructor will send a formal recommendation to the executive board. If exec approves then they will add hobie qualification to your GTSC Skipper Card.  The end result of this process is that, as a hobie qualified skipper, you may enjoy the priviledges described below.</span></p>
	         <p class="style4">Hobie qualified members of the club enjoy the following priviledges: </p>
	         <ul>
	          <li>May use GTSC hobies and related equipment without instructor supervision</li>
              <li>May borrow hobie equipment and trailers for use at locations other than LLSC following notification and approval of the executive board </li>
        </ul>
	    <h2 class="style2">Prerequisites:</h2>
	        <p>In order to become hobie skipper qualified, you must first be GTSC dinghy (420) skipper qualified.</p>
			 <h2 class="style2">The On-The-Water Test:</h2>
	        <p>The on-the-water test involves demonstrating the following skills for a hobie instructor:</p>
	        <ul>
	          <li><strong>Most important</strong>: Must be able to assess the conditions (wind, current, launch position, hazards) to determine whether you should go out in a hobie based on your own skills and limitations. </li>
          </UL><UL>
		  <li>Proper hobie rigging (including knowledge of GTSC equipment storage) </li>
          <li>Proper docking procedures </li>
          <li>Ability to skipper comfortably in moderate breeze (&gt; 12 knots)</li>
          <li>Ability to confidently direct crew in their responsibilities</li>
          <li>Proper tacking and jibing</li>
          <li>Points of sail</li>
		  <li>Man overboard procedures</li>
          <li>Capsize recovery<br />
		  	<STRONG>Note: </STRONG>This is very different than the procedure on a 420. In addition, there are many techniques you must learn including:<br />
			- Using weight management to create correct alignment with the wind<br />
			- Recovery from turtle position<br />
			- Assistance techniques such as lifting the tip of the sail</li>
          <li>Proper de-rigging</li>
      </ul>
	  <p><A href="#Top">[Back to Top]</A></P>
	  </div>
		<div id="main">	
			<a name="J24" id="J24"></a>
			<h3>J-24 Qualification</h3>
	        <p class="style4">J24 requires a much higher level of qualificatio to become a skipper. There are two J24's available at LLSC for GT members to sail on. For more information on becoming qualified to sail on a J24 look at the important links to the right.</p>
			<p><A href="#Top">[Back to Top]</A></P>
		</div>	
		<div id="main">
			<a name="Zodiac" id="Zodiac"></a>		
			<h3>Zodiac Usage Policy</h3>
	        <p class="style4">GTSC keeps a small zodiac at LLSC in slot C-018. In order to use our zodiac you must meet the following criteria:</p>
	        <ul>
	          <li>You must be a GTSC lakehost</li>
              <li>You must have attended a lakehost orientation and been signed off by the Commodore to indicate that you have learned the necessary skills and safety regulations at that orientation.</li>
              <li>You may only use the zodiac for club sanctioned events such as instructing options students, running regattas, or on standby for emergencies during general sailing days. <br />
                <strong>Note:</strong> This is not for casual recreational use!</li>
          </ul>
		  <p><A href="#Top">[Back to Top]</A></P>
	<?php
	}
}

$page = new Qualification();
$page->actionShow();

?>
