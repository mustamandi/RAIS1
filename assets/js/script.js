

   function select(){
    var type = $('#type').val();
    if(type == 'paved_roads'){
        $('#paved_roads').prop("disabled", false);
    }
    else if (type == 'gravel_roads') {
        $('#paved_roads').prop("disabled", true);
    };
   } /* end of function select */

     function showMyImage(fileInput) {
            var files = fileInput.files;
            for (var i = 0; i < files.length; i++) {           
                var file = files[i];
                var imageType = /image.*/;     
                if (!file.type.match(imageType)) {
                    continue;
                }           
                var img=document.getElementById("thumbnil");            
                img.file = file;    
                var reader = new FileReader();
                reader.onload = (function(aImg) { 
                    return function(e) { 
                        aImg.src = e.target.result; 
                    }; 
                })(img);
                reader.readAsDataURL(file);
            }    
    } /* end of function showMyImage */
    
    var counter = 0;
    function AddFileUpload()
    {
         var div = document.createElement('DIV');
         div.innerHTML = '<input id="file' + counter + '" name = "image[]" type="file" class="form-control" />' +
                         '<a id="Button' + counter + '" ' +
                         ' onclick = "RemoveFileUpload(this)" />-Remove</a>';
         document.getElementById("FileUploadContainer").appendChild(div);
         counter++;
    }
    function RemoveFileUpload(div)
    {
         document.getElementById("FileUploadContainer").removeChild(div.parentNode);
    }

$(document).ready(function(){
      $("#addnew").html("<img src='assets/img/103.gif' class='loader-img'/>").load('roads.php');
      $("#all").html("<img src='assets/img/103.gif' class='loader-img'/>").load('show_all_roads.php');
         //structure insertions
});
// load roads 
  function load_roads(msg)
{
    $("#all").html("<img src='assets/img/103.gif' class='loader-img'/>").load('show_all_roads.php','after_insert=1');
    $("#all-tab").click();
    $("#add_menu").removeClass('active');
        setTimeout(function() {
        $(".show_message_alert").css('display','none');
        }, 2000);      
}
 function road(msg)
{
    $("#all").html("<img src='assets/img/103.gif' class='loader-img'/>").load('show_all_roads.php');
    $("#addnew").html("<img src='assets/img/103.gif' class='loader-img'/>").load('roads.php');     
}
  function load_structures(element_id, table)
{
    $("#all").html("<img src='assets/img/103.gif' class='loader-img'/>").load('show_all_structures.php', 'element_id='+element_id+'&table='+table+'&after_insert=1');
    $("#all-tab").click();
    $("#add_menu").removeClass('active');
        setTimeout(function() {
        $(".show_message_alert").css('display','none');
        }, 2000);      
}
function load_roads_equ(id)
{
    $("#all").html("<img src='assets/img/103.gif' class='loader-img'/>").load('show_road_elements.php', 'element_id='+id+'&after_insert=1');
    $("#all-tab").click();
    $("#add_menu").removeClass('active');
        setTimeout(function(){
        $(".show_message_alert").css('display','none');
        }, 2000);      
}
// load intersection form
function load_int_form()
{
      $("#addnew").html("<img src='assets/img/103.gif' class='loader-img'/>").load('intersections.php');
      //$("#all").html("<img src='assets/img/103.gif' class='loader-img'/>").load('intersection_records.php');
}

function show_form(element_id)
          { 
              $("#addnew").html("<img src='assets/img/103.gif' class='loader-img'/>").load('road_elements.php', 'para='+element_id);
              $("#all").html("<img src='assets/img/103.gif' class='loader-img'/>").load('show_road_elements.php', '&element_id='+element_id);
          }


      function show_eqi_form(element_id)
          {
              $("#addnew").html("<img src='assets/img/103.gif' class='loader-img'/>").load('equipments_forms.php', '&element_id='+element_id);
              $("#all").html("<img src='assets/img/103.gif' class='loader-img'/>").load('show_equipments.php', '&element_id='+element_id);
          }

      // load back equipment data with success message
      function load_back_equip(id)
      {
          $("#all").html("<img src='assets/img/103.gif' class='loader-img'/>").load('show_equipments.php', 'element_id='+id+'&after_insert=1');
          $("#all-tab").click();
          $("#add_menu").removeClass('active');
          setTimeout(function(){
            $(".show_message_alert").css('display','none');
          }, 2000);
      }

      function show_structures_form(element_id, table)
          {
              $("#addnew").html("<img src='assets/img/103.gif' class='loader-img'/>").load('structures_forms.php', '&element_id='+element_id+'&table='+table);
              $("#all").html("<img src='assets/img/103.gif' class='loader-img'/>").load('show_all_structures.php', 'element_id='+element_id+'&table='+table);
          }      
    function page_opacity()
    {
        $(".form-group").css('opacity','0');
        $(".loading").css('display','block');
    }
    function error_alert(message)
    {
        $(".loading").css('display','none');
        $(".error_img").css('display','block');
        $(".message").html('<b style="color:red">' + message + '</b>');
    }
    function success_alert(message)
    {
        $(".loading").css('display','none');
        $(".success_img").css('display','block');
        $(".message").html('<b style="color:green">' + message + '</b>');
    }
    function timeout_func()
    {
        setTimeout(function() {
        $(".loading").css('display','none');
        $(".success_error_imgages").css('display','none');
        $(".message").html('');
        $(".form-group").css('opacity','');
        }, 2000);
    }
    function view_road_details(r_id)
    {
        $("#all").html("").load("show_road_details.php", 'r_id='+r_id);
    }
    function view_structure_details(id, table)
    {
        $("#all").html("").load("show_structure_details.php", 'id='+id+'&table='+table);
    }
    // view road elements reports
    function view_road_elements_report(id,element_id)
    {
        $("#all").html("").load("road_elements_report.php", 'id='+id+"&element_id="+element_id);
    }
    
    //print function
    function print(divName) {
       var printContents = document.getElementById(divName).innerHTML;     
       var originalContents = document.body.innerHTML;       
       document.body.innerHTML = printContents;      
       window.print();      
       document.body.innerHTML = originalContents;
    }
     function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'my div', 'height=400,width=600');
        mywindow.document.write('<html><head><title>my div</title>');
        /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10

        mywindow.print();
        mywindow.close();

        return true;
    }

    


