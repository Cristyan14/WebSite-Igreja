let currentIndex = 0; 
const tabs = document.querySelectorAll(".tab");
const trs = document.querySelectorAll(".tr");

function updateActiveElements() {

    tabs.forEach((tab, index) => {
        tab.classList.toggle("active", index === currentIndex);
    });

    trs.forEach((tr, index) => {
        tr.classList.toggle("active", index === currentIndex);
    });
}

function next() {
    if (currentIndex < Math.max(tabs.length, trs.length) - 1) {
        currentIndex++;
        updateActiveElements();
    }
}

function prev() {
    if (currentIndex > 0) {
        currentIndex--;
        updateActiveElements();
    }
}


updateActiveElements();
