
const state = document.getElementById("state");
const lga = document.getElementById("lga");
const ward = document.getElementById("ward");
const pu = document.getElementById("pu");

try {
    state.addEventListener("change", (e) => {
        let url = new URL(window.location.href);
        url.searchParams.set('state', e.target.value);
        url.searchParams.set('lga', -1);
        window.location.href = url;
       
    })
} catch (error) {
    console.log(error)
}

try {
    lga.addEventListener("change", (e) => {
        let url = new URL(window.location.href);
        url.searchParams.set('lga', e.target.value);
        window.location.href = url;
       
    })
} catch (error) {
    console.log(error)
}

try {
    ward.addEventListener("change", (e) => {
        let url = new URL(window.location.href);
        url.searchParams.set('ward', e.target.value);
        window.location.href = url;
       
    })
} catch (error) {
    console.log(error)
}

try {
    pu.addEventListener("change", (e) => {
        let url = new URL(window.location.href);
        url.searchParams.set('pu', e.target.value);
        window.location.href = url;
       
    })
} catch (error) {
    console.log(error)
}