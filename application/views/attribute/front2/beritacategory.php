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
						<a href="detailberita.html" class="site-btn read-more">Selengkapnya</a>
					</div>
					<?php
						}
					?>

					
					<!-- <div class="blog-post">
						<div class="blog-thumb set-bg" data-setbg="<?php echo base_url()?>/assets/front2/img/blog/2.jpg">
							<div class="blog-date">08 Feb, 2019</div>
						</div>
						<div class="blog-metas">
								<div class="blog-meta meta-author">by <a href="">Admin</a></div>
								<div class="blog-meta meta-cata">in <a href="">Info Terkini</a></div>
								<div class="blog-meta meta-comment"><a href="">3 Komentar</a></div>
						</div>
						<h2>BKPM Uji Coba OSS Versi Baru Untuk 60 Perusahaan</h2>
						<p>Penulis Murti Ali Lingga | Editor Sakina Rakhma Diah Setiawan JAKARTA, KOMPAS.com - Deputi Bidang Pelayanan Penanaman Modal Badan Koordinasi Penanaman Modal ( BKPM) Husen Maulana, mengatakan pihaknya akan melakukan uji coba layanan perizinan Online Single Submission ( OSS) versi 1.1 pada Rabu (4/9/2019) mendatang. Versi ini merupakan pengembangan OSS 0.1 yang dianggap masih perlu penyempurnaan. "Mudah-mudahan September ini diluncurkan, mudah-mudahan besok kalau ada error sedikit ya, bisa langsung diperbaiki," kata Husen di Kantor BKPM, Jakarta, Senin (2/9/2019). Husen menjelaskan, awalnya rencana peluncuran OSS versi baru dilakukan pertengahan bulan lalu. Gunanya memantapka ...
							</p><a href="detailberita.html" class="site-btn read-more">Selengkapnya</a>
					</div>
					<div class="blog-post">
						<div class="blog-thumb set-bg" data-setbg="<?php echo base_url()?>/assets/front2/img/blog/3.jpg">
							<div class="blog-date">08 Feb, 2019</div>
						</div>
						<div class="blog-metas">
								<div class="blog-meta meta-author">by <a href="">Admin</a></div>
								<div class="blog-meta meta-cata">in <a href="">Info Terkini</a></div>
								<div class="blog-meta meta-comment"><a href="">3 Komentar</a></div>
						</div>
						<h2>Ini Keunggulan OSS Versi Terbaru</h2>
						<p>
								Badan Koordinasi Penanaman Modal (BKPM) akan meluncurkan versi upgrade dari aplikasi Online Single Submission (OSS) yang lama dengan nama OSS v 1.1 pada tahun ini.

								Edi Suwiknyo - Bisnis.com15 Agustus 2019  |  14:20 WIB
								
								Bisnis.com, JAKARTA - Badan Koordinasi Penanaman Modal (BKPM) akan meluncurkan versi upgrade dari aplikasi Online Single Submission (OSS) yang lama dengan nama OSS v 1.1 pada tahun ini.
								
								Dalam aplikasi OSS yang baru, proses registrasi akun akan makin mudah karena sudah menyediakan penjelasan mengenai definisi jenis usa ...
						
						</p><a href="detailberita.html" class="site-btn read-more">Selengkapnya</a>
					</div> -->
					<div class="site-pagination">
						<a href="" class="current">01.</a>
						<a href="">02.</a>
						<a href="">03.</a>
						<a class="next" href="">Next</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Blog section end  -->