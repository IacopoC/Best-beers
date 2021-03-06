let count = document.getElementById("beer-count").value;
let pourButton = document.getElementById("pourBeer");
let displayCount = document.getElementById("displayCount");
let displayDrunk = document.getElementById("displayDrunk");
let drunkMessage = 'drunk, ahah!';
let superdrunkMessage = 'super drunk, ahah!';

pourButton.addEventListener("click", function() {
    count ++;
    displayCount.innerHTML = count;
    document.getElementById("beer-count").value = count;

    if (count === 6) {
        document.getElementById("hiccup-audio").play();
    }
    else if(count >= 6 && count < 10 ) {
        displayDrunk.innerHTML = drunkMessage;
        displayDrunk.classList.remove("sober");
        displayDrunk.classList.add("drunk");
        document.getElementById("beer-drunk").value = drunkMessage;
    }
    else if (count >= 10) {
        displayDrunk.innerHTML = superdrunkMessage;
        document.getElementById("beer-drunk").value = superdrunkMessage;
    }
    else {
        document.getElementById("pouring-audio").play();
    }
});
