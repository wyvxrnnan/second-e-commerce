const totalCount = document.getElementById("count");
const totalPrice = document.getElementById("price");
var count = 0;
totalCount.innerHTML = count;

const handleIncrement = () => {
    count++;
    totalCount.innerHTML = count;
};

const handleDecrement = () => {
    if (count > 0){
        count--;
        totalCount.innerHTML = count;
    }
    else {
        count = 0;
    }
};

const incrementCount = document.getElementById("increment");
const decrementCount = document.getElementById("decrement");

incrementCount.addEventListener("click", handleIncrement);
decrementCount.addEventListener("click", handleDecrement);