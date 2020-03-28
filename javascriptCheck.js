function check(){
    var user = document.Check.user.value;
    var pass = document.Check.pass.value;

    var user1 = document.Check.user.value;
    var pass2 = document.Check.pass.value;


    if(user == ""){
        alert("Plaese input your Username!");
        return false;
    }else if(pass == ""){
        alert("Plaese input your password!");
        return false;
    }

}