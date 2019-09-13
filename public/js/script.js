$(document).ready(function(){
    $(".fancybox").fancybox();
    $("#busqueda").hide();
    moment.locale('es');
    $(".fecha").each(function(){
        fecha = moment($(this).text()).fromNow();
        $(this).text(fecha);
    });

    $("#txtBuscar").keyup(function(){
        if($(this).val() != ""){
            var nombre = $(this).val();
            var form = $(this)[0].parentElement;
            var urlValor = $(form).attr('action');
            
        
            $.ajax({
                url: urlValor,
                type: 'GET',
                data: { nombre },
                success: function(response){
                    var contenido = "";        
                
                    for(var i in response){
                         contenido += "<div class='col-md-4 mt-3' >" +
                                            "<div class='card'>"    +
                                                "<img src='http://ark4-fotos.com/" + response[i].ruta + "' class='card-img-top' height='300px'>" + 
                                                "<div class='card-body'>"    +
                                                    "Nombre: " + response[i].nombre +
                                                    "<br>" + 
                                                    "Descripcion: " + response[i].descripcion +
                                                "</div>" +
                                            "</div>" +
                                        "</div>";
                    }
                    

                    $("#resultados").html(contenido);
                    $("#busqueda").show();
                }
            });
        }else{
            $("#busqueda").hide();
        }
    });

    $(".delete").click(function(){
        if (!confirm("Estas seguro que deseas borrar")){
            return false;
        }
    });
});