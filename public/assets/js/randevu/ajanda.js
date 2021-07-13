
//ADD
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})




$(document).ready( function () {

    $('#car_header_id').html("Ajanda");
    $('#card_header_aciklama_id').html("Hücreye tıklayark yeni plan oluşturulur. ");

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var calendar = $('#calendar').fullCalendar({
        editable: true,
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        events: '/randevu',
        selectable: true,
        selectHelper: true,
        select:async function (start, end, allDay) {
           
       
            const { value: title } = await Swal.fire({
                title: 'Başlık gir',
                input: 'text',
                inputLabel: 'Başlık',               
                showCancelButton: true,
                inputValidator: (value) => {
                  if (!value) {
                    return 'Başlık alanı boş bırakılamaz!'
                  }
                }
              })

            if (title) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');

                var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');



                $.ajax({
                    url: "randevu/store",
                    type: "POST",
                    data: {
                        title: title,
                        start: start,
                        end: end,
                        type: 'add'

                    },
                    success: function (data) {
                        calendar.fullCalendar('refetchEvents');
                        Toast.fire({
                            icon: 'success',
                            title: 'İşlem başarılı.'
                        })

                    }
                });
            }
        },
        editable: true,
        eventResize: function (event, delta) {
            var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
            var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
            var title = event.title;
            var id = event.id;
            $.ajax({
                url: "/randevu/update",
                type: "POST",
                data: {
                    title: title,
                    start: start,
                    end: end,
                    id: id,
                    type: 'update'
                },
                success: function (response) {
                    calendar.fullCalendar('refetchEvents');
                    Toast.fire({
                        icon: 'success',
                        title: 'İşlem başarılı.'
                    })
                }
            })
        },
        eventDrop: function (event, delta) {
            var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
            var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
            var title = event.title;
            var id = event.id;
            
            $.ajax({
                url: "/randevu/update",
                type: "POST",
                data: {
                    title: title,
                    start: start,
                    end: end,
                    id: id,
                    type: 'update'
                },
                success: function (response) {
                    calendar.fullCalendar('refetchEvents');
                    Toast.fire({
                        icon: 'success',
                        title: 'İşlem başarılı.'
                    })
                }
            })
        },

        eventClick: function (event) {


            Swal.fire({
                title: 'Emin misin?',
                text: "Bunu geri alamazsın!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Evet, sil!'
              }).then((result) => {
                if (result.isConfirmed) {
                    var id = event.id;
                    $.ajax({
                        url: "/randevu/destroy",
                        type: "POST",
                        data: {
                            id: id,
                            type: "delete"
                        },
                        success: function (response) {
                            calendar.fullCalendar('refetchEvents');
                            Toast.fire({
                                icon: 'success',
                                title: 'İşlem başarılı.'
                            })
                        }
                    })
                }
              })
            


          
        }



    });
})
