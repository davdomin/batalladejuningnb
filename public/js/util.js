const C_SEXO = 1;
const C_GRUPO_SANGUINEO = 2;
const C_BANCO = 3;

function getDataSource(cod_clasificacion) {

        var dataSource = new kendo.data.DataSource({
                transport: {
                    read: {                    
                        url: "../Home/getDataSource",
                        dataType: "json",
                        type: "POST",
                        data: {cod_clasificacion: cod_clasificacion}
                    }               
                },               
            });       
    
    return dataSource;    
}