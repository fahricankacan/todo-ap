//****************PLAN.BLADE.JS************************ */

var lastCliclkedCard;

function openModal(){
   // window.alert("sa");
   $('#updateModal').modal('toggle');
   
   
   
}

function myFunction(){
  $('#exampleModal').modal('toggle')
}


$('#sortable1,#sortable2,#sortable3').click(function(){
   // console.log("sortable list");
   // console.log(this.id);
  // console.log($("#exampleModal").modal());
   //$('#exampleModal').modal('toggle');
});

/************modal menü******************* */



$('li').click(async function(){
    let data;
   
   lastCliclkedCard=this.id;
   console.log('bu bir li' + "idsi : " + this.id);
   let baseUrl = window.location.origin;
   let newUrl = baseUrl+"/jsonplan/"+ this.id;
   data=loadDoc(newUrl)

   
   
   

   //$($('#exampleModal').modal('toggle'))
})

 
  function getProjectIdWithURL(){
   var url = window.location.href;
   var id = url.substring(url.lastIndexOf('/') + 1);
   return id;
 }

//  OpenModal= function(data){
//    document.getElementById
//  }


 async function loadDoc($url) {
    let ajaxData;
   const xhttp = new XMLHttpRequest();
   xhttp.onload = await function() {
    ajaxData=JSON.parse( this.response);
    console.log(ajaxData)
    //gorev_adi,gorev_aciklaması,teslim_tarihi,personel_id
    date = new Date(ajaxData['teslim_tarihi'])
    document.getElementById("gorev_adi_modal").value=ajaxData["gorev_adi"];
    document.getElementById("gorev_aciklamasi_modal").value=ajaxData["gorev_aciklaması"];
    document.getElementById("teslim_tarihi_modal").valueAsDate =date;
    //document.getElementById('personel_id_modal').selectedIndex=1
  
    $('#personel_id_modal').val(ajaxData['personel_id']).change();
    openModal()    
    
   }
   xhttp.open("GET", $url);
   xhttp.send();

   return ajaxData;
 }



  
  $(document).ready(function(){
    $('#updateFormm').on('submit',function(e){
      e.preventDefault();

      console.log("ben ajax post")
      $.ajaxSetup({
        cache:false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var form_element = document.getElementById('updateFormm');
    var form = new FormData(form_element);
    console.log(form)
      $.ajax({
        
        type:"POST",
        url:"/update/"+lastCliclkedCard,
        data: $('#updateFormm').serialize(), //,
        success:function(response){
          console.log($('#updateFormm').serialize())
          console.log(response)
          $('#updateModal').modal('hide')
          Swal.fire(
            'Kart Güncellendi!',
            'Yeni bilgiler karta eklendi!',
            'success'
        )
        // $("#col1").load(window.location.href +
        //   "  #sortable1")
         // $("#card-body").load(window.location.href + "#card-body" )
          
        },
        error:function(error){
          console.log(error)
          alert("data not saved")
        }
      })
    })
  })
 



 async function doAjax(url) {
   let result;

   try {
       result = await $.ajax({
           url: url,
           type: 'GET',
           
       });

       return result;
   } catch (error) {
       console.error(error);
   }
}

/*************
 * todo : promise metodla gelen değeri bekle , 
 * todo : yeni oluşturcağın modalın değerlerine gelen verileri ata,
 * todo : modalı çağır
 */

//https://www.w3schools.com/js/js_promise.asp 




// $('#myModal').modal('toggle');
// $('#myModal').modal('show');
// $('#myModal').modal('hide');





//**************************Modala data yükeleme**************************************************** */
//https://www.tutorialsplane.com/pass-data-to-bootstrap-modal/

//https://stackoverflow.com/questions/10626885/passing-data-to-a-bootstrap-modal