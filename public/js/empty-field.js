function emptyField() {
    let field;
    field = document.getElementById("beer-search").value;
    if (field === "") {
        document.getElementById("alert-message").innerHTML = "Fill the field to make a search";
        return false;
    }};
