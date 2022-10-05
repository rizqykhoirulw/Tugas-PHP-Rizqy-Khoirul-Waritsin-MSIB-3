const jaml = document.getElementById("jams");
const menitl = document.getElementById("menit");
const detikl = document.getElementById("detik");
const ampml = document.getElementById("ampm");

function clock() {
    let j = new Date().getHours();
    let m = new Date().getMinutes();
    let d = new Date().getSeconds();
    let ampm = "AM";

    if (j>12) {
        j -= 12;

        ampm = "PM";
    }

    j = j < 10? "0" + j : j; 
    m = m < 10? "0" + m : m; 
    d = d < 10? "0" + d : d; 

    jaml.innerHTML = j;
    menitl.innerHTML = m;
    detikl.innerHTML = d;
    ampml.innerHTML = ampm;

    setTimeout(() => {
        clock();
    }, 1000);

}

clock();

