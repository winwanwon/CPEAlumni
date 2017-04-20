
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
    var id = $(this).attr("id");
		$.post("getuser/" + id , function(data){
			data = data[0];

      if(data.picture != ""){
        $("#info_picture").attr('src', 'uploads/'+data.picture);
      } else {
        $("#info_picture").attr('src', 'https://placekitten.com/130/130');
      }        
      

      jQuery.each(data, function(i, val) {
        if(!val){
          data[i] = "<i>ไม่มีข้อมูล</i>";
        }
      });

      if(data.privacy == "PH"){
        $("#contact_info").html("");
      }

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

      $("#interest_list").html("")
      if(data.interests.length == 0){
        $("#interests").html("<i>ไม่มีข้อมูล</i>")
      }
      $.each(data.interests, function(key,value){
        $("#interests").append("<li>" + value + "</li>")
      })

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

</script>


</body>
</html>
