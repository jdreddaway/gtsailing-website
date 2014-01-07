<?php
include('Container.php');

class Calendar extends Container {

	public function __construct() {
		$this->title = "Calendar";
		$this->self = "calendar";
		$this->breadcrumbs = array( '/' => 'GTSailing', 'calendar.php' => 'Calendar' );
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
	/*
		// this was the Yahoo calendar
			<iframe src="http://www.google.com/calendar/embed?showTitle=0&amp;height=600&amp;wkst=1&amp;bgcolor=%23ccccff&amp;src=sailinggt%40yahoo.com&amp;color=%2329527A&amp;ctz=America%2FNew_York" style=" border-width:0 " width="650" height="600" frameborder="0" scrolling="no"></iframe>
	*/
	?>
<iframe src="https://www.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=iv8hrg6d9s97j1pj5ot97d2pu0%40group.calendar.google.com&amp;color=%238C500B&amp;src=vuo1b9d0onu6u4kh462ah1sn2vp3dlev%40import.calendar.google.com&amp;color=%235229A3&amp;ctz=America%2FNew_York" style=" border-width:0 " width="655" height="600" frameborder="0" scrolling="no"></iframe>	<?php
	}
}

$page = new Calendar();
$page->actionShow();

?>
