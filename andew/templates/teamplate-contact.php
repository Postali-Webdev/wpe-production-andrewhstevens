<?php
/* Template Name: Contact */
get_header();
get_template_part('inc/inner', 'banner');
?>
<?php
$consultation = get_field('consultation');
$heading = $consultation['heading'];
$logo = $consultation['logo'];
$content = $consultation['content'];
$call_title = $consultation['call_title'];
$call_phone = $consultation['call_phone'];
$office = $consultation['office'];
$location = $consultation['location'];
$direction = $consultation['direction'];
$caster_office = $consultation['caster_office'];
$caster_location = $consultation['caster_location'];
$caster_direction = $consultation['caster_direction'];
$form = $consultation['form'];
if ($consultation):
 ?>
 
<div class="contact-us-section space-pd">	        
        <div class="container">
		<div class="bg-contact-color">
          <div class="row">
		
                <div class="col-lg-6">
                    <div class="contact-page-color">
                        <div class="heading-sc contact-heading"> 
						<h2><?php echo $heading; ?> </h2>
						</div>                                        
						<div class="subheading-content"><?php echo $content; ?></div>
                        <div class="fax-area">
                            <div class="phone-area">
                                <?php echo wp_get_attachment_image($logo['ID'], 'full', '', array('class' => ' d-block')); ?>
								<div class="content-flex">
                                <div class="address "> <?php echo $call_title; ?></div>
								<div class="call-number "> <?php echo $call_phone; ?></div>
                                </div> 
								</div>								
                        </div>
						<div class="common-area">
						<div class="office-flex">
						<div class="office-name">
						<?php echo $office; ?>
						</div>
						<div class="location">
						<?php echo $location; ?>
						</div>
						<div class="direction">
						<?php echo $direction; ?>
						</div>
						</div>
						
						
						<div class="caster-office">
						<div class="office-name">
						<?php echo $caster_office; ?>
						</div>
						<div class="location">
						<?php echo $caster_location; ?>
						</div>
						<div class="direction">
						<?php echo $caster_direction; ?>
						</div>
						</div>
						</div>
                    </div>
                </div>	
				
				<div class="col-lg-6">
					<div class="form-code">
					<?php echo do_shortcode( '[contact-form-7 id="601c171" title="Contact Form"]' ); ?>
					</div>
					</div>
                
            </div>  
</div>			
      </div>
    </div>  



<?php endif; ?>


<?php
$map = get_field('map');
$iframe = $map['iframe'];
if ($map):
    ?>
    <div class="iframesection">	        
            <div class="row gx-0">
                <div class="col-lg-12 wow fadeInDown">
                        <div class="map-location">
                            <?php echo $iframe; ?>
                        </div>                    
                    
                </div>				                
            </div>   
    </div>  
<?php endif; ?>




<?php get_footer(); ?>