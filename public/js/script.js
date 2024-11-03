class Accordion {
    constructor(i) {
        (this.el = i),
            (this.summary = i.querySelector("summary")),
            (this.content = i.querySelector(".accordion-body")),
            (this.animation = null),
            (this.isClosing = !1),
            (this.isExpanding = !1),
            this.summary.addEventListener("click", (i) => this.onClick(i));
    }
    onClick(i) {
        i.preventDefault(),
            (this.el.style.overflow = "hidden"),
            this.isClosing || !this.el.open
                ? this.open()
                : (this.isExpanding || this.el.open) && this.shrink();
    }
    shrink() {
        this.isClosing = !0;
        let i = `${this.el.offsetHeight}px`,
            t = `${this.summary.offsetHeight}px`;
        this.animation && this.animation.cancel(),
            (this.animation = this.el.animate(
                { height: [i, t] },
                { duration: 200, easing: "ease-in-out" }
            )),
            (this.animation.onfinish = () => this.onAnimationFinish(!1)),
            (this.animation.oncancel = () => (this.isClosing = !1));
    }
    open() {
        (this.el.style.height = `${this.el.offsetHeight}px`),
            (this.el.open = !0),
            window.requestAnimationFrame(() => this.expand());
    }
    expand() {
        this.isExpanding = !0;
        let i = `${this.el.offsetHeight}px`,
            t = `${this.summary.offsetHeight + this.content.offsetHeight}px`;
        this.animation && this.animation.cancel(),
            (this.animation = this.el.animate(
                { height: [i, t] },
                { duration: 400, easing: "ease-out" }
            )),
            (this.animation.onfinish = () => this.onAnimationFinish(!0)),
            (this.animation.oncancel = () => (this.isExpanding = !1));
    }
    onAnimationFinish(i) {
        (this.el.open = i),
            (this.animation = null),
            (this.isClosing = !1),
            (this.isExpanding = !1),
            (this.el.style.height = this.el.style.overflow = "");
    }
}
document.querySelectorAll("details").forEach((i) => {
    new Accordion(i);
});

// shift call
// JavaScript
// JavaScript
const sliderIcon = document.getElementById("sliderIcon");
let isDragging = false;
let startX;

function updateSliderPosition(dx) {
    sliderIcon.style.left = Math.min(Math.max(10 + dx, 10), 250) + "px"; // 250px sesuai panjang slider yang diinginkan
}

function checkSliderPosition() {
    if (parseInt(sliderIcon.style.left) >= 250) {
        window.location.href = "tel:112";
    }
    sliderIcon.style.left = "10px";
}

sliderIcon.addEventListener("mousedown", (e) => {
    isDragging = true;
    startX = e.clientX;
});

sliderIcon.addEventListener("touchstart", (e) => {
    isDragging = true;
    startX = e.touches[0].clientX;
});

document.addEventListener("mousemove", (e) => {
    if (isDragging) {
        const dx = e.clientX - startX;
        updateSliderPosition(dx);
    }
});

document.addEventListener("touchmove", (e) => {
    if (isDragging) {
        const dx = e.touches[0].clientX - startX;
        updateSliderPosition(dx);
    }
});

document.addEventListener("mouseup", () => {
    if (isDragging) {
        isDragging = false;
        checkSliderPosition();
    }
});

document.addEventListener("touchend", () => {
    if (isDragging) {
        isDragging = false;
        checkSliderPosition();
    }
});

