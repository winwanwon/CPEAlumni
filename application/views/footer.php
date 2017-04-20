
<script type="text/javascript">
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


	$(".student").click( function(){
		$.post("getuser/" + $(this).attr('id'), function(data){
			data = data[0];

      $("#info_picture").attr('src', 'uploads/'+data.picture);
      $("#name").html(data.fname + " " + data.lname);
      $("#nickname").html(data.nickname);
      $("#generation").html(data.generation);
      $("#email").html(data.email);
      $("#mobile").html(data.phone);
      $("#facebook").html(data.facebook);
      $("#linkedin").html(data.linkedin);
      $("#province").html(data.province);
      $("#country").html(data.country);
      $("#address").html(data.address);

      $("#education").html("");
      if(data.generation != 0){
        $("#education").append("<li>Undergraduate Degree</li>")
      }
      if(data.master != 0){
        $("#education").append("<li>Master Degree (" + data.master + ")</li>")
      }
      if(data.doctoral != 0){
        $("#education").append("<li>Doctoral Degree (" + data.doctoral + ")</li>")
      }
      console.log(data)
		})
	})

/*var citynames = new Bloodhound({
  datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
  queryTokenizer: Bloodhound.tokenizers.whitespace,
  prefetch: {
    url: 'assets/citynames.json',
    filter: function(list) {
      return $.map(list, function(cityname) {
        return { name: cityname }; });
    }
  }
});
citynames.initialize();*/

$('#interests').tagsinput({
  /*typeaheadjs: {
    name: 'citynames',
    displayKey: 'name',
    valueKey: 'name',
    source: citynames.ttAdapter()
  }*/
});
</script>


</body>
</html>
