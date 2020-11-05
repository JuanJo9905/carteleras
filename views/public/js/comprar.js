function total()
{
    let cantPost = parseInt(document.getElementById("cantidad").value);
    let tot = cantPost * 5000;
    document.getElementById("total").innerHTML= "$"+tot;
}
