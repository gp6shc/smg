<?php /* Template Name: Contact */ pxl::page(); while ( have_posts() ) : the_post(); ?>
<header>
	<h2>Drop Us a Line <small>We're Sure to Bite</small></h2>
</header>
<div class="row lined">
	<div class="span6">
		<div class="row">
			<header><h3>TALK TO US!</h3></header>
			<?php the_content(); ?>
		</div>
		<div class="row">
			<header><h3>Where to Find Us</h3></header>
			<div class="row">
				<div class="span6">
					<address>
						<h5>TALLAHASSEE OFFICE</h5>
						114 S. Duval Street<br>
						Tallahassee, FL 32301<br>
						Phone: (850) 222-1996<br>
						Fax: (850) 224-2882<br>
						E-mail: <a href="mailto:contact@sachsmedia.com">contact@sachsmedia.com</a>
					</address>
				</div>
			</div>
			<div class="row border-top">
				<div class="span3">
					<address>
						<h5>ORLANDO OFFICE</h5>
						Two Landmark Center<br>
						225 East Robinson Street, Suite 455<br>
						Orlando, FL 32801<br>
						Phone: (407) 219-3157<br>
						Fax: (407) 219-3095<br>
					</address>
				</div>
				<div class="span3">
					<address>
						<h5>BOCA RATON OFFICE</h5>
						150 East Palmetto Park Road, Suite 800<br/>
						Boca Raton, Florida 33432<br/>
						Phone: (847) 977-9740<br/>
					</address>
				</div>
			</div>
		</div>
		<div class="row">
			<header><h3>Employment & Internships</h3></header>
			<p>Are you ready to join the Sachs family? We're looking for ideal candidates to fill a variety of positions and internships. Visit <a href="/employment-opportunities/">Employment Opportunities</a> to find out what's currently available.</p>
		</div>
	</div>
	<div class="span6">
		<header id="tallahassee"><h3>Home Base Tallahassee</h3></header>
		<div class="map">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6879.640372148882!2d-84.28323291242127!3d30.44119892153345!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x7a14f3fcd103c55e!2sSachs+Media+Group!5e0!3m2!1sen!2sus!4v1431962076173" width="450" height="338" frameborder="0" style="border:0"></iframe>
		</div>
		<header id="orlando"><h3>Our Orlando Digs</h3></header>
		<div class="map">
			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7009.468223980257!2d-81.37642002117919!3d28.54771061598071!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88e77afb18666bc7%3A0x2ab9ada7528b4ddc!2sRon+Sachs+Communications!5e0!3m2!1sen!2sus!4v1431963870868" width="450" height="338" frameborder="0" style="border:0"></iframe>
		</div>
		<header id="boca"><h3>Boca Locale</h3></header>
		<div class="map">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3575.2446731652476!2d-80.08528388972279!3d26.350947168607686!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88d8e21b099475b7%3A0xfecade6b0e95ab5c!2s150+E+Palmetto+Park+Rd+%23800%2C+Boca+Raton%2C+FL+33432!5e0!3m2!1sen!2sus!4v1431963135121" width="450" height="338" frameborder="0" style="border:0"></iframe>
		</div>
	</div>
</div>
<?php endwhile; pxl::page(0); ?>