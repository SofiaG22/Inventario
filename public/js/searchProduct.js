$(document).ready( function () {
    
    ($('#nameProduct').on("input",()=>{
        if($('#nameProduct').val().length==0){
            $('#ulSearch').empty()

        }
        $('#nameProduct').attr("autocomplete","off")
        $.ajax({
            url:"handlers/searchProducts.php",
            type:"POST",
            data:{
                search:$('#nameProduct').val()
            },
            success:(res)=>{
    
                let response=JSON.parse(res)

                $('#ulSearch').empty()
                if (response.length>0){
                    response.forEach(row => {
                        let li = $('<li>',{"class":"liSearch"}).text(`${row.nombre_producto} - (${row.id_producto})`)
                        $(li).on("click",()=>{
                            $('#nameProduct').val(li.text())
                            
                            $('#nameProduct').attr({"name":row.id_producto})
                            $('#ulSearch').empty()
    
                        })
    
                        $('#ulSearch').append(li)
                        
                    })
                }
                else{
                    let li = $('<li>',{"class":"liSearch"}).text("No se encontraron productos")
                    $('#nameProduct').attr("name",-1)
                    $('#ulSearch').append(li)
                }
           
                
            },
            error:(err)=>{
                console.log(err)
            }
            
        })
        console.log( $('#nameProduct').val())
    }))
} );