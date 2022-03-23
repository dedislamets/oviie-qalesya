<div class="sh-breadcrumb">
  <nav class="breadcrumb">
    <a class="breadcrumb-item" href="index.html">Home</a>
    <span class="breadcrumb-item active">Posting & Comment</span>
  </nav>
</div><!-- sh-breadcrumb -->

<div  class="sh-pagebody">
  <div class="row row-sm">

    <template v-for="(log, index) in list_posting">
      <div class="col-lg-12 col-xl-4 mt-2">
        <section class="activities">
          <!-- <h2 class="ml-3">Recent Posting</h2> -->
          
          <section class="event">
              <span class="thumb avatar float-left mr-sm">
                  <img class="rounded-circle" src="<?= base_url() ?>assets/main/img/img9.jpg" alt="...">
              </span>
              <h5 class="event-heading">{{ log.title }}</h5>
              <p class="text-muted fs-sm mt-2 fs-sm">Posting date: <a href="#">{{ moment(log.creation_time).fromNow() }}</a></p>
              <p class="event-post" v-html="createStr(log.embed_html)">
                
              </p>
              <div ></div>

              <footer>
                  <ul class="post-links">
                      <!-- <li><a href="#">1 hour</a></li> -->
                      <!-- <li><a href="#"><span class="text-danger"><i class="fa fa-heart"></i> Like</span></a></li> -->
                      <li><a :href="'<?= base_url()?>comment?id=' +log.id" class="btn btn-success pd-sm-x-20 mg-sm-r-5">Lihat Comment</a></li>
                  </ul>
              </footer>
          </section>
          
        </section>
      </div>
    </template>
  </div><!-- row -->
</div><!-- sh-pagebody -->