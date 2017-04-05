
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
</script>


</body>
</html>
