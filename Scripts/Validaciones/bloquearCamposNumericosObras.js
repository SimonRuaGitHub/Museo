/*
  Hecho por: Simon Felipe Rua Vargas
  Fecha: 28/02/2016
*/
/*
  Parametro: evt
  Descripcion: verifica continuamente el codigo ascii de los caracteres ingresado por teclas
  esta funcion solo permite el ingreso de numeros entre [0,infinito) por tecla, si no son numeros bloquea el ingreso de dicho caracter
*/
function esNumeroNatural(evt)
{
	if(event.which < 48 || event.which > 57)//permite solo escribir rango de valores numericos
	   event.preventDefault();
}

/*
  Parametro: evt
  Descripcion: verifica continuamente el codigo ascii de los caracteres ingresado por teclas
  esta funcion solo permite el ingreso de numeros reales por tecla, si no son numeros (a excepcion de la coma '','')
  bloquea el ingreso de dicho caracter
*/
function esNumeroReal(evt)
{
	if(event.which < 48 || event.which > 57)
        {
		if(event.which != 44)// ' , '
		   event.preventDefault();
	}	   
}