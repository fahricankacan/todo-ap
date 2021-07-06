    
    if(window.location.href == window.location.origin+ "/proje"){
        $('.proje_durum_secenekleri').on('change',function(e){
            //   var optionSelected = $('option:selected',this);
                console.log(this)
               let valueSelected = this.value;
               let sozlesmeID = this.id; 
               console.log(this.id)
               console.log(valueSelected);
    
               
               $.ajaxSetup({
                cache: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    
            $.ajax({
                type: "PUT",
                url: window.location.origin + "/projedurum/" + sozlesmeID,
                data:{durum:valueSelected,
                sayfa:"proje"},
                success: function(response) {
               
                    Swal.fire(
                        'Başarılı !',
                        'Bir kayıt güncellendi !',
                        'success')
                        //$('#content').load(window.location.origin + "/sozlesme/ #content")
                },
                error: function(response) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Bir hata ile karşılaşıldı!',
                    })
                }
            })
            })
    
    
    }
    

    if(window.location.href == window.location.origin+ "/sozlesme"){
        $('.proje_durum_secenekleri').on('change',function(e){
            //   var optionSelected = $('option:selected',this);
                console.log(this)
               let valueSelected = this.value;
               let sozlesmeID = this.id; 
               console.log(this.id)
               console.log(valueSelected);
    
               
               $.ajaxSetup({
                cache: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    
            $.ajax({
                type: "PUT",
                url: window.location.origin + "/projedurum/" + sozlesmeID,
                data:{durum:valueSelected,sayfa:"proje"},
                success: function(response) {
               
                    Swal.fire(
                        'Başarılı !',
                        'Bir kayıt güncellendi !',
                        'success')
                        //$('#content').load(window.location.origin + "/sozlesme/ #content")
                },
                error: function(response) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Bir hata ile karşılaşıldı!',
                    })
                }
            })
            })
    
    
    }
    
    