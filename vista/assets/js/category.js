var opt_1=new Array("Seleccione...","CELULARES Y SMARTPHONES","ACCESORIOS PARA CELULARES","SMARTWATCHES");
var opt_2=new Array("Seleccione...","TV Y VIDEO","AUDIO","CAMARAS Y LENTES","DRONES");
var opt_3=new Array("Seleccione...","CONSOLAS","VIDEOJUEGOS","FUNKOS","COLECCIONABLES");
var opt_4=new Array("Seleccione...","COMPUTACIÓN", "ACCESORIOS DE COMPUTADORAS");
var opt_5=new Array("Seleccione...","ALMOHADAS", "ARTÍCULOS DE COCINA","ARTÍCULOS DE BAÑO","ACCESORIOS PARA SALA");
var opt_6=new Array("Seleccione...","CLIMATIZACIÓN", "ASPIRADORAS");
var opt_7=new Array("Seleccione...","MODA MUJER", "MODA HOMBRE");
var opt_8=new Array("Seleccione...","RELOJES","LENTES","CARTERAS, BILLETERA, MALETAS Y MOCHILAS");
var opt_9=new Array("Seleccione...","PERFUMES","DEPILADORAS","CUIDADO FACIAL","CUIDADO PERSONAL");
var opt_10=new Array("Seleccione...","VITAMINAS Y SUPLEMENTOS ALIMENTICIOS","FAJAS");
var opt_11=new Array("Seleccione...","ACCESORIOS PARA BEBES","JUGUETES");
var opt_12=new Array("Seleccione...","EJERCICIOS Y FITNES","BICICLETAS", "CAMPING Y OUTDOORS");
var opt_13=new Array("Seleccione...","ACCESORIOS PARA MASCOTAS");

function cambiaCateg(){
    var categ;
    categ = document.querySelector("#idcategoria")[document.querySelector("#idcategoria").selectedIndex].value;
    
    if(categ!=0){
        mis_opts=eval("opt_"+categ);
        num_opts=mis_opts.length;
        document.querySelector("#idsubcateg").length = num_opts;
        for(i=0; i<num_opts; i++){
            //document.querySelector("#idsubcateg").options[i].value=(mis_opts[i]).replace(/ /g, "");
            document.querySelector("#idsubcateg").options[i].value=(mis_opts[i]);
            document.querySelector("#idsubcateg").options[i].text=mis_opts[i];
        }
    }else{
        document.querySelector("#idsubcateg").length = 1;
        document.querySelector("#idsubcateg").options[0].value="-";
        document.querySelector("#idsubcateg").options[0].text="-";
    }
    //reseteando las opts
    document.querySelector("#idsubcateg").options[0].selected = true;
}