<div class="row" id="blocks">

	<div id="left-block" class="col-lg-6 col-md-6 col-xs-12">
			
		<div class="btn-cont">
			<button name="freelancer" class="btn btn-warning">Freelancer</button>
		</div>

	</div>
	<div id="right-block" class="col-lg-6 col-md-6 col-xs-12">
		<div class="btn-cont">
			<button name="customer" class="btn btn-primary">Customer</button>
		</div>

	</div>


</div> <!---(end)#block ---->


<div class="freelancer-frm user-profile">

<form method="post" action="">
	<div class="form-group">
			<label>Name:</label>
			<input type="text" name="name" value="" class="form-control">
	</div>
	<div class="form-group">
			<label>Describe Yourself:</label>
			<textarea name="description" class="form-control"></textarea>
	</div>
	<div class="form-group">
			<label>Expertise:</label>
			<input type="text" name="expertise" value="" class="form-control">
			<i>seperate with comma(,) sign</i>
	</div>
	<div class="form-group">
			<label>Experience:</label>
			<select name="experience" class="form-control">
				<option value="">Choose</option>
				<option value="0-1">0 to 1</option>
				<option value="1-2">1 to 2</option>
				<option value="2-3">2 to 3</option>
				<option value="3-4">3 to 4</option>
				<option value="4-5">4 to 5</option>
				<option value="5-more">5 or More</option>

			</select>
	</div>
	<div class="form-group">
			<button class="btn btn-primary">Submit</button>
	</div>
</form>
</div> <!---(end)freelancer-frm---->


<div class="customer-frm user-profile">
<form method="post" action="">
	<div class="form-group">
			<label>Name:</label>
			<input type="text" name="name" value="" class="form-control">
	</div>
	<div class="form-group">
			<label>Describe Yourself:</label>
			<textarea name="description" class="form-control"></textarea>
	</div>
	<div class="form-group">
			<button class="btn btn-primary">Submit</button>
	</div>
</form>
</div> <!---(end)customer-frm---->
