$("#login").submit((function(e){e.preventDefault();var o=new FormData($(this).get(0));debug&&console.log(o),$("#loading-screen").toggleClass("hidden");var n=$("#submit");n.prop("disabled","disabled"),$.ajax({url:login_form,type:"post",contentType:!1,processData:!1,data:o,success:function(e){n.prop("disabled",""),$("#loading-screen").toggleClass("hidden"),popup_message(e),changeURL("".concat(index))},error:function(e){n.prop("disabled",""),$("#loading-screen").toggleClass("hidden"),popup_message(e)},headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")},dataType:"JSON"})})),$("#click").click((function(){console.log("hello")}));