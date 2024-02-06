function DisplayForm(id){
    document.getElementById('hotelId').value = id
    const popup = document.getElementById("popup")
    popup.classList.add("popup-show");
}
function CloseForm(){
    const popup = document.getElementById("popup")
    document.getElementById('hotelId').value = null
    popup.classList.remove("popup-show");
}
function SubmitFrom(){
    let startDate = document.getElementById("StartDate").value
    let endDate = document.getElementById("EndDate").value
    let msg = document.getElementById("error-msg")
    
    if(startDate>endDate){
        msg.textContent = "Data e fillimit te rezervimit duhet te jete me e vogel se ajo e mbarimit!"
        msg.classList.add("date-error")
        console.log("date error")
        
    }else{
        msg.textContent = "Rezervimi u krye me sukses!"
        msg.classList.remove("date-error")
        msg.classList.add("success-msg")
        setTimeout(() => {
            popup.classList.remove("popup-show");
            msg.classList.remove("success-msg")
        }, 5000) 
    }

    event.preventDefault();
    let popup = document.getElementById("popup")
    console.log(startDate)
    console.log(endDate) 
}

