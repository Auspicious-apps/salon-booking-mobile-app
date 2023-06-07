<?php
/* Template Name: our app*/
get_header();
?>
<main class="main-section">
		<section class="banner">
			<div class="banner-image">
            <?php
$hero = get_field('banner_section');?>
				<img src="<?php echo esc_url( $hero['banner_image']['url'] ); ?>" alt="<?php echo esc_attr( $hero['banner_image']['alt'] ); ?>">
			</div>
			<div class="banner-content">
						<div class="container">
							<div class="heading-content">
									<div class="heading-text">	
										<h1><?php echo $hero['banner_title'];?></h1>
										<p><?php echo $hero['banner_text'];?></p>
									</div>
									<div class="social-media">
										<img src="<?php echo esc_url( $hero['apple_image']['url'] ); ?>" alt="<?php echo esc_attr( $hero['apple_image']['alt'] ); ?>">
										<img src="<?php echo esc_url( $hero['google_image']['url'] ); ?>" alt="<?php echo esc_attr( $hero['google_image']['alt'] ); ?>">
									</div>
						   </div>
				       </div>	
			</div>
		</section>
	   <section class="Online--Appointment">
		<div class="container">
			<div class="Appointment-section">
				<div class="Appointment-text">
                <?php 
$app_development_section = get_field('app_development_section');?> 
					<h2 class="main--heading"><?php echo $app_development_section['app_title'];?></h2>
					<p><?php echo $app_development_section['app_content'];?></p>
						<div class="button-new">
                        <?php 
                        $link = $app_development_section['app_button_link'];
                        if( $link ): 
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                        <a  href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo            $app_development_section['app_button_text'];?></a>
                        <?php endif; ?>
							
						</div>
				</div>
				<div class="Online-Appointment-img">
                
					<img src="<?php echo esc_url( $app_development_section['app_image']['url'] ); ?>" alt="<?php echo esc_attr( $app_development_section['app_image']['alt'] ); ?>">
				</div>
		    </div>
	  </div>
	</section>

	<section class="about-section">
		<div class="container">
			<div class="Appointment-section img--left">
				<div class="Appointment-text">
                <?php 
$increase_your_reach_section = get_field('increase_your_reach_section');?> 
					<h2 class="main--heading"><?php echo $increase_your_reach_section['increase_title'];?></h2>
					<p><?php echo $increase_your_reach_section['increase_content'];?></p>
							<div class="button-new">
								<?php 
                        $link = $increase_your_reach_section['increase_button_link']; 
                        if( $link ): 
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        ?>
                        <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo $increase_your_reach_section['increase_button_text'];?></a>
                        <?php endif; ?>
							</div>
				</div>
				<div class="Online-Appointment-img">
					<img src="<?php echo esc_url( $increase_your_reach_section['increase_image']['url'] ); ?>" alt="<?php echo esc_attr( $increase_your_reach_section['increase_image']['alt'] ); ?>">
				</div>
		    </div>
	  </div>
	</section> 

 <section class="testimonials-section">
	<div class="Salon">
		<div class="container">
			<div class="salon--heading">
				<h2 class="main--heading">Our Testimonials</h2>
			</div>

            <div class="owl-carousel owl-theme">
<?php 
$rows = get_field('testimonial_slider');
if( $rows ) {
    
    foreach( $rows as $row ) {
        $image = $row['slider_image'];
   
?>
<div class="item"><div class="testimonial">
					<img src="<?php echo esc_url($image['url']); ?>">
				   <p class="description">
					 <?php echo $row['slider_text'];?>
				   </p>
				   <span><?php echo $row['slider_author'];?></span>
				 </div>
                 </div>
                 <?php  }
}
?>


		</div>	
	</div>
 </section>


 <section class="home-contact-form" id="cont">
		<div class="container">
			<div class="home-contact-form-inner">
			<div class="salon--heading">
				<h2 class="main--heading">Do you want to get in touch?</h2>
				<p>Please fill in this form and we will contact you within 24 hours. Thanks!</p>
			</div>
			<div class="home-contact-div">
				<form action="">
					<div class="input-grid">
						<input class="col2 first" type="text" placeholder="First Name">
						<input class="col2 last" type="text" placeholder="Last Name">
					</div>
						<input class="col2 last" type="tel" placeholder="Phone Number">
						<input class="col2 first" type="Email" placeholder="Email Address">
						<textarea name="textarea" id="" cols="30" rows="7" placeholder="Message"></textarea>
						<div class="submit-button">
				          <input type="submit" value="Submit">
				     	</div>
				</form>
			</div>
	       </div>
		</div>
 </section>

	</main>
<?php get_footer();?>