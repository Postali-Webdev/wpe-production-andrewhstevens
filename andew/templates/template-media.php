<?php
/* Template Name: Meadia Page */
get_header();
get_template_part('inc/inner', 'banner');
?>

<?php
$media = get_field('media');
$title = $media['title'];
$media_content = $media['media_content'];
if ($media_content):
	?>
	<div class="media-info space-pd">
		<div class="container">
			<div class="row mb-4 justify-content-center">
				<div class="col-lg-12 text-center">
					<?php if ($title): ?>
						<div class="heading-sc">
							<h2><?php echo $title; ?></h2>
						</div><?php endif; ?>
				</div>
			</div>

			<div class="row gy-4 justify-content-center row2">
				<?php
				foreach ($media_content as $data) {
					$image = $data['image'];
					$heading = $data['heading'];
					$v_link = $data['v_link'];
					?>
					<div class="col-md-6 col-xl-4">
						<div class="top-box">
							<?php if ($v_link) { ?>
								<div class="media_img overflow-hidden">
									<a href="<?php echo $v_link; ?>" class="html5lightbox Custom-boxes position-relative">
										<?php echo wp_get_attachment_image($image['ID'], 'full', '', array('class' => '')); ?>
										<svg xmlns="http://www.w3.org/2000/svg" width="68" height="68" viewBox="0 0 68 68"
											fill="none">
											<g filter="url(#filter0_d_16_1054)">
												<rect x="4" width="60" height="60" rx="30" fill="#C9A95F"
													shape-rendering="crispEdges" />
												<path fill-rule="evenodd" clip-rule="evenodd"
													d="M28.7245 23.9667C28.747 23.7775 28.8134 23.5961 28.9183 23.437C29.0232 23.2779 29.1637 23.1455 29.3288 23.0503C29.4938 22.9551 29.6788 22.8997 29.869 22.8885C30.0592 22.8773 30.2495 22.9106 30.4245 22.9858C31.3095 23.3642 33.2929 24.2633 35.8095 25.7158C38.327 27.1692 40.0979 28.4383 40.867 29.0142C41.5237 29.5067 41.5254 30.4833 40.8679 30.9775C40.1062 31.55 38.357 32.8025 35.8095 34.2742C33.2595 35.7458 31.2995 36.6342 30.4229 37.0075C29.6679 37.33 28.8229 36.8408 28.7245 36.0267C28.6095 35.075 28.3945 32.9142 28.3945 29.9958C28.3945 27.0792 28.6087 24.9192 28.7245 23.9667Z"
													fill="#292929" />
											</g>
											<defs>
												<filter id="filter0_d_16_1054" x="0" y="0" width="68" height="68"
													filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
													<feFlood flood-opacity="0" result="BackgroundImageFix" />
													<feColorMatrix in="SourceAlpha" type="matrix"
														values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
													<feOffset dy="4" />
													<feGaussianBlur stdDeviation="2" />
													<feComposite in2="hardAlpha" operator="out" />
													<feColorMatrix type="matrix"
														values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
													<feBlend mode="normal" in2="BackgroundImageFix"
														result="effect1_dropShadow_16_1054" />
													<feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_16_1054"
														result="shape" />
												</filter>
											</defs>
										</svg>
									</a>
								</div>
								<a href="<?php echo $v_link; ?>" class="html5lightbox Custom-boxes position-relative">

									<?php if ($heading): ?>
										<div class="media-heading"><?php echo $heading; ?></div><?php endif; ?>
								</a>
							<?php } ?>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>

<?php endif; ?>



<?php get_template_part('inc/home/meet-sec'); ?>



<?php get_footer(); ?>