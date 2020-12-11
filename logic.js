window.addEventListener("load", initsite)
document.getElementById("getBtn").addEventListener("click", getHoroscope)
document.getElementById("saveBtn").addEventListener("click", saveHoroscope)

function initsite() {
    
}


async function saveHoroscope() {
    const dayToSave = document.getElementById("inputDay").value
    const monthToSave = document.getElementById("inputMonth").value

    if(!dayToSave.length || !monthToSave.length) {
        console.log("Please enter your birthday in input :) ")
        return
    }

    const body = new FormData()
    body.set("day", dayToSave)
    body.set("month", monthToSave)

    const collectedHoroscope = await request("./API/addHoroscope.php", "POST", body)
    console.log(collectedHoroscope)
}


async function getHoroscope() {
    const horoscopeinput = document.getElementById("seeHoroscope")
    const collectedHoroscope = await request("./API/viewHoroscope.php", "GET")
    console.log(collectedHoroscope)
    horoscopeinput.innerText = collectedHoroscope
}



async function request(path, method, body) {
    try {
        const response = await fetch(path, {
            method,
            body
        })
        console.log(response)
        return response.json()
    } catch(err) {
        console.error(err)
    }
}
