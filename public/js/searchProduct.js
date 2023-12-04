$(document).ready( function () {
    
    ($('#nameProduct').on("input",()=>{
       
        $.ajax({
            url:"handlers/searchProducts.php",
            type:"POST",
            data:{
                search:$('#nameProduct').val()
            },
            success:(res)=>{
    
                let response=JSON.parse(res)

                response.forEach(row => {
                    let li = $('<li>').text(row.nombre_producto)

                    $('#ulSearch').append(li)
                    
                });
                
            },
            error:(err)=>{
                console.log(err)
            }
            
        })
        console.log( $('#nameProduct').val())
    }))
} );