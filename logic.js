window.addEventListener("load", initsite)
document.getElementById("saveBtn").addEventListener("click", saveHoroscope)
document.getElementById("deleteBtn").addEventListener("click", deleteHoroscope)
document.getElementById("updateBtn").addEventListener("click", updateHoroscope)

function initsite() {
    getHoroscope()
}


async function saveHoroscope() {
    let monthToSave
    let dayToSave

    const input = document.getElementById("inputDate").value;
    const d = new Date(input);
    if (!!d.valueOf()) {
        monthToSave = d.getMonth() + 1;
        dayToSave = d.getDate();
    }

    if (!dayToSave || !monthToSave) {
        console.log("Please enter your birthday in input :)")
        return
    }

    const body = new FormData()
    body.set("day", dayToSave)
    body.set("month", monthToSave)

    const collectedHoroscope = await request("./API/addHoroscope.php", "POST", body)
    console.log(collectedHoroscope)
    getHoroscope()

}


async function getHoroscope() {
    const horoscopeinput = document.getElementById("seeHoroscope")
    const collectedHoroscope = await request("./API/viewHoroscope.php", "GET")
    console.log(collectedHoroscope)
    horoscopeinput.innerText = collectedHoroscope
}

async function deleteHoroscope() {
    const collectedHoroscope = await request("./API/deleteHoroscope.php", "DELETE")
    console.log(collectedHoroscope)
    getHoroscope()
}

async function updateHoroscope() {
    let monthToSave
    let dayToSave

    const input = document.getElementById("inputDate").value;
    const d = new Date(input);
    if (!!d.valueOf()) {
        monthToSave = d.getMonth() + 1;
        dayToSave = d.getDate();
    }

    if (!dayToSave || !monthToSave) {
        console.log("Please enter your birthday in input :) ")
        return
    }

    const body = new FormData()
    body.set("day", dayToSave)
    body.set("month", monthToSave)

    const collectedHoroscope = await request("./API/updateHoroscope.php", "POST", body)
    console.log(collectedHoroscope)
    getHoroscope()
}


async function request(path, method, body) {
    try {
        const response = await fetch(path, {
            method,
            body
        })
        console.log(response)
        return response.json()
    } catch (err) {
        console.error(err)
    }
}

