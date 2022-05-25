<script type="text/javascript">
  var app = new Vue({
    el: "#app",
    mounted: function () {
      this.loadPosting();
    },
    updated: function () {
      var that = this;
      
    },
    data: {
      mode:'new',
      list_posting: [],
      list_scan: [],
      token: '<?= $config['token'] ?>',
      id_group: '<?= $config['id_group'] ?>'
    },
    methods: {
      	loadPosting: function(){
	        var that = this;
	        var sParam = { access_token : that.token};
	        // var link = 'https://graph.facebook.com/' + that.id_group + '/feed?fields=message,story,id,created_time,full_picture';
	        var link = 'https://graph.facebook.com/me/live_videos?fields=title,embed_html,id,creation_time'
	        $.get(link,sParam, function(data){  
	          that.list_posting=data.data;
	        },'json');
      	},
    	createStr(item) {
    		item = item.replace("height=\"1280\"", "height=\"400\"");
        item = item.replace("height=\"896\"", "height=\"400\"");
        item = item.replace("height=\"1920\"", "height=\"400\"");
    		item = item.replace("width=\"720\"", "width=\"220\"");
        item = item.replace("width=\"1080\"", "width=\"220\"");
	      return item;
	    },
    }
  });
</script>