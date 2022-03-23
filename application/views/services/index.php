<style type="text/css">
	@media (max-width: 575px){
		.about-low-area {
		     display: block; 
		     padding: 20px;
		}

		.inner-content {
		    padding: 0px !important;
		}
	}
	.sec-title h2 {
	    font-size: 48px;
	    margin-bottom: 88px;
	}
	.sec-title.center {
	    text-align: center;
	}

	.sec-title {
	    position: relative;
	    display: block;
	}
	.inner-content {
	    position: relative;
	    margin: 0px -15px;
	    padding: 0px 60px;
	}
	.news-block {
	    padding: 0px 30px;
	}
	.inner-box {
	    position: relative;
	    display: block;
	    text-align: center;
	}
	.inner-box .image-box {
	    position: relative;
	    overflow: hidden;
	    background: #086ad8;
	    border: 1px solid #d7d7d7;
	    border-radius: 20px;
	}
	.inner-box .image-box img {
	    width: 100%;
	    transform: scale(1.01);
	    border-radius: 20px;
	    transition: all 500ms ease;
	}
	.inner-box .lower-content {
	    position: relative;
	    overflow: hidden;
	    background: #fff;
	    margin: 0px 30px;
	    box-shadow: 0 5px 30px 0px rgb(0 0 0 / 10%);
	    border-bottom-right-radius: 20px;
	    border-bottom-left-radius: 20px;
	    padding: 23px 30px 20px 30px;
	}
	.news-block-two:hover .inner-box .lower-content:before {
	    height: 100%;
	    top: 0px;
	}
	.news-block-two .inner-box .lower-content:before {
	    position: absolute;
	    content: '';
	    background: #086ad8;
	    width: 100%;
	    height: 0%;
	    left: 0px;
	    bottom: 0px;
	    transition: all 500ms ease;
	}
	.news-block-two .inner-box .lower-content .post-date {
	    position: relative;
	    font-size: 16px;
	    margin-bottom: 6px;
	    transition: all 500ms ease;
	}
	.news-block-two .inner-box .lower-content h3 {
	    position: relative;
	    display: block;
	    font-size: 24px;
	    line-height: 36px;
	    font-weight: 500;
	    color: #222;
	}
	.news-block-two:hover .inner-box .lower-content h3, .news-block-two:hover .inner-box .lower-content .post-date, .news-block-two:hover .inner-box .lower-content h3 a {
	    color: #fff;
	}
	.news-block-two{
		margin-bottom: 50px;
	}
</style>
<div class="slider-area ">
	<div class="single-slider hero-overly slider-height2 d-flex align-items-center" data-background="assets/img/hero/about.jpg">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="hero-cap">
						<h2>Services</h2>
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
								<li class="breadcrumb-item"><a href="#">Services</a></li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="about-low-area section-padding30">
	<div class="container">
		<div class="sec-title center"><h2>Our Services</h2></div>
		<div class="inner-content">
			<div class="row">
	            <div class="col-lg-4 col-md-6 col-sm-12 news-block">
	                <div class="news-block-two wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
	                    <div class="inner-box">
	                        <figure class="image-box"><a href="#"><img src="<?= base_url() ?>assets/img/news2.jpg" alt=""></a></figure>
	                        <div class="lower-content">
	                            <h3><a href="#">AIR SERVICES</a></h3>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-lg-4 col-md-6 col-sm-12 news-block">
	                <div class="news-block-two wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 300ms; animation-name: fadeInUp;">
	                    <div class="inner-box">
	                        <figure class="image-box"><a href="#"><img src="<?= base_url() ?>assets/img/news1.jpg" alt=""></a></figure>
	                        <div class="lower-content">
	                            <h3><a href="#">LAND SERVICES</a></h3>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-lg-4 col-md-6 col-sm-12 news-block">
	                <div class="news-block-two wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 0ms; animation-name: fadeInUp;">
	                    <div class="inner-box">
	                        <figure class="image-box"><a href="#"><img src="<?= base_url() ?>assets/img/news3.jpg" alt=""></a></figure>
	                        <div class="lower-content">
	                            <h3><a href="#">SEA SERVICE</a></h3>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-lg-4 col-md-6 col-sm-12 news-block">
	                <div class="news-block-two wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 300ms; animation-name: fadeInUp;">
	                    <div class="inner-box">
	                        <figure class="image-box"><a href="#"><img src="<?= base_url() ?>assets/img/exim.png" alt=""></a></figure>
	                        <div class="lower-content">
	                            <h3><a href="#">TRADING AND EXPORT IMPORT</a></h3>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-lg-4 col-md-6 col-sm-12 news-block">
	                <div class="news-block-two wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 300ms; animation-name: fadeInUp;">
	                    <div class="inner-box">
	                        <figure class="image-box"><a href="#"><img src="<?= base_url() ?>assets/img/news5.jpg" alt=""></a></figure>
	                        <div class="lower-content">
	                            <h3><a href="#">SERVICE INDUSTRY</a></h3>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-lg-4 col-md-6 col-sm-12 news-block">
	                <div class="news-block-two wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 300ms; animation-name: fadeInUp;">
	                    <div class="inner-box">
	                        <figure class="image-box"><a href="#"><img src="<?= base_url() ?>assets/img/news-image3.jpg" alt=""></a></figure>
	                        <div class="lower-content">
	                            <h3><a href="#">INT’L LOGISTICS & FREIGHT FORWARDER</a></h3>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-lg-4 col-md-6 col-sm-12 news-block">
	                <div class="news-block-two wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 300ms; animation-name: fadeInUp;">
	                    <div class="inner-box">
	                        <figure class="image-box"><a href="#"><img src="<?= base_url() ?>assets/img/licenses.png" alt=""></a></figure>
	                        <div class="lower-content">
	                            <h3><a href="#">SERVICE LICENSE</a></h3>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-lg-4 col-md-6 col-sm-12 news-block">
	                <div class="news-block-two wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 300ms; animation-name: fadeInUp;">
	                    <div class="inner-box">
	                        <figure class="image-box"><a href="#"><img src="<?= base_url() ?>assets/img/sbu.jpeg" alt=""></a></figure>
	                        <div class="lower-content">
	                            <h3><a href="#">STRATEGIC BUSINESS UNIT</a></h3>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-lg-4 col-md-6 col-sm-12 news-block">
	                <div class="news-block-two wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 300ms; animation-name: fadeInUp;">
	                    <div class="inner-box">
	                        <figure class="image-box"><a href="#"><img src="<?= base_url() ?>assets/img/projects-002-1.jpg" alt=""></a></figure>
	                        <div class="lower-content">
	                            <h3><a href="#">PROJECT CONSULTING</a></h3>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-lg-4 col-md-6 col-sm-12 news-block">
	                <div class="news-block-two wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 300ms; animation-name: fadeInUp;">
	                    <div class="inner-box">
	                        <figure class="image-box"><a href="#"><img src="<?= base_url() ?>assets/img/packing_dangerous_goods_desktop.jpg" alt=""></a></figure>
	                        <div class="lower-content">
	                            <h3><a href="#">WAHANA DGPACK</a></h3>
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="col-lg-4 col-md-6 col-sm-12 news-block">
	                <div class="news-block-two wow fadeInUp animated" data-wow-delay="300ms" data-wow-duration="1500ms" style="visibility: visible; animation-duration: 1500ms; animation-delay: 300ms; animation-name: fadeInUp;">
	                    <div class="inner-box">
	                        <figure class="image-box"><a href="#"><img src="<?= base_url() ?>assets/img/eCommerce-Warehousing.jpg" alt=""></a></figure>
	                        <div class="lower-content">
	                            <h3><a href="#">OTHER SERVICE</a></h3>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</div>