<!-- Page top section  -->
<section class="page-top-section set-bg" data-setbg="<?php echo base_url()?>/assets/front2/img/page-top-bg/3.jpg">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2>Berita dan Informasi Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu</h2>
				
				</div>
			</div>
		</div>
	</section>
	<!-- Page top section end  -->

	<!-- Blog section  -->
	<section class="blog-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-6 sidebar order-2 order-lg-1">
					<div class="sb-widget">
						<form class="sb-search">
							<input type="text" placeholder="Search">
							<button><i class="fa fa-search"></i></button>
						</form>
					</div>
					<div class="sb-widget">
						<h2 class="sb-title">Kategori</h2>
						<ul>
						<?php
							foreach($news_category as $c) {
						?>
							<li><a href="<?php echo site_url('front/beritacategory/').$c->news_category_id?>"><?php echo $c->news_category_name?></a></li>
						<?php
							}
						?>
							
						</ul>
					</div>
					<div class="sb-widget">
						<h2 class="sb-title">Berita Lainnya</h2>
						<div class="recent-post">
							<div class="rp-item">
								<!-- <img src="img/blog/recent-post/1.jpg" alt=""> -->
								<!-- <img src="img/blog/recent-post/1.jpg" alt=""> -->
								<div class="rp-text">
									<p>BKPM Uji Coba OSS Versi Baru Untuk 60 Perusahaan</p>
									<div class="rp-date">08 November 2019</div>
								</div>
							</div>
							<div class="rp-item">
								<!-- <img src="img/blog/recent-post/2.jpg" alt=""> -->
								<div class="rp-text">
									<p>Peluncuran Izin Instan Online Single Submission Tunggu Jokowi</p>
									<div class="rp-date">08 November 2019</div>
								</div>
							</div>
							<div class="rp-item">
								<!-- <img src="img/blog/recent-post/3.jpg" alt=""> -->
								<div class="rp-text">
									<p>Ini Keunggulan OSS Versi Terbaru</p>
									<div class="rp-date">09 November 2019</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-8 order-1 order-lg-2">

					<?php
						foreach($news as $n) {
					?>
					<div class="blog-post">
						<div class="blog-thumb set-bg" data-setbg="<?php echo base_url()?>/upload/news/<?php echo $n->news_picture?>">
							<div class="blog-date"><?php echo $n->news_date?></div>
						</div>
						<div class="blog-metas">
							<div class="blog-meta meta-author">by <a href=""><?php echo $n->user_name?></a></div>
							<div class="blog-meta meta-cata">in <a href=""><?php echo $n->news_category_name?></a></div>
						</div>
						<h2><?php echo $n->news_title?></h2>
						<?php echo $n->news_text?>
						<br>
						
					</div>
					<?php
						}
					?>

					
					
				</div>
			</div>
		</div>
	</section>
	<!-- Blog section end  -->