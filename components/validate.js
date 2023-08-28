document.querySelectorAll("#dateFrom, #dateTo").forEach(date => date.addEventListener("input", () => {
    const dateFrom = document.querySelector("#dateFrom");
    const dateTo = document.querySelector("#dateTo");
    if(dateFrom.value > dateTo.value && [dateFrom, dateTo].every(d => d.checkValidity()))
        dateFrom.setCustomValidity("Data początkowa pobytu nie może być późniejsza niż data końcowa.");
    else
        dateFrom.setCustomValidity("");
}));
document.querySelectorAll("#newTermForm input").forEach(field => {
    field.addEventListener("input", () => {
        field.nextElementSibling.setAttribute("data-validation", field.validationMessage);
        if(document.querySelector("#newTermForm").checkValidity())
            document.querySelector("#newTermForm button").removeAttribute("disabled");
        else
            document.querySelector("#newTermForm button").setAttribute("disabled", "");
    });
});
document.querySelector("#people")?.addEventListener("input", event => document.querySelector("output").textContent = event.target.value);        
function ConvertToTimestamp(d)
{
    d = d.split("-");
    d = new Date(d[0], d[1] - 1, d[2]);
    d = d.getTime() / 1000;
    return d;
}
document.querySelector("#newTermForm")?.addEventListener("submit", event => {
    const [dateFrom, dateTo] = [ConvertToTimestamp(document.querySelector("#dateFrom").value), ConvertToTimestamp(document.querySelector("#dateTo").value)];
    const result = terms?.find(term => dateFrom <= Term.GetDateTo(term) && dateTo >= Term.GetDateFrom(term) && Term.GetRoom(term) == document.querySelector("#rooms").value);
    if(result)
    {
        event.preventDefault(); 
        const myModal = new bootstrap.Modal("#invalidDateModal");
        myModal.show();
    }                    
});
const validationMessage = document.querySelector("#validationMessage");
if(validationMessage)
{
    validationMessage.animate(
    {
        scale : 1
    },
    {
        duration : 300,
        fill : "forwards",
    });
    if(validationMessage.classList.contains("alert-success"))
    {
        const validationAlert = new bootstrap.Alert('#validationMessage');
        setTimeout(() => {
            bootstrap.Alert.getOrCreateInstance("#validationMessage").close();
            bootstrap.Alert.getOrCreateInstance(validationAlert).dispose();
        }, 2000); 
    }         
} 