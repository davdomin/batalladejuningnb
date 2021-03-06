const C_SEXO = 1;
const C_GRUPO_SANGUINEO = 2;
const C_BANCO = 3;
const C_ESTADO_DEPOSITO = 4;
const C_JERARQUIA = 6;
const C_ESTADOS = 7;
const C_CARGO = 8;
const C_GRADO = 9;
const C_TALLA_CAMISA = 10;
const C_TALLA_PANTALON =  11;
const C_TALLA_CALZADO =  12;
const C_TALLA_GORRA =  13;
const C_ESTADO_CIVIL =  14;



function getDataSource(cod_clasificacion, pre='../',prefix='') {

        var dataSource = new kendo.data.DataSource({
                transport: {
                    read: {                    
                        url: pre+"Home/getDataSource",
                        dataType: "json",
                        type: "GET",
                        data: {cod_clasificacion: cod_clasificacion, prefix:prefix }
                    }               
                },               
            });       
    
    return dataSource;    
}

function callDataByKey(key, pre='../') {    
    return new Promise(resolve => {
        $.get(pre+"Home/getValuesByKey", {key: key})
        .done( (result)=> {
            resolve(result);            
            }
        )
        .fail (
            (err)=> {
                console.log(err);
            }
        )
    }); 
}

async function getDataByKey(key)  {
    const result = await callDataByKey(key);    
    return result;
}

function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) 
        month = '0' + month;
    if (day.length < 2) 
        day = '0' + day;

    return [year, month, day].join('-');
}

   function mensaje(titulo, contenido) {   
      $('#dialog').kendoDialog({
          width: "450px",
          title: titulo,
          content: contenido,
          actions: [
              { text: 'Aceptar', primary: true }
          ],
      });
      let dialog = $('#dialog').data("kendoDialog");
      dialog.open();
   }   

   function mensaje_html(titulo,contenido)  {
    $("#mensaje_html").css("visibility",'all');    
    $("#msj_html").html (
            "<strong>Success!</strong> Indicates a successful or positive action."
        );
    setTimeout(function(){ $("#mensaje_html").css("visibility",'none'); }, 2000);
   }


   function stackTrace() {
    var err = new Error();
    return err.stack;
}