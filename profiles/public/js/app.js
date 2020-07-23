

  function deleteProfile(e) {
    deleteUrl = $(e).attr("delete-url");
    swal({
        title: "Are you sure to delete ?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it !!",
        closeOnConfirm: false
    },
    function() {
        $.ajax({
            url: deleteUrl,
            type: 'GET',
            success: function(result) {
                
                if (result.status === true) {
                    swal("Deleted !!", result.message, "success");
                    setTimeout(function() {
                        window.location.reload();
                    }, 1000);
                } else{
                    swal("Error !!", result.message, "error"); 
                }
            }
        }); 
    });
}


$('#shortingFilterSelect').on('change',function(){ 
    var value = $(this).val();
    var url   = window.location.href; 
    var array = url.split("?");
    
    if(array[1] == null)
    {
        url = url+ '?'; 
    }

   

    var splitFilter =  url.split("&");
    var i;
    var flag =1;

    for (i = 0; i < splitFilter.length; ++i) {
        if(splitFilter[i].substr(0, 11) == 'sort_filter')
         {
            splitFilter[i] = 'sort_filter='+value;
            flag = 0;
         }   
    }
    
    var joinUrl;
    if(flag==0){

        joinUrl =  splitFilter.join("&");    
    }else{
        url     = url + '&sort_filter='+value;
        joinUrl = url;
    }

   
    location.href = joinUrl;

});
