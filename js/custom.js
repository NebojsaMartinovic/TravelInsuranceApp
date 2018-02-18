function select_options() {
    var select = document.getElementById('select');
    var d = select.value;
    if (d == 'Group') {
        document.getElementById("dynamicInput").style.display = "block";
        addInput();
    } else {
        document.getElementById("dynamicInput").style.display = "none";
    }

}

var counter = 1;

function addInput() {

    var newdiv = document.createElement('div');
    var id = 'first'+counter;
    //console.log(id);
    newdiv.setAttribute('id',id);


    newdiv.innerHTML = "<label for='firstname'>First Name: <sup>*</sup></label>";
    newdiv.innerHTML += "<input type='text' name='firstname[]' class='form-control form-control-lg'>";
    newdiv.innerHTML += "<label for='lastname'>Last Name: <sup>*</sup></label>";
    newdiv.innerHTML += "<input type='text' name='lastname[]' class='form-control form-control-lg'>";
    newdiv.innerHTML += "<label for='dateofbirth'>Dateofbirth: <sup>*</sup></label>";
    newdiv.innerHTML += "<input type='text' name='dateofbirth[]' class='form-control form-control-lg'>";
    newdiv.innerHTML += "<input type='button'  value='Add customer' class='btn btn-primary mt-1' onclick='addInput();'>";
    newdiv.innerHTML += "<input type='button' value='Delete customer' class='btn btn-danger mt-1' style='float:right;' onclick='deleteInput("+id+");'>";
    document.getElementById('dynamicInput').appendChild(newdiv);
    counter++;

}



function deleteInput(id) {

    id.innerHTML = '';


}

function display_date(){
    var input = document.getElementById('from');
    var input_data = input.value;
    if(input_data != ''){
        var date = document.getElementById('to');
        var dt = new Date(input_data);
        dt.setDate(dt.getDate() + 10);
        date.setAttribute('value', dt.toLocaleDateString());
    }
}









