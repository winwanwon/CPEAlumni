<!--
<div class="container">
  <?php

  /*
  foreach($industry as $item){
    echo $item["industry"]."<br>";



  // var_dump($test2);
  foreach($test2 as $item){
    echo $item["username"]." ";
    echo $item["fname"]." ";
    echo $item["lname"]." ";
    echo $item["nickname"]."<br>";


  }
  echo "<br><br>";
  foreach($business as $item){
    echo $item["businessType"]."<br>";
  }
  */
  ?>
</div>
-->
<!--
  <style>
  body {
    font-family: 'Open Sans', sans-serif;
    padding-bottom: 30px;
  }

  #avatar {
    width: 30px;
    height: 30px;
    border-radius: 15px;
    margin: 0 8px;
  }
  </style>

  <style>
    @font-face {
      font-family: bebas;
      src: url(fonts/bebas.TTF);
    }
    .navbar-inverse{
      background-color: white;
      border-color: white;
    }

    .linkhover:hover{
      background-color: whitesmoke;
      color: #C8102E !important;
    }
    .navbar-inverse .navbar-nav>li>a{
      color: #C8102E !important;
    }
    .navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:focus, .navbar-inverse .navbar-nav>.open>a:hover {
      background-color: black;
      color: white !important;
    }
    .nav{
      font-family: 'Open Sans';
    }
    .navbar-brand:hover{
      color: #7F7F7F !important;
    }

    .containTable{
      text-align: center;
    }
    .table, .memberresult{
      margin-top: 20px;
    }
    .table>thead>tr>th{
      text-align: center;
    }
    .radio {
      margin:auto;
    }
    .containerpackage{
      margin: auto;
      margin-top: 80px;
      margin-left: 50px;
      margin-right: 50px;
    }
    h1{
      font-family: bebas;
      text-align: left;
    }
    .result{
      margin-top: 5px;
    }
    .nav-stacked a{
      color: #C8102E !important;
    }
    .nav-stacked .active a,
    .nav-stacked .active a:hover {
      background-color: transparent !important;
    }
    .nav-pills > .active > a, .nav-pills > .active > a:hover {
      background-color: transparent !important;
      border: 2px solid #C8102E !important;
    }
    .profilePicture{
      border-radius: 50%;
      height: 150px;
      width: 150px;
    }
    .socialLogo{
      height: 40px;
      width: 40px;
      margin-right: 10px;
      margin-top: 10px;
      margin-bottom: 10px;
    }
    .myprofile-area{
      text-align: center;
    }
    .modal-content{
      text-align: left; !important;
    }
  </style>

  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="dashboard.php">CPE Alumni Directory</a>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
         <a style="padding: 10px 15px;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="img/avatar.jpg" id="avatar" alt="">Warat Kaweepornpoj (CPE#28) <span class="caret"></span></a>
         <ul class="dropdown-menu">
           <li><a href="profile_modal.php">Edit Profile</a></li>
           <li><a href="index.php">Logout</a></li>
         </ul>
       </li>
      </ul>
    </div>
  </nav>
-->
<style>
	.img-circle {
		opacity: 0.8;
		cursor: pointer;
		-webkit-transition: all ease-in-out 0.5s;
	}

	.img-circle:hover {
		-webkit-transform: scale(1.06);
		opacity: 1;
		cursor: pointer;
	}
</style>

<body>
	<div class="container">
		<div class="col-md-4">
			<h2>Search Student/Alumni</h2>
			<hr>

			<form>
				<div class="form-group">
					<label>Name</label>
					<input type="text" class="form-control input-sm" placeholder="Name">
				</div>
				<div class="form-group">
					<label>Generation</label>
					<input type="number" class="form-control input-sm" value="30">
					<!-- div class="input-group spinner">
					<input type="text" class="form-control input-sm" value="1">
					<div class="input-group-btn-vertical">
					<button class="btn btn-default "  type="button"><i class="fa fa-caret-up"></i></button>
					<button class="btn btn-default"  type="button"><i class="fa fa-caret-down"></i></button>
				</div>
			</div -->
		</div>
		<div class="form-group ui-widget">
			<label>Interests</label>
			<input id = "automplete-1" class="form-control input-sm" placeholder="Find by interests">
		</div>
		<div class="form-group ui-widget">
			<label>Career</label>
			<input id = "automplete-2" class="form-control input-sm" placeholder="Find by career">
		</div>
		<div class="form-group">
			<label>Education in CPE</label>
			<div class="checkbox">
				<label>
					<input type="checkbox" id="undergraduate_reg" value="">
					Undergraduate (Regular)
				</label>
			</div>
			<div class="checkbox">
				<label>
					<input type="checkbox" id="undergraduate_int" value="">
					Undergraduate (International)
				</label>
			</div>
			<div class="checkbox">
				<label>
					<input type="checkbox" id="graduate" value="">
					Graduate Degree
				</label>
			</div>
		</div>
		<div class="form-group">
			<label>Industry</label>
			<select class="form-control input-sm">
				<option value="Agriculture and Forestry/Wildlife">Agriculture and Forestry/Wildlife</option>
				<option value="Business and Information">Business and Information</option>
				<option value="Construction/Utilities/Contracting">Construction/Utilities/Contracting</option>
				<option value="Education">Education</option>
				<option value="Gaming">Gaming</option>
				<option value="Finance Insurance">Finance Insurance</option>
			</select>
		</div>

		<div class="form-group">
			<label>Business Type</label>
			<select class="form-control input-sm">
				<option value="Accountant">Accountant</option>
				<option value="Cash Advances">Cash Advances</option>
				<option value="Insurance">Insurance</option>
				<option value="Investor">Investor</option>
			</select>
		</div>
	</form>
</div>
<!-- Display part-->
<div class="col-md-8 display">
	<div>
		<h2>Students</h2><hr>
		<img src="http://placekitten.com/g/130/130" data-toggle="modal" data-target="#studentData" style="margin: 5px" class="img-circle">
		<img src="http://placekitten.com/g/130/130" data-toggle="modal" data-target="#studentData" style="margin: 5px" class="img-circle">
		<img src="http://placekitten.com/g/130/130" data-toggle="modal" data-target="#studentData" style="margin: 5px" class="img-circle">
		<img src="http://placekitten.com/g/130/130" data-toggle="modal" data-target="#studentData" style="margin: 5px" class="img-circle">
		<img src="http://placekitten.com/g/130/130" data-toggle="modal" data-target="#studentData" style="margin: 5px" class="img-circle">
		<img src="http://placekitten.com/g/130/130" data-toggle="modal" data-target="#studentData" style="margin: 5px" class="img-circle">
		<img src="http://placekitten.com/g/130/130" data-toggle="modal" data-target="#studentData" style="margin: 5px" class="img-circle">
		<img src="http://placekitten.com/g/130/130" data-toggle="modal" data-target="#studentData" style="margin: 5px" class="img-circle">
		<img src="http://placekitten.com/g/130/130" data-toggle="modal" data-target="#studentData" style="margin: 5px" class="img-circle">
		<img src="http://placekitten.com/g/130/130" data-toggle="modal" data-target="#studentData" style="margin: 5px" class="img-circle">

	</div>
	<br>
	<div>
		<h2>Alumnus</h2><hr>
		<img src="http://placekitten.com/g/130/130" data-toggle="modal" data-target="#studentPrivate" style="margin: 5px" class="img-circle">
		<img src="http://placekitten.com/g/130/130" data-toggle="modal" data-target="#studentPrivate" style="margin: 5px" class="img-circle">
		<img src="http://placekitten.com/g/130/130" data-toggle="modal" data-target="#studentPrivate" style="margin: 5px" class="img-circle">
		<img src="http://placekitten.com/g/130/130" data-toggle="modal" data-target="#studentPrivate" style="margin: 5px" class="img-circle">
		<img src="http://placekitten.com/g/130/130" data-toggle="modal" data-target="#studentPrivate" style="margin: 5px" class="img-circle">

	</div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="studentData" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Information</h4>
      </div>
      <div class="modal-body text-center">
				<img src="http://placekitten.com/g/130/130" class="img-circle">
				<h3>Piyaphon Trangjirasathian</h3>
				<h4>Name (CPE#28)</h4>
      </div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-3 text-right">
						<label>E-mail</label>
					</div>
					<div class="col-xs-9">test123@gmail.com</div>
				</div>
				<div class="row">
					<div class="col-xs-3 text-right">
						<label>Mobile Phone</label>
					</div>
					<div class="col-xs-9">085-361-7777</div>
				</div>
				<div class="row">
					<div class="col-xs-3 text-right">
						<label>Facebook URL</label>
					</div>
					<div class="col-xs-9"><a href="https://www.facebook.com/nn.namelesz">https://www.facebook.com/nn.namelesz</a></div>
				</div>
				<div class="row">
					<div class="col-xs-3 text-right">
						<label>Education</label>
					</div>
					<div class="col-xs-9">Undergraduate (Regular Program)</div>
				</div>
				<div class="row">
					<div class="col-xs-3 text-right">
						<label>Lives in</label>
					</div>
					<div class="col-xs-9">Bangkok, Thailand</div>
				</div>
				<div class="row">
					<div class="col-xs-3 text-right">
						<label>Street Address</label>
					</div>
					<div class="col-xs-9">111/53 Soi Phokeaw Nawamin Rd. Klongkum Bungkum</div>
				</div>

				<div class="row">
					<div class="col-xs-3 text-right">
						<label>Interested in</label>
					</div>
					<div class="col-xs-9">
						<ul>
							<li>Film</li>
							<li>Video Games</li>
							<li>Music</li>
							<li>Internet of Things</li>
							<li>Android OS</li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-3 text-right">
						<label>Preferred contact method</label>
					</div>
					<div class="col-xs-9">
						Line ID: nn.namelesz / E-mail
					</div>
				</div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="studentPrivate" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Information</h4>
      </div>
      <div class="modal-body text-center">
				<img src="http://placekitten.com/g/130/130" class="img-circle">
				<h3>Karis Matchaparn</h3>
				<h4>Mon (CPE#10)</h4>
      </div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-3 text-right">
						<label>Education</label>
					</div>
					<div class="col-xs-9">Undergraduate (Regular Program)</div>
				</div>
				<div class="row">
					<div class="col-xs-3 text-right">
						<label>Work</label>
					</div>
					<div class="col-xs-9">
							<ul>
								<li>JAVA Programmer at StockRadar</li>
								<li>Data Engineer at G-ABLE</li>
								<li>Project Coordinator at Panic Fox</li>
							</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-3 text-right">
						<label>Lives in</label>
					</div>
					<div class="col-xs-9">Bangkok, Thailand</div>
				</div>

				<div class="row">
					<div class="col-xs-3 text-right">
						<label>Interested in</label>
					</div>
					<div class="col-xs-9">
						<ul>
							<li>Film</li>
							<li>Video Games</li>
							<li>Music</li>
							<li>Internet of Things</li>
							<li>Android OS</li>
						</ul>
					</div>
				</div>
      </div>


			<div class="modal-body text-center">
				<i>This user does not show his/her contact method to public.</i>
			</div>
    </div>
  </div>
</div>

</body>
<script>
$(function(){
	$('.spinner .btn:first-of-type').on('click', function() {
		var btn = $(this);
		var input = btn.closest('.spinner').find('input');
		if (input.attr('max') == undefined || parseInt(input.val()) < parseInt(input.attr('max'))) {
			input.val(parseInt(input.val(), 10) + 1);
		} else {
			btn.next("disabled", true);
		}
	});
	$('.spinner .btn:last-of-type').on('click', function() {
		var btn = $(this);
		var input = btn.closest('.spinner').find('input');
		if (input.attr('min') == undefined || parseInt(input.val()) > parseInt(input.attr('min'))) {
			input.val(parseInt(input.val(), 10) - 1);
		} else {
			btn.prev("disabled", true);
		}
	});
})
</script>

<script>
$(function() {
	var availableTutorials  =  [
		"Big Data Experience",
		"Parallel",
		"Embedded",
		"SAP",
		"Java",
		"Web",
		"Liverpool",
	];
	$( "#automplete-1" ).autocomplete({
		source: availableTutorials
	});
});
</script>
<!--autocomplete career text box -->
<script>
$(function() {
	var availableTutorials  =  [
		"Gamer",
		"Tourist",
		"Programmer",
		"Java Developer",
		"Web Developer",
		"Project Manager",
		"System Analyst",
		"Actor",
		"Football Player",
		"Chef",

	];
	$( "#automplete-2" ).autocomplete({
		source: availableTutorials
	});
});

$(".checkbox").click( function(){
	randomHide();
})

$("input").keyup( function(){
	randomHide();
})

function randomHide(){
	$(".img-circle").each( function(){
		var rand = Math.floor(Math.random()*3)
		if(rand==0){
			$(this).hide();
		} else {
			$(this).show();
		}
	})
}

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>

</html>
