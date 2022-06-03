$( function() {
    $( "#dialog" ).dialog({
        autoOpen: false,
        show: {
            effect: "blind",
            duration: 1000
        },
        hide: {
            effect: "explode",
            duration: 1000
        }
    });

    $( "#opener" ).on( "click", function() {
        $( "#dialog" ).dialog( "open" );
    });
} );

$( function() {
    $( "#zapytanie" ).selectmenu();
} );

function save() {
    let fname = document.getElementById("fname");
    localStorage.setItem("fname", fname.value);
    let lname = document.getElementById("lname");
    localStorage.setItem("lname", lname.value);
    let email = document.getElementById("email");
    localStorage.setItem("email", email.value);
    let tel = document.getElementById("tel");
    localStorage.setItem("tel", tel.value);
}

function dataPrint() {
    const div = document.createElement("div");

    if (localStorage.getItem("fname").length > 0) {
    let fname = document.createTextNode("Zapisane imię: ");
    let fname_data = localStorage.getItem("fname");
    let fname_data2 = document.createTextNode(fname_data)
    div.appendChild(fname);
    div.appendChild(fname_data2); }

    if (localStorage.getItem("lname").length > 0) {
    let lname = document.createTextNode(" Zapisane nazwisko: ");
    let lname_data = localStorage.getItem("lname");
    let lname_data2 = document.createTextNode(lname_data);
    div.appendChild(lname);
    div.appendChild(lname_data2); }

    if (localStorage.getItem("email").length > 0) {
    let email = document.createTextNode(" Zapisany e-mail: ");
    let email_data = localStorage.getItem("email");
    let email_data2 = document.createTextNode(email_data);
    div.appendChild(email);
    div.appendChild(email_data2); }

    if (localStorage.getItem("tel").length > 0) {
    let tel = document.createTextNode(" Zapisany nr telefonu: ");
    let tel_data = localStorage.getItem("tel");
    let tel_data2 = document.createTextNode(tel_data);
    div.appendChild(tel);
    div.appendChild(tel_data2); }

    document.getElementById("form").appendChild(div);
}

