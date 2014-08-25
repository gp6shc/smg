<?php /* Template Name: Contact */ pxl::page(); while ( have_posts() ) : the_post(); ?>
<header>
	<h2>Drop Us a Line <small>We're Sure to Bite</small></h2>
</header>
<div class="row lined">
	<div class="span6">
		<header><h3>TALK TO US!</h3></header>
		<?php the_content(); ?>
		<header><h3>Where to Find Us</h3></header>
		<div class="row">
			<div class="span3">
				<address>
					<h5>TALLAHASSEE OFFICE</h5>
					114 S. Duval Street<br>
					Tallahassee, FL 32301<br>
					Phone: (850) 222-1996<br>
					Fax: (850) 224-2882<br>
					E-mail: <a href="mailto:contact@sachsmedia.com">contact@sachsmedia.com</a>
				<address>
			</div>
			<div class="span3">
				<address>
					<h5>ORLANDO OFFICE</h5>
					Two Landmark Center<br>
					225 E. Robinson Street, Suite 455<br>
					Orlando, FL 32801<br>
					Phone:(407) 219-3157<br>
					Fax: (407) 219-3095<br>
				<address>
			</div>
		</div>
		<header><h3>Employment &amp; Internships</h3></header>
		<p>Are you ready to join the Sachs family? We're looking for ideal candidates to fill a variety of positions and internships. Visit <a href="http://sachsmedia.com/employment-opportunities/">Employment Opportunities</a> to find out what's currently available.</p>
	</div>
	<div class="span6">
		<header><h3>Home Base Tallahassee</h3></header>
		<div class="map"><iframe width="100%" height="298" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=114+S.+Duval+Street+Tallahassee,+FL+32301&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=82.704067,79.013672&amp;ie=UTF8&amp;hq=&amp;hnear=114+S+Duval+St,+Tallahassee,+Florida+32301&amp;t=m&amp;ll=30.4412,-84.283419&amp;spn=0.020276,0.034332&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe><br /></div>
		<header><h3>Our Orlando Digs</h3></header>
		<div class="map"><iframe width="100%" height="298" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=225+E.+Robinson+Street,+Suite+455+%09%09%09%09%09Orlando,+FL+32801&amp;aq=&amp;sll=28.545964,-81.421818&amp;sspn=0.37457,0.308647&amp;ie=UTF8&amp;hq=&amp;hnear=225+E+Robinson+St,+Orlando,+Florida+32801&amp;t=m&amp;ll=28.546001,-81.374359&amp;spn=0.020659,0.036478&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe><br /></div>
	</div>
</div>
<?php endwhile; pxl::page(0); ?>