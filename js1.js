function login(){
    if (document.getElementById("login").style.display=="none") document.getElementById("login").style.display="block";
    else document.getElementById("login").style.display="none";
}
function mostra(id){
    if (id=='register')document.getElementById("register").style.display = "block";
    else document.getElementById("register").style.display = "none";
    if (id=='deleteUser')document.getElementById("deleteUser").style.display = "block";
    else document.getElementById("deleteUser").style.display = "none";
    if (id=='addElement')document.getElementById("addElement").style.display = "block";
    else document.getElementById("addElement").style.display = "none";
    if (id=='deleteElement')document.getElementById("deleteElement").style.display = "block";
    else document.getElementById("deleteElement").style.display = "none";

}