
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
		$.post("getuser/winwanwon", {username: $(this).attr('id')}, function(data){
			$("#user-content").html(data);
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
