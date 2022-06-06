
/*
 * save text signature
 */
function saveTextSignature(){
    html2canvas([document.getElementById("text-signature")], {
        onrendered: function(canvas) {
           var  singData = $(".head-links").find("li.active").attr("type")
            var imagedata = canvas.toDataURL('image/png'); 
            saveSignature(imagedata,  singData);
        }
    })
 }

  function saveTextSignaturetutor1(){
    html2canvas([document.getElementById("text-signaturetutor1")], {
        onrendered: function(canvas) {
           var  singData = $(".head-links-tutor1").find("li.active").attr("type")
            var imagedata = canvas.toDataURL('image/png'); 
            saveSignature(imagedata, singData);
        }
    })
 }

  function saveTextSignaturetutor2(){
    html2canvas([document.getElementById("text-signaturetutor2")], {
        onrendered: function(canvas) {
           var  singData = $(".head-links-tutor2").find("li.active").attr("type")
            var imagedata = canvas.toDataURL('image/png'); 
            saveSignature(imagedata, singData);
        }
    })
 }

/*
 * save uploaded signature 
 */
 function saveUploadSignature(){
    signature = $("input[name=signatureupload]").val();
    if (signature !== '') {
       var singData = $(".head-links").find("li.active").attr("type")
        saveSignature(signature,singData);
    }
 }

 function saveUploadSignaturetutor1(){
  var  signature = $("input[name=signatureuploadtutor1]").val();
   var  singData = $(".head-links-tutor1").find("li.active").attr("type")
    if (signature !== '') {
        saveSignature(signature,singData);
    }
 }

 function saveUploadSignaturetutor2(){
  var  signature = $("input[name=signatureuploadtutor2]").val();
   var  singData = $(".head-links-tutor2").find("li.active").attr("type")
    if (signature !== '') {
        saveSignature(signature,singData);
    }
 }