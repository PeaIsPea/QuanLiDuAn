// $(".rec-price .card").css(
//   "background-color",
//   "hsla(" + Math.floor(Math.random() * 360) + ", 75%, 58%, 1)"
// );

const cardElements = document.querySelectorAll(".rec-price .card");

cardElements.forEach((card) => {
    const randomRGB1 = getRandomDarkRGB();
    const randomRGB2 = getRandomDarkRGB();
    const gradientColor = `linear-gradient(to right, rgb(${randomRGB1}), rgb(${randomRGB2}))`;
    card.style.background = gradientColor;
});

function getRandomDarkRGB() {
    const min = 0;
    const max = 100; // Adjust the max value for darker colors
    const r = Math.floor(Math.random() * (max - min + 1) + min);
    const g = Math.floor(Math.random() * (max - min + 1) + min);
    const b = Math.floor(Math.random() * (max - min + 1) + min);
    return `${r}, ${g}, ${b}`;
}
console.log(cardElements);