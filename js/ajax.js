function objetoAjax(){
var objetoAjax;
 try{
 objetoAjax = new XMLHttpRequest();
 }catch(err1){
 try{
 objetoAjax = new ActiveXObject("Msxm12.XMLHTTP");
 }catch(err2){
 try{
 objetoAjax = new ActiveXObject("Microsoft.XMLHTTP");
 }catch(err3){
 objetoAjax = false;
 }
 }
 }
 return objetoAjax;
 }

function Pagina(nropagina){
 //donde se mostrará los registros
 divContenido = document.getElementById('criticalstaff');

 ajax=objetoAjax();
 //uso del medoto GET
 //indicamos el archivo que realizará el proceso de paginar
 //junto con un valor que representa el nro de pagina
 ajax.open("GET", "pagination_criticalstaff.php?pag="+nropagina);
 divContenido.innerHTML= '<img src="anim.gif">';
 ajax.onreadystatechange=function() {
  if (ajax.readyState==4) {
   //mostrar resultados en esta capa
   divContenido.innerHTML = ajax.responseText
  }
 }
 //como hacemos uso del metodo GET
 //colocamos null ya que enviamos
 //el valor por la url ?pag=nropagina
 ajax.send(null)
}

function Pagina2(nropagina){
 //donde se mostrará los registros
 divContenido = document.getElementById('technologicaldependencies');

 ajax=objetoAjax();
 //uso del medoto GET
 //indicamos el archivo que realizará el proceso de paginar
 //junto con un valor que representa el nro de pagina
 ajax.open("GET", "pagination_technologicaldependencies.php?pag="+nropagina);
 divContenido.innerHTML= '<img src="anim.gif">';
 ajax.onreadystatechange=function() {
  if (ajax.readyState==4) {
   //mostrar resultados en esta capa
   divContenido.innerHTML = ajax.responseText
  }
 }
 //como hacemos uso del metodo GET
 //colocamos null ya que enviamos
 //el valor por la url ?pag=nropagina
 ajax.send(null)
}

function Pagina3(nropagina){
 //donde se mostrará los registros
 divContenido = document.getElementById('internaldependencies');

 ajax=objetoAjax();
 //uso del medoto GET
 //indicamos el archivo que realizará el proceso de paginar
 //junto con un valor que representa el nro de pagina
 ajax.open("GET", "pagination_internaldependencies.php?pag="+nropagina);
 divContenido.innerHTML= '<img src="anim.gif">';
 ajax.onreadystatechange=function() {
  if (ajax.readyState==4) {
   //mostrar resultados en esta capa
   divContenido.innerHTML = ajax.responseText
  }
 }
 //como hacemos uso del metodo GET
 //colocamos null ya que enviamos
 //el valor por la url ?pag=nropagina
 ajax.send(null)
}

function Pagina4(nropagina){
 //donde se mostrará los registros
 divContenido = document.getElementById('externaldependencies');

 ajax=objetoAjax();
 //uso del medoto GET
 //indicamos el archivo que realizará el proceso de paginar
 //junto con un valor que representa el nro de pagina
 ajax.open("GET", "pagination_externaldependencies.php?pag="+nropagina);
 divContenido.innerHTML= '<img src="anim.gif">';
 ajax.onreadystatechange=function() {
  if (ajax.readyState==4) {
   //mostrar resultados en esta capa
   divContenido.innerHTML = ajax.responseText
  }
 }
 //como hacemos uso del metodo GET
 //colocamos null ya que enviamos
 //el valor por la url ?pag=nropagina
 ajax.send(null)
}

function Pagina5(nropagina){
 //donde se mostrará los registros
 divContenido = document.getElementById('providers');

 ajax=objetoAjax();
 //uso del medoto GET
 //indicamos el archivo que realizará el proceso de paginar
 //junto con un valor que representa el nro de pagina
 ajax.open("GET", "pagination_providers.php?pag="+nropagina);
 divContenido.innerHTML= '<img src="anim.gif">';
 ajax.onreadystatechange=function() {
  if (ajax.readyState==4) {
   //mostrar resultados en esta capa
   divContenido.innerHTML = ajax.responseText
  }
 }
 //como hacemos uso del metodo GET
 //colocamos null ya que enviamos
 //el valor por la url ?pag=nropagina
 ajax.send(null)
}