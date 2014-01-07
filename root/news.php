<?php
include('Container.php');

class News extends Container {

	public function __construct() {
		$this->title = "News";
		$this->self = "news";
		$this->breadcrumbs = array( '/' => 'GTSailing', 'news.php' => 'News' );
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
	<h3>Latest News and Information</h3>
<script src="http://widgets.twimg.com/j/2/widget.js"></script>
<script>
new TWTR.Widget({
  version: 2,
  type: 'profile',
  rpp: 10,
  interval: 6000,
  width: 550,
  height: 600,
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
			<p><a href="http://www.twitter.com/gtsailing">Follow  @gtsailing on 
			<img src="http://twitter-badges.s3.amazonaws.com/twitter-a.png" alt="Follow gtsailing on Twitter"/></a>
			</p>
	<?php
	}
}

$page = new News();
$page->actionShow();

?>
