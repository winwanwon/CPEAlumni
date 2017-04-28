

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
    var csrf_token_name = '<?php echo $this->security->get_csrf_token_name(); ?>';
    var csrf_value = '<?php echo $this->security->get_csrf_hash(); ?>';
</script>

<script type="text/javascript">

var start = 12;
var end = 8;
var total = $(".student").length;
$(document).ready( function(){
  if($(".student").length > start){
    $(".student").slice(0, start).fadeIn();
    $("#loadmore").fadeIn();
  } else {
    $(".student").fadeIn();
  }
})

$("#loadmore").click( function(){
  $(".student").slice(start, start+end).fadeIn();

	$('html, body').animate({
		scrollTop: $(".student:eq(" + start + ")").offset().top
	}, 2000);

  start = start + end;

  if(start > total){
    $(this).hide();
  }

})

$(window).on('load', function() {
  $("body").removeClass("preload");
});

function register(){
  $("#registerForm").submit();
};

function login(){
  console.log("Logging In..")
  $("#loginForm").submit();
};

function checkboxCheck(){
  if($("#undergraduate").is(":checked")){
    $("#undergraduate_form").show();
  } else {
    $("#undergraduate_form").hide();
  }
  if($("#master").is(":checked")){
    $("#master_form").show();
  } else {
    $("#master_form").hide();
  }
  if($("#doctoral").is(":checked")){
    $("#doctoral_form").show();
  } else {
    $("#doctoral_form").hide();
  }
}


$("input[type='checkbox']").click(function(){
  checkboxCheck();
})

$(document).ready(function(){
  checkboxCheck();
})

$("#generation_input").keyup( function(){
  if($("#generation_input").val()){
    $("#undergraduate").prop("checked", true)
  } else {
    $("#undergraduate").prop("checked", false)
  }
})


$("#undergraduate").click( function(){
  if($("#undergraduate").prop("checked")==false){
    $("#generation_input").val("")
  }
})

//Cal year from generation
$("#gen_login").keyup( function(){
  if($("#gen_login").val() < 1)
    {
      $("#gen_login").val(1)
    }
    else if($("#gen_login").val() > 99)
    {
      $("#gen_login").val(99)
    }

    var year = parseInt($("#gen_login").val())+parseInt(2529)
    $("#yoe_under").val(year)

})

//Cal generation from year
$("#yoe_under").keyup( function(){
  if(($("#yoe_under").val() < 2530) && ($("#yoe_under").length == 4))
    {
      $("#yoe_under").val(2530)
    }
    else if($("#yoe_under").val() > 2628)
    {
      $("#yoe_under").val(2628)
    }
    var gen = parseInt($("#yoe_under").val())-parseInt(2529)
    $("#gen_login").val(gen)

})


	$(".student").click( function(){
    var id = $(this).attr("id");
		$.post("getuser/" + id, { 'tokenname': csrf_value,  } , function(data){
			data = data[0];

      if(data.picture != ""){
        $("#info_picture").css('object-fit', 'cover');
        $("#info_picture").attr('src', 'uploads/'+data.picture);
      } else {
        $("#info_picture").attr('src', 'assets/default_profile.png');
      }

      if(data.nickname != ""){
        $("#nickname").html(data.nickname);
      } else {
        $("#nickname").html("");
      }

      if(data.generation != 0){
        $("#generation").html(" CPE#"+ data.generation);
      } else {
        $("#generation").html("");
      }

      jQuery.each(data, function(i, val) {
        if(!val){
          data[i] = "<i>ไม่มีข้อมูล</i>";
        }
      });

        $("#contact_info").show();
      if(data.privacy == "PH"){
        $("#contact_info").hide();
      }

      $("#name").html(data.fname + " " + data.lname);
      $("#email").html(data.email);
      $("#mobile").html(data.phone);
      $("#facebook").html("<a href='" + data.facebook + "' target='_blank'>" + data.facebook + "</a>");
      $("#linkedin").html("<a href='" + data.linkedin + "' target='_blank'>" + data.linkedin + "</a>");
      $("#province").html(data.province);
      $("#country").html(data.country);
      $("#address").html(data.address);

      $("#education").html("");
      if(data.generation != 0){
        if(data.programme == "REG"){
          program = "Regular Program"
        } else {
          program = "International Program"
        }
        $("#education").append("<li>Undergraduate Degree (" + program + ", " + (parseInt(data.generation) + 2529) + ")</li>")
      }
      if(data.master != 0){
        $("#education").append("<li>Master Degree (" + data.master + ")</li>")
      }
      if(data.doctoral != 0){
        $("#education").append("<li>Doctoral Degree (" + data.doctoral + ")</li>")
      }
        $("#interest_list").show();
        $("#interests").html("")
      if(data.interests.length == 0){
        $("#interest_list").hide();
      }
      $.each(data.interests, function(key,value){
        $("#interests").append("<li class='interest-li'>" + value + "</li>")
      })

        $("#career_list").show();
        $("#career").html("")
      if(data.career.length == 0){
        $("#career_list").hide();
      }
      $.each(data.career, function(key,value){
        var present = ""
        if(value.present == 1){
          present = "(Present)";
        }
        $("#career").append("<li>" + value.position + " at " + value.company + " " + present + "</li>")
      })

      console.log(data)
		})
	})

$("#notnow").click (function(){
  $("#alert_data").slideUp();
})

$( function() {

  var availableTags = [];

    $.post("interest_list",{ 'tokenname': csrf_value,  } , function(data){
    $.each(data, function(key,value){
        availableTags.push(value["interest"])
    })
  })

  console.log(availableTags)

  $( "#automplete-1" ).autocomplete({
    source: availableTags
  });
} );
</script>


</body>
</html>
