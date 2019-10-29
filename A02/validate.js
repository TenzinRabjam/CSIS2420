

function searchverify(){
    
    
    //first name
    if(document.form.fName.value == "" ){
        alert("Please provide a first name");
        document.form.fName.focus() ;
            return false;
        }
    if(!/^[a-zA-Z]+$/.test(document.form.fName.value)){
        alert("First name can only be letters");
        document.form.fName.focus();
            return false;
    }
    //last name
    if(document.form.lName.value ==""){
        alert("Please provide a last name");
                document.form.lName.focus();
                return false;
    }
    
    if(!/^[a-zA-Z]+$/.test(document.form.lName.value)){
        alert("Last name can only be letters");
        document.form.lName.focus();
            return false;
    }
    return (true);
}
function verify(){
    
    searchverify();
     
     //phone number
    if(document.form.phone.value == ""){
        alert("Provide a phone number");
        document.form.phone.focus();
        return false;
    }
    if(!/^[0-9]+$/.test(document.form.phone.value)){
        alert("Phone number can only be numbers");
        document.form.phone.focus();
        return false;
    }
    
    //address
    if(document.form.address.value == ""){
        alert("Provide an address");
        document.form.address.focus();
        return false;
    }
    //city
    if(document.form.city.value == ""){
        alert("Provide a city");
        document.form.city.focus();
        return false;
    }
    //state
    if(document.form.state.value == "state"){
        alert("Select a state");
        document.form.state.focus();
        return false;
    }
    //zip
    if(document.form.zip.value == ""){
        alert("Provide a zip-code");
        document.form.zip.focus();
        return false;
    }
    //birthday (month, day, year)
    if(document.form.month.value == "month" || document.form.day.value == "day"||document.form.year.value=="year"){
        alert("select a birthdate");
        document.form.month.focus();
        return false;
    }
    //username
    if(document.form.username.value == ""){
        alert("Provide a username");
        document.form.username.focus();
        return false;
    }
    //password
    if(document.form.password.value == ""){
        alert("Provide a password");
        document.form.password.focus();
        return false;
    }
    //sex
    if(document.form.sex.value == ""){
        alert("select a sex");
        document.form.sex.focus();
        return false;
    }
    //relation
    if(document.form.relation.value == "relation"){
        alert("select a relationship");
        document.form.relation.focus();
        return false;
    }
    return (true);
}
