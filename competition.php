<?php
include('Container.php');

class Competition extends Container {

	public function __construct() {
		$this->title = "Competition";
		$this->self = "competition";
		$this->breadcrumbs = array( '/' => 'GTSailing',
			'competition.php' => 'Competition' );
	}

	public function leftContent() {
	?>
		<h3>Competition</h3>
		<p>Sailing isn't just about recreation, there is a huge scene of racing to test your skills, wit, endurance, and knowledge. Branching from small dinghy's such as lasers and 420's on inland lakes all the way to massive keel boats sailling across the oceans. Sail boat races happen almost every week at GTSailing, Wednesday Night's at LLSC, Weekend J24, Laser, 420, and Windersurfing are all events that one can partake in!</p>
		<h3>Race Team</h3>
		<p>GT Race Team is a sanctioned sport's team at GATech with a very active team. We race against colleges all over the country from FSU, NCState, Auburn, Eckard, Duke, and the list goes on. (PS: UGA sails too :D ). The race team travels from event to event leaving from GT's Atlanta Campus and enter in mainly SAISA sporting events around the south east. If your interested come to a monday meeting, check out the SAISA link to the right, and look at events on the GTCalendar</p> 
		<h3>Keelboat Races</h3>
		<p>GTSailing owns 2 J24 keelboats that are docked at LLSC. Wednesday night racing is an amazing escape from the rigors of city life where you can relax but with a sweet twist of friendly competition. Also there is a huge J24 regatta scene across the nation were we can trailer one of our J24's.</p>
		<h3>Questions?</h3>
		<p>E-mail us by checking out the contacts page (we have a raceteam captain too!), look at the GTCalendar, and come to club meetings. PS: We do have a trophy case!</p>
		
	<?php
	}

	public function rightContent() {
	?>
		<h3>Important Links</h3>
		<ul>
			<li><a href="http://home.ussailing.org/">US Sailing</a></li>
			<li><a href="http://www.collegesailing.org/saisa/">SAISA</a></li>
		</ul>		
	<?php
	}
}

$page = new Competition();
$page->actionShow();

?>
