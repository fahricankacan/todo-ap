//****************PLAN.BLADE.JS************************ */

function myFunction(){
   // window.alert("sa");
   $('#exampleModal').modal('toggle');
}

$('#sortable1,#sortable2,#sortable3').click(function(){
    console.log("sortable list");
  // console.log($("#exampleModal").modal());
   $('#exampleModal').modal('toggle');
})



// $('#myModal').modal('toggle');
// $('#myModal').modal('show');
// $('#myModal').modal('hide');