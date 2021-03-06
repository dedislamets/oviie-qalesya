<script type="text/javascript">
  var app = new Vue({
    el: "#app",
    mounted: function () {
      this.loadPosting();
      //this.loadComment();
      //this.loadRekap();
      this.loadinit();
      this.loadData();
    },
    updated: function () {
      var that = this;
      
    },
    data: {
      mode:'new',
      id: '<?= $this->input->get("id", TRUE) ?>', 
      list_posting: [],
      list_comment: [],
      list_rekap: [],
      status: 'Non Aktif',
      selected: false,
      format_order: 'KODE.QTY.IDMEMBER',
      token: '<?= $config['token'] ?>',
      id_group: '<?= $config['id_group'] ?>',
      total_rekap: 0,
      total_qty: 0
    },
    methods: {
      loadinit: function(){
        this.loadComment();
        this.loadRekap();
        
      },
      refresh(event){
        this.loadComment();
        this.loadRekap();
      },
      showModal: function(){
        $("#Modal").modal({backdrop: 'static', keyboard: false}) ;  
      },
      loadPosting: function(){
        var that = this;
        var sParam = { access_token : that.token};
        // var link = 'https://graph.facebook.com/' + that.id + '?fields=full_picture,message,story,created_time';
        var link = 'https://graph.facebook.com/' + that.id ;

        $.get(link,sParam, function(data){
          that.list_posting=data;
        },'json');
      },
      loadRekap: function(){
        var that = this;
        $.get('<?= base_url()?>comment/rekap', {id: that.id}, function(data){ 
          console.log('rekap');
          that.list_rekap = data.data;
          that.total_rekap =  data.total_rekap;
          that.total_qty =  data.total_qty;
        })
      },
      saveData: function(){
        var that = this;
        const status = (that.selected ? 'Aktif' : 'Non Aktif');
        const param = { id: that.id, format_order: that.format_order, status: status };
        axios.post("<?= base_url()?>comment/update", param)
        .then(response => {
          $("#Modal").modal('hide');
          that.loadData();
        });
      },
      createStr(item) {
        item = item.replace("height=\"1280\"", "height=\"400\"");
        item = item.replace("height=\"896\"", "height=\"400\"");
        item = item.replace("height=\"1920\"", "height=\"400\"");
        item = item.replace("width=\"720\"", "width=\"220\"");
        item = item.replace("width=\"1080\"", "width=\"220\"");
        return item;
      },
      loadData: function(){
        var that = this;
        var article = { id: that.id };
  
        axios.get("<?= base_url()?>comment/data", { params: article })
        .then(response => {
          that.status = response.data.status;
          that.format_order = response.data.format_order;
          if(response.data.status == 'Aktif'){
            that.selected = true;
          }else{
            that.selected = false;
          }
        });

        // $.get('<?= base_url()?>comment/data', {id: that.id}, function(data){ 
        //   that.status = data.status;
        //   that.format_order = data.format_order;
        //   if(data.status == 'Aktif'){
        //     that.selected = true;
        //   }else{
        //     that.selected = false;
        //   }
        // })
      },
      async nextComment(url){
        var that = this;

        try{
          await axios.get(url, null)
          .then(next_data => {
            console.log('next');
            that.list_comment = that.list_comment.concat(next_data.data.data);
            if(next_data.data.paging.next != undefined){
              that.nextComment(next_data.data.paging.next);
            }else{
              if(that.status == 'Aktif'){
                $.each(that.list_comment, function(_, obj) {
                  //if(obj.message.trim().split(/\s/g).length === 1) {
                  if(obj.message.trim().toUpperCase().includes('MAU')){
                    //var arr = obj.message.trim().split(".");
                    $.get('<?= base_url() ?>register/rekap',{ kode : obj.message.trim(), pesan : obj.message.trim(), id_posting: that.id }, function(result){
                        // alert(result);
                    })
                  }
                })
              }

              setInterval(function () {
                that.getOnlyLastComment();
                that.loadRekap();
              }, 10000);
              
            }
          })
        }catch(e){

        }

    
      },
      async getOnlyLastComment(){
        var that = this;
        var sParam = { access_token : that.token,order : 'reverse_chronological', limit: 5};

        try{
          await axios.get('https://graph.facebook.com/' + that.id + '/comments', { params: sParam })
          .then(next_data => {
            console.log('last comment');
            // that.list_comment = that.list_comment.concat(next_data.data.data);

            var ids = new Set(that.list_comment.map(d => d.id));
            var merged = [...that.list_comment, ...next_data.data.data.filter(d => !ids.has(d.id))];
            merged = merged.sort(function(a,b) {
                return moment(b.created_time)-moment(a.created_time)
            });
            console.log(merged);
            that.list_comment = merged;
            if(that.status == 'Aktif'){
              $.each(next_data.data.data, function(_, obj) {
                //if(obj.message.trim().split(/\s/g).length === 1) {
                if(obj.message.trim().toUpperCase().includes('MAU')){
                  //var arr = obj.message.trim().split(".");
                  $.get('<?= base_url() ?>register/rekap',{ kode : obj.message.trim(), pesan : obj.message.trim(), id_posting: that.id }, function(result){
                      // alert(result);
                  })
                }
              })
            }
            
          })
        }catch(e){

        }

    
      },
      async loadComment(){
        var that = this;
        var sParam = { access_token : that.token,order : 'reverse_chronological'};
        try {
          await axios.get('https://graph.facebook.com/' + that.id + '/comments', { params: sParam })
          .then(response => {
            console.log('comment');
            that.list_comment=response.data.data;
            if(response.data.paging.next != undefined){
              that.nextComment(response.data.paging.next);
            }else{
              if(that.status == 'Aktif'){
                $.each(that.list_comment, function(_, obj) {
                  //if(obj.message.trim().split(/\s/g).length === 1) {
                  if(obj.message.trim().toUpperCase().includes('MAU')){
                    //var arr = obj.message.trim().split(".");
                    $.get('<?= base_url() ?>register/rekap',{ kode : obj.message.trim(), pesan : obj.message.trim(), id_posting: that.id }, function(result){
                        // alert(result);
                    })
                  }
                })
              }

              setInterval(function () {
                that.getOnlyLastComment();
                that.loadRekap();
              }, 10000);
            }
          });

        }catch(e) {
          alert(e);
        }
      },
    
    }
  });
</script>