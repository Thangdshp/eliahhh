// submit form update status user 
function updateStatus(idF){
    id='#'+idF;
    $( id).submit();
};
document.querySelectorAll('input[type=color]').forEach(function(picker) {

    var targetLabel = document.querySelector('label[for="' + picker.id + '"]'),
      codeArea = document.createElement('span');
  
    codeArea.innerHTML = picker.value;
    targetLabel.appendChild(codeArea);
  
    picker.addEventListener('change', function() {
      codeArea.innerHTML = picker.value;
      targetLabel.appendChild(codeArea);
    });
});
// Cai dat mac dinh cua toastr (alert thong bao)
toastr.options = 
{
    "closeButton": true,
    "debug": false,
    "newestOnTop": false,
    "progressBar": false,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}
// End Cai dat mac dinh cua toastr (alert thong bao)

// Thay doi anh dai dien trong profile
function readURL(input) {
    if (input.files && input.files[0]) 
    {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function(){
    readURL(this);
});
// End Thay doi anh dai dien trong profile
// Ajax thay doi anh dai dien trong profile
$(document).ready(function(){
    $('#upload_form').on('submit', function(event){
        event.preventDefault();
        $.ajax({
        url:"admin/user/updateImage",
        method:"POST",
        data:new FormData(this),
        dataType:'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success:function(data)
        {           
          if(data!=null){
            Command: toastr[data.title](data.message_alert);
          }
        }
      })
    });
});
// End Ajax thay doi anh dai dien trong profile
// kich hoat checked
function checkAtive(btned){
  n=btned.length;

  if(n==7){

    idForm= btned.slice(0,7);
    num=btned.slice(8,n);
    if(idForm=='checkok'){
      
      $("#checkok").prop('checked', true);
      $("#checker").prop('checked', false);
    }else{
      $("#checker").prop('checked', true);
      $("#checkok").prop('checked', false);
    }
  }else{
    idForm= btned.slice(0,7);
    num=btned.slice(7,n);
    if(idForm=='checkok'){
      console.log('oke');
      a='#checkok'+num;
      b='#checker'+num;  
      $(a).prop('checked', true);
      $(b).prop('checked', false);
    }else{
      console.log('no');
      a='#checker'+num;
      b='#checkok'+num;
      $(a).prop('checked', true);
      $(b).prop('checked', false);
    }
  }
}
// xoa phan tu ban ghi vua khoi tao
function deleteRec(att){
  if(att.length!=10){
    a='#'+att;
    $(a).remove();
    $('#quantity_reco').empty();
    numC=$("#addRecord .col-md-12").length;
    $('#quantity_reco').text(numC);
  }else{
    alert("Don't delete root form !");
  }
}
// sHOW nhieu anh trc khi upload
$(document).ready(function()
{
  $(document).on("click",'.attachmentBtn', function(){
    img_choosed='.attachment'+$(this).attr("name");
    showed='.showImage'+$(this).attr("name");
    attachImg=$(showed);
    hiddenAttach=$(img_choosed);
    attachBtn = $('.attachmentBtn');
    wp_show='.wp-box-show_'+$(this).attr("name");
    btn_show='.btn-show-img_'+$(this).attr("name");
    hiddenAttach.click();
    hiddenAttach.change(function()
    {
      hiddenAttach.off('change');
      $(wp_show).removeClass("not-allowed");
      $(btn_show).removeClass("disabled_show_img");
      for(var i =0;i < this.files.length;i++)
        {
          preview(this, i);
        }
    });
  });
  

  function preview(input, i)
  {
    'use strict';
    if(input.files.length!=0){
      attachImg.empty();
    }
    if(input.files)
    {
      var reader = new FileReader();
        reader.onload = function(e)
        {
          'use strict';
          attachImg.append('<img src="'+e.target.result+'" class="imgPreview" style="display: none">');
          attachImg.children().show(1000);
        };
      reader.readAsDataURL(input.files[i]);
    };
  };

});
  // This is for My Image Part you can leave it
  document.addEventListener('DOMContentLoaded', function()
  {
    'use strict';
    function color()
    {
      'use strict';
      var digit, hexa = ["0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f"],i,hashColor, colorCode = "";   
      for(i=1;i<7;i++)
      {
        digit = Math.floor(Math.random()*16);
        colorCode += hexa[digit]; 
      }
      hashColor = '#' + colorCode.toString();
      return hashColor;
    }
    var iteration;
    // document.querySelectorAll('.myImage img')[0].onmouseover = function(e)
    // {
    //   'use strict';
    //   document.querySelector('.myImage a h2').style.opacity = 1;
    //   var newColor;
    //   iteration = setInterval(function()
    //     {
    //       newColor = color();
    //       document.querySelectorAll('.myImage img')[0].style.borderColor = newColor;
    //       document.querySelector('.myImage a h2').style.color = newColor;
    //     },1000);
    // };
    // document.querySelectorAll('.myImage img')[0].onmouseleave = function(e)
    // {
    //   'use strict';
    //   document.querySelector('.myImage a h2').style.opacity = 0;
    //   clearInterval(iteration);
    // };

  });
// End show nhieu anh truoc upload 



// Close modal product
// modalC= modal Close; modalO modal Open 
function closeModal(modalC,ModalO){
  $(modalC).modal('hide');
  $(ModalO).modal('show');
}
