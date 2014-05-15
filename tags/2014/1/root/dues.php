<?php
include('Container.php');

class ClubInfo extends Container {

	public function __construct() {
		$this->title = "Membership Dues";
		$this->self = "dues";
		$this->breadcrumbs = array( '/' => 'GTSailing', 'club_info.php' => 'Club Information', 'dues.php' => 'Dues' );
	}

	public function leftContent() {
	?>
	        <h3>Dues and other Membership Costs</h3>
	    <br/>
			<P>All GTSC members must pay dues every semester. Dues contribute to upkeep of boats and our participation in regional
			sailing events. Moreover, Georgia Tech funds the club according to the number of <i>dues-paying members</i>, so any contribution you make
			will be amplified by other sources.</p>
			<p>The following table is a breakdown of the membership fees:</P>
			<table width="427" border="1">
              <tr>
                <td width="211">&nbsp;</td>
                <td width="62"><div align="center"><strong>Fall</strong></div></td>
                <td width="52"><div align="center"><strong>Spring</strong></div></td>
                <td width="74"><div align="center"><strong>Summer</strong></div></td>
              </tr>
              <tr>
                <td><strong>Students</strong> (undergrad and grad) </td>
                <td><div align="center">$50.00</div></td>
                <td><div align="center">$50.00</div></td>
                <td><div align="center">$40.00</div></td>
              </tr>
              <tr>
                <td><strong>Faculty, staff, alumni </strong></td>
                <td><div align="center">$80.00</div></td>
                <td><div align="center">$80.00</div></td>
                <td><div align="center">$60.00</div></td>
              </tr>
            </table><br/>
            
		<h3>Means of Payment</h3>
		
	<br/>
		You may pay dues either in check mailed or delivered in person to any GTSailing club meeting.
		If mailing a check, please send to the following address:
		
		
		<p class="indent">Georgia Tech Sailing Club<BR>350292 Georgia Tech Station<BR>Atlanta, GA 30332</P>
		<br/>
		
    <br/>
				
	
	<?php
	}
	
	public function rightContent() {
	?>

	<?php
	}
}

$page = new ClubInfo();
$page->actionShow();

?>
