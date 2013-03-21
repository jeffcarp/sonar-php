<div class="sidebar">

	<script src="http://widgets.twimg.com/j/2/widget.js"></script>
	<script>
	new TWTR.Widget({
	  version: 2,
	  type: 'profile',
	  rpp: 4,
	  interval: 30000,
	  width: 'auto',
	  height: 300,
	  theme: {
	    shell: {
	      background: '#0a4189',
	      color: '#ffffff'
	    },
	    tweets: {
	      background: '#cccccc',
	      color: '#000000',
	      links: '#0a4189'
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
	}).render().setUser('thecolbyecho').start();
	</script>
	
</div>