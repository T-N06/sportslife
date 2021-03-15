

  $(function(){
    $("#message_btn").on("click", function(event){
      let message = $("#message").val();
      let user = $("#user").val();
      let id = $("#id").val();
      $.ajax({
        type: "POST",
        url: "../general/chat_sub.php",
        data: { "message" : message,
                "user" : user,
                "id" : id},
        dataType : "json"
      }).done(function(data){
        $("#result").append('data.message');
      }).fail(function(XMLHttpRequest, status, e){
        alert(e);
      });
      // return false;
    });
  });
