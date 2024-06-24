<!-- Page top section  -->
<section class="page-top-section set-bg" data-setbg="<?php echo base_url()?>/assets/front2/img/page-top-bg/1.jpg">
		<div class="container">
			<div class="row">
				<div class="col-lg-7">
					<h2>PERATURAN PERIZINAN</h2>
				</div>
			</div>
		</div>
	</section>
	<!-- Page top section end  -->


	<!-- Services section  -->
	<section class="services-2-section spad">
			<div class="container">
				<div class="service-text">
					<h2>PERATURAN PERIZINAN DPMPTSP KABUPATEN KOLAKA TIMUR</h2>
				</div>
			</div>
		</section>
		<!-- Services section end  -->
	
		<!-- Reserch section  -->
		<section class="reserch-section spad">
			<div class="container">
				<div class="row">
					<div class="col-lg-4">
						<ul class="nav nav-tabs reserch-tab-menu" role="tablist">
						<?php
						$no = 1;
						foreach($rules as $s) {
						?>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tab-<?php echo $no?>" role="tab" aria-controls="tab-1" 
								aria-selected="true"><?php echo $s->rules_name?></a>
							</li>
							
						<?php
							$no++;
						}
						?>
						</ul>
					</div>
					<div class="col-lg-8">
						<div class="tab-content reserch-tab">
							<!-- single tab content -->
							
							<?php
								$no = 1;
								foreach($rules as $s) {
								?>
								<div class="tab-pane fade show" id="tab-<?php echo $no?>" role="tabpanel" aria-labelledby="<?php echo $no?>">
								<h2><?php echo $s->rules_name?></h2> 
								<br>
								<br>

								<p>
									<a href="<?php echo base_url("upload/rules/").$s->rules_file?>" class="site-btn" target="_blank">Download Dokumen</a>
								</p>
								</div>

								<?php
									$no++;
								}
								?>
								
								</div>
							
							
						</div>
					</div>
					
				</div>
			</div>
		</section>
		<!-- Reserch section end  -->