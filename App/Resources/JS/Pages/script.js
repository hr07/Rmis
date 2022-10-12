$(document).ready(function () {

  const url = $("input[name='destination']").val();

  const forms = [
    "PropertyRegPersonalInfoForm",
  ];

  //////////////////////////////////////////////////////
  //////////////////////////////////////////////////////
  /**
   * NAVBAR SCROLL BEHAVIOR
   */
  ///////////////////////////////////////////////////////
  //////////////////////////////////////////////////////
  var timer;
  $(window).scroll(function () {
    if (timer) {
      window.clearTimeout(timer);
      if (window.scrollY > 500) {  
      } else {
        if (window.scrollY < 500) {
        }
      }
    }
    timer = setTimeout(function () {}, 1000);
  });

  $(".password-visibility").click(function () {
    if ($(".password-visibility").prop("checked") === true) {
      $(".password").attr("type", "text");
    } else {
      if ($(".password-visibility").prop("checked") === false) {
        $(".password").attr("type", "password");
      }
    }
  });
  ////////////////////////////////////////////////////////
  ///////////////////////////////////////////////////////
  ///////////////////////////////////////////////////////
  ///////////////////////////////////////////////////////
  /**\
   * FORMS
   */
  //////////////////////////////////////////////
  ///////////////////////////////////////////////
  $.fn.setIdentifiers = function (item) {
    if (item !== undefined) {
      var item = $("#" + item);
      item.submit(function (e) {
        e.preventDefault();
        $(".spinner-message").html("Processing Request...");
        $(".form-spinners").removeClass("d-none");
        setTimeout(() => {
          $.ajax({
            type: "post",
            url: url,
            data: new FormData(this),
            dataType: "json",
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function () {
            },
            success: function (response) {
              if (response.flag === 0) {
                  $(".form-spinners").addClass("d-none");
                  if($(".form-alert").hasClass("alert-success")){
                    $(".form-alert").removeClass("alert-success").addClass("alert-danger");
                  }
                  $(".form-alert").removeClass("d-none");
                  $(".alert-heading").html("Oops!");
                  $(".alert-message").html(response.message);
                  setTimeout(function(){
                      $(".form-alert").addClass("d-none");
                  },5000)
              } else {
                if (response.flag === 1) {
                  $(".form-spinners").addClass("d-none");
                  if($(".form-alert").hasClass("alert-danger")){
                    $(".form-alert").removeClass("alert-danger").addClass("alert-success");
                  }
                  $(".form-alert").removeClass("d-none");
                  $(".alert-heading").html("Congratulations!");
                  $(".alert-message").html(response.message);
                  $("input[name='submit']").attr("disabled", "disabled");
                  setTimeout(function(){
                      $(".form-alert").addClass("d-none");
                  },5000)
                  setTimeout(function(){
                      $(".form-spinners").removeClass("d-none");
                      $(".spinner-message").html("Redirecting you to the next step...")
                      $("input[name='submit']").removeAttr("disabled");
                      item.addClass("d-none");
                    },5000)

                }
              }
            },
          });
        }, 2000);
      });
    }
  };
  forms.forEach($.fn.setIdentifiers);
});
