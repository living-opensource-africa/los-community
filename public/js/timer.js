  // Time In days, hours, minutes & seconds
function timer(time) {
    let day = (24 * 60)
    let minutes = 60
    let remDays = time/day
    let remHours = (time % day) / minutes
    let remMinutes = remHours % minutes

    console.debug(remDays + " day(s) " + remHours + " hours " + remMinutes + " Minutes " + remMinutes % 60 % 60 + " Seconds")
}